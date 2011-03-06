//
//  EditViewLayer.m
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "EditViewLayer.h"


@implementation EditViewLayer



CCSprite* wood;
CCSprite* steel;

-(id) init
{
	if( (self=[super init] )) {
		
		self.isTouchEnabled = YES;	
				
		wood = [CCSprite spriteWithFile:@"material-wood.png" ];
		wood.position =  CGPointMake( 400 , 300);
		 
		steel = [CCSprite spriteWithFile:@"material-steel.png" ];
		steel.position =  CGPointMake( 450 , 300);
		
		CCSprite* landLeft = [CCSprite spriteWithFile:@"land-left.png" ];
		landLeft.position =  CGPointMake( 20 , 50);
		
		CCSprite* landRight = [CCSprite spriteWithFile:@"land-right.png" ];
		landRight.position =  CGPointMake( 400 , 55);
		
       // self.background = [tileMap layerNamed:@"bridge-grid-background.png"];
        
		//material
		[self addChild: wood];
		[self addChild: steel];
		
		//land
		[self addChild:landRight];
		[self addChild:landLeft];
		

		
		CCSprite* background = [CCSprite spriteWithFile:@"background-blue.png"];
		background.position =ccp(480.f/2,320.f/2); 
		[self addChild:background z:-1];
		
	}
	
	return self;
}



-(void) registerWithTouchDispatcher{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self priority:0 swallowsTouches:YES];
}


-(BOOL) ccTouchBegan:(UITouch *)touch withEvent:(UIEvent *)event{
	NSLog(@"Touch Began ");
	CGPoint location = [touch locationInView: [touch view]];
	location = [[CCDirector sharedDirector] convertToGL:location];
	//check if button pressed
	if( [CocosUtility containsTouchLocation: touch : wood ] ){
		wood.opacity = 128;steel.opacity = 184;
		NSLog(@"Touched : wood");
	}else if( [CocosUtility containsTouchLocation: touch : steel ] ){
		wood.opacity = 184;steel.opacity = 128;
		NSLog(@"Touched : steel");
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
