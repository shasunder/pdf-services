// .....................Lightbox main coding...................
function getPageScroll(){
	var yScroll;
	if (self.pageYOffset) {
		yScroll = self.pageYOffset;
	} else if (document.documentElement && document.documentElement.scrollTop){
		yScroll = document.documentElement.scrollTop;
	} else if (document.body) {
		yScroll = document.body.scrollTop;
	}
	arrayPageScroll = new Array('',yScroll) 
	return arrayPageScroll;
}

function getPageSize(){
	var xScroll, yScroll;
	if (window.innerHeight && window.scrollMaxY) {	
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else {
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}
	var windowWidth, windowHeight;
	if (self.innerHeight) {
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) {
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) {
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}	
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}
	if(xScroll < windowWidth){	
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}
	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
	return arrayPageSize;
}

function getXMLHTTP(){var xmlhttp=false;	
		try{xmlhttp=new XMLHttpRequest();}
		catch(e){try{xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");}
		catch(e){try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e1){xmlhttp=false;}}}
		return xmlhttp;}
function browser_support(){xmlHttp=getXMLHTTP(); if (xmlHttp==null) { alert("Your browser does not support AJAX!"); return; } }
function trimLeftRightSpaces(obj){strToTrim = obj.value;strTrim = strToTrim.replace(/^(\s*)|(\s*)$/g,"");return(strTrim);}
function isEmpty(obj){isValid = false;if(trimLeftRightSpaces(obj)==""){isValid = true;}return isValid;}
function trimLeftSpaces(obj){strToTrim = obj.value;strTrim = strToTrim.replace(/^(\s*)/g,"");return(strTrim);}

/*state and city function*/
function getLocation(str,country,state,txt,page,action,preload){ 
	var txt = txt;
	if(action == 'city') {
	   strTrim = str.replace(/^(\s*)/g,""); 
	   if(strTrim!=""){ 
	      document.getElementById(preload).style.display ='block';  }
   	      var stateId = document.getElementById(state).value;
	      if(page == 'second'){ var countryId =country;
	      } else {var countryId = document.getElementById(country).value; }
	     var strURL="./templates/findCity.php?country="+countryId+"&state="+stateId+"&q="+str+"&page="+page;	
	   } else if(action == 'editState'){
	         var strURL="./templates/findState.php?country="+country+"&state="+state+"&page="+page; }
		 else if(action == 'state'){
	         var strURL="./templates/findState.php?country="+country+"&page="+page; }
	     else if(action == 'multicity'){
	         var stateId1 = document.getElementById(state).value; 
			 var strURL="./templates/findCity.php?country="+country+"&state="+stateId1+"&page="+page; }
	    var req = getXMLHTTP();
        if (req)  {  req.onreadystatechange = function() { if (req.readyState == 4){				
		    if (req.status == 200)  { if(action == 'city'){
		    document.getElementById(txt).innerHTML=req.responseText;
		    if(document.getElementById(txt).innerHTML!=""){
		    document.getElementById(preload).style.display ='none';}
		  }else{  //alert(req.responseText);
			document.getElementById(txt).innerHTML=req.responseText;}
		 }else{ 
			 alert("There was a problem while using XMLHTTP:\n" + req.statusText); } } }			
         req.open("GET", strURL, true); req.send(null);  }
 }

/*function getLocation(str,country,state,txt,page,action,preload){
	browser_support(); var url="available.php";
	if(ctrl == 'login') { url=url+"?vlogin="+str+"&field="+field+"&table="+table+"&spanId="+spanId; url=url+"&sid="+Math.random(); } 
	else if(ctrl=='email') { url=url+"?vemail="+str+"&field="+field+"&table="+table+"&spanId="+spanId; url=url+"&sid="+Math.random(); } 
	xmlHttp.onreadystatechange=useravail; xmlHttp.open("GET",url,true); xmlHttp.send(null); }

function useravail(){ 
	if(xmlHttp.readyState==4) { var msg=xmlHttp.responseText; msg = msg.split('#',5);
		if(msg[0] == "*Available") { 
			document.getElementById(msg[2]).style.color="green";
			document.getElementById(msg[2]).innerHTML=msg[3]+" is Available";
			document.getElementById(msg[4]).value = msg[0];
		} else {
			document.getElementById(msg[2]).style.color="#ff0000";
			document.getElementById(msg[2]).innerHTML=msg[3]+" is Not Available"; 
		}
	}
}
*/
/*------------------Availability Checking Function---------------*/
function showlogin(str,ctrl,field,table,spanId)
{
	browser_support(); var url="available.php";
	if(ctrl == 'login')
	{ url=url+"?vlogin="+str+"&field="+field+"&table="+table+"&spanId="+spanId; url=url+"&sid="+Math.random(); 
	} 
	else if(ctrl=='email') 
	{ url=url+"?vemail="+str+"&field="+field+"&table="+table+"&spanId="+spanId; url=url+"&sid="+Math.random(); 
	} 
	xmlHttp.onreadystatechange=useravail; xmlHttp.open("GET",url,true); xmlHttp.send(null);
	}

function useravail(){ 
	if(xmlHttp.readyState==4) { var msg=xmlHttp.responseText; msg = msg.split('#',5);
		if(msg[0] == "*Available") { 
			document.getElementById(msg[2]).style.color="green";
			document.getElementById(msg[2]).innerHTML=msg[3]+" is Available";
			document.getElementById(msg[4]).value = msg[0];
		} else {
			document.getElementById(msg[2]).style.color="#ff0000";
			document.getElementById(msg[2]).innerHTML=msg[3]+" is Not Available"; 
		}
	}
}
//............... forgetpassword coding...................

function showmain(str)
{
	browser_support();
	var windowHeight = document.body.offsetHeight;
	document.getElementById('fade').className='black_overlay1';	
	document.getElementById('fade').style.height=windowHeight + 'px';
	if(str=='1'){
		var url="forget.php";
	} else if(str=='2'){
		var url="templates/privacy_light.template.php";
	} else if(str=='3'){
		var url="templates/term_light.template.php";
	}else if(str=='4'){
		var url="templates/tour.template.php";
	}else if(str=='5'){
		var url="./change.php";
	}
	url=url+"?userverificationid="+str;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=usershowmain;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function usershowmain() 
{ 
	if (xmlHttp.readyState==4){
		if(xmlHttp.responseText==""){
			document.getElementById("cpass").innerHTML ="<center><img src='images/preload.gif'></center>";	
		} else {
			document.getElementById("cpass").innerHTML = xmlHttp.responseText;	
		}
		document.getElementById("cpass").style.display='';
		
		var objOverlay = document.getElementById('fade');
		var objLoadingImage = document.getElementById('alignpwd');
		var arrayPageSize = getPageSize();
		var arrayPageScroll = getPageScroll();
		if (objLoadingImage){
			objLoadingImage.style.top = (arrayPageScroll[1] + ((arrayPageSize[3] - 115) / 2) + 'px');//}
		}
		objOverlay.style.height = (arrayPageSize[1] + 'px');
	}
}
/*--Email Validation--*/
function email_validationfp(txt,spanid,msg,field,table)
{	var emailval = document.getElementById(txt).value;	

    if(!email_valfp(emailval,field,table,spanid)) { 
	 	document.getElementById(spanid).innerHTML=msg;
		}	
	if(email_valfp(emailval,field,table,spanid)) { 
	 	document.getElementById(spanid).innerHTML="";  }
	   
}
/*--Email Regular Expression--*/
function email_valfp(emailval,field,table,spanid)
{
  	var RegExp = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,3})(\]?)$/
    if(RegExp.test(emailval)) { showloginfp(emailval,field,table,spanid); return true; } else { return false; }
}

/*--Email Regular Expression onchange--*/
function fp_emailvalid(txt,spanid,msg,field,table)
{	var emailval = document.getElementById(txt).value;	

    if(!fpemail_val(emailval,field,table,spanid)) { 
	 	document.getElementById(spanid).innerHTML=msg;
		}	
	if(fpemail_val(emailval,field,table,spanid)) { 
	 	document.getElementById(spanid).innerHTML="";  }
	   
}
function fpemail_val(emailval,field,table,spanid)
{
  	var RegExp = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,3})(\]?)$/
    if(RegExp.test(emailval)) { return true; } else { return false; }
}

/*------------------Availability Checking Function---------------*/
function showloginfp(str,field,table,spanId){
	browser_support(); var url="available.php";
	url=url+"?vemail="+str+"&field="+field+"&table="+table+"&spanId="+spanId; url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=resshow; xmlHttp.open("GET",url,true); xmlHttp.send(null); }

function resshow(){ 
	if(xmlHttp.readyState==4) { var msg=xmlHttp.responseText; msg = msg.split('#',5);
		if(msg[0] == "*Available") { 
			document.getElementById(msg[2]).style.color="#ff0000";
			document.getElementById(msg[2]).innerHTML="Invalid EmailId..."; 
			return false;
		} else {
			sentmailfp(msg[1]);
			document.getElementById('contentArea').innerHTML="Password has been successfuly sent to your E-Mail Id";
			document.getElementById(msg[4]).value = msg[0];
		}
	}
}

function sentmailfp(str){
	browser_support();  
	var url="forgetMail.php";
	url=url+"?mail="+str+"&eid="+Math.random();
	xmlHttp.onreadystatechange=emailChanged1fp;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function emailChanged1fp() 
{ 
	if (xmlHttp.readyState==4){
	}
}