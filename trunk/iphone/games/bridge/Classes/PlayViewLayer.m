//
//  PlayView.m
//  bridge
//
//  Created by sandeep m on 09/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "PlayViewLayer.h"


@implementation PlayViewLayer

CCSprite* play;

-(void) playBridge{
	// create a render texture, this is what we're going to draw into
	CCDirector *director = [CCDirector sharedDirector];
	CGSize s = [director winSize];
	
	target = [[CCRenderTexture renderTextureWithWidth:s.width height:s.height] retain];
	[target setPosition:ccp(s.width/2, s.height/2)];
	
	// note that the render texture is a cocosnode, and contains a sprite of it's texture for convience,
	// so we can just parent it to the scene like any other cocos node
	[self addChild:target z:1];
	
	//[brush setBlendFunc: (ccBlendFunc) { GL_ONE, GL_ONE_MINUS_SRC_ALPHA }];  
	[brush setOpacity:200];
	[self drawBridge];
	
}
-(id) init
{
	if( (self=[super init] )) {
		
		self.isTouchEnabled = YES;	
		
		bridge= [[BridgeContext instance] objectForKey: KEY_BRIDGE];
		
		CCSprite* landLeft = [CCSprite spriteWithFile:@"land-left.png" ];
		landLeft.position =  CGPointMake( 40 , 50);
		
		CCSprite* landRight = [CCSprite spriteWithFile:@"land-right.png" ];
		landRight.position =  CGPointMake( 420 , 55);
		
		
		play = [CCSprite spriteWithFile:@"play.png" ];
		play.position =  CGPointMake( 50 , 280);
		
		
		[self addChild: play];
		
		//land
		[self addChild:landRight];
		[self addChild:landLeft];
	
		CCSprite* background = [CCSprite spriteWithFile:@"background-blue.png"];
		background.position =ccp(480.f/2,320.f/2); 
		[self addChild:background z:-1];
		
		[self playBridge];
	}
	
	return self;
}


- (void) setBrushMaterial: (NSString *)material {
	// create a brush image to draw into the texture with
	//TODO: fix type
	
	NSString *image=@"material-steel.png";
	if(![material isEqual:@"steel" ]){
		image=@"material-wood.png";
	}
	
	NSLog(material);
	NSString *action=[[BridgeContext instance] objectForKey: KEY_ACTION];
	
	if(brush !=NULL){
		[brush release];
		brush = NULL;
	}
	
	brush = [[CCSprite spriteWithFile:image] retain];

	
}



-(void)drawBridge {
	
		NSMutableArray *joints = [bridge getJoints];
		NSLog([joints description]);
			   
		for (int i=0; i< [joints count]; i=i++) {
			Joint *edge = [joints objectAtIndex:i];
			
			CGPoint start = edge.start;
			CGPoint end = edge.end;
			[self setBrushMaterial : edge.material]; 
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

-(void)pause{
	[[CCDirector sharedDirector] popScene];
}

-(void) registerWithTouchDispatcher{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self priority:0 swallowsTouches:YES];
}

-(BOOL) ccTouchBegan:(UITouch *)touch withEvent:(UIEvent *)event{
	NSLog(@"Touch Began ");
	CGPoint location = [touch locationInView: [touch view]];
	location = [[CCDirector sharedDirector] convertToGL:location];
	NSString *action=@"";
	
	//check if button pressed
	if( [CocosUtility containsTouchLocation: touch : play ] ){
			
		NSLog(@"Touched : pause");
		action =@"pause";
		[self pause];
	}
	
	[[BridgeContext instance] setValue:action forKey: KEY_ACTION];
	
	return YES;
	
}


@end
