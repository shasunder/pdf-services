#import "BridgeEditor.h"

@implementation BridgeEditor

+(id) scene{
	CCScene *scene = [CCScene node]; //auto release	
	BridgeEditor *layer = [BridgeEditor node]; //auto release
	[scene addChild: layer];
	return scene;
}

-(id) init
{
	if( (self=[super init] )) {
		
		CCLabel* label = [CCLabel labelWithString:@"Hello World" fontName:@"Marker Felt" fontSize:64];
		CGSize size = [[CCDirector sharedDirector] winSize];
		
		label.position =  ccp( size.width /2 , size.height/2 );
		
		[self addChild: label];
	}
	return self;
}

- (void) dealloc{
	[super dealloc];
}
@end
