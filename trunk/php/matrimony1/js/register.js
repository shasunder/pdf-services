		function validateform(theform)
		{

			var emailId = theform.email.value;
			var apos=emailId.indexOf("@");
			var dotpos=emailId.lastIndexOf(".");
			var lastpos=emailId.length-1;		
			if (emailId.indexOf(' ')==-1 && 0 < emailId.indexOf('@') && 0 < emailId.indexOf('.') && emailId.indexOf('@')+1 < emailId.length && emailId.length >= 5)
		{
	    }
	    else
	    {
	      alert("Please provide a valid email address");
	      theform.email.focus();
	      return false;
		}
			  if(theform.name.value == "")
						{
							alert("Please enter Name");
							theform.name.focus();
							return false;
			}
			else if(theform.caste.value == "")
			{
				alert("Please enter sub caste");
				theform.caste.focus();
				return false;
			}
			
			
			else if(theform.email.value == "")
			{
				alert("Please enter Email");
				theform.email.focus();
				return false;
			}
			
			
			
			else if(theform.retypeemail.value == "")
			{
				alert("Please Re-type Email");
				theform.retypeemail.focus();
				return false;
			}
			
			else if(theform.retypeemail.value != theform.email.value)
			{
				alert("Email Mismatch! Please Re-type correct Email");
				theform.retypeemail.focus();
				theform.retypeemail.select();
				return false;
			}			
			
			else if(theform.password1.value == "")
			{
				alert("Please enter Password");
				theform.password1.focus();
				return false;
			}
	
			else if(theform.password2.value == "")
			{
				alert("Please Retype Password");
				theform.password2.focus();
				return false;
			}
			
			else if(theform.password2.value != theform.password1.value)
			{
				alert("Password Mismatch! Please Retype Correct Password");
				theform.password2.focus();
				theform.password2.select();
				return false;
			}
			
			else if(theform.gender[1].checked == false && theform.gender[0].checked == false)
			{
				alert("Please select gender");
				return false;
			}
			
			else if(theform.day.options[theform.day.selectedIndex].value == "")
			{
				alert("Please select your date of birth");
				theform.day.focus();
				return false;
			}
			
			else if(theform.month.options[theform.month.selectedIndex].value == "")
			{
				alert("Please select your date of birth");
				theform.day.focus();
				return false;
			}
			
			else if(theform.year.options[theform.year.selectedIndex].value == "")
			{
				alert("Please select your date of birth");
				theform.day.focus();
				return false;
			}
			
			else if(theform.community.options[theform.community.selectedIndex].value == "")
			{
				alert("Please select your Religion/Community");
				theform.community.focus();
				return false;
			}
			
			else if(theform.countryofresidence.options[theform.countryofresidence.selectedIndex].value == "")
			{
				alert("Please select your Country of Residence");
				theform.countryofresidence.focus();
				return false;
			}
			
			else if(theform.confirm_policy.checked == false)
			{
				alert("You need to be agree with our privacy policy and terms and conditions");
				theform.confirm_policy.focus();
				return false;
			}

			
			return true;
		}
