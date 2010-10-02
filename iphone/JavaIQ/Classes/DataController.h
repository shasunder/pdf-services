
#import "OrderedDictionary.h"
@class Record;

@interface DataController : NSObject {
    OrderedDictionary *questionBank;
	OrderedDictionary *groupMap; //the group map - key :group name, value : map with group url, categories, dictionary
	NSString *group; //The current group
}

@property (nonatomic, retain) OrderedDictionary *groupMap;
@property (nonatomic, retain) OrderedDictionary *questionBank;
@property (nonatomic, retain) NSString *group;

- (NSString *) getLatestApplicationVersion;

- (unsigned)countOfCategory;
- (NSArray*) getGroupTitles;
- (NSArray*) getGroupSubTitles:(NSArray *) groupTitles;
- (OrderedDictionary *)getQuestionsMapForCategory:(NSString *)category;
- (NSArray *)getQuestionsArrayForCategory:(NSString *)category;
- (NSArray*) getCategories;

- (void) loadQuestions:(NSString *) groupIn;

- (void) loadGroups;
- (void) parseGroups:(NSData *)xmlContent;
- (void) loadGroupsUpdate;
	
- (void) loadCache;

- (void)resetData;

@end
