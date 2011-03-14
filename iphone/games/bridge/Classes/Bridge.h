//
//  Bridge.h
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Joint.h"
#import "Pile.h"

@interface Bridge : NSObject {
	
	NSMutableArray *joints;
	NSMutableArray *piles;
}

@property (nonatomic, retain) NSMutableArray *joints;
@property (nonatomic, retain) NSMutableArray *piles;


//joint
-(Joint *)addJoint:(CGPoint) start: (CGPoint) end;
-(BOOL)containsJoint:(Joint *)joint;
-(void)removeJoint:(Joint *)joint;
-(void)removeJoints:(CGPoint) start: (CGPoint) end;
-(NSMutableArray *) getJoints;

//piles
-(Pile *)addPile:(CGPoint) location;
-(void)removePile:(CGPoint) location;
-(NSMutableArray *)getPiles;



@end
