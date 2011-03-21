//
//  EditViewLayer.m
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "EditViewLayer.h"
#import "BridgeContext.h"
#import "Constants.h"

@implementation EditViewLayer



CCSprite* wood;
CCSprite* steel;

CCSprite* erase;
CCSprite* zoom;

CCSprite* startPlay;

-(id) init
{
	if( (self=[super init] )) {
		
		self.isTouchEnabled = YES;	

		bridge= [[BridgeContext instance] objectForKey: KEY_BRIDGE];
				

		 
		steel = [CCSprite spriteWithFile:@"material-steel.png" ];
		steel.position =  CGPointMake( 450 , 300);
		
		wood = [CCSprite spriteWithFile:@"material-wood.png" ];
		wood.position =  CGPointMake( 450 , 250);
		
		erase = [CCSprite spriteWithFile:@"erase.png" ];
		erase.position =  CGPointMake( 450 , 200);
		
		zoom = [CCSprite spriteWithFile:@"zoom.png" ];
		zoom.position =  CGPointMake( 450 , 150);
		
		CCSprite* landLeft = [CCSprite spriteWithFile:@"land-left.png" ];
		landLeft.position =  CGPointMake( 50 , 50);
		
		CCSprite* landRight = [CCSprite spriteWithFile:@"land-right.png" ];
		landRight.position =  CGPointMake( 430 , 55);
		
		
		startPlay = [CCSprite spriteWithFile:@"play.png" ];
		startPlay.position =  CGPointMake( 50 , 280);
		
		//background
		CCSprite* background = [CCSprite spriteWithFile:@"background-blue.png"];
		background.position =ccp(480.f/2,320.f/2); 
		[self addChild:background z:-1];
		
		//material
		[self addChild: steel];
		[self addChild: wood];
		[self addChild: zoom];
		[self addChild: erase];
		[self addChild: startPlay];
		
		//land
		[self addChild:landRight z:-1];
		[self addChild:landLeft z:-1];
		
		[self selectButton:wood];
		
		
	}
	
	return self;
}



-(void) registerWithTouchDispatcher{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self priority:0 swallowsTouches:YES];
}


-(void)selectButton:(CCSprite *)sprite{
	wood.scale = steel.scale = 0.5;
	erase.scale = zoom.scale = startPlay.scale= 0.5;
	sprite.scale =1.0;
}

-(void) playBridge{
	PlayScene *scene = [PlayScene scene]; //auto release
	[[CCDirector sharedDirector] pushScene:  scene];
}

-(BOOL) ccTouchBegan:(UITouch *)touch withEvent:(UIEvent *)event{
	NSLog(@"Touch Began ");
	CGPoint location = [touch locationInView: [touch view]];
	location = [[CCDirector sharedDirector] convertToGL:location];
	NSString *material = [[BridgeContext instance] objectForKey:KEY_MATERIAL];
	NSString *action= [[BridgeContext instance] objectForKey: KEY_ACTION];
	
	//check if button pressed
	if( [CocosUtility containsTouchLocation: touch : wood ] ){
		[self selectButton:wood];
		NSLog(@"Touched : wood");
		material = KEY_MATERIAL_WOOD;
		
	}else if( [CocosUtility containsTouchLocation: touch : steel ] ){
		[self selectButton:steel];		
		NSLog(@"Touched : steel");
		material = KEY_MATERIAL_STEEL;
		
	}else if( [CocosUtility containsTouchLocation: touch : erase ] ){
		[self selectButton:erase];		
		NSLog(@"Touched : erase");
		action =@"erase";
		[[BridgeContext instance] setValue:action forKey: KEY_ACTION];
		
	}else if( [CocosUtility containsTouchLocation: touch : zoom ] ){
		[self selectButton:zoom];		
		NSLog(@"Touched : zoom");
		action =@"zoom";
		[[BridgeContext instance] setValue:action forKey: KEY_ACTION];
		self.scale = (self.scale != 1.2) ? 1.1 : 1.0;
		
	}else if( [CocosUtility containsTouchLocation: touch : startPlay ] ){
		[self selectButton:startPlay];		
		NSLog(@"Touched : play");
		action =@"play";
		[[BridgeContext instance] setValue:action forKey: KEY_ACTION];
		[self playBridge];
	}
	
	if(material!= NULL){
		[[BridgeContext instance] setValue:material forKey: KEY_MATERIAL];
	}
	
	return YES;

}



- (void)ccTouchEnded:(UITouch *)touch withEvent:(UIEvent *)event{
		NSLog(@"Touch end ");
}

- (void)ccTouchMoved:(UITouch *)touch withEvent:(UIEvent *)event{
	NSLog(@"Touch moved ");

}
@end
