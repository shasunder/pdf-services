//
//  SettingsViewController.m
//  JavaIQ
//
//  Created by sandeep m on 16/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "SettingsViewController.h"
#import "Constants.h"
#import "DataController.h"

@implementation SettingsViewController

@synthesize dataController;
@synthesize expertise;
@synthesize updateCache;
@synthesize status;
@synthesize purchaseApp;
@synthesize buyButton;
@synthesize reset;
@synthesize purchaseAppLabel1;
@synthesize purchaseAppLabel2;

//utils
-(void)store:(NSString *)key :(NSString *)value{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	NSLog(@"Storing value: %@ for key %@ ",value,key);
	[defaults setObject:value forKey:key];
	[defaults synchronize]; 
}

#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	NSString *expertiseStr = [defaults stringForKey: KEY_EXPERTISE];
	NSLog(@"Stored value: %@ for key %@ ",expertiseStr, KEY_EXPERTISE);

	expertise.selectedSegmentIndex =expertiseStr.intValue;
	NSString *currentVersion = [defaults stringForKey:KEY_VERSION];
	if (currentVersion ==NULL) {
		currentVersion =@"0.1";
	}
	status.text= [NSString stringWithFormat:@"Update database(%@)", currentVersion];


	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,50)] autorelease];
	label.textColor = [UIColor blackColor];
	[label setFont:[UIFont fontWithName:@"AmericanTypewriter" size:20]];
	label.text = @"       Settings";
	label.backgroundColor=[UIColor clearColor];
	self.navigationItem.titleView = label;
	
	if(IS_APP_LITE ==@"YES"){
		[updateCache setTitleColor:[UIColor grayColor] forState:UIControlStateNormal ];
	    [updateCache setEnabled:NO ];
		[expertise setEnabled:NO];
	}else{
		[purchaseApp removeFromSuperview];
		[buyButton removeFromSuperview];
		[purchaseAppLabel1 removeFromSuperview];
		[purchaseAppLabel2 removeFromSuperview];
	}
	
	self.navigationItem.leftBarButtonItem.image = [UIImage imageNamed:@"back_button.png"];
	
}


-(IBAction) doUpdateCache:(id)sender{
	self.status.text=@"Updating...";
	self.status.backgroundColor= [UIColor orangeColor ];
	[self	reloadInputViews];
	[dataController loadGroupsUpdate];
	[dataController loadCache];
	NSString *latestVersion=[dataController getLatestApplicationVersion];

	status.text=[NSString stringWithFormat: @"Updated successfully ( %@)",latestVersion];
	[self store:KEY_VERSION : [NSString stringWithFormat:@"%@", latestVersion]];
	status.backgroundColor= [UIColor orangeColor ];
	NSLog(@"doUpdateCache completed");

}

-(IBAction)doUpdateExpertise:(id)sender{
	NSString *value = [NSString stringWithFormat:@"%d", expertise.selectedSegmentIndex];
	[self store:KEY_EXPERTISE :value];
}


-(IBAction)reset:(id)sender{
	[dataController resetData];
	[self store:KEY_VERSION : @"0" ];
	[self store:KEY_EXPERTISE :@"0"];
	
	[dataController loadGroups];
	NSLog(@"Reset complete");
	[self viewDidLoad ];
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    return YES;
}


-(IBAction)goToAppStore:(id)sender{
	NSURL *appStoreUrl = [NSURL URLWithString:APP_BUY_URL];
	[[UIApplication sharedApplication] openURL:appStoreUrl];
	
}

#pragma mark Memory management

- (void)dealloc {
    
    [super dealloc];
}

@end
