<h2>Manage Image </h2>

<form class="box" action="postImage.php" name="ManageUser" method="post"  >
<b>Get User by ID:</b>
<input size="10" name="adid" id="adid" type="text">
<? $link="ManageImage.php?userID="; ?>
<button type="button" onclick=classified_ajax("<? echo $link; ?>"+ManageUser.adid.value)>Get</button>
<table cellspacing="5">
<tbody><tr>
<td>Search:</td>
<td><input name="search" id="search" size="20" value="" type="text"> (Name)</td>
<td>Status:</td>
<td><select name="status" id="status"> 
<option value="">- All -</option>
<option value="I">InActive</option> 
<option value="A">Active</option>
</select></td>
<td>Sort by:</td>
<td><select name="sortby" id="sortby">
<option value="Profile_ID">ProfileID</option>
<option value="Image_autoid">ID</option>
</select></td>
</tr><tr>
<td>Date From </td>
<td width="358"><input name="jscal_field_date_start" id="jscal_field_date_start" type="text" readonly="readonly" value=""  style="width:70px;"/>
      <span class="whiteTextBold"> <img src="../images/calendar.gif" title="Select Date" id="jscal_trigger_date_start" align="bottom" style="cursor:pointer;" /> </span> </td>
<td>Date To :</td>
<td><input name="jscal_field_date_end" id="jscal_field_date_end" type="text" readonly="readonly" value="" style="width:70px;" />
<span class="whiteTextBold" id="jscal_trigger_date_end" ><img src="../images/calendar.gif" title="Select Date"  align="bottom" style="cursor:pointer;"></span>
</td>

<td>Sort order:</td>
<td> <select name="sortorder" id="sortorder">
<option value="DESC">Descending</option>
<option value="ASC">Ascending</option>
</select></td></tr>
<tr><td>&nbsp;</td>
<td>&nbsp;</td></tr><tr>
<td>&nbsp;</td>
<td colspan="3">
<input name="Go" value="Go" class="button" type="button" onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','');">
<input type="button" class="button" name="viewall" id="viewall" value="View All" onClick="location.href='';"></td>
</tr></tbody></table>
<div class="search_desc">
</div><br>
<div> <div style="cursor:pointer"><a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','A');" style="cursor:pointer">A</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','B');" style="cursor:pointer">B</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','C');" style="cursor:pointer">C</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','D');" style="cursor:pointer"> D</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','E');" style="cursor:pointer">E</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','F');" style="cursor:pointer">F</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','G');" style="cursor:pointer"> G</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','H');" style="cursor:pointer"> H</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','I');" style="cursor:pointer">I</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','J');" style="cursor:pointer"> J</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','K');" style="cursor:pointer">K</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','L');" style="cursor:pointer"> L</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','M');" style="cursor:pointer"> M</a> 
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','N');" style="cursor:pointer"> N</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','O');" style="cursor:pointer">O</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','P');" style="cursor:pointer"> P</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','Q');" style="cursor:pointer"> Q</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','R');" style="cursor:pointer"> R</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','S');" style="cursor:pointer"> S</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','T');" style="cursor:pointer"> T</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','U');" style="cursor:pointer"> U</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','V');" style="cursor:pointer"> V</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','W');" style="cursor:pointer"> W</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','X');" style="cursor:pointer"> X</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','Y');" style="cursor:pointer">Y</a>
  <a onClick="Manage_Image('../admin/ManageImage.php','status','sortby','jscal_field_date_start','jscal_field_date_end','sortorder','MANAGE','search','Z');" style="cursor:pointer"> Z</a></div> </div>
<div class="legend" align="right"><b>I</b> - InActive &nbsp; <b>A</b> - Active &nbsp; <b>B</b> - Block</div>
<? $displayRecords->displayPage();  ?>
<tr><td colspan="14" align="right">With selected: 
<input name="active" type="submit" class="button" id="active" value="Active" onClick="return check('Activate')">
<input name="suspend" value="Blocked" class="cautionbutton" onClick="return check('Block')" type="submit">
<input name="del" value="Delete" class="cautionbutton" onClick="return check('Delete')" type="submit">
</td> </tr></tbody></table>
</form>

<script type="text/javascript">

function checkall(state) {
	var n = ManageUser.elements.length;
	for (i=0; i<n; i++) { if (ManageUser.elements[i].name == "ad[]") ManageUser.elements[i].checked = state; } }
	
	function check(id) {
		frm = document.ManageUser;
		var tick = frm.elements;
		var flag = 0;
		for (i=0; i<tick.length; ++i) {
			if(tick[i].checked) {
				flag = 1;
				if(id=='Pending') {
					if(confirm('Are you sure you want to move Selected User to Pending')) {
						document.ManageUser.action; document.ManageUser.submit();
						return true; } else { return false; }
				} else { if(confirm(id+' Selected User ? ')) { document.ManageUser.action; document.ManageUser.submit();
						return true; } else { return false; } } } }
		if(flag == 0) { alert("Select a User to "+id); return false; } }


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
		return -1;
	}

	//years are equal
	if (month1 < month2) {
		return -1;
	}
	if (month2 < month1) {
		return -1;
	}

	//years and months are equal
	if (day1 < day2) {
		return -1;
	}
	if (day2 < day1) {
		return -1;
	}

	//days are equal
	return -1;
}
function valid_date(start_Date,end_Date)
{	
	startDate=document.getElementById(start_Date).value;
	endDate=document.getElementById(end_Date).value;
	if(startDate=='')
	{	alert("Select Start date");
		return false;
	}
	if(endDate=='')
	{	alert("Select End date");
		return false;
	}
	startdate=startDate.split("-");
	enddate=endDate.split("-");
	date=startdate[0];
	month=startdate[1];
	year=startdate[2];
	date1=enddate[0];
	month1=enddate[1];
	year1=enddate[2];
	if(year==year1){
	if(date1<date||month1<month||year1<year){
	    alert("End Date must be grater than Start Date");
	 	return false;}
	}	
	if(month==month1)
	{
		if(date1<date){
			 alert("End Date must be grater than Start Date");
		   	 return false;}
	}
	if(date1<date||year1<year)
	{	alert("End Date must be grater than Start Date");
	 	return false;
	}
}

</script>

<script type="text/javascript">
Calendar.setup ({
	inputField : "jscal_field_date_start", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_date_start", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})

Calendar.setup ({
	inputField : "jscal_field_date_end", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_date_end", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})
</script>