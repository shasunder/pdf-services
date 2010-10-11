
#import "DataController.h"
#import "Record.h"
#import "TouchXML.h"
#import "Constants.h"

@implementation DataController

@synthesize questionBank;
@synthesize groupMap;
@synthesize group;


- (id)init {
    if (self = [super init]) {
		[self loadGroups];
    }
    return self;
}

//utilities

- (BOOL)doesContainSubstring:(NSString *)mainString : (NSString *)substring{
	
	if(mainString==nil || [mainString length] == 0 || [substring length] == 0)
		return NO;
	
	NSRange textRange= [[mainString lowercaseString] rangeOfString:[substring lowercaseString]];
	
	if(textRange.location != NSNotFound){
		return YES;
	}else{
		return NO;
	}
}


-(NSString *) getDocumentsDirectory{
	NSArray *arrayPaths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
	return [arrayPaths objectAtIndex:0];
}

-(NSArray *) getXMLNodes:(NSString *)xpath :(NSData *)xmlContent{
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
 	return [xmlDocument nodesForXPath:xpath error:nil];
}

-(NSMutableDictionary *) getAttributesForNode:(CXMLElement*) node{

	NSString *strName,*strValue;
	NSArray *arAttr=[node attributes]; //fetch all attributes from the current node	
	NSMutableDictionary *attributesMap=[[NSMutableDictionary alloc] init];
	
	//NSLog(@"Processing attributes ");
	for (int i = 0; i < [arAttr count]; i++) {  //fetch attributes
		strName=[[arAttr objectAtIndex:i] name];
		strValue=[[arAttr objectAtIndex:i] stringValue];
		
		[attributesMap setValue:strValue forKey:strName]; 
		
	}
	
	return attributesMap;
}

-(NSData *) getContentFromInternet:(NSString *) url{
	NSLog(@"Downloading file from internet using url :%@",url);
	NSURLResponse *response;
	NSError *error;
	
	NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL: [NSURL URLWithString: url]];
	[request setHTTPMethod: @"GET"];
	
	NSData *fileContents = [NSURLConnection sendSynchronousRequest:request returningResponse:&response error:&error];
	return fileContents;
}

// get the groups xml
// parse attributes - url, categories, description, name
// pull content from url for each group
// save it to local with name as the category
-(void) loadGroups{
	
	NSString *docDir = [self getDocumentsDirectory];
	
	NSString *fileName=GROUPS_XML_FILE;
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
	
	[self parseGroups:fileContents];
	
}

-(void) loadGroupsUpdate{
	NSString *docDir = [self getDocumentsDirectory];
	
	NSString *fileName=GROUPS_XML_FILE;
	NSString *filePath = [NSString stringWithFormat:@"%@/%@_%@", docDir, APP_NAME,fileName ];
	
	NSData *fileContents = [self getContentFromInternet:GROUPS_URL];
	NSLog(@"Writing XML found at url : %@ to file path :%@ ",GROUPS_URL, filePath);
	
	NSString *contentStr=[[NSString alloc] initWithData:fileContents encoding:NSUTF8StringEncoding];
	BOOL isValid= [self doesContainSubstring:contentStr:@"<groups" ];
	if(isValid){
		[fileContents writeToFile:filePath atomically:YES];
		[self parseGroups:fileContents];
	}
	[contentStr release];
	
	
	
}

-(NSString *) getLatestApplicationVersion{
	NSData *fileContents = [self getContentFromInternet:GROUPS_URL];
	NSArray *nodes=[self getXMLNodes:@"//groups":fileContents];
	
	NSLog(@"Checking version of XML found at url : %@ ",GROUPS_URL);
	CXMLElement *groupsNode = [nodes objectAtIndex:0];
	NSMutableDictionary *attributes = [self getAttributesForNode:groupsNode];
	
	return [attributes objectForKey:@"version"];
	
}


- (unsigned)countOfCategory {
    return [questionBank count];
}

- (NSArray*) getGroupTitles{
	NSMutableArray *groupTitles = [[NSMutableArray alloc] init];
	
	for(NSValue *key in [self.groupMap allKeys]){
		[groupTitles addObject:key];		
	}
	return groupTitles;
}

- (NSArray*) getGroupSubTitles:(NSArray *) groupTitles{
	NSMutableArray *groupSubTitles = [[NSMutableArray alloc] init];
	for(NSValue *title in groupTitles){
		NSString *subtitle=[[groupMap objectForKey:title] objectForKey:@"subtitle"];
		[groupSubTitles addObject:subtitle];		
	}
	return groupSubTitles;
}


- (NSArray*) getCategories{
	NSMutableArray *categories = [[NSMutableArray alloc] init];

	for(NSValue *key in [self.questionBank allKeys]){
		[categories addObject:key];		
	}
	return categories;
}

- (OrderedDictionary *)getQuestionsMapForCategory:(NSString *) category{
	return [questionBank objectForKey:category];
}

- (NSArray *)getQuestionsArrayForCategory:(NSString *) category{
	NSMutableArray *records = [[NSMutableArray alloc] init];
	OrderedDictionary *mapForCategory=[questionBank objectForKey:category];
	Record *record; 
	
	for(NSValue *key in [mapForCategory allKeys]){
		record=[[Record alloc] init];
		record.question= (NSString *)key;
		record.answer= [mapForCategory objectForKey:key];
		[records addObject:record];
	}
	return records;
}

//Parse questionBank xml and populate list array
-(void) parseQuestions:(NSData *)xmlContent{
	
	NSLog(@"Parsing questions from XML");
	NSString *strName,*strValue;
	
	//get all the category nodes in the question bank xml : eg: <questionbank><category name="Basics"><question>q1</><answer>a1</> 
	NSArray *nodes = [self getXMLNodes:@"//category" :xmlContent];
	
	
	questionBank =[[OrderedDictionary alloc] init]; // map for storing node attribute/element name/values
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	int expertise = [ [defaults stringForKey: KEY_EXPERTISE] intValue];
	
    for (CXMLElement *node in nodes) {  // iterate through the category nodes
		
		//NSLog(@"Processing attributes ");
		
	    NSMutableDictionary *attributes= [self getAttributesForNode:node];
		NSString *strCategory = [attributes objectForKey:@"name" ];
		[questionBank setValue:@"name" forKey:strCategory]; 
		
		//NSLog(@"%@",[@"Processing elements to fetch question and answers for category :" stringByAppendingString:strCategory]);
		
		// process to read question and answers child nodes of category parent node 
        OrderedDictionary *qaMap=[[OrderedDictionary alloc] init]; //q's and a's in a map
		
		NSArray *qaNodes= [node nodesForXPath:@"qa" error:nil];
		for (CXMLElement *qaNode in qaNodes) { 
			attributes= [self getAttributesForNode:qaNode];
			int rating = [[attributes objectForKey:@"rating"] intValue];
			if (expertise==0 || (rating >= expertise && rating<= expertise+1) ) {
				@try {
					strName = [[[qaNode nodesForXPath:@"question" error:nil] objectAtIndex:0] stringValue];
					//NSLog([NSString stringWithFormat:@"Question : %@ ", strName]);
					strValue=[[[qaNode nodesForXPath:@"answer" error:nil] objectAtIndex:0] stringValue];
					//NSLog([NSString stringWithFormat:@"%@ : %@", strName, strValue]);
					[qaMap setValue:strValue forKey: strName];
				}
				@catch (NSException* ex) {
					NSLog(@"Question/answer parsing failed: %@ : question => %@",ex,strName
						  );
				}
			}
			
		}
		
		[questionBank setValue:qaMap forKey:strCategory];
		//NSLog([NSString stringWithFormat:@"Question : %@ ", [qaMap description]]);
		[qaMap release]; 
		
	}
	
	//NSLog(@"%@",[questionBank description]);	
	
}

-(void) loadQuestions:(NSString *) groupIn{
	self.group=groupIn;
	
	// Get documents directory
	NSString *docDir=[self getDocumentsDirectory];
	NSString *fileName=[NSString stringWithFormat:@"%@.xml",[self group]];
	NSString *filePath = [NSString stringWithFormat:@"%@/%@_%@", docDir, APP_NAME,fileName ];
	
	NSData *fileContents = [NSData dataWithContentsOfFile:filePath];
	
	if (fileContents == NULL) {
		NSLog(@"No file found at application path %@. Trying default path " ,filePath);
		NSString *defaultDirPath=[[NSBundle mainBundle] resourcePath];
		filePath = [NSString stringWithFormat:@"%@/%@_%@", defaultDirPath, APP_NAME,fileName ];
		fileContents = [NSData dataWithContentsOfFile:filePath];
	
		if (fileContents == NULL) {
			NSLog(@"No file found at default path also!!!!! :%@ " ,filePath);
		}
	}
	NSLog(@"Loading locally cached XML at :%@" ,filePath);		
	[self parseQuestions:fileContents];
}

-(void)resetData{
	NSError *error;
	NSString *documentDBFolderPath=[self getDocumentsDirectory];
	NSFileManager *fileManager = [NSFileManager defaultManager];
	
	NSArray *dirContents = [fileManager directoryContentsAtPath:documentDBFolderPath];

	NSArray *onlyXmls = [dirContents filteredArrayUsingPredicate:[NSPredicate predicateWithFormat:@"self ENDSWITH '.xml'"]];
	
	for (NSString *xmlPath in onlyXmls) {
			NSString *actualXMLPath=[NSString stringWithFormat:@"%@/%@",documentDBFolderPath, xmlPath];
			[fileManager removeItemAtPath:actualXMLPath error:&error];
		
	}
}

//Parse groups xml attributes and populate to map
-(void) parseGroups:(NSData *)xmlContent{
	
	NSLog(@"Parsing groups from XML");
	//NSLog([xmlContent description]);
	
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
    
	//get all the attributes in group node of the group xml
	//<groups><group title="Core Java" url="..." subtitle="Basics, Classes/objects, Threads, Collections..." description="Core java" /> 
	
	NSArray *nodes = [xmlDocument nodesForXPath:@"//group" error:nil];
	
	groupMap =[[OrderedDictionary alloc] init]; // map for storing node attribute/element name/values
	
    for (CXMLElement *node in nodes) {  // iterate through the group nodes
		NSString *strKey;		
		@try{
			NSMutableDictionary *attributesMap = [self getAttributesForNode:node];
		
			strKey = [attributesMap objectForKey:@"title"];

			[groupMap setValue:attributesMap forKey:strKey]; 
			[attributesMap release];
		}
		@catch (NSException* ex) {
			NSLog(@"Group parsing failed: %@ : question => %@",ex,strKey);
		}
	}

	//NSLog(@"%@",[groupMap description]);	
	
}



-(void) loadCache{
	NSString *docDir=[self getDocumentsDirectory];
	
	for(NSValue *key in [self.groupMap allKeys]){
		NSData *fileContents;
		NSMutableDictionary *groupAttributes=[self.groupMap objectForKey:key];
		NSString *categoryURL= [groupAttributes objectForKey:@"url"];	
		NSString *currentGroup= [groupAttributes objectForKey:@"title"];
		NSString *fileName = [NSString stringWithFormat:@"%@.xml",currentGroup];
		NSString *filePath = [NSString stringWithFormat:@"%@/%@_%@", docDir, APP_NAME,fileName ];
				
		//NSLog(@"Downloading file from internet using url :%@",categoryURL);
		fileContents = [self getContentFromInternet:categoryURL];
		
		NSString *contentStr=[[NSString alloc] initWithData:fileContents encoding:NSUTF8StringEncoding];
		BOOL isValid= [self doesContainSubstring:contentStr:@"questionbank" ];
		if(isValid){
			NSLog(@"Writing XML found at url : %@ to file path :%@ ",categoryURL, filePath);
			[fileContents writeToFile:filePath atomically:YES];
		}else {
			NSLog(@"FAILED writing XML found at url : %@ to file path :%@ ",categoryURL, filePath);
			NSLog(contentStr);
		}

		[contentStr release];
		
		
	
	}
	NSLog(@"Update complete");
	
}

- (void)dealloc {
    [super dealloc];

}


@end
