
@class Record;

@interface DataController : NSObject {
    NSMutableDictionary *questionBank;
}
@property (nonatomic, retain) NSMutableDictionary *questionBank;

- (unsigned)countOfCategory;
-(NSString *) getQuestions; 
@end
