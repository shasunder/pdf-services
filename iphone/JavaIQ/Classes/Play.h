
#import <Foundation/Foundation.h>

@interface Play : NSObject {
	NSString *title;
	NSArray *characters;
	NSString *genre;
	NSDate *date;
}

@property (nonatomic, retain) NSString *title;
@property (nonatomic, retain) NSArray *characters;
@property (nonatomic, retain) NSString *genre;
@property (nonatomic, retain) NSDate *date;

@end
