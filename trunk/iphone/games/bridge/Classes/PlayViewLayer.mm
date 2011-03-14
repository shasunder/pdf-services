//
//  PlayView.m
//  bridge
//
//  Created by sandeep m on 09/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "PlayViewLayer.h"

#define PTM_RATIO 32

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

- (void)tick:(ccTime) dt {
	
	int32 velocityIterations = 8;
	int32 positionIterations = 1;
	
	world->Step(dt, velocityIterations, positionIterations);
	
    for(b2Body *b = world->GetBodyList(); b; b=b->GetNext()) {    
        if (b->GetUserData() != NULL) {
            CCSprite *ballData = (CCSprite *)b->GetUserData();
            ballData.position = ccp(b->GetPosition().x * PTM_RATIO,
                                    b->GetPosition().y * PTM_RATIO);
            ballData.rotation = -1 * CC_RADIANS_TO_DEGREES(b->GetAngle());
        }        
    }
	
}

-(void) buildWorld{
	// Create a world
	b2Vec2 gravity = b2Vec2(0.0f, -30.0f);
	bool doSleep = true;
	world = new b2World(gravity, doSleep);
	world->SetContinuousPhysics(true);
	
	// Debug Draw functions
	m_debugDraw = new GLESDebugDraw( PTM_RATIO );
	world->SetDebugDraw(m_debugDraw);
	
	uint32 flags = 0;
	flags += b2DebugDraw::e_shapeBit;
	//		flags += b2DebugDraw::e_jointBit;
	//		flags += b2DebugDraw::e_aabbBit;
	//		flags += b2DebugDraw::e_pairBit;
	//		flags += b2DebugDraw::e_centerOfMassBit;
	m_debugDraw->SetFlags(flags);		
	
	CGSize winSize = [CCDirector sharedDirector].winSize;
	
	// Create edges around the entire screen
	b2BodyDef groundBodyDef;
	groundBodyDef.position.Set(0,0);
	b2Body *groundBody = world->CreateBody(&groundBodyDef);
	b2PolygonShape groundBox;
	b2FixtureDef boxShapeDef;
	boxShapeDef.shape = &groundBox;
	groundBox.SetAsEdge(b2Vec2(0,0), b2Vec2(winSize.width/PTM_RATIO, 0));
	groundBody->CreateFixture(&boxShapeDef);
	groundBox.SetAsEdge(b2Vec2(0,0), b2Vec2(0, winSize.height/PTM_RATIO));
	groundBody->CreateFixture(&boxShapeDef);
	groundBox.SetAsEdge(b2Vec2(0, winSize.height/PTM_RATIO), 
						b2Vec2(winSize.width/PTM_RATIO, winSize.height/PTM_RATIO));
	groundBody->CreateFixture(&boxShapeDef);
	groundBox.SetAsEdge(b2Vec2(winSize.width/PTM_RATIO, 
							   winSize.height/PTM_RATIO), b2Vec2(winSize.width/PTM_RATIO, 0));
	groundBody->CreateFixture(&boxShapeDef);
	
	[self schedule:@selector(tick:)];
	
}

-(void) draw
{
	// Default GL states: GL_TEXTURE_2D, GL_VERTEX_ARRAY, GL_COLOR_ARRAY, GL_TEXTURE_COORD_ARRAY
	// Needed states:  GL_VERTEX_ARRAY, 
	// Unneeded states: GL_TEXTURE_2D, GL_COLOR_ARRAY, GL_TEXTURE_COORD_ARRAY
	glDisable(GL_TEXTURE_2D);
	glDisableClientState(GL_COLOR_ARRAY);
	glDisableClientState(GL_TEXTURE_COORD_ARRAY);
	
	world->DrawDebugData();
	
	// restore default GL states
	glEnable(GL_TEXTURE_2D);
	glEnableClientState(GL_COLOR_ARRAY);
	glEnableClientState(GL_TEXTURE_COORD_ARRAY);
	
}



-(void)buildPhysicalBody: (Edge *) edge{

	
	// Create sprite and add it to the layer
	CGPoint p = edge.start;
	CCSprite *edgeImage = [CCSprite spriteWithFile:@"material-wood.png" rect:CGRectMake(0, 0, 152, 152)];
	edgeImage.position = ccp( p.x, p.y);;
	[self addChild:edgeImage];

		
	// Define the dynamic body.
	//Set up a 1m squared box in the physics world
	b2BodyDef bodyDef;
	bodyDef.type = b2_dynamicBody;
	
	bodyDef.position.Set(p.x/PTM_RATIO, p.y/PTM_RATIO);
	bodyDef.userData = edgeImage;
	b2Body *body = world->CreateBody(&bodyDef);
	
	// Define another box shape for our dynamic body.
	b2PolygonShape dynamicBox;
	dynamicBox.SetAsBox(.5f, .5f);//These are mid points for our 1m box
	
	// Define the dynamic body fixture.
	b2FixtureDef fixtureDef;
	fixtureDef.shape = &dynamicBox;	
	fixtureDef.density = 1.0f;
	fixtureDef.friction = 0.3f;
	body->CreateFixture(&fixtureDef); 
	
	edge.image = edgeImage;
	edge.body = body;
	
	
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
		
		//box2d
		
		//build boundary in box2d
		[self buildWorld ];
		
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
	
		edges = [bridge getEdges];
		NSLog([edges description]);
			   
		for (int i=0; i< [edges count]; i=i++) {
			Edge *edge = [edges objectAtIndex:i];
			
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
			[self buildPhysicalBody : edge];
			//[self buildPhysicalBody : edge];
			
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

- (void)dealloc {    
   
    world = NULL;
    [super dealloc];
}

@end
