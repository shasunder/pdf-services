//
//  EditControlLayer.m
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "EditControlLayer.h"
#import "Line.h"

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



-(void)drawJoint {

	if([touchesArray count] >=2){
			[self setMaterial];
		
			CGPoint start = CGPointFromString([touchesArray objectAtIndex:0]);
			CGPoint end = CGPointFromString([touchesArray objectAtIndex:1]);
			// begin drawing to the render texture
			[target begin];
			
			// for extra points, we'll draw this smoothly from the last position and vary the sprite's
			// scale/rotation/offset
			float distance = ccpDistance(start, end);
			if (distance > 1)
			{
				int d = (int)distance;
				for (int i = 0; i < d; i++)
				{
					float difx = end.x - start.x;
					float dify = end.y - start.y;
					float delta = (float)i / distance;
					[brush setPosition:ccp(start.x + (difx * delta), start.y + (dify * delta))];
					[brush setScale:0.3];
					// Call visit to draw the brush, don't call draw..
					[brush visit];
				}
			}
			// finish drawing and return context back to the screen
			[target end];
		
		
		
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
		
		
		
		[bridge addJoint:start :end];
		
		NSLog([NSString stringWithFormat: @"Bridge : %@ - joints count :%d",[bridge description],[ [bridge getJoints] count] ]);
		
		NSLog([NSString stringWithFormat:@"Drawing beam : (%f, %f) to (%f,%f)", start.x, start.y, end.x, end.y]);
		[self drawJoint];

		//[self addChild:beam];
		[touchesArray removeAllObjects];
		
	}
	return YES;
}


@end
