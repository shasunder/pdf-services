//
//  Line.m
//  bridge
//
//  Created by sandeep m on 04/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Line.h"


@implementation Line
CGPoint start;
CGPoint end;


-(void)drawLine:(CGPoint) s: (CGPoint) e {
	start = s;
	end =e;

}


-(void)draw {
	
	glEnable(GL_LINE_SMOOTH);
	glLineWidth( 5.0f );
	glColor4ub(255,0,0,255);
	ccDrawLine( start, end);
	
}

- (void) dealloc
{
	[super dealloc];
}
@end
