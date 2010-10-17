#import "RadioViewController.h"
#import "AudioStreamer.h"
#import <QuartzCore/CoreAnimation.h>
#import <MediaPlayer/MediaPlayer.h>
#import <CFNetwork/CFNetwork.h>
#import "DataController.h"
#import "Constants.h"
#import "SettingsViewController.h"
#include <stdlib.h>
#import "OrderedDictionary.h"
#import "AudioRecorder.h"

@implementation RadioViewController
@synthesize adView;
@synthesize dataController;
@synthesize categorySegments;
@synthesize pickerView;
@synthesize settingsViewController;
@synthesize toolbar;
@synthesize audioRecorder;
@synthesize recordButton;

RadioViewController *this;
NSString *station;
NSArray *categories;
NSString *category;
BOOL isLoading=YES;
BOOL recording= NO;

NSString *currentBackground;

- (void)setButtonImage:(UIImage *)image{
	[button.layer removeAllAnimations];
	
	if (!image){
		[button setImage:[UIImage imageNamed:@"playbuttonsky.png"] forState:0];
	}
	else{
		[button setImage:image forState:0];
		
		if ([button.currentImage isEqual:[UIImage imageNamed:@"loading.png"]]){
			[self spinButton];
		}
	}
}


- (void)destroyStreamer
{
	if (streamer)
	{
		[[NSNotificationCenter defaultCenter]
		 removeObserver:self
		 name:ASStatusChangedNotification
		 object:streamer];
		
		[streamer stop];
		[streamer release];
		streamer = nil;
	}
}

- (void)createStreamer:(NSString *)fmStation
{
	if (streamer){
		return;
	}
	
	//NSLog([NSString stringWithFormat:@"Playing station : %@",fmStation]);
	[self destroyStreamer];
	
	NSString *escapedValue =
	[(NSString *)CFURLCreateStringByAddingPercentEscapes(
														 nil,
														 (CFStringRef)fmStation,
														 NULL,
														 NULL,
														 kCFStringEncodingUTF8)
	 autorelease];
	
	NSURL *url = [NSURL URLWithString:escapedValue];
	streamer = [[AudioStreamer alloc] initWithURL:url];
	
	
	[[NSNotificationCenter defaultCenter]
	 addObserver:self
	 selector:@selector(playbackStateChanged:)
	 name:ASStatusChangedNotification
	 object:streamer]; 
}


-(void)setBackground:(int) index {
	index +=BACKGROUND_INDEX;
	currentBackground = [dataController.backgrounds objectAtIndex:index ];
    self.view.backgroundColor = [UIColor colorWithPatternImage:[UIImage imageNamed:currentBackground]];
	settingsViewController.view.backgroundColor = [UIColor colorWithPatternImage:[UIImage imageNamed:currentBackground]];
	adView.view.backgroundColor = [UIColor colorWithPatternImage:[UIImage imageNamed:currentBackground]];

}

- (void) loadPickerView {
  NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	NSString *stationTemp = [defaults stringForKey: KEY_CURRENT_STATION];
	NSString *categoryTemp = [defaults stringForKey: KEY_CURRENT_CATEGORY];
	if(stationTemp!=nil && categoryTemp !=nil){
			
		categorySegments.selectedSegmentIndex= [defaults integerForKey:KEY_CURRENT_CATEGORY_INDEX];
		int stationIdTemp=[defaults integerForKey:KEY_CURRENT_STATION_INDEX];
		//NSLog([NSString stringWithFormat:@"Found stored category:%@ and station :%@ , id: %d",categoryTemp, stationTemp	, stationIdTemp]);
		
		[pickerView selectRow:stationIdTemp inComponent:0 animated:NO ];
		[self createStreamer:stationTemp];
		[streamer start];
		
	}else{
		[pickerView selectRow:0 inComponent:0 animated:NO ];
	}
	
	
	pickerView.backgroundColor = [UIColor clearColor];
	
	for (int i=0; i<[[pickerView subviews] count]; i++) {
		[(UIView*)[[pickerView subviews] objectAtIndex:i] setAlpha:0.0f];
    }
	[(UIView*)[[pickerView subviews] objectAtIndex:4] setAlpha:1.0f]; //the text in row
	
	for (int i=0; i<[[categorySegments subviews] count]; i++) {
		[(UIView*)[[categorySegments subviews] objectAtIndex:i] setAlpha:0.4f];
    }
	
	[self.toolbar setAlpha:0.4f];
	//[(UIView*)[[self.toolbar subviews] objectAtIndex:0] setAlpha:1.0f];
}

- (void) loadStationGenre {
    int i=0;
	[categorySegments removeAllSegments];
	for (NSString *title in categories) {
		[categorySegments insertSegmentWithTitle:title atIndex:i++ animated:NO ];	
	}
	categorySegments.selectedSegmentIndex =0;

}

- (void) loadSettingsButton {
	// create button
	UIButton *settingsButton = [UIButton buttonWithType:100 ]; 
	[settingsButton setImage:[UIImage imageNamed:@"update.png"] forState:UIControlStateNormal];
    [settingsButton setBackgroundImage:[UIImage imageNamed:nil] forState:UIControlStateNormal];
	[settingsButton addTarget:self action:@selector(mainAction) forControlEvents:UIControlEventTouchUpInside];
	[settingsButton setTitle:@"" forState:UIControlStateNormal];
	UIBarButtonItem* mainItem = [[UIBarButtonItem alloc] initWithCustomView:nil];
	
	[self.toolbar setItems:[NSArray arrayWithObject:mainItem]];
	
}
-(void) viewDidUnload{
	[audioRecorder stopPlayback];
}

- (void)viewDidLoad
{
    self.audioRecorder = [[[AudioRecorder	alloc] init] retain];
	
	
	dataController = [[DataController alloc] init];	
	[dataController retain];
	settingsViewController.dataController = dataController;
	
	[self setButtonImage:[UIImage imageNamed:@"playbuttonsky.png"]];
	
	categories = [dataController getCategories];
	[categories retain];
	
	category  = [categories objectAtIndex:0];
	fmStationNames= [dataController getStationTitles:category];
	
	station = [dataController getStationUrl:category :[fmStationNames  objectAtIndex:0]];
	//NSLog([NSString stringWithFormat:@"station : %@",station]);
	
	[self loadStationGenre];

		
	[self loadPickerView];
	[self setBackground:0];
	
	[self loadSettingsButton];	
	[super viewDidLoad];
	[recordButton removeFromSuperview];
	
}


- (IBAction)categorySegmentsTouched:(id)sender{
	
	//NSLog([NSString stringWithFormat: @"Touched category :%d",categorySegments.selectedSegmentIndex ]);
	category =[categories objectAtIndex: categorySegments.selectedSegmentIndex ];
	fmStationNames= [dataController getStationTitles:category];
	if ([fmStationNames count] >0) {
		station = [dataController getStationUrl:category :[fmStationNames  objectAtIndex:0]];
		[self.pickerView reloadData];
		[pickerView selectRow:-1 inComponent:0 animated:YES ];
		
	}
	[self setBackground:categorySegments.selectedSegmentIndex];
}


- (BOOL)textFieldShouldReturn:(UITextField *)sender
{
	[sender resignFirstResponder];
	[self createStreamer:station];
	return YES;
}



- (void)spinButton
{
	[CATransaction begin];
	[CATransaction setValue:(id)kCFBooleanTrue forKey:kCATransactionDisableActions];
	CGRect frame = [button frame];
	button.layer.anchorPoint = CGPointMake(0.5, 0.5);
	button.layer.position = CGPointMake(frame.origin.x + 0.5 * frame.size.width, frame.origin.y + 0.5 * frame.size.height);
	[CATransaction commit];

	[CATransaction begin];
	[CATransaction setValue:(id)kCFBooleanFalse forKey:kCATransactionDisableActions];
	[CATransaction setValue:[NSNumber numberWithFloat:2.0] forKey:kCATransactionAnimationDuration];

	CABasicAnimation *animation;
	animation = [CABasicAnimation animationWithKeyPath:@"transform.rotation.z"];
	animation.fromValue = [NSNumber numberWithFloat:0.0];
	animation.toValue = [NSNumber numberWithFloat:2 * M_PI];
	animation.timingFunction = [CAMediaTimingFunction functionWithName: kCAMediaTimingFunctionLinear];
	animation.delegate = self;
	[button.layer addAnimation:animation forKey:@"rotationAnimation"];

	[CATransaction commit];
}


- (void)animationDidStop:(CAAnimation *)theAnimation finished:(BOOL)finished{
	if (finished){
		[self spinButton];
	}
}



- (void)playbackStateChanged:(NSNotification *)aNotification
{
	if ([streamer isWaiting]){
		[self setButtonImage:[UIImage imageNamed:@"loading.png"]];
	}
	else if ([streamer isPlaying]){
		[self setButtonImage:[UIImage imageNamed:@"stopbuttonsky.png"]];
	}
	else if ([streamer isIdle]){
		[self destroyStreamer];
		[self setButtonImage:[UIImage imageNamed:@"playbuttonsky.png"]];
	}
}




- (NSInteger)numberOfComponentsInPickerView:(UIPickerView *)pickerView;
{
    return 1;
}

-(void)store:(NSString *)key :(NSString *)value{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	//NSLog(@"Storing value: %@ for key %@ ",value,key);
	[defaults setObject:value forKey:key];
	[defaults synchronize]; 
}


-(void) storeUserKeys{
	[self store:KEY_CURRENT_CATEGORY:category];
	[self store:KEY_CURRENT_STATION:station];
	[self store:KEY_CURRENT_CATEGORY_INDEX:[NSString stringWithFormat:@"%d", categorySegments.selectedSegmentIndex]];
	
}

-(void) playStation:(NSString *) stationTitle{
	@try{
		
		station= [dataController getStationUrl:category :stationTitle];
		
		//NSLog([NSString stringWithFormat:@"Selected station :  %@" ],station);

		if (streamer){
			[streamer stop];
			streamer = nil;
		}
		
		[self createStreamer:station];
		[self setButtonImage:[UIImage imageNamed:@"loading.png"]];
		[streamer start];
		[self storeUserKeys];
		
	}@catch(NSException *e){
		NSLog(@" Error : %@", [e description]);
	}
}


- (IBAction)buttonPressed:(id)sender{
	if ([button.currentImage isEqual:[UIImage imageNamed:@"playbuttonsky.png"]]){
		NSString *stationTitle=[fmStationNames objectAtIndex:[pickerView selectedRowInComponent:0 ] ];
		[self playStation:stationTitle];
	}
	else{
		[streamer stop];
		
	}
}


- (IBAction)recordPressed:(id)sender{
		if (recording) {
			[audioRecorder stopRecording];
			[audioRecorder startPlayback];
			[recordButton setTitle:@"Record" forState:UIControlStateNormal];
		}else{
			[audioRecorder startRecording];
			[recordButton setTitle:@"Recording.." forState:UIControlStateNormal];
		}
	recording=!recording;
}

- (void)pickerView:(UIPickerView *)pickerView didSelectRow:(NSInteger)row inComponent:(NSInteger)component
{
	if(isLoading){
		isLoading = NO;
		return;
	}
	NSString *stationTitle=[fmStationNames objectAtIndex:row ];
	[self playStation:stationTitle];
	[self store:KEY_CURRENT_STATION_INDEX:[NSString stringWithFormat:@"%d",	row]];
	
}


- (NSInteger)pickerView:(UIPickerView *)pickerView numberOfRowsInComponent:(NSInteger)component;
{
    return [fmStationNames count];
}



- (UIView *)pickerView:(UIPickerView *)pickerView viewForRow:(NSInteger)row forComponent:(NSInteger)component reusingView:(UIView *)view{
	
    CGRect rect = CGRectMake(0, 0, 300, 40);
	UILabel *label = [[UILabel alloc]initWithFrame:rect];
   
    label.text = [fmStationNames objectAtIndex:row];
    label.font =  [UIFont fontWithName:@"AmericanTypewriter-Bold" size:14];
	label.textColor = [UIColor whiteColor];
    label.textAlignment = UITextAlignmentCenter;
	label.numberOfLines=1;
    label.lineBreakMode = UILineBreakModeWordWrap;
    label.backgroundColor = [[UIColor grayColor] colorWithAlphaComponent:.1];
    label.clipsToBounds = YES;
	
    return label ;
	
}


- (NSString *)pickerView:(UIPickerView *)pickerView titleForRow:(NSInteger)row forComponent:(NSInteger)component;
{
	//NSLog(row);
	return [fmStationNames objectAtIndex:row];
}


-(void)goToAppStore{
	NSURL *appStoreUrl = [NSURL URLWithString:APP_BUY_URL];
	[[UIApplication sharedApplication] openURL:appStoreUrl];
	
}

- (void)alertView:(UIAlertView *)alertView didDismissWithButtonIndex:(NSInteger)buttonIndex {
    if (buttonIndex == 1) {
        [self goToAppStore];
    }
}


-(IBAction)loadSettingsView:(id)sender{

	// create button
	UIButton* backButton = [UIButton buttonWithType:101]; // left-pointing shape!
	[backButton addTarget:self action:@selector(backAction) forControlEvents:UIControlEventTouchUpInside];
	
	[backButton setTitle:@"Back" forState:UIControlStateNormal];
	UIBarButtonItem* backItem = [[UIBarButtonItem alloc] initWithCustomView:backButton];
	
	[self.toolbar setItems:[NSArray arrayWithObject:backItem]];
	
	[self.pickerView removeFromSuperview];
	[self.categorySegments removeFromSuperview];
	[self.view insertSubview:settingsViewController.view atIndex:0];
	
}

-(void)mainAction{
	[self loadSettingsView:nil];
}

-(void)backAction{
	[self loadSettingsButton];

	
	[self.settingsViewController.view removeFromSuperview];
	[self.view insertSubview:pickerView atIndex:1];
	[self.view insertSubview:categorySegments atIndex:1];
	[self viewDidLoad];
	
}

- (void)dealloc{
	[self destroyStreamer];
	if (progressUpdateTimer){
		[progressUpdateTimer invalidate];
		progressUpdateTimer = nil;
	}
	[super dealloc];
}

																																			
																																			
@end
