//
//  Pile.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Pile.h"


@implementation Pile

@synthesize location;

- (id)initWithLocation:(CGPoint)l{
	
	self = [super init];
	if (self != nil){
		self.location =l;
	}
	return self;
}

@end
