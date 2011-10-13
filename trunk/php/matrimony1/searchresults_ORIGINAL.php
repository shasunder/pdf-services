<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);


$page_name="brides.php"; 

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

if($_REQUEST['caste']!="")
{
if($_REQUEST['caste'] == "1")
{
	$religion = " (users.ReligionID=1 or users.ReligionID=2 or users.ReligionID=3 or users.ReligionID=4 or users.ReligionID=5) ";
}
else if($_REQUEST['caste'] == "6")
{
	$religion = " (users.ReligionID=6 or users.ReligionID=7 or users.ReligionID=8 or users.ReligionID=9) ";
}
else if($_REQUEST['caste'] == "10")
{
	$religion = " (users.ReligionID=10 or users.ReligionID=11 or users.ReligionID=12 or users.ReligionID=13 or users.ReligionID=14 or users.ReligionID=15 or users.ReligionID=16 or users.ReligionID=17 or users.ReligionID=18 or users.ReligionID=19 or users.ReligionID=20 or users.ReligionID=21 or users.ReligionID=22 or users.ReligionID=23 or users.ReligionID=24) ";
}
else if($_REQUEST['caste'] == "26")
{
	$religion = " (users.ReligionID=26 or users.ReligionID=27 or users.ReligionID=28 or users.ReligionID=29 or users.ReligionID=30) ";
}
else
{
	$religion = " (users.ReligionID=".$_REQUEST['caste'].") ";
}
}

if($_REQUEST['photograph'] == "Yes")
{
	$photo = " and user_profile.photo1<>'' ";
}
else
{
	$photo = "";
}


if($_REQUEST['countryofresidence']!="" && $_REQUEST['caste']=="")
{
$sql = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].") ".$photo." and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc limit $eu, $limit";

$sqltot = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc";
}
else if($_REQUEST['countryofresidence']=="" && $_REQUEST['caste']!="")
{
$sql = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and ".$religion." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc limit $eu, $limit";

$sqltot = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and ".$religion." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc";
}
else if($_REQUEST['countryofresidence']!="" && $_REQUEST['caste']!="")
{
$sql = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and ".$religion." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc limit $eu, $limit";

$sqltot = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and ".$religion." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc";
}
else
{
$sql = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc limit $eu, $limit";

$sqltot = "SELECT * FROM users, user_profile, countries, religion, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc";
}

$result = mysql_query($sql,$conn);

$resulttot=mysql_query($sqltot);
$nume=mysql_num_rows($resulttot);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Search Results</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
</head>

<body topmargin="2" leftmargin="0" marginheight="2" marginwidth="0" background="images/background.jpg">
<script language="javascript" src="js/matrimonials-v10.js"></script>
			<center>
		
				<!-- The top link table starts here -->
				<div style="width: 762px;" align="right">
					<?PHP
					include("topheader.php");
					?>
				</div>
				<!-- The top link table ends here -->
			
			<!-- The topbanner table start's here -->
			<div style="width: 762px; background-color: rgb(255, 255, 255);">
			<div style="border-top: 1px solid rgb(143, 167, 191); border-left: 1px solid rgb(143, 167, 191); border-right: 1px solid rgb(143, 167, 191);">


				
		
				<!-- midlinks + services space -->
					<br style="line-height: 1px;" clear="all">
				<div>
					<div style="border-top: 2px solid #990000; border-bottom: 12px solid #990000; background-color: #990000; text-align: left;">
						
					</div>
				</div>
				<!-- The topbanner table end's here -->

				<!-- The tab table start's here -->
				<div style="margin: 0px; width: 100%;">
					<div style="width: 180px; background-color: rgb(255, 255, 255); float: left;">
						<div style="border-top: 2px solid rgb(0, 0, 0);">
						<div style="padding: 6px 0pt 0pt 0px; width: 170px;" class="smallblack"><div><?PHP
						if($_SESSION['UserID']!="")
						{
						?>
						<a href="logout.php" class="smallbluelink"><b>Logout</b></a> [<a href="my_profile.php" class="smallblackbold" title="<?PHP echo $_SESSION['LoginID']?>"><?PHP echo $_SESSION['LoginID']?></a>]
						<?PHP
						}
						else
						{
						?>
						<a href="login.php" class="smallbluelink"><b>Click here to login</b></a>
						<?PHP
						}
						?><br>
						<span style="line-height: 2px;"><br></span>
</div>
					
				</div>
				</div>
				</div>

				<div style="width: 580px; background-color: rgb(255, 255, 255); float: right; text-align: left;">
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 7px; float: left;"></div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 30px; float: left;"></div>
					<div style="width: 141px; float: left;border-top: 2px solid rgb(0, 0, 0);">
					</div>
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 12px; float: right;"></div>
				</div>
				<br clear="all">
				</div>

			</div>
			</div>
			<!-- The topbanner table ends here -->
			</center>

<div align="center">
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="762">
<tbody><tr>
<td rowspan="2" bgcolor="#8fa7bf" width="1"><spacer type="block" height="1" width="1"></td>
<td height="1" width="5"><spacer type="block" height="1" width="5"></td>
<td align="center" bgcolor="#eeeeee" valign="top" width="170"><span style="line-height: 5px;"><br></span>
<!-- LEFT BANNER STARTS HERE -->
<?PHP
 include "myleftbar.php";
?>
<!-- LEFT BANNER ENDS HERE -->
</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top">
<!-- CENTER STARTS HERE -->
<?

if(@mysql_num_rows($result)!=0)
{

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
<table 4="" border="0" cellspacing="0" width="565"><tbody>
<?PHP
if(@mysql_num_rows($result)!=0)
{
while($row = @mysql_fetch_array($result))
{
?>
<tr bgcolor="#FF8282" height="18">
		<td colspan="2" align="left">&nbsp; <a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>" class="smallbluelink" style="color:#000000 "><b><?PHP echo stripslashes($row['LoginID'])?></b></a></td>
		<td align="right"><img src="images/arrow-blu-3x5.gif" align="middle" border="0" height="5" hspace="5" width="3"><a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>" class="smallbluelink" style="color:#FFFFFF; font-weight:bold;">View full profile</a>&nbsp;</td>
		</tr>
		<tr bgcolor="#FFBFBF">
		<td style="border-bottom: 1px solid rgb(216, 241, 186);" align="center" background="images/photo-srchres.gif" height="78" width="80"><a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>"><img src="<?PHP 
				if($row['photo3']!="")
				echo $row['photo3'];
				else
				echo "images/f.gif";				
				?>" oncontextmenu="return false" border="0" height="60" width="60"></a></td>
		<td width="164" align="left" class="smallblack" style="border-bottom: 1px solid rgb(216, 241, 186);">
		<?PHP echo GetAge($row['BirthYear'], $row['BirthMonth'], $row['BirthDate'])?> yrs, <?PHP echo stripslashes($row['Height'])?>, <?PHP echo stripslashes($row['Religion'])?>, <br>
		<?PHP echo stripslashes($row['Profession'])?>,<br>
		from
	<?PHP echo stripslashes($row['State'])?>, <?PHP echo stripslashes($row['Country'])?></td>
		<td width="321" align="left" bgcolor="#FFE8E8" class="mediumblack" style="border-bottom: 1px solid rgb(216, 241, 186); padding-left: 15px; padding-right: 10px;"><?PHP
echo substr(stripslashes($row['AboutYourself']),0,200);
?>... <a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>" class="mediumbluelinksp" style="color:#000000 ">»»</a></td>
		</tr>
		<tr><td colspan="3" height="12"><spacer type="block" height="12"></td></tr>
<?PHP
}
}
?>		</tbody></table>
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

}

else
{
echo "Sorry, no match found in your search criteria..";
}
?>
<!-- CENTER STARTS HERE -->
</td>
<td width="5"><spacer type="block" width="5"></td>
<td rowspan="2" align="right" bgcolor="#8fa7bf" valign="top" width="1"><spacer type="block" width="1"></td>
</tr>
<tr bgcolor="#8fa7bf" valign="top">
	<td colspan="5" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table>
</div>

		<!-- BTM BANNER STARTS-->
		<center>
		
		<?PHP
			include("footer.php");
		?>
		</center>
</body></html>