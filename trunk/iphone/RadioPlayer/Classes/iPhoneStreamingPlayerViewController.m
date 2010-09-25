#import "iPhoneStreamingPlayerViewController.h"
#import "AudioStreamer.h"
#import <QuartzCore/CoreAnimation.h>
#import <MediaPlayer/MediaPlayer.h>
#import <CFNetwork/CFNetwork.h>
#import "DataController.h"
#import "Constants.h"

@implementation iPhoneStreamingPlayerViewController
@synthesize adView;
@synthesize dataController;
@synthesize categorySegments;
@synthesize pickerView;
NSString *station;
NSArray *categories;
NSString *category;
BOOL isLoading=YES;

- (void)setButtonImage:(UIImage *)image
{
	[button.layer removeAllAnimations];
	if (!image)
	{
		[button setImage:[UIImage imageNamed:@"playbuttonsky.png"] forState:0];
	}
	else
	{
		[button setImage:image forState:0];
		
		if ([button.currentImage isEqual:[UIImage imageNamed:@"loading.png"]])
		{
			[self spinButton];
		}
	}
}


- (void)viewDidLoad
{
	//http://yp.shoutcast.com/sbin/tunein-station.pls?id=1385442&play_status=1
	dataController = [[DataController alloc] init];
	[self setButtonImage:[UIImage imageNamed:@"playbuttonsky.png"]];
	
	categories = [dataController getCategories];
	[categories retain];
	
	category  = [categories objectAtIndex:0];
	fmStationNames= [dataController getStationTitles:category];
	
	station = [dataController getStationUrl:category :[fmStationNames  objectAtIndex:0]];
	NSLog([NSString stringWithFormat:@"station : %@",station]);
	
	int i=0;
	[categorySegments removeAllSegments];
	for (NSString *title in categories) {
		[categorySegments insertSegmentWithTitle:title atIndex:i++ animated:NO ];	
	}
	categorySegments.selectedSegmentIndex =0;
	
	self.view.backgroundColor = [UIColor colorWithPatternImage:[UIImage imageNamed:@"steelmesh.jpg"]];
	adView.view.backgroundColor = [UIColor colorWithPatternImage:[UIImage imageNamed:@"steelmesh.jpg"]];
	
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	NSString *stationTemp = [defaults stringForKey: KEY_CURRENT_STATION];
	NSString *categoryTemp = [defaults stringForKey: KEY_CURRENT_CATEGORY];
	if(stationTemp!=nil && categoryTemp !=nil){
			
		categorySegments.selectedSegmentIndex= [defaults integerForKey:KEY_CURRENT_CATEGORY_INDEX];
		NSInteger *stationIdTemp=[defaults integerForKey:KEY_CURRENT_STATION_INDEX];
		NSLog([NSString stringWithFormat:@"Found stored category:%@ and station :%@ , id: %d",categoryTemp, stationTemp	, stationIdTemp]);
		
		[pickerView selectRow:stationIdTemp inComponent:0 animated:NO ];
		[self createStreamer:stationTemp];
		[streamer start];
		
	}else{
		[pickerView selectRow:0 inComponent:0 animated:NO ];
	}
	
	[super viewDidLoad];
	
}


- (IBAction)categorySegmentsTouched:(id)sender{
	
	NSLog([NSString stringWithFormat: @"Touched category :%d",categorySegments.selectedSegmentIndex ]);
	category =[categories objectAtIndex: categorySegments.selectedSegmentIndex ];
	fmStationNames= [dataController getStationTitles:category];
	if ([fmStationNames count] >0) {
		station = [dataController getStationUrl:category :[fmStationNames  objectAtIndex:0]];
		[self.pickerView reloadData];
		[pickerView selectRow:-1 inComponent:0 animated:YES ];
		
	}
	///[streamer stop];
}



//
// destroyStreamer
//
// Removes the streamer, the UI update timer and the change notification
//
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


- (void)createStreamer:(NSString * )fmStation
{
	if (streamer)
	{
		return;
	}
	NSLog([NSString stringWithFormat:@"Playing station : %@",fmStation]);
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




- (UIView *)pickerView:(UIPickerView *)pickerView viewForRow:(NSInteger)row forComponent:(NSInteger)component reusingView:(UIView *)view{
	
    CGRect rect = CGRectMake(0, 0, 120, 60);
	
    UILabel *label = [[UILabel alloc]initWithFrame:rect];
	
    label.text = [fmStationNames objectAtIndex:row];
    label.font = [UIFont systemFontOfSize:16.0];
    label.textAlignment = UITextAlignmentCenter;
    label.lineBreakMode = UILineBreakModeWordWrap;
    label.backgroundColor = [UIColor clearColor];
    label.clipsToBounds = YES;
    return label ;

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


- (void)animationDidStop:(CAAnimation *)theAnimation finished:(BOOL)finished
{
	if (finished)
	{
		[self spinButton];
	}
}


- (IBAction)buttonPressed:(id)sender
{
	if ([button.currentImage isEqual:[UIImage imageNamed:@"playbuttonsky.png"]])
	{
		//[downloadSourceField resignFirstResponder];
		NSString *stationTitle=[fmStationNames objectAtIndex:[pickerView selectedRowInComponent:0 ] ];
		station= [dataController getStationUrl : category : stationTitle];
		
		[self createStreamer:station];
		[self setButtonImage:[UIImage imageNamed:@"loading.png"]];
		[streamer start];
	}
	else
	{
		[streamer stop];
	}
}


- (void)playbackStateChanged:(NSNotification *)aNotification
{
	if ([streamer isWaiting])
	{
		[self setButtonImage:[UIImage imageNamed:@"loading.png"]];
	}
	else if ([streamer isPlaying])
	{
		[self setButtonImage:[UIImage imageNamed:@"stopbuttonsky.png"]];
	}
	else if ([streamer isIdle])
	{
		[self destroyStreamer];
		[self setButtonImage:[UIImage imageNamed:@"playbuttonsky.png"]];
	}
}


- (BOOL)textFieldShouldReturn:(UITextField *)sender
{
	[sender resignFirstResponder];
	[self createStreamer];
	return YES;
}


- (NSInteger)numberOfComponentsInPickerView:(UIPickerView *)pickerView;
{
    return 1;
}

-(void)store:(NSString *)key :(NSString *)value{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	NSLog(@"Storing value: %@ for key %@ ",value,key);
	[defaults setObject:value forKey:key];
	[defaults synchronize]; 
}

- (void)pickerView:(UIPickerView *)pickerView didSelectRow:(NSInteger)row inComponent:(NSInteger)component
{
	if(isLoading){
		isLoading = NO;
		return;
	}
	
	@try{
		NSString *stationTitle=[fmStationNames objectAtIndex:row ];
		station=    [dataController getStationUrl:category :stationTitle];
		NSLog([NSString stringWithFormat:@"Selected station : %d, %@" ],row,stationTitle);
		if (streamer)
		{
			[streamer stop];
			streamer = nil;
		}
	
		[self createStreamer:station];
		[streamer start];
		[self setButtonImage:[UIImage imageNamed:@"loading.png"]];
		[self store:KEY_CURRENT_CATEGORY:category];
		[self store:KEY_CURRENT_STATION:station];
		[self store:KEY_CURRENT_STATION_INDEX:[NSString stringWithFormat:@"%d",	row]];
		[self store:KEY_CURRENT_CATEGORY_INDEX:[NSString stringWithFormat:@"%d", categorySegments.selectedSegmentIndex]];
		
	}@catch(NSException *e){
		NSLog([NSString stringWithFormat:@" Error : %@", [e description]]);
	}
	
    
}

- (NSInteger)pickerView:(UIPickerView *)pickerView numberOfRowsInComponent:(NSInteger)component;
{
    return [fmStationNames count];
}

- (NSString *)pickerView:(UIPickerView *)pickerView titleForRow:(NSInteger)row forComponent:(NSInteger)component;
{
	//NSLog(row);
    return [fmStationNames objectAtIndex:row];
}


- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    // Return YES for supported orientations
    return YES;//(interfaceOrientation == UIInterfaceOrientationPortrait);
}


-(void) askBuy{
		UIAlertView *buyAlert = [[UIAlertView alloc] initWithTitle: @"Station updates are not available for lite version" message: @"Please buy the app for a $ from app store and enjoy ad free app with latest station updates" delegate:self  cancelButtonTitle: @"No thanks" otherButtonTitles:nil];
		[buyAlert addButtonWithTitle:@"Buy"];
		[buyAlert show];
	    [buyAlert release];
}

-(IBAction) updateStations:(id)sender{
	
	if(IS_APP_LITE ==@"YES"){
		[self askBuy];
	}
	[dataController loadStationsUpdate];
	[self store:KEY_CURRENT_CATEGORY:nil];
	[self store:KEY_CURRENT_STATION:nil];
	[self viewDidLoad];
	NSLog(@"doUpdateCache completed");
}

- (void)alertView:(UIAlertView *)alertView didDismissWithButtonIndex:(NSInteger)buttonIndex {
    if (buttonIndex == 1) {
        [self goToAppStore];
    }
}

-(void)goToAppStore{
	NSURL *appStoreUrl = [NSURL URLWithString:APP_BUY_URL];
	[[UIApplication sharedApplication] openURL:appStoreUrl];
	
}
- (void)dealloc
{
	[self destroyStreamer];
	if (progressUpdateTimer)
	{
		[progressUpdateTimer invalidate];
		progressUpdateTimer = nil;
	}
	[super dealloc];
}

@end
