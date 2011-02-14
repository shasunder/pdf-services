
#import "DataController.h"
#import "Constants.h"

@implementation DataController

@synthesize accounts;
@synthesize group;
@synthesize websites;
@synthesize websiteDetails;



- (id)init {
    if (self = [super init]) {
		[self loadAccounts];
		websites = [[NSMutableArray alloc] init];
		
		NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
		websiteDetails = [defaults objectForKey:KEY_WEBSITE_DETAILS];
			
		if(websiteDetails==nil){
			websiteDetails = [[OrderedDictionary alloc] init];
				
			[websiteDetails setObject:@"http://www.admob.com/login|||http://www.admob.com/logout|||email:password:login" forKey:@"Admob"];		
			[websiteDetails setObject: @"https://docs.google.com|||https://docs.google.com/logout|||Email:Passwd:gaia_loginform" forKey:@"Gdocs"];
			[websiteDetails setObject:@"https://login.yahoo.com|||http://mail.yahoo.com|||login:passwd:login_form" forKey:@"Yahoo Mail"];
			[websiteDetails setObject:@"http://gmail.com|||https://mail.google.com/mail/?logout&hl=en|||Email:Passwd:gaia_loginform" forKey:@"Gmail"];
			/*[websiteDetails setObject:@"http://www.paypal.com|||https://www.paypal.com/uk/cgi-bin/webscr?cmd=_logout|||login_email:login_password:login_form" forKey:@"Paypal"];
			 */
			[websiteDetails setObject:@"http://signin.mobileweb.ebay.com/login|||https://signin.mobileweb.ebay.com/logout|||userName:pass:FormContainer" forKey:@"Ebay"];
			[websiteDetails setObject:@"http://itunesconnect.apple.com|||http://itunesconnect.apple.com|||accountname:accountpassword:appleConnectForm" forKey:@"Itunes Connect"];
			[websiteDetails setObject:@"http://touch.facebook.com/|||http://touch.facebook.com/logout.php|||email:pass:login_form" forKey:@"Facebook"];
			[websiteDetails setObject:@"http://orkut.com|||https://orkut.com/?logout&hl=en|||Email:Passwd:gaia_loginform" forKey:@"Orkut"];
			
		}
		
		if([websiteDetails objectForKey:@"Youtube"] == nil){
			[websiteDetails setObject:@"https://www.google.com/accounts/ServiceLogin?uilel=3&service=youtube&btmpl=mobile&passive=true&continue=http%3A%2F%2Fm.youtube.com%2Fsignin%3Faction_handle_signin%3DTrue%26warned%3D1%26nomobiletemp%3D1%26hl%3Den_US%26next%3Dhttp%253A%252F%252Fm.youtube.com%252Findex%253Fdesktop_uri%253D%25252F%2526gl%253DGB%2526rdm%253D10%2523%252Fhome%253Fbmb%253D1&hl=en_US&ltmpl=mobile|||http://www.youtube.com/?logout|||Email:Passwd:gaia_loginform" forKey:@"Youtube"];
		}
		
		[self store:KEY_WEBSITE_DETAILS : websiteDetails];
		
		NSLog([websiteDetails description]);

    }
    return self;
}

//-----------Key chain code begins --------------


static NSString *serviceName = @"com.bri8.searchService";

- (NSMutableDictionary *)newSearchDictionary:(NSString *)identifier {
    NSMutableDictionary *searchDictionary = [[NSMutableDictionary alloc] init];  
	
    [searchDictionary setObject:(id)kSecClassGenericPassword forKey:(id)kSecClass];
	
    NSData *encodedIdentifier = [identifier dataUsingEncoding:NSUTF8StringEncoding];
    [searchDictionary setObject:encodedIdentifier forKey:(id)kSecAttrGeneric];
    [searchDictionary setObject:encodedIdentifier forKey:(id)kSecAttrAccount];
    [searchDictionary setObject:serviceName forKey:(id)kSecAttrService];
	
    return searchDictionary; 
}


- (NSData *)searchKeychainCopyMatching:(NSString *)identifier {
    NSMutableDictionary *searchDictionary = [self newSearchDictionary:identifier];
	
    // Add search attributes
    [searchDictionary setObject:(id)kSecMatchLimitOne forKey:(id)kSecMatchLimit];
	
    // Add search return types
    [searchDictionary setObject:(id)kCFBooleanTrue forKey:(id)kSecReturnData];
	
    NSData *result = nil;
    OSStatus status = SecItemCopyMatching((CFDictionaryRef)searchDictionary,
                                          (CFTypeRef *)&result);
	
    [searchDictionary release];
    return result;
}

-(NSString *)getEncryptedPassword:(NSString *)key{
	NSData *passwordData = [self searchKeychainCopyMatching:key];
	NSString *password = nil;
    if (passwordData) {
		password = [[NSString alloc] initWithData:passwordData encoding:NSUTF8StringEncoding];
        [passwordData release];
    }
	return password;
}

- (BOOL)createKeychainValue:(NSString *)password forIdentifier:(NSString *)identifier {
    NSMutableDictionary *dictionary = [self newSearchDictionary:identifier];
	
    NSData *passwordData = [password dataUsingEncoding:NSUTF8StringEncoding];
    [dictionary setObject:passwordData forKey:(id)kSecValueData];
	
    OSStatus status = SecItemAdd((CFDictionaryRef)dictionary, NULL);
    [dictionary release];
	
    if (status == errSecSuccess) {
        return YES;
    }
    return NO;
}

- (BOOL)updateKeychainValue:(NSString *)password forIdentifier:(NSString *)identifier {
	
    NSMutableDictionary *searchDictionary = [self newSearchDictionary:identifier];
    NSMutableDictionary *updateDictionary = [[NSMutableDictionary alloc] init];
    NSData *passwordData = [password dataUsingEncoding:NSUTF8StringEncoding];
    [updateDictionary setObject:passwordData forKey:(id)kSecValueData];
	
    OSStatus status = SecItemUpdate((CFDictionaryRef)searchDictionary,
                                    (CFDictionaryRef)updateDictionary);
	
    [searchDictionary release];
    [updateDictionary release];
	
    if (status == errSecSuccess) {
        return YES;
    }
    return NO;
}

- (void)deleteKeychainValue:(NSString *)identifier {
	
    NSMutableDictionary *searchDictionary = [self newSearchDictionary:identifier];
    SecItemDelete((CFDictionaryRef)searchDictionary);
    [searchDictionary release];
}

//-----------Key chain code ends --------------





-(void) loadAccounts{
	NSLog(@"Loading accounts...");
	
	
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	accounts = [defaults objectForKey:KEY_ACCOUNTS];
	
	if(accounts==nil){
		accounts = [[OrderedDictionary alloc] init];
	}

	NSLog(@"Loaded accounts... (%d)",[accounts count]);

} 

-(void)commitAccounts{
	
	[self store:KEY_ACCOUNTS : accounts];
	
}


-(void)addAccount:(NSString *)email : (NSString *)password :(NSString *) website{

	NSString *key = [NSString stringWithFormat:@"%@ : %@",website, email ];
	
	[accounts setObject:email forKey:key];
	[self createKeychainValue:password forIdentifier:email];
	[self commitAccounts];
}

-(void)deleteAccount:(NSString *)email {
	
	[accounts removeObjectForKey:email ];
	[self deleteKeychainValue:email];
	[self commitAccounts];
}



-(void)store:(NSString *)key :(NSObject *)value{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	NSLog(@"Storing value: %@ for key %@ ",[value description],key);
	[defaults setObject:value forKey:key];
	[defaults synchronize]; 
}



- (unsigned)countOfAccount {
    return [accounts count];
}

- (NSString*) getPassword:(NSString *)email{
	NSLog(@"Fetching encrypted password for email.. ",email );
	return [self getEncryptedPassword:email];
}

- (NSArray*) getAccounts{
	NSMutableArray *accountsAr = [[NSMutableArray alloc] init];
	NSLog(@"Fetching accounts... %d)",[accounts count]);
	
	for(NSValue *key in [self.accounts allKeys]){
		[accountsAr addObject:key];	
	}

	return accountsAr;
}




-(NSMutableArray *)getWebsiteList{
	[websites removeAllObjects];
	
	for(NSValue *key in [self.websiteDetails allKeys]){
		[websites addObject:key];	
	}
	[websites sortUsingSelector: @selector(caseInsensitiveCompare:)];
	return websites;

}

-(void) commitWebsites{
	[self store:KEY_WEBSITE_DETAILS : websiteDetails];
	
}

-(void)setWebsiteTokens:(NSString *)encoded : (NSString *)siteKey{
	[websiteDetails setObject:encoded forKey:siteKey];
	NSLog([websiteDetails description]);
	[self commitWebsites];
}


-(void)removeWebsiteToken: (NSString *)siteKey{
	[websiteDetails removeObjectForKey:siteKey];
}

-(NSArray *)getWebsiteTokens:(NSString *)siteKey{
	NSString *encoded= [websiteDetails objectForKey:siteKey];
	NSArray *tokens = [encoded componentsSeparatedByString: @"|||"];
	return tokens;
}

-(NSString *)getWebsiteLoginURL:(NSString *)siteKey{
	return [[self getWebsiteTokens :siteKey] objectAtIndex:0];
	

}

-(NSString *)getWebsiteLogoutURL:(NSString *)siteKey{
	return [[self getWebsiteTokens :siteKey] objectAtIndex:1];	
}

-(NSArray *)getWebsiteLoginFields:(NSString *)siteKey{
	NSString *encoded=  [[self getWebsiteTokens :siteKey] objectAtIndex:2];
	NSArray *tokens = [encoded componentsSeparatedByString: @":"];
	return tokens;	
}

- (void)dealloc {
    [super dealloc];

}


@end
