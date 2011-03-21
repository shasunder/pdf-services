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
	//NSLog([edges description]);
	
	glEnable(GL_LINE_SMOOTH);
	glLineWidth( 7.0f );
	
	for (int i=0; i< [edges count]; i=i++) {
		Edge *edge = [edges objectAtIndex:i];
		
		CGPoint start = edge.start;
		CGPoint end = edge.end;
		NSString *material = edge.material;
		
		
		if([material isEqual:@"wood"]){
			glColor4ub(184,138,0,255);  // R, G , B, border color
		}else if([material isEqual:@"steel"]){
			glColor4ub(207,207,207,255);
		}
		ccDrawLine( start, end);
	}
	
	//add piles
	glLineWidth(10);
	glColor4ub(184,138,0,255);
	
	NSMutableArray *piles = [bridge getPiles];
	for (int i=0; i< [piles count]; i++) {
		//NSLog(@"Adding pile");
		Vertex *pile = [piles objectAtIndex:i];
		
		ccDrawCircle(pile.point, 10.0f, CC_DEGREES_TO_RADIANS(90), 10, NO);
		
	}
	
}

- (void) dealloc
{
	[super dealloc];
}
@end
