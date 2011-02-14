
#import "OrderedDictionary.h"
@class Record;

@interface DataController : NSObject {
  	OrderedDictionary *accounts; //the group map - key :group name, value : map with group url, categories, dictionary
	NSString *group; //The current group
	NSMutableArray *websites;
	OrderedDictionary *websiteDetails;
}

@property (nonatomic, retain) OrderedDictionary *accounts;
@property (nonatomic, retain) NSString *group;
@property (nonatomic, retain) NSMutableArray *websites;
@property (nonatomic, retain) OrderedDictionary *websiteDetails;

- (NSString *) getLatestApplicationVersion;

- (unsigned)countOfAccounts;
- (NSString*) getPassword:(NSString *)email;
- (void) loadAccounts;
- (void)store:(NSString *)key :(NSObject *)value;
- (void)addAccount:(NSString *)email : (NSString *)password :(NSString *) website;
- (void)deleteAccount:(NSString *)email;
- (NSMutableArray *)getWebsiteList;
- (NSString *)getWebsiteLoginURL:(NSString *)siteKey;
- (NSString *)getWebsiteLogoutURL:(NSString *)siteKey;
- (NSArray *)getWebsiteLoginFields:(NSString *)siteKey;

- (void)commitWebsites;

- (void)setWebsiteTokens:(NSString *)encoded : (NSString *)siteKey;
-(void)removeWebsiteToken: (NSString *)siteKey;

@end
