
#import "CategoryViewController.h"
#import "Record.h"
#import "QuestionViewController.h"
#import "DataController.h"


@implementation CategoryViewController

@synthesize dataController;
@synthesize group;

NSArray *categories;

#pragma mark -
#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	DataController *controller = [[DataController alloc] init:self.group];
	self.dataController = controller;
	[controller release];
	
	self.dataController = dataController;	
	
}


- (void)viewWillAppear:(BOOL)animated {
    // Update the view with current data before it is disrecorded.
    [super viewWillAppear:animated];
    
    // Scroll the table view to the top before it appears
    [self.tableView reloadData];
    [self.tableView setContentOffset:CGPointZero animated:NO];
    self.title = self.group;
}


#pragma mark -
#pragma mark Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 1;
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
	return [dataController countOfCategory];
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
	static NSString *CellIdentifier = @"CellIdentifier";
    
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier] autorelease];
        cell.selectionStyle = UITableViewCellSelectionStyleNone;
    }
	
    cell.textLabel.text = [[dataController getCategories] objectAtIndex:indexPath.row];
    return cell;
}


#pragma mark Table view selection

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
    //When a row is selected, create the question view controller and set its detail item to the item associated with the selected row.
    QuestionViewController *questionViewController = [[QuestionViewController alloc] initWithStyle:UITableViewStyleGrouped];
    
    questionViewController.category = [[dataController getCategories] objectAtIndex:indexPath.row];
    
    // Push the question view controller.
    [[self navigationController] pushViewController:questionViewController animated:YES];
    [questionViewController release];
}


@end
