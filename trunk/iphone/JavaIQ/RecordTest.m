//
//  RecordTest.m
//  JavaIQ
//
//  Created by sandeep m on 08/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "RecordTest.h"


@implementation RecordTest
- (void) testAppDelegate {
    
//    id yourApplicationDelegate = [[UIApplication sharedApplication] delegate];
   // STAssertNotNil(yourApplicationDelegate, @"UIApplication failed to find the AppDelegate");
    
}
- (void) testMath {
    
    STAssertTrue((1+1)==2, @"Compiler isn't feeling well today :-(" );
    NSLog(@"testing math");
	printf("message");
}


@end
