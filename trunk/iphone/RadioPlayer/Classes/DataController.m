
#import "DataController.h"
#import "TouchXML.h"
#import "Constants.h"



@implementation DataController

@synthesize stationsMap;
@synthesize currentStationCategory;


- (id)init {
    if (self = [super init]) {
		@try{
		[self loadStations];
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

-(NSArray *) getXMLNodes:(NSString *)xpath :(NSString *)xmlContent{
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
 	NSArray *nodes = [xmlDocument nodesForXPath:xpath error:nil];
	
	return	nodes;
}

-(NSMutableDictionary *) getAttributesForNode:(CXMLElement*) node{
	NSString *strName,*strValue;
	
	NSArray *arAttr=[node attributes]; //fetch all attributes from the current node
	NSUInteger i;
	
	NSMutableDictionary *attributesMap=[[NSMutableDictionary alloc] init];
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
	NSString *filePath = [NSString stringWithFormat:@"%@/%@_%@", docDir, APP_NAME,fileName ];
	
	NSData *fileContents = [NSData dataWithContentsOfFile:filePath];
	
	if (fileContents == NULL) {
		NSLog(@"No file found locally at :%@ ..using default files" ,filePath);
		NSString *defaultDirPath=[[NSBundle mainBundle] resourcePath];
		filePath = [NSString stringWithFormat:@"%@/%@_%@", defaultDirPath, APP_NAME,fileName ];
		fileContents = [NSData dataWithContentsOfFile:filePath];
		
		if (fileContents == NULL) {
			NSLog(@"No file found at default path also!!!!! :%@ " ,filePath);
		}
	}else {
		NSLog(@"Found locally cached XML at :%@" ,filePath);
		
	}
	
	[self parseStations:fileContents];
	
}

-(void) loadStationsUpdate{
	NSString *docDir = [self getDocumentsDirectory];
	
	NSString *fileName=STATIONS_XML_FILE;
	NSString *filePath = [NSString stringWithFormat:@"%@/%@_%@", docDir, APP_NAME,fileName ];
	
	NSData *fileContents = [self getContentFromInternet:STATIONS_URL];
	NSLog(@"Writing XML found at url : %@ to file path :%@ ",STATIONS_URL, filePath);
		
	[fileContents writeToFile:filePath atomically:YES];
	
	[self parseStations:fileContents];
}


- (NSArray*) getCategories{
	NSMutableArray *categories = [[NSMutableArray alloc] init];
	
	for(NSValue *key in [self.stationsMap allKeys]){
		[categories addObject:key];		
	}
	categories= [categories sortedArrayUsingSelector:@selector(caseInsensitiveCompare:)];
	return categories;
}


- (NSArray *)getStationTitles:(NSString *) category{
	NSArray *stations = [[NSMutableArray alloc] init];
	NSMutableDictionary *mapForCategory=[stationsMap objectForKey:category];
		
	for(NSValue *key in [mapForCategory allKeys]){
		[stations addObject:key];
	}
	return stations;
}

- (NSString*) getStationUrl:(NSString *) category : (NSString *)title{
	NSMutableDictionary *mapForCategory=[stationsMap objectForKey:category];
	return [mapForCategory objectForKey:title];
}

-(void)resetData{
	NSError *error;

	NSString *documentDBFolderPath=[self getDocumentsDirectory];
	NSFileManager *fileManager = [NSFileManager defaultManager];
	
	NSString *defaultDirPath=[[NSBundle mainBundle] resourcePath];
	
	NSArray *dirContents = [fileManager directoryContentsAtPath:documentDBFolderPath];

	NSArray *onlyXmls = [dirContents filteredArrayUsingPredicate:[NSPredicate predicateWithFormat:@"self STARTSWITH 'fmplayer' AND self ENDSWITH '.xml'"]];
	
		for (NSString *xmlPath in onlyXmls) {
			NSString *actualXMLPath=[NSString stringWithFormat:@"%@/%@",documentDBFolderPath, xmlPath];
			[fileManager removeItemAtPath:actualXMLPath error:&error];
		
		}
	
}

//Parse stations xml attributes and populate to map
-(void) parseStations:(NSData *)xmlContent{
	
	NSLog(@"Parsing stations from XML");
	NSLog([xmlContent description]);
	
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
    
	//get all the attributes in category node of the stations xml
	//<stations><category name="hindi"><station name="Radio mirchi" url="..." /> 
	
	NSArray *nodes = [xmlDocument nodesForXPath:@"//category" error:nil];
	
	stationsMap =[[NSMutableDictionary alloc] init]; // map for storing node attribute/element name/values
	
    for (CXMLElement *node in nodes) {  // iterate through the category nodes
		NSString *strCategory, *strName, *strValue;		
		@try{
			NSMutableDictionary *attributesMap = [self getAttributesForNode:node];
			strCategory = [attributesMap objectForKey:@"name"];
			[attributesMap release];
		}
		@catch (NSException* ex) {
			NSLog(@"Category parsing failed: %@ :category => %@",ex,strCategory);
		}
		
		NSMutableDictionary *stationsAttributesMap=[[NSMutableDictionary alloc] init]; 
		
		NSArray *stationNodes= [node nodesForXPath:@"station" error:nil];
		NSLog([node description]);
		for (CXMLElement *stationNode in stationNodes) { 
			   NSMutableDictionary *attributes= [self getAttributesForNode:stationNode];
			
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
		
	
	NSLog(@"%@",[stationsMap description]);	
	
}



- (void)dealloc {
    [super dealloc];

}


@end
