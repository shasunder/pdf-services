
#import "CategoryViewController.h"
#import "Record.h"
#import "QuestionViewController.h"
#import "DataController.h"
#import "AdMobView.h"
#import "AdViewController.h"


@implementation CategoryViewController

@synthesize dataController;
@synthesize group;
@synthesize adViewController;

NSArray *categories;

#pragma mark -
#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,50)] autorelease];
	label.textColor = [UIColor blackColor];
	label.text = group;
	[label setFont:[UIFont fontWithName:@"AmericanTypewriter" size:20]];
	label.backgroundColor =[UIColor clearColor];
	self.navigationItem.titleView = label;
	self.tableView.backgroundColor=[UIColor whiteColor];
	//TODO: ad view and set delegate for advert
	
}


- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];
    [self.tableView reloadData];
    [self.tableView setContentOffset:CGPointZero animated:NO];
	[self.tableView setSeparatorColor:[UIColor clearColor]]; 
   
}

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
	cell.textLabel.font= [UIFont fontWithName:@"AmericanTypewriter" size:18];
  
	return cell;
}

#pragma mark Table view selection
- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
    //When a row is selected, create the question view controller and set its detail item to the item associated with the selected row.
    QuestionViewController *questionViewController = [[QuestionViewController alloc] init];
    
	questionViewController.dataController= self.dataController;
    questionViewController.category = [[dataController getCategories] objectAtIndex:indexPath.row];
	
    
    // Push the question view controller.
    [[self navigationController] pushViewController:questionViewController animated:YES];
    [questionViewController release];
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    return YES;
}



@end
