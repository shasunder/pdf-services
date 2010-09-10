
#import "CategoryViewController.h"
#import "Record.h"
#import "QuestionViewController.h"
#import "DataController.h"


@implementation CategoryViewController

@synthesize dataController;
@synthesize group;


#pragma mark -
#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	// Create the data controller.
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
    self.title = @"Java questions";
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
    
    NSArray *categories=[dataController getCategories];
    cell.textLabel.text = [categories objectAtIndex:indexPath.row];
    return cell;
}


#pragma mark -
#pragma mark Section header titles

/*
 HIG note: In this case, since the content of each section is obvious, there's probably no need to provide a title, but the code is useful for illustration.
 */
- (NSString *)tableView:(UITableView *)tableView titleForHeaderInSection:(NSInteger)section {
    
    NSString *question = nil;
    switch (section) {
        case 0:
            question = NSLocalizedString(@"Basics", @"Basics of core java");//TODO: use data from xml
            break;
        default:
            break;
    }
    return question;
}


#pragma mark -
#pragma mark Table view selection

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
    /*
     When a row is selected, create the question view controller and set its detail item to the item associated with the selected row.
     */
    QuestionViewController *questionViewController = [[QuestionViewController alloc] initWithStyle:UITableViewStyleGrouped];
    
    questionViewController.record = [dataController objectInListAtIndex:indexPath.row];
    
    // Push the question view controller.
    [[self navigationController] pushViewController:questionViewController animated:YES];
    [questionViewController release];
}


@end
