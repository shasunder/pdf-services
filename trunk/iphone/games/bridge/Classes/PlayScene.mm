//
//  PlayScene.m
//  bridge
//
//  Created by sandeep m on 09/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "PlayScene.h"
#import "PlayViewLayer.h"

@implementation PlayScene


+(id) scene
{
	PlayScene *scene = [PlayScene node];
	PlayViewLayer *playView =[PlayViewLayer node];
	
	
	[[BridgeContext instance] setValue:scene forKey :KEY_SCENE];
	
	[scene addChild: playView z:0 tag:1];
	
	return scene;
}

- (void) dealloc{
	[super dealloc];
}

@end
