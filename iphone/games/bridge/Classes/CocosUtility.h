//
//  CocosUtility.h
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "cocos2d.h"

@interface CocosUtility : CCSprite {

}

+ (CGRect)getRectangle:(CCSprite *) sprite;
+ (BOOL)containsTouchLocation:(UITouch *)touch : (CCSprite *) sprite;

@end
