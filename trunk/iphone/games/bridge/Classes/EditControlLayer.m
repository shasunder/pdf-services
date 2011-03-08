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

-(id) init{

	if( (self=[super init] )) {
		director = [CCDirector sharedDirector];
		CGSize s = [director winSize];
		
		touchesArray=[[NSMutableArray alloc ] init];
		self.isTouchEnabled = YES;		
		
		
		grid = [CCSprite spriteWithFile:@"bridge-grid-background.png"];
		grid.position =ccp(480.f/2,320.f/2); 
		[self addChild:grid z:0];
		
		// create a render texture, this is what we're going to draw into
		target = [[CCRenderTexture renderTextureWithWidth:s.width height:s.height] retain];
		[target setPosition:ccp(s.width/2, s.height/2)];
		
		// note that the render texture is a cocosnode, and contains a sprite of it's texture for convience,
		// so we can just parent it to the scene like any other cocos node
		[self addChild:target z:1];
		
		// create a brush image to draw into the texture with
		brush = [[CCSprite spriteWithFile:@"material-steel.png"] retain];
		//[brush setBlendFunc: (ccBlendFunc) { GL_ONE, GL_ONE_MINUS_SRC_ALPHA }];  
		[brush setOpacity:100];
		
	}
	
	return self;
}



-(void)drawJoint {

	if([touchesArray count] >=2){
		for(int i=0;i<[touchesArray count]-1;i=i+2){
			CGPoint start = CGPointFromString([touchesArray objectAtIndex:i]);
			CGPoint end = CGPointFromString([touchesArray objectAtIndex:i+1]);
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
					//[brush setRotation:rand()%360];
					//float r = ((float)(rand()%50)/50.f) + 0.25f;
					//[brush setScale:r];
					// Call visit to draw the brush, don't call draw..
					[brush visit];
				}
			}
			// finish drawing and return context back to the screen
			[target end];
		}
		
		
	}
}


-(void) registerWithTouchDispatcher{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self priority:0 swallowsTouches:YES];
}


-(BOOL) ccTouchBegan:(UITouch *)touch withEvent:(UIEvent *)event{
	
	CGPoint location = [touch locationInView: [touch view]];
	location = [[CCDirector sharedDirector] convertToGL:location];
	
	[touchesArray addObject:NSStringFromCGPoint(location)];
	
	//check if touch within grid 
	
	if(! [CocosUtility containsTouchLocation: touch : grid ] ){
		//not within grid. clear all touches
		[touchesArray removeAllObjects];
		return;
	}
	
	
	if([touchesArray count]==2){
		[self drawJoint];
		
		CGPoint start = CGPointFromString([touchesArray objectAtIndex:0]);
		CGPoint end = CGPointFromString([touchesArray objectAtIndex:1]);
		
		
		Bridge *bridge= [[BridgeContext instance] objectForKey: KEY_BRIDGE];
		
		[bridge addJoint:start :end];
		
		
		NSLog([NSString stringWithFormat: @"touched twice %f %f",start.x,end.x ]);

		NSLog([NSString stringWithFormat: @"Bridge : %@ %d",[bridge description],[ [bridge getJoints] count] ]);

		
		CCSprite* beam = [CCSprite spriteWithFile:@"material-steel.png" ];
		float deltaX = (start.x -end.x);
		float deltaY = (start.y -end.y);
		
		float imageWidth = [beam boundingBox].size.width;
		float imageHeight = [beam boundingBox].size.height;
		
		int deltaRange = 10;
		
		NSLog([NSString stringWithFormat:@"Drawing beam : (%f, %f) to (%f,%f)", start.x, start.y, end.x, end.y]);
		NSLog([NSString stringWithFormat:@"Delta: (%f, %f) ", deltaX, deltaY]);

		//check touch position : vertical/horizontal/oblique
		// set scale for vertical or horizontal
		//TODO: check if touches withing grid
		//TODO: snap to grid co-ordinates 
	
		
		float beamX = (deltaX > 0) ? end.x : start.x;
		float beamY = (deltaY > 0) ? end.y : start.y;
		
		if(fabs(deltaX) > deltaRange && fabs(deltaY) > deltaRange ){
			NSLog(@":::::Oblique:::::");
			beam.scaleY = 1.5;
			beam.scaleX = 0.3;
			beam.rotation =45;			
			
			beam.position = ccp( beamX+ imageWidth/2, beamY + imageHeight/2);
			
		}else if(fabs(deltaY) > deltaRange  ){
			NSLog(@":::::vertical:::::");
			beam.scaleY = 1.5;
			beam.scaleX = 0.3;
			beam.position = ccp( beamX, beamY + imageHeight/2);
			
		}else if(fabs(deltaX) > deltaRange  ){
			NSLog(@":::::horizontal:::::");
			beam.scaleX = 1.5;
			beam.scaleY = 0.3;
			beam.position = ccp( beamX + imageWidth/2, beamY);
		}else{
			//ignore ??
		}
		
		
		
		//[self addChild:beam];
		[touchesArray removeAllObjects];
		
	}
	return YES;
}


@end
