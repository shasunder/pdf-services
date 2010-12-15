<?
session_start(); ob_start();
print_r($_POST);
if($_SESSION["login"] == "validuser") {
	include("../common/config.inc.php"); 
	include("../common/function.php");
	$matrimony=new matrimony();

	if($_POST['del']=='Delete')	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" where cs_AutoID='".$_POST['ad'][$i]."'";
	$classifieds->manipulate('cs_profile','DELETE',$condition,''); }
	header("Location:ManageUser.php"); 	}

	if($_POST['verify']=='Verify') {
	if($_POST['ad']=='')
	{
	$condition=" cs_VerifiedStatus='Y' where cs_ProfileID='".$_POST['Id']."'";
	$classifieds->manipulate('cs_profile','UPDATE',$condition,'');	
	}
	else
	{
    $count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_VerifiedStatus='Y' where cs_AutoID='".$_POST['ad'][$i]."'";
	$classifieds->manipulate('cs_profile','UPDATE',$condition,''); }}
	header("Location:ManageUser.php"); }
	
	if($_POST['active']=='Active') {
	if($_POST['ad']=='')
	{
	$condition=" cs_ActiveStatus='A' where cs_ProfileID='".$_POST['Id']."'";
	$classifieds->manipulate('cs_profile','UPDATE',$condition,''); 	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_ActiveStatus='A' where cs_AutoID='".$_POST['ad'][$i]."'";
	$classifieds->manipulate('cs_profile','UPDATE',$condition,''); } }
	header("Location:ManageUser.php"); }
	
	if($_POST['pending']=='Pending') {
	if($_POST['ad']=='')
	{
	$condition=" cs_ActiveStatus='P' where cs_ProfileID='".$_POST['Id']."'";
	$classifieds->manipulate('cs_profile','UPDATE',$condition,'');	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_ActiveStatus='P' where cs_AutoID='".$_POST['ad'][$i]."'";  //echo $condition;
	$classifieds->manipulate('cs_profile','UPDATE',$condition,'');} }
	header("Location:ManageUser.php"); }
	
	if($_POST['suspend']=='Blocked')
	{ 
	if($_POST['ad']=='')
	{
	$condition=" cs_ActiveStatus='B' where cs_ProfileID='".$_POST['Id']."'";
	$classifieds->manipulate('cs_profile','UPDATE',$condition,'');
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_ActiveStatus='B' where cs_AutoID='".$_POST['ad'][$i]."'";
	$classifieds->manipulate('cs_profile','UPDATE',$condition,''); }}
	header("Location:ManageUser.php"); }

	if($_REQUEST['action']=='update') { 
		$condition=" pAgeFrom='".$_POST['age1']."',pAgeTO='".$_POST['age2']."',pMaritialStatus='".$_POST['radiomarital']."',pMotherTonque='".$_POST['Mtongue']."',pReligion='".$_POST['ddlReligion']."',pCastDivision='".$_POST['ddlCommunity']."',pSubcaste='".$_POST['subcast']."',pEducationCat='".$_POST['ddle_category']."',pOccupation='".$_POST['occ']."',pEmployementtype='".$_POST['emp']."',pCitizenchip='".$_POST['citizenHd']."',pResidingCountry='".$_POST['countryHd']."',pState='".$_POST['stateHd']."',pCity='".$_POST['city']."',pFood='".$_POST['rfood']."',pAboutPartner='".$_POST['description']."',pPhysicalStatus='".$_POST['pstatus']."',pHeightFrom='".$_POST['height1']."',pHeightTo='".$_POST['height2']."',pKujaDhosam='".$_POST['rdosham']."' where ProfileId='".$_POST['profileid']."'";
		$matrimony->switchqry('tm_partnerpreference','UPDATE',$condition,'');
		header("Location:ManagePartner.php"); }

	if($_REQUEST['action']=='delete') { 
		$condition=" where cs_ProfileID='".$_POST['userid']."'";
		$classifieds->manipulate('cs_profile','DELETE',$condition,'');
		header("Location:ManageUser.php"); }

	if($_POST['submit_list'] == '1') { 
//$cs_IDList=$classifieds->generateautoId('tm_AutoID','tm_family','BSH');
//ProfileId, pAgeFrom, pAgeTO, pMaritialStatus, pMotherTonque, pReligion, pCastDivision, pSubcaste, pEducationCat, pOccupation, pEmployementtype, pCitizenchip, pResidingCountry, pState, pCity, pFood, pAboutPartner, pPhysicalStatus, pHeightFrom, pHeightTo, pKujaDhosam
	 $InsertValues= "'".$_POST['pid']."','".$_POST['age1']."','".$_POST['age2']."','".$_POST['radiomarital']."','".$_POST['Mtongue']."','".$_POST['ddlReligion']."','".$_POST['ddlCommunity']."','".$_POST['subcast']."','".$_POST['ddle_category']."','".$_POST['occ']."','".$_POST['emp']."','".$_POST['citizenHd']."','".$_POST['countryHd']."','".$_POST['stateHd']."','".$_POST['city']."','".$_POST['rfood']."','".$_POST['description']."','".$_POST['pstatus']."','".$_POST['height1']."','".$_POST['height2']."','".$_POST['rdosham']."'";
	$matrimony->switchqry('tm_partnerpreference','INSERT','',$InsertValues);
	header("Location:ManagePartner.php");
	} 
}
else { header("Location:index.php"); }		
?>
