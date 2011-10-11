<!--

// To get the HTTP object to call a method..
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



// Two objects are created for displaying state and city drop downs because one is overwriting another..


//################ Builds the options for State drop down..###################

/* Called from :

- profile -> Edit profile
- html-template -> Smart Search
- city-search -> City Search
- included_modify -> Registration page

*/

//Instatiate another object to call method..
var http_state = new getHTTPObject();

var check_selected_state;
var check_state_obj;
var check_state_from_page;

/*
selected_country : All selected county list - In case of error or preselection
selected_state   : All selected state list -------- " --------
selected_city	 : All selected city list -------- " --------
state_obj		 : Functions gets called from diff files so passing state object that needs to be filled in with the 				   values.
img_url			 : Img server path
from_page		 : On search pages we hv multiple selection of countries, so using diff. script file for searches.
flag			 : Used to preselect the values while loading a page first time.
*/

function display_state_dropdown(selected_country, selected_state, selected_city, state_obj, img_url, from_page, flag)
{
	// Using these 2 vars for city drop down as well, so assigning the values..
	check_state_obj = state_obj;
	check_state_from_page = from_page;

	if(from_page == "smart_search")// for Search page AJAX - Mulitple countries selected..
	{
		var myurl = "/ssi/ajax-india-usa-states.php?country=" + escape(selected_country);
	}
	else // for Profile, registration, City Ssearch AJAX
	{
		var myurl = "/ssi/ajax-state.php?country=" + escape(selected_country) + "&state=" + escape(selected_state) + "&city=" + escape(selected_city);	
	
		if(selected_country == "")
		{
			state_obj.options.length = 0;
			state_obj[0] = new Option("Select state", "");
			return false;
		}

		document.getElementById("loading_state").innerHTML = "<img src=\"" + img_url + "/imgs/loading.gif\" hspace=\"16\" vspace=\"3\" align=\"absmiddle\">";
	}

	if(selected_state == "-")
	{
		check_selected_state = "Other";
	}
	else
	{
		check_selected_state = selected_state;
	}
	

	if(flag == "Y") // required coz it doesnot preselect the values. it hides the form element by default..
	{
		//Resetting the state os residence array..
		state_obj.options.length = 0;
		document.getElementById("show_hide_state").style.display = "none";
	}
	
	http_state.open("GET", myurl, true);
	if(from_page == "smart_search")
	{
		http_state.onreadystatechange = useHttpResponse_india_usa_state;
	}
	else
	{
		http_state.onreadystatechange = useHttpResponse_state;
	}
	http_state.send(null);

} // EO function display_state_dropdown()


// To populate the multiple drop down with state values..
function useHttpResponse_india_usa_state()
{
	// This is used to preselect the castes in smart search..
	var state_to_obj = document.frm_main.elements['stateofresidencearray[]'];

	if (http_state.readyState == 4 && http_state.status == 200)
	{
		var textout = http_state.responseText;
		myString    = new String(textout);
		splitString = myString.split("|");

		check_state_obj.size = 5;
		check_state_obj.options.length = 0;

		// Getting all preselected states from the list box..
		var arr_to_states	= new Array();
		for (i=0;i<state_to_obj.options.length;i++)
		{
			arr_to_states[i] = state_to_obj.options[i].value;
		}

		//Resetting the state os residence array..
		state_to_obj.options.length = 0;
		state_to_obj.options[0] = new Option("Doesn't Matter", ""); // On smart search to set it Doesn't Matter by default 

		var j = 0;
		var m = 0;
		for(var i=1; i<splitString.length; i++)
		{
			var curr_state = splitString[i].trim();

			if(curr_state.match("-----"))
			{
				curr_state_val = "";
			}
			else
			{
				curr_state_val = curr_state;
			}

			if(check_selected_state.match(curr_state))
			{
				if(check_state_from_page == "smart_search") // For preselected values, putting them in right list
				{
					state_to_obj[m] = new Option(curr_state, curr_state_val);
					m++;
				}
				else // For other searches, selecting value from the list..
				{
					check_state_obj[j] = new Option(curr_state, curr_state_val, false, true);
					check_state_obj[j].selected = true;
					j++;
				}
			}
			else
			{
				if(InArray(arr_to_states, curr_state) >= 0)
				{
					state_to_obj[m] = new Option(curr_state, curr_state_val);
					m++;
				}
				else
				{
					check_state_obj[j] = new Option(curr_state, curr_state_val);
					j++;
				}
			}
		}

		document.getElementById("show_hide_state").style.display = "";
	}
	else if(check_selected_state && check_state_from_page == "smart_search")
	{
		var splitString = check_selected_state.split("|");

		for(var i=0; i<splitString.length; i++)
		{
			var curr_state = splitString[i].trim();

			state_to_obj[i] = new Option(curr_state, curr_state);
		}
	}
}



// To populate the drop down with state values..
function useHttpResponse_state()
{
	if (http_state.readyState == 4 && http_state.status == 200)
	{
		var textout = http_state.responseText;
		myString    = new String(textout);
		splitString = myString.split("|");

		check_state_obj.options.length = 0;
		check_state_obj[0] = new Option("Select state", "");

		for(var i=0; i<splitString.length; i++)
		{
			var curr_state = splitString[i].trim();
			var curr_state_val;

			//when getting 'Other' value then internally in database passing it as '-'..
			if(curr_state == "Other")
			{
				curr_state_val = "-";
			}
			else
			{
				curr_state_val = curr_state;
			}

			//Creating new options of state ..
			check_selected_state_spilt_string = check_selected_state.split('|');
			
			if(InArray(check_selected_state_spilt_string, curr_state) >= 0)
			{
				check_state_obj[i+1] = new Option(curr_state, curr_state_val, false, true);
				check_state_obj[i+1].selected = true;
			}
			else
			{
				check_state_obj[i+1] = new Option(curr_state, curr_state_val);
			}
		}

		document.getElementById("loading_state").innerHTML = "";
		document.getElementById("show_hide_state").style.display = "";
	}
}




//################################ END ####################################





//################ Builds the options for City drop down..###################


/* Called from :

- profile -> Edit profile
- city-search -> City Search
- included_modify -> Registration page

*/

//Instantiate an object to call method..
var http = new getHTTPObject();

// These vars coming frm state srop down function, 
//setting them as global so that we can use them in city drop down function..
var check_selected_city;
var check_city_obj;
var check_city_from_page;

/*
selected_country : All selected county list - In case of error or preselection
selected_state   : All selected state list -------- " --------
selected_city	 : All selected city list -------- " --------
city_obj		 : Functions gets called from diff files so passing city object that needs to be filled in with the values.
img_url			 : Img server path
from_page		 : On search pages we hv multiple selection of countries, so using diff. script file for searches.
flag			 : Used to preselect the values while loading a page first time.
state_option	 : In every case, city gets populated from state selected, but in case of city search, state drop down is optional. so to tackle this condition, passing this parameter.
*/

function display_dropdown(selected_country, selected_state, selected_city, city_obj, img_url, from_page, flag, state_option)
{
	var myurl = "/ssi/ajax-city.php?country=" + escape(selected_country) + "&state=" + escape(selected_state) + "&city=" + escape(selected_city) + "&state_option=" + escape(state_option) + "&from_page=" + escape(from_page);

	check_city_obj = city_obj;
	check_city_from_page = from_page;

	if((selected_state == "" && state_option != "no_state_selected") || selected_country == "")
	{
		city_obj.options.length = 0;

		if(from_page == "city_search") // For Multiple list of cities..
		{
			city_obj.options.size = 1;
			city_obj[0] = new Option("---------No City---------", "");
		}
		else
		{
			city_obj[0] = new Option("Select city", "");
		}

		return false;
	}

	if(flag == "Y") // required coz it doesnot preselect the values. it hides the form element by default..
	{
		document.getElementById("show_hide_city").style.display = "none";
	}

	document.getElementById("loading_city").innerHTML = "<img src=\"" + img_url + "/imgs/loading.gif\" hspace=\"16\" align=\"absmiddle\">";


	if(selected_city == "-")
		check_selected_city = "Other";
	else
		check_selected_city = selected_city;

	http.open("GET", myurl, true);
	http.onreadystatechange = useHttpResponse;
	http.send(null);

} // EO function display_dropdown()


// To populate the drop down with city values..
function useHttpResponse()
{
	// readyState = 0 being unintialised, 1 being loading, 2 being loaded, 3 being interactive and 4 being finished
	if (http.readyState == 4 && http.status == 200)
	{
		var textout = http.responseText;

		myString    = new String(textout);
		splitString = myString.split("|");

		check_city_obj.options.length = 0;
		if(check_city_from_page == "city_search") // For Multiple list of cities..
		{
			check_city_obj[0] = new Option("---------Select city---------", "");

			if(splitString)
			{
				if(splitString.length < 5)
				{
					check_city_obj.options.size = splitString.length+1;
				}
				else
				{
					check_city_obj.options.size = 5;
				}
			}
			else
			{
				check_city_obj.options.size = 1;
			}
		}
		else
		{
			check_city_obj[0] = new Option("Select city", "");
		}

		
		for(var i=0; i<splitString.length; i++)
		{
			var curr_city = splitString[i].trim();
			var curr_city_val;

			//when getting 'Other' value then internally in database passing it as '-'..
			if(curr_city == "Other")
			{
				curr_city_val = "-";
			}
			else
			{
				curr_city_val = curr_city;
			}

			if(curr_city)
			{
				//Creating new options of city ..
				check_selected_city_spilt_string = check_selected_city.split('|');
					
				if (InArray(check_selected_city_spilt_string, curr_city) >= 0)
				{
					check_city_obj[i+1] = new Option(curr_city, curr_city_val, false, true);
					check_city_obj[i+1].selected = true;
				}
				else
				{
					check_city_obj[i+1] = new Option(curr_city, curr_city_val);
				}
			}
		}

		document.getElementById("loading_city").innerHTML = "";
		document.getElementById("show_hide_city").style.display = "";
	}
}

//################################ END ####################################



//################ Builds the options for Refined City drop down..###################


/* Called from :

- searchresults -> Action page of City Search, Keyword Search, Smart Search.

*/


//Instatiate another object to call method..
var http_refined_city = new getHTTPObject();

var check_selected_refined_city;
var check_refined_city_obj;


function display_refined_city_dropdown(selected_country, selected_city, search_id)
{
	var myurl = "/ssi/ajax-refined-city.php?country=" + escape(selected_country) + "&search_id=" + escape(search_id);

	check_refined_city_obj_new = document.refinedsearchnew.elements['nearestcityarray[]'];
	check_refined_city_obj = document.refinedsearch.elements['nearestcityarray[]'];

	if(selected_country == "")
	{
		check_refined_city_obj.options.length = 0;
		check_refined_city_obj_new.options.length = 0;
		check_refined_city_obj[0] = new Option("Doesn't Matter", "");
		check_refined_city_obj_new[0] = new Option("Doesn't Matter", "");
		return false;
	}

	if(selected_city)
	{
		check_selected_refined_city = selected_city;
	}

	http_refined_city.open("GET", myurl, true);
	http_refined_city.onreadystatechange = useHttpResponse_refined_city;
	http_refined_city.send(null);

} // EO function display_state_dropdown()


// To populate the drop down with city values..
function useHttpResponse_refined_city()
{
	if (http_refined_city.readyState == 4 && http_refined_city.status == 200)
	{
		var textout = http_refined_city.responseText;

		myString    = new String(textout);
		splitString = myString.split("|");

		check_refined_city_obj.options.length = 0;
		check_refined_city_obj_new.options.length = 0;
		check_refined_city_obj[0] = new Option("Doesn't Matter", "");
		check_refined_city_obj_new[0] = new Option("Doesn't Matter", "");

		for(var i=0; i<splitString.length; i++)
		{
			var curr_refined_city = splitString[i].trim();
			
			//Creating new options of city ..
			if(curr_refined_city)
			{
				//Creating new options of state ..
				if(curr_refined_city == check_selected_refined_city)
				{
					check_refined_city_obj[i+1] = new Option(curr_refined_city, curr_refined_city, false, true);
					check_refined_city_obj[i+1].selected = true;
					check_refined_city_obj_new[i+1] = new Option(curr_refined_city, curr_refined_city, false, true);
					check_refined_city_obj_new[i+1].selected = true;
				}
				else
				{
					check_refined_city_obj[i+1] = new Option(curr_refined_city, curr_refined_city);
					check_refined_city_obj_new[i+1] = new Option(curr_refined_city, curr_refined_city);
				}
			}
		}

	}
}

//################################ END ####################################





//################################ START CASTE ####################################


//Instantiate an object to call method..
var http_caste = new getHTTPObject();

var check_from_page;
var check_selected_caste;

function display_dropdown_caste(from_page, selected_caste, gender)
{
	if(from_page == "registration")
	{
		var frm_obj		  = document.profile;
		var community_obj = frm_obj.religion;
		var mothertongue_obj = frm_obj.elements['mothertongue'];	
	}
	else if(from_page == "smart_search")
	{
		var frm_obj		  = document.frm_main;
		var community_obj = frm_obj.elements['communityarray[]'];
		var mothertongue_obj = frm_obj.elements['mothertonguearray[]'];	
	}
	else
	{
		var frm_obj		  = document.quicksearch;
		var community_obj = frm_obj.community;
		var mothertongue_obj = frm_obj.elements['mothertonguearray[]'];	
	}

	var community		 = "";
	var mothertongue	 = "";

	check_from_page		 = from_page;
	check_selected_caste = selected_caste;

	//###### We need to pass community(only religion) while building the caste options.. ######
	
	if(check_from_page == "smart_search")
	{
		// This for loop is to pass multiple communities to the ajax script..
		for(var i=0; i < community_obj.options.length; i++)
		{
			var community_value = community_obj.options[i].value;

			if(!community.match(community_value)) // Not to insert duplicate values..
			{
				community += new String(community_value).split("|")[0] + "|"; // Taking only 1st element like 'Hindu'.
			}

		} // EO for(var i=0; i < community_obj.options.length; i++)
	}
	else // Other searches..we can at a time select only one community..
	{
		community = new String(community_obj.options[community_obj.selectedIndex].value).split("|")[0];
	}
	
	
	//###### We need to pass community while building the caste options.. ######



	//###### Passing mothertongue while building the caste options.. ######

	var arr_mothertongue = new Array;
	// This for loop is to pass multiple mothertongues to the ajax script..
	var j = 0;
	for(var i=0; i < mothertongue_obj.options.length; i++)
	{
		var mothertongue_value = mothertongue_obj.options[i].value;

		if(check_from_page == "smart_search") // We are by default taking all added mothertongues
		{
			// Not to insert duplicate values..
			if(!mothertongue.match(mothertongue_value))
			{
				if(mothertongue_value)
				{
					arr_mothertongue[j] = mothertongue_value;
				}
			}
		}
		else // We are taking only selected mothertongues.. in other searches..
		{
			if(mothertongue_obj.options[i].selected == true)
			{
				if(mothertongue_value)
				{
					arr_mothertongue[j] = mothertongue_value;
				}
			}
		}

		j++;

	} // EO for(var i=0; i < mothertongue_obj.options.length; i++)


	if(arr_mothertongue)
	{
		mothertongue = arr_mothertongue.join("|");
	}

	//###### Passing mothertongue while building the caste options.. ######

	if(community && mothertongue && gender)
	{
		//var url = "/ssi/ajax-community.php?community=" + escape(community) + "&mothertongue=" + escape(mothertongue)+ "&gender=" + escape(gender) + "&from_page=" + escape(from_page);
		//http_caste.open("GET", url, true);
		//http_caste.onreadystatechange = useHttpResponse_caste;
		//http_caste.send(null);
	}

} // EO function display_dropdown_caste()



function useHttpResponse_caste()
{
	if(http_caste.readyState == 4 && http_caste.status == 200)
	{
		var caste = http_caste.responseText;

		if(check_from_page == "registration")
		{
			var caste_obj = document.profile.elements['caste'];
		}
		else if(check_from_page == "smart_search") // Multiple select at a time..
		{
			var caste_obj = document.frm_main.elements['caste_fromarray[]'];

			// This is used to preselect the castes in smart search..
			var caste_to_obj = document.frm_main.elements['castearray[]'];

			var arr_rightlist_caste = new Array();
			for(var k=0; k<caste_to_obj.options.length; k++)
			{
				arr_rightlist_caste[k] = caste_to_obj.options[k].value;

			} // EO for(var k=0; k<community_obj.options.length; k++)

			//If user has selected castes n then he changes the gender field then we r nullifying the caste list.
			caste_to_obj.options.length = 0;
		}
		else
		{
			var caste_obj = document.quicksearch.elements['castearray[]'];
		}

		if(caste != "") // If caste exists then display it..
		{
			var caste_txt_val		 = new String(caste).split("|");
			caste_obj.options.length = 0;
			caste_obj[0]			 = new Option("---------Select Caste---------", "");

			if(check_from_page != "registration" && check_from_page != "smart_search")
			{
				// For limiting the size of caste list box..
				if(caste_txt_val.length > 5)
				{
					caste_obj.size = 5;
				}
				else
				{
					caste_obj.size = caste_txt_val.length+1;
				}

			} // EO if(check_from_page == "registration")

			var j = 1;
			var m = 0;
			for(var i=0; i<caste_txt_val.length; i++)
			{
				var caste_txt  = caste_txt_val[i].trim();

				// Splitting the db values n then checking if it matches for preselection..
				check_selected_caste_spilt_string = check_selected_caste.split('|');

				if(caste_txt && InArray(check_selected_caste_spilt_string, caste_txt) >= 0)
				{
					if(check_from_page == "smart_search") // For preselected values, putting them in right list
					{
						caste_to_obj[m] = new Option(caste_txt, caste_txt);
						m++;
					}
					else // For other searches, selecting value from the list..
					{
						caste_obj[j] = new Option(caste_txt, caste_txt, false, true);
						caste_obj[j].selected = true;
						j++;
					}					
				}
				else
				{
					if(check_from_page == "smart_search"
					&& InArray(arr_rightlist_caste, caste_txt) >= 0) 
					{
						caste_to_obj[m] = new Option(caste_txt, caste_txt);
						m++;
					}
					else
					{
						caste_obj[j] = new Option(caste_txt, caste_txt);
						j++;
					}
				}

			} // EO for(var i=0; i<caste_txt_val.length; i++)

			document.getElementById("show_hide_caste").style.display = "";
		}
		else // If caste doesnot exist then hide it..
		{
			if(check_from_page == "registration")
			{
				caste_obj.options.length = 0;
				caste_obj[0]			 = new Option("---------Select Caste---------", "");
			}
			else
			{
				document.getElementById("show_hide_caste").style.display = "none";
				return false;
			}
		}

	} // EO if(http_caste.readyState == 4 && http_caste.status == 200)

} // EO useHttpResponse_caste()


//################################ END CASTE ####################################





// Minimum Characters Validation..
function check_keyword(obj)
{
	var _iMinLength = 4;

	myString = new String(obj.value);
	var keyword = myString.trim();

	if(keyword && keyword.length < _iMinLength)
	{
		alert('Please enter atleast '+_iMinLength+' characters.');
		return false;
	}

	return true;

} // EO function check_keyword()


//-->