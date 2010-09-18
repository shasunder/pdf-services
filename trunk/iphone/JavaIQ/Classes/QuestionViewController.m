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
	CGRect frame=CGRectMake(5,20,315,420);
	UIWebView *webView = [[[UIWebView alloc] initWithFrame:frame] autorelease];
	webView.backgroundColor=[UIColor whiteColor];
	records= [dataController getQuestionsArrayForCategory:category];
	
	NSString *content=[[NSString alloc] init];
	
	for(Record *record in records){
		content= [NSString stringWithFormat:@"%@<strong>%@</strong><br/>%@</br></br>",content, record.question,record.answer];
	}
	
	[webView loadHTMLString:content baseURL:[NSURL URLWithString:@"http://dummy"]];

	[self.view addSubview:webView];
	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,185)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = category;
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
@end
