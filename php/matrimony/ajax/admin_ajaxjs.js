function GetXmlHttpObject() {
	var xmlHttp=null; try { xmlHttp=new XMLHttpRequest(); }
	catch (e) { try { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
	catch (e) {  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");  } } return xmlHttp; }

function alert_browser() {
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!"); return; } }

function Manage_User(url,status,sortby,fdate,todate,sortorder,identity,name,alpha) { 
	alert_browser(); //alert(fdate);
	var verified= '';
	var statusVal=document.getElementById(status).selectedIndex;//alert(status);alert(statusVal);
	var status=document.getElementById(status).options[statusVal].value;//alert(status);
	var sortbyId=document.getElementById(sortby).selectedIndex;
	var sortby=document.getElementById(sortby).options[sortbyId].value;
	var sortorderBy=document.getElementById(sortorder).selectedIndex;
	var sortorder=document.getElementById(sortorder).options[sortorderBy].value;
	searchname=document.getElementById(name).value;
	fromdate=document.getElementById(fdate).value;
	todate=document.getElementById(todate).value;  


	  url=url+"?verified="+verified+"&status="+status+"&sortby="+sortby+"&fdate="+fromdate+"&todate="+todate+"&sortorder="+sortorder+"&identity="+identity+"&searchname="+searchname+"&alpha="+alpha;
	  //alert(url);
	  url=url+"&sid="+Math.random();	//alert(url);
	  xmlHttp.onreadystatechange=UserProfile;
	  xmlHttp.open("GET",url,true); xmlHttp.send(null); }
	  
function ManageFamilyFn(url,sortby,sortorder,identity,name,alpha) {
	alert_browser();
	var verified = "";
	var sortbyId=document.getElementById(sortby).selectedIndex;
	var sortby=document.getElementById(sortby).options[sortbyId].value;
	var sortorderBy=document.getElementById(sortorder).selectedIndex;
	var sortorder=document.getElementById(sortorder).options[sortorderBy].value;
	searchname=document.getElementById(name).value;
	
	  url=url+"?sortby="+sortby+"&sortorder="+sortorder+"&identity="+identity+"&searchname="+searchname+"&alpha="+alpha;
	  //alert(url);
	  url=url+"&sid="+Math.random();	//alert(url);
	  xmlHttp.onreadystatechange=UserProfile;
	  xmlHttp.open("GET",url,true); xmlHttp.send(null); }
	  
	  
	  
function ManageInterestFn(url,sortby,sortorder,identity,name,alpha) {
	alert_browser();
	var verified= '';
	var sortbyId=document.getElementById(sortby).selectedIndex;
	var sortby=document.getElementById(sortby).options[sortbyId].value;
	var sortorderBy=document.getElementById(sortorder).selectedIndex;
	var sortorder=document.getElementById(sortorder).options[sortorderBy].value;
	searchname=document.getElementById(name).value;
	
	  url=url+"?sortby="+sortby+"&sortorder="+sortorder+"&identity="+identity+"&searchname="+searchname+"&alpha="+alpha;
	  //alert(url);
	  url=url+"&sid="+Math.random();	//alert(url);
	  xmlHttp.onreadystatechange=UserProfile;
	  xmlHttp.open("GET",url,true); xmlHttp.send(null); }

function Manage_Message(url,status,sortby,fdate,todate,sortorder,identity,name,alpha) { 
	alert_browser(); //alert(fdate);
	var verified= '';
	var statusVal=document.getElementById(status).selectedIndex;//alert(status);alert(statusVal);
	var status=document.getElementById(status).options[statusVal].value;//alert(status);
	var sortbyId=document.getElementById(sortby).selectedIndex;
	var sortby=document.getElementById(sortby).options[sortbyId].value;
	var sortorderBy=document.getElementById(sortorder).selectedIndex;
	var sortorder=document.getElementById(sortorder).options[sortorderBy].value;
	searchname=document.getElementById(name).value;
	fromdate=document.getElementById(fdate).value;
	todate=document.getElementById(todate).value;  


	  url=url+"?verified="+verified+"&status="+status+"&sortby="+sortby+"&fdate="+fromdate+"&todate="+todate+"&sortorder="+sortorder+"&identity="+identity+"&searchname="+searchname+"&alpha="+alpha;
	  //alert(url);
	  url=url+"&sid="+Math.random();	//alert(url);
	  xmlHttp.onreadystatechange=UserProfile;
	  xmlHttp.open("GET",url,true); xmlHttp.send(null); }

function Manage_Image(url,status,sortby,fdate,todate,sortorder,identity,name,alpha) { 
	alert_browser(); //alert(fdate);
	var verified= '';
	var statusVal=document.getElementById(status).selectedIndex;//alert(status);alert(statusVal);
	var status=document.getElementById(status).options[statusVal].value;//alert(status);
	var sortbyId=document.getElementById(sortby).selectedIndex;
	var sortby=document.getElementById(sortby).options[sortbyId].value;
	var sortorderBy=document.getElementById(sortorder).selectedIndex;
	var sortorder=document.getElementById(sortorder).options[sortorderBy].value;
	searchname=document.getElementById(name).value;
	fromdate=document.getElementById(fdate).value;
	todate=document.getElementById(todate).value;  


	  url=url+"?verified="+verified+"&status="+status+"&sortby="+sortby+"&fdate="+fromdate+"&todate="+todate+"&sortorder="+sortorder+"&identity="+identity+"&searchname="+searchname+"&alpha="+alpha;
	  //alert(url);
	  url=url+"&sid="+Math.random();	//alert(url);
	  xmlHttp.onreadystatechange=UserProfile;
	  xmlHttp.open("GET",url,true); xmlHttp.send(null); }
	  
function Manage_Interest(url,status,sortby,fdate,todate,sortorder,identity,name,alpha) { 
	alert_browser(); //alert(fdate);
	var verified= '';
	var statusVal=document.getElementById(status).selectedIndex;//alert(status);alert(statusVal);
	var status=document.getElementById(status).options[statusVal].value;//alert(status);
	var sortbyId=document.getElementById(sortby).selectedIndex;
	var sortby=document.getElementById(sortby).options[sortbyId].value;
	var sortorderBy=document.getElementById(sortorder).selectedIndex;
	var sortorder=document.getElementById(sortorder).options[sortorderBy].value;
	searchname=document.getElementById(name).value;
	fromdate=document.getElementById(fdate).value;
	todate=document.getElementById(todate).value;  


	  url=url+"?verified="+verified+"&status="+status+"&sortby="+sortby+"&fdate="+fromdate+"&todate="+todate+"&sortorder="+sortorder+"&identity="+identity+"&searchname="+searchname+"&alpha="+alpha;
	  //alert(url);
	  url=url+"&sid="+Math.random();	//alert(url);
	  xmlHttp.onreadystatechange=UserProfile;
	  xmlHttp.open("GET",url,true); xmlHttp.send(null); }

function UserProfile()  { 
	if(xmlHttp.readyState==4) {
		//alert(xmlHttp.responseText);
	  var title = xmlHttp.responseText;  var arr=title;
	  for(i=0;i<arr.split("split").length;i++){
	  number=arr.split("split")[i];
	  if(i==1) { document.getElementById('paginate_response').innerHTML=number; } } }	}

function classified_ajax(URL) {		
	alert_browser();
	var url=URL;
	url=url+"&userverificationid="+1;
	url=url+"&sid="+Math.random();
	alert(url);
	xmlHttp.onreadystatechange=AjaxContent;
	xmlHttp.open("GET",url,true); xmlHttp.send(null); }
	
function AjaxContent() {
	if (xmlHttp.readyState==4) {
	alert(xmlHttp.responseText);
	var title = xmlHttp.responseText;
	var arr=title;
	for(i=0;i<arr.split("split").length;i++){
	number=arr.split("split")[i];
	if(i==1) {  document.getElementById('paginate_response').innerHTML=number; } } } }

function pageeRef1(url) {
	browser_support();
	var val = new Array();
	var url = url+"?sid="+Math.random();
	//alert(url);
	xmlHttp.onreadystatechange = refPage1;
	xmlHttp.open("GET",url,true); 	xmlHttp.send(null); }
function refPage1() { 
   if (xmlHttp.readyState==4) {	
   		img = document.getElementById('imgCaptcha'); 
   		img.src = 'create_image.php?' + Math.random(); } }

function getXmlHttpRequestObject() {
   if (window.XMLHttpRequest) { return new XMLHttpRequest();
   } else if (window.ActiveXObject) { return new ActiveXObject("Microsoft.XMLHTTP"); //IE
   } else {  alert("Your browser doesn't support the XmlHttpRequest object."); }
   } var receiveReq = getXmlHttpRequestObject();

function makeRequest1(url, param) {
   if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
   receiveReq.open("POST", url, true);
   receiveReq.onreadystatechange = updatePage1; 
   receiveReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   receiveReq.setRequestHeader("Content-length", param.length);
   receiveReq.setRequestHeader("Connection", "close");
   receiveReq.send(param);  } 
 }
function updatePage1() {
   if (receiveReq.readyState == 4) {
   if(receiveReq.responseText!="")
   {
   alert(receiveReq.responseText);
   alert("welcome");
   }
   else
   {
	document.frmPost.submit();
   } } }

function getParam1(txtControl) {
   var url = '../captcha.php';
   var postStr = document.getElementById(txtControl).name + "=" + encodeURIComponent( document.getElementById(txtControl).value );
   makeRequest1(url, postStr); 
	}