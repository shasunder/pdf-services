<!--
caste_obj = document.getElementById('caste');
function age_diff_max(){

	var diff = parseInt(document.quicksearch.ageto.options[document.quicksearch.ageto.selectedIndex].text) - parseInt(document.quicksearch.agefrom.options[document.quicksearch.agefrom.selectedIndex].text);
	if(diff > 10) {
		alert("Age range exceeds 10 years.\nChange age range or use Smart Search");
		return false;
	}
	else if(parseInt(document.quicksearch.ageto.options[document.quicksearch.ageto.selectedIndex].text) < parseInt(document.quicksearch.agefrom.options[document.quicksearch.agefrom.selectedIndex].text)){
		alert("Invalid From & To Age");
		return false;
	}
	else {
	return true;
	}
}
function chk_mothertongue_caste(chk_var){
	
	if (document.quicksearch.caste.selectedIndex == 0 && chk_var == "caste"){
		alert("Please select Religion");
		return false;
	}
	else if (document.quicksearch.mothertongue.selectedIndex == 0 && chk_var == "mothertongue"){
		alert("Please select Mother tongue");
		return false;
	}else{
		return true;
	}
}


function chk_quicksearch_landing(chk_var){
	if (age_diff_max() == true){
		return	chk_mothertongue_caste(chk_var);
	}
	else{
		return false;
	}	
}

function go()
{
	href = document.explore.destination.value;
	if(href) window.open(href);
}


var http_caste = new getHTTPObject();
var http_mothertongue = new getHTTPObject();
function getHTTPObject()
{
	var xmlhttp;

	try
	{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e)
	{
		try
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (e)
		{
			try
			{
				xmlhttp = new XMLHttpRequest();
			}
			catch (e)
			{
				xmlhttp = false;
			}
		}
	}

	return xmlhttp;

} // EO function getHTTPObject()

function display_caste(mothertongue, gender)
{
	//alert(mothertongue);
	var flag = false;
	var caste_obj = document.getElementById('caste');
	if(mothertongue)
	{
		flag = true;
		
	}
	else
	{
		var caste_len = caste_obj.length;
		if(caste_len > 1)
		{
			for(i=0; i<caste_len; i++)
			{
				caste_obj.remove(1);
			}
		}

		flag = true;
	}
	
	if(flag == true)
	{
		
		document.getElementById("mothertongue").disabled = true;
		timer = new Date();
		var myurl = "/ssi/ajax-landing-community.php?forpage=mothertongue&mothertongue=" + escape(mothertongue) + "&gender=" + escape(gender);
		http_caste.open("GET", myurl, true);
		http_caste.onreadystatechange = useHttpResponse_caste;
		http_caste.send(null);
		flag = false;
	}
} // EO display_caste(mothertongue, gender)

function display_mothertongue(caste, gender)
{
	//alert(caste);
	var flag = false;
	var mothertongue_obj = document.getElementById('mothertongue');
	
	if(caste)
	{
		flag = true;
		
	}
	else
	{
		var mothertongue_len = mothertongue_obj.length;
		if(mothertongue_len > 1)
		{
			for(i=0; i<mothertongue_len; i++)
			{
				mothertongue_obj.remove(1);
			}
		}
		flag = true;
	}
	
	if(flag == true)
	{

		document.getElementById("caste").disabled = true;
		
		timer = new Date();
		var myurl = "/ssi/ajax-landing-community.php?forpage=caste&caste=" + escape(caste) + "&gender=" + escape(gender);
		http_mothertongue.open("GET", myurl, true);
		http_mothertongue.onreadystatechange = useHttpResponse_mothertongue;
		http_mothertongue.send(null);
		flag = false;
	}
} // EO display_caste(mothertongue, gender)

function useHttpResponse_caste()
{
	var obj_mothertongue = document.getElementById("mothertongue");
	if(http_caste.readyState == 4 && http_caste.status == 200)
	{		
		var caste = http_caste.responseText;
		if(caste != "")
		{	
			var caste_txt_val		 = new String(caste).split("|");
			var caste_obj = document.getElementById('caste');
			caste_obj.options.length = 0;
			caste_obj[0]			 = new Option("Doesn't Matter", "");
			
			var j = 1;
			for(var i=0; i<caste_txt_val.length; i++)
			{
				var caste_txt  = caste_txt_val[i];

				caste_obj[j] = new Option(caste_txt, caste_txt);
				j++;
			}
		}
		document.getElementById('loading_caste').style.display = "none";
		obj_mothertongue.disabled = false;
		// Comment added to remove the focus from the mothertongue field.
		//obj_mothertongue.focus();
	}
	else
	{
		document.getElementById('loading_caste').style.display = "";
		document.getElementById('loading_caste').innerHTML = "Loading ...";
		//document.getElementById('loading_caste').innerHTML = "<img src=\"" + img_url + "/imgs/loading.gif\" hspace=\"16\" vspace=\"3\" align=\"absmiddle\">";
	}
	
	

} // EO useHttpResponse_caste()


function useHttpResponse_mothertongue()
{
	var obj_caste = document.getElementById("caste");

	if(http_mothertongue.readyState == 4 && http_mothertongue.status == 200)
	{		
		var mothertongue = http_mothertongue.responseText;
		if(mothertongue != "")
		{	
			var mothertongue_txt_val		 = new String(mothertongue).split("|");
			var mothertongue_obj = document.getElementById('mothertongue');
			mothertongue_obj.options.length = 0;
			mothertongue_obj[0]			 = new Option("Doesn't Matter", "");
			
			var j = 1;
			for(var i=0; i<mothertongue_txt_val.length; i++)
			{
				var mothertongue_txt  = mothertongue_txt_val[i];

				mothertongue_obj[j] = new Option(mothertongue_txt, mothertongue_txt);
				j++;
			}
		}
		document.getElementById('loading_mothertongue').style.display = "none";
		obj_caste.disabled = false;
		// Comment added to remove the focus from the mothertongue field.
		//obj_mothertongue.focus();
	}
	else
	{
		document.getElementById('loading_mothertongue').style.display = "";
		document.getElementById('loading_mothertongue').innerHTML = "Loading ...";
		//document.getElementById('loading_caste').innerHTML = "<img src=\"" + img_url + "/imgs/loading.gif\" hspace=\"16\" vspace=\"3\" align=\"absmiddle\">";
	}
	
	

} // EO useHttpResponse_mothertongue()

