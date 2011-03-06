//
//  BridgeContext.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "BridgeContext.h"


@implementation BridgeContext

+ (OrderedDictionary*) instance {
	
	
	if ( context == nil ) { 
		context = [[OrderedDictionary alloc] init];
	}
	
	return context; 
}


-(void) dealloc { 
	[context release];
}


@end
