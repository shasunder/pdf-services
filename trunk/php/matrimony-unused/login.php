<?
session_start();
ob_start();
if(!$_SESSION['valid']){
	require_once("common/config.inc.php");
	require_once("common/function.php");
	$matrimony= new matrimony();
	
	class loginclss extends matrimony
	{
		function login_main(){
			$arg1=" where (LoginId='".trim($_POST['matrimonyid'])."' or EmailId='".trim($_POST['matrimonyid'])."') and Password='".trim($_POST['txtpassword'])."'";
			$this->switchqry('tm_profile','SELECT',$arg1,'*');
			$result=$this->qry_result;
			$row= mysql_fetch_array($result);
			$num=mysql_num_rows($result);
			if($num>0) {
				$cnt=$row['visit_id'];
				if($cnt=="") {
					$count=1;
				}else{
					$count=$cnt+1;
				}
				
				$_SESSION['valid']="loginvalid"; $_SESSION['LoginId']=$row['LoginId']; $_SESSION['Gender']=$row['Gender'];
				$_SESSION['EmailId']=$row['EmailId']; $_SESSION['ProfileId']=$row['ProfileId']; $_SESSION['state']=$row['contrycode'];
				$_SESSION['ProfileStatus']=$row['ProfileStatus'];$_SESSION['LastVisted']=$row['LastVisted'];
				$_SESSION['DOM']=$row['DOM'];
				
				$uparg=" visit_id='$count',LastVisted=now() where LoginId='".$row['LoginId']."'";
				$this->switchqry('tm_profile','UPDATE',$uparg,'');
				header("Location:./");
			} else {
				//echo $this->loginmsg="Invalid Email Id/Password";			
				header("Location:login.php?id=1");
			}
		}
	}
	$loginclss = new loginclss();
	if($_POST){ $loginclss->login_main(); }
	include("templates/homeheader.template.php");
	include("templates/login.templatee.php");
	include("templates/homefooter.template.php");
} else {
	header("location:./");
}
?>