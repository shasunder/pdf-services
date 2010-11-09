//
//  MenuController.m
//  TouchTouch
//
//  Created by sandeep m on 11/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "MenuController.h"
#import "Constants.h"

@implementation MenuController
@synthesize game;


//load components 

- (void) loadBackgroundMusic {
//	NSString *path = [[NSBundle mainBundle] pathForResource:BACKGROUND_MUSIC_MP3 ofType:@"mp3"];  
//	[game playMusic: path];

		
}

- (void) loadButtons {
		
	[game setBackground:DEFAULT_BACKGROUND];
		
	[self addButton:self : @"Maze 1" :@"level-maze1.png" selector:  @selector(startStage1:) : -75 : -100];
	
	[game addButton:self : @"Back":@"button.png" selector:  @selector(startDifficulty:) : 0 : 175
	 ];

	
}


- (void)startStage1:(SPEvent*)event{
	[game startStage:1];
	
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


- (SPButton *) addButton:(NSObject *) thatObject: (NSString *) buttonLabel :(NSString *)imageName selector: (NSObject *) selector :(NSInteger)posX : (NSInteger)posY  {
	
	SPButton *button = [SPButton buttonWithUpState:[SPTexture textureWithContentsOfFile:imageName]];
	button.x = game.width/2-button.width/2 + posX;
	button.y = game.height/2-button.height/2 + posY;
	
	[button addEventListener:selector atObject:thatObject forType:SP_EVENT_TYPE_TRIGGERED];
	
	SPTextField *label = [SPTextField textFieldWithText:buttonLabel];
	label.x = button.x;
	label.y = button.y + button.height+ 2;
	label.fontName = DEFAULT_FONTNAME_BOLD;
	label.width = 90;
	label.height = 14;
	label.fontSize=14;
	label.color = COLOR_DARKBROWN;
	
	[game.playFieldSprite addChild:button];
	[game.playFieldSprite addChild:label];
	return button;
	
}


- (void)start{
	[self loadComponents];		
}


@end
