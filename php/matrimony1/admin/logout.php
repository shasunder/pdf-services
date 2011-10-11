<?PHP
	include("../connection.php");

	session_start();
	
	$_SESSION['LoginID'] = '';
	
	session_destroy();
	mysql_close($conn);	
	
	header('LOCATION: index.php');
	exit();
	
	
?>