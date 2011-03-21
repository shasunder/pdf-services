
#import "bridgeAppDelegate.h"
#import "cocos2d.h"
#import "BridgeMain.h"

@implementation bridgeAppDelegate

@synthesize window;

- (void) applicationDidFinishLaunching:(UIApplication*)application{

	NSLog(@"Booting bridge builder");
	CC_DIRECTOR_INIT();
	CCDirector *director = [CCDirector sharedDirector];

	[director setDeviceOrientation:kCCDeviceOrientationLandscapeLeft]; //set landscape mode
	//[director setDisplayFPS:YES]; 
	
	EAGLView *view = [director openGLView];
	[view setMultipleTouchEnabled:YES];  	// Turn on multiple touches
	
	[CCTexture2D setDefaultAlphaPixelFormat:kTexture2DPixelFormat_RGBA8888];	// Default texture format for PNG/BMP/TIFF/JPEG/GIF images
	
	NSLog(@"Starting bridge builder scene");
	[[[BridgeMain alloc] init] start ];

}


- (void)applicationWillResignActive:(UIApplication *)application {
	[[CCDirector sharedDirector] pause];
}

- (void)applicationDidBecomeActive:(UIApplication *)application {
	[[CCDirector sharedDirector] resume];
}

- (void)applicationDidReceiveMemoryWarning:(UIApplication *)application {
	[[CCDirector sharedDirector] purgeCachedData];
}

-(void) applicationDidEnterBackground:(UIApplication*)application {
	[[CCDirector sharedDirector] stopAnimation];
}

-(void) applicationWillEnterForeground:(UIApplication*)application {
	[[CCDirector sharedDirector] startAnimation];
}

- (void)applicationWillTerminate:(UIApplication *)application {
	[[CCDirector sharedDirector] end];
}

- (void)applicationSignificantTimeChange:(UIApplication *)application {
	[[CCDirector sharedDirector] setNextDeltaTimeZero:YES];
}

- (void)dealloc {
	[[CCDirector sharedDirector] release];
	[window release];
	[super dealloc];
}

@end
