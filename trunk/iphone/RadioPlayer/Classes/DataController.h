#import "OrderedDictionary.h"

@class Record;

@interface DataController : NSObject {
    OrderedDictionary *stationsMap;
	NSString *currentStationCategory; //The current group
	NSMutableArray *backgrounds;
}
@property (nonatomic, retain) OrderedDictionary *stationsMap;
@property (nonatomic, retain) NSString *currentStationCategory;
@property (nonatomic, retain) NSMutableArray *backgrounds;

- (NSArray*) getCategories;

- (NSArray*) getStationTitles:(NSString *) category;
- (NSString*) getStationUrl:(NSString *) category: (NSString *) title;


-(void) loadStations;
-(void) loadStationsUpdate;
-(void) parseStations:(NSData *)xmlContent;

-(void)resetData;

@end
