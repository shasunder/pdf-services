//
//  QuestionViewController.h
//  JavaIQ
//
//  Created by sandeep m on 09/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
@class DataController;

@interface QuestionViewController :UITableViewController {
	DataController *dataController;
	NSString *category;
}

@property (nonatomic, retain) DataController *dataController;

@property (nonatomic, retain) NSString *category;


@end
