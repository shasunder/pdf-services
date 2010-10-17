
#import "DataController.h"
#import "TouchXML.h"
#import "Constants.h"
#import "OrderedDictionary.h"


@implementation DataController

@synthesize stationsMap;
@synthesize currentStationCategory;
@synthesize backgrounds;


- (id)init {
    if (self = [super init]) {
		@try{
		[self loadStations];
		[self loadBackgrounds];
		[backgrounds retain];
		}@catch (NSException *ne) {
			NSLog([ne description]);
		}
		
		
    }
	
    return self;
}

//utilities

-(NSString *) getDocumentsDirectory{
	NSArray *arrayPaths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
	NSString *docDir = [arrayPaths objectAtIndex:0];
	return docDir;
}

-(NSArray *) getXMLNodes:(NSData *)xpath :(NSString *)xmlContent{
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
 	NSArray *nodes = [xmlDocument nodesForXPath:xpath error:nil];
	
	return	nodes;
}

-(OrderedDictionary *) getAttributesForNode:(CXMLElement*) node{
	NSString *strName,*strValue;
	
	NSArray *arAttr=[node attributes]; //fetch all attributes from the current node
	NSUInteger i;
	
	OrderedDictionary *attributesMap=[[OrderedDictionary alloc] init];
	//NSLog(@"Processing attributes ");
	for (i = 0; i < [arAttr count]; i++) {  //fetch attributes
		strName=[[arAttr objectAtIndex:i] name];
		strValue=[[arAttr objectAtIndex:i] stringValue];
		
		[attributesMap setValue:strValue forKey:strName]; 
		
	}
	
	return attributesMap;
}


// get the stations xml
// parse attributes - url, description, name
// pull content from url for each group
// save it to local with name as the category


-(NSData *) getContentFromInternet:(NSString *) url{
	NSLog(@"Downloading file from internet using url :%@",url);
	NSURLResponse *response;
	NSError *error;
	
	NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL: [NSURL URLWithString: url]];
	[request setHTTPMethod: @"GET"];
	
	NSData *fileContents = [NSURLConnection sendSynchronousRequest:request returningResponse:&response error:&error];
	
	return fileContents;
}

-(void) loadStations{
	
	NSString *docDir = [self getDocumentsDirectory];
	
	NSString *fileName=STATIONS_XML_FILE;
	NSString *filePath = [NSString stringWithFormat:@"%@/%@", docDir,fileName ];
	
	NSData *fileContents = [NSData dataWithContentsOfFile:filePath];
	
	if (fileContents == NULL) {
		NSLog(@"No file found locally at :%@ ..using default files" ,filePath);
		NSString *defaultDirPath=[[NSBundle mainBundle] resourcePath];
		filePath = [NSString stringWithFormat:@"%@/%@", defaultDirPath,fileName ];
		fileContents = [NSData dataWithContentsOfFile:filePath];
		
		if (fileContents == NULL) {
			NSLog(@"No file found at default path also!!!!! :%@ " ,filePath);
		}
	}else {
		NSLog(@"Found locally cached XML at :%@" ,filePath);
		
	}
	
	[self parseStations:fileContents];
	
}


- (BOOL)doesContainSubstring:(NSString *)mainString : (NSString *)substring{
	if(mainString==nil || [mainString length] == 0 || [substring length] == 0)
		return NO;
	NSRange textRange;
	textRange = [[mainString lowercaseString] rangeOfString:[substring lowercaseString]];
	if(textRange.location != NSNotFound)
	{
		return YES;
	}else{
		return NO;
	}
}

-(void) loadStationsUpdate{
	NSString *docDir = [self getDocumentsDirectory];
	
	NSString *fileName=STATIONS_XML_FILE;
	NSString *filePath = [NSString stringWithFormat:@"%@/%@", docDir,fileName ];
	
	NSData *fileContents = [self getContentFromInternet:STATIONS_URL];
	NSLog(@"Writing XML found at url : %@ to file path :%@ ",STATIONS_URL, filePath);
	
	//sanity check to avoid writing unwanted server error content during a read failure
	NSString *contentStr=[[NSString alloc] initWithData:fileContents encoding:NSUTF8StringEncoding];
	BOOL isValid= [self doesContainSubstring:contentStr:@"<stations" ];
	if(isValid){
		[fileContents writeToFile:filePath atomically:YES];		
		[self parseStations:fileContents];
	}
	[contentStr release];
	
}


- (NSArray*) getCategories{
	NSMutableArray *categories = [[NSMutableArray alloc] init];
	
	for(NSValue *key in [self.stationsMap allKeys]){
		[categories addObject:key];		
	}
	return categories;
}


- (NSArray *)getStationTitles:(NSString *) category{
	NSArray *stations = [[NSMutableArray alloc] init];
	OrderedDictionary *mapForCategory=[stationsMap objectForKey:category];
		
	for(NSValue *key in [mapForCategory allKeys]){
		[stations addObject:key];
	}
	return stations;
}

- (NSString*) getStationUrl:(NSString *) category : (NSString *)title{
	OrderedDictionary *mapForCategory=[stationsMap objectForKey:category];
	return [mapForCategory objectForKey:title];
}

-(void)resetData{
	NSError *error;

	NSString *documentDBFolderPath=[self getDocumentsDirectory];
	NSFileManager *fileManager = [NSFileManager defaultManager];	
	NSArray *dirContents = [fileManager directoryContentsAtPath:documentDBFolderPath];

	NSArray *onlyXmls = [dirContents filteredArrayUsingPredicate:[NSPredicate predicateWithFormat:@"(self MATCHES 'fmplayer.*xml')"]];
	
		for (NSString *xmlPath in onlyXmls) {
			NSString *actualXMLPath=[NSString stringWithFormat:@"%@/%@",documentDBFolderPath, xmlPath];
			[fileManager removeItemAtPath:actualXMLPath error:&error];
		
		}
	
}

-(void) parseStations:(NSData *)xmlContent{
	
	NSLog(@"Parsing stations from XML");
	//NSLog([xmlContent description]);
	
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
    
	//get all the attributes in category node of the stations xml
	
	NSArray *nodes = [xmlDocument nodesForXPath:@"//category" error:nil];
	
	stationsMap =[[OrderedDictionary alloc] init]; // map for storing node attribute/element name/values
	
    for (CXMLElement *node in nodes) {  // iterate through the category nodes
		NSString *strCategory, *strName, *strValue;		
		@try{
			OrderedDictionary *attributesMap = [self getAttributesForNode:node];
			strCategory = [attributesMap objectForKey:@"name"];
			[attributesMap release];
		}
		@catch (NSException* ex) {
			NSLog(@"Category parsing failed: %@ :category => %@",ex,strCategory);
		}
		
		OrderedDictionary *stationsAttributesMap=[[OrderedDictionary alloc] init]; 
		
		NSArray *stationNodes= [node nodesForXPath:@"station" error:nil];
		//NSLog([node description]);
		for (CXMLElement *stationNode in stationNodes) { 
			   OrderedDictionary *attributes= [self getAttributesForNode:stationNode];
			
				@try {
					strName = [attributes objectForKey:@"name"];					//NSLog([NSString stringWithFormat:@"Question : %@ ", strName]);
					strValue=[attributes objectForKey:@"url"];					//NSLog([NSString stringWithFormat:@"%@ : %@", strName, strValue]);
					[stationsAttributesMap setValue:strValue forKey: strName];
					[attributes release];
				}
				@catch (NSException* ex) {
					NSLog(@"station parsing failed: %@ : station => %@",ex,strName
						  );
				}
		 }
		
		[stationsMap setValue:stationsAttributesMap forKey:strCategory];
	
		}
		
	
	//NSLog(@"%@",[stationsMap description]);	
	
}

-(void)loadBackgrounds{
	backgrounds = [[NSMutableArray alloc] init];

	
	//spiritual
	[backgrounds addObject:@"nature6.jpeg"];
	[backgrounds addObject:@"butterfly.jpg"];
	[backgrounds addObject:@"nature10.jpg"];
	[backgrounds addObject:@"nature4.jpg"];
	
	//proffesional
	[backgrounds addObject:@"wood4.png"];
	[backgrounds addObject:@"wood5.png"];	
	[backgrounds addObject:@"wood7.png"];
	[backgrounds addObject:@"wood1.png"];
	
	//cool
	[backgrounds addObject:@"yellow-sun.jpg"];
	[backgrounds addObject:@"green-background-abstract.jpg"];	
	[backgrounds addObject:@"brownish.jpg"];
	[backgrounds addObject:@"got-a-light-mac.jpg"];
	
	//sci-fi 12
	[backgrounds addObject:@"eye-of-fire.jpg"];
	[backgrounds addObject:@"crystal-clone.jpg"];
	[backgrounds addObject:@"dancing-in-the-dark.jpg"];
	
	
	[backgrounds addObject:@"background_lime_green.jpg"];
	[backgrounds addObject:@"basic_iphone_background.jpg"];
	[backgrounds addObject:@"lime_green_bubbles_iphone_wallpaper.jpg"];
	
	[backgrounds addObject:@"dandelion-iphone-wallpaper.jpg"];
	
	[backgrounds addObject:@"nature7.jpg"];
	
	
	
}


- (void)dealloc {
    [super dealloc];

}


@end
