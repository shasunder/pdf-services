//
//  Vertex.h
//  bridge
//
//  Created by sandeep m on 16/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Edge.h"

@interface Vertex : NSObject {
	NSMutableArray *edges;
	CGPoint point;
	BOOL isPile;
	
	b2Body* body;
	CCSprite* image;
}

@property (nonatomic, retain) NSMutableArray *edges;
@property (nonatomic)CGPoint point;
@property (nonatomic) BOOL isPile;
@property (nonatomic) b2Body* body;
@property (nonatomic, retain) CCSprite* image;
@end
