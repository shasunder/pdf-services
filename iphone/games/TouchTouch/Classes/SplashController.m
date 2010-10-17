//
//  SplashController.m
//  TouchTouch
//
//  Created by sandeep m on 17/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "SplashController.h"


@implementation SplashController

@synthesize game;


//load components 

- (void) loadBackgroundMusic {
	//NSString *path = [[NSBundle mainBundle] pathForResource:@"good_adventure_208675_SOUNDDOGS__fo" ofType:@"mp3"];  
	//[game playMusic: path]
	
}

- (void) loadButtons {
	
	SPImage *backgroundImage = [SPImage imageWithContentsOfFile:@"background-wood4.png"];
	[game addChild:backgroundImage];
	
	[game addButton:self : @"Bri8 presents" :@"button.png" selector:  @selector(startDifficulty:) : 0 : 0];
		
	
}


- (void)startDifficulty:(SPEvent*)event{
	[game startStage:-2];
	
}

-(void) loadComponents{
	
	[self loadButtons];	
	[self loadBackgroundMusic];
	[game addChild:game.playFieldSprite];
	
	
}
// load components end

- (void)start{
	[self loadComponents];		
}

@end
