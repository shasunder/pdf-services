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


//joint
-(Joint *)addJoint:(CGPoint) start: (CGPoint) end{

	Joint *joint = [[Joint alloc] init:start : end];
	[joints addObject:joint];
	
	return joint;

}

-(BOOL)containsJoint:(Joint *)joint{
	return [joints containsObject:joint ];
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
