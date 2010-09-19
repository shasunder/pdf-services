Java IQ
=======
about
-----
 Java interview questions (java IQ) will help basic as well as advanced java developers during
 interview preparation. It may very well be used as a guide to revising basic concepts in Java/J2ee.
 
 Features
 The following java and related technologies are covered:
   1. Core Java
   2. J2ee - EJB, JMS, 
   3. Design patterns
   4. Architecture
   5. UML
   TODO:

 Offline capabilities. Can view question/answers when you are travelling as it stores files locally except for updates ofcourse.

The updated question/answer bank is available periodically and can be downloaded from the settings view.

 

-------
Flow of control: 
main.m --> creates UIApplication and UI based on info.plist
           info.plist has MainWindow.xib file to be loaded on startup.
		   Now the MainWindow.xib has the details about how objects are interconnected.
JavaIQAppDelegate.m --> is the delegate for UIApplication(files owner).
		   This loads the RootViewController.m 
RootViewController.m --> loads the top level table data and events are handled here(via DataController).
CategoryViewController --> loads categories for the group eg: categories for core java like basic, threads,etc
QuestionsViewController --> Actually displays the list of questions.
		   

------
TODO:
------
1. Reset should show initial question bank from default database(clear updated files)
3. Create local default questions database
4. Test on real iphone, ipod touch ios 3,4
6. Get developer account created. - in progress
7. Build questions database
8. Improve xml to have ratings and question number (would be useful later for user ratings).

Done
----
2. Ratings based questions display (1,2,3)
5. Create a product website.

Future
------
1. Integrate Advertisement with lite version.
1. Allow users to turn off adverts for premium membership?
2. Enhance web service to allow edit of text files on google app engine.
3. Put default xml in application just as a faile safe feature.
4. Make it ipad compatible
5. Check for new version availability and let users know.



================================================================================
DESCRIPTION:

This application shows how to create a basic drill down interface.

The first screen shows a list of plays. When the user selects a play, the application displays a second screen that shows a list of the main characters and other data about the play. Both screens use a table view. The first list is in the "plain" style to show a standard list; the second is in the grouped style that you can use to lay out detail information.

================================================================================
BUILD REQUIREMENTS:

iOS 4.0 SDK

================================================================================
RUNTIME REQUIREMENTS:

iPhone OS 3.2 or later

================================================================================
PACKAGING LIST:

SimpleDrillDownAppDelegate.{h,m}
Application delegate that configures the root view controller.

RootViewController.{h,m}
Table view controller that sets up the initial table view.

DetailViewController.{h,m}
Table view controller that sets up the detail table view.

DataController.{h,m}
A simple controller class responsible for managing the application's data.

Play.{h,m}
A simple class to represent a play.

main.m
Main source file for this sample.

MainWindow.xib
The xib file containing the application's main window.


================================================================================
CHANGES FROM PREVIOUS VERSIONS:

Version 2.8
- Upgraded project to build with the iOS 4.0 SDK.

Version 2.7
- Upgraded for 3.0 SDK due to deprecated APIs; in "cellForRowAtIndexPath:" it now uses UITableViewCell's initWithStyle.
- Added a Play class to represent a play.

Version 2.6
- Updated project to use nibs.

Version 2.5
- Updated for and tested with iPhone OS 2.0. First public release.
- Moved data controller to a separate object.

Version 2.4
- Updated for Beta 6
- Set detail view to scroll to top without animation on display.

Version 2.3
- Updated for Beta 5
- Changed order of presentation of detail view.

Version 2.1
- Updated for Beta 4
- Adopts the new pattern in the Cocoa Touch List project template.
- The application delegate serves as the controller for the application's data; the root table view controller retrieves data from the application delegate.

Version 2.0
- Updated for Beta 3
- The samples now use nib files and UITableViewController; they also adopt the new pattern for table cell reuse.

================================================================================
Copyright (C) 2008-2010 Apple Inc. All rights reserved.
