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
#import "Constants.h"
#import "Box2D.h"
#import "GLES-Render.h"

#define PTM_RATIO 32.0
@interface PlayViewLayer : CCLayer {
	Bridge *bridge;
	
	CCRenderTexture* target;
	CCSprite* brush;
	
	b2World* _world;
	b2Body* _body;
	CCSprite* _ball;
}

@end
