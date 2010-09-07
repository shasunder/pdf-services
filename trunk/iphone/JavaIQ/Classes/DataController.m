
#import "DataController.h"
#import "Play.h"


@interface DataController ()
@property (nonatomic, copy, readwrite) NSMutableArray *list;
- (void)createDemoData;
@end


@implementation DataController

@synthesize list;


- (id)init {
    if (self = [super init]) {
        [self createDemoData];
    }
    return self;
}

// Custom set accessor to ensure the new list is mutable
- (void)setList:(NSMutableArray *)newList {
    if (list != newList) {
        [list release];
        list = [newList mutableCopy];
    }
}

// Accessor methods for list
- (unsigned)countOfList {
    return [list count];
}

- (Play *)objectInListAtIndex:(unsigned)theIndex {
    return [list objectAtIndex:theIndex];
}


- (void)dealloc {
    [list release];
    [super dealloc];
}


- (void)createDemoData {
    
    /*
     Create an array containing some demonstration data.
     Each data item is a Play that contains information about a play -- its list of characters, its genre, and its year of publication.  Typically the data would be comprised of instances of custom classes rather than dictionaries, but using dictionaries means fewer distractions in the example.
     */
    
    NSMutableArray *playList = [[NSMutableArray alloc] init];
    Play *play;
    NSArray *characters;
    NSDateComponents *dateComponents = [[NSDateComponents alloc] init];
    NSCalendar *calendar = [[NSCalendar alloc] initWithCalendarIdentifier:NSGregorianCalendar];
    
	play = [[Play alloc] init];
	play.title = @"Julius Caesar";
	play.genre = @"Tragegy";
	[dateComponents setYear:1599];
	play.date = [calendar dateFromComponents:dateComponents];
	characters = [[NSArray alloc] initWithObjects:@"Antony", @"Artemidorus", @"Brutus", @"Caesar", @"Calpurnia", @"Casca", @"Cassius", @"Cicero", @"Cinna", @"Cinna the Poet", @"Citizens", @"Claudius", @"Clitus", @"Dardanius", @"Decius Brutus", @"First Citizen", @"First Commoner", @"First Soldier", @"Flavius", @"Fourth Citizen", @"Lepidus", @"Ligarius", @"Lucilius", @"Lucius", @"Marullus", @"Messala", @"Messenger", @"Metellus Cimber", @"Octavius", @"Pindarus", @"Poet", @"Popilius", @"Portia", @"Publius", @"Second Citizen", @"Second Commoner", @"Second Soldier", @"Servant", @"Soothsayer", @"Strato", @"Third Citizen", @"Third Soldier", @"Tintinius", @"Trebonius", @"Varro", @"Volumnius", @"Young Cato", nil];
    play.characters = characters;
	[characters release];
	[playList addObject:play];
    [play release];
    
	play = [[Play alloc] init];
	play.title = @"King Lear";
	play.genre = @"Tragegy";
	[dateComponents setYear:1605];
	play.date = [calendar dateFromComponents:dateComponents];
    characters = [[NSArray alloc] initWithObjects:@"Captain", @"Cordelia", @"Curan", @"Doctor", @"Duke of Albany", @"Duke of Burgundy", @"Duke of Cornwall", @"Earl of Gloucester", @"Earl of Kent", @"Edgar", @"Edmund", @"Fool", @"Gentleman", @"Goneril", @"Herald", @"King of France", @"Knight", @"Lear", @"Messenger", @"Old Man", @"Oswald", @"Regan", @"Servant 1", @"Servant 2", @"Servant 3", nil];
    play.characters = characters;
	[characters release];
	[playList addObject:play];
    [play release];
    
	    
    self.list = playList;
    [playList release];
    [dateComponents release];
    [calendar release];
}

@end
