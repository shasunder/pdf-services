<?
session_start(); ob_start();
if($_SESSION["login"] == "validuser") {
	include("../common/config.inc.php"); 
	include("../common/function.php");
	$matrimony=new matrimony();

	if($_POST['del']=='Delete')	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" where Image_autoid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_image','DELETE',$condition,''); }
	header("Location:ManageImage.php"); 	}

	if($_POST['active']=='Active') {
	if($_POST['ad']=='')
	{
	$condition=" Image_Status='A' where Image_autoid='".$_POST['Id']."'";
	$matrimony->switchqry('tm_image','UPDATE',$condition,''); 	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Image_Status='A' where Image_autoid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_image','UPDATE',$condition,''); } }
	header("Location:ManageImage.php"); }
	
	if($_POST['suspend']=='Blocked')
	{ 
	if($_POST['ad']=='')
	{
	$condition=" Image_Status='B' where Image_autoid='".$_POST['Id']."'";
	$matrimony->switchqry('tm_image','UPDATE',$condition,'');
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Image_Status='B' where Image_autoid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_image','UPDATE',$condition,''); }}
	header("Location:ManageImage.php"); }

}
else { header("Location:index.php"); }		
?>
