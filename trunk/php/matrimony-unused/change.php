<?php 
if($_POST){
	ob_start();
	session_start();
	require_once("common/config.inc.php");
	include("common/function.php");
		$set="Password='".$_POST['newpass']."',DOM=now() where ProfileId='".$_SESSION['ProfileId']."' and Password='".$_POST['oldpass']."'";
		$matrimony->switchqry('tm_profile','UPDATE',$set,'');
} else {
	include "templates/change.template.php";
}
?>