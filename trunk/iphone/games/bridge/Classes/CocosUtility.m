//
//  CocosUtility.m
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "CocosUtility.h"


@implementation CocosUtility

//common
+ (CGRect)getRectangle:(CCSprite *) sprite{
	CGSize s = [sprite.texture contentSize];
	return CGRectMake(-s.width / 2, -s.height / 2, s.width, s.height);
}

+ (BOOL)containsTouchLocation:(UITouch *)touch : (CCSprite *) sprite{
	return CGRectContainsPoint([self getRectangle:sprite], [sprite convertTouchToNodeSpaceAR:touch]);
}

@end
