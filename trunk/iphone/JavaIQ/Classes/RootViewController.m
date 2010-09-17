
#import "RootViewController.h"
#import "DataController.h"
#import "CategoryViewController.h"
#import "SettingsViewController.h"
#import "JavaIQAppDelegate.h"


@implementation RootViewController
@synthesize dataController;

#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	self.title = NSLocalizedString(@"Java IQ", @"Java interview questions");
	self.dataController = [[DataController alloc] init];
	self.navigationItem.rightBarButtonItem=[[UIBarButtonItem alloc] initWithTitle:@"i" style:UIBarButtonItemStylePlain target:self action:@selector(showSettings)];

}


#pragma mark Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 1;
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {

    return [[dataController getGroupTitles] count];
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
   
	static NSString *CellIdentifier = @"CellIdentifier";
	NSArray *groups = [dataController getGroupTitles];
	NSArray *groupDetails = [dataController getGroupSubTitles:groups];

	// Dequeue or create a cell of the appropriate type.
	UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleValue1 reuseIdentifier:CellIdentifier] autorelease];
        cell.accessoryType = UITableViewCellAccessoryDisclosureIndicator;
    }
	cell.backgroundView.backgroundColor = [UIColor clearColor];
    
    cell.textLabel.text = [groups objectAtIndex:indexPath.row]; //TODO: create another controller and set with categories
    cell.textLabel.font = [UIFont boldSystemFontOfSize:15];
	
	cell.detailTextLabel.lineBreakMode = UILineBreakModeWordWrap;
	cell.detailTextLabel.text =[groupDetails objectAtIndex:indexPath.row];
	cell.detailTextLabel.numberOfLines = 4;
	cell.detailTextLabel.font=[UIFont boldSystemFontOfSize:8];;
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


#pragma mark Memory management

- (void)dealloc {
    
    
    [super dealloc];
}

@end
