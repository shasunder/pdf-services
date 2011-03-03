//
//  BridgeEditor.h
//  bridge
//
//  Created by sandeep m on 27/02/2011.
//  Copyright 2011 bri. All rights reserved.
//
#import "cocos2d.h"
#define kFPS 60

#define kMinPlatformStep	50
#define kMaxPlatformStep	300
#define kNumPlatforms		10
#define kPlatformTopPadding 10

#define kMinBonusStep		30
#define kMaxBonusStep		50

enum {
	kSpriteManager = 0,
	kScoreLabel
};

@interface BridgeEditor : CCLayer
{
	CCTMXTiledMap *_tileMap;
    CCTMXLayer *_background;
}

@property (nonatomic, retain) CCTMXTiledMap *tileMap;
@property (nonatomic, retain) CCTMXLayer *background;


// returns a Scene that contains the HelloWorld as the only child
+(id) scene;

@end
