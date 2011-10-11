<?
session_start();
ob_start();
if($_SESSION['valid']=='loginvalid'){
	include("common/config.inc.php");
	include("common/function.php");
	
	class myProfile extends matrimony
	{
		function myProfile(){
			$this->page = $_REQUEST['page'] ? $_REQUEST['page'] : 'full';
			if($this->page!='view'){
				$this->profileId = $_SESSION['ProfileId'];
			} else {
				$this->profileId = $_REQUEST['pid'];
				$this->sendmsg($this->profileId,$_SESSION['ProfileId'],2);
			}
		}
		function profileFetch()
		{
		
				$whrst3=" where ProfileId='".$this->profileId."'";
				$this->switchqry('tm_partnerpreference','SELECT',$whrst3,'ProfileId');
				$this->numst3=mysql_num_rows($this->qry_result);
				
				$whrst3=" where ProfileId='".$this->profileId."'";
				$this->switchqry('tm_family','SELECT',$whrst3,'ProfileId');
				$this->numst4=mysql_num_rows($this->qry_result);
				
				if($this->numst3>0)
				{
					$tbname = "tm_profile tmp,tm_partnerpreference tmpart,tm_family tmf";
					$arg1 = " WHERE tmp.ProfileId = '".$this->profileId."' and tmf.ProfileId = '".$this->profileId."' and tmpart.ProfileId = '".$this->profileId."'";
				} else if($this->numst4>0)
				{
					$tbname = "tm_profile tmp,tm_family tmf";
					$arg1 = " WHERE tmp.ProfileId = '".$this->profileId."' and tmf.ProfileId = '".$this->profileId."'".$ctn;
				} else {
					$tbname = "tm_profile tmp";
					$arg1 = " WHERE tmp.ProfileId = '".$this->profileId."'";		
				}
				
				$arg2 = "*,date_format(DOB,'%d %m %Y') as DOB";
				$this->switchqry($tbname,'SELECT',$arg1,$arg2);
				$this->profileResult = mysql_fetch_array($this->qry_result);
				$this->image_fetch($this->profileId,'');
		}
	}
	$myProfile = new myProfile();
	$myProfile->profileFetch();
	include("templates/homeheader.template.php");
	if($myProfile->page == "edit")
	{
		include("templates/myProfile.template.php");
	} else if($myProfile->page == "full")
	{
		include("templates/viewProfile.template.php");
	} else if($myProfile->page == "view")
	{
		include("templates/profileView.template.php");
	}
	include("templates/homefooter.template.php");
} else {
	header("location:./");
}
?>