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
@synthesize expandButton;

BOOL navHidden = YES;
BOOL expand = YES;

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

-(void)expandOrCollapse { 
	NSString *jsEval = expand ? @"displayClass('answer','block')" : @"displayClass('answer','none')";
	[webView stringByEvaluatingJavaScriptFromString:jsEval];

	NSString *icon= @"button-collapse.png";
	if(!expand){
		icon = @"button-expand.png";
	}
		
	UIImage *expandButtonImage = [UIImage imageNamed:icon];
	[expandButton setImage:expandButtonImage forState:UIControlStateNormal];
	expand= ! expand;
}

-(NSString *)getJS{
	return [NSString stringWithFormat:@"<script language =\"javascript\">"
			"function displayClass(objClass, display){\n" 
			"	var elements = document.getElementsByTagName('div');\n"
			"	for (i=0; i<elements.length; i++){\n"
			"		if (elements[i].className==objClass){\n"
			"			elements[i].style.display= display; \n"
			"		}"
			"	}"
			"}"
			" "
			"function hideShowRow(index){ \n "
			"   var row = document.getElementById('answer'+index);"
			"   var current =row.style.display;"
			"   row.style.display = (current == 'block') ? 'none' : 'block';"
			" } "
			"</script>"];
	
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
	int i=0;
	for(Record *record in records){
		content= [NSString stringWithFormat:@"%@<div class=\"question\" onclick=\"hideShowRow(%d).style.display= 'block';\"><strong>%@</strong></div><br/><div id=\"answer%d\" class=\"answer\">%@</br></div></br>",content,i, record.question,i, record.answer];
		i=i+1;
	}
	
	NSString *contentHtml = [NSString stringWithFormat:@"<html> \n"
								   "<head> \n"
								   "   <style type=\"text/css\"> \n"
								   "    body {font-family: \"%@\"; font-size: %d;} html{ -webkit-text-size-adjust: none;}\n"
								   "   </style> \n"
							       "    %@ "   //javascript
								   "</head> \n"
								   "<body >%@</body> \n"
							 "</html>", @"AmericanTypewriter", 15, [self getJS], content];
	
	//NSLog(contentHtml);
	NSString *defaultDirPath=[[NSBundle mainBundle] resourcePath];
	defaultDirPath = [NSString stringWithFormat:@"%@",defaultDirPath];
	NSURL *baseURL = [NSURL fileURLWithPath:defaultDirPath];

	
	[webView loadHTMLString:contentHtml baseURL:baseURL];

	[self.view addSubview:webView];
	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,50)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = [NSString stringWithFormat:@"%@ (%d)", category, [records count]];
	label.backgroundColor =[UIColor clearColor];
	[label setFont:[UIFont fontWithName:@"AmericanTypewriter" size:20]];
	self.navigationItem.titleView = label;
		
	backButton = [[UIButton buttonWithType:UIButtonTypeCustom ] retain];
	[backButton addTarget:self action:@selector(hideShowNav) forControlEvents:UIControlEventTouchUpInside];
	backButton.frame = CGRectMake(295, 0, 30, 30);
	
	
	expandButton = [[UIButton buttonWithType:UIButtonTypeCustom ] retain];
	[expandButton addTarget:self action:@selector(expandOrCollapse) forControlEvents:UIControlEventTouchUpInside];
	expandButton.frame = CGRectMake(295, 20, 30, 30);
	
	[self hideShowNav];	
	[self expandOrCollapse];
	
	[self.view addSubview:backButton];
	[self.view addSubview:expandButton];
		
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    // Return YES for supported orientations
	if (interfaceOrientation == UIInterfaceOrientationLandscapeLeft || interfaceOrientation== UIInterfaceOrientationLandscapeRight) {
		webView.frame= CGRectMake(0,0,480,320);
		backButton.frame = CGRectMake(450, 0, 30, 30);
		expandButton.frame = CGRectMake(450, 20, 30, 30);
	}else {
		webView.frame= CGRectMake(0,0,320,460);
		backButton.frame = CGRectMake(295, 0, 30, 30);
		expandButton.frame = CGRectMake(295, 20, 30, 30);
	}

    return YES;//(interfaceOrientation == UIInterfaceOrientationPortrait);
}



@end
