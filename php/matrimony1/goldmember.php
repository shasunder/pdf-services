<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Congratulations! You are Updated to Gold Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/aboutus.css">
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
					<div style="border-top: 2px solid #990000; border-bottom: 12px solid #990000; background-color:#990000; text-align: left;">

					</div>
				</div>
				<!-- The topbanner table end's here -->

				<!-- The tab table start's here -->
				<div style="margin: 0px; width: 100%;">
					<div style="width: 180px; background-color: rgb(255, 255, 255); float: left;">
						<div style="border-top: 2px solid rgb(0, 0, 0);">
						<div style="padding: 6px 0pt 0pt 0px; width: 170px; background-color: #fff7e7" class="smallblack"><div>
						<?PHP
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
						?>
						<br>
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
<td valign="top" align="left">  <p class="largeblueboldlink"><strong>Congratulations! You Are Updated To Gold Member Successfully...</strong></p>

<?PHP

if($_REQUEST['ncid'] != "")
{
$delete = "update users set GoldMember=1, GoldMemberDate=NOW() WHERE UserID=".$_REQUEST['ncid'];
$sql = "SELECT * FROM users WHERE UserID=".$_REQUEST['ncid'];
}

else if($_REQUEST['pid'] != "")
{
$delete = "update users set GoldMember=1, GoldMemberDate=NOW() WHERE UserID=".$_REQUEST['pid'];
$sql = "SELECT * FROM users WHERE UserID=".$_REQUEST['pid'];
}

else if($_REQUEST['invoice'] != "")
{
$delete = "update users set GoldMember=1, GoldMemberDate=NOW() WHERE UserID=".$_REQUEST['invoice'];
$sql = "SELECT * FROM users WHERE UserID=".$_REQUEST['invoice'];
}

else if($_REQUEST['custom'] != "")
{
$delete = "update users set GoldMember=1, GoldMemberDate=NOW() WHERE UserID=".$_REQUEST['custom'];
$sql = "SELECT * FROM users WHERE UserID=".$_REQUEST['custom'];
}

else if($_REQUEST['item_number'] != "")
{
$delete = "update users set GoldMember=1, GoldMemberDate=NOW() WHERE UserID=".$_REQUEST['item_number'];
$sql = "SELECT * FROM users WHERE UserID=".$_REQUEST['item_number'];
}

else if($_REQUEST['coid'] != "")
{
$delete = "update users set GoldMember=1, GoldMemberDate=NOW() WHERE UserID=".$_REQUEST['coid'];
$sql = "SELECT * FROM users WHERE UserID=".$_REQUEST['coid'];
}

else if($_REQUEST['cart_order_id'] != "")
{
$delete = "update users set GoldMember=1, GoldMemberDate=NOW() WHERE UserID=".$_REQUEST['cart_order_id'];
$sql = "SELECT * FROM users WHERE UserID=".$_REQUEST['cart_order_id'];
}

$rt = mysql_query($delete,$conn);

$result = mysql_query($sql,$conn);


if (@mysql_num_rows($result)!=0){
$row = @mysql_fetch_array($result);
$_SESSION['UserID']=$row['UserID'];
$_SESSION['LoginID']=$row['LoginID'];
$_SESSION['GoldMember']=$row['GoldMember'];
$_SESSION['EmailAddress']=$row['EmailAddress'];
}
?>

<strong>Your Gold Member Status has been updated Successfully.. You are now a Gold Member.. Thank You for upgrading your MemberShip level..!</strong>

<p>&nbsp;</p>

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