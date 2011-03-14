//
//  Edge.h
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//
#import "Box2D.h"
#import "cocos2d.h"

@interface Edge : NSObject {
	CGPoint start;
	CGPoint end;
	NSString *material;
	
	b2Body* body;
	CCSprite* image;
}
@property (nonatomic) CGPoint start;
@property (nonatomic) CGPoint end;
@property (nonatomic, retain) NSString *material;
@property (nonatomic) b2Body* body;
@property (nonatomic, retain) CCSprite* image;

@end
