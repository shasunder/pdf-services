<?
session_start(); ob_start();

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

if($_SESSION["login"] == "validuser") {
	include("../common/config.inc.php"); 
	include("../common/function.php");
	$matrimony=new matrimony();
	
	if($_POST['del']=='Delete')	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" where tm_autoid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_profile','DELETE',$condition,''); }
	header("Location:ManageUser.php"); 	}

	if($_POST['active']=='Active') {
	if($_POST['ad']=='')
	{
	$condition=" Adminstatus='A',ProfileStatus='A',DOA=now(),DOM=now() where tm_profileID='".$_POST['Id']."'";
	$matrimony->switchqry('tm_profile','UPDATE',$condition,''); 	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Adminstatus='A',ProfileStatus='A',DOA=now(),DOM=now() where tm_autoid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_profile','UPDATE',$condition,''); } }
	header("Location:ManageUser.php"); }

	if($_POST['suspend']=='Blocked')
	{ 
	if($_POST['ad']=='')
	{
	$condition=" Adminstatus='B',ProfileStatus='B',DOBK=now(),DOM=now() where tm_profileID='".$_POST['Id']."'";
	$matrimony->switchqry('tm_profile','UPDATE',$condition,'');
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Adminstatus='B',ProfileStatus='B',DOBK=now(),DOM=now() where tm_autoid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_profile','UPDATE',$condition,''); }}
	header("Location:ManageUser.php"); }
	 
	if($_REQUEST['action']=='update') { 
	print_r($_POST);
			$exheight = $matrimony->getheightcm($_POST['ddlfeet']);
			if($_POST['ddlChildren']=="- Select -"){
				$child = "";
			} else {
				$child = $_POST['ddlChildren'];
			}
	
		$condition=" LoginId='".$_POST['txtLogin']."',EmailId='".$_POST['txtEmail']."',Password='".$_POST['userpassword']."',CreatedBy='".$_POST['ddlProfile']."',ProfileCategory='".$_POST['ddlPrefer']."',FirstName='".$_POST['fname']."',MiddleName='".$_POST['mname']."',LastName='".$_POST['lname']."',Gender='".$_POST['type']."',DOB='".$_POST['jscal_field_date_start']."',Age='".$_POST['age']."',MaritialStatus='".$_POST['ddlMarital']."',NoofChildren='$child',ChildrenLivingStatus='".$_POST['radioChildStatus']."',Citizenchip='".$_POST['citizenHd']."',ResidingCountry='".$_POST['countryHd']."',Religion='".$_POST['ddlReligion']."',CastDivision='".$_POST['ddlCommunity']."',Subcaste='".$_POST['subcaste']."',State='".$_POST['stateHd']."',City='".$_POST['city']."',Zip='".$_POST['zip']."',Tele_country='".$_POST['tele_country']."',Tele_std='".$_POST['tele_std']."',Tele_Phone='".$_POST['tele_Phone']."',Tee_mobile='".$_POST['tee_mobile']."',Food='".$_POST['rfood']."',Smoking='".$_POST['smoke']."',Drinking='".$_POST['drink']."',Complaexion='".$_POST['rcomplex']."',BodyType='".$_POST['rbody']."',Height='".$_POST['ddlfeet']."',Weight='".$_POST['ddlkgs']."',PhysicalStatus='".$_POST['ddlphysical']."',BloodGroup='".$_POST['ddlblood']."',EducationCat='".$_POST['ddle_category']."',EducationQual='".$_POST['ddle_qual']."',EducationSpecialization='".$_POST['eduspecialization']."',Occupation='".$_POST['ddlocc']."',Employementtype='".$_POST['ddlemptype']."',AnnCurrency='".$_POST['ddlincome']."',Salary='".$_POST['txtincome']."',Gothram='".$_POST['gothram']."',Star='".$_POST['ddlstar']."',Raasi='".$_POST['ddlrassi']."',KujaDhosam='".$_POST['rdosham']."',Address='".$_POST['address']."',AboutMe='".$_POST['aboutme']."',contrycode=$_POST[ddlCountry],DOM=now() where ProfileId='".$_POST['profileid']."'"; 
		$matrimony->switchqry('tm_profile','UPDATE',$condition,'');
		header("Location:ManageUser.php"); }

	if($_REQUEST['action']=='delete') { 
		$condition=" where tm_profileID='".$_POST['userid']."'";
		$matrimony->switchqry('tm_profile','DELETE',$condition,'');
		header("Location:ManageUser.php"); }

	if($_POST['submit_list'] == '2') {
		    $codeid=array('BGASM','BGBGL','BGBDO','BGDGI','BGGRT','BGHND','BGKND','BGKSH','BGMTI','BGMLI','BGMRW','BGMRI','BGMRT','BGNPL','BGORA','BGPRS','BGSKT','BGSTL','BGSND','BGTML','BGTLG','BGPJB','BGURD','BGOTR');					
			$pstate=array('Assamese','Bengali','Bodo','Dogri','Gujarati','Hindi','Kannada','Kashmiri','Maithili','Malayali','Marwari','Manipuri','Marathi','Nepali','Oriya','Parsi','Sanskrit','Santhali','Sindhi','Tamil','Telugu','Punjab','Urdu','Others');		
			for($i=0;$i<25;$i++){
				if($_POST['ddlPrefer'] == $pstate[$i]){
				$sid=$codeid[$i];}
			}
			$retid =$matrimony->bgautoId('tm_autoid','tm_profile',$sid,$_POST['ddlPrefer']);
			$bgID=$sid.$retid;			
			$exheight = $matrimony->getheightcm($_POST['ddlfeet']);			

//LoginId, ProfileId, EmailId, Password, ProfileStatus, CreatedBy, ProfileCategory, FirstName, MiddleName, LastName, Gender, DOB, Age, MaritialStatus, NoofChildren, ChildrenLivingStatus, Citizenchip, ResidingCountry, Religion, CastDivision, Subcaste, State, City, Zip, Tele_country, Tele_std, Tele_Phone, Tee_mobile, Food, Smoking, Drinking, Complaexion, BodyType, Height, Weight, PhysicalStatus, BloodGroup, EducationCat, EducationQual, EducationSpecialization, Occupation, Employementtype, AnnCurrency, Salary, Gothram, Star, Raasi, KujaDhosam, DOJ, DOA, DOBK, LastVisted, tmid_count, tm_autoid, Address, AboutMe, DOM, Adminstatus, visit_id, contrycode
		$InsertValues= "'".$_POST['txtLogin']."','$bgID','".$_POST['txtEmail']."','".$_POST['userpassword']."','I','".$_POST['ddlProfile']."','".$_POST['ddlPrefer']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['type']."','".$_POST['jscal_field_date_start']."','".$_POST['age']."','".$_POST['ddlMarital']."','".$_POST['ddlChildren']."','".$_POST['radioChildStatus']."','".$_POST['citizenHd']."','".$_POST['countryHd']."','".$_POST['ddlReligion']."','".$_POST['ddlCommunity']."','".$_POST['subcaste']."','".$_POST['stateHd']."','".$_POST['city']."','".$_POST['zip']."','".$_POST['tele_country']."','".$_POST['tele_std']."','".$_POST['tele_Phone']."','".$_POST['tee_mobile']."','".$_POST['rfood']."','".$_POST['smoke']."','".$_POST['drink']."','".$_POST['rcomplex']."','".$_POST['rbody']."','".$_POST['ddlfeet']."','".$_POST['ddlkgs']."','".$_POST['ddlphysical']."','".$_POST['ddlblood']."','".$_POST['ddle_category']."','".$_POST['ddle_qual']."','".$_POST['eduspecialization']."','".$_POST['ddlocc']."','".$_POST['ddlemptype']."','".$_POST['ddlincome']."','".$_POST['txtincome']."','".$_POST['gothram']."','".$_POST['ddlstar']."','".$_POST['ddlrassi']."','".$_POST['rdosham']."',now(),'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'".$_POST['address']."','".$_POST['aboutme']."',now(),'A',0,$_POST[ddlCountry]";
		
		$matrimony->switchqry('tm_profile','INSERT','',$InsertValues);
		header("Location:ManageUser.php");
	} 
}
else { header("Location:index.php"); }		
?>