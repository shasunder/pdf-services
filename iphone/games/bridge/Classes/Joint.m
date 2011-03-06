//
//  Joint.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Joint.h"


@implementation Joint

@synthesize start;
@synthesize end;

- (id)initWithPoint:(CGPoint)s :(CGPoint)e{

	self = [super init];
	if (self != nil){
		self.start =s;
		self.end= e;
	}
	return self;
}

@end
