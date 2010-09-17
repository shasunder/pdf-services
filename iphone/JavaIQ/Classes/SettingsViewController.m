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
	NSInteger *currentVersion = [defaults stringForKey:KEY_VERSION].intValue;
	status.text= [NSString stringWithFormat:@"%@ (current version %d)", status.text ,currentVersion];
	/*
	NSString *title=@"Settings";
	NSInteger *latestVersion=[dataController getLatestApplicationVersion].intValue;
	NSInteger *currentVersion = [defaults stringForKey:KEY_VERSION].intValue;

	if(latestVersion !=currentVersion){
		title= @"Settings(Update found)";
	}
	*/

	self.title = @"Settings";
	
}


-(IBAction) doUpdateCache:(id)sender{
	self.status.text=@"Updating...";
	self.status.backgroundColor= [UIColor orangeColor ];
	
	[dataController loadGroupsUpdate];
	[dataController loadCache];
	NSInteger *latestVersion=[dataController getLatestApplicationVersion].intValue;

	status.text=[NSString stringWithFormat: @"Update completed successfully (version %@)",latestVersion];
	[self store:KEY_VERSION : [NSString stringWithFormat:@"%d", latestVersion]];
	status.backgroundColor= [UIColor orangeColor ];
	NSLog(@"doUpdateCache completed");

}

-(IBAction) doUpdateExpertise:(id)sender{
	NSString *value = [NSString stringWithFormat:@"%d", expertise.selectedSegmentIndex];
	[self store:KEY_EXPERTISE :value];
}

-(void)store:(NSString *)key :(NSString *)value{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	NSLog(@"Storing value: %@ for key %@ ",value,KEY_EXPERTISE);
	[defaults setObject:value forKey:KEY_EXPERTISE];
	[defaults synchronize]; 
}

#pragma mark Memory management

- (void)dealloc {
    
    [super dealloc];
}

@end
