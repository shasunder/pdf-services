<?php
session_start();
ob_start();
include("../common/config.inc.php");
include("../common/function.php");

class membership extends matrimony
{
	function insertMembership()
	{

	    $profileId = $_SESSION['ProfileId'];

		/*todo:
			1. check if profileId exists in tm_paymentdetail
			2. If doesnt exist insert
			3. If exists update existing.(this could be fooled..needs manual check often??
		*/

	    $autoId =$this->paymentAutoId('Id','tm_paymentdetail');

		$paymentId = $this->getPayment('Id', 'tm_paymentdetail', $profileId);

		$typeId=$_POST['memberType'];
		$viewedProfiles=0;
		$status ='R';
		$profileCount =30;
		$payMode=$_POST['payMode'];

		//echo 'done'. $autoId.' profileId'.$profileId.$_POST['memberType'].' paymentId:'.$paymentId;

		if($paymentId ==null){
			$argValues=$autoId." , ".$typeId.",".$viewedProfiles.", now(), now(),'".$payMode."', '".$status."','".$profileId."',".$profileCount;
			$this->switchqry('tm_paymentdetail','INSERT','',$argValues);

		}else{

			$setValues="pay_mode = '".$payMode."', Typeid=".$typeId.", date_updated=now() where ProfileId='$profileId'";

			$this->switchqry('tm_paymentdetail','UPDATE',$setValues,'');

		}



	}


	function paymentAutoId($Id,$tname){
			$arg1 = "";
			$arg2 = "Max(".$Id.")";
			$this->switchqry($tname,'SELECT',$arg1,$arg2);
			$res = mysql_fetch_array($this->qry_result);
			return $this->id =$res['Max('.$Id.')']+1;
	}

	function getPayment($Id,$tname,$profileId){
				$arg1 = " where Profileid ='".$profileId."'";
				$arg2 = $Id;
				$this->switchqry($tname,'SELECT',$arg1,$arg2);
				$res = mysql_fetch_array($this->qry_result);
				return $this->id =$res[$Id];
	}




}

$membership = new membership();
if($_POST['action'] =='membership')
$membership->insertMembership();
?>

Result