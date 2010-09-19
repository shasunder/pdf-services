
#import "DataController.h"
#import "Record.h"
#import "TouchXML.h"
#import "Constants.h"


@interface DataController ()

- (void)createDemoData;
@end


@implementation DataController

@synthesize questionBank;
@synthesize groupMap;
@synthesize group;


- (id)init {
    if (self = [super init]) {
		[self loadGroups];
		//[self loadCache];
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


// get the groups xml
// parse attributes - url, categories, description, name
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
		
	[fileContents writeToFile:filePath atomically:YES];
	
	[self parseGroups:fileContents];
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
	groupTitles= [groupTitles sortedArrayUsingSelector:@selector(caseInsensitiveCompare:)];
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
	categories= [categories sortedArrayUsingSelector:@selector(caseInsensitiveCompare:)];
	return categories;
}

- (NSMutableDictionary *)getQuestionsMapForCategory:(NSString *) category{
	return [questionBank objectForKey:category];
}

- (NSArray *)getQuestionsArrayForCategory:(NSString *) category{
	NSMutableArray *records = [[NSMutableArray alloc] init];
	NSMutableDictionary *mapForCategory=[questionBank objectForKey:category];
	Record *record; 
	
	for(NSValue *key in [mapForCategory allKeys]){
		record=[[Record alloc] init];
		record.question= (NSString *)key;
		record.answer= [mapForCategory objectForKey:key];
		[records addObject:record];
		//[record dealloc];record=NULL;
	}
	return records;
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
	
	NSMutableDictionary *groupAttributes =[groupMap objectForKey:self.group];

	NSLog(@"Loading locally cached XML at :%@" ,filePath);
		
	[self parseQuestions:fileContents];
}

-(void)resetData{
	NSError *error;
	NSString *documentDBFolderPath=[self getDocumentsDirectory];
	NSFileManager *fileManager = [NSFileManager defaultManager];
	
	NSString *defaultDirPath=[[NSBundle mainBundle] resourcePath];
	
	NSArray *dirContents = [fileManager directoryContentsAtPath:documentDBFolderPath];
	NSArray *defaultDirContents = [fileManager directoryContentsAtPath:defaultDirPath];

	NSArray *onlyXmls = [dirContents filteredArrayUsingPredicate:[NSPredicate predicateWithFormat:@"self ENDSWITH '.xml'"]];
	
	for (NSString *xmlPath in onlyXmls) {
		NSString *actualXMLPath=[NSString stringWithFormat:@"%@/%@",documentDBFolderPath, xmlPath];
		[fileManager removeItemAtPath:actualXMLPath error:&error];
		
	}
	
	NSArray *defaultXmls = [defaultDirContents filteredArrayUsingPredicate:[NSPredicate predicateWithFormat:@"self ENDSWITH '.xml'"]];
	
	for (NSString *xmlPath in defaultXmls) {
		NSString *actualXMLPath=[NSString stringWithFormat:@"%@/%@",defaultDirPath, xmlPath];
		NSString *actualDestnXMLPath=[NSString stringWithFormat:@"%@/%@",documentDBFolderPath, xmlPath];
		[fileManager copyItemAtPath:actualXMLPath toPath:actualDestnXMLPath error:&error];
	}
	
	NSLog([error description]);
	//[self loadGroups];
}

//Parse questionBank xml and populate list array
-(void) parseQuestions:(NSData *)xmlContent{
	
	NSLog(@"Parsing questions from XML");
	NSString *strName,*strValue,*strCategory;
	
	//get all the category nodes in the question bank xml : eg: <questionbank><category name="Basics"><question>q1</><answer>a1</> 
	NSArray *nodes = [self getXMLNodes:@"//category" :xmlContent];
	
	
	questionBank =[[NSMutableDictionary alloc] init]; // map for storing node attribute/element name/values
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	int expertise = [ [defaults stringForKey: KEY_EXPERTISE] intValue];
	
    for (CXMLElement *node in nodes) {  // iterate through the category nodes
		
		//NSLog(@"Processing attributes ");
		
	    NSMutableDictionary *attributes= [self getAttributesForNode:node];
		NSString *strCategory = [attributes objectForKey:@"name" ];
		[questionBank setValue:@"name" forKey:strCategory]; 
				
		//NSLog(@"%@",[@"Processing elements to fetch question and answers for category :" stringByAppendingString:strCategory]);
		
		// process to read question and answers child nodes of category parent node 
        NSMutableDictionary *qaMap=[[NSMutableDictionary alloc] init]; //q's and a's in a map
		
		NSArray *qaNodes= [node nodesForXPath:@"qa" error:nil];
		for (CXMLElement *qaNode in qaNodes) { 
			attributes= [self getAttributesForNode:qaNode];
			int rating = [[attributes objectForKey:@"rating"] intValue];
			if (expertise==0 || expertise >= rating ) {
				strName = [[[qaNode nodesForXPath:@"question" error:nil] objectAtIndex:0] stringValue];
				strValue=[[[qaNode nodesForXPath:@"answer" error:nil] objectAtIndex:0] stringValue];
				NSLog([NSString stringWithFormat:@"%@ : %@", strName, strValue]);
				[qaMap setValue:strValue forKey: strName];
				
			}
			
		}
       
		[questionBank setValue:qaMap forKey:strCategory];
		[qaMap release]; 
		
	}
	
	//NSLog(@"%@",[questionBank description]);	
	
}


//Parse groups xml attributes and populate to map
-(void) parseGroups:(NSData *)xmlContent{
	
	NSLog(@"Parsing groups from XML");
	
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
    
	//get all the attributes in group node of the group xml
	//<groups><group title="Core Java" url="..." subtitle="Basics, Classes/objects, Threads, Collections..." description="Core java" /> 
	
	NSArray *nodes = [xmlDocument nodesForXPath:@"//group" error:nil];
	
	groupMap =[[NSMutableDictionary alloc] init]; // map for storing node attribute/element name/values
	
    for (CXMLElement *node in nodes) {  // iterate through the group nodes
		NSString *strKey;		
		NSMutableDictionary *attributesMap = [self getAttributesForNode:node];
		
		strKey = [attributesMap objectForKey:@"title"];
		
		[groupMap setValue:attributesMap forKey:strKey]; 
		[attributesMap release];		
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
				
		NSLog(@"Downloading file from internet using url :%@",categoryURL);
		fileContents = [self getContentFromInternet:categoryURL];
		NSLog(@"Writing XML found at url : %@ to file path :%@ ",categoryURL, filePath);
		
		[fileContents writeToFile:filePath atomically:YES];
	
	}
	NSLog(@"Update complete");
	
}

- (void)dealloc {
    [super dealloc];

}


@end
