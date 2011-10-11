<?php
session_start(); @ob_start();

class regmail
{
	function rmail(){
		require_once "Mail.php";
		$from = "service@marrybanjara.com";
		$to = $_SESSION['EmailId'];
		$subject = "MarryBanjara Registration Confirmation";
		$body.="Dear User, <br /><br />
		Thanks for your registration,To continue please click : <a href='http://MarryBanjara.com'>MarryBanjara.com</a>";
		$host = "mail.benivolent.com";
		$username = "bst@benivolent.com";
		$password = "admin";
		$headers = "From:$from\n";
		$headers .= "CC:$cc\n";
		$headers.= "MIME-Version: 1.0\n";
		$headers.= "Content-Type: text/html;" ;
		ini_set("sendmail_from","service@".$_SERVER["SERVER_NAME"]);
		mail($to, $subject, $body, $headers);

	}
}
$regmail = new regmail();
$regmail->rmail();
?>