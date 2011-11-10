<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);
//print_r($_REQUEST);

if($_REQUEST['gender'] == "Male")
{
	$page_name="grooms.php";
}
else
{
	$page_name="brides.php";
}


if(!isset($_REQUEST["start"]))
{
$start = 0;
}
else
$start = $_REQUEST["start"];

$eu = ($start - 0);
$limit = 20;
$this1 = $eu + $limit;
$back = $eu - $limit;
$next = $eu + $limit;

if($_REQUEST['photograph'] == "Yes")
{
	$photo = " and user_profile.photo1<>'' ";
}
else
{
	$photo = "";
}


if($_REQUEST['caste'] == "Sub Caste" || $_REQUEST['caste'] == "Other")
{
	$caste1 = "";
}
else
{
	$caste1 = $_REQUEST['caste'];
}

if($_REQUEST['countryofresidence']!="" && $caste1=="")
{
$sql = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].") ".$photo." and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc limit $eu, $limit";

$sqltot = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' order by users.UserID desc";
}
else if($_REQUEST['countryofresidence']=="" && $caste1 != "")
{
$sql = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' and users.Caste LIKE '%".$caste1."%' order by users.UserID desc limit $eu, $limit";

$sqltot = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' and users.Caste LIKE '%".$caste1."%' order by users.UserID desc";
}
else if($_REQUEST['countryofresidence']!="" && $caste1 != "")
{
$sql = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' and users.Caste LIKE '%".$caste1."%' order by users.UserID desc limit $eu, $limit";

$sqltot = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and users.CountryID=".$_REQUEST['countryofresidence']." and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' and users.Caste LIKE '%".$caste1."%' order by users.UserID desc";
}
else
{
$sql = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' and users.Caste LIKE '%".$caste1."%' order by users.UserID desc limit $eu, $limit";



$sqltot = "SELECT * FROM users, user_profile, countries, states WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1 and users.Gender='".$_REQUEST['gender']."' and (users.Age BETWEEN ".$_REQUEST['agefrom']." and ".$_REQUEST['ageto'].")  ".$photo."  and user_profile.MotherTongue LIKE '%".$_REQUEST['mothertongue']."%' and users.Caste LIKE '%".$caste1."%' order by users.UserID desc";



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
<td align="center" bgcolor="#fff7e7" valign="top" width="170"><span style="line-height: 5px;"><br></span>
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
<table border="0" cellspacing="0" width="565" style="padding:5px;border:2px solid #FCE2AF"><tbody>
<?PHP
if(@mysql_num_rows($result)!=0)
{
while($row = @mysql_fetch_array($result))
{
?>
<tr bgcolor="#FB920B" height="18">
		<td colspan="2" align="left">&nbsp;


                        <?PHP
						if($_SESSION['UserID']!="")
						{
						?>
						 <a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>" class="smallbluelink" style="color:#FFF ">
						<?PHP
						}
						else
						{
						?>
						<a href="login.php" class="smallbluelink" style="color:#FFF ">
						<?PHP
						}
						?>






        <b><?PHP echo stripslashes($row['LoginID'])?></b></a></td>
		</tr>
		<tr bgcolor="#FFF" bordercolor="#F90">
		<td style="border-bottom: 1px solid #FEDFCB;" align="center" height="92" width="178">

 <?PHP
						if($_SESSION['UserID']!="")
						{
						?>
						 <a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>">
						<?PHP
						}
						else
						{
						?>
						<a href="login.php" class="smallbluelink" style="color:#FFF ">
						<?PHP
						}
						?>


        <img src="<?PHP
				if($row['photo3']!="")
				echo $row['photo3'];
				else
				echo "images/f.gif";
				?>" oncontextmenu="return false" border="0" width="70" style="border:1px solid #DADADA"></a></td>
		<td width="379" align="left" class="smallblack" style="border-bottom: 1px solid #FEDFCB;">

        <table width="300" style="margin-top:10px;margin-bottom:10px;border: 1px solid #FEDFCB;">
  <tr>
    <td style="border-bottom: 1px solid #FEDFCB;"><strong>Name : <?PHP echo stripslashes($row['Name'])?> </strong></td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #FEDFCB;"><strong>Age</strong> : <?PHP echo GetAge($row['BirthYear'], $row['BirthMonth'], $row['BirthDate'])?> yrs, </td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #FEDFCB;"><strong>Height</strong>: <?PHP echo stripslashes($row['Height'])?>, <strong> Sub Caste</strong>: <?PHP echo stripslashes($row['Religion'])?></td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #FEDFCB;"><strong>Profession</strong> : <?PHP echo stripslashes($row['Profession'])?></td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #FEDFCB;"> <strong>State</strong> : <?PHP echo stripslashes($row['State'])?>, <strong>Country</strong> : <?PHP echo stripslashes($row['Country'])?></td>
  </tr>
    <tr>
    <td style="color:#F30; font-weight:bold;"><img src="images/arrow-blu-3x5.gif" align="middle" border="0" height="5" hspace="5" width="3">

                        <?PHP
						if($_SESSION['UserID']!="")
						{
						?>
						 <a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>"  style="color:#F30;font-weight:bold;">View full profile</a>&nbsp;
						<?PHP
						}
						else
						{
						?>
						<a href="login.php" class="smallbluelink" style="color:#F30;font-weight:bold;">View full profile</a>&nbsp;
						<?PHP
						}
						?>



    </td>
  </tr>
</table>


    </td>


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