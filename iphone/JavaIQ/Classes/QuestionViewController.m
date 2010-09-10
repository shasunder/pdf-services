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


@synthesize record;
@synthesize dataController;

- (void)viewWillAppear:(BOOL)animated {
    // Update the view with current data before it is disrecorded.
    [super viewWillAppear:animated];
    
    [self.tableView reloadData];
    [self.tableView setContentOffset:CGPointZero animated:NO];
    self.title = record.question;
}

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    // There are three sections, for date, genre, and characters, in that order.
    return 4;
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    
	/*
	 The number of rows varies by section.
	 */
    NSInteger rows = 0;
    switch (section) {
        case 0:
        case 1:
            // For genre and date there is just one row.
            rows = 1;
            break;
        case 2:
            // For the characters section, there are as many rows as there are characters.
            rows = [record.answer length];
            break;
        default:
            break;
    }
    return rows;
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
	static NSString *CellIdentifier = @"CellIdentifier";
    
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier] autorelease];
        cell.selectionStyle = UITableViewCellSelectionStyleNone;
    }
    
    // Set the text in the cell for the section/row.
    
    NSString *cellText = nil;
    
    switch (indexPath.section) {
        case 0:
            cellText = record.category;
            break;
        case 1:
            cellText = record.question;
            break;
        case 2:
            cellText = record.answer;
            break;
        default:
            break;
    }
    
    cell.textLabel.text = cellText;
    return cell;
}


#pragma mark -
#pragma mark Section header titles

/*
 HIG note: In this case, since the content of each section is obvious, there's probably no need to provide a title, but the code is useful for illustration.
 */
- (NSString *)tableView:(UITableView *)tableView titleForHeaderInSection:(NSInteger)section {
    
    NSString *question = nil;
    switch (section) {
        case 0:
            question = NSLocalizedString(@"Question", @"Question");
            break;
        case 1:
            question = NSLocalizedString(@"Answer", @"Answer for question");
            break;
       
        default:
            break;
    }
    return question;
}



@end
