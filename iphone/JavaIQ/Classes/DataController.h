
@class Play;

@interface DataController : NSObject {
    NSMutableArray *list;
}

- (unsigned)countOfList;
- (Play *)objectInListAtIndex:(unsigned)theIndex;

@end
