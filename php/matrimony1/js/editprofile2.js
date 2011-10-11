	window.onload = function ()
	{
		document.onmousedown = function()
		{
		}
	}

function validateform(theform)
		{
			
			
			if(theform.contact_details_contact_person.value == "")
			{
				alert("please specify name of the contact person");
				theform.contact_details_contact_person.focus();
				return false;
			}
			
			else if(theform.contact_details_relationship.options[theform.contact_details_relationship.selectedIndex].value == "")
			{
				alert("Please select contact person's relationship with the member");
				theform.contact_details_relationship.focus();
				return false;
			}
			
			else if(theform.contact_details_convenient_time.value == "")
			{
				alert("Please specify convenient time to call");
				theform.contact_details_convenient_time.focus();
				return false;
			}
			
			else if(theform.family_father.options[theform.family_father.selectedIndex].value == "")
			{
				alert("Please select relevant information of the father");
				theform.family_father.focus();
				return false;
			}
			
			else if(theform.family_mother.options[theform.family_mother.selectedIndex].value == "")
			{
				alert("Please select relevant information of mother");
				theform.family_mother.focus();
				return false;
			}
			
			else if(theform.num_of_brother.options[theform.num_of_brother.selectedIndex].value == "")
			{
				alert("Please select number of brothers");
				theform.num_of_brother.focus();
				return false;
			}
			
			else if(theform.num_of_married_brother.options[theform.num_of_married_brother.selectedIndex].value == "" && theform.num_of_brother.options[theform.num_of_brother.selectedIndex].value != "0")
			{
				alert("Please select number of brothers married");
				theform.num_of_married_brother.focus();
				return false;
			}
			
			else if(theform.num_of_sister.options[theform.num_of_sister.selectedIndex].value == "")
			{
				alert("Please select number of sisters");
				theform.num_of_sister.focus();
				return false;
			}
			
			else if(theform.num_of_married_sister.options[theform.num_of_married_sister.selectedIndex].value == "" && theform.num_of_sister.options[theform.num_of_sister.selectedIndex].value != "0")
			{
				alert("Please select number of sisters married");
				theform.num_of_married_sister.focus();
				return false;
			}
			
			else if(theform.aboutfamily.value.length > 1000)
			{
				alert("number of characters in about family should be maximum 1000, you have written more than 1000 characters that is not allowed.");
				theform.aboutfamily.focus();
				return false;
			}
							
			return true;
		}
