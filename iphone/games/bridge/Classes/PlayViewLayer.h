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
#import "DrawBridge.h"
@interface PlayViewLayer : CCLayer {
	Bridge *bridge;
	
	CCRenderTexture* target;
	CCSprite* brush;
	
	NSMutableArray *edges;
	
	b2World* world;

	GLESDebugDraw *m_debugDraw;
	
}

@end
