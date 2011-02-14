/**
 * AdViewController.m
 * AdMob iPhone SDK publisher code.
 *
 * Sample code. See AdViewController.h for instructions.
 */

#import "AdMobView.h"
#import "AdViewController.h"
#import "Constants.h"

@implementation AdViewController

@synthesize currentViewController;
@synthesize adMobAd;

- (void)awakeFromNib {
	CGSize sizeToRequest =  CGSizeMake(320,48);//self.view.frame.size;
  adMobAd = [AdMobView requestAdOfSize:sizeToRequest withDelegate:self]; // start a new ad request
  [adMobAd retain]; // this will be released when it loads (or fails to load)
}

- (void)dealloc {
  [adMobAd release];
  [super dealloc];
}

#pragma mark -
#pragma mark AdMobDelegate methods

- (NSString *)publisherIdForAd:(AdMobView *)adView {
  return ADMOB_PUBLISHER_ID; // this should be prefilled; if not, get it from www.admob.com
}

- (UIViewController *)currentViewControllerForAd:(AdMobView *)adView {
  return currentViewController;
}

- (UIColor *)adBackgroundColorForAd:(AdMobView *)adView {
  return [UIColor colorWithRed:0.498 green:0.565 blue:0.667 alpha:1]; // this should be prefilled; if not, provide a UIColor
}

- (UIColor *)primaryTextColorForAd:(AdMobView *)adView {
  return [UIColor colorWithRed:1 green:1 blue:1 alpha:1]; // this should be prefilled; if not, provide a UIColor
}

- (UIColor *)secondaryTextColorForAd:(AdMobView *)adView {
  return [UIColor colorWithRed:1 green:1 blue:1 alpha:1]; // this should be prefilled; if not, provide a UIColor
}


// To receive test ads rather than real ads...
/*
 // Test ads are returned to these devices.  Device identifiers are the same used to register
 // as a development device with Apple.  To obtain a value open the Organizer 
 // (Window -> Organizer from Xcode), control-click or right-click on the device's name, and
 // choose "Copy Device Identifier".  Alternatively you can obtain it through code using
 // [UIDevice currentDevice].uniqueIdentifier.
 //
 // For example:
 //    - (NSArray *)testDevices {
 //      return [NSArray arrayWithObjects:
 //              ADMOB_SIMULATOR_ID,                             // Simulator
 //              //@"3ca11b4814ad614f1392f6d903a9111c62d6e33e",  // Test iPhone 3GS 3.0.1
 //              //@"8cf09e81ef3ec5418c3450f7954e0e95db8ab200",  // Test iPod 2.2.1
 //              nil];
 //    }
 
- (NSArray *)testDevices {
  return [NSArray arrayWithObjects: ADMOB_SIMULATOR_ID, nil];
}
 
- (NSString *)testAdActionForAd:(AdMobView *)adMobView {
  return @"url"; // see AdMobDelegateProtocol.h for a listing of valid values here
}


- (NSArray *)testDevices {
	      return [NSArray arrayWithObjects:
	              ADMOB_SIMULATOR_ID,  @"3ca11b4814ad614f1392f6d903a9111c62d6e33e",  // Test ?
				  @"21136769cf1d5427f48c21021fdc8e43e49be2f3",nil]; //iphone 3g
 }


- (NSString *)testAdActionForAd:(AdMobView *)adMobView {
	return @"url"; // see AdMobDelegateProtocol.h for a listing of valid values here
}
 */
// Sent when an ad request loaded an ad; this is a good opportunity to attach
// the ad view to the hierachy.
- (void)didReceiveAd:(AdMobView *)adView {
  NSLog(@"AdMob: Did receive ad in AdViewController");
	if(IS_APP_LITE ==@"YES"){
			[self.view addSubview:adMobAd];
	}
}
/**/
// Sent when an ad request failed to load an ad
- (void)didFailToReceiveAd:(AdMobView *)adView {
  NSLog(@"AdMob: Did fail to receive ad in AdViewController");
  [adMobAd release];
  adMobAd = nil;
  // we could start a new ad request here, but it is unlikely that anything has changed in the last few seconds,
  // so in the interests of the user's battery life, let's not
}

@end