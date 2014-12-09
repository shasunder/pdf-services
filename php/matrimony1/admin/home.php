<?PHP
	session_start();
	include("../connection.php");

	if ($_SESSION['LoginID'] == '')
	{
		header('LOCATION: index.php');
		exit();

	}

	$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.:: Admin Control Panel ::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">

<link href="menu.css" rel="stylesheet" type="text/css">
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
<body>
	<table border="0" cellspacing="0" width="1003">

		<Tr>
			<Td height='24' background='images/headCap.gif' align="right" colspan="2">

			 <span class="style1" >Welcome <?PHP echo $_SESSION['LoginID'] ?>!</span>
			 | <a href='logout.php' class='topcap'>Logout</a>


			</td>
		</Tr>
		<Tr>
			<Td height='24' align="Center" colspan="2">
			<div  style="font-weight:bold "class="style2">
				Welcome to Admin Control Panel
			</div>
			</td>
		</Tr>
		<tr>
			<td>
				<div style="margin: 0 0 0 10px ">
					<?PHP
					include("leftbar.php");
					?>
			 </div>

			</td>
			<Td>
					<?PHP
						if(isset($_REQUEST['msg']))
						{
					?>
						<p class="redbold"><br>

							<?PHP echo $_REQUEST['msg']?><br>
<br>

						</p>
					<?PHP
						}
					?>
			</Td>
		</tr>
	</table>
</body>
</html>