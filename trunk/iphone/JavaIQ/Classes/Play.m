
#import "Play.h"


@implementation Play

@synthesize title, characters, genre, date;


- (void)dealloc {
	[title release];
	[characters release];
	[genre release];
	[date release];
	[super dealloc];
}

@end
