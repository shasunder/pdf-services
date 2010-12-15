<?
session_start();
ob_start();
include("common/function.php");
if($_SESSION['valid']=='loginvalid'){
	include("templates/homeheader.template.php");
	include("templates/contentMessage_template.php");
	include("templates/homefooter.template.php");
} else {
	header("location:./");
}
?>