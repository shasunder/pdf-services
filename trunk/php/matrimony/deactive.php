<?php 
ob_start();
session_start();
require_once("common/config.inc.php");
include("common/function.php");
$set="ProfileStatus='I',DOM=now() where ProfileId='".$_SESSION['ProfileId']."'";
$matrimony->switchqry('tm_profile','UPDATE',$set,'');
header("location:./");
?>