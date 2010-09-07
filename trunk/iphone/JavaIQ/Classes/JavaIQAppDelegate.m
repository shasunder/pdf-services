//
//  JavaIQAppDelegate.m
//  JavaIQ
//
//  Created by sandeep m on 07/09/2010.
//  Copyright bri 2010. All rights reserved.
//


#import "JavaIQAppDelegate.h"
#import "RootViewController.h"
#import "DataController.h"


@implementation JavaIQAppDelegate

@synthesize window;
@synthesize navigationController;
@synthesize rootViewController;
@synthesize dataController;


- (void)applicationDidFinishLaunching:(UIApplication *)application {
    
    // Create the data controller.
    DataController *controller = [[DataController alloc] init];
    self.dataController = controller;
    [controller release];
    
	rootViewController.dataController = dataController;
    
    /*
	 The navigation and root view controllers are created in the main nib file.
	 Configure the window with the navigation controller's view and then show it.
	 */
    [window addSubview:[navigationController view]];
    [window makeKeyAndVisible];
}


- (void)dealloc {
    [navigationController release];
	[rootViewController release];
    [window release];
    [dataController release];
    [super dealloc];
}

@end
