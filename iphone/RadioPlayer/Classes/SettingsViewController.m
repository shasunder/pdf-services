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
@synthesize updateCache;
@synthesize status;
@synthesize reset;
#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	
}


-(void) askBuy{
	UIAlertView *buyAlert = [[UIAlertView alloc] initWithTitle: @"Station updates are not available for lite version" message: @"Please buy the app for a $ from app store and enjoy ad free app with latest station updates" delegate:self  cancelButtonTitle: @"No thanks" otherButtonTitles:nil];
	[buyAlert addButtonWithTitle:@"Buy"];
	[buyAlert show];
	[buyAlert release];
}


-(void)store:(NSString *)key :(NSString *)value{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	NSLog(@"Storing value: %@ for key %@ ",value,key);
	[defaults setObject:value forKey:key];
	[defaults synchronize]; 
}

-(IBAction) updateStations:(id)sender{
	
	if(IS_APP_LITE ==@"YES"){
		[self askBuy];
		return;
	}
	[dataController loadStationsUpdate];
	[self store:KEY_CURRENT_CATEGORY:nil];
	[self store:KEY_CURRENT_STATION:nil];
	NSLog(@"doUpdateCache completed");
}


-(IBAction)  reset:(id)sender{
	[dataController resetData];
	[dataController loadStations];
	NSLog(@"Reset complete");
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    // Return YES for supported orientations
    return YES;//(interfaceOrientation == UIInterfaceOrientationPortrait);
}


#pragma mark Memory management

- (void)dealloc {
    
    [super dealloc];
}

@end
