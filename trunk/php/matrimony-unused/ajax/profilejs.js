//Ajax
function GetXmlHttpObject()
{ var xmlHttp=null; try {
  	// Firefox, Opera 8.0+, Safari
  	xmlHttp=new XMLHttpRequest(); }
catch (e) { 
   // Internet Explorer
   try { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
   catch (e) { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); } }
   return xmlHttp;
}
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;
		try{ xmlhttp=new XMLHttpRequest(); }
		catch(e)	{	try{ xmlhttp= new ActiveXObject("Microsoft.XMLHTTP"); }
			catch(e){ try { xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
				catch(e1){ xmlhttp=false; } } } return xmlhttp;  }
////////////////................fn for editing................////////////////////
function showDiv(id,pid)
{	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
    {
    alert ("Your browser does not support AJAX!");
    return;
    }  
    var id = id;
    var sid = sid;
    var hid = hid;
	var rand   = Math.random(9999);  
	var url = "ajax/editProfile.php?id="+id+"&pid="+pid;
	document.getElementById('editview'+id).style.display='';
	document.getElementById('editview'+id).innerHTML="<center><img src='images/preload.gif'></center>";
	//alert(url);
	xmlHttp.onreadystatechange=displayDiv;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function displayDiv()
{	

	if (xmlHttp.readyState==4)
	{
		var str = xmlHttp.responseText.split("##");
    	document.getElementById('editview'+str[1]).innerHTML=str[0];//id to display innerhtml
		//document.getElementById('editview'+str[1]).style.display='';//id to display
		document.getElementById('view'+str[1]).style.display='none';//id to hide
		document.getElementById('update'+str[1]).style.display='';//button id to display
		document.getElementById('cancel'+str[1]).style.display='';//button id to display
		document.getElementById('edit'+str[1]).style.display='none';//button id to hide
	}
}

function updateNew(divid)
{
   	for(i=1;i<=12;i++)
	{
	   	if(i==divid)
		{
			document.getElementById('update'+i).style.display='none';
			document.getElementById('cancel'+i).style.display='none';
			document.getElementById('editview'+i).style.display='none';
			document.getElementById('view'+i).style.display='';
			document.getElementById('edit'+i).style.display='';
		}
	}
}
//Update Profile
function updateDiv(pid,type,tbl,v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12,v13,v14,v15,v16,v17,v18,v19){

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
    {
		alert ("Your browser does not support AJAX!");
		return;
    }
	var rand   = Math.random(9999);
	var url = "ajax/editProfile.php?action=Update&pid="+pid+"&type="+type+"&tbl="+tbl+"&v1="+v1+"&v2="+v2+"&v3="+v3+"&v4="+v4+"&v5="+v5+"&v6="+v6+"&v7="+v7+"&v8="+v8+"&v9="+v9+"&v10="+v10+"&v11="+v11+"&v12="+v12+"&v13="+v13+"&v14="+v14+"&v15="+v15+"&v16="+v16+"&v17="+v17+"&v18="+v18+"&v19="+v19;
	//alert(url);
	xmlHttp.onreadystatechange=updateDivResult;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function updateDivResult()
{	
 if (xmlHttp.readyState==4)
	{
		var textout = xmlHttp.responseText;
		//alert(xmlHttp.responseText);
		document.write.textout;
		//window.location.reload();
		//window.location.href = "myProfile.php?page=edit";
	}
}
