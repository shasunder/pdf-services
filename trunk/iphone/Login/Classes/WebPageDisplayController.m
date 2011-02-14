    //
//  WebPageDisplayController.m
//  WebView
//
//  Created by sandeep m on 23/11/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "WebPageDisplayController.h"
#import <AddressBook/AddressBook.h>
#import "Constants.h"


@implementation WebPageDisplayController

@synthesize window;
@synthesize email;
@synthesize webUrl;
@synthesize webUrlLogout;
@synthesize dataController;
@synthesize webViews;
@synthesize backButton;
@synthesize webLoginFields;

BOOL loaded;
NSTimer *reloadTimer;
UIWebView *webView;
BOOL navHidden = YES;



-(void)hideShowNav { 
	[self.navigationController setNavigationBarHidden:navHidden animated:YES];
	NSString *icon= @"collapse-down.png";
	if(!navHidden){
		icon = @"collapse-up.png";
	}
	UIImage *backButtonImage = [UIImage imageNamed:icon];
	[backButton setImage:backButtonImage forState:UIControlStateNormal];
	navHidden= ! navHidden;
}
-(void)showBack{

	NSString *icon= @"back.png";
	UIImage *backButtonImage = [UIImage imageNamed:icon];
	[webBackButton setImage:backButtonImage forState:UIControlStateNormal];
	
	
}

-(void)back { 
	[webView goBack];
}

-(void)forward { 
	[webView goForward];
}

-(NSString *)getJS{
	return [NSString stringWithFormat:@"<script language =\"javascript\">"
			"function _getElement(nameOrId){ var el= document.getElementById(nameOrId) ==null ? document.getElementsByName(nameOrId)[0] : document.getElementById(nameOrId) ; "
			"if(el==null) { el= document.getElementsByName(nameOrId); } return el;  }"
			"</script>"];
	
}

- (void) loadPage: (NSString *) urlAddress  {
	//Create a URL object.
	NSTimeInterval timeInterval = [[NSDate date] timeIntervalSince1970];
	urlAddress = [NSString stringWithFormat:@"%@?t=%f",urlAddress, timeInterval];
	
	NSLog(@"Loading url : %@",urlAddress);
	
	NSURL *url = [NSURL URLWithString:urlAddress];
	NSURLRequest *requestObj = [NSURLRequest requestWithURL:url cachePolicy:NSURLRequestReloadIgnoringCacheData  timeoutInterval:60.0];
	[webView loadRequest:requestObj];
	url = nil; requestObj = nil;
	
}
-(void)loadWebView{
	NSLog(@"Loading web view for : %@",email);
	webView = [webViews objectForKey:email];
	if(webView == nil){
		CGRect frame=CGRectMake(0,0,320,460);
		webView = [[[UIWebView alloc] initWithFrame:frame] autorelease];
		webView.backgroundColor=[UIColor whiteColor];
		[self loadPage: webUrl];
		NSLog(@"Loading cache view for : %@",email);
		
		[webViews setValue:webView forKey:email];
	}
	
	return [webViews objectForKey:email];
}

- (void)viewDidLoad {
	[super viewDidLoad];
	
	[NSThread sleepForTimeInterval:2.0];
		
	[self loadWebView ];
	
	[self.view addSubview:webView];
	
	
	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,50)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = [NSString stringWithFormat:@"%@ ", @"       Login"];
	label.backgroundColor =[UIColor clearColor];
	[label setFont:[UIFont fontWithName:@"AmericanTypewriter" size:20]];
	self.navigationItem.titleView = label;
	webView.delegate = self;
	
	
	backButton = [[UIButton buttonWithType:UIButtonTypeCustom ] retain];
	[backButton addTarget:self action:@selector(hideShowNav) forControlEvents:UIControlEventTouchUpInside];
	backButton.frame = CGRectMake(295, 0, 30, 30);
	

	webBackButton = [[UIButton buttonWithType:UIButtonTypeCustom ] retain];
	[webBackButton addTarget:self action:@selector(back) forControlEvents:UIControlEventTouchUpInside];
	webBackButton.frame = CGRectMake(0, 440, 30, 30);
	
	[self showBack];	
	[self hideShowNav];	
	
	[self.view addSubview:backButton];
	[self.view addSubview:webBackButton];
	
	
}

- (void)webViewDidStartLoad:(UIWebView *)webView {
	NSLog(@"Start");
}


- (void)webViewDidFinishLoad:(UIWebView *)webView{
	NSLog(@"finish");
	if(!loaded){
		//TODO: check if login screen or not!
		[self login:email :[dataController getPassword:email]];
		loaded= true;
	}
}

-(void) login:(NSString *)email : (NSString *)password{
	NSLog(@"Logging in with %@ ",email);
	//[webView stringByEvaluatingJavaScriptFromString:[NSString stringWithFormat:@"alert('hi');"]];
	
	NSString *result;
	NSString *emailId=[webLoginFields objectAtIndex:0];
	NSString *passwdId=[webLoginFields objectAtIndex:1];
	NSString *formId=[webLoginFields objectAtIndex:2];
	
	result = [webView stringByEvaluatingJavaScriptFromString:[NSString stringWithFormat:@" var nameOrId='%@'; var el = document.getElementById(nameOrId) ==null ? document.getElementsByName(nameOrId)[0] : document.getElementById(nameOrId); el.value='%@';", emailId,email]];
	result = [webView stringByEvaluatingJavaScriptFromString:[NSString stringWithFormat:@"var nameOrId='%@'; var el = document.getElementById(nameOrId) ==null ? document.getElementsByName(nameOrId)[0] : document.getElementById(nameOrId); el.value='%@';", passwdId,password]];
	result	= [webView stringByEvaluatingJavaScriptFromString:[NSString stringWithFormat:@"var nameOrId='%@'; var el = document.getElementById(nameOrId) ==null ? document.getElementsByName(nameOrId)[0] : document.getElementById(nameOrId);   document.getElementsByTagName('form')[0].submit(); //el.submit();",formId]];

}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
	
	if (interfaceOrientation == UIInterfaceOrientationLandscapeLeft || interfaceOrientation== UIInterfaceOrientationLandscapeRight) {
		webView.frame= CGRectMake(0,0,480,320);
		backButton.frame = CGRectMake(450, 0, 30, 30);
		webBackButton.frame =CGRectMake(315, 0, 30, 30);
		
	}else {
		webView.frame= CGRectMake(0,0,320,460);
		backButton.frame = CGRectMake(295, 0, 30, 30);
		webBackButton.frame =CGRectMake(0, 440, 30, 30); 
	}
	
	
    return YES;//(interfaceOrientation == UIInterfaceOrientationPortrait);
}

-(void)dealloc{
	NSLog(@"Logging out ");
	[self loadPage: webUrlLogout];
	[webView removeFromSuperview];
    webView.delegate = nil;
	webView =nil;
	webViews=nil;

	email = nil;
	loaded = false;
	[NSThread sleepForTimeInterval:2.0];

	[super dealloc];
}

@end
