//
//  WebPageDisplayController.h
//  WebView
//
//  Created by sandeep m on 23/11/2010.
//  Copyright 2010 bri. All rights reserved.
//


#import <UIKit/UIKit.h>
#import "OrderedDictionary.h"

@class DataController;
@interface WebPageDisplayController : UIViewController<UIApplicationDelegate,UIWebViewDelegate> {
	OrderedDictionary *webViews;
	
	NSString *email;
	NSString *webUrl;
	NSString *webUrlLogout;
	NSArray *webLoginFields;
	DataController *dataController;
	UIButton *backButton;
	UIButton *webBackButton;

}
@property (nonatomic, retain) NSString *email;
@property (nonatomic, retain) NSString *webUrl;
@property (nonatomic, retain) NSString *webUrlLogout;
@property (nonatomic, retain) NSArray *webLoginFields;

@property (nonatomic, retain) OrderedDictionary *webViews;
@property (nonatomic, retain) UIButton *backButton;
@property (nonatomic, retain) UIButton *webBackButton;

@property (nonatomic, retain) IBOutlet UIWindow *window;
@property (nonatomic, retain) DataController *dataController;

@end

