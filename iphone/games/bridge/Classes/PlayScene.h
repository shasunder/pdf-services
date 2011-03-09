//
//  PlayScene.h
//  bridge
//
//  Created by sandeep m on 09/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "cocos2d.h"
#import "Bridge.h"
#import "Constants.h"
#import "BridgeContext.h"


@interface PlayScene : CCLayer {
	Bridge *bridge;

}

+(id) scene;
@end
