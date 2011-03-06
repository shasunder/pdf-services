#import "EditorScene.h"
#import "EditViewLayer.h"
#import "EditControlLayer.h"
#import "Constants.h"

@implementation EditorScene

@class BridgeContext;

@synthesize bridge;

+(id) scene
{
	EditorScene *scene = [CCScene node];
	EditViewLayer *editView =[EditViewLayer node];
	EditControlLayer *editControl =[EditControlLayer node];

	//[editView setScene:scene];
//	[editControl setScene:scene];
	
	[[BridgeContext instance] setValue:scene forKey :KEY_SCENE];
	
	[scene addChild: editView z:0 tag:1];
	[scene addChild: editControl z:0 tag:2];	
	
	return scene;
}

- (void) dealloc{
	[super dealloc];
}
@end
