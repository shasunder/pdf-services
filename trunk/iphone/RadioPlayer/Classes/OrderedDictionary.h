
@interface OrderedDictionary : NSMutableDictionary
{
	NSMutableDictionary *dictionary;
	NSMutableArray *array;
}

- (void)insertObject:(id)anObject forKey:(id)aKey atIndex:(NSUInteger)anIndex;
- (id)keyAtIndex:(NSUInteger)anIndex;
- (NSEnumerator *)reverseKeyEnumerator;
- (void) setValue:(id)anObject forKey:(id)aKey;
- (void) setObject:(id)anObject forKey:(id)aKey;
- (NSArray *)allKeys;
- (id)objectForKey:key;
@end
