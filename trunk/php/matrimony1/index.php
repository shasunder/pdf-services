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
<title>Marry Banjara - World's No. 1 Matrimonial Website</title>
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
			
	
		</div>
        <br style="line-height: 0px;" clear="all">
		
		
		
		
		
		
		<div class="smallcnt width">
			<div class="left tleft"><img src="images/logo1.gif" border="0"><br>
           <div class="left tleft" style="padding-left:30px"> <span style="color: rgb(170, 170, 170);">The No.1 </span><a href="" style="color: rgb(170, 170, 170);">Matrimonial Website</a> <span style="color: rgb(170, 170, 170);">Site</span></span><br><br></div>
            </div>
	</div>
		
		
		
		
		<div class="smallcnt width">

			<div class="left tleft">

			</div>
		<!-- FORM ST -->
	
		<div class="right tright" style="width: 192px;"><img src="images/groomhead.gif" border="0" height="37" width="190"></div><br clear="all">
		<!-- FORM EN-->
	</div>
		
		<div class="smallcnt width" style=" background-image:url(images/topbg.gif); -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
			<div class="left tleft" style="width: 33px;"><img src="images/top-lft-cnl.gif" border="0" height="33" width="14"><br></div>
			<div class="left tleft" style="width: 650px;">
 
	<?PHP
if($_SESSION['UserID']!="")
{
?>
<br>
<a href="index.php" title="My Account" style="color:#FFFFFF;"><strong>Home</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="aboutus.php" title="My Profile" style="color:#FFFFFF;"><strong>About Us</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="contactus.php" title="Log Out" style="color:#FFFFFF;"><strong>Contact Us</strong></a><strong style="color:#FFFFFF;">|</strong>  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="myaccount.php" title="My Account" style="color:#FFFFFF;"><strong>My Account</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="my_profile.php" title="My Profile" style="color:#FFFFFF;"><strong>My Profile</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="logout.php" title="Log Out" style="color:#FFFFFF;"><strong>Log Out</strong></a>
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
	
		<div class="right tright" style="width: 18px;"><img src="images/top-rgt-cnl.gif" border="0" height="33" width="18"></div><br clear="all">
		<!-- FORM EN-->
	</div>
	<div class="width smallcnt">
		<!-- MAIN CREATIVE ST-->

		<div style="width: 760px; padding-top: 0px;">
		<table border="0" cellpadding="0" cellspacing="0" width="760" background="images/searchbg.gif">
        
 
        <tr>
		
		<td width="291" valign="top">
		
		<table border="0" cellpadding="0" cellspacing="0" align="center">
   <tr> <td valign="middle" colspan="3" height="59" align="center"> <img src="images/quick.gif" width="170" height="30"></td>  </tr>   
<tr>
<td><img src="images/mid-2-c.gif" alt="" border="0"></td>
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
						if($_REQUEST['CountryID'] == $rowCountry['CountryID'])
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
						if($_REQUEST['ReligionID'] == $rowCountry['ReligionID'])
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
<div style="padding-top:10px;" align="center">
<img src="images/profile.gif" width="170" height="30"></div>	<!-- SEARCH FORM ST-->
				<div style="padding-top: 8px; text-align:center;">
					<form method="get" action="profile.php" autocomplete="off" name="profileform">
						<input name="id" value=" Search by Profile ID" onfocus="if(this.value==' Search by Profile ID') this.value='';" onblur="if(this.value=='') this.value=' Search by Profile ID';" style="width: 111px;" type="text"> &nbsp; <input src="images/go.gif" title="View Profile" align="top" type="image">
					</form>
				</div>
				<!-- SEARCH FORM EN-->
		</td>
		
		<td width="469"><img src="images/banner.jpg" width="469" height="282px"></td>
		
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
			<a href="register.php"><img src="images/advSearcButton.png" alt="Register Free!" title="Register Free!" border="0" height="30" vspace="0" width="140"></a>
		</div>
		
<br clear="all">
</div>
<div class="width smallcnt" style="background-image:url(images/background.jpg)">
<div class="left graytxt" style="width: 760px;background-image:url(images/background.jpg); height:5px;"></div>
	<div class="left graytxt" style="width: 760px">
		
	<table class="left tleft smallcnt graytxt" border="0" cellpadding="0" cellspacing="0" style="padding:10px;border:3px solid #F93;background-color:#FFC">
    <tr>
    <td>
<p style="font-family:Verdana;font-size:12px;color:#600;font-weight:bold;text-align:justify">

	<?PHP
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
<br/><br/>
Our history goes back to some 2000 years and is as colourful as the costumes our women wear.
<br/><br/>
There are so many doctors,engineers, lecturers, dentists and other professionals in our banjara community. But there are very few affordable lambani community matrimonial on the internet. Most are charging ridiculously high prices for our community members.
<br/><br/>
This is a platform for those searching for their lambani life partners and is dedicated for all lambani /banjara community people who are looking for soul mates
<br/><br/>
We aim to provide service at a very affordable price (starting at Rs.500 only). We would be glad to hear from you!
</p>
</td>
    </tr>
    </table>	

		
	</div>
</div><br clear="all">
	</div><span class="brseven"><br>


<!-- Footer starts -->
	<?PHP
	include("footer.php");
	?>
<!-- Footer ends -->
</span></center>
</body></html>