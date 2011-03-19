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

- (void) setMaterial {
		// create a brush image to draw into the texture with
		NSString *material=[[BridgeContext instance] objectForKey: KEY_MATERIAL];
		NSString *image=@"material-steel.png";
		if(![material isEqual:@"steel" ]){
			image=@"material-wood.png";
		}
		NSLog(material);
		NSString *action=[[BridgeContext instance] objectForKey: KEY_ACTION];
	

		brush = [[CCSprite spriteWithFile:image] retain];
	
		if([action isEqual:@"erase" ]){
			brush.scale=1.15;
			[brush setBlendFunc: (ccBlendFunc) { GL_ZERO, GL_ONE_MINUS_SRC_ALPHA }];
			
		}

}
-(id) init{

	if( (self=[super init] )) {
		director = [CCDirector sharedDirector];
		CGSize s = [director winSize];
		
		touchesArray=[[NSMutableArray alloc ] init];
		self.isTouchEnabled = YES;		
		
		bridge= [[BridgeContext instance] objectForKey: KEY_BRIDGE];
		
		grid = [CCSprite spriteWithFile:@"bridge-grid-background.png"];
		grid.position =ccp(480.f/2,320.f/2); 
		[self addChild:grid z:0];
		
		// create a render texture, this is what we're going to draw into
		target = [[CCRenderTexture renderTextureWithWidth:s.width height:s.height] retain];
		[target setPosition:ccp(s.width/2, s.height/2)];
		
		// note that the render texture is a cocosnode, and contains a sprite of it's texture for convience,
		// so we can just parent it to the scene like any other cocos node
		[self addChild:target z:1];
		
		

		
		//[brush setBlendFunc: (ccBlendFunc) { GL_ONE, GL_ONE_MINUS_SRC_ALPHA }];  
		[brush setOpacity:200];
		
	}
	
	return self;
}



-(void)drawEdge {

	if([touchesArray count] >=2){
			[self setMaterial];
		
			CGPoint start = CGPointFromString([touchesArray objectAtIndex:0]);
			CGPoint end = CGPointFromString([touchesArray objectAtIndex:1]);
			DrawBridge * bridgeDrawer = [DrawBridge node];
			
			[self addChild:bridgeDrawer];
		
		
		
	}
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
	int snapToGrid =40;
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
		[self drawEdge];

		//[self addChild:beam];
		[touchesArray removeAllObjects];
		
	}
	return YES;
}


@end