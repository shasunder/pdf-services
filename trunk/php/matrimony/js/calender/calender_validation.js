function sample_fun(mySel,type){
	var frm = document.addVideo;
	var monthArray = ["01","02","03","04","05","06","07","08","09","10","11","12"];
	var dateArray = ["01","02","03","04","05","06","07","08","09"];
 	var d = new Date();
	var curr_hour = d.getHours();
	var curr_date = d.getDate(); 
	var curr_mon = monthArray[eval(d.getMonth())];	
	var curr_year = d.getYear();
	var curr_min = d.getMinutes();
	if(curr_date<10) {
		curr_date = dateArray[eval(curr_date-1)];
	}
	var current_date = curr_date+'-'+curr_mon+'-'+eval(curr_year+1900);
	var selected_date = frm.video_date.value;
	
	if(selected_date==current_date) {
		myVal = mySel.options[mySel.selectedIndex].value;
		if(type=='H') {
			if(myVal > curr_hour){
				 return false;
			}else {
				return true;
			}
		}
		if(type=='M') {
			myVal_hr = frm.hrs_val.options[frm.hrs_val.selectedIndex].value;
			if(myVal_hr == curr_hour){
				if(myVal > curr_min){
					 return false;
				}else {
					return true;
				}
			}else {
				return true;
			}
		}
	}else {
		return true;
	}
}
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

	if (year1 < year2) {
		return -1;
	}
	if (year2 < year1) {
		return 1;
	}

	//years are equal
	if (month1 < month2) {
		return -1;
	}
	if (month2 < month1) {
		return 1;
	}

	//years and months are equal
	if (day1 < day2) {
		return -1;
	}
	if (day2 < day1) {
		return 1;
	}

	//days are equal
	return -1;
}
function imgCheck(imageFile,id){
	frm = document.addVideo;
	var actionurl;
	var chkThmFileType = ['JPG','GIF','PNG','JPEG'];	
	var chkVideoFileType = ['AVI','MOV','3GP','WMV','MPEG','MPG'];	
	idCheck = id;
	filePath = imageFile;
	fileLen = filePath.length;
	slashPos = filePath.lastIndexOf("\\");
	fileName = filePath.substring(slashPos+1,fileLen);
	fileNameLen = fileName.length;
	fileDotExt = fileName.lastIndexOf(".");
	fileExt = fileName.substring(fileDotExt+1,fileNameLen);
	fileExtchg = fileExt.toUpperCase();
	if(filePath != null && filePath != "" ) {
		if(idCheck == 1){	
			if(fileExtchg != 'GIF' && fileExtchg != 'JPG' && fileExtchg != 'PNG') {
				return false;
			} else {
				return true;
			}
			if(chkThmFileType.in_array(fileExtchg)) {
				return true;
			}else{
				return false;
			}
		}else if(idCheck == 2){
			if(fileExtchg != 'AVI' && fileExtchg != 'MOV' && fileExtchg != '3GP') {
				return false;
			} else {
				return true;
			}
			if(chkVideoFileType.in_array(fileExtchg)) {
				return true;
			}else{
				return false;
			}
		}
	}
				 			
}
 function IsImageOk(img) {
	if (!img.complete) {
		return false;
	}
	if (typeof img.naturalWidth != "undefined" && img.naturalWidth == 0) {
		return false;
	}
	return true;
}
function assignImage(textVal) {
	posy = 435;
	posx = 600;
	document.getElementById('imgDiv').innerHTML = "<div style='position:absolute;top:"+posy+"px;left:"+posx+"px;background-color:#FFFFFF;border:2px solid #000000' align='center'><table border='0' cellpadding='0' cellspacing='0' width='200px' height='100px' ><tr><td valign='top' align='right' ><img src='../Common/Adminimages/close.gif' onclick='hideImage()' style='cursor:pointer'></td></tr><tr><td valign='top' align='center' class='text'><img src='../Common/VideoGallery/Thumb/"+textVal+"'></td></tr></table></div>";
	document.getElementById('imgDiv').style.display = "";
}
function hideImage()
{
	document.getElementById('imgDiv').innerHTML = "";
}

var posx;var posy;
function capmouse(e){
// captures the mouse position
posx = 0; posy = 0;
if (!e){var e = window.event;}
if (e.pageX || e.pageY){
posx = e.pageX;
posy = e.pageY;
}
else if (e.clientX || e.clientY){
posx = e.clientX;
posy = e.clientY;
}
//alert(posx);
}

Calendar.setup ({
	inputField : "jscal_field_date_start", ifFormat : "%d-%m-%Y", showsTime : false, button : "jscal_trigger_date_start", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})

Calendar.setup ({
	inputField : "jscal_field_date_end", ifFormat : "%d-%m-%Y", showsTime : false, button : "jscal_trigger_date_end", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})