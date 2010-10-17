//
//  MenuController.m
//  TouchTouch
//
//  Created by sandeep m on 11/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "MenuController.h"


@implementation MenuController
@synthesize game;


//load components 

- (void) loadBackgroundMusic {
	NSString *path = [[NSBundle mainBundle] pathForResource:@"good_adventure_208675_SOUNDDOGS__fo" ofType:@"mp3"];  
	[game playMusic: path];

		
}

- (void) loadButtons {
		
	SPImage *backgroundImage = [SPImage imageWithContentsOfFile:@"background-wood4.png"];
	[game addChild:backgroundImage];
		
	[game addButton:self : @"Balloon" :@"level-balloon.png" selector:  @selector(startStageBalloon:) : -75 : -100];
	[game addButton:self : @"Butterfly":@"level-butterfly.png" selector:  @selector(startStageButterfly:) : 75 : -100 ];
	[game addButton:self : @"UFO":@"level-butterfly.png" selector:  @selector(startStageButterfly:) : -75 : 50 ];
	[game addButton:self : @"Animals":@"level-butterfly.png" selector:  @selector(startStageButterfly:) : 75 : 50 ];
	
	[game addButton:self : @"Back":@"button.png" selector:  @selector(startDifficulty:) : 0 : 175
	 ];

	
}


- (void)startStageBalloon:(SPEvent*)event{
	[game startStage:1];
	
}

- (void)startStageButterfly:(SPEvent*)event{
	[game startStage:2];
	
}

-(void) loadComponents{
	
	[self loadButtons];	
	[self loadBackgroundMusic];
	[game addChild:game.playFieldSprite];
	
	
}
// load components end

- (void)startNextStage:(SPEvent*)event{
	[game startStage:2];
	
}

- (void)startMenu:(SPEvent*)event{
	[game startStage:-1];
	
}

- (void)startDifficulty:(SPEvent*)event{
	[game startStage:-2];
	
}

- (void)start{
	[self loadComponents];		
}

@end
