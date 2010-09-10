//
//  SimpleGetTest.m
//  JavaIQ
//
//  Created by sandeep m on 08/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "SimpleGetTest.h"


@implementation SimpleGetTest

-(void) testGet{
	
   // STAssertTrue((1+1)==2, @"Compiler isn't feeling well today :-(" );
	NSError *error;
	NSURLResponse *response;
	NSData *dataReply;
	NSString *stringReply;
	NSString *zipCode=@"IG27eh";
	NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL: [NSURL URLWithString: [NSString stringWithFormat:@"http://weather.yahooapis.com/forecastrss?p=%@", zipCode]]];
	[request setHTTPMethod: @"GET"];
	dataReply = [NSURLConnection sendSynchronousRequest:request returningResponse:&response error:&error];
	stringReply = [[NSString alloc] initWithData:dataReply encoding:NSUTF8StringEncoding];
	NSLog(stringReply);
}


@end
