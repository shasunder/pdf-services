//
//  QuestionViewController.m
//  JavaIQ
//
//  Created by sandeep m on 09/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "QuestionViewController.h"
#import "Record.h"

@implementation QuestionViewController

@synthesize dataController;
@synthesize category;
@synthesize records;
UIWebView *webView;

- (void)viewDidLoad {
	[super viewDidLoad];
	CGRect frame=CGRectMake(5,20,315,420);
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
	
	[webView loadHTMLString:content baseURL:[NSURL URLWithString:@"http://dummy"]];

	[self.view addSubview:webView];
	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,185)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = [NSString stringWithFormat:@"%@ (%d questions)", category, [records count]];
	self.navigationItem.titleView = label;
	[self.navigationController setNavigationBarHidden:YES animated:YES];
	
	
}

- (void)touchesBegan:(NSSet *)touches withEvent:(UIEvent *)event
{
	[super touchesBegan:touches withEvent:event];
    NSUInteger numTaps = [[touches anyObject] tapCount];
	NSLog(@"tapped");
	[self.navigationController setNavigationBarHidden:NO animated:YES];
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    // Return YES for supported orientations
	if (interfaceOrientation == UIInterfaceOrientationLandscapeLeft || interfaceOrientation== UIInterfaceOrientationLandscapeRight) {
		webView.frame= CGRectMake(5,20,440,315);
	}else {
		webView.frame= CGRectMake(5,20,315,420);
	}

    return YES;//(interfaceOrientation == UIInterfaceOrientationPortrait);
}

@end
