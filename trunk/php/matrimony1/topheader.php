<?PHP include("common/includes_static.php"); ?>
<?PHP include("common/constants.php"); ?>

<link rel="stylesheet" href="css/landing.css" type="text/css">
<link rel="stylesheet" href="css/homepage.css" type="text/css">

<a name="Matrimonials"></a>
<a name="Matrimonial"></a>
<center>

		<div class="width">


		</div>
        <br style="line-height: 0px;" clear="all">


<div class="width">
		    <br/>
			<div class="left tleft">
			<font style="font-size:26pt;"><span style="color:#FF9D3D">GorBanjara </span><span style="color:#FC9E93">Matrimonial</span</font>
			<br>
           <div class="left tleft" style="padding-left:30px;font-size:10pt"> <span style="color: #A8EEAE;"><?php echo $kSiteTitle; ?>	</span></span><br><br></div>
            </div>
	</div>


<div class="smallcnt width">

			<div class="left tleft">

			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 192px;"><img src="images/transparent.gif" border="0" height="37" width="190"></div><br clear="all">
		<!-- FORM EN-->
</div>

<div class="smallcnt width" style="background-color:#EE1E2C; padding-top:6px;padding-bottom:6px">
			<div class="left tleft" style="width: 33px;">&nbsp;</div>
			<div class="left tleft" style="width: 650px;">

	<?PHP
if($_SESSION['UserID']!="")
{
?>
<br>
<a href="index.php" title="My Account" style="color:#FFFFFF;"><strong>Home</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="index.php" title="Search" style="color:#FFFFFF;"><strong>Search</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="contactus.php" title="Log Out" style="color:#FFFFFF;"><strong>Contact Us</strong></a>
<span style="padding-left:320px">
<a href="my_profile.php" title="My Profile" style="color:#FFFFFF;"><strong>My Profile</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="logout.php" title="Log Out" style="color:#FFFFFF;"><strong>Logout [<?PHP echo $_SESSION['LoginID']?>]</strong></a>
</span>
<?PHP
}
else
{
?>




			<form method="post" action="login.php" name="loginpage" autocomplete="off" style="margin: 4px 0pt 0pt 0px;">
	<b><a href="index.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">Home</a> | <a href="aboutus.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">About Us</a> | <a href="contactus.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">Contact Us</a>	</b> &nbsp;	<b style="color:#FFFFFF;padding-left:20px">Member Login</b> &nbsp; <input name="login" value="Email ID" onfocus="if(this.value=='Email ID') this.value='';" onblur="if(this.value=='') this.value='Email ID';" size="16" type="text">&nbsp; &nbsp;<input name="password" value="******" onfocus="if(this.value=='******') this.value='';" onblur="if(this.value=='') this.value='******';" size="14" type="password">&nbsp; <input src="images/go.gif" title="Login" align="top" border="0" type="image"><input name="homepage" value="Y" type="hidden"><input name="continue" value="true" type="hidden"> &nbsp; <a href="forget_password.php" class="xsmall" title="Forgot Password?" style="color:#FFFFFF;">Forgot Password?</a>
			</form>
		<?PHP
}
?>
			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 18px;">&nbsp;</div><br clear="all">
		<!-- FORM EN-->
	</div>