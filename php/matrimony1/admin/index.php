<?PHP
	session_start();
	include("../connection.php");

	$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

	$msgEmail='';
	if 	(isset($_POST['MemberID']))
	{
		$sqlLogin = "SELECT * from admin WHERE LoginID='".mysql_escape_string($_POST['MemberID'])."' AND Password='".mysql_escape_string($_POST['Password'])."'";
		$resultLogin= mysql_query($sqlLogin);
		$row = mysql_fetch_array($resultLogin);

		if ($row['LoginID'] == mysql_escape_string($_POST['MemberID']) & $row['Password'] == mysql_escape_string($_POST['Password']) )
		{

			$_SESSION['LoginID'] = stripslashes($row['LoginID']);
			header('LOCATION: home.php');
			exit();
		}
		else
			$msgEmail = "<font style='font-family:Verdana; font-size:10px; font-weight:bold; color:#FF0000; border:0px dashed #FF0000 '>* Invalid Login ID or Pawword</font>";
	}




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.:: Admin Control Panel ::.</title>
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
<script language="javascript" type="text/javascript">
	function validate(theform)
	{
		if(theform.MemberID.value == "")
		{
			alert ("Please Enter the LOGIN ID");
			theform.MemberID.focus();
			return false;

		}

		else if(theform.Password.value == "")
		{
			alert ("Please Enter Your Password ");
			theform.Password.focus();
			return false;

		}

	}
	function check(){
		document.getElementById('MemberID').focus();
	}
</script>
</head>
<body onLoad="check()">
	<table border="0" cellspacing="0" width="1003">
		<Tr  align="center">
			<Td colspan="2">
				<table border="0" cellpadding="5" cellspacing="0" style="vertical-align:top">
					<Tr align="center">
						<Td  align="center" width="761">
						<div class="width">
								    <br/>
									<div class="left tleft">
									<font style="font-size:20pt;"><span style="color:#FF9D3D">GorBanjara </span><span style="color:#FC9E93">Matrimonial Admin</span> </font>

							</div>

						</Td>
					</Tr>
			  </table>
			</td>
		</Tr>
		<Tr>
			<Td height='24' background='images/headCap.gif' align='right'></td>
		</Tr>
		<tr align="center">
			<td>
				<div style="margin-top:20px; ">
					<table border="0" cellpadding="0" cellspacing="0" >
						<Tr>
							<Td width="16" height="24"><img src="images/news/1.gif"></Td>
							<Td background="images/news/2.gif" class="style2" style="font-weight:bold ">Administrator Control Panel</Td>
							<Td width="16" height="24"><img src="images/news/3.gif"></Td>
						</Tr>
						<Tr>
							<Td background="images/news/7.gif"></Td>
							<Td valign="top" background="images/news/9.gif">
							<form action="index.php" method="post" onsubmit="return validate(this);">
								<div align="left" style="margin-top:15px ">

								<table width="200" align="left">
									<tr>
								<?PHP
									if ($msgEmail!=''){
										echo $msgEmail;
									}
								?>

										<td >
											<label class="style2">Login:</label>
											<input size="30" id="MemberID" name="MemberID"/>
										</td>
									</tr>
									<tr>
										<td>
											<label class="style2">Password:</label><br />
											<input size="30" type="password"  id="Password" name="Password"/>
										</td>
									</tr>
									<tr align="center">
										<td>
											<input type="submit"  id="Submit" name="Submit" value="   Enter   "/>
										</td>
									</tr>
								</table>

								</div>
							</form>
							</Td>
							<Td background="images/news/8.gif"></Td>
						</Tr>
						<Tr>
							<Td width="16" height="26"><img src="images/news/4.gif"></Td>
							<Td background="images/news/6.gif"></Td>
							<Td width="16" height="26"><img src="images/news/5.gif"></Td>
						</Tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>