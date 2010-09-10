//
//  QuestionViewController.m
//  JavaIQ
//
//  Created by sandeep m on 09/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "QuestionViewController.h"
#import "Record.h"

@implementation QuestionViewController

@synthesize dataController;
@synthesize category;

- (void)viewWillAppear:(BOOL)animated {
    // Update the view with current data before it is disrecorded.
    [super viewWillAppear:animated];
    
    [self.tableView reloadData];
    [self.tableView setContentOffset:CGPointZero animated:NO];
    self.title = self.category;
}

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    // There are three sections, for date, genre, and characters, in that order.
    return 4;
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    
	return 10; //TODO:
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
	static NSString *CellIdentifier = @"CellIdentifier";
    
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier] autorelease];
        cell.selectionStyle = UITableViewCellSelectionStyleNone;
    }
    
    // Set the text in the cell for the section/row.
    
    NSString *cellText = @"TODO : load question answers";
    
        
    cell.textLabel.text = cellText;
    return cell;
}

#pragma mark Section header titles

- (NSString *)tableView:(UITableView *)tableView titleForHeaderInSection:(NSInteger)section {
    
	return category;
}



@end
