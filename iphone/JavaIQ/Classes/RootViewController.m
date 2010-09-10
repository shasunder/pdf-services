
#import "RootViewController.h"
#import "DataController.h"
#import "CategoryViewController.h"
#import "Record.h"


@implementation RootViewController

NSArray *groups;
NSArray *groupDetails;

#pragma mark -
#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	self.title = NSLocalizedString(@"Java IQ", @"Java interview questions");
	groups = [[NSArray alloc] initWithObjects: @"Core Java", @"J2ee", @"Frameworks",@"Design Patterns",@"Architectures", @"Servers", @"Database",@"Xml",@"Tools",@"Miscellaneous",nil];
	groupDetails = [[NSArray alloc] initWithObjects: @"Basics, Classes/objects, Threads, Collections", @"Servlets, Jdbc, Jsp, Ejb,Jms, Jndi", @"Spring, Hibernate, Struts, Velocity, Jquery,AJAX, Junit", @"Gang of Four, Architectural patterns, J2ee patterns,etc",@"SOA, MDA, OSGi, MVC" ,@"Tomcat, JBoss, Marklogic,Weblogic, Websphere ", @"Sql Basics - Joins/DML/DDL/stored procedure/triggers, Oracle, MySQL, MS Sql", @"Xml, Xsd,Dtd, Xquery, Xpath",@"Build servers - Hudson/Cruise control/Team city, Sonar, Performance tools - Grinder/Jmeter/Jprofiler, IDE - Eclipse/IDEA/Netbeans etc ", @"Agile practises - TDD/BDD/Scrum/XP,Waterfall, prototyping,\n Testing(QA) practises - functional/performance/smoke/unit tests, OS basics- Linux/Sun OS/Windows ,\n UML - class/use case/activity/deployment/sequence/etc, \n Cloud computing - Basics/Amazon EC2:S3/Google app engine", nil];

	
}


#pragma mark -
#pragma mark Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    // Only one section.
    return 1;
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    // Only one section, so return the number of items in the list.
    return 10;
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
   
	static NSString *CellIdentifier = @"CellIdentifier";

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


#pragma mark -
#pragma mark Table view selection

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
    /*
     When a row is selected, create the detail view controller and set its detail item to the item associated with the selected row.
     */
    CategoryViewController *categoryViewController = [[CategoryViewController alloc] initWithStyle:UITableViewStyleGrouped];
    
    // Push the category view controller.
    [[self navigationController] pushViewController:categoryViewController animated:YES];
    [categoryViewController release];
}


#pragma mark -
#pragma mark Memory management

- (void)dealloc {
    
    
    [super dealloc];
}

@end
