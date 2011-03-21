//
//  BridgeMain.m
//  bridge
//
//  Created by sandeep m on 21/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "BridgeMain.h"
#import "Constants.h"

@implementation BridgeMain

-(void) startLevel:(int) level{
	Bridge *bridge = [[Bridge alloc] init];
	
	NSMutableArray *piles = [bridge getPiles];
	if(piles !=NULL){
		[piles release];
		piles =NULL;
	}
	
	if(level == 1 ){
		CGPoint location = ccp(80, 80);
	//	location = [[CCDirector sharedDirector] convertToGL:location];	
		int snapToGrid = SNAP_TO_GRID_PIXEL;
		
		location.x = round(location.x / snapToGrid) *snapToGrid ;
		location.y = round(location.y / snapToGrid) * snapToGrid;

		
		[bridge addPile: location];
		
		location = ccp(400, 80);
		
		location.x = round(location.x / snapToGrid) *snapToGrid ;
		location.y = round(location.y / snapToGrid) * snapToGrid;
		
		[bridge addPile: location];
	}
	
	[[BridgeContext instance] setValue:bridge forKey:KEY_BRIDGE];
	
}

-(void) start{
		
	[self startLevel:1];
	
	if(TEST_MODE){
		PlayScene *scene = [PlayScene scene]; //auto release
		[[CCDirector sharedDirector] runWithScene:  scene];
	}else{
		EditorScene *scene = [EditorScene scene]; //auto release
		[[CCDirector sharedDirector] runWithScene:  scene];
	}
}

@end
