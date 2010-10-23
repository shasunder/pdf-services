//
//  UFOLevelController.h
//  TouchTouch
//
//  Created by sandeep m on 23/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "Game.h"



@interface UFOLevelController : SPStage {
	
	NSMutableArray *balloonTextures;
	BOOL resetButtonVisible;
	Game *game;
	
}
@property (nonatomic, retain) Game *game;


- (void)start;


@end
