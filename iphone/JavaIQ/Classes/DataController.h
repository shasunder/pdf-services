
@class Record;

@interface DataController : NSObject {
    NSMutableDictionary *questionBank;
	NSString *group;
}
@property (nonatomic, retain) NSMutableDictionary *questionBank;
@property (nonatomic, retain) NSString *group;

- (unsigned)countOfCategory;
-(NSString *) getQuestions; 
@end
