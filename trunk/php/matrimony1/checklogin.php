<link rel="stylesheet" href="css/checkemail.css">
<?PHP
include("connection.php");
$sqlCountry = "SELECT LoginID FROM users where LoginID='".$_REQUEST['login']."'";
$resultCountry = mysql_query($sqlCountry, $conn);
if (@mysql_num_rows($resultCountry)==0){
?>
<span class="style1"><strong>Congratulations !! </strong><br>
Profile ID '<?PHP echo $_REQUEST['login']?>' is available</span>
<?PHP
}
else
{
?>
<span class="style1"><strong>Sorry, <?PHP echo $_REQUEST['login']?> has already been taken.</strong><br></span>
<?PHP
}
?>