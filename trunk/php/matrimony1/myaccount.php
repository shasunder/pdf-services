<?PHP
session_start();
if($_SESSION['UserID']=="")
{
	header("location: login.php");
}
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);


if($_POST['continue']=="true")
{
if($_POST['countryofbirth']=="")
{
$BirthCountry = 0;
}
else
{
$BirthCountry = $_POST['countryofbirth'];
}
			$insert = "update user_profile set BirthHour='".mysql_escape_string($_POST['timeofbirth_hour'])."', BirthMin='".mysql_escape_string($_POST['timeofbirth_min'])."', BirthSec='".mysql_escape_string($_POST['timeofbirth_sec'])."', CountryOfBirth=".$BirthCountry.", BirthCity=".$_POST['cityofbirth']." where UserID=".$_SESSION['UserID'];

			$resultt = mysql_query($insert);


	header("Location: profile4.php");
	exit();
}
$sql = "SELECT * FROM users, user_profile, countries WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.UserID=".$_SESSION['UserID'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - My Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style.css">
<style type="text/css" title="">
	<!--
	.list	{margin: 5px 0px 0px 5px; padding: 0px 0px 0px 5px; list-style-position: outside;}
	.list li	{margin: 0px 0px 0px 5px; padding: 0px 0px 4px 0px; list-style-position: outside;}
	-->
	</style>
		<script language="javascript">
		function popImg(iName) {
		var pURL=iName;
		pInfo='toolbar=0,';
		pInfo+='location=0,';
		pInfo+='directories=0,';
		pInfo+='status=0,';
		pInfo+='menubar=0,';
		pInfo+='scrollbars=0,';
		pInfo+='resizable=0';
	window.open(pURL, 'Image', pInfo);
}
		</script>

</head>

<body topmargin="2" leftmargin="0" marginheight="2" marginwidth="0" background="images/background.jpg">

<script language="javascript" src="images/matrimonials-v10.js"></script>
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
						<div style="padding: 6px 0pt 0pt 0px; width: 170px; background-color: #fff7e7" class="smallblack"><div><a href="logout.php" class="smallbluelink"><b>Logout</b></a> [<a href="my_profile.php" class="smallblackbold" title="nadiralishah"><?PHP echo $_SESSION['LoginID']?></a>]<br>
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
					<div style="width: 141px; float: left;border-top: 2px solid rgb(0, 0, 0);"></div>
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
<td width="5"><spacer type="block" height="1" width="5"></td>
<td align="center" bgcolor="#fff7e7" valign="top" width="170"><img src="images/spacer.gif" border="0" height="5" width="1"><br>
<!-- LEFT BANNER STARTS HERE -->
<?PHP
include "myleftbar.php";
?>
<!-- LEFT BANNER ENDS HERE -->
</td>
<td width="10"><spacer type="block" height="1" width="10"></td>
<td width="570" align="left" valign="top">
<!-- CENTER STARTS HERE -->


		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody><tr>
		<td height="7" width="350"><spacer type="block" height="7" width="350"></td>
		<td width="220"><spacer type="block" width="220"></td>
		</tr>

			<tr>
			<td align="left"><h2>My Account </h2></td>
			<td align="right">&nbsp;		</td>
			</tr>
		<tr><td colspan="2" bgcolor="#8fa7bf" height="1" width="1"><spacer type="block" height="1" width="1"></td></tr>
		<tr><td colspan="2" height="8" width="1"><spacer type="block" height="8" width="1"></td></tr>
		</tbody></table>

<!-- MAIN TABLE STARTS HERE  -->
<div class="mediumblack">
<b>Dear Member</b><font class="mediumblack"> (Profile ID: <?PHP echo $_SESSION['LoginID']?>)</font><br>
<span style="line-height: 5px;"><br>
<br></span></div>
<span style="line-height: 5px;"><br></span>
	<table border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td width="362">&nbsp;			</td>

		<td width="20">&nbsp;</td>

			<td>
			<?PHP
if($row['photo2'] != "")
{
?>
<a href="javascript:popImg('<?=stripslashes($row['photo1'])?>');"><img src="<?PHP echo $row['photo2']?>" border="0" height="200" width="150"></a>
<?PHP
}
else
{
?>
<a href="myphoto.php"><img src="images/photobg_nophoto.gif" border="0" height="155" width="150"></a>
<?PHP
}
?>

			</td>
			</tr>
	</tbody></table>

<table border="0" cellpadding="0" cellspacing="0">
<tbody><tr height="8">
	<td width="7"><img src="images/top-left.gif" border="0" height="8" width="7"><br></td>
	<td bgcolor="#fff7eb" width="556"><spacer type="block" height="8"></td>
	<td width="7"><img src="images/top-right.gif" border="0" height="8" width="7"><br></td>
</tr>

<tr valign="top">
	<td colspan="3" style="background: transparent url(http://img.shaadi.com/imgs/my-shaadi/bg-myshaadi.gif) repeat-x scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;" valign="top" width="570">&nbsp;		</td>
</tr>
</tbody></table>
<table border="0" cellpadding="0" cellspacing="0">

</table>
<span style="line-height: 5px;"><br></span>

<!-- MAIN TABLE ENDS HERE  -->
<!-- CENTER ENDS HERE --></td>
<td width="5"><spacer type="block" height="1" width="5"></td>
<td rowspan="2" bgcolor="#8fa7bf" width="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr>
<td colspan="6" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="5"></td>
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