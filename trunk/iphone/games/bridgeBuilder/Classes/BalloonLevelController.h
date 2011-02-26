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


@interface BalloonLevelController : NSObject {
	
	NSMutableArray *balloonTextures;
	BOOL resetButtonVisible;
	Game *game;

}
@property (nonatomic, retain) Game *game;


- (void)start;

@end
