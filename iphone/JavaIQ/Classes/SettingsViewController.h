//
//  SettingsViewController.h
//  JavaIQ
//
//  Created by sandeep m on 16/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
@class DataController;

@interface SettingsViewController : UIViewController {
	DataController *dataController;
	IBOutlet UISegmentedControl *expertise;
	IBOutlet UIButton *updateCache;
	IBOutlet UILabel *status;
	IBOutlet UIButton *reset;
	IBOutlet UILabel *purchaseApp;
	IBOutlet UIButton *buyButton;
	IBOutlet UILabel *purchaseAppLabel1;
	IBOutlet UILabel *purchaseAppLabel2;
}
@property (nonatomic, retain) DataController *dataController;
@property (nonatomic, retain) UISegmentedControl *expertise;
@property (nonatomic, retain) UIButton *updateCache;
@property (nonatomic, retain) UILabel *status;
@property (nonatomic, retain) UIButton *reset;
@property (nonatomic, retain) UILabel *purchaseApp;
@property (nonatomic, retain) UIButton *buyButton;
@property (nonatomic, retain) UILabel *purchaseAppLabel1;
@property (nonatomic, retain) UILabel *purchaseAppLabel2;

-(IBAction) doUpdateCache:(id)sender;

-(IBAction) doUpdateExpertise:(id)sender;

-(IBAction) reset:(id)sender;
-(IBAction)goToAppStore:(id)sender;
@end
