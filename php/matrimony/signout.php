<? 
session_start(); ob_start();
session_destroy();
//session_cache_expire(1);
//$_SESSION['bazaars']="";
//unset($_SESSION['bazaars']);
//unset($_SESSION['bazaarsUsername']);
//unset($_SESSION['bazaarsEmail']);
//unset($_SESSION['bazaarsProfileID']);
header("location:./");
?>