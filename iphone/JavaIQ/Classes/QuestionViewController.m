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

- (void)viewDidLoad {
	[super viewDidLoad];
	CGRect frame=CGRectMake(5,20,315,400);
	UIWebView *webView = [[[UIWebView alloc] initWithFrame:frame] autorelease];
	webView.backgroundColor=[UIColor whiteColor];
	records= [dataController getQuestionsArrayForCategory:category];
	
	NSString *content=[[NSString alloc] init];
	
	for(Record *record in records){
		content= [NSString stringWithFormat:@"%@<strong>%@</strong><br/>%@</br></br>",content, record.question,record.answer];
	}
	
	[webView loadHTMLString:content baseURL:[NSURL URLWithString:@"http://dummy"]];

	[self.view addSubview:webView];
	self.navigationItem.title =category;
	
	
}


@end
