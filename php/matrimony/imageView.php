<?
session_start();
ob_start();
include("common/config.inc.php");
include("common/function.php");

class myProfile extends matrimony
{
	function profileFetch(){
		$proid = $_REQUEST['pid']?$_REQUEST['pid']:$_SESSION['ProfileId'];
		if($_REQUEST['iv']){
			$this->image_fetch($_SESSION['ProfileId'],'');
		}else{
			$this->image_fetch($_REQUEST['pid'],'sr');
		}
		$arg1 = " WHERE ProfileId = '".$proid."'";
		$this->switchqry('tm_profile','SELECT',$arg1,'FirstName,LoginId,MiddleName,LastName,ProfileId');
		$this->proresult = mysql_fetch_array($this->qry_result);
	}
}
$myProfile = new myProfile();
$myProfile->profileFetch();
include("templates/imageview.template.php");
?>