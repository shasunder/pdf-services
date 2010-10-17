#import <UIKit/UIKit.h>

@class RadioViewController;

@interface RadioAppDelegate : NSObject <UIApplicationDelegate> {
    UIWindow *window;
    RadioViewController *viewController;
}

@property (nonatomic, retain) IBOutlet UIWindow *window;
@property (nonatomic, retain) IBOutlet RadioViewController *viewController;

@end

