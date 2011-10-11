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
			
			
			if(theform.email.value == "")
			{
				alert("Please enter your Email");
				theform.email.focus();
				return false;
			}
			
			else if(theform.name.value == "")
			{
				alert("Please enter your name");
				theform.name.focus();
				return false;
			}			
			
			else if(theform.message.value == "")
			{
				alert("Please enter your message");
				theform.message.focus();
				return false;
			}			
			
			
			return true;
		}
