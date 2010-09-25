
@class Record;

@interface DataController : NSObject {
    NSMutableDictionary *stationsMap;
	NSString *currentStationCategory; //The current group
}
@property (nonatomic, retain) NSMutableDictionary *stationsMap;
@property (nonatomic, retain) NSString *currentStationCategory;

- (NSArray*) getCategories;

- (NSArray*) getStationTitles:(NSString *) category;
- (NSString*) getStationUrl:(NSString *) category: (NSString *) title;


-(void) loadStations;
-(void) parseStations:(NSData *)xmlContent;

-(void)resetData;

@end
