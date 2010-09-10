//
//  QuestionViewController.h
//  JavaIQ
//
//  Created by sandeep m on 09/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
@class Record;
@class DataController;

@interface QuestionViewController :UITableViewController {
	Record *record;
	DataController *dataController;
}

@property (nonatomic, retain) DataController *dataController;

@property (nonatomic, retain) Record *record;

@end
