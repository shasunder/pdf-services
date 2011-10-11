var isIE  = (navigator.appVersion.indexOf("MSIE") != -1) ? true : false;
var isWin = (navigator.appVersion.toLowerCase().indexOf("win") != -1) ? true : false;
var isOpera = (navigator.userAgent.indexOf("Opera") != -1) ? true : false;
/*------------------------Textbox Empty Validation----------------------------*/
function txt_empty(txtControl,errControl,msg){ 
	if(document.getElementById(txtControl).value == ""){
		document.getElementById(errControl).innerHTML = msg;
	}else{
		document.getElementById(errControl).innerHTML = "";
	}
}
/*--------------------------Selectbox Empty Validation-------------------------*/
function ddlEmptyChk(ddlControl,errControl,msg){
	if(document.getElementById(ddlControl).selectedIndex == 0){
		document.getElementById(errControl).innerHTML = msg;	
	}
}
function ddlClear(ddlControl,errControl){
	if(document.getElementById(ddlControl).selectedIndex != 0){
		document.getElementById(errControl).innerHTML = "";
	}	
}
/*--------------------------Multi Selectbox Empty Validation-------------------------*/
function ddlEmptyChkmulti(ddlControl,errControl,msg){
	if(document.getElementById(ddlControl).selectedIndex == -1){
		document.getElementById(errControl).innerHTML = msg;	
	}
}
function ddlClearmulti(ddlControl,errControl){
	if(document.getElementById(ddlControl).selectedIndex != -1){
		document.getElementById(errControl).innerHTML = "";
	}	
}
/*--------------------------Character Limit Check Validation--------------------*/
function valid_chk(txtControl,errControl,minval,maxval,msg)
{

	if(((document.getElementById(txtControl).value).length<minval) || ((document.getElementById(txtControl).value).length>maxval))	
	{
		document.getElementById(errControl).innerHTML = msg;	
	} else {
		document.getElementById(errControl).innerHTML = "";	
	}
}
/*------------------------Validation for from and to age-------------------------*/
function val_Age(txtControl1,txtControl2,msgControl,msg,msg1)
{
 	txt1 = document.getElementById(txtControl1);
	txt2 = document.getElementById(txtControl2);
	maxage=parseInt(txt1.value)+22;
	if(txt1.value>=txt2.value) {
	document.getElementById(msgControl).innerHTML=msg;
	return false; }
	else if((txt1.value<18)||(txt2.value<21)) {	
    document.getElementById(msgControl).innerHTML=msg;
	return false; }
	else if(txt2.value>=maxage)	{
    document.getElementById(msgControl).innerHTML=msg1;
	return false; }		
	else {
	document.getElementById(msgControl).innerHTML="";
	return true; }
}
/*----------------------------Character Allow Validation-------------------------*/
function char_val(txtCtrl,chkval)
  {
  	var v = chkval;
    var w = "";
    for (i=0; i < txtCtrl.value.length; i++) {
        x = txtCtrl.value.charAt(i);
        if (v.indexOf(x,0) != -1)
        w += x; }
    txtCtrl.value = w;
 } 
/*----------------------------URL Validation------------------------*/
function val_url(txt,spanid,msg)
{
    var url = document.getElementById(txt).value;
    if(url.length==0) {
		document.getElementById(spanid).innerHTML=""; }
    if((!isValidURL(url))&&(url.length!=0)) {
     	document.getElementById(spanid).innerHTML="";
  	 	document.getElementById(spanid).innerHTML=msg; }
	if(isValidURL(url)) {
		document.getElementById(spanid).innerHTML=""; }
    return true;   
}
/*-----------------------------------URL Regular Expression--------------------------*/
function isValidURL(url){
 var RegExp = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/;
    if(RegExp.test(url)){
        return true; }
	else { return false; }
}
/*--Email Validation--*/
function email_validation(txt,spanid,msg,field,table)
{	var emailval = document.getElementById(txt).value;	

    if(!email_val(emailval,field,table,spanid)) { 
	 	document.getElementById(spanid).innerHTML=msg;
		}	
	if(email_val(emailval,field,table,spanid)) { 
	 	document.getElementById(spanid).innerHTML="";  }
	   
}
/*--Email Regular Expression--*/
function email_val(emailval,field,table,spanid)
{
  	var RegExp = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,3})(\]?)$/
    if(RegExp.test(emailval)) { showlogin(emailval,'email',field,table,spanid); return true; } else { return false; }
}
/*------------------------------------Password Check Validation----------------------------*/
function checkpass(pass,cpass,errpass,errcon,msgpass,msgcon,checkconmsg)
{
	if(document.getElementById(pass).value=='' && document.getElementById(cpass).value=='')
	{
		document.getElementById(errpass).innerHTML=msgpass;
		document.getElementById(errcon).innerHTML=msgcon;
		document.getElementById(pass).focus();
		return false;

	}
	else if(document.getElementById(pass).value!='' && document.getElementById(cpass).value=='')
	{
		document.getElementById(errpass).innerHTML="";
		document.getElementById(errcon).innerHTML=msgcon;
		document.getElementById(cpass).focus();
		return false;
	}
	else if(document.getElementById(pass).value!=document.getElementById(cpass).value) {
		document.getElementById(errcon).innerHTML=checkconmsg; 
		document.getElementById(cpass).focus();
		return false;
		} 
	else { document.getElementById(errcon).innerHTML=""; }
}

function checkpasss(pass,cpass,errControl,msg)
{
	if(document.getElementById(pass).value!=document.getElementById(cpass).value) {
		document.getElementById(errControl).innerHTML=msg; } 
	else { document.getElementById(errControl).innerHTML=""; }
}
/*-------------------------------------------Trim Function----------------------------------*/
function trim1(sStr)
{
   var s;
   sStr = sStr.toString();
   sStr = sStr.replace(/(^\s*)|(\s*$)/g,"");
   return(sStr);
}/*---- Regular expression functions for clearing the spaces ----*/

/*----------------------------------Change First Letter Caps Function------------------------*/
function capWords(ctrl) {
	var inputString = document.getElementById(ctrl) // The input text field
	var tmpStr, tmpChar, preString, postString, strlen;
	tmpStr = inputString.value;
	stringLen = tmpStr.length;
	if (stringLen > 0) {
	for (i = 0; i < stringLen; i++) {
	if (i == 0) {
	tmpChar = tmpStr.substring(0,1).toUpperCase();
	postString = tmpStr.substring(1,stringLen);
	tmpStr = tmpChar + postString;
	document.getElementById(ctrl).value=tmpStr;	}
	else { tmpChar = tmpStr.substring(i,i+1);
	if (tmpChar == " " && i < (stringLen-1)) {
	tmpChar = tmpStr.substring(i+1,i+2).toUpperCase();
	preString = tmpStr.substring(0,i+1);
	postString = tmpStr.substring(i+2,stringLen);
	tmpStr = preString + tmpChar + postString; } } } }
}
/*..................day month year..................................*/
function Day_onchange(change,yearName,monthName,dayName)
{	
	var yearSelect =document.getElementById(yearName);
	var monthSelect = document.getElementById(monthName);
	var daySelect = document.getElementById(dayName);
	var year = yearSelect[yearSelect.selectedIndex].value;
	var month = monthSelect[monthSelect.selectedIndex].value;
	var day = daySelect[daySelect.selectedIndex].value;
if (month>0) {
	if (change == 'm' || (change == 'y' && month == 2))	{
	var i = 31;
	var flag = true;
	while(flag)	{ var date = new Date(year,month-1,i);
	if (date.getMonth() == month - 1) { flag = false; }
    else { i = i - 1; } }
	daySelect.length = 0;
	daySelect.length = i;
	var j = 0;
	while(j < i) { daySelect[j] = new Option(j+1,j+1); 	j = j + 1; 	}
	if (day <= i) { daySelect.selectedIndex = day-1; }
	else { daySelect.selectedIndex = daySelect.length - 1; } } }
if(document.getElementById(dayName).selectedIndex==-1) {
document.getElementById(dayName).selectedIndex=0; }
}
/*..........................checkbox validation..................*/
function val_checkbox(spanid,msg)
{
if(document.regMain.checkAgree.checked==false) {
document.getElementById(spanid).innerHTML=msg;
return false; }
else { 
document.getElementById(spanid).innerHTML="";
return true; }
}
/* .................radio button validation.........................*/
function val_radio(radControl,msgControl,msg)
{ if(radControl.checked==false)
	{ document.getElementById(msgControl).innerHTML=msg; radControl.focus; }
	else { document.getElementById(msgControl).innerHTML=""; return true; } }
/*.......................get the single hidden text value...................................*/
function gethdValue(value,hidden)
{   
//alert(value); 
//alert(hidden); 
var ddlControl2=document.getElementById(value);  /*alert(ddlControl2.selectedIndex);*/
var hiddenValue=ddlControl2.options[ddlControl2.selectedIndex].text;
//alert(ddlControl2);
document.getElementById(hidden).value = hiddenValue;
}
function dob(date,month,year,hidden)
{
	dateVal= year+"-"+month+"-"+date;
	document.getElementById(hidden).value=dateVal;
}
/*..................................Radio Button Hidden Value.................................*/
function radioVal(hidden,radioId)
{ //alert(radioId); 
document.getElementById(hidden).value=radioId;
/*if(action == 'bodyType') {
var elements=document.editProfile.rbody; }
if(action == 'Complexion') { 
var elements=document.editProfile.radiocomp; }
if(action == 'Manglik') { 
var elements=document.editProfile.riodosham; }
if(action == 'food') { 
var elements=document.editProfile.radfood; }
if(action == 'Smoking') { 
var elements=document.editProfile.radsmoke; }
if(action == 'Liquor') { 
var elements=document.editProfile.radliquor; }
if(action == 'partnerFood') { 
var elements=document.editProfile.foodPartner; }
if(action == 'Chevaai') { 
var elements=document.editProfile.pChevaai; }
for(k=0;k<elements.length;k++) { alert(document.editProfile.elements[k].type);
if(document.editProfile.elements[k].type=='radio') { 
	if(document.editProfile.elements[k].checked==true) {
		//alert(document.editProfile.elements[k].value = rValue);
	document.editProfile.elements[k].value = rValue;
	document.getElementById(hidden).value = rValue;	} } }*/
}
/*.............get multy valuesto hidden.............*/	
function TXTEnable(passtxtValue) {
	var ValuetxtString=passtxtValue;
	for(i=0;i<ValuetxtString.split("|").length;i++){
	document.getElementById(ValuetxtString.split("|")[i].toString()).disabled=false;  } }
function DISStylenone(passValue) {
	var ValueString=passValue;
	for(i=0;i<ValueString.split("|").length;i++) {
	document.getElementById(ValueString.split("|")[i].toString()).style.display='none'; } }

function DISStyle(passValue) {	
	var ValueString=passValue;
	for(i=0;i<ValueString.split("|").length;i++){
	document.getElementById(ValueString.split("|")[i].toString()).style.display=''; } }
function checkSelected(obj)
{ 
	/*if(obj.options[obj.selectedIndex].value == 0 )
		return false;
	else
	return true;*/
//return (obj.options[obj.selectedIndex].value == 0 ) ? false : true;
return (obj.selectedIndex <= 0  ) ? false : true;
}
function checkText(obj)
{
	if(obj.value == "") {
		return false;
	} else
	return true;
}
function gethdmulti(ddlctrl,hdtxt)
{
	var i;
  	var count = 0;
    var selectedArray = new Array();
    var selObj=document.getElementById(ddlctrl);
    for (i=0;i<selObj.options.length;i++){
    if (selObj.options[i].selected){ selectedArray[count] = selObj.options[i].text; count++; } }
	document.getElementById(hdtxt).value=selectedArray;
}
function hidden(ddlRole1,ddlvalue)
{     
      document.getElementById(ddlvalue).value="";
	  ddl=document.getElementById(ddlRole1);	
	  for (i =0;i < ddl.options.length;i++) {
	  ddl.options[i].selected =false; }
      var ddlout=document.getElementById(ddlRole1).length;
	  for(var i=0;i<ddlout;i++){
	  var nameValue=document.getElementById(ddlRole1).options[i].text;
	  if(document.getElementById(ddlvalue).value=="")	{
	  document.getElementById(ddlvalue).value=nameValue; }
	  else 	{ document.getElementById(ddlvalue).value=document.getElementById(ddlvalue).value+","+nameValue; } }
}
function ddl_enable(marital,children,childerror,live,noneLine)
{
	var marital=document.getElementById(marital);
	var marital1=marital.options[marital.selectedIndex].text;
	if((marital1=='Divorced') || (marital1=='Separated') || (marital1=='Married') || (marital1=='Widow/Widower') ){
		document.getElementById(children).disabled=false;
		document.getElementById(children).selectedIndex=0;
		document.getElementById(live).disabled=true;
		document.getElementById(noneLine).disabled=true;
		document.getElementById(live).checked=false;
		document.getElementById(noneLine).checked=false;}
	else{
		document.getElementById(children).disabled=true;
		document.getElementById(children).selectedIndex=0;
		document.getElementById(childerror).innerHTML="";
		document.getElementById(live).disabled=true;
		document.getElementById(noneLine).disabled=true;
		document.getElementById(live).checked=false;
		document.getElementById(noneLine).checked=false;}
}
function ddl_enable1(ddlocc,ddlemp,ddlin,txtctrl,typeError,incomeErr)
{
	var marital=document.getElementById(ddlocc);
	var marital1=marital.options[marital.selectedIndex].text;
	if((marital1== "Unable to Work") || (marital1=='Not Working')|| (marital1=='Looking For Job')) {
		document.getElementById(ddlemp).disabled=true;document.getElementById(ddlin).disabled=true;
		document.getElementById(txtctrl).disabled=true;
		document.getElementById(ddlemp).selectedIndex=0;
		document.getElementById(ddlin).selectedIndex=0;
		document.getElementById(txtctrl).value ="";
			if((document.getElementById(ddlemp).disabled=true)&&(document.getElementById(ddlin).disabled=true)){
			document.getElementById(typeError).innerHTML="";
			document.getElementById(incomeErr).innerHTML="";
		}
	}
	else{
		document.getElementById(ddlemp).disabled=false;
		document.getElementById(ddlin).disabled=false;
		}
}
function ddl_enablefun(ddlcontrol,txtcontrol)
{
	var incomeval=ddlcontrol.options[ddlcontrol.selectedIndex].text;
	if((incomeval=='- Select -')){document.getElementById(txtcontrol).disabled=true;}
	else{document.getElementById(txtcontrol).disabled=false;}}
function Edu(ddlcat,ddledu,qualErr)
{
	var education=document.getElementById(ddlcat);
	var education1=education.options[education.selectedIndex].text;
	if((education1== "Uneducated"))
	{
		document.getElementById(ddledu).disabled=true;
		document.getElementById(qualErr).innerHTML="";
	}
	else
	{
		document.getElementById(ddledu).disabled=false;
	}
}
	
function rad_enable(children,live,noneLive)
{var children=document.getElementById(children);var children1=children.options[children.selectedIndex].text;
	if((children1=='1') || (children1=='2') || (children1=='3') || (children1=='4') || (children1=='5') || (children1=='5+')){
	document.getElementById(live).disabled=false;document.getElementById(noneLive).disabled=false;}
	else{
		document.getElementById(live).disabled=true;
		document.getElementById(noneLive).disabled=true;
		document.getElementById(live).checked=false;
		document.getElementById(noneLive).checked=false;}}
function ddl_disable(ddlreligion,ddlcommunity,ddlcommunityError)
{
	var religion=document.getElementById(ddlreligion);
	var religion1=religion.options[religion.selectedIndex].text;
	if((religion1=='Chinese Folks') || (religion1=='Confucianist') || (religion1=='Ethnoreligionist') || (religion1=='Neoreligionist') || (religion1=='Spiritist') || (religion1=='Atheist') || (religion1=='Others') || (religion1=="Baha'is")||(religion1=='No Religion')||(religion1=='Inter-Religion'))
	{
		document.getElementById(ddlcommunity).disabled=true;
		document.getElementById(ddlcommunityError).innerHTML="";
	}
	else
	{
		document.getElementById(ddlcommunity).disabled=false;
	}
}
function gender_year(ddlYear,limit,value)
{
	
	var today=new Date()
	var ddlyear=document.getElementById(ddlYear)
	var thisyear=today.getFullYear()
	year=thisyear-limit;
/*	alert(year);
	Eyear=year-value;
	alert(Eyear);*/	
	for (var y=value; y>=1; y--)
	{
		ddlyear.options[y]=new Option(year, year)
		ddlyear.options[y]=new Option(year);
		ddlyear.options[y].value=year;
		year-=1
	}
}
/*Age  calculation in regis form*/
function Age(date,month,year,txtage,ageError)
{
	var bday=parseInt(document.getElementById(date).value);
	var bmo=(parseInt(document.getElementById(month).value)-1);
	var byr=parseInt(document.getElementById(year).value);
	var byr;
	var age;
	var now = new Date();
	tday=now.getDate();
	tmo=(now.getMonth());
	tyr=(now.getFullYear());
	if((tmo > bmo)||(tmo==bmo & tday>=bday))
	{
		age=byr
	}
	else
	{
		age=byr+1;
	}
	var byr1=document.getElementById(year).value;
	age1=tyr-age;
	document.getElementById(txtage).value=age1;
	document.getElementById(ageError).innerHTML="";
}

function val_text1(txtcontrol1,txtcontrol2,span,msg,m)
{
	
	var txt1=document.getElementById(txtcontrol1).value;
	var txt2=document.getElementById(txtcontrol2).value;
	if(txt1=="") {
	document.getElementById(span).innerHTML="Please enter No of "+msg+" "+m; }
	if(txt1>7) {
	document.getElementById(span).innerHTML="No Of "+msg+" "+m+" should be 1-7"; }
	else if(txt1>txt2) {
	document.getElementById(span).innerHTML="Check No Of "+msg;	}
	else {	document.getElementById(span).innerHTML="";	} 
}
function check_currency(ddl,span,msg)
{
		if((document.getElementById(ddl).selectedIndex == 0) || (document.getElementById(ddl).selectedIndex == 7)) {
		document.getElementById(span).innerHTML = "Please select the "+msg;	}
		else {
		document.getElementById(span).innerHTML =""; }
}
function currency_error(txt,span)
{		if((document.getElementById(txt).disabled==false)&&(document.getElementById(txt).value=="")) {
		document.getElementById(span).innerHTML = "Please enter the Amount"; }
}
/*.......................setcolor...................................*/
function setcolor(divid)
{
	document.getElementById(divid).style.backgroundColor='#f7f7f7';
}
/*........................removecolor.............................*/
function removecolor(divid) 
{
	document.getElementById(divid).style.backgroundColor='#ffffff';
}
/*..............Div enable and disable function..................-*/
function div_tab(div_id,len,divv) {	
	for(i=1; i<=len; i++){
		divid = div_id.concat(i);
		if(i == divv) {	 document.getElementById(divid).style.display = ''; }
		else { document.getElementById(divid).style.display = 'none'; }	} }
/*........Remove Function.........*/
function RemoveOption(ddlTo,dllFrom)
{
	var theSelFrom=document.getElementById(dllFrom);
    var theSelTo=document.getElementById(ddlTo);
	var selLength=theSelFrom.length;
	var selectedText=new Array();
	var selectedValues=new Array();
	var selectedCount=0;
	var i;
	for(i=selLength-1; i>=0; i--){
		if(theSelFrom.options[i].selected){
			selectedText[selectedCount]=theSelFrom.options[i].text;
			selectedValues[selectedCount]=theSelFrom.options[i].value;
			deleteOption(theSelFrom, i);
			selectedCount++;
		}
	}
	function deleteOption(theSel, theIndex){	
	var selLength=theSel.length;
	if(selLength>0)	{
		theSel.options[theIndex]=null;
	}
	}
}
/*.............Add Function.............*/	
function addOptions(dllFrom,ddlTo){ 
	var theSelFrom=document.getElementById(dllFrom);
    var theSelTo=document.getElementById(ddlTo);
	var selLength=theSelFrom.length;
	var selectedText=new Array();
	var selectedValues=new Array();
	var selectedCount=0;
	var cou1=1;
	var adflag=0;
	var i;
	
	for(i=selLength-1; i>=0; i--){
	if(theSelFrom.options[i].selected){
	for(j=0;j<theSelTo.length;j++){
	cou1=1;	
	if(theSelTo.options[j].text==theSelFrom.options[i].text){cou1=0}}
	if (cou1==1) {
	selectedText[selectedCount]=theSelFrom.options[i].text;	
	selectedValues[selectedCount]=theSelFrom.options[i].value;
	selectedCount++;
	}}}
	if (theSelTo.length>0){
	for(i=selectedCount-1; i>=0; i--){	
	adflag=0;
	for (j=0;j<theSelTo.length;j++)	{
	if(selectedText[i]==theSelTo.options[j].text && adflag==0){adflag=1}}
    if(adflag==0){addOption(theSelTo, selectedText[i], selectedValues[i]);}}}
	else{
		for(i=selectedCount-1; i>=0; i--){ addOption(theSelTo, selectedText[i], selectedValues[i]);}	
	}
 }
function addOption(theSel, theText, theValue){
	var newOpt=new Option(theText, theValue);
	var selLength=theSel.length;
	if(theText!='Select')
	{
		theSel.options[selLength]=newOpt;
	}
}
/*........search age disply regards gender.........*/
function gen(rad,t1,t2,val1,val2){
  if(document.getElementById(rad).checked="true"){
       document.getElementById(t1).value=val1;
	   document.getElementById(t2).value=val2;
   }
}
function selVal(values,hidden){	document.getElementById(hidden).value=values; }

function show_placediv(divid,divid1){
	document.getElementById(divid).style.display='block';
	document.getElementById(divid1).style.display='block';
}
function hide_placediv(divid,divid1){
	document.getElementById(divid).style.display='none';
	document.getElementById(divid1).style.display='none';
}
//image disp
function image_display(divid){	
	var id=divid;
	document.getElementById('divloader').style.display='block';
	document.getElementById('divloader').innerHTML="<img src='./images/loading-icon.gif' width='25' height='25' />";
	document.getElementById('div_disp').src=id;
	document.getElementById('divloader').style.display='none';
}
//tour display 
function tour_display(t1,t2,t3,t4,t5,t6,t7,t8){
	document.getElementById(t1).style.display='';
	document.getElementById(t2).style.display='none';
	document.getElementById(t3).style.display='none';
	document.getElementById(t4).style.display='none';
	document.getElementById(t5).style.display='none';
	document.getElementById(t6).style.display='none';
	document.getElementById(t7).style.display='none';
	document.getElementById(t8).style.display='none';
}
function changepass(txtval,divval,errmsg)
{	var k=0;
	var j=0;
	//alert(divval);
	var ValueControl=txtval; var ValueDivs=divval; var ValueValues=errmsg;
	for(i=0;i<ValueControl.split("|").length;i++) {
		var txtctrl=document.getElementById(ValueControl.split("|")[i].toString());
		if((txtctrl.type=="password") && (txtctrl.value=="")) {
			document.getElementById(ValueDivs.split("|")[i].toString()).style.color="#ff0000";
			document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
		}
		if(document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML!=''){
			document.getElementById(ValueControl.split("|")[i].toString()).focus();
		}
		    if(document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML!='&nbsp;') {
			
			if(((document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML)!="")) { 
if((document.getElementById(ValueDivs.split("|")[i].toString()).style.color=="rgb(255, 0, 0)")||(document.getElementById(ValueDivs.split("|")[i].toString()).style.color=="#ff0000"))
{k++;}else{j++;	}} else {j++;}	}	}
	if((k==0)) {  return true; } else { return false; }
}
function confrminactive(ask,url) {
	temp = window.confirm(ask);
	if (temp){
		window.location.href=url;
	}
}

function save1(session)
{
	//alert("ddd");
	
	var id=document.getElementById('profileid').value;
		
		if(id=="")
		{
			document.getElementById('err').style.display="block";
		}
	else
	{
	    //alert("gg");
      // window.location="savesearch.php?id="+id+"&session="+session;
	}

}
function profilesave(session,searchid)
{
	//alert("ddd");
	
	var id=searchid;
		
	
       window.location="savesearch.php?id="+id+"&session="+session;
	

}
function choose(id)
{
	alert(id);
	var choice=document.getElementById(id).selected.value;
	alert(choice);

}


function titlesave(title)
{
var re=document.getElementById(title).value;
if(re =="")
	{
	document.getElementById('titleerr').innerHTML="Enter the title";
	return false;
    }



}
