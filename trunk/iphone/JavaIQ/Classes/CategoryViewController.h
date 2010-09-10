
@class Record;
@class DataController;

@interface CategoryViewController : UITableViewController {
	DataController *dataController;
	NSString *group;
	
}

@property (nonatomic, retain) DataController *dataController;
@property (nonatomic, retain) NSString *group;

@end
