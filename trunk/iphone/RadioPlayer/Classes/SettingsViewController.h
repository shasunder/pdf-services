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
	IBOutlet UIButton *updateCache;
	IBOutlet UILabel *status;
	IBOutlet UIButton *reset;
}
@property (nonatomic, retain) DataController *dataController;
@property (nonatomic, retain) UIButton *updateCache;
@property (nonatomic, retain) UILabel *status;
@property (nonatomic, retain) UIButton *reset;

-(IBAction) updateStations:(id)sender;

-(IBAction) reset:(id)sender;
@end
