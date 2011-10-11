<?PHP
session_start();
if($_SESSION['UserID']=="")
{
	header("location: login.php");
}
include("connection.php");

	$sqlUpdate = "select * from user_profile where UserID=".$_SESSION['UserID'];			
	$result=mysql_query($sqlUpdate);
	$selling_row=mysql_fetch_array($result);
	
	
		if(trim($selling_row['photo1'])!="")
		{
			unlink(trim($selling_row['photo1']));
		}
		
		if(trim($selling_row['photo2'])!="")
		{
			unlink(trim($selling_row['photo2']));
		}		

		if(trim($selling_row['photo3'])!="")
		{
			unlink(trim($selling_row['photo3']));
		}		

$delete ="DELETE from user_profile WHERE UserID=".$_SESSION['UserID'];
mysql_query($delete);

$delete ="DELETE from partner_profile WHERE UserID=".$_SESSION['UserID'];
mysql_query($delete);

$delete ="DELETE from users WHERE UserID=".$_SESSION['UserID'];
mysql_query($delete);

header('LOCATION: login.php?msg=Your Profile has been deleted successfully!');
?>