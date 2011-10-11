		function validateform(theform)
		{
			if(theform.password.value == "")
			{
				alert("Please enter password");
				theform.password.focus();
				return false;
			}
			
			else if(theform.password.value != theform.password2.value)
			{
				alert("Password Mismatch! please retype correct password");
				theform.password2.focus();
				return false;
			}
			return true;
		}
