<?php
session_start(); @ob_start();
include("common/config.inc.php");
include("common/function.php");
$matrimony = new matrimony();

class forgetmail extends matrimony
{
	function fmail(){
		require_once "Mail.php";
		$this->whrarg = " where EmailId='".$_REQUEST['mail']."'";
		$this->switchqry('tm_profile','SELECT',$this->whrarg,'Password');
		$rows=mysql_fetch_array($this->qry_result);
		$pass = $rows['Password'];
		$message="Password has been sent your Email";
		
		$from = "info@bride&groom.com";
		$to = $_REQUEST['mail'];
		$subject = "Bride&groom Password";
		$body.="<b>Your password for:</b><a href='bride&groom.com'>bride&groom.com</a> is: $pass";
		
		$host = "mail.benivolent.com";
		$username = "bst@benivolent.com";
		$password = "admin";
		$headers = array ('From' => $from,
						  'To' => $to,
						  'Subject' => $subject,
						  'MIME-Version' => "1.0",
						  'Content-Type' => "text/html; charset=iso-8859-1"
						  );

		$smtp = Mail::factory('smtp',array ('host' => $host,
											'auth' => true,
											'username' => $username,
											'password' => $password));

		$mail = $smtp->send($to, $headers, $body);
		
		if (PEAR::isError($mail)) {
			("<p>" . $mail->getMessage() . "</p>");
		}
	}
}
$forgetmail = new forgetmail();
$forgetmail->fmail();
?>