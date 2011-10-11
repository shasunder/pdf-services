<!--


/**
 * disable/enable text field
 *
 * @author sanket
 * @param  string  form name
 * @param  string  target_field  text box name which need to disable
 * @param  string  target_field  text box name which need to disable
 * @param  string  type   the name of field on which action field need to enable/disable
 *
 * @usage  <input type="radio" name="type" id="no_type2" value="Mobile" onclick="disable_field('contactdetails', 'std_code', 'mobile');">

*/
function disable_field_onload(form, fieldname)
{

	var _oDF        = document.forms[form];

	_oDF.elements[fieldname].disabled = true;


}//EO function set_value(field_id)




/**
 * disable/enable text field
 *
 * @author sanket
 * @param  string  form name
 * @param  string  target_field  text box name which need to disable
 * @param  string  target_field  text box name which need to disable
 * @param  string  type   the name of field on which action field need to enable/disable
 *
 * @usage  <input type="radio" name="type" id="no_type2" value="Mobile" onclick="disable_field('contactdetails', 'std_code', 'mobile');">

*/


function disable_field(form, fieldname, type)
{
	var _oDF        = document.forms[form];
	if(type == 'mobile')
	{
		if(_oDF.elements['country_code'].value == '+1|USA'
		|| _oDF.elements['country_code'].value == '+1|Canada')
		{
			_oDF.elements[fieldname].disabled = false;
		}
		else
		{
			_oDF.elements[fieldname].value = "";
			_oDF.elements[fieldname].disabled = true;
		}
	}
	else if(type == 'telephone')
	{
		_oDF.elements[fieldname].disabled = false;
	}

}//EO function set_value(field_id)

// #### allowing frames for roltanet ####
if (self != top) {
	if (document.images)
		top.location.replace(window.location.href);
	else
		top.location.href = window.location.href;
}

/**
 * changes value of textbox on country's dropdown
 *
 * @author Vinod S
 * @param  integer  new_value  country code
 * @param  string  target_field  text box name which is not editable
 *
 * @usage  <select name="mobile_country_code" class="formselect swidth" onchange="changecountrycode(this.value,document.profile.c_code_mobile);">

*/


function changecountrycode(new_value,target_field)
{
	myString = new String(new_value);
	splitString = myString.split("|");
	target_field.value = splitString[0];
}


function combo_option(obj,sub_heading){
	var total = 0;
	var total_checked = new Array();
	var flag = 0;
	for(var i=0;i<document.frm_main.elements[obj.name].length;i++){
		if(document.frm_main.elements[obj.name].options[i].selected){
			if(document.frm_main.elements[obj.name].options[i].text!=""){
				total_checked.push(i);
				total++;
			}
			if(total>3){
				document.frm_main.elements[obj.name].options[i].selected=false;
				total++;
				flag = 1;
			}
		}
	}
		if (flag == 1) {
			alert("You can choose only three "+sub_heading);
		}
		flag = 0;
}


function show_hide_options(refdiv, sign, selected_value){

	var domItem=document.getElementById(refdiv);

	if(selected_value == "selected"
	|| domItem.style.display=='none')
	{
		for(var i=1; i<=refdiv.substr(1); i++){
			tmp_id=refdiv.substr(0,1)+i;
			document.getElementById(tmp_id).style.display='';
		}
		if(sign){
			sign.innerHTML=sign.innerHTML.replace('More','Fewer');
			sign.innerHTML=sign.innerHTML.replace('plus','minus');
			sign.style.background='#FFFFFF';
			sign.innerHTML=sign.innerHTML.replace('span','span style=\"display: none;\"');
			sign.innerHTML=sign.innerHTML.replace('SPAN','SPAN style=\"display: none;\"');
//			alert(sign.innerHTML+"+");

		}
	}else{
		for(var i=1; i<=refdiv.substr(1); i++){
			tmp_id=refdiv.substr(0,1)+i;
			document.getElementById(tmp_id).style.display='none';
		}
		if(sign){
			sign.innerHTML=sign.innerHTML.replace('Fewer','More');
			sign.innerHTML=sign.innerHTML.replace('minus','plus');
			sign.style.background='#F3F3F3';
			sign.innerHTML=sign.innerHTML.replace('span','span style=\"display: ;\"');
			sign.innerHTML=sign.innerHTML.replace('SPAN','SPAN style=\"display: ;\"');
//			alert(sign.innerHTML+"+");

		}
	}
}


function check_option_dosent_matter(obj)
{

	var check_flag = 0;
	var i = 0;
	for(i=0;i<document.frm_main.elements[obj.name].length;i++){
		if(check_flag == 1){
			document.frm_main.elements[obj.name][i].checked =false;
		}
		if (document.frm_main.elements[obj.name][i].value=="null" || document.frm_main.elements[obj.name][i].value=="")
		{
			if (document.frm_main.elements[obj.name][i].checked==true)
				check_flag = 1;
		}
	}
}


function check_option(obj){

	for(i=0;i<document.frm_main.elements[obj.name].length;i++){

		if (document.frm_main.elements[obj.name][i].value=="null" || document.frm_main.elements[obj.name][i].value==""){
			if (document.frm_main.elements[obj.name][i].checked==true)
				document.frm_main.elements[obj.name][i].checked =false;
			}
	}
}


/**
 * counter for textarea
 *
 * @author Ritchie
 * @param  string  sForm      form name
 * @param  string  sTextArea  textarea name
 * @param  string  sTextInput counter name
 * @param  integer iMaxLimit  max number for counter
 *
 * @usage  <textarea onKeyUp="calcCharLen('form_name', 'field_name', 'counter_name', 100)" onBlur="calcCharLen('form_name', 'field_name', 'counter_name', 100)" wrap="virtual" maxLength="100" class="forminput">

*/
function calcCharLen(sForm, sTextArea, sTextInput, iMaxLimit)
{
	var _oDF        = document.forms[sForm];
	var _oTxtA      = _oDF.elements[sTextArea];
	var _iMaxLength = (!iMaxLimit) ? 100 : iMaxLimit;
	var _iCharLeft  = _oTxtA.value.length;

	_oDF.elements[sTextInput].value = _iCharLeft;

	if(_iCharLeft > _iMaxLength)
	{
		_oTxtA.value = _oTxtA.value.substring(0, _iMaxLength);
		_oDF.elements[sTextInput].value = _iMaxLength;
		alert('You can enter only '+_iMaxLength+' characters.');
	}
}




// #### clear form ###
function cls(str){
	str.value = "";
	return;
}

var opened=false;
var win;
function openWin(str,nm,width,height){
	if(opened == false){
		win = open(str,nm,"status=0,scrollbars=1,menubar=0,toolbar=0,location=0,resizeable=0,width="+width+",height="+height);
	}
	else if(opened == true){
		if(win.closed == false)
		win.close();
		win = window.open(str,nm,"status=0,scrollbars=1,menubar=0,toolbar=0,location=0,resizeable=0,width="+width+",height="+height);
	}
	opened = true;
}

function setStat(str){
	window.status=str;
	window.defaultStatus="";
}

function veriPopUp(url) { sealWin=window.open(url,"win",'toolbar=0,location=0,directories=0,status=1,menubar=1,scrollbars=1,resizable=1,width=720,height=450'); self.name = "mainWin"; }



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
function chk_community(){
	if (document.quicksearch.community.options[document.quicksearch.community.selectedIndex].value == ""){
		alert("Please select Community");
		return false;
	}else{
		return true;
	}
}

function chk_quicksearch(){
	if (age_diff_max() == true){
		return	chk_community();
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



function quick_link_submit_page()
{
	url = top_banner_form.url.options[top_banner_form.url.selectedIndex].value;

	if(url == '/shaadi-rewards/index.php' || url == '/introduction/how-to-use.php' || url == 'http://www.shaadipoint.com/' || url == 'http://www.shaaditimes.com/' || url == 'http://www.shaaditimes.com/shaadi-shop.php' || url == '/wedding/directory/index.php')
	{
		window.open(url);
	}
	else
	{
		window.open(url, '_self');
	}

}


function combo_max_option(from_obj,obj,sub_heading){

	var total = 0;
	var total_checked = new Array();
	var flag = 0;

	if(obj.options[0].text != "Doesn't Matter")
	{
		total = obj.options.length;
	}

	for(var i=0;i<document.frm_main.elements[from_obj.name].length;i++){
		if(document.frm_main.elements[from_obj.name].options[i].selected){
			if(document.frm_main.elements[from_obj.name].options[i].text!=""){
				total_checked.push(i);
				total++;
			}
			if(total>3){
				document.frm_main.elements[from_obj.name].options[i].selected=false;
				total++;
				flag = 1;
			}

		}
	}

	if (flag == 1) {
		alert("You can add only three "+sub_heading);
		return false;
	}

	return true;
}


/**
 * @purpose - To fill in the mothertongue list on selection of community
 *
 * @author Shraddha
 * @param  mothertongue_string - Mothertongues list for other religions like Muslim, Sikh etc
 * @param  from_page - Whenther function call from smart search or quick search
 * @param  preselected_mothertongue - Preselected Mothertongues
 * @return void - Fills in the mothertonuge otpions
 *
 * @usage - fill_mothertongue_from('".implode("|", $GLOBALS["MOTHER_TONGUE_MASTER"])."', 'smart_search', '');
 */
function fill_mothertongue_from(mothertongue_string, from_page, preselected_mothertongue)
{
	var arr_community = new Array();

	if(from_page == "smart_search")
	{
		var frm_obj		  = document.frm_main;
		var community_obj = frm_obj.elements['communityarray[]'];
	}
	else
	{
		var frm_obj		  = document.quicksearch;
		var community_obj = frm_obj.community;
	}

	var caste_obj = frm_obj.elements['castearray[]'];

	if(from_page == "smart_search") // Multiple select at a time..
	{
		for(var k=0; k<community_obj.options.length; k++)
		{
			arr_community[k] = community_obj.options[k].value;

		} // EO for(var k=0; k<community_obj.options.length; k++)

		var mothertongue_obj = frm_obj.elements['mothertongue_fromarray[]'];

		// This is used to preselect the mothertongues in saved search n in partner profile..
		var mothertongue_to_obj = frm_obj.elements['mothertonguearray[]'];

		var arr_rightlist_mothertongue = new Array();
		for(var k=0; k<mothertongue_to_obj.options.length; k++)
		{
			arr_rightlist_mothertongue[k] = mothertongue_to_obj.options[k].value;

		} // EO for(var k=0; k<community_obj.options.length; k++)

		mothertongue_to_obj.options.length = 0;
		mothertongue_to_obj[0]   = new Option("Doesn't Matter", " ");
	}
	else // For other searches where we can at a time select only one community..
	{
		if(community_obj.options[community_obj.selectedIndex].value)
		{
			arr_community[0] = community_obj.options[community_obj.selectedIndex].value;
		}

		var mothertongue_obj = frm_obj.elements['mothertonguearray[]'];
	}

	// When selecting community then by default reset everything...
	mothertongue_obj.options.length = 0;

	// TO hide caste in quick searches onchange of community..
	document.getElementById("show_hide_caste").style.display = "none";

	if(arr_community.length > 0)
	{
		document.getElementById("show_hide_mothertongue").style.display = "";

		mothertongue_obj.size = 5;
		mothertongue_obj[0]   = new Option("----Select Mother Tongue----", "");


		var j = 1; // Defined it as '1' bcoz we have 'Select Mother Tongue' as 0th option in 'From' mothertongue list
		var m = 0; // Used to track 'To' mothertongue options
		var s = 0; // Used to track selected mothertongues

		var arr_preselected_mothertongue			= new Array(); // Preselected mothertongues onload of page..
		var arr_from_mothertongue_options			= new Array(); // To fill mothertongue from options
		var arr_from_mothertongue_selected_options	= new Array(); // To preselect mothertongue options
		var arr_to_mothertongue_options				= new Array(); // To fill mothertongue to options


		// master array
		var splitString_all_mothertongues = new String(mothertongue_string).split("|");

		// from database
		arr_preselected_mothertongue = preselected_mothertongue.split('|');

		// This null is coming from text2id() if user selects the whole list of mothertongue.
		// If so then preselect the whole mothertongue list in right box..
		if(preselected_mothertongue == "null")
		{
			arr_preselected_mothertongue = splitString_all_mothertongues;
		}

		// For creating new options of mothertongue_from list..
		for(var i=0; i<arr_community.length; i++)
		{
			var community_val = arr_community[i];

			// For these communities displaying global mothertongues like Aka, Arabic etc.. in Mothertongue block.
			// Put flag bcoz if Aka, Arabic mothertongues are already there then we dont want this condition.
			// Filling the arr_community array which wud in turn create the options of mothertongue_from list.
			if(community_val == "Hindu"
			|| community_val == "Muslim"
			|| community_val == "Other"
			|| community_val == "Jain"
			|| community_val == "Buddhist"
			|| community_val == "Parsi"
			|| community_val == "Sikh"
			|| community_val == "Jewish"
			|| community_val == "Spiritual - not religious"
			|| community_val == "No Religion"
			|| community_val == "Christian"
			|| community_val == "Muslim:Sunni"
			|| community_val == "Muslim:Shia"
			|| community_val == "Muslim:Dawoodi Bohra"
			|| community_val == "Christian:Protestant"
			|| community_val == "Christian:Born Again"
			|| community_val == "Christian:Roman Catholic"
			|| community_val == "Sikh:Jat"
			|| community_val == "Sikh:Ramgharia"
			|| community_val == "Sikh:Khatri"
			|| community_val == "Sikh:Gursikh"
			|| community_val == "Jain:Shwetamber"
			|| community_val == "Jain:Digambar"
			|| community_val == "Jain:Vania"
			|| community_val == " ")
			{
				// Hide caste drop down in case of Doesn't Matter..
				if(community_val == " ")
				{
					caste_obj.options.length = 0;
				}

				for(var k=0; k<splitString_all_mothertongues.length; k++)
				{
					var curr_mothertongue = splitString_all_mothertongues[k].trim();

					if(InArray(arr_preselected_mothertongue, curr_mothertongue) >= 0)
					{
						if(from_page == "smart_search") // For preselected values, putting them in right list
						{
							arr_to_mothertongue_options[m] = curr_mothertongue;
							m++;
						}
						else // For other searches, selecting value from the list..
						{
							arr_from_mothertongue_selected_options[s] = curr_mothertongue;
							s++;
							arr_from_mothertongue_options[j] = curr_mothertongue;
							j++;
						}
					}
					else // Displaying the values in the list..
					{
						// To remove the mothertongues selected already in right list from left list..
						// community_val != " " is put to reset 'To' the mothertongue list in case of Doesn't Matter
						if(from_page == "smart_search"
						&& InArray(arr_rightlist_mothertongue, curr_mothertongue) >= 0
						&& community_val != " ")
						{
							arr_to_mothertongue_options[m] = curr_mothertongue;
							m++;
						}
						else
						{
							arr_from_mothertongue_options[j] = curr_mothertongue;
							j++;
						}
					}

				} // EO for(var k=0; k<splitString_all_mothertongues.length; k++)

			}
			else
			{
				//This else is for communities like Hindu: Assamese etc..
				// community_val = Hindu|Assamese|Manipuri
				splitString = new String(community_val).split("|");

				// k = 1 and K != 0, coz we need to skip the religion. eg . Hindu
				for(var k=1; k<splitString.length; k++)
				{
					var curr_mothertongue = splitString[k].trim();
					if(InArray(arr_preselected_mothertongue, curr_mothertongue) >= 0)
					{
						if(from_page == "smart_search")
						{
							arr_to_mothertongue_options[m] = curr_mothertongue;
							m++;
						}
						else
						{
							arr_from_mothertongue_selected_options[s] = curr_mothertongue;
							s++;
							arr_from_mothertongue_options[j] = curr_mothertongue;
							j++;
						}
					}
					else
					{
						// To remove the mothertongues selected already in right list from left list..
						if(from_page == "smart_search"
						&& InArray(arr_rightlist_mothertongue, curr_mothertongue) >= 0)
						{
							arr_to_mothertongue_options[m] = curr_mothertongue;
							m++;
						}
						else
						{
							arr_from_mothertongue_options[j] = curr_mothertongue;
							j++;
						}
					}

				} // EO for(var k=1; k<splitString.length; k++)

			}

		} // EO for(var i=0; i<arr_community.length; i++)


		if(arr_from_mothertongue_options.length > 0)
		{
			arr_from_mothertongue_options = unique_array(arr_from_mothertongue_options);
			for(var i=1; i<arr_from_mothertongue_options.length; i++)
			{
				var mothertongue_val = arr_from_mothertongue_options[i];

				if(InArray(arr_from_mothertongue_selected_options, mothertongue_val) >= 0)
				{
					mothertongue_obj[i] = new Option(mothertongue_val, mothertongue_val, false, true);
					mothertongue_obj[i].selected = true;
				}
				else
				{
					mothertongue_obj[i] = new Option(mothertongue_val, mothertongue_val);
				}

			} // EO for(var i=1; i<arr_from_mothertongue_options.length; i++)

		} // EO if(arr_from_mothertongue_options.length > 0)

		if(from_page == "smart_search")
		{
			if(arr_to_mothertongue_options.length > 0)
			{
				arr_to_mothertongue_options = unique_array(arr_to_mothertongue_options);
				for(var i=0; i<arr_to_mothertongue_options.length; i++)
				{
					var mothertongue_to_val = arr_to_mothertongue_options[i];
					mothertongue_to_obj[i]	= new Option(mothertongue_to_val, mothertongue_to_val);
				}

			} // EO if(arr_to_mothertongue_options.length > 0)

		} // EO if(from_page == "smart_search")

	} // EO if(arr_community.length > 0)
	else // if no communitites in right hand side..
	{
		document.getElementById("show_hide_mothertongue").style.display = "none";
	}

} // EO function fill_mothertongue_from()



function copytolist(obj_from, obj_to)
{
	var flag		= false; // To check whether value is selected..
	var remove_flag = false; // To check whether value is selected..

	for (i=0;i<obj_from.options.length;i++)
	{
		var curr_option = obj_from.options[i];

		if(curr_option.selected)
		{
			// To display 'Doesn't Matter' if not added anything..
			if(obj_from == document.frm_main.elements['communityarray[]']
			|| obj_from == document.frm_main.elements['mothertonguearray[]']
			|| obj_from == document.frm_main.elements['castearray[]']
			|| obj_from == document.frm_main.elements['occupationarray[]']
			|| obj_from == document.frm_main.elements['residencystatusarray[]']
			|| obj_from == document.frm_main.elements['education_level_array[]']
			|| obj_from == document.frm_main.elements['education_area_array[]']
			|| obj_from == document.frm_main.elements['countryofresidencearray[]']
			|| obj_from == document.frm_main.elements['stateofresidencearray[]'])
			{
				remove_flag = true;
			}

			flag = true;

			var new_option	   = curr_option.text;
			var new_option_val = curr_option.value;

			//Need to put select mothertongue n caste condition bcoz we hv static option files
			//for occupation n residency status.. which doesnt hv value attribute in option tag.
			//so we hv checked text of the option..
			if(new_option != ""
			&& new_option != "----Select Mother Tongue----"
			&& new_option != "---------Select Caste---------"
			&& new_option_val != "")
			{
				// when user selects anything frm left when doesnt matter at right side, overwriting the doesnt matter value.
				// countryofresidence condition is added bcoz.. we can have "" value as 0th option in countryofresidencearray.. so it resets the whole list..
				if(obj_to.options[0] && (obj_to.options[0].text == "Doesn't Matter" || obj_to.options[0].text == "") && obj_from != document.frm_main.elements['countryofresidencearray[]'] )
				{
					obj_to.options.length = 0;

					//If user selected default mothertongues &
					//then when he adds community to nullify preselected mothertongues..
					if(obj_to == document.frm_main.elements['communityarray[]'])
					{
						document.frm_main.elements['mothertonguearray[]'].length = 0;
					}
				}

				if(new_option != "Doesn't Matter")
				{
					obj_to.options[obj_to.length] = new Option(new_option, new_option_val);
				}

				//Removing the option frm the source list n
				//decrementing bcoz now we need to loop thr the new list count
				//if(remove_flag){ // Uncomment if u dont want to remove the val frm left list.
				obj_from.options[i] = null;	//we can use obj_from.remove(i);
				i--; // Used for multiple selection..
				//}
			}

		} // EO if(curr_option.selected)

	} // EO for (i=0;i<obj_from.options.length;i++)

	if(obj_from.options.length == 0 && remove_flag)
	{
		// This is done bcoz, we need " " value for 'Doesn't Matter' option in case of community block only so that
		// we can display default mothertongue list..
		// For other elements we need "" value..
		if(obj_from == document.frm_main.elements['communityarray[]']
		|| obj_from == document.frm_main.elements['mothertonguearray[]']
		|| obj_from == document.frm_main.elements['castearray[]'])
		{
			var value = " ";
		}
		else
		{
			var value = "";
		}

		obj_from.options[0] = new Option("Doesn't Matter", value);
	}

	// This block is used to remove the blank separator between the options in the LHS box
	if(obj_from.options.length > 0 && obj_from.options.length <= 2)
		{
			if(obj_from.options[0].text == "---------Select Caste---------" && obj_from.options.length == 2)
			{
				if(obj_from.options[1].text =="")
				obj_from.options[1] = null;
			}
			else if(obj_from.options.length == 1 && obj_from.options[0].text == "")
			{
				obj_from.options[0] = null;
		}
	}

	if (!flag)
	{
		alert ('Please select the Options');
		return false;
	}

	return true;

} // EO function copytolist(obj_from,obj_to)


// This function is used to select the values in right list before submission.
function select_values()
{
	var arr_obj = new Array(
		'communityarray[]',
		'mothertonguearray[]',
		'castearray[]',
		'countryofresidencearray[]',
		'occupationarray[]',
		'residencystatusarray[]',
		'education_level_array[]',
		'education_area_array[]',
		'stateofresidencearray[]'
	);

	// Getting all form elements..
	var arr_form_elements = new Array();

	for(var k=0; k<document.frm_main.elements.length; k++)
	{
		var curr_elem = document.frm_main.elements[k];

		if(InArray(arr_obj, curr_elem.name) >= 0)
		{
			for(var i=0; i<curr_elem.options.length; i++)
			{
				curr_elem.options[i].selected = true;
			}
		}
	}

	return true;

} // EO function select_values()



//This function calls the AJAX function depending on the countries selected. bcoz,
//only India and USA have the states currently..
function get_selected_countries(selected_states, img_url, form_page)
{
	var selected_countries = "";

	for(var i=0;i<document.frm_main.elements['countryofresidencearray[]'].length;i++)
	{
		if((document.frm_main.elements['countryofresidencearray[]'].options[i].text == "India"
		||  document.frm_main.elements['countryofresidencearray[]'].options[i].text == "USA") )
		{
			selected_countries += "'" + document.frm_main.elements['countryofresidencearray[]'].options[i].text + "',";
		}
		else if(document.frm_main.elements['countryofresidencearray[]'].options[i].text == "Doesn't Matter")
		{
			// Needed bcoz we need to show stateofresidence in case of Doesn't Matter..
			selected_countries = "'India','USA'";
			break;
		}
	}

	if(!form_page)
	{
		if(selected_countries || selected_states ) // If India OR USA is selected..then popuplate the states list..
		{
			display_state_dropdown(selected_countries, selected_states, '', document.frm_main.elements['stateofresidence_fromarray[]'], img_url, 'smart_search', '');
		}
		else
		{
			//Resetting the state os residence array..
			document.frm_main.elements['stateofresidencearray[]'].options.length = 0;
			document.getElementById('show_hide_state').style.display = 'none';
		}
	}

} // EO function get_selected_countries()


function unique_array(arr_passed)
{
	var arr_unique = new Array();
	var m = 0;

	for(var i=0; i<arr_passed.length; i++)
	{
		var curr_value = arr_passed[i];

		if(InArray(arr_unique, curr_value) < 0)
		{
			arr_unique[m] = curr_value;
			m++;
		}
	}

	return arr_unique;

} // EO function unique_array(arr_passed)



// To trim the string in JS..
// create the prototype on the String object
String.prototype.trim = function()
{
	// skip leading and trailing whitespace
	// and return everything in between
	var x=this;
	x=x.replace(/^\s*(.*)/, "$1");
	x=x.replace(/(.*?)\s*$/, "$1");
	return x;
}




/**
 * This function perform the match of selected city or state with current city(as per state) and current state(as per country)
 * if match is found then it returns index else it returns -1
*/
function InArray(arr, key)
{
	for (var i=0; i<arr.length; i++)
	{
		if (arr[i] == key)	return i;
	}

	return -1;

}//EOF InArray(arr, key)



//-->