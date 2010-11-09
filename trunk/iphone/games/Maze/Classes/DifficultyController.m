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
	
	SPImage *image = [SPImage imageWithTexture:[SPTexture textureWithContentsOfFile:@"menuBackground.png"]];
	image.x = 30; 
	image.y=80;
	[game.playFieldSprite addChild:image];
	
	[game addButton:self : @"Newbie" :@"button.png" selector:  @selector(setDifficulty1:) : 150 : 0];
	[game addButton:self : @"Medium":@"button.png" selector:  @selector(setDifficulty2:) : 100 :0 ];
	[game addButton:self : @"Expert":@"button.png" selector:  @selector(setDifficulty3:) : 50 : 0 ];

	
	[game addButton:self : @"Settings" :@"button.png" selector:  @selector(startSettings:) : 0 : 0];

	
	
}


- (void)setDifficulty1:(SPEvent*)event{
	game.difficulty = 1;
	[game startStage:-1];
	
}

- (void)setDifficulty2:(SPEvent*)event{
	game.difficulty = 2;
	[game startStage:-1];
	
}

- (void)setDifficulty3:(SPEvent*)event{
	game.difficulty = 3;
	[game startStage:-1];
	
}

- (void)startSettings:(SPEvent*)event{
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
