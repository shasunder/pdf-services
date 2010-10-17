//
//  DifficultyController.m
//  TouchTouch
//
//  Created by sandeep m on 17/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "DifficultyController.h"


@implementation DifficultyController
@synthesize game;


//load components 

- (void) loadBackgroundMusic {
	NSString *path = [[NSBundle mainBundle] pathForResource:@"good_adventure_208675_SOUNDDOGS__fo" ofType:@"mp3"];  
	[game playMusic: path];
	
	
}

- (void) loadButtons {
	
	SPImage *backgroundImage = [SPImage imageWithContentsOfFile:@"background-wood4.png"];
	[game addChild:backgroundImage];
	
	[game addButton:self : @"Newbie" :@"button.png" selector:  @selector(setDifficulty:) : 0 : -150];
	[game addButton:self : @"Medium":@"button.png" selector:  @selector(setDifficulty:) : 0 :-100 ];
	[game addButton:self : @"Expert":@"button.png" selector:  @selector(setDifficulty:) : 0 : -50 ];

	
	[game addButton:self : @"Settings" :@"button.png" selector:  @selector(setDifficulty:) : 0 : 50];

	[game addButton:self : @"Start":@"button.png" selector:  @selector(startMenu:) : 0 : 100 ];

	
}


- (void)setDifficulty:(SPEvent*)event{
	game.difficulty = 1;
	//[game startStage:1];
	
}

- (void)startMenu:(SPEvent*)event{
	[game startStage:-1];
	
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
