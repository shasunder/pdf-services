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

if ($_POST['continue'] == "true"){
	$updatCategory = "UPDATE admin SET LoginID='".mysql_escape_string($_POST['LoginID'])."', Password='".mysql_escape_string($_POST['Password'])."'";
	mysql_query($updatCategory);
	$msg="Login Details have been updated successfully..!";
}


	$sqlSeller = "SELECT * from admin";
	$resultSeller= mysql_query($sqlSeller);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.:: Update Admin Login and Password ::.</title>
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
<script language="javascript">
function validate(theform)
{
if(theform.LoginID.value=="")
{
	alert("please enter Login ID");
	theform.LoginID.focus();
	return false;
}
else if(theform.Password.value=="")
{
	alert("please enter Password");
	theform.Password.focus();
	return false;
}
return true;
}
</script>
</head>
<body >
	<table width="75%" border="0" align="center" cellspacing="0">

		<Tr>

			<Td height='24' colspan="2" align="right" background='images/headCap.gif'>
				<span class="style1" >
					Welcome <?PHP echo $_SESSION['LoginID'] ?>! |
					<a href='home.php' class='topcap'>Home</a>|
					<a href='logout.php' class='topcap'>Logout</a>
				</span>
			</td>
		</Tr>

		<tr valign="top">
			<td width="218">
				<div style="margin-left:10px">
					<?PHP
					include("leftbar.php");

					if (@mysql_num_rows($resultSeller)!=0){
					$row = mysql_fetch_array($resultSeller);
					}
					?>
			 </div>
			</td>
   			<td width="781" align="center">
					<h1 style="text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; ">Update Admin Login ID and Password</h1>

<div style="text-align:center">
			<?PHP
			if($msg != "")
			{
			?>
			<p align="center" class="blackbold"><?=$msg?><br><br></p>
			<?PHP
			}
			?>
</div>


<table border="0" cellpadding="0" cellspacing="0" width="600" >
						<Tr>
							<Td width="16" height="24"><img src="images/news/1.gif"></Td>
							<Td background="images/news/2.gif" class="style2" style="font-weight:bold ">Update Admin Login ID and Password</Td>
							<Td width="16" height="24"><img src="images/news/3.gif"></Td>
						</Tr>
						<Tr >
							<Td background="images/news/7.gif"></Td>
							<Td align="center" valign="top" background="images/news/9.gif">
							<div style="margin:10px" align="left">
								<form action="edit_login.php" method="post" onSubmit="return validate(this)">
									<table width="48%" align="center">

									<tr>
										<td>
										Login ID:
										</td>

										<td>
										<input type="text" name="LoginID" value="<?=$row['LoginID']?>">
										</td>
									</tr>

									<tr>
										<td>
										Password:
										</td>

										<td>
										<input type="password" name="Password" value="<?=$row['Password']?>">
										</td>
									</tr>
									<tr align="center">
										<Td></Td>
										<td>
										</br>
											<input type="hidden" name="continue" value="true">
											<input type="submit" value="  Update  " />
										</td>
									</tr>

							  	</table>
							  </form>
							 </div>
							</Td>

							<Td background="images/news/8.gif"></Td>
						</Tr>
						<Tr>
							<Td width="16" height="26"><img src="images/news/4.gif"></Td>
							<Td background="images/news/6.gif"></Td>
							<Td width="16" height="26"><img src="images/news/5.gif"></Td>
						</Tr>
					</table>

			</td>
		</tr>
		<tr>
		</tr>
</table>
</body>
</html>