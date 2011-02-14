//
//  SettingsViewController.m
//  JavaIQ
//
//  Created by sandeep m on 16/09/2010.
//  Copyright 2010 bri. All rights reserved.
//

#import "SettingsViewController.h"
#import "Constants.h"
#import "DataController.h"

@implementation SettingsViewController

@synthesize dataController;
@synthesize addButton;
@synthesize reset;
@synthesize rateButton;
@synthesize accountsTable;
@synthesize rootViewController;
@synthesize pickerView;

UITextField *alertEmailTextField, *alertPasswordTextField;
UITextField *utextfield;
UITextField *ptextfield;
NSMutableArray *website;
NSString *websiteSelected;


- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 1;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
	
    return [[dataController getAccounts] count];
}



- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
	NSLog(@"loading cell");
	static NSString *CellIdentifier = @"CellIdentifier";
	NSArray *accounts = [dataController getAccounts];
	
	UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    
	if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleValue1 reuseIdentifier:CellIdentifier] autorelease];
		cell.selectionStyle = UITableViewCellSelectionStyleNone;
    }
	
	cell.backgroundView.backgroundColor = [UIColor clearColor];    
    cell.textLabel.text = [accounts objectAtIndex:indexPath.row]; 
    cell.textLabel.font = [UIFont fontWithName:FONT_AMERICAN_TYPEWRITER size:16];
	cell.textLabel.textColor = [UIColor blackColor];
	
	return cell;
}


- (void)tableView:(UITableView *)tableView commitEditingStyle:(UITableViewCellEditingStyle)editingStyle forRowAtIndexPath:(NSIndexPath *)indexPath {
    if (editingStyle == UITableViewCellEditingStyleDelete) {
		NSArray *accounts = [dataController getAccounts];
		NSString *key= [accounts objectAtIndex:indexPath.row];
		NSLog(@"Deleting %@ ",key);
		
		[dataController deleteAccount:key];
		
		[tableView deleteRowsAtIndexPaths:[NSArray arrayWithObject:indexPath] withRowAnimation:UITableViewRowAnimationLeft];			
		[rootViewController reloadData];
	}
}



- (void)setEditing:(BOOL)editing animated:(BOOL)animated {
    //[self setEditing:editing animated:animated];
	[super setEditing:editing animated:animated];
    [accountsTable setEditing:editing animated:animated];
}


- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    NSLog(@"%d",indexPath.row);
}

#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	NSString *expertiseStr = [defaults stringForKey: KEY_EXPERTISE];
	NSLog(@"Stored value: %@ for key %@ ",expertiseStr, KEY_EXPERTISE);


	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,50)] autorelease];
	label.textColor = [UIColor blackColor];
	[label setFont:[UIFont fontWithName:@"AmericanTypewriter" size:20]];
	label.text = @"       Settings";
	label.backgroundColor=[UIColor clearColor];
	self.navigationItem.titleView = label;

	
	self.navigationItem.leftBarButtonItem.image = [UIImage imageNamed:@"back_button.png"];
	
	//load website
	website = [dataController getWebsiteList];
	[pickerView selectRow:1 inComponent:0 animated:NO];
	websiteSelected = [website objectAtIndex:1];
	
	
}
-(IBAction)editMode:(id)sender{
	[self setEditing:![accountsTable isEditing]  animated:NO];
}

-(void)reset{
	[accountsTable reloadData];
	NSLog(@"Reset complete");
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    return NO;
}


- (NSInteger)numberOfComponentsInPickerView:(UIPickerView *)pickerView;
{
    return 1;
}

- (void)pickerView:(UIPickerView *)pickerView didSelectRow:(NSInteger)row inComponent:(NSInteger)component
{
    websiteSelected = [website objectAtIndex:row];
	[websiteSelected retain];
}

- (NSInteger)pickerView:(UIPickerView *)pickerView numberOfRowsInComponent:(NSInteger)component;
{
    return [website count];
}

- (NSString *)pickerView:(UIPickerView *)pickerView titleForRow:(NSInteger)row forComponent:(NSInteger)component;
{
    return [website objectAtIndex:row];
}




-(IBAction) addAccount:(id)sender{
	NSLog(@"Adding");
	
	
	UIAlertView *alert = [[UIAlertView alloc] initWithTitle:@"Add account!" message:@"\n \n \n" delegate:self cancelButtonTitle:@"Cancel" otherButtonTitles:@"OK", nil];
	
	// Adds a username Field
	utextfield = [[UITextField alloc] initWithFrame:CGRectMake(12.0, 45.0, 260.0, 25.0)]; utextfield.placeholder = @"Email/ID"; utextfield.text =@"";
	[utextfield setBackgroundColor:[UIColor whiteColor]]; 
	[utextfield setAutocapitalizationType: UITextAutocapitalizationTypeNone];
	[utextfield setAutocorrectionType:UITextAutocorrectionTypeNo ];
	[alert addSubview:utextfield];
	[utextfield becomeFirstResponder];
	
	// Adds a password Field
	ptextfield = [[UITextField alloc] initWithFrame:CGRectMake(12.0, 80.0, 260.0, 25.0)]; ptextfield.placeholder = @"Password";
	[ptextfield setSecureTextEntry:YES];
	[ptextfield setBackgroundColor:[UIColor whiteColor]]; [alert addSubview:ptextfield];
	// Move a little to show up the keyboard
	//CGAffineTransform transform = CGAffineTransformMakeTranslation(0.0, 80.0);
	//[alert setTransform:transform];
		
	[alert show];
	[alert release];
	[utextfield retain];
	[ptextfield retain];
	

}

- (void)alertView:(UIAlertView *)alertView clickedButtonAtIndex:(NSInteger)buttonIndex { 
		NSLog(@"Button clicked %d",buttonIndex);
    if(buttonIndex > 0) { 
		UITextField *textField= utextfield;
		NSString *textValueEmail = textField.text; 

	
		NSString *textValuePwd = ptextfield.text; 
		
		NSLog(@"Adding %d %@ ",buttonIndex,textValueEmail);
		
        if(textValueEmail==nil || textValuePwd ==nil){ 
			return; 
        } else { 
			[dataController addAccount:textValueEmail :textValuePwd : websiteSelected];
			
			[accountsTable reloadData];
			[rootViewController reloadData];
            // do something meaningful with textValue 
        } 
    } 
}  


-(IBAction)rateThisApp:(id)sender{
	NSURL *appStoreUrl = [NSURL URLWithString:APP_RATE_URL];
	[[UIApplication sharedApplication] openURL:appStoreUrl];
	
}

#pragma mark Memory management

- (void)dealloc {
    
    [super dealloc];
}

@end
