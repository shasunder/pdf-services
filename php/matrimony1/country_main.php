<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Search By Country</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/landing.css" type="text/css">
<link rel="stylesheet" href="css/homepage.css" type="text/css">
<script language="Javascript" src="js/matrimonials-v10.js" type="text/javascript"></script>
<script language="Javascript" src="js/matrimonials-landing1.js"></script>
<script language="Javascript" src="js/mouseovereffect.js"></script>
<script language="Javascript" src="js/home-pg.js" type="text/javascript"></script>
</head>

<body style="margin: 0px;">
<a name="Matrimonials"></a>
<a name="Matrimonial"></a>
<center>

<div class="width">
			<div class="graytxt smallcnt" style="padding: 2px 0px; height: 10px;">
				<span class="left">
				<a href="" style="color: rgb(170, 170, 170);">: </a> <span style="color: rgb(170, 170, 170);">The No.1 </span><a href="" style="color: rgb(170, 170, 170);">Matrimonial Website</a> <span style="color: rgb(170, 170, 170);">Site</span></span>
	<span class="right" style="width:300px; text-align:right"><a href="index.php" class="gray">Home</a> | <a href="aboutus.php" class="gray">About Us</a> | <a href="contactus.php" class="gray">Contact Us</a></span>
			</div>
	
		</div><br style="line-height: 0px;" clear="all">
		
		
		
		
		
		
		<div class="smallcnt width">
			<div class="left tleft"><img src="images/logo1.gif" border="0" height="52" width="440"><br></div>
	</div>
		
		
		
		
		<div class="smallcnt width">
			<div class="left tleft"><img src="images/logo2.gif" border="0" height="37" width="440"><br></div>
			<div class="left tleft">

			</div>
		<!-- FORM ST -->
	
		<div class="right tright" style="width: 192px;"><img src="images/groomhead.gif" border="0" height="37" width="190"></div><br clear="all">
		<!-- FORM EN-->
	</div>
		
		<div class="smallcnt width" style=" background-image:url(images/topbg.gif); -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
			<div class="left tleft" style="width: 60px;"><img src="images/top-lft-cnl.gif" border="0" height="33" width="14"><br></div>
			<div class="left tleft" style="width: 485px;">
	<?PHP
if($_SESSION['UserID']!="")
{
?>
<br>
<a href="myaccount.php" title="My Account" style="color:#FFFFFF;"><strong>My Account</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="my_profile.php" title="My Profile" style="color:#FFFFFF;"><strong>My Profile</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="logout.php" title="Log Out" style="color:#FFFFFF;"><strong>Log Out</strong></a>
<?PHP
}
else
{
?>		
			<form method="post" action="login.php" name="loginpage" autocomplete="off" style="margin: 4px 0pt 0pt 0px;">
			<b style="color:#FFFFFF;">Member Login</b> &nbsp; <input name="login" value="Email ID" onfocus="if(this.value=='Email ID') this.value='';" onblur="if(this.value=='') this.value='Email ID';" size="16" type="text">&nbsp; &nbsp;<input name="password" value="******" onfocus="if(this.value=='******') this.value='';" onblur="if(this.value=='') this.value='******';" size="14" type="password">&nbsp; <input src="images/go.gif" title="Login" align="top" border="0" type="image"><input name="homepage" value="Y" type="hidden"><input name="continue" value="true" type="hidden"> &nbsp; <a href="forget_password.php" class="xsmall" title="Forgot Password?" style="color:#FFFFFF;">Forgot Password?</a>
			</form>
		<?PHP
}
?>		
			</div>
		<!-- FORM ST -->
	
		<div class="right tright" style="width: 212px;"><img src="images/top-rgt-cnl.gif" border="0" height="33" width="210"></div><br clear="all">
		<!-- FORM EN-->
	</div>
	<div class="width smallcnt">
		<!-- MAIN CREATIVE ST-->

		<div style="width: 760px; padding-top: 0px;">
		<table border="0" cellpadding="0" cellspacing="0" width="760" background="images/searchbg.gif"><tr>
		
		<td>
		
		<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td><img src="images/mid-2-c.gif" alt="" border="0" height="138" width="100"></td>
<td align="left">
					<div class="left" style="background: transparent url(images/mid-bg-l.gif) repeat-x scroll 0%; height: 138px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
						<!-- SEARCH FORM ST-->
						<form method="get" action="searchresults.php" name="quicksearch" style="margin: 0px;">						
							<div style="padding: 7px 0pt 3px 0px;">
								<select name="gender" style="width: 65px;"><option value="Female" selected="selected">Bride</option><option value="Male">Groom</option></select> &nbsp; with photo <input name="photograph" value="Yes" type="checkbox">
							</div>
						  <div style="padding: 3px 0px;">
								<select name="agefrom" style="width: 44px;"><option selected>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option>60</option></select> to <select name="ageto" style="width: 44px;"><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option selected>60</option></select>
							</div><div style="padding: 3px 0px;">
			<select name="countryofresidence" style="width: 140px;"><option value="">Doesn't Matter</option>
			
			<?PHP
				$sqlCountry = "SELECT * FROM countries order by CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['CountryID']?>"
						<?PHP
						if($_REQUEST['cid'] == $rowCountry['CountryID'])
							echo "selected";
						?>
						><?PHP echo $rowCountry['Country']?></option>
						<?
					}
				}				
				?>
			
			</select> &nbsp;
			</div><div style="padding: 3px 0px;">
					<select name="caste" style="width: 140px;" id="caste"><option value="">Select</option><option value="">Doesn't Matter</option>
					
					<?PHP
				$sqlCountry = "SELECT * FROM religion order by ReligionID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['ReligionID']?>"
						<?PHP
						if($_REQUEST['caste'] == $rowCountry['ReligionID'])
							echo "selected";
						?>
						><?PHP echo $rowCountry['Religion']?></option>
						<?
					}
				}				
				?>
					</select>&nbsp;
					</div><div style="padding: 3px 0px; margin-right: 25px;"><select name="mothertongue" id="mothertongue" style="width: 125px;"><option value="">Doesn't Matter</option><option value="Aka">Aka</option><option value="Arabic">Arabic</option><option value="Arunachali">Arunachali</option><option value="Assamese">Assamese</option><option value="Awadhi">Awadhi</option><option value="Baluchi">Baluchi</option><option value="Bengali">Bengali</option><option value="Bhojpuri">Bhojpuri</option><option value="Bhutia">Bhutia</option><option value="Brahui">Brahui</option><option value="Brij">Brij</option><option value="Burmese">Burmese</option><option value="Chattisgarhi">Chattisgarhi</option><option value="Chinese">Chinese</option><option value="Coorgi">Coorgi</option><option value="Dogri">Dogri</option><option value="English">English</option><option value="French">French</option><option value="Garhwali">Garhwali</option><option value="Garo">Garo</option><option value="Gujarati">Gujarati</option><option value="Haryanavi">Haryanavi</option><option value="Himachali/Pahari">Himachali/Pahari</option><option value="Hindi">Hindi</option><option value="Hindko">Hindko</option><option value="Kakbarak">Kakbarak</option><option value="Kanauji">Kanauji</option><option value="Kannada">Kannada</option><option value="Kashmiri">Kashmiri</option><option value="Khandesi">Khandesi</option><option value="Khasi">Khasi</option><option value="Konkani">Konkani</option><option value="Koshali">Koshali</option><option value="Kumaoni">Kumaoni</option><option value="Kutchi">Kutchi</option><option value="Ladakhi">Ladakhi</option><option value="Lepcha">Lepcha</option><option value="Magahi">Magahi</option><option value="Maithili">Maithili</option><option value="Malay">Malay</option><option value="Malayalam">Malayalam</option><option value="Manipuri">Manipuri</option><option value="Marathi">Marathi</option><option value="Marwari">Marwari</option><option value="Miji">Miji</option><option value="Mizo">Mizo</option><option value="Monpa">Monpa</option><option value="Nepali">Nepali</option><option value="Oriya">Oriya</option><option value="Pashto">Pashto</option><option value="Persian">Persian</option><option value="Punjabi">Punjabi</option><option value="Rajasthani">Rajasthani</option><option value="Russian">Russian</option><option value="Sanskrit">Sanskrit</option><option value="Santhali">Santhali</option><option value="Seraiki">Seraiki</option><option value="Sindhi">Sindhi</option><option value="Sinhala">Sinhala</option><option value="Spanish">Spanish</option><option value="Swedish">Swedish</option><option value="Tagalog">Tagalog</option><option value="Tamil">Tamil</option><option value="Telugu">Telugu</option><option value="Tulu">Tulu</option><option value="Urdu">Urdu</option><option value="Other">Other</option></select>
					<input src="images/go-grn.gif" title="Search" align="top" border="0" type="image">

					</div>
						</form>
						<!-- SEARCH FORM EN-->
					</div>
</td>
<td><img src="images/mid-3-l.gif" alt="" border="0" height="138" width="19"></td>
</tr>

</table>
				<!-- SEARCH FORM ST-->
				<div style="padding-top: 18px; text-align:center;">
					<form method="get" action="profile.php" autocomplete="off" name="profileform">
						<input name="id" value=" Search by Profile ID" onfocus="if(this.value==' Search by Profile ID') this.value='';" onblur="if(this.value=='') this.value=' Search by Profile ID';" style="width: 111px;" type="text"> &nbsp; <input src="images/go.gif" title="View Profile" align="top" type="image">
					</form>
				</div>
				<!-- SEARCH FORM EN-->
		</td>
		
		<td><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="437" height="218" id="rahila" align="right">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="images/rahila.swf" />
<param name="quality" value="high" />
<param name="bgcolor" value="#ffffff" />
<embed src="images/rahila.swf" quality="high" bgcolor="#ffffff" width="437" height="218" name="rahila" align="right" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object></td>
		
		</tr></table>					
	</div>
	<!-- MAIN CREATIVE EN-->
</div>
<!-- REGISTER/UPGRADE CONTENT ST-->
<div class="width smallcnt" style="border-top: 1px solid rgb(255, 255, 255); background: transparent url(images/main-bg.gif) repeat-x scroll left top; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">

		<div id="threeStep" class="left tleft">

			<div id="step1" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(1,'rollin','images/');" onmouseout="change_image(1,'rollout','images/')">
				<div style="padding-top: 13px;">
					<a href="register.php"><img id="digit1" src="images/one-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43"></a> <a href="register.php"><font style="color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Register</font></a><br><a href="register.php" style="color:#000000;">
					and create your<br> free profile.</a>
				</div>
			</div>
			<div id="step2" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(2,'rollin','images/');" onmouseout="change_image(2,'rollout','images/');">
				<div style="padding-top: 13px;">
					<a href="search.php" style="color:#000000;"><img id="digit2" src="images/two-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43"><font style="color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Search</font><br>
					for members who<br> meet your criteria.</a>
				</div>
			</div>
			<div id="step3" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(3,'rollin','images/');" onmouseout="change_image(3,'rollout','images/');">
				<div style="padding-top: 13px;">
					<a href="communicate.php" style="color:#000000;"><img id="digit3" src="images/three-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43">
					<font style="color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Contact</font><br>
					members you like via<br>email or phone.</a>
				</div>
			</div>
		</div><!-- three step en -->

		<div class="left" style="padding: 20px 0pt 0pt 36px;">
			<a href="register.php"><img src="images/registerbutton-1.gif" alt="Register Free!" title="Register Free!" border="0" height="29" vspace="0" width="127"></a>
		</div>
		
<br clear="all">
</div>
<div class="width smallcnt" style="background-image:url(images/background.jpg);">
<div class="left graytxt" style="width: 760px;background-image:url(images/background.jpg); height:5px;"></div>
	<div class="left graytxt" style="width: 760px;background-image:url(images/background.jpg);">
	<table class="left tleft smallcnt graytxt" border="0" cellpadding="0" cellspacing="0"><tr><td>&nbsp;</td></tr></table>
		<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background: url(images/title-brdr.gif); line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; padding-left:40px; color:#FFFFFF;">Brides</td>
			</tr>
			<?PHP
$religion = " (users.CountryID=".$_REQUEST['cid'].") ";
			
			$sql = "SELECT * FROM users, user_profile, countries, religion WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and users.Gender='Female' and users.Status=1 and users.ApprovalStatus=1 and ".$religion." order by users.UserID desc limit 6";
			
$result = mysql_query($sql,$conn);
$a=0;
$b=0;
if(@mysql_num_rows($result)!=0)
{
while($row = @mysql_fetch_array($result))
			{
			?>
			<tr><td colspan="2" height="18">&nbsp;</td></tr>
			<tr align="left" valign="top">
				<td style="background: transparent url(images/photo-brdr.gif) no-repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;" height="71" width="80"><a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>"><img src="<?PHP 
				if($row['photo3']!="")
				echo $row['photo3'];
				else
				echo "images/f.gif";				
				?>" oncontextmenu="return false" border="0" height="60" hspace="5" vspace="5" width="60" align="middle"></a></td>
				<td style="color:#000000 ">
					<span class="large"><a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>" style="color:#990000;"><?PHP echo stripslashes($row['LoginID'])?></a></span><br>
					<span style="line-height: 5px;"><br></span>
					<?PHP 
if($row['CreatedBy']!="Self" && $row['Gender']=="Male")
echo "He is ";
else if($row['CreatedBy']!="Self" && $row['Gender']=="Female")
echo "She is ";
else
echo "I am ";
?><?PHP echo GetAge($row['BirthYear'], $row['BirthMonth'], $row['BirthDate'])?>,<br>
<?PHP echo $row['Religion']?><br>
from <?PHP echo $row['Country']?></td>
			</tr>
			
	<?PHP
	$a=$a+1;
	if($a==3 && $b==0)
	{
	$a=0;
	$b=1;
	?>
	</tbody></table>
	<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background-color:#A10908; line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">&nbsp;</td>
			</tr>
	<?PHP
	}
	else if($a==3 && $b==1)
	{
	?>
		<tr>
				<td colspan="2" height="23" valign="bottom"><a href="country_brides.php?id=<?PHP echo $_REQUEST['cid']?>" style="color:#FFFFFF; font-weight:bold;">More Brides...
				</a></td>
			</tr>
		</tbody></table>
	<?PHP
	}
	}
		
	if($a!=3 && $b==1)
	{
	?>
	<tr>
				<td colspan="2" height="23" valign="bottom"><a href="country_brides.php?id=<?PHP echo $_REQUEST['cid']?>" style="color:#FFFFFF; font-weight:bold;">More Brides...</a></td>
			</tr>
		</tbody></table>
	<?PHP
	}
	
	else if($a!=3 && b==0)
	{
	?>
			<tr>
				<td colspan="2" height="23" valign="bottom"><a href="country_brides.php?id=<?PHP echo $_REQUEST['cid']?>" style="color:#FFFFFF; font-weight:bold;">More Brides...</a></td>
			</tr>
		</tbody></table>
			
			<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background-color:#A10908; line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"><a href="" style="color: rgb(170, 170, 170);">&nbsp;</a></td>
			</tr></tbody></table>
	<?PHP
	}
	
	}
	else
	{
	?>
	<tr>
				<td colspan="2" height="23" valign="bottom" style="color:#000000;">
				Sorry, no records found in brides section..<br><br><br><br><br>
				</td>
			</tr>
		</tbody></table>
		<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background-color:#A10908; line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"><a href="" style="color: rgb(170, 170, 170);">&nbsp;</a></td>
			</tr></tbody></table>
	<?PHP
	}	
	?>

<table class="left tleft smallcnt graytxt" border="0" cellpadding="0" cellspacing="0"><tr><td width="3"></td></tr></table>
	
<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background: transparent url(images/title-brdr.gif) repeat-x scroll 0%; line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; padding-left:40px; color:#FFFFFF;">Grooms</td>
			</tr>	
	
			<?PHP
			$sql = "SELECT * FROM users, user_profile, countries, religion WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.ReligionID=religion.ReligionID and users.Gender='Male' and users.Status=1 and users.ApprovalStatus=1 and ".$religion." order by users.UserID desc limit 6";
$result = mysql_query($sql,$conn);
$a=0;
$b=0;
if(@mysql_num_rows($result) != 0)
{
while($row = @mysql_fetch_array($result))
			{
			?>
			<tr><td colspan="2" height="18">&nbsp;</td></tr>
			<tr align="left" valign="top">
				<td style="background: transparent url(images/photo-brdr.gif) no-repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;" height="71" width="80">
					<a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>">
					<img src="<?PHP 
					if($row['photo3']!="")
				echo $row['photo3'];
				else
				echo "images/m.gif";	
					?>" oncontextmenu="return false" border="0" height="60" hspace="5" vspace="5" width="60">
					</a></td>
				<td style="color:#000000;">
					<span class="large"><a href="profile.php?id=<?PHP echo stripslashes($row['LoginID'])?>" style="color:#990000;"><?PHP echo stripslashes($row['LoginID'])?></a></span><br>
					<span style="line-height: 5px;"><br></span>
					<?PHP 
if($row['CreatedBy']!="Self" && $row['Gender']=="Male")
echo "He is ";
else if($row['CreatedBy']!="Self" && $row['Gender']=="Female")
echo "She is ";
else
echo "I am ";
?><?PHP echo GetAge($row['BirthYear'], $row['BirthMonth'], $row['BirthDate'])?>,<br><?PHP echo $row['Religion']?><br>from <?PHP echo $row['Country']?></td>
			</tr>
			
	<?PHP
	$a=$a+1;
	if($a==3 && $b==0)
	{
	$a=0;
	$b=1;
	?>
	</tbody></table>
	<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background-color:#A10908; line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">&nbsp;</td>
			</tr>
	<?PHP
	}
	else if($a==3 && $b==1)
	{
	?><tr>
				<td colspan="2" height="23" valign="bottom"><a href="country_grooms.php?id=<?PHP echo $_REQUEST['cid']?>" style="color:#FFFFFF; font-weight:bold;">More Grooms...</a></td>
			</tr>
		</tbody></table>
	<?PHP
	}
	}
		
	if($a!=3 && $b==1)
	{
	?>
	<tr>
				<td colspan="2" height="23" valign="bottom"><a href="country_grooms.php?id=<?PHP echo $_REQUEST['cid']?>" style="color:#FFFFFF; font-weight:bold;">More Grooms...</a></td>
			</tr>
		</tbody></table>
	<?PHP
	}
	
	else if($a!=3 && b==0)
	{
	?>
			<tr>
				<td colspan="2" height="23" valign="bottom"><a href="country_grooms.php?id=<?PHP echo $_REQUEST['cid']?>" style="color:#FFFFFF; font-weight:bold;">More Grooms...</a></td>
			</tr>
		</tbody></table>
			
			<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background-color:#A10908; line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"><a href="" style="color: rgb(170, 170, 170);">&nbsp;</a></td>
			</tr></tbody></table>
	<?PHP
	}
	
	}
	else
	{
	?>
	<tr>
				<td colspan="2" height="23" valign="bottom" style="color:#000000;">
				Sorry, no records found in grooms section..<br><br><br><br><br>
				</td>
			</tr>
		</tbody></table>
		<table class="left tleft smallcnt graytxt" style="width: 188px;" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="titleBrdr" style="background-color:#A10908; line-height: 24px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"><a href="" style="color: rgb(170, 170, 170);">&nbsp;</a></td>
			</tr></tbody></table>
	<?PHP
	}	
	?>	

		
		

		
	</div>
</div><br clear="all">
	</div><span class="brseven"><br>



<!-- Links Start-->
<table class="width smallcnt tleft sstories" border="0" cellpadding="0" cellspacing="0">
	<tbody>
	<tr valign="top">
	<td rowspan="2" width="18">&nbsp;</td>
		<td class="ssgreen" style="color:#990000;">Country</td>
		<td>:</td>
		<td class="lgray">
				
			<a href="country_main.php?cid=1" title="USA matrimonial">India matrimonial</a>
		 | 
			<a href="country_main.php?cid=2" title="Canada matrimonial">USA matrimonial</a>
		 | 
			<a href="country_main.php?cid=3" title="UK matrimonial">UK matrimonial</a>
		 | 
			<a href="country_main.php?cid=4" title="India matrimonial">Canada matrimonial</a>
		 | 
			<a href="country_main.php?cid=5" title="Pakistan matrimonial">Australia matrimonial</a>
		 | 
			<a href="country_main.php?cid=6" title="UAE">Europe matrimonial</a>
<br>

			<a href="country_main.php?cid=7" title="Saudi Arabia">Asia matrimonial</a>
		 | 
			<a href="country_main.php?cid=8" title="Australia">Middle East matrimonial</a>
		 | 
			<a href="country_main.php?cid=9" title="Australia">Africa matrimonial</a>
		 | 
			<a href="country_main.php?cid=10" title="Australia">Caribbean matrimonial</a>
		 | 
			<a href="country_main.php?cid=11" title="Australia">Oceania matrimonial</a>									
<br>

			<a href="country_main.php?cid=12" title="Australia">South America matrimonial</a>			
		 </td>
	</tr>
	<tr valign="top">
		<td class="ssgreen" style="color:#990000;">Profession</td>
		<td>:</td>
		<td class="lgray">
			<a href="profession_main.php?p=Computer Professional" title="Computer Professional">Computer Professional</a> |
				<a href="profession_main.php?p=Business Person" title="Business">Business</a> |
				<a href="profession_main.php?p=IT / Telecom Professional" title="IT / Telecom Professional">IT / Telecom Professional</a> |
				<a href="profession_main.php?p=Engineer" title="Engineer">Engineer</a> |
				<a href="profession_main.php?p=Doctor" title="Doctor">Doctor</a> |
				<a href="profession_main.php?p=Teacher" title="Teacher">Teacher</a> |
				<a href="profession_main.php?p=Administration Professional" title="Administration Professional">Administration Professional</a> |
				<a href="profession_main.php?p=Manager" title="Manager">Manager</a> |
				<a href="profession_main.php?p=Software Consultant" title="Software Consultant">Software Consultant</a> |
				<a href="profession_main.php?p=Consultant" title="Consultant">Consultant</a></td>
	</tr>
</tbody></table>
<br>
<!-- Links End -->
<!-- Footer starts -->
	<?PHP
	include("footer.php");
	?>
<!-- Footer ends -->
</span></center>
</body></html>