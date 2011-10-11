<?
session_start(); ob_start();
if($_SESSION["login"] == "validuser") {
include("../common/config.inc.php");
include("../common/function.php");
include("templates/header.template.php");
include("templates/menu.template.php");
include("../ajax/recordsDisplay.php");
include("templates/manageuser.template.php");
include("templates/footer.template.php"); }
else { header("Location:index.php"); }
?>