<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

if($_POST['continue']=="true")
{
$sql = "SELECT * FROM users WHERE EmailAddress='".mysql_escape_string($_POST['login'])."' and Password='".mysql_escape_string($_POST['password'])."'";
$result = mysql_query($sql,$conn);

		
		if (@mysql_num_rows($result)!=0){
			
			$row = @mysql_fetch_array($result);
			$_SESSION['UserID']=$row['UserID'];
			$_SESSION['LoginID']=$row['LoginID'];
			$_SESSION['GoldMember']=$row['GoldMember'];
			$_SESSION['EmailAddress']=$row['EmailAddress'];
			if($_POST['autologin']=="Y")
					{
						setcookie ("user", $row['EmailAddress'], time()+604800); 
					}

					header('LOCATION: myaccount.php');
					exit();
			
			}
		
		
		else{
			$msg = "<font style='font-family:Verdana; font-size:12px; font-weight:bold; color:#FF0000;'>* Invalid E-Mail Address or Password</font><br><br>";
		}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>- Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">
<script language="javascript" src="js/login.js"></script>
</head>

<body topmargin="2" leftmargin="0" oncontextmenu="return false" onselectstart="return false" ondragstart="return false" marginheight="2" marginwidth="0" background="images/background.jpg">


<script language="javascript" src="js/matrimonials-v10.js"></script>
			<center>
		
				<!-- The top link table starts here -->
				<div style="width: 762px;" align="right">
					<?PHP
					include("topheader.php");
					?>
				</div>
				<!-- The top link table ends here -->
			
			<!-- The topbanner table start's here -->
			<div style="width: 762px; background-color: rgb(255, 255, 255);">
			<div style="border-top: 1px solid rgb(143, 167, 191); border-left: 1px solid rgb(143, 167, 191); border-right: 1px solid rgb(143, 167, 191);">


				<!-- logo + banner space -->
				<div style="padding: 2px 0pt 4px 0px;">
					<div style="padding: 4px 0pt 4px 16px; width: 215px; float: left; text-align: left;">
					<a href="index.php"><img src="images/matrimonial-logo-sm.gif" border="0"></a>
					</div>
				
				<br clear="all">
			
			</div>
			<!-- logo + banner space -->
		
					<br style="line-height: 1px;" clear="all">
				<div>
					<div style="border-top: 2px solid rgb(143, 167, 191); border-bottom: 2px solid #000000; background-color: #000000;">
					<div style="margin: 1px 0pt 1px 0px; padding: 3px 0pt 3px 0px; background-color: #990000;" class="mediumwhitebold">
					</div>
						
					</div>
				</div>

				<!-- midlinks + services space end's here -->


			</div>
			</div>
			<!-- The topbanner table ends here -->
			</center>
<center>
<div style="width: 762px;">
	<div class="mediumblack" style="border-style: solid; border-color: rgb(143, 167, 191); border-width: 0px 1px 1px; background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
		<div style="width: 760px;">
			<div style="width: 30px; float: left;"><br></div>
 			<div style="margin: 0pt 0pt 10px 0px; width: 700px; float: left;">
				<br>
				<?PHP 
											if ($msg!=''){
												echo $msg;
											}
											if ($_REQUEST['msg']!=''){
												echo $_REQUEST['msg'];
											}

										$user = $HTTP_COOKIE_VARS["user"]; 
										
										?>
<div style="float:left;">
<img src="images/registration-stoppage-model.jpg" alt="" border="0" height="171" width="294"><br>
<img src="images/registration-stoppage-get.gif" alt="" border="0" height="112" width="294"><br>
</div>
		<div class="smallblack" style="width: 294px; float: right; text-align: right; padding-bottom: 2px;">

						<div style="padding-left: 0px;">
							<div style="width: 294px;">

								<!-- LOGIN LOGIN FORM ST -->




<!-- login box Starts -->

<!-- BOX CODE EN -->
<form name="f" method="post" action="login.php" autocomplete="off" style="margin: 0px;">

<div id="box">
<div class="top1" style="">
<div class="l1"></div>
<div class="r1"></div><br clear="all">
</div>

<div style="border-left: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204); padding: 0pt 10px;">

<div style="font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-size-adjust: none; font-stretch: normal;">Existing members? <b>Login Now</b></div><br>

<table border="0" cellpadding="2" cellspacing="0">
<tbody><tr valign="top">
<td style="border-bottom: 2px solid rgb(245, 245, 245);" width="70"><label for="login">Email</label></td>
<td style="border-bottom: 2px solid rgb(245, 245, 245);" width="190"><input tabindex="15" name="login" class="forminput" id="login" value="<?PHP echo $user?>" size="25" type="text"><br>
<span class="mediumred">e.g. abc@rediffmail.com</span></td>
</tr>
<tr valign="top">
<td><label for="password">Password</label></td>
<td><input tabindex="16" name="password" id="password" value="" size="25" type="password"><br><input type="hidden" name="continue" value="true">
<a class="mediumbluelink" href="forget_password.php">Forgot your password?</a></td>
</tr>
</tbody></table>

<div style="border: 0px solid rgb(0, 0, 0); width: 272px;">


<div class="xxsmallgrey" style="margin: 5px 0pt 5px 70px; padding: 5px 4px; background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
<label for="autologin" style="padding: 0px;"><input tabindex="17" name="autologin" id="autologin" value="Y" type="checkbox"> <b>Remember Me</b></label>
<div style="padding: 2px 0pt 0pt 5px;">
Do not click this box if you are using this site from a Cybercafe or from a public / shared computer.</div>

</div>
<br>


<div style="margin-left: 70px;">
<input tabindex="19" src="images/login-now.gif" align="center" border="0" height="22" hspace="2" type="image" width="96">
<input name="go" value="" type="hidden">
<input name="timeout" value="" type="hidden">
<input name="stop" value="" type="hidden">
<input name="view_seal" value="" type="hidden">
</div>
</div>

</div>

<div class="btm1">
<div class="l1"><br></div>
<div class="r1"><br></div><br clear="all">
</div>
</div>

</form>
<!-- BOX CODE EN -->

<!-- login box end -->


<script>
<!--
document.f.login.focus();
// -->
</script>								<!-- BOX CODE EN -->
							

							</div><br clear="all">
						</div>
				</div>

			

		<!-- FORM TABLE ST -->
		<script src="js/common.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/registration.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/common_002.js"></script>


			</div><br><br>



		</div><br clear="all">
	</div>
</div>

</center>



			<!-- BTM BANNER download / registration STARTS-->
			<center>
				<?PHP
				include("footer.php");
				?>
			</center>
</body></html>