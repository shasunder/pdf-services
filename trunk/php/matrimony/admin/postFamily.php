<?
session_start(); ob_start();
//print_r($_POST);
if($_SESSION["login"] == "validuser") {
	include("../common/config.inc.php"); 
	include("../common/function.php");
	$matrimony=new matrimony();

	if($_POST['del']=='Delete')	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" where cs_AutoID='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_family','DELETE',$condition,''); }
	header("Location:ManageUser.php"); 	}

	if($_POST['verify']=='Verify') {
	if($_POST['ad']=='')
	{
	$condition=" cs_VerifiedStatus='Y' where tm_familyID='".$_POST['Id']."'";
	$matrimony->switchqry('tm_family','UPDATE',$condition,'');	
	}
	else
	{
    $count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_VerifiedStatus='Y' where cs_AutoID='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_family','UPDATE',$condition,''); }}
	header("Location:ManageUser.php"); }
	
	if($_POST['active']=='Active') {
	if($_POST['ad']=='')
	{
	$condition=" cs_ActiveStatus='A' where tm_familyID='".$_POST['Id']."'";
	$matrimony->switchqry('tm_family','UPDATE',$condition,''); 	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_ActiveStatus='A' where cs_AutoID='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_family','UPDATE',$condition,''); } }
	header("Location:ManageUser.php"); }
	
	if($_POST['pending']=='Pending') {
	if($_POST['ad']=='')
	{
	$condition=" cs_ActiveStatus='P' where tm_familyID='".$_POST['Id']."'";
	$matrimony->switchqry('tm_family','UPDATE',$condition,'');	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_ActiveStatus='P' where cs_AutoID='".$_POST['ad'][$i]."'";  //echo $condition;
	$matrimony->switchqry('tm_family','UPDATE',$condition,'');} }
	header("Location:ManageUser.php"); }
	
	if($_POST['suspend']=='Blocked')
	{ 
	if($_POST['ad']=='')
	{
	$condition=" cs_ActiveStatus='B' where tm_familyID='".$_POST['Id']."'";
	$matrimony->switchqry('tm_family','UPDATE',$condition,'');
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_ActiveStatus='B' where cs_AutoID='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_family','UPDATE',$condition,''); }}
	header("Location:ManageUser.php"); }
//ProfileId, Familyvalue, Familytype, Familystatus, Fatheroccupation, Motheroccupation, Brothers, Sisters, Brothersmarried, Sistersmarried, Aboutfamily
	if($_REQUEST['action']=='update') { 
		$condition=" Familyvalue='".$_POST['ddlFvalue']."',Familytype='".$_POST['ddlFvalueType']."',Familystatus='".$_POST['ddlFStatus']."',Fatheroccupation='".$_POST['ddlFOcc']."',Motheroccupation='".$_POST['ddlMOcc']."',Brothers='".$_POST['noofBros']."',Sisters='".$_POST['noofSis']."',Brothersmarried='".$_POST['noofBrosM']."',Sistersmarried='".$_POST['noofSisM']."',Aboutfamily='".$_POST['description']."' where ProfileId='".$_POST['userid']."'";
		$matrimony->switchqry('tm_family','UPDATE',$condition,''); 
		header("Location:ManageFamily.php"); }

	if($_REQUEST['action']=='delete') { 
		$condition=" where tm_familyID='".$_POST['userid']."'";
		$matrimony->switchqry('tm_family','DELETE',$condition,'');
		header("Location:ManageUser.php"); }

	if($_POST['submit_list'] == '1') { 
//$cs_IDList=$classifieds->generateautoId('tm_AutoID','tm_family','BSH');

	 $InsertValues= "'".$_POST['pid']."','".$_POST['ddlFvalue']."','".$_POST['ddlFvalueType']."','".$_POST['ddlFStatus']."','".$_POST['ddlFOcc']."','".$_POST['ddlMOcc']."','".$_POST['noofBros']."','".$_POST['noofSis']."','".$_POST['noofBrosM']."','".$_POST['noofSisM']."','".$_POST['description']."'";
	$matrimony->switchqry('tm_family','INSERT','',$InsertValues);
	header("Location:ManageFamily.php");
	} 
}
else { header("Location:index.php"); }		
?>
