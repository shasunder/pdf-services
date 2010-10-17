#import <UIKit/UIKit.h>
#import "AdViewController.h"
#import "DataController.h"
#import "SettingsViewController.h"
#import "AudioRecorder.h"

@class AudioStreamer;

@interface RadioViewController : UIViewController <UIAlertViewDelegate,UIPickerViewDelegate, UIPickerViewDataSource>
{
	IBOutlet UIButton *button;
	IBOutlet UILabel *positionLabel;
	IBOutlet UISegmentedControl *categorySegments;
	AudioStreamer *streamer;
	NSTimer *progressUpdateTimer;
	NSArray *fmStationNames;
	IBOutlet UIPickerView *pickerView;
	AdViewController *adView;
	DataController *dataController;
	IBOutlet SettingsViewController *settingsViewController;
	IBOutlet UIToolbar *toolbar;
	 AudioRecorder *audioRecorder;
	IBOutlet UIButton *recordButton;
	
}

@property(nonatomic,retain) IBOutlet AdViewController *adView;
@property(nonatomic,retain) IBOutlet DataController *dataController;
@property(nonatomic,retain) IBOutlet UISegmentedControl *categorySegments;
@property(nonatomic,retain) IBOutlet UIPickerView *pickerView;
@property(nonatomic,retain) IBOutlet SettingsViewController *settingsViewController;
@property(nonatomic,retain) IBOutlet UIToolbar *toolbar;
@property(nonatomic,retain)  AudioRecorder *audioRecorder;
@property(nonatomic,retain)	IBOutlet UIButton *recordButton;


- (IBAction)categorySegmentsTouched:(id)sender;
- (IBAction)buttonPressed:(id)sender;
- (void)spinButton;
-(IBAction)loadSettingsView:(id)sender;

- (IBAction)recordPressed:(id)sender;

@end

