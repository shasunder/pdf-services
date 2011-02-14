//
//  SettingsViewController.h
//  JavaIQ
//
//  Created by sandeep m on 16/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>

@class DataController;
@class RootViewController;

@interface SettingsViewController : UIViewController<UITableViewDelegate, UITableViewDataSource, UIPickerViewDelegate>{
	DataController *dataController;
	IBOutlet UIButton *reset;
	IBOutlet UIButton *addButton;
	IBOutlet UIButton *editModeButton;
	IBOutlet UIButton *rateButton;
	IBOutlet UITableView *accountsTable;
	IBOutlet UIPickerView *pickerView;
	RootViewController *rootViewController;

}
@property (nonatomic, retain) DataController *dataController;
@property (nonatomic, retain) UIButton *reset;
@property (nonatomic, retain) UIButton *addButton;
@property (nonatomic, retain) UIButton *rateButton;
@property (nonatomic, retain) UITableView *accountsTable;
@property (nonatomic, retain) RootViewController *rootViewController;
@property (nonatomic, retain) UIPickerView *pickerView;

-(IBAction) addAccount:(id)sender;
-(IBAction) selectWebsite:(id)sender;

-(void) reset;

-(IBAction)rateThisApp:(id)sender;

-(IBAction)editMode:(id)sender;

-(IBAction)editAdvanced:(id)sender;

@end
