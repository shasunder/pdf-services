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

@implementation MazeLevelController

@synthesize game;
@synthesize accelerometer;
@synthesize lastAcceleration;


cpBody *ballBody;
cpBody *ballBody2;

int i=0;
AVAudioPlayer *audioPlayer;
int COLL_BALL=0;
int COLL_WALL=1;
float WALL_ELASTICITY=0.5;
float WALL_FRICTION=0.0;

//load components 

- (void) loadBackgroundMusic {
	NSLog(@"Loading music");
	NSString *path = [[NSBundle mainBundle] pathForResource:@"music" ofType:@"caf"];  
	[game playMusic: path];

	
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
	
	ball = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"metalBall.png"]];
	ball.x=60;	ball.y=200;
	
	floor = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"horizontalBar.png"]];
	floor.x = 0; floor.y=40;
	
	roof = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"horizontalBar.png"]];
	roof.x = 0; roof.y=360;
	
	verticalWallRight = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"verticalBar.png"]];
	verticalWallRight.x = 310; verticalWallRight.y=50;
	
	verticalWallLeft = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"verticalBar.png"]];
	verticalWallLeft.x = 0; verticalWallLeft.y=50;
		
	verticalWallMid = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"verticalBar.png"]];
	verticalWallMid.x = 160; verticalWallMid.y=-50;
	
	[game.playFieldSprite addChild:ball];
	[game.playFieldSprite addChild:floor];
	[game.playFieldSprite addChild:roof];
	[game.playFieldSprite addChild:verticalWallRight];
	[game.playFieldSprite addChild:verticalWallLeft];
	[game.playFieldSprite addChild:verticalWallMid];
	
	[ball addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	[verticalWallRight addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	[verticalWallLeft addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	[verticalWallMid addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	[floor addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	[roof addEventListener:@selector(touchesBegan:) atObject:self forType:SP_EVENT_TYPE_TOUCH];

	
	
}
// load components end


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

//--chipmunk begins

- (void)setupChipmuck {
	cpInitChipmunk();
	
	space = cpSpaceNew();
	space->gravity = cpv(0, 0); 
	space->elasticIterations = 20;

	[NSTimer scheduledTimerWithTimeInterval:1.0f/60.0f target:self selector:@selector(tick:) userInfo:nil repeats:YES];

	//ball body and shape
	
	ballBody = cpBodyNew(100.0, INFINITY);
	ballBody->p = cpv(60, 250);
	
	cpSpaceAddBody(space, ballBody);
	
	cpShape *ballShape = cpCircleShapeNew(ballBody, 20.0, cpvzero);
	ballShape->e = 2.5; ballShape->u = 0.0; ballShape->collision_type = COLL_BALL;
	ballShape->data = ball; 
		
	cpSpaceAddShape(space, ballShape);
	
	// Create our floor's body and set it's position
	cpBody *floorBody = cpBodyNew(INFINITY, INFINITY);
	floorBody->p = cpv(160, 20);
	
	// Define our shape's vertexes
	cpVect verts1[] = {  cpv(158.0f, 5.0f), cpv(158.0f, -4.0f), cpv(-159.0f, -5.0f),cpv(-159.0f, 4.0f) };
	
	
	// Create all shapes
	cpShape *floorShape = cpPolyShapeNew(floorBody, 4, verts1, cpv(0,0));
	floorShape->e = WALL_ELASTICITY; floorShape->u = WALL_FRICTION; floorShape->collision_type = COLL_WALL;
	floorShape->data = floor;

	cpSpaceAddStaticShape(space, floorShape);
	
	
	//custom
	cpBody *roofBody = cpBodyNew(INFINITY, INFINITY);
	roofBody->p = cpv(160, 340);
	
	cpShape *roofShape = cpPolyShapeNew(roofBody, 4, verts1, cpv(0,0));
	roofShape->e = WALL_ELASTICITY; roofShape->u = WALL_FRICTION; roofShape->collision_type = COLL_WALL;
	roofShape->data = roof;
	
	cpSpaceAddStaticShape(space, roofShape);
	
	//wall right
	cpVect verts[] = { cpv(5, 259.0), cpv(5, -259.0), cpv(-5, -259.0f), cpv(-5, 259.0f) };
	
	
	cpBody *verticalBodyRight = cpBodyNew(INFINITY, INFINITY);
	verticalBodyRight->p = cpv(280, 200); //Cog?
	
	cpShape *verticalShapeRight = cpPolyShapeNew(verticalBodyRight, 4, verts, cpv(0.0,0.0 ));
	verticalShapeRight->e =WALL_ELASTICITY; verticalShapeRight->u = WALL_FRICTION;verticalShapeRight->collision_type = COLL_WALL; 
	verticalShapeRight->data = verticalWallRight;
	
	cpSpaceAddStaticShape(space, verticalShapeRight);
	
	//wall left	
	
	cpBody *verticalBodyLeft = cpBodyNew(INFINITY, INFINITY);
	verticalBodyLeft->p = cpv(-25, 200); //Cog?
	
	cpShape *verticalShapeLeft = cpPolyShapeNew(verticalBodyLeft, 4, verts, cpv(0.0,0.0 ));
	verticalShapeLeft->e = WALL_ELASTICITY; verticalShapeLeft->u = WALL_FRICTION; verticalShapeRight->collision_type = COLL_WALL;
	verticalShapeLeft->data = verticalWallLeft;
	cpSpaceAddStaticShape(space, verticalShapeLeft);
	
	
	//wall mid	
	
	cpBody *verticalBodyMid = cpBodyNew(INFINITY, INFINITY);
	verticalBodyMid->p = cpv(140, -10); //Cog?
	
	cpShape *verticalShapeMid = cpPolyShapeNew(verticalBodyMid, 4, verts, cpv(0.0,0.0 ));
	verticalShapeMid->e = WALL_ELASTICITY; verticalShapeMid->u = WALL_FRICTION; verticalShapeMid->collision_type = COLL_WALL;
	verticalShapeMid->data = verticalWallMid;
	
	cpSpaceAddStaticShape(space, verticalShapeMid);
	
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
	int thresholdVelocity=75;
	if(body->v.x > thresholdVelocity || body->v.x < -thresholdVelocity || body->v.y >thresholdVelocity || body->v.y < -thresholdVelocity  ){
		body->v.x = 50 *  (body->v.x / body->v.x);
 	    body->v.y =50 *  (body->v.y / body->v.y);
		// NSLog(@"reduced  %f %f",body->v.x,body->v.y);
		
	}
	
	
}

int wallCollision(cpShape *a, cpShape *b, cpContact *contacts,
				  int numContacts, cpFloat normal_coef, void *data){
	checkThresholdVelocity(ballBody);
	return 1;
}

int ballCollision(cpShape *a, cpShape *b, cpContact *contacts,
				  int numContacts, cpFloat normal_coef, void *data)
{
	NSLog(@"collision %f %f",ballBody->v.x,ballBody->v.y);
	checkThresholdVelocity(ballBody);
	
	prepareSound();	//TODO:optimize
	
	[audioPlayer play];
	
	return 1;
}


// Called at each "frame" of the simulation
- (void)tick:(NSTimer *)timer {
	cpSpaceStep(space, 1.0f/20.0f);
	
	cpSpaceHashEach(space->activeShapes, &updateShape, nil);
	//ballBody->v.x= 50;
	
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
	ballBody->v.y=ballBody->v.y+ 10 *directionY;
	
	NSLog(@"touch x,y =  %f, %f", touchX, 480-touchY );
	NSLog(@"Ball x,y =  %f, %f",ballBody->p.x, ballBody->p.y );
	
}	

static BOOL accelerationIsShaking(UIAcceleration* last, UIAcceleration* current, double threshold) {
	double
	deltaX = fabs(last.x - current.x),
	deltaY = fabs(last.y - current.y),
	deltaZ = fabs(last.z - current.z);
	
	return
	(deltaX > threshold && deltaY > threshold) ||
	(deltaX > threshold && deltaZ > threshold) ||
	(deltaY > threshold && deltaZ > threshold);
}


- (void)accelerometer:(UIAccelerometer*)accelerometer didAccelerate:(UIAcceleration*)acceleration {
	cpSpaceStep(space, 1.0f/20.0f);
	
	cpSpaceHashEach(space->activeShapes, &updateShape, nil);
	float vX,vY;
	int forceX=50, forceY=10;
	if (acceleration.x>0) vX = 1; else vX = -1;
    if (acceleration.y>0) vY = 1; else vY = -1;
    
	
	if (self.lastAcceleration) {
		if (accelerationIsShaking(self.lastAcceleration, acceleration, 0.2)) {
			ballBody->v.x= forceX * vX;
			ballBody->v.y=ballBody->v.y+ forceY *vY;
			NSLog(@"ballBody->v %f,%f", vX * forceX,vY * forceY );
		}
	}
	
	self.lastAcceleration = acceleration;
	
	
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
