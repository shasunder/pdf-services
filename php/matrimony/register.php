<?
session_start();
ob_start();
require_once("common/config.inc.php");
include("common/function.php");
include("templates/homeheader.template.php");
$matrimony = new matrimony();
$matrimony->seturl();

if(!$_SESSION['valid']){
	$pcat= array("Assameme","Bengali","Bodo","Dogri","Gujarati","Hindi","Kannada","Kashmiri","Konkani","Maithili","Malayalee","Manipuri","Marathi","Marwadi","Nepali","oriya","Parsi","Punjabi","Sanskrit","Santhali","Sindhi","Tamil","Telugu","Urdu","Others");
	for($i=0; $i<sizeof($pcat); $i++) { if($_SESSION['lng']==$pcat[$i]) { $spcat[$i]='selected';  } else { $spcat[$i]=''; } }
	include("templates/registrationMain.template.php");
} else {
	$whrst2=" where ProfileId='".$_SESSION['ProfileId']."' and State!=''";
	$matrimony->switchqry('tm_profile','SELECT',$whrst2,'ResidingCountry');
	$numst2=mysql_num_rows($matrimony->qry_result);
	
	$whrst3=" where ProfileId='".$_SESSION['ProfileId']."'";
	$matrimony->switchqry('tm_partnerpreference','SELECT',$whrst3,'ProfileId');
	$numst3=mysql_num_rows($matrimony->qry_result);
	
	$whrst4=" where ProfileId='".$_SESSION['ProfileId']."'";
	$matrimony->switchqry('tm_family','SELECT',$whrst4,'ProfileId');
	$numst4=mysql_num_rows($matrimony->qry_result);

	if($numst2==0){
		include("templates/registrationStep2.template.php");
	}else if($numst4==0){ 
		include("templates/registrationStep4.template.php");
	} else if($numst3==0){ 
		include("templates/registrationStep3.template.php");
	}  else {
		header("location:./");
	}
}
include("templates/homefooter.template.php");
?>