//
//  iPhoneStreamingPlayerViewController.h
//  iPhoneStreamingPlayer
//
//  Created by Matt Gallagher on 28/10/08.
//  Copyright Matt Gallagher 2008. All rights reserved.
//
//  Permission is given to use this source code file, free of charge, in any
//  project, commercial or otherwise, entirely at your risk, with the condition
//  that any redistribution (in part or whole) of source code must retain
//  this copyright and permission notice. Attribution in compiled projects is
//  appreciated but not required.
//

#import <UIKit/UIKit.h>
#import "AdViewController.h"
#import "DataController.h"
@class AudioStreamer;

@interface iPhoneStreamingPlayerViewController : UIViewController <UIAlertViewDelegate,UIPickerViewDelegate, UIPickerViewDataSource>
{
	IBOutlet UIButton *button;
	IBOutlet UILabel *positionLabel;
	IBOutlet UISegmentedControl *categorySegments;
	AudioStreamer *streamer;
	NSTimer *progressUpdateTimer;
	NSMutableArray *fmStationNames;
	IBOutlet UIPickerView *pickerView;
	AdViewController *adView;
	DataController *dataController;
	IBOutlet UIButton *buttonSettings;
	
}

@property(nonatomic,retain) IBOutlet AdViewController *adView;
@property(nonatomic,retain) IBOutlet DataController *dataController;
@property(nonatomic,retain) IBOutlet UISegmentedControl *categorySegments;
@property(nonatomic,retain) IBOutlet IBOutlet UIPickerView *pickerView;

- (IBAction)categorySegmentsTouched:(id)sender;
- (IBAction)buttonPressed:(id)sender;
- (void)spinButton;
- (void)updateProgress:(NSTimer *)aNotification;
- (IBAction)sliderMoved:(UISlider *)aSlider;
-(IBAction)updateStations:(id)sender;

@end

