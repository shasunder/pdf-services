//
//  SettingsAdvanced.h
//  Login
//
//  Created by sandeep m on 22/01/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import <Foundation/Foundation.h>

@class DataController;
@class RootViewController;
@class SettingsViewController;

@interface SettingsAdvancedViewController : UIViewController<UITableViewDelegate, UITableViewDataSource, UIPickerViewDelegate> {

	DataController *dataController;
	IBOutlet UIButton *reset;
	IBOutlet UIButton *addButton;
	IBOutlet UIButton *editModeButton;
	IBOutlet UIButton *rateButton;
	IBOutlet UITableView *websiteDetailsTable;
	IBOutlet UIPickerView *pickerView;
	RootViewController *rootViewController;
	SettingsViewController *settingsViewController;
	IBOutlet UILabel *note;
}

@property (nonatomic, retain) DataController *dataController;
@property (nonatomic, retain) UIButton *reset;
@property (nonatomic, retain) UIButton *addButton;
@property (nonatomic, retain) UITableView *websiteDetailsTable;
@property (nonatomic, retain) RootViewController *rootViewController;
@property (nonatomic, retain) SettingsViewController *settingsViewController;
@property (nonatomic, retain) UIPickerView *pickerView;
@property (nonatomic, retain) UILabel *note;

-(IBAction) addWebsiteDetails:(id)sender;
-(IBAction) selectWebsite:(id)sender;

-(IBAction) reset:(id)sender;

-(IBAction)editMode:(id)sender;


@end
