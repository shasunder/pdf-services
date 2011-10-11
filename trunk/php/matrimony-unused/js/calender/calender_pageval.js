

function dateInRange1(dateIn){
	var inputDate = dateIn;
	var today = new Date();
	var compareToday = compareDatesOnly(inputDate, today);
	if (compareToday > 0) {
		return(true);
	}
}
function compareDatesOnly(date1, date2) {
	var year1 = date1.getYear();
	var year2 = date2.getYear();
	var month1 = date1.getMonth();
	var month2 = date2.getMonth();
	var day1 = date1.getDate();
	
	
	var day2 = date2.getDate();
   
	
	if (year1 > year2) {
		return -1;
	}
	if (year2 > year1) {
		return 1;
	}

	//years are equal
	if (month1 > month2) {
		return -1;
	}
	if (month2 > month1) {
		return 1;
	}

	//years and months are equal

	
	if (day1 > day2) {
		return -1;
	}
	if (day2 > day1) {
		return 1;
	}

	//days are equal
	return -1;
}

function com_Date(start_Date,end_Date,txt)
{	
	if(document.getElementById('txttitle').value=="")
	{
	alert("Title is empty");
	document.getElementById('txttitle').focus();
	return false;
	
	
	}
	
	if(document.getElementById('txtcategory').value=="")
	{
	alert("Category is empty");
	document.getElementById('txtcategory').focus();
	return false;
	}
	
	if(document.getElementById('city').selectedIndex==0)
	{
	alert("City is empty");
	document.getElementById('city').focus();
	return false;
	}
	
	if(document.getElementById('txtdescription').value=="")
	{
	alert("Description is empty");
	document.getElementById('txtdescription').focus();
	return false;
	}
	
	startDate=document.getElementById(start_Date).value;
	endDate=document.getElementById(end_Date).value;	
	startdate=startDate.split("-");
	enddate=endDate.split("-");
	//enddate = frmChk.to.value;
	var fDate = new Date(startdate[2],startdate[1]-1,startdate[0]);
	var tDate = new Date(enddate[2],enddate[1]-1,enddate[0]);
	
	if(startDate == '')
	{
		alert("From date is empty");
		return false;
	} else if(endDate == '') {
		alert("To date is empty");
		return false;
	}
	
	
	var date1 =startDate.substring (startDate.lastIndexOf ("-")+1, startDate.length);
	var date2 =endDate.substring (endDate.lastIndexOf ("-")+1, endDate.length);
	
	var dat1=7
	var dat=parseInt(date1)+parseInt(dat1);
	
	if (date2<dat) 
		{
		alert('EndDate must be 7 days ahead than the StartDate');
		return false;
		
		}
	else
		{
			return imagevalid();
		}		
	
	
	if (fDate > tDate) 
		{
		alert('EndDate must be greater than StartDate');
		return false;
		
		}
	else
		{
			return imagevalid();
		}
		
		
		return true;
}
Calendar.setup ({
	inputField : "jscal_field_date_start", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_date_start", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})

Calendar.setup ({
	inputField : "jscal_field_date_end", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_date_end", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})
