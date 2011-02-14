//
//  SettingsAdvanced.m
//  Login
//
//  Created by sandeep m on 22/01/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "SettingsAdvancedViewController.h"
#import "Constants.h"
#import "DataController.h"

@implementation SettingsAdvancedViewController

@synthesize dataController;
@synthesize addButton;
@synthesize reset;
@synthesize websiteDetailsTable;
@synthesize rootViewController;
@synthesize pickerView;
@synthesize note;
@synthesize settingsViewController;

UITextField *alertEmailTextField, *alertPasswordTextField;
UITextField *loginUrlTextField;
UITextField *websiteKey;
UITextField *loginFields;

NSMutableArray *website;
NSString *websiteSelected;


- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 1;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    return [[dataController getWebsiteList] count];
}



- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
	NSLog(@"loading cell");
	static NSString *CellIdentifier = @"CellIdentifier";
	NSArray *websiteDetails = [dataController getWebsiteList];
	
	UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    
	if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleValue1 reuseIdentifier:CellIdentifier] autorelease];
		cell.selectionStyle = UITableViewCellSelectionStyleNone;
    }
	
	cell.backgroundView.backgroundColor = [UIColor clearColor];    
    cell.textLabel.text = [websiteDetails objectAtIndex:indexPath.row]; 
    cell.textLabel.font = [UIFont fontWithName:FONT_AMERICAN_TYPEWRITER size:16];
	cell.textLabel.textColor = [UIColor blackColor];
	
	return cell;
}


- (void)tableView:(UITableView *)tableView commitEditingStyle:(UITableViewCellEditingStyle)editingStyle forRowAtIndexPath:(NSIndexPath *)indexPath {
    if (editingStyle == UITableViewCellEditingStyleDelete) {
		NSArray *websiteDetails = [dataController getWebsiteList];
		NSString *key= [websiteDetails objectAtIndex:indexPath.row];
		NSLog(@"Deleting %@ ",key);
		
		[dataController removeWebsiteToken:key ];
		
		[tableView deleteRowsAtIndexPaths:[NSArray arrayWithObject:indexPath] withRowAnimation:UITableViewRowAnimationLeft];			
		[settingsViewController reset];
		[dataController commitWebsites];
		[rootViewController reloadData];
	}
}



- (void)setEditing:(BOOL)editing animated:(BOOL)animated {
    //[self setEditing:editing animated:animated];
	[super setEditing:editing animated:animated];
    [websiteDetailsTable setEditing:editing animated:animated];
}


- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    NSLog(@"%d",indexPath.row);
}

#pragma mark View lifecycle

- (void)viewDidLoad {
    [super viewDidLoad];
	note.lineBreakMode = UILineBreakModeWordWrap;
	note.numberOfLines = 0;
	//[websiteDetails setObject:@"http://signin.mobileweb.ebay.com/login|||https://signin.mobileweb.ebay.com/logout|||userName:pass:FormContainer" forKey:@"Ebay"];
	
	note.adjustsFontSizeToFitWidth = YES;
	note.minimumFontSize = 6.0;
	note.font = [UIFont systemFontOfSize:9.0];
	//note.
	note.text =@"*** Important *** : Pls modify only if you are a web developer and know what you are doing. Restart app on adding a website. You can add a new website if you have HTML knowledge. It is important to maintain the order of HTML field ID/Name separated  by : separator as [userInputField]:[pwdInputField]:[htmlFormName] and HTTP urls with ||| separator.  eg: Website Name = Ebay \nHTTP [login URL]|||[Logout URL] = http://signin.mobileweb.ebay.com/login|||https://signin.mobileweb.ebay.com/logout \n HTML field = userName:pass:FormContainer ";
	
	
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	NSString *expertiseStr = [defaults stringForKey: KEY_EXPERTISE];
	NSLog(@"Stored value: %@ for key %@ ",expertiseStr, KEY_EXPERTISE);
	
	
	UILabel * label = [[[UILabel alloc] initWithFrame:CGRectMake(0,0,185,50)] autorelease];
	label.textColor = [UIColor blackColor];
	[label setFont:[UIFont fontWithName:@"AmericanTypewriter" size:20]];
	label.text = @" Advanced Settings";
	label.backgroundColor=[UIColor clearColor];
	self.navigationItem.titleView = label;
	
	
	self.navigationItem.leftBarButtonItem.image = [UIImage imageNamed:@"back_button.png"];
	
	//load website
	website = [dataController getWebsiteList];
	[pickerView selectRow:1 inComponent:0 animated:NO];
	websiteSelected = [website objectAtIndex:1];
	
	
}
-(IBAction)editMode:(id)sender{
	[self setEditing:![websiteDetailsTable isEditing]  animated:NO];
}

-(IBAction)reset:(id)sender{
	[dataController store:KEY_WEBSITE_DETAILS :nil];
	[websiteDetailsTable reloadData];
	[rootViewController reloadData];
	[settingsViewController reset];
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




-(IBAction) addWebsiteDetails:(id)sender{
	NSLog(@"Adding");
	
	
	UIAlertView *alert = [[UIAlertView alloc] initWithTitle:@"Add website!" message:@"\n \n \n" delegate:self cancelButtonTitle:@"Cancel" otherButtonTitles:@"OK", nil];
	
	float yPadding=40;
	
	//websitekey
	websiteKey = [[UITextField alloc] initWithFrame:CGRectMake(12.0, 40.0, 260.0, 25.0)]; websiteKey.placeholder = @"Website name/label";
	[websiteKey setBackgroundColor:[UIColor whiteColor]];
	[websiteKey setAutocapitalizationType: UITextAutocapitalizationTypeNone];
	[websiteKey setAutocorrectionType:UITextAutocorrectionTypeNo ];
	[alert addSubview:websiteKey];
	[websiteKey becomeFirstResponder];
	
	// login url
	loginUrlTextField = [[UITextField alloc] initWithFrame:CGRectMake(12.0, 45.0+yPadding, 260.0, 25.0)]; loginUrlTextField.placeholder = @"HTTP [login URL]|||[Logout URL]"; 
	[loginUrlTextField setBackgroundColor:[UIColor whiteColor]]; 
	[loginUrlTextField setAutocapitalizationType: UITextAutocapitalizationTypeNone];
	[loginUrlTextField setAutocorrectionType:UITextAutocorrectionTypeNo ];
	[alert addSubview:loginUrlTextField];
	
	
	
	
	// login field
	loginFields = [[UITextField alloc] initWithFrame:CGRectMake(12.0, 40.0 + yPadding * 2, 260.0, 25.0)]; loginFields.placeholder = @"HTML LoginID:PwdID:FormID";
	[loginFields setBackgroundColor:[UIColor whiteColor]]; 
	[loginFields setAutocapitalizationType: UITextAutocapitalizationTypeNone];
	[loginFields setAutocorrectionType:UITextAutocorrectionTypeNo ];
	[alert addSubview:loginFields];
	
		
	// Move a little to show up the keyboard
	CGAffineTransform transform = CGAffineTransformMakeTranslation(0.0, 40.0);
	[alert setTransform:transform];
	
	[alert show];
	//alert.frame= CGRectMake(0,0,300,300);
	[alert release];
	[loginUrlTextField retain];
	[websiteKey retain];
	
	
}

- (void)alertView:(UIAlertView *)alertView clickedButtonAtIndex:(NSInteger)buttonIndex { 
	NSLog(@"Button clicked %d",buttonIndex);
    if(buttonIndex > 0) { 
	
		NSString *textValueLoginUrl = loginUrlTextField.text; 
		NSString *website = websiteKey.text;
		
		NSString *textValueFields = loginFields.text; 
		
		NSLog(@"Adding %d %@ ",buttonIndex,textValueLoginUrl);
		
        if(textValueLoginUrl== nil || website ==nil || textValueFields ==nil){ 
			return; 
        } else { 
			NSString *encoded=[NSString stringWithFormat:@"%@|||%@",textValueLoginUrl, textValueFields];
			[dataController setWebsiteTokens:encoded:website];
			
			[websiteDetailsTable reloadData];
			[rootViewController reloadData];
			[settingsViewController reset];
			
            // do something meaningful with textValue 
        } 
    } 
}  

#pragma mark Memory management

- (void)dealloc {
    
    [super dealloc];
}

@end
