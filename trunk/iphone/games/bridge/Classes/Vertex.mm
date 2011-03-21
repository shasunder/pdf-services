//
//  Vertex.m
//  bridge
//
//  Created by sandeep m on 16/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Vertex.h"


@implementation Vertex

@synthesize edges;
@synthesize point;
@synthesize body;
@synthesize image;
@synthesize isPile;

- (id)init{
	
	self = [super init];
	if (self != nil){
		edges = [[NSMutableArray alloc] init];
	}
	return self;
}

- (BOOL)isEqual:(id)other {
    if (other == self)
        return YES;
    if (other==NULL || !other || ![other isKindOfClass:[self class]])
        return NO;
	
	Vertex *otherVertex = (Vertex *)other;
    return CGPointEqualToPoint(self.point , otherVertex.point);
}

@end
