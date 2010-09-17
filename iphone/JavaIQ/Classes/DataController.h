
@class Record;

@interface DataController : NSObject {
    NSMutableDictionary *questionBank;
	NSMutableDictionary *groupMap; //the group map - key :group name, value : map with group url, categories, dictionary
	NSString *group; //The current group
}
@property (nonatomic, retain) NSMutableDictionary *groupMap;
@property (nonatomic, retain) NSMutableDictionary *questionBank;
@property (nonatomic, retain) NSString *group;

-(NSString *) getLatestApplicationVersion;

- (unsigned)countOfCategory;
-(NSString *) getQuestions; 
- (NSArray*) getGroupTitles;
- (NSArray*) getGroupSubTitles:(NSArray *) groupTitles;
-(NSMutableDictionary *)getQuestionsMapForCategory:(NSString *)category;
-(NSArray *)getQuestionsArrayForCategory:(NSString *)category;
- (NSArray*) getCategories;

-(void) loadGroups;
-(void) parseGroups:(NSData *)xmlContent;
	
-(void) loadCache;

@end
