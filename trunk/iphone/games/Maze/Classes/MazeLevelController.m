//
//  LevelBalloons.m
//  TouchTouch
//
//  Created by sandeep m on 08/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "MazeLevelController.h"
#import "Constants.h"
#import "chipmunk.h"
#import <AVFoundation/AVFoundation.h>
#define kFilterFactor 0.09//0.05

@implementation MazeLevelController

@synthesize game;
@synthesize accelerometer;

int i=0;
AVAudioPlayer *audioPlayer;
int COLL_BALL=0;
int COLL_WALL=1;
float WALL_ELASTICITY=0.0;
float WALL_FRICTION=0.0;
BOOL gameComplete=NO;
BOOL gamePaused=NO;

static int NUMBER_OF_BALLS=2;//remember to manually change ballBodies to NUMBER_OF_BALLS value

int tickCount=0;

SPSoundChannel *rollSoundChannel;
SPSoundChannel *wallCollisionSoundChannel;


static NSMutableArray *ballImages; //contains SPImage's
cpBody *ballBodies[2] ; //remember to manually change this to NUMBER_OF_BALLS value
NSTimer *gameTimer;
NSMutableArray *menuButtons;

int mazeRowsPos[13][11]	= { 
	{0, 0, 1 ,1, 0, 0, 0, 0, 0, 0 ,0},
	{0, 0, 0 ,1, 0, 0, 1, 1, 1, 0 ,0},
	{0, 0, 1 ,1, 0, 0, 0, 1, 1, 0 ,0},
	{1, 1, 1 ,0, 0, 0, 0, 1, 1, 0 ,0},
	{0, 1, 1 ,1, 0, 0, 1, 1, 1, 0 ,1},
	{0, 0, 0 ,0, 0, 1, 1, 1, 0, 0 ,0},
	{0, 0, 1 ,1, 1, 1, 1, 1, 0, 0 ,0},
	{0, 0, 0 ,0, 0, 1, 1, 1, 1, 1 ,1},
	{0, 1, 1 ,1, 1, 0, 0, 0, 0, 0 ,0},
	{0, 0, 0 ,0, 0, 0, 0, 0, 0, 0 ,0},
	{0, 0, 0 ,0, 0, 1, 0, 0, 0, 0 ,0},
	{0, 1, 1 ,1, 0, 1, 0, 0, 0, 0 ,0},
	{0, 0, 0 ,0, 0, 1, 0, 0, 0, 0 ,0}

					}; 

int mazeColsPos[13][11] = { 
	{0, 0, 0 ,0, 1, 1, 0, 1, 1, 0, 0},
	{1, 1, 0 ,0, 1, 0, 0, 1, 0, 0, 0},
	{1, 1, 0 ,1, 1, 1, 0, 0, 0, 0, 0},
	{1, 0, 0 ,1, 1, 1, 1, 0, 0, 0, 0},
	{0, 0, 0 ,1, 1, 1, 1, 0, 0, 0, 0},
	{1, 0, 0 ,1, 1, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,0, 0, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,1, 0, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,1, 0, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,1, 0, 0, 0, 0, 0, 0, 0},
	{0, 0, 0 ,0, 0, 1, 0, 0, 0, 0 ,0},
	{0, 1, 0 ,0, 0, 1, 0, 0, 0, 0 ,0},
	{0, 1, 0 ,0, 0, 1, 0, 0, 0, 0 ,0}

						}; 

int finishPoints[4][2]= {{240, 40}, 
						 {315,40},
						 {240, 80},
						 {315,80}
						};

//load components 

- (void) loadBackgroundMusic {
	NSLog(@"Loading music");
	
}
- (void) loadScoreFields {
	
	game.timeTextField = [SPTextField textFieldWithText:[NSString stringWithFormat:@"Time: %d", 0]];
	
	game.timeTextField.fontName = DEFAULT_FONTNAME_BOLD;
	game.timeTextField.x = 310;
	game.timeTextField.y = 300;
	game.timeTextField.vAlign = SPVAlignTop;
	game.timeTextField.hAlign = SPHAlignRight;
	game.timeTextField.fontSize = 16;
	game.timeTextField.rotation = SP_D2R(90);

	[game addChild:game.timeTextField];
	
}



-(void) loadComponents{
	
	gameComplete=NO;
	ballImages = [[NSMutableArray alloc] init];
	menuButtons = [[NSMutableArray alloc] init];
	
	[game addButton:self : @"": @"pause.png" selector:  @selector(pauseGame:) : 30 : 265];

	SPImage *finish = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"FinishFlag.jpg"]];
	finish.x = finishPoints[0][0] + 9;
	finish.y = finishPoints[0][1];
	[game.playFieldSprite addChild:finish];
	
	[game setBackground:BACKGROUND_MAZE1];
	[self loadScoreFields];	
	[self loadBackgroundMusic];
	[game addChild:game.playFieldSprite];
	
	[self loadDirectionKeys]; //temp
	
}


//chipmunk stuff begin


static void addBall( int x, int y, cpBody *ballBodyLocal , SPImage *ballLocal, cpSpace *space, Game *game ){
	//ball body and shape
	
	ballBodyLocal->p = cpv(x, y);
	cpSpaceAddBody(space, ballBodyLocal);
	
	ballLocal.x=x;	
	ballLocal.y=y;
	[game.playFieldSprite addChild:ballLocal];

	cpShape *ballShape = cpCircleShapeNew(ballBodyLocal, 14.0, cpvzero);
	ballShape->e = 0.0; 
	ballShape->u = 0.0; 
	ballShape->collision_type = COLL_BALL;
	ballShape->data = ballLocal; 
		
	cpSpaceAddShape(space, ballShape);

}

- (void) addWall :(int)x : (int)y :(cpVect*) verts1 :(BOOL) isVertical   {
	NSString *imageName= isVertical ? @"verticalBar.png" :@"horizontalBar.png";
    SPImage *image = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:imageName]];
	image.x = x; 
	image.y=y;
	
	[game.playFieldSprite addChild:image];
	[image addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	
	cpBody *body = cpBodyNew(INFINITY, INFINITY);
	body->p = isVertical ? cpv(x -5, y + 35) :  cpv(x + 160, y - 5);
	
	cpShape *shape = cpPolyShapeNew(body, 4, verts1, cpv(0,0));
	shape->e = WALL_ELASTICITY; shape->u = WALL_FRICTION; shape->collision_type = COLL_WALL;
	shape->data = floor;

	cpSpaceAddStaticShape(space, shape);

}

- (void) addBrick :(int)x : (int)y :(cpVect*) verts1 :(BOOL) isVertical   {
	NSString *imageName= isVertical ? @"verticalBarSmall.png" :@"horizontalBarSmall.png";
    SPImage *image = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:imageName]];
	image.x = x; 
	image.y=y;
	
	[game.playFieldSprite addChild:image];
	[image addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	
	cpBody *body = cpBodyNew(INFINITY, INFINITY);
	body->p = isVertical ? cpv(x - 12, y + 1) :  cpv(x + 0, y - 9);
	
	cpShape *shape = cpPolyShapeNew(body, 4, verts1, cpv(0,0));
	shape->e = WALL_ELASTICITY; shape->u = WALL_FRICTION; shape->collision_type = COLL_WALL;
	shape->data = floor;
	
	cpSpaceAddStaticShape(space, shape);
	
}




- (void) startGameTimer {
  gameTimer=[NSTimer scheduledTimerWithTimeInterval:1.0f/60.0f target:self selector:@selector(tick:) userInfo:nil repeats:YES];
  [gameTimer retain];
}

//--chipmunk begins


- (void)setupChipmuck {
	cpInitChipmunk();
	
	space = cpSpaceNew();
	space->gravity = cpv(0, 0); 
	space->elasticIterations = 20;

	[self startGameTimer];

	
	//ball
	for(int i=0;i<NUMBER_OF_BALLS ;i++){
		SPImage *ball = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"metalBall.png"]];
		cpBody *ballBody = cpBodyNew(100.0, INFINITY);
		addBall(arc4random() % 100,250, ballBody , ball, space, game);
		//[ball addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];

		[ballImages addObject:ball];
		ballBodies[i]=ballBody;
	}
		
	
	// Create our floor's body and set it's position
	cpVect hVertices[] = {  cpv(160, 3), cpv(160, -3), cpv(-160, -3),cpv(-160,3) };
	cpVect vVertices[] = { cpv(3, 340), cpv(3, -340), cpv(-3, -340), cpv(-3, 340) };

	cpVect hBrickVertices[] = {  cpv(14, 0.4), cpv(14, -0.4), cpv(-14, -0.4),cpv(-14, 0.4) };
	cpVect vBrickVertices[] = { cpv(0.4, 12), cpv(0.4, -12), cpv(-0.4, -12), cpv(-0.4, 12) };
	
	//build maze with bricks
	int x=0,y=0;
	for (int i = 0; i< 13; i++) {
		for (int j = 0; j< 11; j++){
			if(mazeRowsPos[i][j] ==1){
				[self addBrick: x+5 :  y + 80: hBrickVertices : NO];
			}
			if(mazeColsPos[i][j] ==1){
				[self addBrick:  x + 34 :  y + 52: vBrickVertices : YES];
			}
			x= x+ 30;
		}
		y=y+30;
		x=0;
	}
	
	
		
	[self addWall: 315 : 40 : vVertices :YES ]; //wall right
	[self addWall: -9 : 40 : vVertices :YES ]; //wall left
	
	[self addWall: 0 : 40 : hVertices : NO]; //roof
	[self addWall: 0 : 440 : hVertices : NO]; //floor

	prepareSound(); 
	cpSpaceAddCollisionPairFunc(space, COLL_BALL, COLL_BALL, &ballCollision, self);
	cpSpaceAddCollisionPairFunc(space, COLL_BALL, COLL_WALL, &wallCollision, self);
	
	
	
}
void prepareSound(){ //TODO: optimize sound play
	SPSound *rollSound = [SPSound soundWithContentsOfFile:[[NSBundle mainBundle] pathForResource:@"shortroll" ofType:@"wav"]];	
	SPSound *wallCollSound = [SPSound soundWithContentsOfFile:[[NSBundle mainBundle] pathForResource:@"Thrust" ofType:@"caf"]];	
	
	rollSoundChannel = [rollSound createChannel];
	wallCollisionSoundChannel = [wallCollSound createChannel];
	
	[rollSoundChannel retain];
	[wallCollisionSoundChannel retain];
	
/*	NSString* resourcePath = [[NSBundle mainBundle] resourcePath];
	resourcePath = [resourcePath stringByAppendingString:@"/metalClang.mp3"];
	audioPlayer =[[AVAudioPlayer alloc] initWithContentsOfURL:[NSURL fileURLWithPath:resourcePath] error:NULL];  
	[audioPlayer prepareToPlay];
	[audioPlayer retain];
	[audioPlayer setNumberOfLoops:0]; */
	
}

void checkThresholdVelocity(cpBody *body) {
	
	int thresholdVelocity=100;
	if(body->v.x > thresholdVelocity || body->v.x < -thresholdVelocity || body->v.y >thresholdVelocity || body->v.y < -thresholdVelocity  ){
		body->v.x = 0;
 	    body->v.y = 0;		
	}
	
	
}

int wallCollision(cpShape *a, cpShape *b, cpContact *contacts, int numContacts, cpFloat normal_coef, void *data){
	
	for (int i=0;i< NUMBER_OF_BALLS;i++) {
		cpBody *ballBody = ballBodies[i];
		checkThresholdVelocity(ballBody);
	}

	//TODO: check penetration distance and play collision effect
	//	[wallCollisionSoundChannel play];
	
	return 1;
}

int ballCollision(cpShape *a, cpShape *b, cpContact *contacts,int numContacts, cpFloat normal_coef, void *data){
	
	for (int i=0;i< NUMBER_OF_BALLS;i++) {
		cpBody *ballBody = ballBodies[i];
		checkThresholdVelocity(ballBody);
	}
	
	//[audioPlayer play];
	
	return 1;
}


- (void)tick:(NSTimer *)timer { // Called at each "frame" of the simulation
	cpSpaceStep(space, 1.0f/20.0f);
	cpSpaceHashEach(space->activeShapes, &updateShape, nil);
	[self checkGameComplete ];
	
	tickCount++;
	
	if(tickCount % 30){
		int time = tickCount/30;
		int seconds = time % 60;
		int minutes = (time - seconds) / 60;
		game.timeTextField.text = [NSString stringWithFormat:@"%i:%i", minutes, seconds];		
	}
	
}

- (void)startMenu:(SPEvent*)event{
	[self onGameComplete];
	[game startStage:-1];
	
}

- (void)onReset:(SPEvent*)event{
	[self onGameComplete];
	[game.playFieldSprite removeAllChildren];
	[game startStage:1];
	
	
}


-(void)pauseGame:(SPEvent*)event{
	gamePaused = YES;
	[gameTimer invalidate];
	[self showButtons];
}

- (void)startNextStage:(SPEvent*)event{
	[game startStage:2];
	
}


- (void)unPauseGame:(SPEvent*)event{
	gamePaused =NO;
	for(SPDisplayObject *button in menuButtons){
		[game.playFieldSprite removeChild:button];
	}
	[self startGameTimer];
}

-(void)showButtons{
	SPImage *image = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"menuBackground.png"]];
	image.x = 30; 
	image.y=80;
	[menuButtons addObject:image];
	[game.playFieldSprite addChild:image];
	
	SPButton *button;
	if(gamePaused){
	  button=[game addButton:self : @"Continue..": @"button.png" selector:  @selector(unPauseGame:) : 150 : 0];
   	  [menuButtons addObject:button];
	}
	button = [game addButton:self : @"Menu": @"button.png" selector:  @selector(startMenu:) : 100 : 0];
	[menuButtons addObject:button];
	
	button = [game addButton:self : @"Restart":@"button.png" selector:  @selector(onReset:) : 50 : 0];
	[menuButtons addObject:button];

}

- (void)onGameComplete{
	gameComplete =YES;
	[self showButtons];
	
	NSLog(@"Game complete");
	[gameTimer invalidate];
	tickCount =0;
	
}


-(void)checkGameComplete{
	int countBallCompleted=0;
		for (int i=0;i< NUMBER_OF_BALLS;i++) {
			cpBody *ballBody = ballBodies[i];
			if(ballBody->p.x  > finishPoints[0][0] && ballBody->p.y  > finishPoints[0][1] 
			    && ballBody->p.x  < finishPoints[1][0] && ballBody->p.y  > finishPoints[1][1] 
			    && ballBody->p.x  > finishPoints[2][0] && ballBody->p.y  < finishPoints[2][1] 
			    && ballBody->p.x  < finishPoints[3][0] && ballBody->p.y  < finishPoints[3][1] ) {
					
				countBallCompleted++;
				
			}else{
				//NSLog(@"Game :%d %d",ballBody->p.x,ballBody->p.y);
				break;
			}
		}
	if(countBallCompleted == NUMBER_OF_BALLS){
		[self onGameComplete];
	}
	
	
}


-(void)touchesDirectionBegan:(SPTouchEvent*)event {
	SPDisplayObject* currentObject = (SPDisplayObject*)[event target];
	float touchX=currentObject.x;
	float touchY=currentObject.y;
	int force=20;
	for (int i=0; i<  NUMBER_OF_BALLS;i++) {
		cpBody *ballBody = ballBodies[i];
		if(touchX == 0){
			//ballBody->v.x= -force;
			space->gravity.x =-force; 
		}else if(touchX == 80){
			space->gravity.x= force;
		}else if(touchY == 370){
			space->gravity.y= -force;
		}else if(touchY == 430){
			space->gravity.y= force;
		}else if(touchX == 39){
			space->gravity.x= space->gravity.y= 0;
		}
	}
	
}



- (void)accelerometer:(UIAccelerometer*)accelerometer didAccelerate:(UIAcceleration*)acceleration {
	cpSpaceStep(space, 1.0f/20.0f);
	
	cpSpaceHashEach(space->activeShapes, &updateShape, nil);
	
	static float prevX=0, prevY=0;
	
	float accelX = acceleration.x * kFilterFactor + (1- kFilterFactor)*prevX;
	float accelY = acceleration.y * kFilterFactor + (1- kFilterFactor)*prevY;
	
	prevX = accelX;
	prevY = accelY;
	
	if(accelX > 0.04 || accelX < -0.04 || accelY >0.04 || accelY < -0.04 ){
		cpVect v = cpv( accelX, accelY);
		v = cpvmult(v, 80);
		cpBody *ballBody;
		space->gravity.x= v.x;
		space->gravity.y= -v.y;
		/*for (int i=0;i < NUMBER_OF_BALLS; i++) {
			ballBody = ballBodies[i];
			ballBody->v.x = v.x;
			ballBody->v.y = -v.y;
		}*/		
	}
	//NSLog(@"accel x,y : %f,%f", accelX,accelY );
		
	
}

-(void)touchesBegan:(SPTouchEvent*)event {
	SPDisplayObject* currentObject = (SPDisplayObject*)[event target];
	
	float touchX=currentObject.x;
	float touchY=currentObject.y;
	NSLog(@"touch x,y =  %f, %f", touchX, touchY );

	
}	

// Updates a shape's visual representation (i.e. sprite)
void updateShape(void *ptr, void* unused) {
	cpShape *shape = (cpShape*)ptr;
	
	if(shape == nil || shape->body == nil || shape->data == nil) {
		NSLog(@"Unexpected shape please debug here...");
		return;
	}

	if([shape->data isKindOfClass:[SPImage class]]) {
		SPImage *image = (SPImage *)shape->data;
		image.x= shape->body->p.x;
		image.y= shape->body->p.y;
		
	}
	else
		NSLog(@"The shape data wasn't updateable using this code.");
}

- (void) addDirectionButton: (int) x :  (int) y  {
	SPImage *image = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"violetBall.png"]];
	image.x = x; 
	image.y= y;
	
	[game.playFieldSprite addChild:image];
	[image addEventListener:@selector(touchesDirectionBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	
}

// load components end

-(void) loadDirectionKeys{
    [self addDirectionButton: 0 : 400];
	[self addDirectionButton: 80 : 400];
	[self addDirectionButton: 40 : 370];
	[self addDirectionButton: 40 : 430];
	[self addDirectionButton: 39 : 400];
	
}

- (void)start{
	NUMBER_OF_BALLS = 2 * game.difficulty;
	NSLog(@"Starting game with balls: %d",NUMBER_OF_BALLS);
	[self loadComponents];
	[self setupChipmuck];
	
	
	self.accelerometer = [UIAccelerometer sharedAccelerometer];
	self.accelerometer.updateInterval =  0.2; 
	self.accelerometer.delegate = self;
	
}

@end
