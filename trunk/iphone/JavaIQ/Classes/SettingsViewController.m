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
	status.text= [NSString stringWithFormat:@"Update DB from internet (current version %@)", currentVersion];


	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,185)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = @"       Settings";
	self.navigationItem.titleView = label;
	
	
}


-(IBAction) doUpdateCache:(id)sender{
	self.status.text=@"Updating...";
	self.status.backgroundColor= [UIColor orangeColor ];
	
	[dataController loadGroupsUpdate];
	[dataController loadCache];
	NSString *latestVersion=[dataController getLatestApplicationVersion];

	status.text=[NSString stringWithFormat: @"Update completed successfully (version %@)",latestVersion];
	[self store:KEY_VERSION : [NSString stringWithFormat:@"%@", latestVersion]];
	status.backgroundColor= [UIColor orangeColor ];
	NSLog(@"doUpdateCache completed");

}

-(IBAction) doUpdateExpertise:(id)sender{
	NSString *value = [NSString stringWithFormat:@"%d", expertise.selectedSegmentIndex];
	[self store:KEY_EXPERTISE :value];
}

-(void)store:(NSString *)key :(NSString *)value{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	NSLog(@"Storing value: %@ for key %@ ",value,key);
	[defaults setObject:value forKey:key];
	[defaults synchronize]; 
}

-(IBAction)  reset:(id)sender{
	[dataController resetData];
	[self store:KEY_VERSION : @"0" ];
	[self store:KEY_EXPERTISE :@"0"];
	
	NSLog(@"Reset complete");
	[self viewDidLoad ];
}

#pragma mark Memory management

- (void)dealloc {
    
    [super dealloc];
}

@end
