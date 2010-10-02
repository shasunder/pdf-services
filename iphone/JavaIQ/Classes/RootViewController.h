#import "AdViewController.h"
@class DataController;

@interface RootViewController : UITableViewController {	
	
	DataController *dataController;
	AdViewController *adViewController;

}

@property (nonatomic, retain) DataController *dataController;
@property(nonatomic,retain) IBOutlet AdViewController *adViewController;

@end
