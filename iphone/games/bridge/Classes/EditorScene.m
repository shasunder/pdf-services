#import "EditorScene.h"
#import "EditViewLayer.h"
#import "EditControlLayer.h"

@implementation EditorScene


+(id) scene
{
	CCScene *scene = [CCScene node];
	[scene addChild:[EditViewLayer node] z:0 tag:1];
	[scene addChild:[EditControlLayer node] z:0 tag:2];	
	
	return scene;
}

- (void) dealloc{
	[super dealloc];
}
@end
