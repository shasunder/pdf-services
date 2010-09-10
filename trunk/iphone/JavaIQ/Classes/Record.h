
#import <Foundation/Foundation.h>

@interface Record : NSObject {
	NSString *question;
	NSString *answer;
	NSString *category;
	NSString *group;
}

@property (nonatomic, retain) NSString *question;
@property (nonatomic, retain) NSString *answer;
@property (nonatomic, retain) NSString *category;
@property (nonatomic, retain) NSString *group;

@end
