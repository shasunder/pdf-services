<?
session_start(); ob_start();

/*echo "<pre>";
print_r($_POST);
echo "</pre>";
exit();*/

if($_SESSION["login"] == "validuser") {
	include("../common/config.inc.php"); 
	include("../common/function.php");
	$matrimony=new matrimony();

	if($_POST['del']=='Delete')	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" where Int_id='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interestmsg','DELETE',$condition,''); }
	header("Location:InterestMessage.php"); 	}

	if($_POST['verify']=='Verify') {
	if($_POST['ad']=='')
	{
	$condition=" cs_VerifiedStatus='Y' where Int_id='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,'');	
	}
	else
	{
    $count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_VerifiedStatus='Y' where Int_id='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,''); }}
	header("Location:InterestMessage.php"); }
	
	if($_POST['active']=='Active') {
	if($_POST['ad']=='')
	{
	$condition=" Int_Status='A' where Int_id='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,''); 	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Int_Status='A' where Int_id='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,''); } }
	header("Location:InterestMessage.php"); }
	
	if($_POST['pending']=='Pending') {
	if($_POST['ad']=='')
	{
	$condition=" Message_Cstatus='P' where Int_id='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,'');	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Message_Cstatus='P' where Int_id='".$_POST['ad'][$i]."'";  //echo $condition;
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,'');} }
	header("Location:InterestMessage.php"); }
	
	if($_POST['suspend']=='Blocked')
	{ 
	if($_POST['ad']=='')
	{
	$condition=" Int_Status='B' where Int_id='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,'');
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Int_Status='B' where Int_id='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,''); }}
	header("Location:InterestMessage.php"); }

	if($_REQUEST['action']=='update') { 
		$condition=" Int_Msg='".$_POST['radiomarital']."',Int_DOM=now() where Int_id='".$_POST['Intid']."'";
		$matrimony->switchqry('tm_interestmsg','UPDATE',$condition,'');
		header("Location:InterestMessage.php"); }

	if($_REQUEST['action']=='delete') { 
		$condition=" where Int_id='".$_POST['mid']."'";
		$matrimony->switchqry('tm_interestmsg','DELETE',$condition,'');
		header("Location:InterestMessage.php"); }

	if($_POST['submit_list'] == '1') { 
//$cs_IDList=$classifieds->generateautoId('tm_AutoID','tm_family','BSH');
//Int_id, Int_Msg, Int_Type, Int_Status, Int_DOA, Int_DOM
	 $InsertValues= "0,'".$_POST['Maritial']."','I','A',now(),now()";
	$matrimony->switchqry('tm_interestmsg','INSERT','',$InsertValues);
	header("Location:InterestMessage.php");
	} 
}
else { header("Location:index.php"); }		
?>
