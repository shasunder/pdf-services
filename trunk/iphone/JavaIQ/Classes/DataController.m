
#import "DataController.h"
#import "Record.h"
#import "TouchXML.h"

@interface DataController ()

- (void)createDemoData;
@end


@implementation DataController

@synthesize questionBank;
@synthesize group;

//TODO: maintain a map of category to URL constants
NSString *QUESTIONS_URL=@"http://jshoutbox.appspot.com/file/102001"; //core java

- (id)init:(NSString *)groupIn {
    if (self = [super init]) {
        self.group=groupIn;
		[self loadQuestions]; 
		
    }
    return self;
}

- (unsigned)countOfCategory {
    return [questionBank count];
}

- (NSArray*) getCategories{
	NSMutableArray *categories = [[NSMutableArray alloc] init];
	[questionBank keyEnumerator];
	for(NSValue *key in [self.questionBank allKeys]){
		[categories addObject:key];		
	}
	categories= [categories sortedArrayUsingSelector:@selector(caseInsensitiveCompare:)];
	return categories;
}


-(void) loadQuestions{
	NSError *error;
	NSURLResponse *response;
	NSData *fileContents;

	// Get documents directory
	NSArray *arrayPaths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
	NSString *docDir = [arrayPaths objectAtIndex:0];
	
	NSString *fileName=[@"_java_iq_" stringByAppendingString: [[self group] stringByAppendingString:@".xml"]];
	NSString *filePath = [[docDir stringByAppendingString:@"/"] stringByAppendingString: fileName];
	
	
	fileContents = [NSData dataWithContentsOfFile:filePath];
	
	if (fileContents == NULL) { //download and cache locally
		NSLog([NSString stringWithFormat: @"Downloading file from internet using url :",QUESTIONS_URL]);
		NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL: [NSURL URLWithString: QUESTIONS_URL]];
		[request setHTTPMethod: @"GET"];
		fileContents = [NSURLConnection sendSynchronousRequest:request returningResponse:&response error:&error];
		NSLog([NSString stringWithFormat:@"Writing XML found at url : %@ to file path :%@ ",QUESTIONS_URL, filePath]);
		
		[fileContents writeToFile:filePath atomically:YES];
	}else {
		NSLog([NSString stringWithFormat:@"Found locally cached XML at :%@" ,filePath]);
		
	}

	
	[self parseQuestions:fileContents];
}


//Parse questionBank xml and populate list array
-(void) parseQuestions:(NSData *)xmlContent{
	
	NSLog(@"Parsing questions from XML");
	
    CXMLDocument *xmlDocument= [[[CXMLDocument alloc] initWithData:xmlContent options:CXMLDocumentTidyXML error:nil] autorelease];
    
	//get all the category nodes in the question bank xml : eg: <questionbank><category name="Basics"><question>q1</><answer>a1</> 
	NSArray *nodes = [xmlDocument nodesForXPath:@"//category" error:nil];
	
	//temp variables to store key value pair.
	NSString *strName,*strValue,*strCategory;
	
	questionBank =[[NSMutableDictionary alloc] init]; // map for storing node attribute/element name/values
	
    for (CXMLElement *node in nodes) {  // iterate through the category nodes
		
		NSLog(@"Processing attributes ");
		
        // process to set attributes of category node
		NSArray *arAttr=[node attributes]; //fetch all attributes from the current node
        NSUInteger i, countAttr = [arAttr count];
		
        for (i = 0; i < countAttr; i++) {  //fetch category name only eg: Basic,Collections,etc
			strName=[[arAttr objectAtIndex:i] name];
			strCategory=[[arAttr objectAtIndex:i] stringValue];
			
            if(([strName  isEqualToString:@"name"])){  
                [questionBank setValue:strName forKey:strCategory]; 
				break;
            }
        }
		
        // --------------------------------------------------------------------------------
		
		NSLog(@"%@",[@"Processing elements to fetch question and answers for category :" stringByAppendingString:strCategory]);
		
		// process to read question and answers child nodes of category parent node 
        NSUInteger j, nodeCount = [node childCount];
        CXMLNode *questionNode,*answerNode;
        NSMutableDictionary *qaMap=[[NSMutableDictionary alloc] init]; //q's and a's in a map
		
        for (j=0; j<nodeCount; j=j+4) {
            questionNode=[node childAtIndex:j+1];
			answerNode=[node childAtIndex:j+3];
			
			strName = [questionNode stringValue];
            strValue=[answerNode stringValue];
            if(strName && answerNode ){
                [qaMap setValue:strValue forKey: strName];
            }
			
		}
		[questionBank setValue:qaMap forKey:strCategory];
		[qaMap release]; qaMap=nil;
		
	}
	
	NSLog(@"%@",[questionBank description]);	
	
}


- (void)dealloc {
    [super dealloc];
}


@end
