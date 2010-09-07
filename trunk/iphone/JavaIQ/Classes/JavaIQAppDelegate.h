//
//  JavaIQAppDelegate.h
//  JavaIQ
//
//  Created by sandeep m on 07/09/2010.
//  Copyright bri 2010. All rights reserved.
//

#import <UIKit/UIKit.h>
@class DataController;
@class RootViewController;

@interface JavaIQAppDelegate : NSObject <UIApplicationDelegate> {
	
	UIWindow *window;
	
	UINavigationController *navigationController;
	RootViewController *rootViewController;
	
    DataController *dataController;
}

@property (nonatomic, retain) IBOutlet UIWindow *window;
@property (nonatomic, retain) IBOutlet UINavigationController *navigationController;
@property (nonatomic, retain) IBOutlet RootViewController *rootViewController;

@property (nonatomic, retain) DataController *dataController;

@end
