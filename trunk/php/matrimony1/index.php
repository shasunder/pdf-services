<?php
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include("common/includes_static.php"); ?>
<?php include("common/constants.php"); ?>
<title><? echo $kSiteName." - ".$kSiteTitle; ?></title>

</head>

<body style="margin: 0px;">
<a name="Matrimonials"></a>
<a name="Matrimonial"></a>
<center>

		<div class="width">


		</div>
        <br style="line-height: 0px;" clear="all">


		<div class="smallcnt width">
			<div class="left tleft">
			<font style="font-size:26pt;"><span class="orangeText" style="">Marry</span><span class="redText"style="font-weight:bold">Banjara</span></font>

			<br>
           <div class="left tleft" style="padding-left:30px"> <span style="color: rgb(170, 170, 170);"><?php echo $kSiteTitle; ?>	</span></span><br><br></div>
            </div>
	</div>




		<div class="smallcnt width">

			<div class="left tleft">

			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 192px;"><!-- right top header --></div><br clear="all">
		<!-- FORM EN-->
	</div>

		<div class="smallcnt width" style=" background-image:url(images/topbg.gif); -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
			<div class="left tleft" style="width: 33px;"><img src="images/top-lft-cnl.gif" border="0" height="33" width="14"><br></div>
			<div class="left tleft" style="">

	<?php
if($_SESSION['UserID']!="")
{
?>
<br>
<a href="index.php" title="My Account" style="color:#FFFFFF;"><strong>Home</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="compatibility.php" title="My Account" style="color:#FFFFFF;"><strong>Jaath Check</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="contactus.php" title="Log Out" style="color:#FFFFFF;"><strong>Contact Us</strong></a><strong style="color:#FFFFFF;">|</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="myaccount.php" title="My Account" style="color:#FFFFFF;"><strong>My Account</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="my_profile.php" title="My Profile" style="color:#FFFFFF;"><strong>My Profile</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="logout.php" title="Log Out" style="color:#FFFFFF;"><strong>Log Out</strong></a>
<?php
}
else
{
?>




			<form method="post" action="login.php" name="loginpage" autocomplete="off" style="margin: 4px 0pt 0pt 0px;">
	<b><a href="index.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">Home</a> | <a href="aboutus.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">About Us</a> | <a href="contactus.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">Contact Us</a>	</b> &nbsp;	<b style="color:#FFFFFF;padding-left:20px">Member Login</b> &nbsp; <input name="login" value="Email ID" onfocus="if(this.value=='Email ID') this.value='';" onblur="if(this.value=='') this.value='Email ID';" size="30" type="text">&nbsp; &nbsp;<input name="password" value="*****" onfocus="if(this.value=='*****') this.value='';" onblur="if(this.value=='') this.value='*****';" size="14" type="password">&nbsp; <input style="border:none" src="images/go.gif" title="Login" align="top" border="0" type="image"><input name="homepage" value="Y" type="hidden"><input name="continue" value="true" type="hidden"> <a href="forget_password.php" class="xsmall" title="Forgot Password?" style="color:#FFFFFF;">Forgot Password?</a>
			</form>
		<?php
}
?>
			</div>
		<!-- FORM ST -->

		<br clear="all">
		<!-- FORM EN-->
	</div>
	<div class="width smallcnt">
		<!-- MAIN CREATIVE ST-->

		<div style="width: 760px; padding-top: 0px;">
		<table border="0" cellpadding="0" cellspacing="0" width="760">


			<tr>

			<td width="291" valign="top">
				<fieldset>

				<table style="padding-left:10px" border="0" cellpadding="0" cellspacing="0" align="left">

						<?php include("sections/searchbox.php"); ?>

					</tr>

					<tr>
					<td>
								<!-- SEARCH FORM ST-->
									<div style="padding-left:5px; text-align: left;">

										<form method="get" action="<?php
											if($_SESSION['UserID']!="")
											{
											echo "profile.php";
											}
											else
											{
											echo "login.php";
											}
											?>" autocomplete="off" name="profileform">
											<br/>
											<br/>
											<input name="id" value=" Search by Profile ID" onfocus="if(this.value==' Search by Profile ID') this.value='';" onblur="if(this.value=='') this.value=' Search by Profile ID';" style="width: 111px;" type="text"> &nbsp;
											<input  style="border:none" src="images/go.gif" title="View Profile" align="top" type="image">
										</form>
										<br/><br/>
									</div>
				<!-- SEARCH FORM EN-->
					</td>

					</tr>
			</table>


				<br/>
			</fieldset>
		</td>

		<td ><img src="images/banner.jpg" ></td>

		</tr></table>

	</div>
	<!-- MAIN CREATIVE EN-->
</div>
<!-- REGISTER/UPGRADE CONTENT ST-->
<div class="width smallcnt" style="border-top: 1px solid rgb(255, 255, 255); background: transparent url(images/main-bg.gif) repeat-x scroll left top; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">

		<div id="threeStep" class="left tleft">

			<div id="step1" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(1,'rollin','images/');" onmouseout="change_image(1,'rollout','images/')">
				<div style="padding-top: 13px;">
					<a href="register.php"><img id="digit1" src="images/one-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43"></a> <a href="register.php"><font style="color:#FFF7E0; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Register</font></a><br><a href="register.php" style="color:#606060;">
					and create your<br> free profile.</a>
				</div>
			</div>
			<div id="step2" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(2,'rollin','images/');" onmouseout="change_image(2,'rollout','images/');">
				<div style="padding-top: 13px;">
					<a href="search.php" style="color:#606060;"><img id="digit2" src="images/two-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43"><font style="color:#FFF7E0; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Search</font><br>
					for members who<br> meet your criteria.</a>
				</div>
			</div>
			<div id="step3" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(3,'rollin','images/');" onmouseout="change_image(3,'rollout','images/');">
				<div style="padding-top: 13px;">
					<a href="communicate.php" style="color:#606060;"><img id="digit3" src="images/three-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43">
					<font style="color:#FFF7E0; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Contact</font><br>
					members you like via<br>email or phone.</a>
				</div>
			</div>
		</div><!-- three step en -->

		<div class="left" style="padding: 20px 0pt 0pt 36px;">
			<a href="register.php"><img src="images/advSearcButton.png" alt="Register Free!" title="Register Free!" border="0" height="30" vspace="0" width="140"></a>
		</div>

<br clear="all">
</div>
<div class="width smallcnt" style="background-image:url(images/background.jpg)">
<div class="left graytxt" style=""></div>
	<div class="left graytxt" style="width: 760px">

<table cellspacing="0" cellpadding="0" border="0" class="left tleft smallcnt graytxt" style="padding: 10px; border: 1px solid #FFBD7B;">
    <tr>
    <td>
<p style="font-size:12px;color:#A35804;font-weight:normal;text-align:justify;font-family:Sans-Serif,Verdana">

	<?php
if($_SESSION['UserID']!="")
{
 echo "<a href='membership.php'>";
}
else
{
	 echo "<a href='paidmembership.php'>";
}
?>

  <img src="images/offer.gif" style="float:right;padding-left:10px;padding-right:10px;padding-bottom:10px" border="0" /> </a>
    We Banjara are basically from the Indian state of Rajasthan, North-West Gujarat, and Western Madhya Pradesh and Eastern Sindh province.
Our history goes back to some 2000 years and is as colourful as the costumes our women wear.
<br/><br/>
There are so many doctors,engineers, lecturers, dentists and other professionals in our banjara community. But there are very few affordable lambani community matrimonial on the internet. Most are charging ridiculously high prices for our community members.
<br/><br/>
This is a platform for those searching for their lambani life partners and is dedicated for all lambani /banjara community people who are looking for soul mates
<br/><br/>
We aim to provide service at a very affordable price (starting at <b>Rs.500</b> only). We would be glad to hear from you!
</p>
</td>
    </tr>
    </table>


	</div>
</div><br clear="all">
	</div><span class="brseven"><br>


<!-- Footer starts -->
	<?php
	include("footer.php");
	?>
<!-- Footer ends -->
</span></center>
</body></html>