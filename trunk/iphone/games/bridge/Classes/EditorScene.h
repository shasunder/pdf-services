//
//  BridgeEditor.h
//  bridge
//
//  Created by sandeep m on 27/02/2011.
//  Copyright 2011 bri. All rights reserved.
//
#import "cocos2d.h"
#import "Bridge.h"
#import "Constants.h"

@interface EditorScene : CCScene{
	Bridge *bridge;
}

@property(nonatomic, retain)Bridge *bridge;

+(id) scene;

@end
