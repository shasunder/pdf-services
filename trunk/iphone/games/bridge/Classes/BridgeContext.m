//
//  BridgeContext.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "BridgeContext.h"


@implementation BridgeContext

static OrderedDictionary *context;

+ (OrderedDictionary*) instance {
	
	
	if ( context == nil ) { 
		context = [[OrderedDictionary alloc] init];
		Bridge *bridge = [[Bridge alloc] init];
		[context setValue:bridge forKey:KEY_BRIDGE];
	}
	
	return context; 
}


-(void) dealloc { 
	[context release];
}


@end
