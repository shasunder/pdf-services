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
<title>Marry Banjara - Search Brides and Grooms</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/landing.css" type="text/css">
<link rel="stylesheet" href="css/homepage.css" type="text/css">
</head>

<body topmargin="2" leftmargin="0" marginheight="2" marginwidth="0" background="images/background.jpg">
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


				
		
				<!-- midlinks + services space -->
					<br style="line-height: 1px;" clear="all">
				<div>
					<div style="border-top: 2px solid #990000; border-bottom: 12px solid #990000; background-color: #990000; text-align: left;">
						
					</div>
				</div>
				<!-- The topbanner table end's here -->

				<!-- The tab table start's here -->
				<div style="margin: 0px; width: 100%;">
					<div style="width: 180px; background-color: rgb(255, 255, 255); float: left;">
						<div style="border-top: 2px solid rgb(0, 0, 0);">
						<div style="padding: 6px 0pt 0pt 0px; width: 170px;" class="smallblack"><div>
						<?PHP
						if($_SESSION['UserID']!="")
						{
						?>
						<a href="logout.php" class="smallbluelink"><b>Logout</b></a> [<a href="my_profile.php" class="smallblackbold" title="<?PHP echo $_SESSION['LoginID']?>"><?PHP echo $_SESSION['LoginID']?></a>]
						<?PHP
						}
						else
						{
						?>
						<a href="login.php" class="smallbluelink"><b>Click here to login</b></a>
						<?PHP
						}
						?>
						<br>
						<span style="line-height: 2px;"><br></span>
</div>
					
				</div>
				</div>
				</div>

				<div style="width: 580px; background-color: rgb(255, 255, 255); float: right; text-align: left;">
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 7px; float: left;"></div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 30px; float: left;"></div>
					<div style="width: 141px; float: left;border-top: 2px solid rgb(0, 0, 0);">
					</div>
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 12px; float: right;"></div>
				</div>
				<br clear="all">
				</div>

			</div>
			</div>
			<!-- The topbanner table ends here -->
			</center>

<div align="center">
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="762">
<tbody><tr>
<td rowspan="2" bgcolor="#8fa7bf" width="1"><spacer type="block" height="1" width="1"></td>
<td height="1" width="5"><spacer type="block" height="1" width="5"></td>
<td align="center" bgcolor="#eeeeee" valign="top" width="170"><span style="line-height: 5px;"><br></span>
<!-- LEFT BANNER STARTS HERE -->
<?PHP
 include "myleftbar.php";
?>
<!-- LEFT BANNER ENDS HERE -->
</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top" align="left" background="images/searchbg.gif">
<br>
<p align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:20px; font-weight:bold; color:#FFFFFF;">Search Now..!</p>
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
				<!-- SEARCH FORM ST-->
				<div style="padding-top: 18px; text-align:center;">
					<form method="get" action="profile.php" autocomplete="off" name="profileform">
						<input name="id" value=" Search by Profile ID" onfocus="if(this.value==' Search by Profile ID') this.value='';" onblur="if(this.value=='') this.value=' Search by Profile ID';" style="width: 111px;" type="text"> &nbsp; <input src="images/go.gif" title="View Profile" align="top" type="image">
					</form>
				</div>
				<!-- SEARCH FORM EN-->
<p>&nbsp;</p>


</td>
<td width="5"><spacer type="block" width="5"></td>
<td rowspan="2" align="right" bgcolor="#8fa7bf" valign="top" width="1"><spacer type="block" width="1"></td>
</tr>
<tr bgcolor="#8fa7bf" valign="top">
	<td colspan="5" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table>
</div>

		<!-- BTM BANNER STARTS-->
		<center>
		
		<?PHP
			include("footer.php");
		?>
		</center>
</body></html>