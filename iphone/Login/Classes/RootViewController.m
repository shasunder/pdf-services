
#import "RootViewController.h"
#import "DataController.h"
#import "WebPageDisplayController.h"
#import "SettingsViewController.h"
#import "JavaIQAppDelegate.h"
#import <QuartzCore/QuartzCore.h>
#import "AdViewController.h"
#import "Constants.h"
#import "AdMobView.h"

@implementation RootViewController

@synthesize dataController;
@synthesize adViewController;

- (void) insertAd {
	if(IS_APP_LITE !=@"YES"){
		return;
	}	
	//ad view
	adViewController = [[AdViewController alloc] init];
	[adViewController setCurrentViewController:self];
	
	AdMobView *adView = [AdMobView requestAdWithDelegate:adViewController]; 
	adView.frame = CGRectMake(0,370, 320, 48);
	adViewController.view = adView;
	[self.view addSubview:adView];
	[adView retain];
	
}

- (UILabel *) getLabelForTitle {
    UILabel *label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,105,50)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = APP_TITLE;
	[label setFont:[UIFont fontWithName:FONT_AMERICAN_TYPEWRITER size:20]];
	label.backgroundColor=[UIColor clearColor];	
  return label;
}

- (UIButton *) getButtonForSettings {
    UIButton *button = [[UIButton buttonWithType:UIButtonTypeCustom] retain];
	UIImage *buttonImage = [UIImage imageNamed:@"settings.png"];
	[button setImage:buttonImage forState:UIControlStateNormal];

	button.frame = CGRectMake(0, 0, 25, 25);
	[button addTarget:self action:@selector(showSettings) forControlEvents:UIControlEventTouchUpInside];
  return button;
}

- (void) showAlertIfNoAccounts {
  int accountCount=[[dataController getAccounts] count];
	if(accountCount ==0){
		UIAlertView *alert = [[UIAlertView alloc] initWithTitle:@"" message:@"" delegate:self cancelButtonTitle:@"Cancel" otherButtonTitles:@"Ok", nil];
		alert.title=@"Please add account to auto login. Please click Ok to take you to settings screen.";
			
		[alert show];
		[alert release];
	}

}
- (void)viewDidLoad {
	
    [super viewDidLoad];
	self.title = APP_TITLE;
	if(dataController ==nil ){
		self.dataController = [[DataController alloc] init];
	}
	UIButton *button = [self getButtonForSettings];
	self.navigationItem.rightBarButtonItem=[[UIBarButtonItem alloc] initWithCustomView:button];	
	
	self.navigationItem.titleView =  [self getLabelForTitle];
	[self insertAd];	
	
	[self showAlertIfNoAccounts];

}



- (void)alertView:(UIAlertView *)alertView clickedButtonAtIndex:(NSInteger)buttonIndex { 
    if(buttonIndex > 0) { 
		SettingsViewController *settingsView= [self showSettings];
		//[settingsView addAccount:nil];
	} 
}  

#pragma Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
	tableView.layer.opacity = 1.0;
    return 1;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
	NSLog(@"Getting count");
    return [[dataController getAccounts] count];
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
   
	static NSString *CellIdentifier = @"CellIdentifier";
	NSArray *accounts = [dataController getAccounts];
	
	UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    
	if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier] autorelease];
        cell.accessoryType = UITableViewCellAccessoryDisclosureIndicator;
    }
	
	cell.backgroundView.backgroundColor = [UIColor clearColor];    
    cell.textLabel.text = [accounts objectAtIndex:indexPath.row]; 
    cell.textLabel.font = [UIFont fontWithName:FONT_AMERICAN_TYPEWRITER size:18];
	cell.textLabel.textColor = [UIColor blackColor];
	
	return cell;
}


#pragma mark Table view selection

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
	NSArray *accounts = [dataController getAccounts];
	NSString *key= [accounts objectAtIndex:indexPath.row];
	WebPageDisplayController *webDisplayController = [WebPageDisplayController alloc];
	
	//TODO: 1. split web key to fetch email and web login url
	//		2. set web login and logout url
	NSArray *chunks = [key componentsSeparatedByString: @" : "];
	
	NSString *website =[chunks objectAtIndex:0];//TODO split
	NSString *webUrlLogin= [dataController getWebsiteLoginURL:website];
	NSString *webUrlLogout = [dataController getWebsiteLogoutURL:website];
	NSString *email = [chunks objectAtIndex:1]; //TODO split
	
	webDisplayController.webLoginFields = [dataController getWebsiteLoginFields:website];
	webDisplayController.email = email;
	webDisplayController.webUrl = webUrlLogin;
	webDisplayController.webUrlLogout = webUrlLogout;
	webDisplayController.dataController = self.dataController;
	
//    categoryViewController.dataController = self.dataController;

    // Push the category view controller.
    [[self navigationController] pushViewController:webDisplayController animated:YES];
    [webDisplayController release];
}


-(SettingsViewController *)showSettings{
	SettingsViewController *mySettingsViewController= [[SettingsViewController alloc] initWithNibName:@"SettingsViewController" bundle:nil];
	mySettingsViewController.dataController = self.dataController;
	mySettingsViewController.rootViewController = self;
	[[self navigationController] pushViewController:mySettingsViewController animated:YES];
	//[mySettingsViewController release];
	return mySettingsViewController;
	
}

-(void) reloadData{
	[super.tableView reloadData];
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    return YES;
}

#pragma mark Memory management

- (void)dealloc {
      [super dealloc];
}

@end


@implementation UINavigationBar (UINavigationBarCategory)

- (void)drawRect:(CGRect)rect {
	UIImage *image = [UIImage imageNamed: @"navigation.png"];
	
	[image drawInRect:CGRectMake(0, 0, self.frame.size.width, self.frame.size.height)];
}


@end
