//
//  ButterflyLevelController.h
//  TouchTouch
//
//  Created by sandeep m on 08/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "Game.h"

@interface ButterflyLevelController : SPStage {
	
	NSMutableArray *balloonTextures;
	BOOL resetButtonVisible;
	Game *game;
	
}
@property (nonatomic, retain) Game *game;


- (void)start;


@end
