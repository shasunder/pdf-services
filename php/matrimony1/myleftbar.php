
<?PHP
if($_SESSION['UserID']!="")
{
?>
			<div style="border: 1px solid rgb(144, 151, 144); width: 162px; margin-top: 8px;">
			<div style="border: 1px solid rgb(255, 255, 255); padding: 3px 0pt 3px 5px; background-color: #990000; text-align: left;" class="mediumwhitebold">Menu</div>

<?PHP
if($_SESSION['GoldMember']!=1)
{
?>
<div style="border-top: 1px solid rgb(144, 151, 144); padding: 3px 0pt 3px 0px; background-color: rgb(255, 255, 255); text-align: left;"><img src="images/left-arrow1.gif" align="middle" border="0" height="7" hspace="6" width="5"><a href="membership.php" class="smallgreylink"><strong>Update to Gold Member</strong></a></div>
<?PHP
}
?>

			<div style="border-top: 1px solid rgb(144, 151, 144); padding: 3px 0pt 3px 0px; background-color: rgb(255, 255, 255); text-align: left;"><img src="images/left-arrow1.gif" align="middle" border="0" height="7" hspace="6" width="5"><a href="my_profile.php" class="smallgreylink">My Profile</a></div><div style="border-top: 1px solid rgb(144, 151, 144); padding: 3px 0pt 3px 0px; background-color: rgb(255, 255, 255); text-align: left;"><img src="images/left-arrow1.gif" align="middle" border="0" height="7" hspace="6" width="5"><a href="messages.php" class="smallgreylink">My Messages</a></div>

<div style="border-top: 1px solid rgb(144, 151, 144); padding: 3px 0pt 3px 0px; background-color: rgb(255, 255, 255); text-align: left;"><img src="images/left-arrow1.gif" align="middle" border="0" height="7" hspace="6" width="5"><a href="interests.php" class="smallgreylink">Interests Recieved</a></div>

<div style="border-top: 1px solid rgb(144, 151, 144); padding: 3px 0pt 3px 0px; background-color: rgb(255, 255, 255); text-align: left;"><img src="images/left-arrow1.gif" align="middle" border="0" height="7" hspace="6" width="5"><a href="einterests.php" class="smallgreylink">Interests Expressed</a></div>

			<div style="border-top: 1px solid rgb(144, 151, 144); padding: 3px 0pt 3px 0px; background-color: rgb(255, 255, 255); text-align: left;"><img src="images/left-arrow1.gif" align="middle" border="0" height="7" hspace="6" width="5"><a href="myaccount.php" class="smallgreylink">My Account</a></div>

<div style="border-top: 1px solid rgb(144, 151, 144); padding: 3px 0pt 3px 0px; background-color: rgb(255, 255, 255); text-align: left;"><img src="images/left-arrow1.gif" align="middle" border="0" height="7" hspace="6" width="5"><a href="change_password.php" class="smallgreylink">Change Password</a></div>
			</div>
			<br>

<?PHP
}
?>
		<div style="margin-top: 8px; text-align: center;" align="left">
		<table style="padding-left:10px" border="0" cellpadding="0" cellspacing="0" align="left">
			<?php include("sections/searchbox.php"); ?>
		</table>


