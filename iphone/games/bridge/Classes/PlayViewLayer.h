//
//  PlayView.h
//  bridge
//
//  Created by sandeep m on 09/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "cocos2d.h"
#import "CocosUtility.h"
#import "Bridge.h"
#import "PlayScene.h"

@interface PlayViewLayer : CCLayer {
	Bridge *bridge;
	
	CCRenderTexture* target;
	CCSprite* brush;
}

@end
