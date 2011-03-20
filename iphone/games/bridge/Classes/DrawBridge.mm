//
//  Line.m
//  bridge
//
//  Created by sandeep m on 04/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "DrawBridge.h"

@implementation DrawBridge


-(void)draw {
	Bridge *bridge= [[BridgeContext instance] objectForKey: KEY_BRIDGE];
	NSMutableArray* edges = [bridge getEdges];
	NSLog([edges description]);
	
	for (int i=0; i< [edges count]; i=i++) {
		Edge *edge = [edges objectAtIndex:i];
		
		CGPoint start = edge.start;
		CGPoint end = edge.end;
		NSString *material = edge.material;
		glEnable(GL_LINE_SMOOTH);
		glLineWidth( 7.0f );
		if([material isEqual:@"wood"]){
			glColor4ub(184,138,0,255);  // R, G , B, border color
		}else if([material isEqual:@"steel"]){
			glColor4ub(207,207,207,255);
		}
		ccDrawLine( start, end);
	}
	
}

- (void) dealloc
{
	[super dealloc];
}
@end
