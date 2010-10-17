//
//  Game.h
//  AppScaffold
//
//  Created by Daniel Sperl on 14.01.10.
//  Copyright 2010 Incognitek. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "Sparrow.h" 
#import <AVFoundation/AVFoundation.h>

@interface Game : SPStage{
SPView *sparrowView;
SPSprite *playFieldSprite;

NSInteger currentStage;
NSInteger score;
NSInteger level;
NSInteger difficulty;

SPTextField *scoreTextField;
SPTextField *levelTextField;

AVAudioPlayer *audioPlayer;
}

@property (nonatomic) NSInteger score;
@property (nonatomic) NSInteger level;
@property (nonatomic) NSInteger currentStage;
@property (nonatomic) NSInteger difficulty;

@property (nonatomic, retain) SPSprite *playFieldSprite;
@property (nonatomic, retain) SPTextField *scoreTextField;
@property (nonatomic, retain) SPTextField *levelTextField;

@property (nonatomic, retain) AVAudioPlayer *audioPlayer;

-(void)clear;
- (void)startStage:(NSInteger ) stageNo;
- (void) playMusic: (NSString *) path;
- (void) addButton: (NSObject *) thatObject: (NSString *) buttonLabel selector: (NSObject *) selector:(NSInteger )posX : (NSInteger )posY;

@end
