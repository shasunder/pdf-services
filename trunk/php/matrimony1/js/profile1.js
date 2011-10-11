
		function validateform(theform)
		{
			if(theform.relationship.options[theform.relationship.selectedIndex].value == "")
			{
				alert("please specify your relationship with the person looking to get married");
				theform.relationship.focus();
				return false;
			}
			
			else if(theform.maritalstatus.options[theform.maritalstatus.selectedIndex].value == "")
			{
				alert("Please specify marital status of the person looking to get married");
				theform.maritalstatus.focus();
				return false;
			}
			
			else if(theform.havechildren.options[theform.havechildren.selectedIndex].value == "")
			{
				alert("Please specify if the person looking to get married have children");
				theform.havechildren.focus();
				return false;
			}
			
			else if(theform.height.options[theform.height.selectedIndex].value == "")
			{
				alert("Please specify the height");
				theform.height.focus();
				return false;
			}
			
			else if(theform.bodytype.options[theform.bodytype.selectedIndex].value == "")
			{
				alert("Please specify body type");
				theform.bodytype.focus();
				return false;
			}
			
			else if(theform.complexion.options[theform.complexion.selectedIndex].value == "")
			{
				alert("Please specify complexion");
				theform.complexion.focus();
				return false;
			}
			
			else if(theform.religion.options[theform.religion.selectedIndex].value == "")
			{
				alert("Please specify religion");
				theform.religion.focus();
				return false;
			}
			
			else if(theform.mothertongue.options[theform.mothertongue.selectedIndex].value == "")
			{
				alert("Please specify mother tongue");
				theform.mothertongue.focus();
				return false;
			}
			
			else if(theform.caste.options[theform.caste.selectedIndex].value == "")
			{
				alert("Please specify caste");
				theform.caste.focus();
				return false;
			}						
			
			else if(theform.familyvalues.options[theform.familyvalues.selectedIndex].value == "")
			{
				alert("Please specify family values");
				theform.familyvalues.focus();
				return false;
			}
			
			else if(theform.educationlevel.options[theform.educationlevel.selectedIndex].value == "")
			{
				alert("Please specify education level");
				theform.educationlevel.focus();
				return false;
			}
			
			else if(theform.educationarea.options[theform.educationarea.selectedIndex].value == "")
			{
				alert("Please specify education area");
				theform.educationarea.focus();
				return false;
			}
			
			else if(theform.occupation.options[theform.occupation.selectedIndex].value == "")
			{
				alert("Please specify occupation");
				theform.occupation.focus();
				return false;
			}
			
			else if(theform.diet.options[theform.diet.selectedIndex].value == "")
			{
				alert("Please specify diet");
				theform.diet.focus();
				return false;
			}
			
			else if(theform.smoke.options[theform.smoke.selectedIndex].value == "")
			{
				alert("Please specify smoke");
				theform.smoke.focus();
				return false;
			}
			
			else if(theform.drink.options[theform.drink.selectedIndex].value == "")
			{
				alert("Please specify drink");
				theform.drink.focus();
				return false;
			}
			
			else if(theform.stateofresidence.options[theform.stateofresidence.selectedIndex].value == "")
			{
				alert("Please specify state of residence");
				theform.stateofresidence.focus();
				return false;
			}
			
			else if(theform.residencystatus.options[theform.residencystatus.selectedIndex].value == "")
			{
				alert("Please specify residency status");
				theform.residencystatus.focus();
				return false;
			}
			
			else if(theform.country_code.options[theform.country_code.selectedIndex].value == "")
			{
				alert("Please select country code");
				theform.country_code.focus();
				return false;
			}
			
			else if(theform.type[0].checked == false && theform.type[1].checked == false)
			{
				alert("please select type of phone number");
				theform.type[0].focus();
				return false;
			}
			
			else if(theform.type[0].checked == true && theform.std_code.value == "")
			{
				alert("please enter std code");
				theform.std_code.focus();
				return false;
			}
			else if(theform.type[0].checked == true && theform.contact_number.value == "")
			{
				alert("please enter contact number");
				theform.contact_number.focus();
				return false;
			}		
			
			
			else if(theform.type[1].checked == true && theform.contact_number.value == "")
			{
				alert("please enter contact number");
				theform.contact_number.focus();
				return false;
			}
			
			else if(theform.contact_details_dislay_status[0].checked == false && theform.contact_details_dislay_status[1].checked == false)
			{
				alert("please select contact details display status");
				theform.contact_details_dislay_status[0].focus();
				return false;
			}
			
			else if(theform.aboutyourself.value == "")
			{
				alert("please describe about yourself");
				theform.aboutyourself.focus();
				return false;
			}
			
			else if(theform.aboutyourself.value.length < 100)
			{
				alert("please describe about yourself with atleast 100 characters.");
				theform.aboutyourself.focus();
				return false;
			}
			
			else if(theform.aboutyourself.value.length > 4000)
			{
				alert("number of characters in about yourself should be maximum 4000, you have written more than 4000 characters that is not allowed.");
				theform.aboutyourself.focus();
				return false;
			}
							
			return true;
		}
