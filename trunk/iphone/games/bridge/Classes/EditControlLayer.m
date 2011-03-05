//
//  EditControlLayer.m
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "EditControlLayer.h"


@implementation EditControlLayer

@synthesize scene;

CCDirector *director;
NSMutableArray * touchesArray;
CCSprite* grid;
CocosUtility *cocosUtil;

-(id) init{

	if( (self=[super init] )) {
		director = [CCDirector sharedDirector];
		touchesArray=[[NSMutableArray alloc ] init];
		self.isTouchEnabled = YES;		
		
		
		grid = [CCSprite spriteWithFile:@"bridge-grid-background.png"];
		grid.position =ccp(480.f/2,320.f/2); 
		[self addChild:grid z:0];
		cocosUtil = [[CocosUtility alloc] init];
		
	}
	
	return self;
}



-(void) registerWithTouchDispatcher{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self priority:0 swallowsTouches:YES];
}


-(BOOL) ccTouchBegan:(UITouch *)touch withEvent:(UIEvent *)event{
	
	CGPoint location = [touch locationInView: [touch view]];
	location = [[CCDirector sharedDirector] convertToGL:location];
	
	[touchesArray addObject:NSStringFromCGPoint(location)];
	
	//check if touch within grid 
	
	if(! [cocosUtil containsTouchLocation: touch : grid ] ){
		//not within grid. clear all touches
		[touchesArray removeAllObjects];
		return;
	}
	
	
	if([touchesArray count]==2){
		
		
		CGPoint start = CGPointFromString([touchesArray objectAtIndex:0]);
		CGPoint end = CGPointFromString([touchesArray objectAtIndex:1]);
		
		
		NSLog([NSString stringWithFormat: @"touched twice %f %f",start.x,end.x ]);
		
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
		
		
		
		[self addChild:beam];
		[touchesArray removeAllObjects];
		
	}
	return YES;
}


-(void)setScene:(CCScene *)scene1{
	self.scene = scene1;
}


@end
