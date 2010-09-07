
#import "RootViewController.h"
#import "DataController.h"
#import "CategoryViewController.h"
#import "Play.h"


@implementation RootViewController

@synthesize dataController;

#pragma mark -
#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	self.title = NSLocalizedString(@"Plays", @"Master view navigation title");
}


#pragma mark -
#pragma mark Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    // Only one section.
    return 1;
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    // Only one section, so return the number of items in the list.
    return [dataController countOfList];
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
	static NSString *CellIdentifier = @"CellIdentifier";
	
	// Dequeue or create a cell of the appropriate type.
	UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier] autorelease];
        cell.accessoryType = UITableViewCellAccessoryDisclosureIndicator;
    }
    
    // Get the object to display and set the value in the cell.
    Play *playAtIndex = [dataController objectInListAtIndex:indexPath.row];
    cell.textLabel.text = playAtIndex.title;
    return cell;
}


#pragma mark -
#pragma mark Table view selection

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
    /*
     When a row is selected, create the detail view controller and set its detail item to the item associated with the selected row.
     */
    CategoryViewController *categoryViewController = [[CategoryViewController alloc] initWithStyle:UITableViewStyleGrouped];
    
    categoryViewController.play = [dataController objectInListAtIndex:indexPath.row];
    
    // Push the detail view controller.
    [[self navigationController] pushViewController:categoryViewController animated:YES];
    [categoryViewController release];
}


#pragma mark -
#pragma mark Memory management

- (void)dealloc {
    
    [dataController release];
    [super dealloc];
}

@end
