//
//  LevelBalloons.h
//  TouchTouch
//
//  Created by sandeep m on 08/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "Sparrow.h" 
#import "Game.h" 
#import "chipmunk.h"
#import "OrderedDictionary.h"

@interface MazeLevelController : NSObject<UIAccelerometerDelegate> {
	SPImage *ball; 
	SPImage *ball2;
	
	SPImage *verticalWallLeft;
	SPImage *verticalWallMid;
	
	cpSpace *space; 
	UIAccelerometer *accelerometer;
		
	Game *game;

}
@property (nonatomic, retain) Game *game;

@property ( retain) UIAccelerometer *accelerometer;

- (void)setupChipmuck; 
- (void)tick:(NSTimer *)timer; 

void updateShape(void *ptr, void* unused); 
int ballCollision(cpShape *a, cpShape *b, cpContact *contacts,
				  int numContacts, cpFloat normal_coef, void *data);
int wallCollision(cpShape *a, cpShape *b, cpContact *contacts,
				  int numContacts, cpFloat normal_coef, void *data);


- (void)start;

@end
