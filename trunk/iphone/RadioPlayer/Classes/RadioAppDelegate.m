
#import "RadioAppDelegate.h"
#import "RadioViewController.h"

@implementation RadioAppDelegate

@synthesize window;
@synthesize viewController;

- (void)applicationDidFinishLaunching:(UIApplication *)application {
		NSDictionary *credentialStorage =
			[[NSURLCredentialStorage sharedCredentialStorage] allCredentials];
		NSLog(@"Credentials: %@", credentialStorage);

    // Override point for customization after app launch    
    [window addSubview:viewController.view];
    [window makeKeyAndVisible];
}


- (void)dealloc {
    [viewController release];
    [window release];
    [super dealloc];
}


@end
