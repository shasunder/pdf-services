<?php
require_once("../common/config.inc.php"); require_once("../common/function.php");
session_start(); ob_start(); $matrimony= new matrimony();

if($_POST) {
	$uname=trim($_POST['username']); $pwd=trim($_POST['password']);
	session_register('user'); session_register('login'); session_register('password'); session_register('admin_ID'); session_register('Status');
	
	$arg1=" where ad_Username='$uname' and ad_Password='$pwd'";
	$matrimony->switchqry('tm_admin','SELECT',$arg1,'*');
	$result=$matrimony->qry_result;
	$row= mysql_fetch_array($result);
	$num=mysql_num_rows($result);
	if($num>0) {
		$_SESSION['login']="validuser"; $_SESSION['user']=$row['ad_Username'];
		$_SESSION['admin_ID']=$row['ad_ID']; $_SESSION['Status']=$row['ad_Status'];
		header("Location:ManageUser.php");	
	} else {
		header("Location:index.php?id=1");
	}
}
?>
