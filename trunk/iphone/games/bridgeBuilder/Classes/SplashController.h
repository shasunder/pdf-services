//
//  SplashController.h
//  TouchTouch
//
//  Created by sandeep m on 17/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "Sparrow.h" 
#import "Game.h" 


@interface SplashController : NSObject {
	
	NSMutableArray *balloonTextures;
	Game *game;
	
}
@property (nonatomic, retain) Game *game;


- (void)start;

@end
