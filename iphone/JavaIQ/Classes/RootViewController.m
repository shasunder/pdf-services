
#import "RootViewController.h"
#import "DataController.h"
#import "CategoryViewController.h"
#import "SettingsViewController.h"
#import "JavaIQAppDelegate.h"
#import <QuartzCore/QuartzCore.h>
#import "AdViewController.h"
#import "Constants.h"

@implementation RootViewController

@synthesize dataController;
@synthesize adViewController;

- (UILabel *) getLabelForTitle {
    UILabel *label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,85,25)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = APP_TITLE;
	[label setFont:[UIFont fontWithName:FONT_AMERICAN_TYPEWRITER size:20]];
	label.backgroundColor=[UIColor clearColor];	
  return label;
}

- (UIButton *) getButtonForSettings {
    UIButton *button = [[UIButton buttonWithType:UIButtonTypeInfoDark] retain];
	button.frame = CGRectMake(0, 0, 25, 25);
	[button addTarget:self action:@selector(showSettings) forControlEvents:UIControlEventTouchUpInside];
  return button;
}

- (void)viewDidLoad {
	
    [super viewDidLoad];
	self.title = APP_TITLE;
	self.dataController = [[DataController alloc] init];
	
	UIButton *button = [self getButtonForSettings];
	self.navigationItem.rightBarButtonItem=[[UIBarButtonItem alloc] initWithCustomView:button];	
	
	self.navigationItem.titleView =  [self getLabelForTitle];
}


#pragma Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
	tableView.layer.opacity = 1.0;
    return 1;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    return [[dataController getGroupTitles] count];
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
   
	static NSString *CellIdentifier = @"CellIdentifier";
	NSArray *groups = [dataController getGroupTitles];
	
	UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    
	if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleValue1 reuseIdentifier:CellIdentifier] autorelease];
        cell.accessoryType = UITableViewCellAccessoryDisclosureIndicator;
    }
	
	cell.backgroundView.backgroundColor = [UIColor clearColor];    
    cell.textLabel.text = [groups objectAtIndex:indexPath.row]; 
    cell.textLabel.font = [UIFont fontWithName:FONT_AMERICAN_TYPEWRITER size:18];
	cell.textLabel.textColor = [UIColor blackColor];
	
	return cell;
}


#pragma mark Table view selection

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
	NSArray *groups = [dataController getGroupTitles];
    
	CategoryViewController *categoryViewController = [[CategoryViewController alloc] initWithStyle:UITableViewStyleGrouped];
    categoryViewController.dataController = self.dataController;
	categoryViewController.group=[groups objectAtIndex:indexPath.row];
	[categoryViewController.dataController loadQuestions:categoryViewController.group]; 
    // Push the category view controller.
    [[self navigationController] pushViewController:categoryViewController animated:YES];
    [categoryViewController release];
}


-(void)showSettings{
	SettingsViewController *mySettingsViewController= [[SettingsViewController alloc] initWithNibName:@"SettingsViewController" bundle:nil];
	mySettingsViewController.dataController = self.dataController;
	[[self navigationController] pushViewController:mySettingsViewController animated:YES];
	[mySettingsViewController release];
	
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
	UIImage *image = [UIImage imageNamed: @"javaiq-navigation.png"];
	
	[image drawInRect:CGRectMake(0, 0, self.frame.size.width, self.frame.size.height)];
}


@end
