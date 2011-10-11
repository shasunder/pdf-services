<?PHP
	session_start();
	include("../connection.php");
	
	if ($_SESSION['LoginID'] == '')
	{
		header('LOCATION: index.php');
	
	}
	
	$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);
	
$page_name="grooms.php"; 

if(!isset($_REQUEST["start"])) {
$start = 0;
}
else
$start = $_REQUEST["start"];

$eu = ($start - 0); 
$limit = 20;          
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 
	
	if($_POST['searching'] == "true")
	{
		$sqlSeller = "SELECT * from users where LoginID='".mysql_escape_string($_REQUEST['search'])."' limit $eu, $limit";
		$sqltot = "SELECT * from users where LoginID='".mysql_escape_string($_REQUEST['search'])."'";
	}
	else
	{
	$sqlSeller = "SELECT * from users where Gender='Male' order by UserID desc limit $eu, $limit";
	$sqltot = "SELECT * from users where Gender='Male'";
	}
	$resultSeller= mysql_query($sqlSeller);
	
$resulttot=mysql_query($sqltot);
$nume=mysql_num_rows($resulttot);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.:: Grooms ::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">


<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

<script>
function ConfirmDelete(id)
{
	var result = confirm("Are you sure you want to Delete this User ?");
	if (result==true)
	{
		window.location = "delete_gprofile.php?UserID="+id;
	}
}

</script>

</head>
<body >
	<table width="100%" border="0" align="center" cellspacing="0">
		<Tr  align="center">
			<Td colspan="3">
				<table border="0" cellpadding="5" cellspacing="0" style="vertical-align:top">
					<Tr align="center">
						<Td  align="center" width="361"><img src="../images/matrimonial-logo-sm.gif"></Td>
					</Tr>
			  </table>
			</td>
		</Tr>
		<Tr>

			<Td height='24' colspan="2" align="right" background='images/headCap.gif'>
				<span class="style1" >
					Welcome <?PHP echo $_SESSION['LoginID'] ?>! |
					<a href='home.php' class='topcap'>Home</a>|
					<a href='logout.php' class='topcap'>Logout</a>
				</span>
			</td>
		</Tr>
		<Tr>
			<Td height='24' colspan="2" align="Center"> 

<div  style="font-weight:bold "class="style2">
		Welcome to Admin Control Panel
</div>


				
			</td>
		</Tr>
		<tr valign="top">
			<td width="218">
				<div style="margin-left:10px">
					<?PHP
					include("leftbar.php");
					?>
			 </div>
			</td>
   			<td width="100%" align="center">
					<h1 style="text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; ">Users (Grooms)</h1>

<div style="text-align:center">
					<?PHP
						if(isset($_REQUEST['msg']))
						{
					?>
						<p align="center" class="redbold"><br>

							<?PHP echo $_REQUEST['msg']?><br>
<br>

						</p>
					<?PHP
						}
					?>
					
				</div>



<p align="center">
<form method="post" action="grooms.php">
Search By Profile ID (display username): <input type="text" name="search"> 
<input type="hidden" name="searching" value="true">
<input type="submit" value="Search">
</form>
</p>


<?
echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
echo "</td><td align=center width='30%'>Page:";
$i=0;
$l=1;
$total=0;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='2' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
$total = $total+1;
}
echo " of $total</td><td  align='right' width='30%'>";

///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 
echo "</td></tr></table>";
?>

								<table width="95%" cellspacing="1" cellpadding="5" align="center">
							<tr style="background-color:#000066;">
										<td class="whitebold" style="font-weight:bold; font-size:12px" >username</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Email Address</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Password</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >View Profile</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Email Confirmed</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Status</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Paid Status</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Gold Membership Started on</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Send Message</td>
										<td class="whitebold" style="font-weight:bold;font-size:12px" width="100" >Date Registered</td>										
										<td class="whitebold" style="font-weight:bold;font-size:12px" >Delete</td>
							 </tr>

									<!-- Start Catetory Admin -->
									<?PHP
										if (@mysql_num_rows($resultSeller)!=0){
											$color = 0;
											while($row = mysql_fetch_array($resultSeller))	
											{
												if($row['ApprovalStatus'] == 1)
												{
													$status = "<a class='edit' href='guserstatus.php?UserID=".$row['UserID']."&status=0&username=".$row['LoginID']."&email=".$row['EmailAddress']."'>Active</a>";
												}
												else
												{
													$status = "<a class='edit' href='guserstatus.php?UserID=".$row['UserID']."&status=1&username=".$row['LoginID']."&email=".$row['EmailAddress']."'>In-Active</a>";
												}
												
												if($row['GoldMember'] == 1)
												{
													$goldstatus = "<a class='edit' href='ggoldstatus.php?UserID=".$row['UserID']."&status=0&username=".$row['LoginID']."&email=".$row['EmailAddress']."'>Paid Member</a>";
													$goldmembersince = date("M j, Y", strtotime($row['GoldMemberDate']));
												}
												else
												{
													$goldstatus = "<a class='edit' href='ggoldstatus.php?UserID=".$row['UserID']."&status=1&username=".$row['LoginID']."&email=".$row['EmailAddress']."'>Update to Gold</a>";
													$goldmembersince = "-";
												}
												

												if($row['Status'] == 1)
												{
													$status2 = "<strong>Confirmed</strong>";
													$vprofile = "<a href='../v_profile.php?id=".$row['LoginID']."' target='_blank'>View Profile</a>";
												}
												else
												{
													$status2 = "<strong>Not Confirmed</strong>";
													$vprofile = "<a href='../view_profile.php?id=".$row['LoginID']."' target='_blank'>View Profile</a>";
												}

												if ($color==0){
													echo "<Tr class='currentData' bgcolor='#ffffff'>
															<td class='adminvalues' >".$row['LoginID']."</td>
															<td class='adminvalues' >".$row['EmailAddress']."</td>
															<td class='adminvalues' >".$row['Password']."</td>
															<td class='adminvalues' >".$vprofile."</td>
															<td class='adminvalues' >".$status2."</td>
															<td class='adminvalues' >".$status."</td>
															<td class='adminvalues' >".$goldstatus."</td>
															<td class='adminvalues' >".$goldmembersince."</td>
															<td class='adminvalues' ><a class='edit' href='gsend_message.php?UserID=".$row['UserID']."'>Send Message</a></td>
															<td class='adminvalues' >".date("M j, Y", strtotime($row['AddedDate']))."</td>
															<td><a class='delete' href='javascript:ConfirmDelete(".$row['UserID'].");'>Delete</a></td>
														</tr>";
														$color = 1;
												}
												else{
													echo "<Tr class='currentData' bgcolor='#eeeeee'>
															<td class='adminvalues' >".$row['LoginID']."</td>
															<td class='adminvalues' >".$row['EmailAddress']."</td>
															<td class='adminvalues' >".$row['Password']."</td>
															<td class='adminvalues' >".$vprofile."</td>
															<td class='adminvalues' >".$status2."</td>
															<td class='adminvalues' >".$status."</td>
															<td class='adminvalues' >".$goldstatus."</td>
															<td class='adminvalues' >".$goldmembersince."</td>
															<td class='adminvalues' ><a class='edit' href='gsend_message.php?UserID=".$row['UserID']."'>Send Message</a></td>
															<td class='adminvalues' >".date("M j, Y", strtotime($row['AddedDate']))."</td>
															<td><a class='delete' href='javascript:ConfirmDelete(".$row['UserID'].");'>Delete</a></td>
														</tr>";
														$color = 0;
												}
												
											}
													echo "<Tr class='currentData' bgcolor='#cccccc'  height='3'>
														<td> </td>
														<td> </td>
														<td align='Center'></td>
														<td align='Center'></td>
														<td align='Center'></td>
														<td align='Center'></td>
														<td align='Center'></td>
														<td align='Center'></td>
														<td align='Center'></td>
														<td align='Center'></td>
														<td align='Center'></td>
														</tr>";
											
										}						
										
										else
										{
											echo "Sorry, no records found..";
										}						
									?>
								</table>
								
<?
echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
echo "</td><td align=center width='30%'>Page:";
$i=0;
$l=1;
$total=0;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='2' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
$total = $total+1;
}
echo " of $total</td><td  align='right' width='30%'>";

///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 
echo "</td></tr></table>";
?>								

			</td>
		</tr>
		<tr>
		</tr>
</table>
</body>
</html>