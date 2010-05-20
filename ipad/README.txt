Pdf services application
=====================================
Project start date: 19-may-2010

About: 
	A RESTful web application to provide pdf services.

Technology stack :
	1. maven 2 project
	2. tuckey urlrewrite
	3. Spring MVC for web tier 
	4. Spring core for service tier and for DAO tier JDBC( using stored procedure abstractions of spring).
	Note: The beans are autowired hence no extra xml configuration is necessary(annotations are used instead).

Details:
========
Web tier:
	1. urlrewrite filter configured in web.xml intercepts the request and applies the pattern to rewrite the URL
	as configured in urlrewrite.xml.
	
	2. The URL rewritten by the filter is next handled by the springs DispatcherServlet configured in web.xml.
	The annotated and spring managed controller has the service dependency injected automatically. 
	
	Configuration files: a. src/main/webapp/WEB-INF/web.xml              >>  web application descriptor.
	       		     b. src/main/webapp/WEB-INF/urlrewrite.xml       >>  Holds the rewrite rules 
	       		     c. src/main/webapp/WEB-INF/context-service.xml  >>  Has the spring annotation and auto wiring configurations 
	       
Service and DAO tier:
	The controller delegates the request to the PdfService which handles any business logic before passing it over to data access object(DAO).
	DAO handles the create, read, update , delete (CRUD) operations
 
Building this project:
	$> cd [PATH TO MODULE]/pdf-service
	$> mvn clean install
	This creates a war under ./target folder. 

REST Urls:
	GET    : http://[HOST]:[PORT]/pdf2image/{id}       
	            
	POST   : http://[HOST]:[PORT]/pdf2image/
	PUT    : http://[HOST]:[PORT]/pdf2image/{id} --> for update
	DELETE : http://[HOST]:[PORT]/pdf2image/{id} 


More details:
============
Pdfbox library is used to convert pdf to iZine format. 