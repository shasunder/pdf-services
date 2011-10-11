
// define messages related to fields over here
var aMessages = new Array();

aMessages["gender"] = new Array();
aMessages["gender"]["blank"] = "Please select gender of the person looking to get married.";

aMessages["dateofbirth"] = new Array();
aMessages["dateofbirth"]["blank"] = "Please select the Date of Birth of the person looking to get married.";
aMessages["dateofbirth"]["Invalid"] = "Incorrect Date of Birth. Please select the correct <br>Date of Birth of the person looking to get married.";
//aMessages["dateofbirth"]["check if valid"] = "Checking if Date of Birth is valid...";
aMessages["dateofbirth"]["check if valid"] = "";
aMessages["dateofbirth"]["check if valid error"] = "A technical error occurred while checking the Date of Birth. Please select the Date of Birth again.";

aMessages["relationship"] = new Array();
aMessages["relationship"]["blank"] = "Please specify your relationship with the person looking to get married.";

aMessages["maritalstatus"] = new Array();
aMessages["maritalstatus"]["blank"] = "Please specify marital status of the person looking to get married.";

aMessages["havechildren"] = new Array();
aMessages["havechildren"]["blank"] = "Please specify if the person looking to get married has children.";

aMessages["height"] = new Array();
aMessages["height"]["blank"] = "Please specify height of the person looking to get married.";

aMessages["bodytype"] = new Array();
aMessages["bodytype"]["blank"] = "Please specify body type of the person looking to get married.";

aMessages["complexion"] = new Array();
aMessages["complexion"]["blank"] = "Please specify complexion of the person looking to get married.";

aMessages["specialcases"] = new Array();
aMessages["specialcases"]["blank"] = "Please specify if the person looking to get married is categorized as a special case.";

aMessages["religion"] = new Array();
aMessages["religion"]["blank"] = "Please specify religion of the person looking to get married.";

aMessages["mothertongue"] = new Array();
aMessages["mothertongue"]["blank"] = "Please specify mother tongue of the person looking to get married.";

aMessages["caste"] = new Array();
aMessages["caste"]["blank"] = "Please specify caste of the person looking to get married.";

aMessages["manglik"] = new Array();
aMessages["manglik"]["blank"] = "Please specify if the person looking to get married is a manglik.";

aMessages["familyvalues"] = new Array();
aMessages["familyvalues"]["blank"] = "Please specify family values of the person looking to get married.";

aMessages["educationlevel"] = new Array();
aMessages["educationlevel"]["blank"] = "Please specify educational level of the person looking to get married.";

aMessages["educationarea"] = new Array();
aMessages["educationarea"]["blank"] = "Please specify educational area of the person looking to get married.";

aMessages["occupation"] = new Array();
aMessages["occupation"]["blank"] = "Please specify profession of the person looking to get married.";

aMessages["diet"] = new Array();
aMessages["diet"]["blank"] = "Please specify dietary habits of the person looking to get married.";

aMessages["smoke"] = new Array();
aMessages["smoke"]["blank"] = "Please specify smoking habits of the person looking to get married.";

aMessages["drink"] = new Array();
aMessages["drink"]["blank"] = "Please specify drinking habits of the person looking to get married.";

aMessages["stateofresidence"] = new Array();
aMessages["stateofresidence"]["blank"] = "Please specify state of current residence of the person looking to get married.";

aMessages["residencystatus"] = new Array();
aMessages["residencystatus"]["blank"] = "Please specify residency status of the person looking to get married.";

aMessages["type"] = new Array();
aMessages["type"]["blank"] = "Please specify type of phone number of the person who will handle your matrimonial enquiries.";

aMessages["country_code"] = new Array();
aMessages["country_code"]["blank"] = "Please specify country for phone number of the person who will handle your matrimonial enquiries.";

aMessages["std_code"] = new Array();
aMessages["std_code"]["invalid"] = "Invalid Area/STD code - Area/STD code of the phone number of the person who will handle your matrimonial enquiries must contain only numbers.";
aMessages["std_code"]["length > 6"] = "Invalid Area/STD code - Area/STD code of the phone number of the person who will handle your matrimonial enquiries must contain maximum 6 characters.";

aMessages["contact_number"] = new Array();
aMessages["contact_number"]["blank"] = "Please specify phone number of the person who will handle your matrimonial enquiries.";
aMessages["contact_number"]["invalid"] = "Invalid Phone Number - Phone number of the person who will handle your matrimonial enquiries must contain only numbers.";
aMessages["contact_number"]["length > 15"] = "Invalid Phone Number - Phone number of the person who will handle your matrimonial enquiries must contain maximum 15 characters.";

aMessages["contact_details_contact_person"] = new Array();
aMessages["contact_details_contact_person"]["blank"] = "Please specify name of person who will handle your matrimonial enquiries.";
aMessages["contact_details_contact_person"]["alpha_num_only"] = "Invalid Name of Contact Person - Your Name of Contact Person must contain only alphabetical characters.";
aMessages["contact_details_contact_person"]["length > 50"] = "Invalid Name of Contact Person - Your Name of Contact Person must contain maximum 50 characters";

aMessages["contact_details_relationship"] = new Array();
aMessages["contact_details_relationship"]["blank"] = "Please select the contact persons relationship with the person looking to get married.";

aMessages["contact_details_convenient_time"] = new Array();
aMessages["contact_details_convenient_time"]["blank"] = "Please specify convenient time to call the contact person.";
aMessages["contact_details_convenient_time"]["alpha_num_only"] = "Invalid Convenient Time to Call - Your Convenient Time alphabetical and numeric characters.";
aMessages["contact_details_convenient_time"]["length > 50"] = "Invalid Convenient Time to Call - You Convenient Time to Call maximum can contain  50 characters";

aMessages["contact_details_dislay_status"] = new Array();
aMessages["contact_details_dislay_status"]["blank"] = "Please select if you wish to display the contact details to Premium Members.";

aMessages["family_father"] = new Array();
aMessages["family_father"]["blank"] = "Please specify relevant information of father.";

aMessages["family_mother"] = new Array();
aMessages["family_mother"]["blank"] = "Please specify relevant information of mother.";

aMessages["num_of_brother"] = new Array();
aMessages["num_of_brother"]["blank"] = "Please specify total number of brother(s) the person looking to get married has.";

aMessages["num_of_married_brother"] = new Array();
aMessages["num_of_married_brother"]["blank"] = "Please specify number of brother(s) married.";

aMessages["num_of_sister"] = new Array();
aMessages["num_of_sister"]["blank"] = "Please specify total number of sister(s) the person looking to get married has.";

aMessages["num_of_married_sister"] = new Array();
aMessages["num_of_married_sister"]["blank"] = "Please specify number of sister(s) married.";

aMessages["aboutyourself"] = new Array();
aMessages["aboutyourself"]["blank"] = "Please specify more details about the person looking to get married.";
aMessages["aboutyourself"]["length < 100"] = "Details about the person looking to get married should have minimum 100 characters.";
aMessages["aboutyourself"]["length > 4000"] = "Details about the person looking to get married should have maximum 4000 characters.";

aMessages["aboutfamily"] = new Array();
aMessages["aboutfamily"]["blank"] = "Please specify family values of the person looking to get married.";
aMessages["aboutfamily"]["length > 1000"] = "Invalid - More about Your family (Please specify only 1000 characters)";

aMessages["newlogin"] = new Array();
aMessages["newlogin"]["blank"] = "Please type a Profile ID.";
aMessages["newlogin"]["^0-9a-z_"] = "Incorrect format for Profile ID. Please use only alphabets, numerals and underscore '_'.";
aMessages["newlogin"]["length < 4"] = "Profile ID is too short. Please use atleast 4 characters.";
aMessages["newlogin"]["length > 20"] = "Profile ID is too long. Please use between 4 to 20 characters.";
aMessages["newlogin"]["_$"] = "Incorrect format for Profile ID. Please do not end your Profile ID with an '_'.";
aMessages["newlogin"]["^_"] = "Incorrect format for Profile ID. Please do not begin your Profile ID with an '_'.";
aMessages["newlogin"]["numerics > 4"] = "Too many numbers in Profile ID. Please do not use more than 4 numeric characters.";
aMessages["newlogin"]["check if available"] = "Checking if Profile ID is available...";
aMessages["newlogin"]["check if available error"] = "A technical error occurred while processing your Profile ID request. Please type your Profile ID again.";


// validated ajax values
sLoginValidatedVal = "";
sEmailValidatedVal = "";
sDateOfBirthValidatedVal = "";


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




function toggleHint(sMode, sElementName)
{
	sDisplay = (sMode == "show") ? "inline" : "none";

	if(oElement = eval(document.getElementById('hint_' + sElementName)))
	{
		oElement.style.display = sDisplay;
	}
}



function sbt_frm_data()
{
	var oElement = new Object();
	var oDF = document.forms["profile"];

	var reg_gender = (oDF.gender[0].checked) ? oDF.gender[0].value : '';
	reg_gender = (!reg_gender && oDF.gender[1].checked) ? oDF.gender[1].value : reg_gender;
	
	var dob_day = oDF.day.options[oDF.day.selectedIndex].text;
	var dob_month = oDF.month.options[oDF.month.selectedIndex].text;
	var dob_year = oDF.year.options[oDF.year.selectedIndex].text;

	var dateofbirth = dob_day + "/" + dob_month + "/" + dob_year;

	var relationship = oDF.relationship.options[oDF.relationship.selectedIndex].text;

	var maritalstatus = oDF.maritalstatus.options[oDF.maritalstatus.selectedIndex].text;
	var children = oDF.havechildren.options[oDF.havechildren.selectedIndex].text;
	var height = oDF.height.options[oDF.height.selectedIndex].text;
	var bodytype = oDF.bodytype.options[oDF.bodytype.selectedIndex].text;
	var complexion = oDF.complexion.options[oDF.complexion.selectedIndex].text;
	var specialcases = oDF.specialcases.options[oDF.specialcases.selectedIndex].text;
	var religion = oDF.religion.options[oDF.religion.selectedIndex].text;
	var mothertongue = oDF.mothertongue.options[oDF.mothertongue.selectedIndex].text;
	var caste = oDF.caste.options[oDF.caste.selectedIndex].text;
	var subcaste = oDF.subcaste.value;
	var manglik = oDF.manglik.options[oDF.manglik.selectedIndex].text;
	var familyvalues = oDF.familyvalues.options[oDF.familyvalues.selectedIndex].text;
	var educationarea = oDF.educationarea.options[oDF.educationarea.selectedIndex].text;
	var educationlevel = oDF.educationlevel.options[oDF.educationlevel.selectedIndex].text;
	var occupation = oDF.occupation.options[oDF.occupation.selectedIndex].text;
	var diet = oDF.diet.options[oDF.diet.selectedIndex].text;
	var smoke = oDF.smoke.options[oDF.smoke.selectedIndex].text;
	var drink = oDF.drink.options[oDF.drink.selectedIndex].text;

	var countryofresidence = oDF.countryofresidence.value;
	countryofresidence = (!countryofresidence) ? oDF.countryofresidence.options[oDF.countryofresidence.selectedIndex].text : countryofresidence;

	var stateofresidence = oDF.stateofresidence.options[oDF.stateofresidence.selectedIndex].text;
	var nearest_city = oDF.nearest_city.options[oDF.nearest_city.selectedIndex].text;
	var residencystatus = oDF.residencystatus.options[oDF.residencystatus.selectedIndex].text;

	var pcd_tel_type = (oDF.type[0].checked) ? oDF.type[0].value : '';
	pcd_tel_type = (!pcd_tel_type && oDF.type[1].checked) ? oDF.type[1].value : pcd_tel_type;


	var pcd_tel_country = oDF.country_code.options[oDF.country_code.selectedIndex].text;

	var pcd_tel_isd = oDF.country_code.options[oDF.country_code.selectedIndex].value.split('|');
	pcd_tel_isd = pcd_tel_isd[0];

	var pcd_tel_std = (oDF.std_code) ? oDF.std_code.value : '';
	var pcd_tel_number = oDF.contact_number.value;

	var pcd_status = (oDF.contact_details_dislay_status[0].checked) ? oDF.contact_details_dislay_status[0].value : '';
	pcd_status = (!pcd_status && oDF.contact_details_dislay_status[1].checked) ? oDF.contact_details_dislay_status[1].value : pcd_status;

	var po_aboutyourself = oDF.aboutyourself.value;
	var error = oDF.error.value;
	var reg_status = oDF.status.value;

	sParams = "mode=store_reg2_filled_data";
	sParams += "&from_page=reg-page-2";
	sParams += "&memberlogin=" + escape(oDF.login.value);
	sParams += (reg_gender) ? "&reg_gender=" + escape(reg_gender) : "";
	sParams += (dateofbirth) ? "&dateofbirth=" + escape(dateofbirth) : "";
	sParams += (relationship && relationship != 'Select') ? "&relationship=" + escape(relationship) : "";
	sParams += (maritalstatus && maritalstatus != 'Select') ? "&maritalstatus=" + escape(maritalstatus) : "";
	sParams += (children && children != 'Select') ? "&children=" + escape(children) : "";
	sParams += (height && height != 'Select') ? "&height=" + escape(height) : "";
	sParams += (bodytype && bodytype != 'Select') ? "&bodytype=" + escape(bodytype) : "";
	sParams += (complexion && complexion != 'Select') ? "&complexion=" + escape(complexion) : "";
	sParams += (specialcases && specialcases != 'Select') ? "&specialcases=" + escape(specialcases) : "";
	sParams += (religion && religion != '---------Select Religion---------') ? "&religion=" + escape(religion) : "";
	sParams += (mothertongue && mothertongue != '----Select Mother Tongue----') ? "&mothertongue=" + escape(mothertongue) : "";
	sParams += (caste && caste != '---------Select Caste---------') ? "&caste=" + escape(caste) : "";
	sParams += (subcaste) ? "&subcaste=" + escape(subcaste) : "";
	sParams += (manglik && manglik != 'Select') ? "&manglik=" + escape(manglik) : "";
	sParams += (familyvalues && familyvalues != 'Select') ? "&familyvalues=" + escape(familyvalues) : "";
	sParams += (educationarea && educationarea != 'Select') ? "&educationarea=" + escape(educationarea) : "";
	sParams += (educationlevel && educationlevel != 'Select') ? "&educationlevel=" + escape(educationlevel) : "";
	sParams += (occupation && occupation != 'Select') ? "&occupation=" + escape(occupation) : "";
	sParams += (diet && diet != 'Select') ? "&diet=" + escape(diet) : "";
	sParams += (smoke && smoke != 'Select') ? "&smoke=" + escape(smoke) : "";
	sParams += (drink && drink != 'Select') ? "&drink=" + escape(drink) : "";
	sParams += (countryofresidence && countryofresidence != 'Select a country') ? "&countryofresidence=" + escape(countryofresidence) : "";
	sParams += (stateofresidence && stateofresidence != 'Select state' && stateofresidence != 'Select a state') ? "&stateofresidence=" + escape(stateofresidence) : "";
	sParams += (nearest_city && nearest_city != 'Select a city') ? "&nearest_city=" + escape(nearest_city) : "";
	sParams += (residencystatus && residencystatus != 'Select') ? "&residencystatus=" + escape(residencystatus) : "";
	sParams += (pcd_tel_type) ? "&pcd_tel_type=" + escape(pcd_tel_type) : "";
	sParams += (pcd_tel_country && pcd_tel_country != 'Select') ? "&pcd_tel_country=" + escape(pcd_tel_country) : "";
	sParams += (pcd_tel_isd) ? "&pcd_tel_isd=" + escape(pcd_tel_isd) : "";
	sParams += (pcd_tel_std) ? "&pcd_tel_std=" + escape(pcd_tel_std) : "";
	sParams += (pcd_tel_number) ? "&pcd_tel_number=" + escape(pcd_tel_number) : "";
	sParams += (pcd_status) ? "&pcd_status=" + escape(pcd_status) : "";
	sParams += (po_aboutyourself) ? "&po_aboutyourself=" + escape(po_aboutyourself) : "";
	sParams += (error) ? "&error=" + escape(error) : "";
	sParams += (reg_status) ? "&reg_status=" + escape(reg_status) : "";


	sUrl = "/ssi/ajax/registration.php";
	//prompt('', sUrl + "?" + sParams);return;
	sendRequestAndGetResponse(sUrl, oElement, "", "", "POST", sParams);

} // EO validate_newlogin()




function validate_newlogin()
{
	var oField = document.forms["profile"].newlogin;
	var oElement = document.getElementById('errmsg_newlogin');

	oField.value = oField.value.trim();
	toggleHint('hide', 'newlogin');
	oElement.innerHTML = "";
	oField.className = "field_filled";

	oRegX = new RegExp(/^[0-9a-z_]+$/gi);

	if(oField.value == "")
	{
		oElement.innerHTML = aMessages["newlogin"]["blank"];
		oField.className = "field_err";
	}
	else if(oField.value.length < 4)
	{
		oElement.innerHTML = aMessages["newlogin"]["length < 4"];
		oField.className = "field_err";
	}
	else if(oField.value.length > 20)
	{
		oElement.innerHTML = aMessages["newlogin"]["length > 20"];
		oField.className = "field_err";
	}
	else if(/_$/.test(oField.value))
	{
		oElement.innerHTML = aMessages["newlogin"]["_$"];
		oField.className = "field_err";
	}
	else if(/^_/.test(oField.value))
	{
		oElement.innerHTML = aMessages["newlogin"]["^_"];
		oField.className = "field_err";
	}
	else if(!oRegX.test(oField.value))
	{
		oElement.innerHTML = aMessages["newlogin"]["^0-9a-z_"];
		oField.className = "field_err";
	}
	else if(getNoOfNumerics(oField.value) > 4)
	{
		oElement.innerHTML = aMessages["newlogin"]["numerics > 4"];
		oField.className = "field_err";
	}
	else
	{
		sUrl = "/ssi/ajax/registration.php?mode=is_login_available&from_page=reg-page-2&login=" + escape(oField.value);
		sendRequestAndGetResponse(sUrl, oElement, aMessages["newlogin"]["check if available"], aMessages["newlogin"]["check if available error"]);
	}


} // EO validate_newlogin()



function getNoOfNumerics(sStr)
{
	var iNumericCharsCount = 0;

	for(i=0; i< sStr.length; i++)
	{
		if(!isNaN(sStr.charAt(i)))
		{
			iNumericCharsCount++;
		}
	}

	return iNumericCharsCount;
}


function validate_religion(sFieldName)
{
	var oField = document.forms["profile"].religion;
	var oElement = document.getElementById('errmsg_religion');

	toggleHint('hide', 'religion');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].value == "")
	{
		oElement.innerHTML = aMessages["religion"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_religion()

function validate_caste(sFieldName)
{
	var oField = document.forms["profile"].caste;
	var oElement = document.getElementById('errmsg_caste');

	toggleHint('hide', 'caste');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].value == "")
	{
		oElement.innerHTML = aMessages["caste"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_caste()


function validate_gender()
{
	var oField = document.forms["profile"].gender;
	var oElement = document.getElementById('errmsg_gender');

	toggleHint('hide', 'gender');
	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField[0].checked == false
	&& oField[1].checked == false)
	{
		oElement.innerHTML = aMessages["gender"]["blank"];
	}

} // EO validate_gender()

function validate_type()
{
	var oField = document.forms["profile"].type;
	var oElement = document.getElementById('errmsg_type');

	toggleHint('hide', 'type');
	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField[0].checked == false
	&& oField[1].checked == false)
	{
		oElement.innerHTML = aMessages["type"]["blank"];
	}

} // EO validate_type()



function validate_contact_details_contact_person()
{
	var oField = document.forms["profile"].contact_details_contact_person;
	var oElement = document.getElementById('errmsg_contact_details_contact_person');

	oField.value = oField.value.trim();
	toggleHint('hide', 'contact_details_contact_person');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	oRegX = new RegExp(/^([a-z \.])+$/gi);

	if(oField.value == "")
	{
		oElement.innerHTML = aMessages["contact_details_contact_person"]["blank"];
		oField.className = "field_err";
	}
	else if(!oRegX.test(oField.value))
	{
		oElement.innerHTML = aMessages["contact_details_contact_person"]["alpha_num_only"];
		oField.className = "field_err";
	}
	else if(oField.value.length > 50)
	{
		oElement.innerHTML = aMessages["contact_details_contact_person"]["length > 50"];
		oField.className = "field_err";
	}

} // EO validate_contact_details_contact_person()



function validate_contact_details_convenient_time()
{
	var oField = document.forms["profile"].contact_details_convenient_time;
	var oElement = document.getElementById('errmsg_contact_details_convenient_time');

	oField.value = oField.value.trim();
	toggleHint('hide', 'contact_details_convenient_time');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	oRegX = new RegExp(/^([a-z0-9 \.,:-])+$/gi);

	if(oField.value == "")
	{
		oElement.innerHTML = aMessages["contact_details_convenient_time"]["blank"];
		oField.className = "field_err";
	}
	else if(!oRegX.test(oField.value))
	{
		oElement.innerHTML = aMessages["contact_details_convenient_time"]["alpha_num_only"];
		oField.className = "field_err";
	}
	else if(oField.value.length > 50)
	{
		oElement.innerHTML = aMessages["contact_details_convenient_time"]["length > 50"];
		oField.className = "field_err";
	}

} // EO validate_contact_details_convenient_time()


function validate_contact_details_dislay_status()
{
	var oField = document.forms["profile"].contact_details_dislay_status;
	var oElement = document.getElementById('errmsg_contact_details_dislay_status');

	toggleHint('hide', 'contact_details_dislay_status');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField[0].checked == false
	&& oField[1].checked == false)
	{
		oElement.innerHTML = aMessages["contact_details_dislay_status"]["blank"];
	}

} // EO validate_contact_details_dislay_status()



function validate_dateofbirth(sFieldName)
{


	toggleHint('hide', 'dateofbirth');

} // EO validate_dateofbirth()



function validate_relationship(sFieldName)
{
	var oField = document.forms["profile"].relationship;
	var oElement = document.getElementById('errmsg_relationship');

	toggleHint('hide', 'relationship');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["relationship"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_relationship()

function check_maritalstatus()
{
	var oField = document.forms["profile"].maritalstatus;
	var oField1 = document.forms["profile"].havechildren;

	// added to hide error message when marital status is 'Never Married' - gaurang 
	var oField2 = document.getElementById('errmsg_havechildren');

	oField.className = "field_filled";
	if(oField.options[oField.selectedIndex].text == "Never Married")
	{
		oField1.options[1].selected = true;
		//oField1.disabled = true;
		//oField1.className = "field_filled";
		//oField2.innerHTML = "";
	}
	else
	{
		oField1.disabled = false;
		oField1.options[0].selected = true;
		oField1.className = "field";
	}

} // EO check_maritalstatus()

function validate_maritalstatus(sFieldName)
{
	var oField = document.forms["profile"].maritalstatus;
	var oElement = document.getElementById('errmsg_maritalstatus');

	toggleHint('hide', 'maritalstatus');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["maritalstatus"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_maritalstatus()

function validate_contact_details_relationship(sFieldName)
{
	var oField = document.forms["profile"].contact_details_relationship;
	var oElement = document.getElementById('errmsg_contact_details_relationship');

	toggleHint('hide', 'contact_details_relationship');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["contact_details_relationship"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_contact_details_relationship()

function validate_mothertongue(sFieldName)
{
	var oField = document.forms["profile"].mothertongue;
	var oElement = document.getElementById('errmsg_mothertongue');

	toggleHint('hide', 'mothertongue');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].value == "")
	{
		oElement.innerHTML = aMessages["mothertongue"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_mothertongue()

function validate_havechildren(sFieldName)
{
	var oField = document.forms["profile"].havechildren;
	var oElement = document.getElementById('errmsg_havechildren');
	toggleHint('hide', 'havechildren');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["havechildren"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_havechildren()

function validate_height(sFieldName)
{
	var oField = document.forms["profile"].height;
	var oElement = document.getElementById('errmsg_height');

	toggleHint('hide', 'height');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].value == "")
	{
		oElement.innerHTML = aMessages["height"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_height()

function validate_bodytype(sFieldName)
{
	var oField = document.forms["profile"].bodytype;
	var oElement = document.getElementById('errmsg_bodytype');

	toggleHint('hide', 'bodytype');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["bodytype"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_bodytype()

function validate_complexion(sFieldName)
{
	var oField = document.forms["profile"].complexion;
	var oElement = document.getElementById('errmsg_complexion');

	toggleHint('hide', 'complexion');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["complexion"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_complexion()

function validate_specialcases(sFieldName)
{
	var oField = document.forms["profile"].specialcases;
	var oElement = document.getElementById('errmsg_specialcases');

	toggleHint('hide', 'specialcases');

	oElement.innerHTML = "";
	oField.className = "field_filled1";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["specialcases"]["blank"];
		oField.className = "field_err1";
	}

} // EO validate_specialcases()

function validate_educationlevel(sFieldName)
{
	var oField = document.forms["profile"].educationlevel;
	var oElement = document.getElementById('errmsg_educationlevel');
	var oElement1 = document.getElementById('errmsg_educationarea');

	toggleHint('hide', 'educationlevel');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].value == "")
	{
		oElement1.innerHTML = "";
		oElement.innerHTML = aMessages["educationlevel"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_educationlevel()

function validate_educationarea(sFieldName)
{
	var oField = document.forms["profile"].educationarea;
	var oElement = document.getElementById('errmsg_educationarea');
	var oElement1 = document.getElementById('errmsg_educationlevel');

	toggleHint('hide', 'educationarea');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].value == "")
	{
		oElement1.innerHTML = "";
		oElement.innerHTML = aMessages["educationarea"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_educationarea()

function validate_num_of_brother(sFieldName)
{
	var oField = document.forms["profile"].num_of_brother;
	var oField1 = document.forms["profile"].num_of_married_brother;
	var oElement = document.getElementById('errmsg_num_of_brother');
	var oElement1 = document.getElementById('errmsg_num_of_married_brother');

	toggleHint('hide', 'num_of_brother');

	oElement.innerHTML = "";
	oField.className = "field_filled1";

	if(oField1.options[oField.selectedIndex].text == "0")
	{
		oElement1.innerHTML = "";
		oField1.className = "field_filled1";
	}

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		//oElement1.innerHTML = "";
		oElement.innerHTML = aMessages["num_of_brother"]["blank"];
		oField.className = "field_err1";
	}

} // EO validate_num_of_brother()

function validate_num_of_married_brother(sFieldName)
{
	var oField = document.forms["profile"].num_of_married_brother;
	var oField1 = document.forms["profile"].num_of_brother;
	var oElement = document.getElementById('errmsg_num_of_married_brother');
	var oElement1 = document.getElementById('errmsg_num_of_brother');

	toggleHint('hide', 'num_of_married_brother');

	oElement.innerHTML = "";
	oField.className = "field_filled1";

	if(oField1.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = '<br>';
	}
	if(oField.options[oField.selectedIndex].text == "Select")
	{
		//oElement1.innerHTML = "";
		oElement.innerHTML += aMessages["num_of_married_brother"]["blank"];
		oField.className = "field_err1";
	}

} // EO validate_num_of_married_brother()

function validate_num_of_sister(sFieldName)
{
	var oField = document.forms["profile"].num_of_sister;
	var oField1 = document.forms["profile"].num_of_married_sister;
	var oElement = document.getElementById('errmsg_num_of_sister');
	var oElement1 = document.getElementById('errmsg_num_of_married_sister');

	toggleHint('hide', 'num_of_sister');

	oElement.innerHTML = "";
	oField.className = "field_filled1";


	if(oField1.options[oField.selectedIndex].text == "0")
	{
		oField1.className = "field_filled1";
		oElement1.innerHTML = "";
	}
	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement1.innerHTML = "";
		oElement.innerHTML = aMessages["num_of_sister"]["blank"];
		oField.className = "field_err1";
	}

} // EO validate_num_of_sister()

function validate_num_of_married_sister(sFieldName)
{
	var oField = document.forms["profile"].num_of_married_sister;
	var oField1 = document.forms["profile"].num_of_sister;
	var oElement = document.getElementById('errmsg_num_of_married_sister');
	var oElement1 = document.getElementById('errmsg_num_of_sister');

	toggleHint('hide', 'num_of_married_sister');

	oElement.innerHTML = "";
	oField.className = "field_filled1";

	if(oField1.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = '<br>';
	}
	if(oField.options[oField.selectedIndex].text == "Select")
	{
		//oElement1.innerHTML = "";
		oElement.innerHTML += aMessages["num_of_married_sister"]["blank"];
		oField.className = "field_err1";
	}

} // EO validate_num_of_married_sister()

function validate_occupation(sFieldName)
{
	var oField = document.forms["profile"].occupation;
	var oElement = document.getElementById('errmsg_occupation');

	toggleHint('hide', 'occupation');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages["occupation"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_occupation()

function validate_stateofresidence(sFieldName)
{
	var oField = document.forms["profile"].stateofresidence;
	var oElement = document.getElementById('errmsg_stateofresidence');

	toggleHint('hide', 'stateofresidence');

	oElement.innerHTML = "";
	oField.className = "field_filled";

	if(oField.options[oField.selectedIndex].value == "")
	{
		oElement.innerHTML = aMessages["stateofresidence"]["blank"];
		oField.className = "field_err";
	}

} // EO validate_stateofresidence()

function validate_country_select_box(sFieldName, sFilledClassName, sErrorClassName)
{
	var oField1 = document.forms["profile"].c_country_code;
	var oElement = document.getElementById('errmsg_' + sFieldName.name);

	toggleHint('hide', sFieldName.name);

	oElement.innerHTML = "";
	sFieldName.className = sFilledClassName;
	oField1.className = sFilledClassName;

	if(sFieldName.options[sFieldName.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages[sFieldName.name]["blank"];
		sFieldName.className = sErrorClassName;
		oField1.className = sErrorClassName;
	}

} // EO validate_country_select_box()

function validate_select_box(sFieldName, sFilledClassName, sErrorClassName)
{
	var oElement = document.getElementById('errmsg_' + sFieldName.name);

	toggleHint('hide', sFieldName.name);

	oElement.innerHTML = "";
	sFieldName.className = sFilledClassName;

	if(sFieldName.options[sFieldName.selectedIndex].text == "Select")
	{
		oElement.innerHTML = aMessages[sFieldName.name]["blank"];
		sFieldName.className = sErrorClassName;
	}

} // EO validate_select_box()

function validate_std_code(sFieldName, sFilledClassName, sErrorClassName)
{
	var oElement1 = document.getElementById('errmsg_contact_number');
	var oElement = document.getElementById('errmsg_' + sFieldName.name);

	toggleHint('hide', sFieldName.name);
	sFieldName.value = sFieldName.value.trim();
	oElement.innerHTML = "";
	sFieldName.className = sFilledClassName;

	if(sFieldName.value != "")
	{
		if(isNaN(sFieldName.value))
		{
			//oElement1.innerHTML = "";
			oElement.innerHTML = aMessages[sFieldName.name]["invalid"];
			sFieldName.className = sErrorClassName;
		}
		else if(sFieldName.value.length > 6)
		{
			//oElement1.innerHTML = "";
			oElement.innerHTML = aMessages[sFieldName.name]["length > 6"];
			sFieldName.className = sErrorClassName;
		}
	}

	if (oElement1.innerHTML != "")
	{
		oElement.innerHTML += "<br>";
	}


} // EO validate_c_country_code()

function validate_contact_number(sFieldName, sFilledClassName, sErrorClassName)
{
	var oElement1 = document.getElementById('errmsg_std_code');
	var oElement = document.getElementById('errmsg_' + sFieldName.name);

	toggleHint('hide', sFieldName.name);

	oElement.innerHTML = "";
	sFieldName.className = sFilledClassName;
	sFieldName.value = sFieldName.value.trim();

	if(oElement1.innerHTML != "")
	{
		oElement.innerHTML = '<br>';
	}
	if(sFieldName.value == "")
	{
		//oElement1.innerHTML = "";
		oElement.innerHTML += aMessages[sFieldName.name]["blank"];
		sFieldName.className = sErrorClassName;
	}
	else if(isNaN(sFieldName.value))
	{
		//oElement1.innerHTML = "";
		oElement.innerHTML += aMessages[sFieldName.name]["invalid"];
		sFieldName.className = sErrorClassName;
	}
	else if(sFieldName.value.length > 15)
	{
		//oElement1.innerHTML = "";
		oElement.innerHTML += aMessages[sFieldName.name]["length > 15"];
		sFieldName.className = sErrorClassName;
	}

} // EO validate_contact_number()

function validate_describe_yourself(sFieldName, sFilledClassName, sErrorClassName)
{
	var oElement = document.getElementById('errmsg_' + sFieldName.name);

	toggleHint('hide', sFieldName.name);

	oElement.innerHTML = "";
	sFieldName.className = sFilledClassName;
	sFieldName.value = sFieldName.value.trim();

	if(sFieldName.value == "")
	{
		oElement.innerHTML = aMessages[sFieldName.name]["blank"];
		sFieldName.className = sErrorClassName;
	}
	else if(sFieldName.value.length < 100)
	{
		oElement.innerHTML = aMessages[sFieldName.name]["length < 100"];
		sFieldName.className = sErrorClassName;
	}
	else if(sFieldName.value.length > 4000)
	{
		oElement.innerHTML = aMessages[sFieldName.name]["length > 4000"];
		sFieldName.className = sErrorClassName;
	}

} // EO validate_describe_yourself()


function validate_aboutfamily(sFieldName, sFilledClassName, sErrorClassName)
{
	var oElement = document.getElementById('errmsg_' + sFieldName.name);

	toggleHint('hide', sFieldName.name);

	oElement.innerHTML = "";
	sFieldName.className = sFilledClassName;
	sFieldName.value = sFieldName.value.trim();

	if(sFieldName.value == "")
	{
		oElement.innerHTML = aMessages[sFieldName.name]["blank"];
		sFieldName.className = sErrorClassName;
	}
	else if(sFieldName.value.length > 1000)
	{
		oElement.innerHTML = aMessages[sFieldName.name]["length > 1000"];
		sFieldName.className = sErrorClassName;
	}

} // EO validate_aboutfamily()

function validate_text_field(sFieldName, sFilledClassName, sErrorClassName)
{
	var oElement = document.getElementById('errmsg_' + sFieldName.name);

	toggleHint('hide', sFieldName.name);

	sFieldName.value = sFieldName.value.trim();
	oElement.innerHTML = "";
	sFieldName.className = sFilledClassName;

	if(sFieldName.value == "")
	{
		oElement.innerHTML = aMessages[sFieldName.name]["blank"];
		sFieldName.className = sErrorClassName;
	}

} // EO validate_text_field()

function checkStyle(oFieldName, sFilledClassName, sClassName)
{
	oFieldName.value = oFieldName.value.trim();
	oFieldName.className = sFilledClassName;

	if(oFieldName.value != "")
	{
		oFieldName.className = sClassName;
	}

} // EO checkStyle(oFieldName, sFilledClassName, sClassName)

function checkStyleSelect(oFieldName, sFilledClassName, sClassName)
{
	if(oFieldName.options[oFieldName.selectedIndex].text != "Select"
	&& oFieldName.options[oFieldName.selectedIndex].text != "select"
	&& oFieldName.options[oFieldName.selectedIndex].text != "Select a city"
	&& oFieldName.options[oFieldName.selectedIndex].text != "Select city")
	{
		oFieldName.className = sClassName;
	}
	else
	{
		oFieldName.className = sFilledClassName;
	}

} // EO checkStyleSelect(oFieldName, sFilledClassName, sClassName)


function contact_number_radio(obj)
{
	if(obj.checked == true)
	{
		document.getElementById('lbl_telephone').className = 'smallgrey';
		document.getElementById('lbl_mobile').className = 'smallgrey';
	}
}



function contact_number_display_radio(obj)
{
	if(obj.checked == true)
	{
		document.getElementById('lbl_cnt_display_yes').className = 'smallgrey';
		document.getElementById('lbl_cnt_display_no').className = 'smallgrey';
	}
}