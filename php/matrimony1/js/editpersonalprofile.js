		function validateform(theform)
		{
			strMsg = "";
			
			if(theform.relationship.options[theform.relationship.selectedIndex].value == "")
			{
				strMsg = "* please specify your relationship with the person looking to get married";
			}
			
			if(theform.maritalstatus.options[theform.maritalstatus.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify marital status of the person looking to get married";
			}
			
			if(theform.havechildren.options[theform.havechildren.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify if the person looking to get married have children";
			}
			
			if(theform.height.options[theform.height.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify the height";
			}
			
			if(theform.bodytype.options[theform.bodytype.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify body type";
			}
			
			if(theform.complexion.options[theform.complexion.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify complexion";
			}
			
			if(theform.religion.options[theform.religion.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify religion";
			}
			
			if(theform.mothertongue.options[theform.mothertongue.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify mother tongue";
			}
			
			if(theform.caste.options[theform.caste.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify caste";
			}			
	
			if(theform.familyvalues.options[theform.familyvalues.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify family values";
			}
			
			if(theform.educationlevel.options[theform.educationlevel.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify education level";
			}
			
			if(theform.educationarea.options[theform.educationarea.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify education area";
			}
			
			if(theform.occupation.options[theform.occupation.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify occupation";
			}
			
			else if(theform.diet.options[theform.diet.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify diet";
			}
			
			if(theform.smoke.options[theform.smoke.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify smoke";
			}
			
			if(theform.drink.options[theform.drink.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify drink";
			}
			
			if(theform.stateofresidence.options[theform.stateofresidence.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify state of residence";
			}
			
			if(theform.residencystatus.options[theform.residencystatus.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please specify residency status";
			}
			
			if(theform.country_code.options[theform.country_code.selectedIndex].value == "")
			{
				strMsg = strMsg + "\n* Please select country code";
			}
			
			if(theform.type[0].checked == false && theform.type[1].checked == false)
			{
				strMsg = strMsg + "\n* please select type of phone number";
			}
			
			if(theform.type[0].checked == true && theform.std_code.value == "")
			{
				strMsg = strMsg + "\n* please enter std code";
			}
			else if(theform.type[0].checked == true && theform.contact_number.value == "")
			{
				strMsg = strMsg + "\n* please enter contact number";
			}		
			
			
			else if(theform.type[1].checked == true && theform.contact_number.value == "")
			{
				strMsg = strMsg + "\n* please enter contact number";
			}
			
			if(theform.contact_details_dislay_status[0].checked == false && theform.contact_details_dislay_status[1].checked == false)
			{
				strMsg = strMsg + "\n* please select contact details display status";
			}
			
			if(theform.aboutyourself.value == "")
			{
				strMsg = strMsg + "\n* please describe about yourself";
			}
			
			if(theform.aboutyourself.value.length < 100)
			{
				strMsg = strMsg + "\n* please describe about yourself with atleast 100 characters.";
			}
			
			if(theform.aboutyourself.value.length > 4000)
			{
				strMsg = strMsg + "\n* number of characters in about yourself should be maximum 4000, you have written more than 4000 characters that is not allowed.";
			}
			if(strMsg!="")				
			{
			alert(strMsg);
			return false;
			}
			return true;
		}
		
		var result;
var xmlhttp;
var theurl;
var abc;

abc = 0;
function loadXMLDoc(url)
{
theurl = url;
xmlhttp=null
// code for Mozilla, etc.
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest()
  }
// code for IE
else if (window.ActiveXObject)
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
  }
if (xmlhttp!=null)
  {
  xmlhttp.onreadystatechange=state_Change
today =  new Date();
rnd = today.getTime( );  
url = url + "?rnd=" + rnd;
var i=0;
var Temp=document.profile.country.options[document.profile.country.selectedIndex].value;
url = url + "&CountryID=" + Temp;
xmlhttp.open("GET",url,true)
  xmlhttp.send(null)
  }
else
  {
  alert("Your browser does not support XMLHTTP.")
  }
}function state_Change()
{
// if xmlhttp shows "loaded"
if (xmlhttp.readyState==4)
  {
  // if "OK"
  if (xmlhttp.status==200)
    {
		if(abc==0)
		{
		result = xmlhttp.responseText
		document.getElementById('cityspan').innerHTML = result;
		loadXMLDoc("get_states2.php");
		abc=1;
		}
		else
		{
			result = xmlhttp.responseText
			document.getElementById('statespan').innerHTML = result;
			abc=0;
		}
    }
  else
    {
    alert("Problem retrieving XML data")
    }
  }
}
