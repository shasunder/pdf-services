//
//  Edge.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Edge.h"


@implementation Edge

@synthesize start;
@synthesize end;
@synthesize material;
@synthesize body;
@synthesize image;

- (id)initWithPoint:(CGPoint)s :(CGPoint)e{

	self = [super init];
	if (self != nil){
		self.start =s;
		self.end= e;
	}
	return self;
}

- (BOOL)isEqual:(id)other {
    if (other == self)
        return YES;
    if (other==NULL || !other || ![other isKindOfClass:[self class]])
        return NO;
	
	Edge *otherEdge = (Edge *)other;
    return CGPointEqualToPoint(self.start , otherEdge.start) && CGPointEqualToPoint(self.end, otherEdge.end) && [self.material isEqual: otherEdge.material];
}


@end
