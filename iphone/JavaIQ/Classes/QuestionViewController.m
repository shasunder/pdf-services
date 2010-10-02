//
//  QuestionViewController.m
//  JavaIQ
//
//  Created by sandeep m on 09/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "QuestionViewController.h"
#import "Record.h"
#import "DataController.h"

@implementation QuestionViewController

@synthesize dataController;
@synthesize category;
@synthesize records;
@synthesize webView;
@synthesize backButton;
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

- (void)viewDidLoad {
	[super viewDidLoad];
	
	CGRect frame=CGRectMake(0,0,320,460);
	webView = [[[UIWebView alloc] initWithFrame:frame] autorelease];
	webView.backgroundColor=[UIColor whiteColor];
	records= [dataController getQuestionsArrayForCategory:category];
	
	NSString *content=[[NSString alloc] init];
	if (records==NULL || [records count]==0) {
		content=@"No records found for your skill level";
	}
	for(Record *record in records){
		content= [NSString stringWithFormat:@"%@<strong>%@</strong><br/>%@</br></br>",content, record.question,record.answer];
	}
	
	NSString *contentHtml = [NSString stringWithFormat:@"<html> \n"
								   "<head> \n"
								   "<style type=\"text/css\"> \n"
								   "body {font-family: \"%@\"; font-size: %d;} html{ -webkit-text-size-adjust: none;}\n"
								   "</style> \n"
								   "</head> \n"
								   "<body>%@</body> \n"
								   "</html>", @"AmericanTypewriter", 15, content];
	
	[webView loadHTMLString:contentHtml baseURL:[NSURL URLWithString:@"http://dummy"]];

	[self.view addSubview:webView];
	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,50)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = [NSString stringWithFormat:@"%@ (%d)", category, [records count]];
	label.backgroundColor =[UIColor clearColor];
	[label setFont:[UIFont fontWithName:@"AmericanTypewriter" size:20]];
	self.navigationItem.titleView = label;
		
	backButton = [[UIButton buttonWithType:UIButtonTypeCustom ] retain];
	[backButton addTarget:self action:@selector(hideShowNav) forControlEvents:UIControlEventTouchUpInside];
	backButton.frame = CGRectMake(290, 0, 30, 30);
	
	[self hideShowNav];	
	
	[self.view addSubview:backButton];
	
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    // Return YES for supported orientations
	if (interfaceOrientation == UIInterfaceOrientationLandscapeLeft || interfaceOrientation== UIInterfaceOrientationLandscapeRight) {
		webView.frame= CGRectMake(0,0,480,320);
		backButton.frame = CGRectMake(450, 0, 30, 30);
	}else {
		webView.frame= CGRectMake(0,0,320,460);
		backButton.frame = CGRectMake(290, 0, 30, 30);
	}

    return YES;//(interfaceOrientation == UIInterfaceOrientationPortrait);
}


@end
