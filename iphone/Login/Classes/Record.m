
#import "Record.h"


@implementation Record

@synthesize question, answer, group, category;


- (void)dealloc {
	[question release];
	[answer release];
	[group release];
	[category release];
	[super dealloc];
}

@end
