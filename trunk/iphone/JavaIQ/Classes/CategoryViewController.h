
@class Record;
@class DataController;

@interface CategoryViewController : UITableViewController {
	DataController *dataController;
	
	
}

@property (nonatomic, retain) DataController *dataController;

@end
