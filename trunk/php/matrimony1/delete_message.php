<?PHP
session_start();
if($_SESSION['UserID']=="")
{
	header("location: login.php");
}
include("connection.php");
$delete ="DELETE from messages WHERE MessageID=".$_REQUEST['id'];
mysql_query($delete);

header('LOCATION: messages.php?msg=Message has been deleted successfully!');
?>