<?PHP
session_start();
if($_SESSION['UserID']=="")
{
	header("location: login.php");
	exit();
}

include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

$sqlProduct="update interests set DenyStatus=1 where MessageID=".$_REQUEST['id'];
$resultProduct=mysql_query($sqlProduct);

$sqlProduct="select * from interests, users where interests.SenderID=users.LoginID and interests.MessageID=".$_REQUEST['id'];
$resultProduct=mysql_query($sqlProduct);	
$row = @mysql_fetch_array($resultProduct);

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
	$mail->AddAddress($row['EmailAddress']);  

	
	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML
	
	$mail->Subject = "Your Interest has been Denied";
	
	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". $row['LoginID'] . ",<br><br>Sorry! Your Interest has been denied by ". $row['RecieverID'];
	
	$mail->Body = $email_layout;
	$mail->Send();
	}
	else
	{
	$to= $row['EmailAddress'];
	$subject="Your Interest has been Denied";
	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". $row['LoginID'] . ",<br><br>Sorry! Your Interest has been denied by ". $row['RecieverID'];
	$description=$email_layout;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);

	}
		
header("location: interests.php?msg=Member has been notified about your Action..");
?>