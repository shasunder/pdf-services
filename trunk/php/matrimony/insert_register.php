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
		case "simple":{
			$rparr1 = $this->postarrfn();
			$dobdb=implode("-",array($rparr1[ddlYear],$rparr1[ddlMonth],$rparr1[ddlDate]));
			
			$sid='BGHND';//Hindi
			$retid =$this->bgautoId('tm_autoid','tm_profile',$sid,$rparr1[ddlPrefer]);
			$bgID=$sid.$retid;	
			$email = $rparr1[txtEmail];
			
			$arg1=" where Emailid='".$email."'";
			$this->switchqry('tm_profile','SELECT',$arg1,'EmailId');
			$row= mysql_fetch_row($this->qry_result);
			
			if($row!=null){
				header("Location:register.php?status=-1");
				return ;
			}
			if($email == ''){
				header("Location:register.php?status=-1");
				return ;
			}
			$relegion='Hindu';
			$community=''; //should work only usign subcaste!
			
			$fields="ProfileId,register_stage,ProfileCategory,CreatedBy,LoginId,Emailid,Gender,Password,ProfileStatus,FirstName,Age,Religion,CastDivision,Subcaste,tm_autoid,tmid_count,visit_id,Adminstatus,DOJ,DOM";
			$argValues="'".$bgID."','simple','Hindi','$email','$rparr1[txtName]','$rparr1[txtEmail]','$rparr1[txtGender]','$rparr1[txtPwd]','A','$rparr1[txtName]','$rparr1[txtAge]','$religion','$community','$rparr1[txtCaste]',tm_autoid,'".$retid."',1,'B',now(),now()";
			echo  $fields.'\n<br/>'.$argValues;
			$this->switchqry('tm_profile','INSERT',$fields,$argValues);
			$this->RegSession_Register();
			session_register('register_simple');
			
			$arg1=" where Emailid='".$email."' and Password='".$rparr1['txtPwd']."'";
			$this->switchqry('tm_profile','SELECT',$arg1,'LoginId,EmailId,ProfileId,ProfileStatus,Gender');
			$row= mysql_fetch_array($this->qry_result);

			if($this->qry_result){

				$_SESSION['valid']="loginvalid"; 
				$_SESSION['Emailid']=$row['Emailid'];
				$_SESSION['LoginId']=$row['LoginId'];
				$_SESSION['EmailId']=$row['EmailId']; $_SESSION['ProfileId']=$row['ProfileId'];
				$_SESSION['ProfileStatus']=$row['ProfileStatus']; $_SESSION['Gender']=$row['Gender'];
				include_once("mail_reg.php");
				header("Location:register.php");
			}else { 
				echo mysql_error();
				
			}
			break;
		}
		case "first":{
			session_unregister('register_simple');
			$proid=$_SESSION['ProfileId'];
			$rparr1 = $this->postarrfn();
			$dobdb=implode("-",array($rparr1[ddlYear],$rparr1[ddlMonth],$rparr1[ddlDate]));
			
			$setValues="register_stage='first',ProfileStatus='A', FirstName='$rparr1[txtFname]', MiddleName='$rparr1[txtMname]', LastName='$rparr1[txtLname]',DOB='".$dobdb."',Age='$rparr1[txtAge]',MaritialStatus='$rparr1[ddlMarital]',NoofChildren='$rparr1[ddlChildren]',ChildrenLivingStatus='$rparr1[radioChildStatus]',Citizenchip='$rparr1[citizenHd]',ResidingCountry='$rparr1[countryHd]',Subcaste='$rparr1[txtCaste]',Tele_Country='$rparr1[txtCcode]',Tele_std='$rparr1[txtAcode]',Tee_mobile='$rparr1[txtMobile]',Tele_Phone='$rparr1[txtPhone]', contrycode='$rparr1[ddlCountry]";
			
			if($proid){$this->switchqry('tm_profile','UPDATE',$setValues,''); }
			header("Location:register.php");
			break;
		}
		case "second":{
	    	$proid=$_SESSION['ProfileId'];
			$rparr2 = $this->postarrfn();
			$exheight = $this->getheightcm($rparr2[ddlfeet]);			
		 	$setValues="register_stage='second', Food='$rparr2[radiofood]',Smoking='$rparr2[radiosmoke]',Drinking='$rparr2[radioliquor]',Complaexion='$rparr2[radiocomp]',BodyType='$rparr2[radiobody]',BloodGroup='$rparr2[ddlblood]',Height='$exheight',Weight='$rparr2[ddlkgs]',PhysicalStatus='$rparr2[ddlphysical]',State='$rparr2[stateHd]',City='$rparr2[txtCity]',Zip='$rparr2[txtpincode]',EducationCat='$rparr2[ddle_category]',EducationQual='$rparr2[ddle_qual]',Educationspecialization='$rparr2[txtspecial]',Occupation='$rparr2[ddlocc]',Employementtype='$rparr2[ddlemptype]',AnnCurrency='$rparr2[ddlincome]',Salary='$rparr2[txtincome]',Gothram='$rparr2[txtgrm]',Star='$rparr2[ddlstar]',Raasi='$rparr2[ddlrassi]',KujaDhosam='$rparr2[radiodosham]',DOA='0000-00-00 00:00:00',DOBK='0000-00-00 00:00:00',LastVisted=now(),Address='$rparr2[txtaddress]' where ProfileId='$proid'";
			if($proid){$this->switchqry('tm_profile','UPDATE',$setValues,''); }
			header("Location:register.php");
			break;
		}
		case "third":{
         	$proid=$_SESSION['ProfileId'];
			$rparr3 = $this->postarrfn();
			$exheightfrm = $this->getheightcm($rparr3[ddlfeet]);			
			$exheightto = $this->getheightcm($rparr3[ddlfeet1]);			
			$argValues="register_stage='third','".$proid."','$rparr3[txtage1]','$rparr3[txtage2]','$rparr3[radiomarital]','$rparr3[motherHd]','$rparr3[religionHd]','$rparr3[communityHd]','$rparr3[txtcaste]','$rparr3[categoryHd]','$rparr3[occHd]','$rparr3[emptypeHd]','$rparr3[citizenHd]','$rparr3[countryHd]','$rparr3[stateHd]','$rparr3[cityHd]','$rparr3[rfood]','$rparr3[txtabout]','$rparr3[statusHd]','$exheightfrm','$exheightto','$rparr3[rdosham]'";
			if($proid){$this->switchqry('tm_partnerpreference','INSERT','',$argValues);}
			header("Location:register.php");
		break;
		}
		case "fourth":{
		 	$proid=$_SESSION['ProfileId'];
			$rparr4 = $this->postarrfn();
			$argVal="'".$proid."','$rparr4[ddlfvalue]','$rparr4[ddlftype]','$rparr4[ddlstatus]','$rparr4[ddlfather]','$rparr4[ddlmother]','$rparr4[Brothers]','$rparr4[Sisters]','$rparr4[brothers_married]','$rparr4[sister_married]','$rparr4[txtfamily]'";
		 	$setValues="register_stage='fourth',AboutMe='$rparr4[txtme]' where ProfileId='$proid'";
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