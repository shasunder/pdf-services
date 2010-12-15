<?
session_start();
ob_start();
include("common/config.inc.php");
include("common/function.php");
require_once "Mail.php";
$matrimony = new matrimony();

class insert_main extends matrimony
{
	function case_insertfn(){/*---------- for all registration pages insertion-----------*/

	$casearg=$_POST['index'];
	switch($casearg)
	{
		case "first":{
			$rparr1 = $this->postarrfn();
			$dobdb=implode("-",array($rparr1[ddlYear],$rparr1[ddlMonth],$rparr1[ddlDate]));
			
		    $codeid=array('BGASM','BGBGL','BGBDO','BGDGI','BGGRT','BGHND','BGKND','BGKSH','BGMTI','BGMLI','BGMRW','BGMRI','BGMRT','BGNPL','BGORA','BGPRS','BGSKT','BGSTL','BGSND','BGTML','BGTLG','BGPJB','BGURD','BGOTR');					
			$pstate=array('Assamese','Bengali','Bodo','Dogri','Gujarati','Hindi','Kannada','Kashmiri','Maithili','Malayali','Marwari','Manipuri','Marathi','Nepali','Oriya','Parsi','Sanskrit','Santhali','Sindhi','Tamil','Telugu','Punjab','Urdu','Others');		
			for($i=0;$i<25;$i++){
				if($rparr1[ddlPrefer] == $pstate[$i]){
				$sid=$codeid[$i];}
			}
			$retid =$this->bgautoId('tm_autoid','tm_profile',$sid,$rparr1[ddlPrefer]);
			$bgID=$sid.$retid;			
			$fields="ProfileId,LoginId,Emailid,Password,ProfileStatus,CreatedBy,ProfileCategory,FirstName,MiddleName,LastName,Gender,DOB,Age,MaritialStatus,NoofChildren,ChildrenLivingStatus,Citizenchip,ResidingCountry,Religion,CastDivision,Subcaste,Tele_Country,Tele_std,Tee_mobile,Tele_Phone,contrycode,tm_autoid,tmid_count,visit_id,Adminstatus,DOJ,DOM";
			$argValues="'".$bgID."','$rparr1[txtLogin]','$rparr1[txtEmail]','$rparr1[txtPwd]','A','$rparr1[ddlProfile]','$rparr1[ddlPrefer]','$rparr1[txtFname]','$rparr1[txtMname]','$rparr1[txtLname]','$rparr1[radioGender]','".$dobdb."','$rparr1[txtAge]','$rparr1[ddlMarital]','$rparr1[ddlChildren]','$rparr1[radioChildStatus]','$rparr1[citizenHd]','$rparr1[countryHd]','$rparr1[ddlReligion]','$rparr1[ddlCommunity]','$rparr1[txtCaste]','$rparr1[txtCcode]','$rparr1[txtAcode]','$rparr1[txtMobile]','$rparr1[txtPhone]',$rparr1[ddlCountry],tm_autoid,'".$retid."',1,'B',now(),now()";
			$this->switchqry('tm_profile','INSERT',$fields,$argValues);
			$this->RegSession_Register();
			
			$arg1=" where LoginId='".$rparr1['txtLogin']."' and Password='".$rparr1['txtPwd']."'";
			$this->switchqry('tm_profile','SELECT',$arg1,'LoginId,EmailId,ProfileId,ProfileStatus,Gender,ResidingCountry');
			$row= mysql_fetch_array($this->qry_result);

			if($this->qry_result){

				$_SESSION['valid']="loginvalid"; $_SESSION['LoginId']=$row['LoginId'];
				$_SESSION['EmailId']=$row['EmailId']; $_SESSION['ProfileId']=$row['ProfileId']; $_SESSION['state']=$rparr1['ddlCountry'];
				$_SESSION['ProfileStatus']=$row['ProfileStatus']; $_SESSION['Gender']=$row['Gender']; $_SESSION['lng']=$rparr1['ddlPrefer'];
				include_once("mail_reg.php");
				header("Location:register.php");
			}else { echo mysql_error(); }
		break;
		}
		case "second":{
	    	$proid=$_SESSION['ProfileId'];
			$rparr2 = $this->postarrfn();
			$exheight = $this->getheightcm($rparr2[ddlfeet]);			
		 	$setValues="Food='$rparr2[radiofood]',Smoking='$rparr2[radiosmoke]',Drinking='$rparr2[radioliquor]',Complaexion='$rparr2[radiocomp]',BodyType='$rparr2[radiobody]',BloodGroup='$rparr2[ddlblood]',Height='$exheight',Weight='$rparr2[ddlkgs]',PhysicalStatus='$rparr2[ddlphysical]',State='$rparr2[stateHd]',City='$rparr2[txtCity]',Zip='$rparr2[txtpincode]',EducationCat='$rparr2[ddle_category]',EducationQual='$rparr2[ddle_qual]',Educationspecialization='$rparr2[txtspecial]',Occupation='$rparr2[ddlocc]',Employementtype='$rparr2[ddlemptype]',AnnCurrency='$rparr2[ddlincome]',Salary='$rparr2[txtincome]',Gothram='$rparr2[txtgrm]',Star='$rparr2[ddlstar]',Raasi='$rparr2[ddlrassi]',KujaDhosam='$rparr2[radiodosham]',DOA='0000-00-00 00:00:00',DOBK='0000-00-00 00:00:00',LastVisted=now(),Address='$rparr2[txtaddress]' where ProfileId='$proid'";
		if($proid){$this->switchqry('tm_profile','UPDATE',$setValues,''); }
			header("Location:register.php");
			break;
		}
		case "third":{
         	$proid=$_SESSION['ProfileId'];
			$rparr3 = $this->postarrfn();
			$exheightfrm = $this->getheightcm($rparr3[ddlfeet]);			
			$exheightto = $this->getheightcm($rparr3[ddlfeet1]);			
			$argValues="'".$proid."','$rparr3[txtage1]','$rparr3[txtage2]','$rparr3[radiomarital]','$rparr3[motherHd]','$rparr3[religionHd]','$rparr3[communityHd]','$rparr3[txtcaste]','$rparr3[categoryHd]','$rparr3[occHd]','$rparr3[emptypeHd]','$rparr3[citizenHd]','$rparr3[countryHd]','$rparr3[stateHd]','$rparr3[cityHd]','$rparr3[rfood]','$rparr3[txtabout]','$rparr3[statusHd]','$exheightfrm','$exheightto','$rparr3[rdosham]'";
			if($proid){$this->switchqry('tm_partnerpreference','INSERT','',$argValues);}
			header("Location:register.php");
		break;
		}
		case "fourth":{
		 	$proid=$_SESSION['ProfileId'];
			$rparr4 = $this->postarrfn();
			$argVal="'".$proid."','$rparr4[ddlfvalue]','$rparr4[ddlftype]','$rparr4[ddlstatus]','$rparr4[ddlfather]','$rparr4[ddlmother]','$rparr4[Brothers]','$rparr4[Sisters]','$rparr4[brothers_married]','$rparr4[sister_married]','$rparr4[txtfamily]'";
		 	$setValues="AboutMe='$rparr4[txtme]' where ProfileId='$proid'";
			if($proid){
			$this->switchqry('tm_family','INSERT','',$argVal);
			$this->switchqry('tm_profile','UPDATE',$setValues,'');}
			header("location:myProfile.php");
		break;
		}
	}
	}
}
$insert_main = new insert_main();
if($_POST){ $insert_main->case_insertfn(); }
?>