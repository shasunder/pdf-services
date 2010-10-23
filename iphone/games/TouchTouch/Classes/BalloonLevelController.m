//
//  LevelBalloons.m
//  TouchTouch
//
//  Created by sandeep m on 08/10/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "BalloonLevelController.h"
#import "Constants.h"

@implementation BalloonLevelController

@synthesize game;

//load components 

- (void) loadBackgroundMusic {
	NSLog(@"Loading music");
	NSString *path = [[NSBundle mainBundle] pathForResource:@"music" ofType:@"caf"];  
	[game playMusic: path];

	
}
- (void) loadScoreFields {
	game.score = 0;
	game.level = 1;
	
	game.scoreTextField = [SPTextField textFieldWithText:[NSString stringWithFormat:@"Score: %d", game.score]];
	game.levelTextField = [SPTextField textFieldWithText:[NSString stringWithFormat:@"Level: %d", game.level]];
	
	[game setBackground:BACKGROUND_BALLOON];
	
	
	game.scoreTextField.fontName = DEFAULT_FONTNAME_BOLD;
	game.scoreTextField.x = 160;
	game.scoreTextField.y = 7;
	game.scoreTextField.vAlign = SPVAlignTop;
	game.scoreTextField.hAlign = SPHAlignRight;
	game.scoreTextField.fontSize = 25;
	
	[game addChild:game.scoreTextField];
	
	game.levelTextField.fontName = DEFAULT_FONTNAME_BOLD;
	game.levelTextField.x = 0;
	game.levelTextField.y = 7;
	game.levelTextField.vAlign = SPVAlignTop;
	game.levelTextField.fontSize = 25;
	
	[game addChild:game.levelTextField];
	
}



-(void)loadBalloons{
	balloonTextures = [NSMutableArray array];
	NSLog([NSString stringWithFormat:@"Loading balloons "]);
	
	NSArray *images=[NSArray arrayWithObjects:@"balloon1.png", @"balloon2.png", @"balloon3.png", @"balloon4.png",
					 @"balloon5.png",@"balloon6.png", @"balloon7.png",@"balloon8.png",
					 @"balloon9.png" , nil];
	
	for (int i=0; i< [images count]; i++) {
		[balloonTextures addObject:[SPTexture textureWithContentsOfFile:[images objectAtIndex:i] ]];		
		[balloonTextures retain];
	}
	
	
	
}

-(void) loadComponents{
	
	[self loadScoreFields];	
	[self loadBackgroundMusic];
	[self loadBalloons];
	[game addChild:game.playFieldSprite];
	
}
// load components end

-(void)movementThroughTopOfScreen:(SPEvent*)event
{
	[game.juggler removeAllObjects];
	
	if(resetButtonVisible == NO){
		resetButtonVisible = YES;
	}
	
	[game setBackground:BACKGROUND_BALLOON];

	[game addButton:self : @"Home": @"button.png" selector:  @selector(startMenu:) : 0 : -50];
	[game addButton:self : @"Replay" : @"button.png" selector:  @selector(onReset:) : 0 : 0];

	if(game.level > 19){
		NSString *path = [[NSBundle mainBundle] pathForResource:@"clap_494109_SOUNDDOGS__me" ofType:@"mp3"];  
		[game playMusic: path];
		[game addButton:self : @"Next Level" : @"button.png" selector:  @selector(startNextStage:) : 0 : 50];
	}
		
}


-(void)addBalloon{
	SPImage *image = [SPImage imageWithTexture:[balloonTextures objectAtIndex:arc4random() % balloonTextures.count]];
	
	image.x = (arc4random() % (int)(game.width-image.width));
	image.y = game.height;
	
	
	[game.playFieldSprite addChild:image];
	
	SPTween *tween = [SPTween tweenWithTarget:image
										 time:(double)((arc4random() % 5) + 2)
								   transition:SP_TRANSITION_LINEAR];
	
	[tween animateProperty:@"x" targetValue:arc4random() % (int)(game.width-image.width)];
	[tween animateProperty:@"y" targetValue:-image.height];
	[game.juggler addObject:tween];
	
	[image addEventListener:@selector(onTouchBalloon:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	
	[tween addEventListener:@selector(movementThroughTopOfScreen:) atObject:self forType:SP_EVENT_TYPE_TWEEN_COMPLETED];
	
}


- (void)onReset:(SPEvent*)event
{
	[game.playFieldSprite removeAllChildren];
	
	resetButtonVisible = NO;
	
	game.level = 1;
	game.score = 0;
	game.levelTextField.text = [NSString stringWithFormat:@"Level: %d", game.level];
	game.scoreTextField.text = [NSString stringWithFormat:@"Score: %d", game.score];
	
	[self addBalloon];
}

- (void)startNextStage:(SPEvent*)event{
	[game startStage:2];
	
}

- (void)startMenu:(SPEvent*)event{
	[game startStage:-1];
	
}


-(void)onTouchBalloon:(SPTouchEvent*)event{
	SPDisplayObject* currentBalloon = (SPDisplayObject*)[event target];
	[currentBalloon removeEventListener:@selector(onTouchBalloon:) atObject:self forType:SP_EVENT_TYPE_TOUCH];
	
	game.score+=10;
	game.scoreTextField.text = [NSString stringWithFormat:@"Score: %d", game.score];
	
	[[SPSound soundWithContentsOfFile:@"bubble.caf"] play];
	[game.juggler removeTweensWithTarget:currentBalloon];
	
	SPTween *tween = [SPTween tweenWithTarget:currentBalloon time:0.35 transition:SP_TRANSITION_LINEAR];
	[tween animateProperty:@"scaleX" targetValue:0.75];
	[tween animateProperty:@"scaleY" targetValue:1.25];
	[game.juggler addObject:tween];
	
	tween = [SPTween tweenWithTarget:currentBalloon time:(game.height-currentBalloon.y)/game.height transition:SP_TRANSITION_LINEAR];
	[tween animateProperty:@"y" targetValue:game.height+currentBalloon.height];
	[game.juggler addObject:tween];
	
	[tween addEventListener:@selector(balloonPopped:) atObject:self forType:SP_EVENT_TYPE_TWEEN_COMPLETED];
	
}

-(void)drawBalloons{
	for(int i = 0; i < game.level + game.difficulty; i++){
		[self addBalloon];
	}
}

-(void)balloonPopped:(SPEvent*)event{
	SPTween *animation = (SPTween*)[event target];
	SPDisplayObject *currentBalloon = (SPDisplayObject*)[animation target];
	
	[game.playFieldSprite removeChild:currentBalloon];
	
	if(game.playFieldSprite.numChildren == 0){
		game.level = game.level+1;
		game.levelTextField.text = [NSString stringWithFormat:@"Level: %d", game.level];
		[self drawBalloons];
	}
	
}



- (void)start{
	[self loadComponents];		
	[self addBalloon];
}
@end
