//
//  EditControlLayer.m
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "EditControlLayer.h"

@implementation EditControlLayer


CCDirector *director;
NSMutableArray * touchesArray;
CCSprite* grid;
DrawBridge * bridgeDrawer;

-(id) init{

	if( (self=[super init] )) {
		director = [CCDirector sharedDirector];
		CGSize s = [director winSize];
		bridgeDrawer = [DrawBridge node];	
		
		touchesArray=[[NSMutableArray alloc ] init];
		self.isTouchEnabled = YES;		
		
		bridge= [[BridgeContext instance] objectForKey: KEY_BRIDGE];
		
		grid = [CCSprite spriteWithFile:@"bridge-grid-background.png"];
		grid.position =ccp(480.f/2,320.f/2); 
		[self addChild:grid z:0];
		
		[self addChild:bridgeDrawer];

		[self displayBridge];
		
	}
	
	return self;
}



-(void)displayBridge {
	[bridgeDrawer draw];
}


-(void) registerWithTouchDispatcher{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self priority:0 swallowsTouches:YES];
}

-(BOOL) ccTouchBegan:(UITouch *)touch withEvent:(UIEvent *)event{
	
	CGPoint location = [touch locationInView: [touch view]];
	
	//check if touch within grid 
	
	if(! [CocosUtility containsTouchLocation: touch : grid ] ){
		//not within grid. clear all touches
		[touchesArray removeAllObjects];
		return NO;
	}

	location = [[CCDirector sharedDirector] convertToGL:location];	
	int snapToGrid =SNAP_TO_GRID_PIXEL;
	location.x = round(location.x / snapToGrid) * snapToGrid;
	location.y = round(location.y / snapToGrid) * snapToGrid;
	[touchesArray addObject:NSStringFromCGPoint(location)];
	
		
	
	if([touchesArray count]==2){
				
		CGPoint start = CGPointFromString([touchesArray objectAtIndex:0]);
		CGPoint end = CGPointFromString([touchesArray objectAtIndex:1]);
		NSString *material=[[BridgeContext instance] objectForKey: KEY_MATERIAL];
		NSString *action=[[BridgeContext instance] objectForKey: KEY_ACTION];
		if([@"erase" isEqual:action]){
			[bridge removeEdges:start :end];
		}else{
			[bridge addEdge:start :end :material];
		}
		
		NSLog([NSString stringWithFormat: @"Bridge : %@ - Edges count :%d",[bridge description],[ [bridge getEdges] count] ]);
		
		NSLog([NSString stringWithFormat:@"Drawing beam : (%f, %f) to (%f,%f)", start.x, start.y, end.x, end.y]);
		[self displayBridge];

		//[self addChild:beam];
		[touchesArray removeAllObjects];
		
	}
	return YES;
}


@end
