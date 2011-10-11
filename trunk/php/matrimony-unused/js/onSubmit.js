/*
* Submit Validtion
* Reset Validation
*/
/////// 	OnSubmit Validation  /////////////
function loadSubmitValue(){ 
	return Submit('ddlPrefer|txtLogin|txtEmail|txtPwd|txtConpwd|ddlProfile|txtFname|txtLname|Gender|txtAge|ddlMarital|ddlCitizen|ddlCountry|ddlReligion|txtMobile|checkAgree','preferError|useridError|emailError|pwdError|conpwdError|profileError|fnameError|lnameError|genderError|ageError|maritalError|citizenError|countryError|religionError|mobileError|checkError','Select your Prefer Type|Enter your LoginId|Enter your EmailId|Enter your Password|Please Enter your confirm Password|Select your Prfolie Creater|Enter your First Name|Enter your Last Name|Please select the gender|Select your Date Of Birth|Select your Marital Status|Select your Citizenship|Select your Country|Select your Religion|Enter Your Mobile No|Please select the terms and conditions','1');
}
function loadSubmitValue2()
{ 
return Submit('rfood|rsmoke|rliquor|rcomplex|rbody|ddlblood|ddlfeet|ddlkgs|ddlphysical|ddlstate|txtCity|txtaddress|ddle_category|ddle_qual|ddlocc|ddlstar|ddlrassi','foodError|smokeError|liqurError|complexionError|typeError|bloodError|heightError|weightError|statusError|stateError|cityError|addressError|categoryError|qualError|occError|starError|rassiError','Please select the Food|Please select the Smoking|Please select the Liquor|Please select the Complexion|Please select the Body Type|Please select the Blood Group|Please select the Height|Please select the Weight|Please select the Physical status|Please select the State|Please enter the City|Enter Your Address|Please select the category|Please select the Education|Please select the Occupation|Please select the Star|Please select the Raasi','2');
}
function loadSubmitValue3()
{ 
return Submit('txtage1|marital|ddlmother|ddlReligion|ddle_category|ddlocc|ddlcitizen|ddlcountry|ddlstate|ddlcity|foodI|txtabout|ddlstatus|ddlfeet','ageError|maritalError|motherError|religionError|categoryError|occError|citizenError|countryError|stateError|cityError|foodError|aboutError|statusError|heightError','Please Enter Your Age|Please select the Marital Status|Select your Mother Tongue|Select your Religion|Select your Category|Select your Occupation|Select your Citizenship|Select your Country|Select your State|Select your City|Please select the Food|Please enter the About Partner|Select your Physical Status|Select your height','3');
}
function loadFamilyinfo()
{ 
return Submit('ddlfvalue|ddlftype|ddlstatus','valueError|typeError|statusError|SisterError','Please select a family value|Please enter the Family Type|Please enter the Family status');
}
function Submit(Controls,Divs,values,action){
		var ValueControl=Controls;
		var ValueDivs=Divs;
		var ValueValues=values;
		for(i=0;i<ValueControl.split("|").length;i++){
		    var txtctrl=document.getElementById(ValueControl.split("|")[i].toString());
			//if((txtctrl.selectedIndex<=0)||(txtctrl.value=="")){
			if(txtctrl.type=="radio")
			 {
				var sample=txtctrl.id;
				if(action == '1') {
				var length=document.regMain[sample].length;
				var frm_elements=document.regMain[txtctrl.id]; }
				if(action == '2') {
				var length=document.regStepTwo[sample].length;
				var frm_elements=document.regStepTwo[txtctrl.id]; }
				if(action == '3') {
				var length=document.regStepThree[sample].length;
				var frm_elements=document.regStepThree[txtctrl.id]; }
				var len=0;
				for(k=0;k<length;k++) {
				if(frm_elements[k].checked==false) {
						len++;
						if(len==length) {							
							document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
						}
					 }
				 }
			  } else if((txtctrl.type=="text") && (txtctrl.value=="")) {
				 document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
			  } else if((txtctrl.type=="select-one") && (txtctrl.selectedIndex==0)) {
				 document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
			  } else if((txtctrl.type=="password") && (txtctrl.value=="")) {
				 document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
			  }	else if((txtctrl.type=="checkbox") && (txtctrl.checked==false)) {
				 document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
			  } else if((txtctrl.type=="select-multiple") && (txtctrl.selectedIndex==-1)) {
				 document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
			  } else if((txtctrl.type=="textarea") && (txtctrl.value=="")) {
				 document.getElementById(ValueDivs.split("|")[i].toString()).innerHTML=ValueValues.split("|")[i].toString();
			  }
		}
		for(j=0;j<ValueControl.split("|").length;j++){
		    var txtctrl=document.getElementById(ValueControl.split("|")[j].toString());
			//if((txtctrl.selectedIndex==0)||(txtctrl.value=="")||(txtctrl.type=="radio")){
			 if(txtctrl.type=="radio"){
				var sample=txtctrl.id;
				if(action == '1'){
				var length=document.regMain[sample].length;
				var frm_elements=document.regMain[txtctrl.id];}
				if(action == '2'){
				var length=document.regStepTwo[sample].length;
				var frm_elements=document.regStepTwo[txtctrl.id];}
				if(action == '3'){
				var length=document.regStepThree[sample].length;
				var frm_elements=document.regStepThree[txtctrl.id];}
				var len=0;
				for(k=0;k<length;k++){
				if(frm_elements[k].checked==false){
						len++;
						if(len==length)
						{
						 	document.getElementById(ValueControl.split("|")[j].toString()).focus();	
							return false;							
						}
				   }
				}
     		   }    else if((txtctrl.type=="text") && (txtctrl.value=="")) {
				 document.getElementById(ValueControl.split("|")[j].toString()).focus();return false;
			   }	else if((txtctrl.type=="select-one") && (txtctrl.selectedIndex==0)) {
				 document.getElementById(ValueControl.split("|")[j].toString()).focus();return false;
			   }	else if((txtctrl.type=="password") && (txtctrl.value=="")) {
				 document.getElementById(ValueControl.split("|")[j].toString()).focus();return false;
			   }	else if((txtctrl.type=="checkbox") && (txtctrl.checked==false)) {
				 document.getElementById(ValueControl.split("|")[j].toString()).focus();return false;
			   }    else if((txtctrl.type=="select-multiple") && (txtctrl.value=="")) {
				 document.getElementById(ValueControl.split("|")[j].toString()).focus();return false;
			   }    else if((txtctrl.type=="textarea") && (txtctrl.value=="")) {
				 document.getElementById(ValueControl.split("|")[j].toString()).focus();return false;
			   }	else if(document.getElementById(ValueDivs.split("|")[j].toString()).innerHTML!='' && document.getElementById(ValueDivs.split("|")[j].toString()).style.color!='green'){
				 document.getElementById(ValueControl.split("|")[j].toString()).focus();return false;
			   }
		}
	return true;
}
/*------------------------------------Reset Function-----------------------------------*/
function DIVClear(passDIVValue){ 
	   var ValueDIVString=passDIVValue;
	   for(i=0;i<ValueDIVString.split("|").length;i++){
	   document.getElementById(ValueDIVString.split("|")[i].toString()).innerHTML="";
	   }
}

function TXTClear(passtxtValue){
	   var ValuetxtString=passtxtValue;
	   for(i=0;i<ValuetxtString.split("|").length;i++){
	   document.getElementById(ValuetxtString.split("|")[i].toString()).value="";
	   }
}
function DDLClear(passDDlValue){
    					      
	   var ValueDDLString=passDDlValue;
	   for(i=0;i<ValueDDLString.split("|").length;i++){
	   document.getElementById(ValueDDLString.split("|")[i].toString()).selectedIndex=0;
	   }  
}
function CHKFalse(passDDlValue){
	   var ValueCHKString=passDDlValue;
	   for(i=0;i<ValueCHKString.split("|").length;i++){
				document.getElementById(ValueCHKString.split("|")[i].toString()).checked=false;
	   }  
}
function SELECTtext(id){
	     for(i=0;i<id.split("|").length;i++){
		 id1=document.getElementById(id.split("|")[i].toString());
		 id1.options[id1.selectedIndex].text='Select';}
}
function DISStylenone(passValue) {
	var ValueString=passValue;
	for(i=0;i<ValueString.split("|").length;i++) {
	document.getElementById(ValueString.split("|")[i].toString()).style.display='none'; } }

function DISStyle(passValue) {	
	var ValueString=passValue;
	for(i=0;i<ValueString.split("|").length;i++){
	document.getElementById(ValueString.split("|")[i].toString()).style.display=''; } }

function TextDisable(passValue) {
	var ValueString=passValue;
	for(i=0;i<ValueString.split("|").length;i++) {
	document.getElementById(ValueString.split("|")[i].toString()).disabled='none'; } }
	
function TXTEnable(passtxtValue) {
	var ValuetxtString=passtxtValue;
	for(i=0;i<ValuetxtString.split("|").length;i++){
	document.getElementById(ValuetxtString.split("|")[i].toString()).disabled=false;  } }
	
function checkSelected(obj)
{
	/*if(obj.options[obj.selectedIndex].value == 0 )
		return false;
	else
	return true;*/
//return (obj.options[obj.selectedIndex].value == 0 ) ? false : true;
return (obj.selectedIndex <= 0  ) ? false : true;
}/*----checkSelected()-----*/

function SELECTreligion(id,cid){
	
	id1=document.getElementById(id);
	
	cid1=document.getElementById(cid);
	if(id1.selectedIndex==0){
		alert("*Please Select Religion");
		return false;
	} else {
				if(cid1.selectedIndex.value == "- select -" || cid1.selectedIndex.value != "No Community"){
				cid1.selectedIndex =1;
				
		  }
		return true;
	}	
}

