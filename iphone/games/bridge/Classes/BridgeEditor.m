#import "BridgeEditor.h"

@implementation BridgeEditor

@synthesize tileMap = _tileMap;
@synthesize background = _background;
NSMutableArray * touchesArray;

+(id) scene{
	CCScene *scene = [CCScene node]; //auto release	
	BridgeEditor *layer = [BridgeEditor node]; //auto release
	[scene addChild: layer];
	return scene;
}

-(id) init
{
	if( (self=[super init] )) {
		touchesArray=[[NSMutableArray alloc ] init];
		CGSize size = [[CCDirector sharedDirector] winSize];
		
		CCSprite* wood = [CCSprite spriteWithFile:@"material-wood.png" ];
		wood.position =  CGPointMake( 400 , 300);
		
		CCSprite* steel = [CCSprite spriteWithFile:@"material-steel.png" ];
		steel.position =  CGPointMake( 450 , 300);

		CCSprite* landLeft = [CCSprite spriteWithFile:@"land-left.png" ];
		landLeft.position =  CGPointMake( 20 , 50);
                               
		CCSprite* landRight = [CCSprite spriteWithFile:@"land-right.png" ];
		landRight.position =  CGPointMake( 400 , 55);
		
		//tile map background		

		self.isTouchEnabled = YES;
        self.tileMap = [CCTMXTiledMap tiledMapWithTMXFile:@"TileMap.tmx"];
        self.background = [_tileMap layerNamed:@"Background"];
        
      /*  CCTMXObjectGroup *objects = [_tileMap objectGroupNamed:@"Objects"];
        NSAssert(objects != nil, @"'Objects' object group not found");
        NSMutableDictionary *spawnPoint = [objects objectNamed:@"SpawnPoint"];        
        NSAssert(spawnPoint != nil, @"SpawnPoint object not found");
        int x = [[spawnPoint valueForKey:@"x"] intValue];
        int y = [[spawnPoint valueForKey:@"y"] intValue];
        [self setViewpointCenter: ccp(x, y)]; */
 		
		//material
		[self addChild: wood];
		[self addChild: steel];
		
		//land
		[self addChild:landRight];
		[self addChild:landLeft];
		
	
		[self addChild:_tileMap z:-1];
		
		
	}
        
	return self;
}



-(void)setViewpointCenter:(CGPoint) position {
    
    CGSize winSize = [[CCDirector sharedDirector] winSize];
    
    int x = MAX(position.x, winSize.width / 2);
    int y = MAX(position.y, winSize.height / 2);
    x = MIN(x, (_tileMap.mapSize.width * _tileMap.tileSize.width) 
            - winSize.width / 2);
    y = MIN(y, (_tileMap.mapSize.height * _tileMap.tileSize.height) 
            - winSize.height/2);
    CGPoint actualPosition = ccp(x, y);
    
    CGPoint centerOfView = ccp(winSize.width/2, winSize.height/2);
    CGPoint viewPoint = ccpSub(centerOfView, actualPosition);
    self.position = viewPoint;
    
}




-(void) registerWithTouchDispatcher
{
	[[CCTouchDispatcher sharedDispatcher] addTargetedDelegate:self 
                                                     priority:0 swallowsTouches:YES];
}

-(void) ccTouchesMoved:(NSSet *)touches withEvent:(UIEvent *)event  {       
	UITouch *touch = [ touches anyObject];
	CGPoint new_location = [touch locationInView: [touch view]];
	new_location = [[CCDirector sharedDirector] convertToGL:new_location];
	
	CGPoint oldTouchLocation = [touch previousLocationInView:touch.view];
    oldTouchLocation = [[CCDirector sharedDirector] convertToGL:oldTouchLocation];
    oldTouchLocation = [self convertToNodeSpace:oldTouchLocation];
	// add touch array 
	[touchesArray addObject:NSStringFromCGPoint(new_location)];
	[touchesArray addObject:NSStringFromCGPoint(oldTouchLocation)];
}
-(void)draw
{
    glEnable(GL_LINE_SMOOTH);
	
   if([touchesArray count] > 2)
    {
		CGPoint start = CGPointFromString([touchesArray objectAtIndex:0]);
		CGPoint end = CGPointFromString([touchesArray objectAtIndex:1]);
		
		CCSprite* wood = [CCSprite spriteWithFile:@"material-wood.png" ];
		wood.position =  start;
		CCSprite* wood2 = [CCSprite spriteWithFile:@"material-wood.png" ];
		wood2.position =  end;

		[self addChild:wood];
		[self addChild:wood2];
		glEnable(GL_LINE_SMOOTH);
		glLineWidth(1.5f);
		glColor4f(1.0f, 0.0f, 0.0f, 1.0f);
		

        ccDrawLine(start, end);
		
    }
}



-(BOOL) ccTouchBegan:(UITouch *)touch withEvent:(UIEvent *)event
{
	CGPoint new_location = [touch locationInView: [touch view]];
	new_location = [[CCDirector sharedDirector] convertToGL:new_location];
	
	CGPoint oldTouchLocation = [touch previousLocationInView:touch.view];
    oldTouchLocation = [[CCDirector sharedDirector] convertToGL:oldTouchLocation];
    oldTouchLocation = [self convertToNodeSpace:oldTouchLocation];
	// add touch array 
	[touchesArray addObject:NSStringFromCGPoint(new_location)];
	[touchesArray addObject:NSStringFromCGPoint(oldTouchLocation)];
	
	if([touchesArray count] >2){
		[self draw];
		[touchesArray removeAllObjects];
	}
	return YES;
}

/*
 use below code for zoom of tile and movement etc
-(void) ccTouchEnded:(UITouch *)touch withEvent:(UIEvent *)event
{
    
    CGPoint touchLocation = [touch locationInView: [touch view]];		
    touchLocation = [[CCDirector sharedDirector] convertToGL: touchLocation];
    touchLocation = [self convertToNodeSpace:touchLocation];
    
    CGPoint playerPos = touchLocation;
    
    
    [self setViewpointCenter:playerPos];
    
}
 */


- (void) dealloc{
	[super dealloc];
}
@end
