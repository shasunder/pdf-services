<?php 
session_start();
ob_start();?>

<?php


if($_SESSION['valid']=='loginvalid'){
	include("common/config.inc.php");
	include("common/function.php");
$session=$_REQUEST['session'];
$qry="SELECT Id,Title,Query,Type  from tm_savesearch where Profileid='".$session."'";
		
				$Result= mysql_query($qry);
	$ResultCount=mysql_num_rows($Result);
	include("templates/homeheader.template.php");
	?>
	<div id="srules">
	<?php     
	include("templates/searchrule.templates.php");
	echo "</div>";


?>

<div id="srulesresults"></div>
<?php include("templates/homefooter.template.php");}?>