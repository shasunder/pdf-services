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
