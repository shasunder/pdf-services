Java IQ
=======
about
-----
This app is done by a java developer with years of experience for a java enthusiast. The idea is not to just focus on core java but the
surrounding technologies like j2ee, spring, hibernate, Architecture etc which makes more sense from an industrial perspective.

Java IQ holds a database of  Java, J2ee and related technologies like Spring, Hibernate, Struts, Agile ,etc which is helpful for developers as well as java novices.

Features:
1. All the content (including images) can be viewed offline.
2. Well organized collection of question, answers and notes relevant from a java developers perspective.
3. Updates for knowledge base is easily available ( in premium)
4. The app has a setting to choose from basic, intermediate and advanced expertise levels. So an experienced developer will be reading what is relevant for him (currently only for java/j2ee)
5. Exhaustive collection of Java/J2ee and related technologies. More will be added in future.
6. Minimize answers for a quick look at the questions.

It has a knowledge base for following technologies :

1. Core java
	 - Basics, Classes and objects, cloning, collections, exception, GC, Inner class, JDK features, Serialization, Threads
2. J2EE
     - EJB, JDBC, JMS, JSP, Servlets	 
3. Frameworks
     - Struts, Spring, Hibernate
4 Architecture, Design patterns, UML
	- Gang of four patterns(creational, structural,...), J2ee patterns snapshot, JSR spec 168,286,94. SCEA quick notes, SOA, UML
5. Backend technologies
    -SQL, Transaction, more coming soon.
6. Frontend technologies
    - HTML, javascript, AJAX
7. Mock interview questions
	- Sample java interview questions. More to come soon.
	
I have used Java IQ for:
* Quickly revising java/j2ee question and answers
* During interview preparation
* To improve my java and related skills from intermediate to advanced
* Access java knowledge base offline

I hope this application will be useful for people who want to climb up the java ladder as well as those who want to improve their knowledge of java and its relatives.

Future releases will likely include:
* Automatic update of databse
* Loads of new questions with answers and lot more content like JSR specs,etc
* Coming soon - concepts required for a developer environment - UNIX, scripting, build tools -ANT, Maven etc.
* Coming soon - configuring Servers - tomcat, jboss, etc 
* Ability for user to post questions and rate existing ones.

There could be some difference in opinion for few answers.
 We will be happy to hear from you if you have any concerns or if you want to submit a question/note.
Please email us at: service@brig8.com

Disclaimer:
The developer of this application will not be held responsible for any invalid answers/content. 
It is just a guide/reference to understand various java/j2ee and related technologies and intended to help improve and build upon their existing learnings. It does not claim to guarantee job interview success. Common sense says it will boost your confidence during interview preparation.
Some of these questions are hand picked from popular websites and quality checked before putting into our database. All this for the benefit of the community. If you think anything is inappropriate, please give us a shout.

Please email us at: service@brig8.com


 Java interview questions (java IQ) will help basic as well as advanced java developers. 
 It may very well be used as a guide to revising basic concepts in Java/J2ee.
 
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

15.Release a lighter version of the app with ads in category screen as well. (already implemented)	       
12. Set app buy url in constants.h
14. Build and deploy lite and premium versions of the app.
     - Release premium app fro free first. Then release lite version with the buy url for premium app. 
	 make the free app a premium app for a $.



Done
----
1'. Integrate Advertisement with lite version.
1. Reset should show initial question bank from default database(clear updated files)
2. Ratings based questions display (1,2,3)
3. Create local default questions database
5. Create a product website.
6. Get developer account created. - in progress
7. Build questions database
8. Maintain ordering of questions and groups
9. Ensure on update the xml is not corrupted (server error etc)
10. Better logo (most are using current one)
7'- Improve xml to have ratings and question number (qno would be useful later for user ratings).
11. Advertisement
13. Code cleanup 
4. Test on real iphone, ipod touch ios 3,4
7'. Improve questions database. 
     Done core-java, design patterns, j2ee(jsp, servlets)
     	 update image paths to have image/ prefix
	TODO: Architecture, database, frameworks, uml, mock interview, frontend technologies(javascript, html, velocity, jquery)
		Upload pdfs
Future
------

1. Allow users to turn off adverts for premium membership?
2. Enhance web service to allow edit of text files on google app engine.
3. Put default xml in application just as a faile safe feature.
4. Make it ipad compatible
5. Check for new version availability and let users know.
14. Decide on accelerometer 

optional :
a. better navigation buttons
b. update should show loading screen.
c. REset/update should reload the groups in the main view also.
d. Image caching


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
