<?
session_start();
ob_start();
	include("common/config.inc.php");
	include("common/function.php");

if($_SESSION['valid']=='loginvalid'){
	class myhome extends matrimony
	{
		function myhome(){
			$this->profileId = $_SESSION['ProfileId'];
		}
		function myhomeFetch(){
				$arg1 = " WHERE ProfileId = '".$this->profileId."'";
				$this->switchqry('tm_profile','SELECT',$arg1,'*');
				$this->myhomeResult = mysql_fetch_array($this->qry_result);
				$this->image_fetch($this->profileId,'');
		}
	}
	$myhome = new myhome();
	$myhome->myhomeFetch();

	include("templates/homeheader.template.php");
	include("templates/myhome.template.php");
	include "templates/homefooter.template.php";
}else {
	include "templates/homeheader.template.php";
	include "templates/homecontent.template.php";
	include "templates/homefooter.template.php";
}
?>