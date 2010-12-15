<script language="javascript">
function toggleSidebar() {
	if(document.getElementById("sidebar").style.display == "none") {
		if(navigator.userAgent.indexOf("MSIE") > -1) document.getElementById("sidebar").style.display = "block";
		else document.getElementById("sidebar").style.display = "table-cell"; }
	else { document.getElementById("sidebar").style.display = "none"; } document.getElementById("sidestrip").width = 10; }

function toggleSuggest() {
	var suggestbox = document.getElementById("suggestbox");	if(suggestbox.style.display == "none")
	 { suggestbox.style.display = "block"; } else { suggestbox.style.display = "none"; } }
</script>
<style type="text/css">
<!--
.style1 {color: #CCCCCC}
-->
</style>

<table id="maintable" width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
		<td id="sidestrip" onClick="javascript:toggleSidebar()" valign="top" width="16" align="center" style="cursor:pointer;">
		<span id="togglemenu">•<br>•<br>•<br>•<br>•<br>•<br>•<br>•<br>•<br>•<br></span></td>
		<td id="sidebar" rowspan="2" style="display: table-cell;" valign="top" width="151">
		<div class="menus">
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
		<tbody><tr><td class="menuhead">General</td></tr>
				<tr><td class="menucell"><a href="./ManageUser.php" class="menulink">Admin Home</a></td></tr>
				<tr><td class="menucell"><a href="../" class="menulink" target="_blank">Matrimonial Home</a></td></tr>
				<tr><td class="menucell"><a href="changepass.php" class="menulink">Change Password</a></td></tr>
				<tr><td class="menucell"><a href="logout.php" class="menulink">Signout</a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Manage Users </td></tr>
			<tr><td class="menucell"><a href="ManageUser.php" class="menulink">Manage User </a></td></tr>
			<tr><td class="menucell"><a href="AddUser.php" class="menulink">Add New User </a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Manage Famliy</td></tr>
			<tr><td class="menucell"><a href="ManageFamily.php" class="menulink">Manage Famliy Details</a></td></tr>
			<tr><td class="menucell"><a href="AddFamily.php" class="menulink">Add Famliy</a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Partner Preference</td></tr>
			<tr><td class="menucell"><a href="ManagePartner.php" class="menulink">Partner Preference Details</a></td></tr>
			<tr><td class="menucell"><a href="Add_partner.php" class="menulink">Add Partner </a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Manage Messages</td></tr>
			<tr><td class="menucell"><a href="ManageMessage.php" class="menulink">Manage Messages </a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Manage Interest</td></tr>
			<tr><td class="menucell"><a href="ManageInterest.php" class="menulink">Manage Interest </a></td></tr>
			<tr><td class="menucell"><a href="InterestMessage.php" class="menulink">Interest Messages </a></td></tr>
			<tr><td class="menucell"><a href="AddInterest.php" class="menulink">Add Interest </a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Manage Image</td></tr>
			<tr><td class="menucell"><a href="ManageImage.php" class="menulink">Manage Image </a></td></tr>
			<tr><td class="menucell"><a href="AddPhoto.php" class="menulink">Add Image </a></td></tr>
	</tbody></table>
	<!--<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
		<tbody><tr><td class="menuhead">Request</td></tr>
		<tr><td class="menucell"><a href="managerequest.php" class="menulink">Manage Request </a></td></tr>
		<tr><td class="menucell"><a href="addRequest.php" class="menulink">Add Request </a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
		<tbody><tr>
		  <td class="menuhead">Area</td>
		</tr>
		<tr>
		  <td class="menucell"><a href="ManageArea.php" class="menulink">Manage Area </a></td>
		</tr>
		<tr>
		  <td class="menucell"><a href="AddArea.php" class="menulink">Add Area </a></td>
		</tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
		<tbody><tr>
		  <td class="menuhead">Part Of Area </td>
		</tr>
		<tr>
		  <td class="menucell"><a href="ManagePartArea.php" class="menulink">Manage Part Of Area </a></td>
		</tr>
		<tr>
		  <td class="menucell"><a href="AddPartArea.php" class="menulink">Add Part Of Area </a></td>
		</tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Paid Options</td></tr>
		<tr><td class="menucell"><a href="#" class="menulink style1">Featured Ad Options</a></td></tr>
		<tr><td class="menucell"><a href="#" class="menulink style1">Extended Ad Options</a></td></tr>
		<tr><td class="menucell"><a href="manageMembership.php" class="menulink">Manage Mempership Type</a></td></tr>
		<tr><td class="menucell"><a href="Addmembership.php" class="menulink">Add Mempership Type </a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Edit</td></tr>
			<tr><td class="menucell"><a href="Mailingtemplates.php" class="menulink">Email Templates</a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Tools</td></tr>
			<tr><td class="menucell"><a href="#" class="menulink style1">Import Data</a></td>
			</tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">Reasons</td></tr>
				<tr><td class="menucell"><a href="managereasons.php" class="menulink"> Manage Reasons </a></td></tr>
			<tr><td class="menucell"><a href="addreason.php" class="menulink"> Add Reason </a></td></tr>
	</tbody></table>
	<table class="menu" width="100%" border="0" cellpadding="2" cellspacing="1">
	<tbody><tr><td class="menuhead">View Reports</td></tr>
			<tr><td class="menucell"><a href="" class="menulink style1">Payment History</a></td>
			</tr>
	</tbody></table> -->
</div><br> <b>To Day Date</b><br><b><?php echo date('d-M-Y') ?><br><br><br>
</td><td valign="top" id="main">