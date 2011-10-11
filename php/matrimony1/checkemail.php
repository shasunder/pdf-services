<link rel="stylesheet" href="css/checkemail.css">
<?PHP
include("connection.php");
$sqlCountry = "SELECT EmailAddress FROM users where EmailAddress='".$_REQUEST['email']."'";
$resultCountry = mysql_query($sqlCountry, $conn);
if (@mysql_num_rows($resultCountry)==0){
}
else
{
?>
<span class="style1">This Email Address already exists in our records.<br>Please use a different Email Address.<br></span>
<?PHP
}
?>