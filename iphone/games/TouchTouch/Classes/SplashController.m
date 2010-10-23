//
//  SplashController.m
//  TouchTouch
//
//  Created by sandeep m on 17/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "SplashController.h"
#import "Constants.h"

@implementation SplashController

@synthesize game;
NSTimer *splashTimer;

//load components 

- (void) loadBackgroundMusic {
	//NSString *path = [[NSBundle mainBundle] pathForResource:@"good_adventure_208675_SOUNDDOGS__fo" ofType:@"mp3"];  
	//[game playMusic: path]
	
}


- (void) loadButtons {
	
	[game setBackground:DEFAULT_BACKGROUND];
	 	
	SPTextField *label = [SPTextField textFieldWithText:@"Bri8"];
	label.x = 70;
	label.y = 180;
	label.fontName =  DEFAULT_FONTNAME_BOLD;
	label.width = 200;
	label.height = 80;
	label.fontSize=80;
	label.color = COLOR_DARKBROWN;
	
	SPTextField *label2 = [SPTextField textFieldWithText:@"Presents..."];
	label2.x = 130;
	label2.y = 250;
	label2.fontName = DEFAULT_FONTNAME;
	label2.width = 100;
	label2.height = 30;
	label2.fontSize=18;
	label2.color = COLOR_DARKBROWN;
	
	[game.playFieldSprite addChild:label];
	[game.playFieldSprite addChild:label2];
}


- (void)showDifficulty{
	[game startStage:-2];
	[splashTimer invalidate];
	splashTimer = nil;

}

-(void) loadComponents{
	
	[self loadButtons];	
	[self loadBackgroundMusic];
	[game addChild:game.playFieldSprite];
	
	splashTimer= [NSTimer scheduledTimerWithTimeInterval:1 
									 target:self 
								   selector:@selector(showDifficulty) 
								   userInfo:nil 
									repeats:NO];
		
	
}
// load components end

- (void)start{
	[self loadComponents];		
}

@end
