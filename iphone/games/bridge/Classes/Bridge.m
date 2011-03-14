//
//  Bridge.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Bridge.h"


@implementation Bridge

@synthesize piles;
@synthesize joints;


-(id) init{
	
	if( (self=[super init] )) {
		self.joints = [[NSMutableArray alloc]init];
		
	}
	
	return self;
}

//joint
-(Joint *)addJoint:(CGPoint) start: (CGPoint) end: (NSString *) material{

	Joint *joint = [[Joint alloc] initWithPoint:start : end];
	[joint setMaterial:material];
	[joints addObject:joint];
	
	return joint;

}

-(BOOL)containsJoint:(Joint *)joint{
	return [joints containsObject:joint ];
}

-(void)removeJoints:(CGPoint) start: (CGPoint) end{
	//loop through joints array and remove joints falling between start and end positions.
	for (int i=0; i< [joints count]; i++) {
		Joint *joint = [joints objectAtIndex:i];
		CGPoint startJoint = joint.start;
		CGPoint endJoint = joint.end;
		int x1 = startJoint.x, y1 = startJoint.y, x2 = endJoint.x, y2 = endJoint.y;
		
		int xs = start.x, ys = start.y, xe = end.x, ye = end.y;

		if( xs > xe) { //swap
			xs= xe; xe =xs;
		}
		if(ys > ye){
			ys = ye ; ye=ys;
		}
		
		if(x1 >= xs && y1 >=ys && x2 <=xe && y2 <= ye){ //lines intersect. remove
			[joints removeObject:joint ];		
		}
		
	}
	
}

-(void)removeJoint:(Joint *)joint{
	[joints removeObject:joint ];
	
}
-(NSMutableArray *) getJoints{
	return joints;
}

//piles
-(Pile *)addPile:(CGPoint) location{
	Pile *pile =[[Pile alloc] init:location ];
	[piles addObject:pile];
}

-(void)removePile:(Pile *) pile{
	[piles removeObject:pile ];
}
-(NSMutableArray *)getPiles{
	return piles;
}


@end
