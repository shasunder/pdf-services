<?PHP
	session_start();
	include("../connection.php");

	if ($_SESSION['LoginID'] == '' || $_SESSION['LoginID']!='admin')
	{
		header('LOCATION: index.php');

	}

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

if ($_POST['continue'] == "true"){

if($_REQUEST['smtpstatus']=="true")
{
$smtpstatus = 1;
}
else
{
$smtpstatus = 0;
}

if($_REQUEST['port'] == "")
{
$port = 25;
}
else
{
$port = $_REQUEST['port'];
}

	$updatCategory = "UPDATE admin SET ScriptName='".mysql_escape_string($_POST['ScriptName'])."', url='".mysql_escape_string($_POST['url'])."', AdminEmail='".mysql_escape_string($_POST['AdminEmail'])."', AdminEmailPassword='".mysql_escape_string($_POST['AdminEmailPassword'])."', smtp='".mysql_escape_string($_POST['smtp'])."', smtpstatus=".$smtpstatus.", paypal='".mysql_escape_string($_POST['paypal'])."', twoco='".mysql_escape_string($_POST['twoco'])."', nochex='".mysql_escape_string($_POST['nochex'])."', goldmemberfee='".mysql_escape_string($_POST['goldmemberfee'])."', port=".$port;
	mysql_query($updatCategory);
	$msg="Settings have been updated successfully..!";
}


	$sqlSeller = "SELECT * from admin";
	$resultSeller= mysql_query($sqlSeller);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.:: Settings ::.</title>
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
					<h1 style="text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; ">Settings</h1>

<div style="text-align:center">
			<?PHP
			if($msg != "")
			{
			?>
			<p align="center" class="blackbold"><?PHP echo $msg?><br><br></p>
			<?PHP
			}
			?>
</div>


<table border="0" cellpadding="0" cellspacing="0" width="98%" >
						<Tr>
							<Td width="16" height="24"><img src="images/news/1.gif"></Td>
							<Td background="images/news/2.gif" class="style2" style="font-weight:bold ">Settings</Td>
							<Td width="16" height="24"><img src="images/news/3.gif"></Td>
						</Tr>
						<Tr >
							<Td background="images/news/7.gif"></Td>
							<Td align="center" valign="top" background="images/news/9.gif">
							<div style="margin:10px" align="left">
								<form action="settings.php" method="post">
									<table width="100%" align="center" cellspacing="5">

									<tr>
										<td align="left">
										Script Name:
										</td>

										<td align="left">
										<input type="text" name="ScriptName" value="<?PHP echo stripslashes($row['ScriptName'])?>" size="50">
										</td>
									</tr>
									<tr><td colspan="2" height="5"></td></tr>
									<tr>
										<td align="left">
										Script URL:
										</td>

										<td align="left">
										<input type="text" name="url" value="<?PHP echo stripslashes($row['url'])?>" size="50">
										</td>
									</tr>
									<tr><td colspan="2" height="5"></td></tr>
									<tr>
										<td align="left">
										Authentication:
										</td>

										<td align="left">
										<input type="checkbox" name="smtpstatus" value="true"
										<?PHP
										if($row['smtpstatus']==1)
											echo "checked";
										?>
										>	(check this box if email server requires authentication)
										</td>
									</tr>
									<tr><td colspan="2" height="5"></td></tr>
									<tr>
										<td align="left">
										Email Address:
										</td>

										<td align="left">
										<input type="text" name="AdminEmail" value="<?PHP echo stripslashes($row['AdminEmail'])?>" size="50"><br>
(You must provide if email server requires authentication or not)
										</td>
									</tr>
									<tr><td colspan="2" height="5"></td></tr>
									<tr>
										<td align="left">
										Email Password:
										</td>

										<td align="left">
										<input type="password" name="AdminEmailPassword" value="<?PHP echo stripslashes($row['AdminEmailPassword'])?>" size="50"><br>
(if email server requires authentication)
										</td>
									</tr>
									<tr><td colspan="2" height="5"></td></tr>
									<tr>
										<td align="left">
										SMTP:
										</td>

										<td align="left">
										<input type="text" name="smtp" value="<?PHP echo stripslashes($row['smtp'])?>" size="50"> (email server)<br>
(if email server requires authentication)
										</td>
									</tr>
									<tr><td colspan="2" height="5"></td></tr>
									<tr>
										<td align="left">
										SMTP Port:
										</td>

										<td align="left">
										<input type="text" name="port" value="<?PHP echo $row['port']?>" size="50"><br>
(if email server requires authentication - usally it is 25, if yourz is something else, please update..)
										</td>
									</tr>



  <tr>
                                <td align="left" colspan="2" bgcolor="#CCCCFF" height="20">
 <strong>&nbsp;MemberShip level settings:</strong>
 </td>
                              </tr>


							  <tr>
                                <td align="left"> Gold Member Fee (US$): </td>
                                <td align="left">
                                  <input type="text" name="goldmemberfee" value="<?PHP echo $row['goldmemberfee']?>" size="50">
								</td>
                              </tr>

							  <tr>
                                <td align="left"> Paypal Email: </td>
                                <td align="left">
                                  <input type="text" name="paypal" value="<?PHP echo $row['paypal']?>" size="50">
								</td>
                              </tr>

							  <tr>
                                <td align="left"> 2CheckOut Seller ID: </td>
                                <td align="left">
                                  <input type="text" name="twoco" value="<?PHP echo $row['twoco']?>" size="50">
								</td>
                              </tr>

							  <tr>
                                <td align="left"> Nochex Email: </td>
                                <td align="left">
                                  <input type="text" name="nochex" value="<?PHP echo $row['nochex']?>" size="50">
								</td>
                              </tr>



									<tr><td colspan="2" height="5"></td></tr>
									<tr align="center">
										<Td></Td>
										<td align="left">
										</br>
											<input type="hidden" name="continue" value="true">
									  <input type="submit" value="  Update Settings  "/></td>
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