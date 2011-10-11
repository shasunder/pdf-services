<?
	include("connection.php");
	session_start();
	setcookie ("user", "", time()-604800); 
	$_SESSION['UserID'] = '';
	$_SESSION['EmailAddress'] = '';  
	$_SESSION['LoginID'] = '';
	$_SESSION['GoldMember'] = '';

	session_destroy();
	mysql_close($conn);	
	
	header('LOCATION: index.php');
	exit();
	
	
?>