<?php 
session_start();
ob_start();
include("common/config.inc.php");
$fg=$_SESSION['ProfileId'];
$pquery="select * from tm_paymentdetail where Profileid='".$fg."'";
$pqueryresult=mysql_query($pquery);

//echo  $pquery;

while ($row=mysql_fetch_array($pqueryresult))
{
	$pcount=$row['ProfileCount'];
	$vprofile=$row['Viewedprofiles'];

}

include("templates/homeheader.template.php");
include("templates/myaccountprofiles.template.php");
include("templates/homefooter.template.php");


?>