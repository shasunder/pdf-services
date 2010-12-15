<h2>Manage Partner Details </h2>

<form class="box" action="postUser.php" name="ManageUser" method="post"  >
<b>Get User by ID:</b>
<input size="10" name="adid" id="adid" type="text">
<? $link="ManagePartner.php?userID="; ?>
<button type="button" onclick=classified_ajax("<? echo $link; ?>"+ManageUser.adid.value)>Get</button>
<table cellspacing="5">
<tbody><tr>
<td>Search:</td>
<td><input name="search" id="search" size="20" value="" type="text"> (Marital Status)</td>
<!-- <td> Verified:</td>
<td><select name="verified" id="verified">
<option value="">- All -</option>
<option value="Y">Yes</option>
<option value="N">No</option>      
</select></td> -->
<!--<td>Status:</td>
<td><select name="status" id="status"> 
<option value="">- All -</option>
<option value="I">InActive</option> 
<option value="A">Active</option>
<option value="B">Blocked</option> 
</select></td>ProfileId, pMaritialStatus, pMotherTonque, pReligion, pCastDivision, pEducationCat, pOccupation, pCitizenchip-->
<td>Sort by:</td>
<td><select name="sortby" id="sortby">
<option value="ProfileID">ID</option>
<option value="pMaritialStatus">Marital Status</option>
<option value="pMotherTonque">Mother Tonque</option>
<option value="pReligion">Religion</option>
<option value="pCastDivision">Caste Division</option>
<option value="pEducationCat">Education Category</option>
<option value="pOccupation">Occupation</option>
<option value="pCitizenchip">Citizenship</option>
</select></td>
</tr><tr>
<!--<td>Date From </td>
<td> <input name="fdate" id="fdate" size="10" value="" type="text" style="width:70px;" disabled/> &nbsp;&nbsp;<img src="../images/calendar.gif" title="Select Date" id="jscal_trigger_date_start" align="bottom" style="cursor:pointer;"></td>
<td>Date To :</td>
<td><input name="todate" id="todate" size="10" value="" type="text" style="width:70px;" disabled/> &nbsp;&nbsp;<img src="../images/calendar.gif" title="Select Date" id="jscal_trigger_date_end" align="bottom" style="cursor:pointer;">
</td>-->
<td>Sort order:</td>
<td> <select name="sortorder" id="sortorder">
<option value="DESC">Descending</option>
<option value="ASC">Ascending</option>
</select></td></tr>
<tr><td>&nbsp;</td>
<td>&nbsp;</td></tr><tr>
<td>&nbsp;</td>
<td colspan="3">
<input name="Go" value="Go" class="button" type="button" onClick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','');">
<input type="button" class="button" name="viewall" id="viewall" value="View All" onclick="location.href='';"></td>
</tr></tbody></table>
<div class="search_desc">
</div><br>
<div> <div><a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','A')" style="cursor:pointer">A</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','B');" style="cursor:pointer">B</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','C');" style="cursor:pointer">C</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','D');" style="cursor:pointer">D</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','E');" style="cursor:pointer">E</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','F');" style="cursor:pointer">F</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','G');" style="cursor:pointer">G</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','H');" style="cursor:pointer">H</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','I');" style="cursor:pointer">I</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','J');" style="cursor:pointer">J</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','K');" style="cursor:pointer">K</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','L');" style="cursor:pointer">L</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','M');" style="cursor:pointer">M</a> 
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','N');" style="cursor:pointer">N</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','O');" style="cursor:pointer">O</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','P');" style="cursor:pointer">P</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','Q');" style="cursor:pointer">Q</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','R');" style="cursor:pointer">R</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','S');" style="cursor:pointer">S</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','T');" style="cursor:pointer">T</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','U');" style="cursor:pointer">U</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','V');" style="cursor:pointer">V</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','W');" style="cursor:pointer">W</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','X');" style="cursor:pointer">X</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','Y');" style="cursor:pointer">Y</a>
  <a onclick="ManageFamilyFn('../admin/ManagePartner.php','sortby','sortorder','MANAGE','search','Z');" style="cursor:pointer">Z</a></div> </div>
<div class="legend" align="right"><!--<b>I</b> - InActive &nbsp; <b>A</b> - Active--></div>
<? $displayRecords->displayPage();  ?>
<tr><!--<td colspan="14" align="right">With selected: 
 <input name="verify" value="Verify" class="button" onclick="return check('Verify')" type="submit">
<input name="active" type="submit" class="button" id="active" value="Active" onclick="return check('Activate')">-->
 <!--<input name="pending" type="submit" class="button" id="pending" value="Pending" onclick="return check('Pending')"> 
<input name="suspend" value="Blocked" class="cautionbutton" onClick="return check('Block')" type="submit">
<input name="del" value="Delete" class="cautionbutton" onClick="return check('Delete')" type="submit">
</td>--></tr></tbody></table>
</form>
<script type="text/javascript" language="javascript">

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
				} else { if(confirm(id+' Selected User')) { document.ManageUser.action; document.ManageUser.submit();
						return true; } else { return false; } } } }
		if(flag == 0) { alert("Select a User to "+id); return false; } }

/*function dateInRange1(dateIn){
	var inputDate = dateIn;
	var today = new Date();
	var compareToday = compareDatesOnly(inputDate, today);
	if (compareToday > 0) { return(true); } }
	
function compareDatesOnly(date1, date2) {
	var year1 = date1.getYear();
	var year2 = date2.getYear();
	var month1 = date1.getMonth();
	var month2 = date2.getMonth();
	var day1 = date1.getDate();
	var day2 = date2.getDate();
	if (year1 < year2) { return -1; }
	if (year2 < year1) { return 1; 	}
	if (month1 < month2) { return -1; }
	if (month2 < month1) { return 1; }
	if (day1 < day2) { return -1; }
	if (day2 < day1) { return 1; }
	return -1; }
	
function com_Date(search,start_Date,end_Date) {	
	startDate=document.getElementById(start_Date).value;
	endDate=document.getElementById(end_Date).value;
	startdate=startDate.split("-");
	enddate=endDate.split("-");
	var fDate = new Date(startdate[2],startdate[1]-1,startdate[0]);
	var tDate = new Date(enddate[2],enddate[1]-1,enddate[0]);
    if((startDate == '') && (endDate != '')) { alert("From date is empty"); return false; } 
	else if((startDate != '') && (endDate == '')) { alert("To date is empty"); return false; }
	if (fDate > tDate) { alert('EndDate must be greater than StartDate'); return false; }
	else { Manage_User('../admin/ManageUser.php','status','sortby','fdate','todate','sortorder','MANAGE','search'); } return true; }

Calendar.setup ({
	inputField : "fdate", ifFormat : "%d-%m-%Y", showsTime : false, button : "jscal_trigger_date_start", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})

Calendar.setup ({
	inputField : "todate", ifFormat : "%d-%m-%Y", showsTime : false, button : "jscal_trigger_date_end", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})
*/</script>