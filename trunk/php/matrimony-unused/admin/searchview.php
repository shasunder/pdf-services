<?
session_start(); ob_start();
if($_SESSION["login"] == "validuser") {
	include("templates/header.template.php");
	include("templates/menu.template.php");
	include("templates/searchview.template.php");
	include("templates/footer.template.php"); }
else { header("Location:index.php"); }	
?>
