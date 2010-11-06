//
//  DifficultyController.m
//  TouchTouch
//
//  Created by sandeep m on 17/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "DifficultyController.h"
#import "Constants.h"

@implementation DifficultyController
@synthesize game;


//load components 

- (void) loadBackgroundMusic {
	NSString *path = [[NSBundle mainBundle] pathForResource:BACKGROUND_MUSIC_MP3 ofType:@"mp3"];  
	[game playMusic: path];
	
	
}

- (void) loadButtons {
	
	[game setBackground:DEFAULT_BACKGROUND];
	
	[game addButton:self : @"Newbie" :@"button.png" selector:  @selector(startMenu:) : 0 : -150];
	[game addButton:self : @"Medium":@"button.png" selector:  @selector(startMenu:) : 0 :-90 ];
	[game addButton:self : @"Expert":@"button.png" selector:  @selector(startMenu:) : 0 : -30 ];

	
	[game addButton:self : @"Settings" :@"button.png" selector:  @selector(setDifficulty:) : 0 : 50];

	
	
}


- (void)setDifficulty:(SPEvent*)event{
	game.difficulty = 1;
	//[game startStage:1];
	
}

- (void)startMenu:(SPEvent*)event{
	[game startStage:1];
	
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
