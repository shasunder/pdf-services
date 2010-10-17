//
//  Game.m
//  AppScaffold
//
//  Created by Daniel Sperl on 14.01.10.
//  Copyright 2010 Incognitek. All rights reserved.
//

#import "Game.h" 
#import "BalloonLevelController.h" 
#import "ButterflyLevelController.h"
#import "MenuController.h"
#import "DifficultyController.h"
#import "SplashController.h"

@implementation Game


@synthesize scoreTextField;
@synthesize levelTextField;
@synthesize playFieldSprite;

@synthesize  currentStage;
@synthesize  score;
@synthesize  level;
@synthesize  difficulty;

@synthesize audioPlayer;

BalloonLevelController *levelController;

- (id)initWithWidth:(float)width height:(float)height{
	
	if (self = [super initWithWidth:width height:height]){
		playFieldSprite = [SPSprite sprite];
		[self startStage:-3];
		
    }
    return self;
}

-(void)clear{
	level=0;
	[audioPlayer stop];
	[playFieldSprite removeAllChildren];
}

- (void)startStage:(NSInteger ) stageNo{
	[self clear];
	if(levelController){
		[levelController release];
	}
	
	if (stageNo == 1) {
		levelController = [[BalloonLevelController alloc] init] ;
	}else if (stageNo == 2) {
		levelController = [[ButterflyLevelController alloc] init] ;
		
	}else if (stageNo == -1) {
		levelController = [[MenuController alloc] init] ;
		
	}else if (stageNo == -2) {
		levelController = [[DifficultyController alloc] init] ;
		
	}else if (stageNo == -3) {
		levelController = [[SplashController alloc] init] ;
		
	}
	
	
	currentStage = stageNo;
	levelController.game = self;
	
	[levelController start];		
	
}


- (void) playMusic: (NSString *) path  {
	if(audioPlayer){
		[audioPlayer stop];
	}
	
	audioPlayer =[[AVAudioPlayer alloc] initWithContentsOfURL:[NSURL fileURLWithPath:path] error:NULL];  
	
	[audioPlayer prepareToPlay];
	[audioPlayer setNumberOfLoops:5];
	[audioPlayer play];
	
}

- (SPButton *) addButton:(NSObject *) thatObject: (NSString *) buttonLabel :(NSString *)imageName selector: (NSObject *) selector :(NSInteger)posX : (NSInteger)posY  {
	SPButton *button = [SPButton buttonWithUpState:[SPTexture textureWithContentsOfFile:imageName]];
	button.x = self.width/2-button.width/2 + posX;
	button.y = self.height/2-button.height/2 + posY;
	button.fontName = @"Marker Felt";
	button.fontSize = 20;
	//button.fontColor = [UIColor whiteColor];
	button.text = buttonLabel;
	
	[button addEventListener:selector atObject:thatObject forType:SP_EVENT_TYPE_TRIGGERED];
	
	[self.playFieldSprite addChild:button];
	return button;
	
}

@end
