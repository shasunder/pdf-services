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
	include("templates/registerSimple.template.php");
} else {
	
	$whrst2=" where ProfileId='".$_SESSION['ProfileId']."'";
	$matrimony->switchqry('tm_profile','SELECT',$whrst2,'register_stage');
	$row= mysql_fetch_row($matrimony->qry_result);
	if($row == null ){
		die('where'.$whrst2.'stage'.$stage.'profile id:'.$_SESSION['ProfileId']);
		include("templates/registerSimple.template.php");
		return;
	}
	$stage = $row[0];
	
	if($stage =='simple'){
		include("templates/registrationMain.template.php");
	}
	else if($stage=='first'){
		include("templates/registrationStep2.template.php");
	}else if($stage=='second'){ 
		include("templates/registrationStep3.template.php");
	} else if($stage=='third'){ 
		include("templates/registrationStep4.template.php");
	}  else {
		header("location:./");
	}
}
include("templates/homefooter.template.php");
?>