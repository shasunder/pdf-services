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


cpBody *ballBody;
cpBody *ballBody2;

int i=0;
AVAudioPlayer *audioPlayer;
int COLL_BALL=0;
int COLL_WALL=1;
float WALL_ELASTICITY=0.0;
float WALL_FRICTION=0.0;

int mazeRowsPos[10][11]	= { 
	{0, 0, 1 ,1, 0, 0, 0, 0, 0, 0 ,0},
	{0, 0, 0 ,1, 0, 0, 1, 1, 1, 1 ,1},
	{0, 0, 1 ,1, 0, 0, 0, 1, 1, 0 ,0},
	{1, 1, 1 ,0, 0, 0, 0, 1, 1, 0 ,0},
	{0, 1, 1 ,1, 0, 0, 1, 1, 1, 0 ,1},
	{0, 0, 0 ,0, 0, 1, 1, 1, 0, 0 ,0},
	{0, 0, 1 ,1, 1, 1, 1, 1, 0, 0 ,0},
	{0, 0, 0 ,0, 0, 1, 1, 1, 1, 1 ,1},
	{0, 1, 1 ,1, 1, 0, 0, 0, 0, 0 ,0},
	{0, 0, 0 ,0, 0, 0, 0, 0, 0, 0 ,0},

					}; 

int mazeColsPos[10][11] = { 
	{0, 0, 0 ,0, 1, 1, 0, 1, 1, 0, 0},
	{1, 1, 0 ,0, 1, 0, 0, 1, 0, 0, 0},
	{1, 1, 0 ,1, 1, 1, 0, 0, 0, 0, 0},
	{1, 0, 0 ,1, 1, 1, 1, 0, 0, 0, 0},
	{0, 0, 0 ,1, 1, 1, 1, 0, 0, 0, 0},
	{1, 0, 0 ,1, 1, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,0, 0, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,1, 0, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,1, 0, 0, 0, 0, 0, 0, 0},
	{1, 1, 0 ,1, 0, 0, 0, 0, 0, 0, 0}

						}; 


//load components 

- (void) loadBackgroundMusic {
	NSLog(@"Loading music");
	NSString *path = [[NSBundle mainBundle] pathForResource:@"music" ofType:@"caf"];  
	//[game playMusic: path];

	
}
- (void) loadScoreFields {
	game.score = 0;
	game.level = 1;
	
	game.scoreTextField = [SPTextField textFieldWithText:[NSString stringWithFormat:@"Score: %d", game.score]];
	game.levelTextField = [SPTextField textFieldWithText:[NSString stringWithFormat:@"Level: %d", game.level]];
	
	[game setBackground:BACKGROUND_BALLOON];
	
	
	game.scoreTextField.fontName = DEFAULT_FONTNAME_BOLD;
	game.scoreTextField.x = 160;
	game.scoreTextField.y = 7;
	game.scoreTextField.vAlign = SPVAlignTop;
	game.scoreTextField.hAlign = SPHAlignRight;
	game.scoreTextField.fontSize = 24;

	[game addChild:game.scoreTextField];
	
	game.levelTextField.fontName = DEFAULT_FONTNAME_BOLD;
	game.levelTextField.x = 0;
	game.levelTextField.y = 7;
	game.levelTextField.vAlign = SPVAlignTop;
	game.levelTextField.fontSize = 24;
	
	[game addChild:game.levelTextField];
	
}



-(void) loadComponents{
	
	[self loadScoreFields];	
	[self loadBackgroundMusic];
	[game addChild:game.playFieldSprite];
	
	[self loadDirectionKeys]; //temp
	
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



- (void)onReset:(SPEvent*)event
{
	[game.playFieldSprite removeAllChildren];
	
	game.level = 1;
	game.score = 0;
	game.levelTextField.text = [NSString stringWithFormat:@"Level: %d", game.level];
	game.scoreTextField.text = [NSString stringWithFormat:@"Score: %d", game.score];
	
	
}

- (void)startNextStage:(SPEvent*)event{
	[game startStage:2];
	
}

- (void)startMenu:(SPEvent*)event{
	[game startStage:-1];
	
}

- (void)start{
	[self loadComponents];
	[self setupChipmuck];
	
	
	self.accelerometer = [UIAccelerometer sharedAccelerometer];
	self.accelerometer.updateInterval =  0.2; 
	self.accelerometer.delegate = self;
	
}


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




//--chipmunk begins

- (void)setupChipmuck {
	cpInitChipmunk();
	
	space = cpSpaceNew();
	space->gravity = cpv(0, 0); 
	space->elasticIterations = 20;

	[NSTimer scheduledTimerWithTimeInterval:1.0f/60.0f target:self selector:@selector(tick:) userInfo:nil repeats:YES];

	//ball
	ball = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"metalBall.png"]];
	ballBody = cpBodyNew(100.0, INFINITY);
	addBall(60,250, ballBody , ball, space, game);
	[ball addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];

	ball2 = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"metalBall.png"]];
	ballBody2 = cpBodyNew(100.0, INFINITY);
	addBall(60,50, ballBody2 , ball2, space, game);
	[ball2 addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	
	
	// Create our floor's body and set it's position
	cpVect hVertices[] = {  cpv(160, 3), cpv(160, -3), cpv(-160, -3),cpv(-160,3) };
	cpVect vVertices[] = { cpv(3, 260), cpv(3, -260), cpv(-3, -260), cpv(-3, 260) };

	cpVect hBrickVertices[] = {  cpv(14, 0.4), cpv(14, -0.4), cpv(-14, -0.4),cpv(-14, 0.4) };
	cpVect vBrickVertices[] = { cpv(0.4, 12), cpv(0.4, -12), cpv(-0.4, -12), cpv(-0.4, 12) };
	
	//build maze with bricks
	int x=0,y=0;
	for (int i = 0; i< 10; i++) {
		for (int j = 0; j< 11; j++){
			if(mazeRowsPos[i][j] ==1){
				[self addBrick: x+5 :  y + 80: hBrickVertices : NO];
			}
			if(mazeColsPos[i][j] ==1){
				[self addBrick:  x + 30 :  y + 52: vBrickVertices : YES];
			}
			x= x+ 30;
		}
		y=y+30;
		x=0;
	}
	
	
		
	[self addWall: 315 : 40 : vVertices :YES ]; //wall right
	[self addWall: -9 : 40 : vVertices :YES ]; //wall left
	
	[self addWall: 0 : 40 : hVertices : NO]; //roof
	[self addWall: 0 : 350 : hVertices : NO]; //floor

	
	//init
	prepareSound(); //TODO: optimize sound play
	cpSpaceAddCollisionPairFunc(space, COLL_BALL, COLL_BALL, &ballCollision, self);
	cpSpaceAddCollisionPairFunc(space, COLL_BALL, COLL_WALL, &wallCollision, self);
	
	
	
}
void prepareSound(){
	NSString* resourcePath = [[NSBundle mainBundle] resourcePath];
	resourcePath = [resourcePath stringByAppendingString:@"/metalClang.mp3"];
	audioPlayer =[[AVAudioPlayer alloc] initWithContentsOfURL:[NSURL fileURLWithPath:resourcePath] error:NULL];  
	[audioPlayer prepareToPlay];
	[audioPlayer retain];
	[audioPlayer setNumberOfLoops:0];
	
}

void checkThresholdVelocity(cpBody *body) {
	int thresholdVelocity=40;
	if(body->v.x > thresholdVelocity || body->v.x < -thresholdVelocity || body->v.y >thresholdVelocity || body->v.y < -thresholdVelocity  ){
		body->v.x = 0;
 	    body->v.y = 0;
		// NSLog(@"reduced  %f %f",body->v.x,body->v.y);
		
	}
	
	
}

int wallCollision(cpShape *a, cpShape *b, cpContact *contacts,
				  int numContacts, cpFloat normal_coef, void *data){
	checkThresholdVelocity(ballBody);
	checkThresholdVelocity(ballBody2);
	return 1;
}

int ballCollision(cpShape *a, cpShape *b, cpContact *contacts,
				  int numContacts, cpFloat normal_coef, void *data)
{
	NSLog(@"collision %f %f",ballBody->v.x,ballBody->v.y);
	checkThresholdVelocity(ballBody);
	checkThresholdVelocity(ballBody2);

	//prepareSound();	//TODO:optimize
	
	//[audioPlayer play];
	
	return 1;
}


// Called at each "frame" of the simulation
- (void)tick:(NSTimer *)timer {
	cpSpaceStep(space, 1.0f/20.0f);
	
	cpSpaceHashEach(space->activeShapes, &updateShape, nil);
	//ballBody->v.x= 50;
	
}

-(void)touchesDirectionBegan:(SPTouchEvent*)event {
	SPDisplayObject* currentObject = (SPDisplayObject*)[event target];
	float touchX=currentObject.x;
	float touchY=currentObject.y;
	int force=20;
	if(touchX == 0){
		ballBody->v.x= -force;
	}else if(touchX == 80){
		ballBody->v.x= force;
	}else if(touchY == 370){
		ballBody->v.y= -force;
	}else if(touchY == 430){
		ballBody->v.y= force;
	}else if(touchX == 39){
		ballBody->v.x= 0;ballBody->v.y= 0;
	}
	
}

-(void)touchesBegan:(SPTouchEvent*)event {
	SPDisplayObject* currentObject = (SPDisplayObject*)[event target];
	
	float touchX=currentObject.x;
	float touchY=currentObject.y;
	
	int directionX=1,directionY=1;
	if(touchX < ballBody->p.x){
		directionX =-1;
	}
	if((480 - touchY) < ballBody->p.y){
		directionY =-1;
	}
	
	ballBody->v.x= 50 * directionX;
	ballBody->v.y=ballBody->v.y+ 50 *directionY;
	
	NSLog(@"touch x,y =  %f, %f", touchX, 480-touchY );
	NSLog(@"Ball x,y =  %f, %f",ballBody->p.x, ballBody->p.y );
	
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
		ballBody->v.x = v.x;
		ballBody->v.y = -v.y;
		ballBody2->v.x = v.x;
		ballBody2->v.y = -v.y;
	}
	//NSLog(@"accel x,y : %f,%f", accelX,accelY );
		
	
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


@end
