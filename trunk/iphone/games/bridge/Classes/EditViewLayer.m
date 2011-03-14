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

CCSprite* play;

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
		landLeft.position =  CGPointMake( 40 , 50);
		
		CCSprite* landRight = [CCSprite spriteWithFile:@"land-right.png" ];
		landRight.position =  CGPointMake( 420 , 55);
		
		
		play = [CCSprite spriteWithFile:@"play.png" ];
		play.position =  CGPointMake( 50 , 280);
		
		
       // self.background = [tileMap layerNamed:@"bridge-grid-background.png"];
        
		//material
		[self addChild: steel];
		[self addChild: wood];
		[self addChild: zoom];
		[self addChild: erase];
		[self addChild: play];
		
		//land
		[self addChild:landRight];
		[self addChild:landLeft];
		
		[self selectButton:wood];

		
		CCSprite* background = [CCSprite spriteWithFile:@"background-blue.png"];
		background.position =ccp(480.f/2,320.f/2); 
		[self addChild:background z:-1];
		
	}
	
	return self;
}



-(void) registerWithTouchDispatcher{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self priority:0 swallowsTouches:YES];
}


-(void)selectButton:(CCSprite *)sprite{
	wood.scale = steel.scale = 0.5;
	erase.scale = zoom.scale = play.scale= 0.5;
	sprite.scale =1.0;
}

-(void) play{
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
		material =@"wood";
		
	}else if( [CocosUtility containsTouchLocation: touch : steel ] ){
		[self selectButton:steel];		
		NSLog(@"Touched : steel");
		material =@"steel";
		
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
		
	}else if( [CocosUtility containsTouchLocation: touch : play ] ){
		[self selectButton:play];		
		NSLog(@"Touched : play");
		action =@"play";
		[[BridgeContext instance] setValue:action forKey: KEY_ACTION];
		[self play];
	}
	
	
	[[BridgeContext instance] setValue:material forKey: KEY_MATERIAL];
	
	return YES;

}



- (void)ccTouchEnded:(UITouch *)touch withEvent:(UIEvent *)event{
		NSLog(@"Touch end ");
}

- (void)ccTouchMoved:(UITouch *)touch withEvent:(UIEvent *)event{
	NSLog(@"Touch moved ");

}
@end
