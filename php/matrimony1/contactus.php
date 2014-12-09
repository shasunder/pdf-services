<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

$msg = "";
if($_REQUEST['continue'] == "true")
{

if($rowsettings['smtpstatus'] == 1)
{
require("phpmailer/class.phpmailer.php");

	$mail = new PHPMailer();

	$mail->IsSMTP();
	$mail->Host = $rowsettings['smtp'];
	$mail->Port = $rowsettings['port'];
	$mail->SMTPAuth = true;
	$mail->Username = $rowsettings['AdminEmail'];
	$mail->Password = $rowsettings['AdminEmailPassword'];

	$mail->From = $rowsettings['AdminEmail'];
	$mail->FromName = $rowsettings['ScriptName'];
	$mail->AddAddress($rowsettings['AdminEmail']);


	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = "Contact Us form submitted";
	$mail->Body = "Name: ".$_REQUEST['name']."<br><br>Email: ".$_REQUEST['email']."<br><br>Message: ".$_REQUEST['message'];
	$mail->Send();
}
else
{
	$to=$rowsettings['AdminEmail'];
	$subject="Contact Us form submitted";
	$description="Name: ".$_REQUEST['name']."<br><br>Email: ".$_REQUEST['email']."<br><br>Message: ".$_REQUEST['message'];
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);
}

	$msg = "Thanks for contacting us...";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Gor Banjara matrimonial - Contact Us</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/contactus.css">
<link rel="stylesheet" href="css/profile1.css">
<script language="javascript" src="js/contactus.js"></script>
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
			</center>

<div align="center">
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="762">
<tbody><tr>
<td rowspan="2" bgcolor="#8fa7bf" width="1"><spacer type="block" height="1" width="1"></td>
<td height="1" width="5"><spacer type="block" height="1" width="5"></td>
<td align="center" bgcolor="#FFF7E7" valign="top" width="170"><span style="line-height: 5px;"><br></span>
<!-- LEFT BANNER STARTS HERE -->
<?PHP
 include "myleftbar.php";
?>
<!-- LEFT BANNER ENDS HERE -->
</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top" align="left"> <p><strong>Contact US</strong></p>

<?PHP
if($msg!="")
{
?>
<p style="font:'Times New Roman', Times, serif; color:#990000">
  	<b><?PHP echo $msg?></b>
</p>
<?PHP
}
?>

  <p>As a member, you can contact us in the following ways:
  </p>
  <ul>
    <li>Email: <?PHP echo $rowsettings['AdminEmail'] ?></li>

</ul>

  <form method="post" action="contactus.php" name="frmcontactus" onSubmit="return validateform(this);">
<div class="boldgreen" style="color:#990000 "><b>Contact Us by submit this form:</b></div>

			<table class="tbl1" style="margin-left: 1px;" border="0" cellpadding="5" cellspacing="0" width="500">
			<tbody>
			<tr valign="top">
					<td class="td1" valign="top">
					<strong>Your Name:</strong> <input type="text" name="name" size="40">
				</td>
			</tr>

				<tr valign="top">
					<td class="td1" valign="top">
					<strong>Your Email:&nbsp;</strong> <input type="text" name="email" size="40">
				</td>
			</tr>
			<tr valign="top">
					<td class="td1" valign="top">
					<strong>Message:</strong><br>
				<textarea name="message" id="message" rows="8" cols="50"></textarea>
				<br> <input type="hidden" name="continue" value="true">
<input type="image" src="images/submit.gif">
				</td>
			</tr>

			</tbody></table>
</form><br>

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