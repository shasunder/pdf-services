
		function validateform(theform)
		{
			if(theform.timeofbirth_hour.options[theform.timeofbirth_hour.selectedIndex].value == "")
			{
				alert("Please select your hour of birth");
				theform.timeofbirth_hour.focus();
				return false;
			}
			
			else if(theform.timeofbirth_min.options[theform.timeofbirth_min.selectedIndex].value == "")
			{
				alert("Please select minute of birth");
				theform.timeofbirth_min.focus();
				return false;
			}
			
			else if(theform.timeofbirth_sec.options[theform.timeofbirth_sec.selectedIndex].value == "")
			{
				alert("Please select second of birth");
				theform.timeofbirth_sec.focus();
				return false;
			}
			
			else if(theform.countryofbirth.options[theform.countryofbirth.selectedIndex].value == "")
			{
				alert("Please select country of birth");
				theform.countryofbirth.focus();
				return false;
			}
			
			else if(theform.cityofbirth.options[theform.cityofbirth.selectedIndex].value == "")
			{
				alert("Please select city of birth");
				theform.cityofbirth.focus();
				return false;
			}
			return true;
		}
		
		var result;
var xmlhttp;
var theurl;
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
var Temp=document.frmastro.countryofbirth.options[document.frmastro.countryofbirth.selectedIndex].value;
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
		result = xmlhttp.responseText
		document.getElementById('cityspan').innerHTML = result;
    }
  else
    {
    alert("Problem retrieving XML data")
    }
  }
}
