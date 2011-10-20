<?PHP
session_start();
if($_SESSION['UserID_reg']=="")
{
	header("location: login.php");
}
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);


if($_POST['continue']=="true")
{
			$insert = "update user_profile set CreatedBy='".mysql_escape_string($_POST['relationship'])."', MaritalStatus='".mysql_escape_string($_POST['maritalstatus'])."', HaveChildren='".mysql_escape_string($_POST['havechildren'])."', Height='".mysql_escape_string($_POST['height'])."', BodyType='".mysql_escape_string($_POST['bodytype'])."', Complexion='".mysql_escape_string($_POST['complexion'])."', SpecialCases='".mysql_escape_string($_POST['specialcases'])."', MotherTongue='".mysql_escape_string($_POST['mothertongue'])."', Caste='".mysql_escape_string($_POST['caste'])."', SubCaste='".mysql_escape_string($_POST['subcaste'])."', Manglik='".mysql_escape_string($_POST['manglik'])."', FamilyValues='".mysql_escape_string($_POST['familyvalues'])."', Education='".mysql_escape_string($_POST['educationlevel'])."', EducationIn='".mysql_escape_string($_POST['educationarea'])."', Profession='".mysql_escape_string($_POST['occupation'])."', Diet='".mysql_escape_string($_POST['diet'])."', Smoke='".mysql_escape_string($_POST['smoke'])."', Drink='".mysql_escape_string($_POST['drink'])."', StateID=".mysql_escape_string($_POST['stateofresidence']).", CityID=".mysql_escape_string($_POST['nearest_city']).", ResidencyStatus='".mysql_escape_string($_POST['residencystatus'])."', PhoneStatus='".mysql_escape_string($_POST['type'])."', CountryCode='".mysql_escape_string($_POST['c_country_code'])."', CountryCode2='".mysql_escape_string($_POST['country_code'])."', AreaStdCode='".mysql_escape_string($_POST['std_code'])."', PhoneNumber='".mysql_escape_string($_POST['contact_number'])."', DisplayContactStatus='".mysql_escape_string($_POST['contact_details_dislay_status'])."', AboutYourself='".mysql_escape_string($_POST['aboutyourself'])."' where UserID=".$_SESSION['UserID_reg'];
			$resultt = mysql_query($insert);


	header("Location: profile2.php");
	exit();
}
$sql = "SELECT * FROM users, countries WHERE users.CountryID=countries.CountryID and UserID=".$_SESSION['UserID_reg'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Create Your Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="JavaScript">
<!--
	window.onload = function ()
	{
		document.onmousedown = function()
		{
			if(document.getElementById('manglik-case-div') != null)
			document.getElementById('manglik-case-div').style.display = "none";
			if(document.getElementById('manglik-case-iframe') != null)
			document.getElementById('manglik-case-iframe').style.display = "none";
		}
	}
//-->
</script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>

<link rel="stylesheet" href="css/profile1.css">

<script language="javascript" src="js/profile1.js"></script>
</head>

<body topmargin="2" leftmargin="0" oncontextmenu="return false" onselectstart="return false" ondragstart="return false" marginheight="2" marginwidth="0" background="images/background.jpg">


<script language="javascript" src="js/matrimonials-v10.js"></script>
			<!-- The top link table start's here -->
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

				</div><br clear="all">

			</div>
			<!-- logo + banner space -->

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
	<div style="border-style: solid; border-color: rgb(143, 167, 191); border-width: 0px 1px 1px; background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
		<div class="mediumblack" style="width: 760px;">



	<div style="border: 0px solid rgb(0, 0, 0); margin: 0pt 30px; text-align: left;">



			<div style="border-bottom: 1px solid rgb(143, 167, 191); padding: 12px 0px 7px; margin-bottom: 10px;">
				<h2><span style="color: rgb(213, 86, 1);">Create your Profile</span></h2>
			</div>


		<!-- PAGE STYLE ST -->
		<script src="js/common.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/registration2-1.js" type="text/javascript" language="javascript1.2"></script>


		<!-- PAGE STYLE EN -->


		<!-- MESSAGE & ERROR ST // Needs to be decided by Product & Design -->
				<!-- MESSAGE & ERROR EN -->



	<table style="border-bottom: 1px solid rgb(229, 229, 229);" border="0" cellpadding="0" cellspacing="0" width="700">
		<tbody><tr>
			<td colspan="2" style="font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-size-adjust: none; font-stretch: normal; padding-top: 5px;" valign="top">

		<span style="font-family: verdana; font-style: normal; font-variant: normal; font-weight: normal; font-size: 18px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(213, 86, 1);">A matrimonial profile is as a quick summary of you and your lifestyle.</span><br><br>
		Members will see your profile and contact you. Please be as detailed <br>and accurate as possible to help you get better matches.<br><br>

		Create your profile to be contacted by members interested in you.<br><br>

		</td>
		<td rowspan="3" align="right" valign="bottom" width="252">&nbsp;</td>
	</tr>
	<tr>
		<td style="padding-bottom: 5px;" height="50" valign="bottom"><span class="boldgreen" style="color:#990000; "><b>Your Basic Info</b></span> <span style="background-color: rgb(255, 255, 224); font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127); margin-left: 55px;">* All fields are compulsory. </span></td>
	</tr>
</tbody></table>



	<div id="loading_state"></div>
					<form method="post" action="profile1.php" name="profile" id="profile" style="margin: 0px;" onSubmit="return validateform(this);">

	<!-- PROFILE CONTENTS ST -->

			<!-- BASIC INFO ST -->
			<a name="basics"></a>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0" width="700">

			<tbody><tr>
				<td class="td1" valign="top" width="127"><em>*</em><b><label for="gender1">Gender</label></b></td>
				<td class="td2 smallblack" valign="top" width="285">
				<?PHP
				echo $row['Gender'];
				?>
</td>
				<td rowspan="10" valign="top">
					<div style="font-family: arial; font-style: normal; font-variant: normal; font-weight: bold; font-size: 12px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127); padding-top: 35px;">
						Note:<br>
						<ul class="list1">
							<li>All information you submit here will be visible on
								your profile (except contact details, which you
								can select to display or not).

							</li><li>Please enter accurate information in this form or
								your profile may be declined.
						</li></ul>
					<div>
				</div></div></td>
			</tr>
			<tr valign="top">
				<td class="td1" style="cursor: pointer;" onclick="focus_field('day');" valign="top"><em>*</em><b>Date of Birth</b></td>
				<td class="smallblack" valign="top">
				<select name="day" id="day" class="field_filled1" onfocus="toggleHint('show', 'dateofbirth')" onblur="validate_dateofbirth(this.name);" style="width: 44px;" disabled>
				<?PHP
				$day='<option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>';
				$day = str_replace('<option value="'.$row['BirthDate'].'"','<option value="'.$row['BirthDate'].'" selected', $day);
				echo $day;
				?>
				</select>&nbsp; <select name="month" class="field_filled1" onfocus="toggleHint('show', 'dateofbirth')" onblur="validate_dateofbirth(this.name);" style="width: 50px;" disabled>
				<?PHP
				$month='<option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option><option value="07">Jul</option><option value="08">Aug</option><option value="09">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>';
				$month = str_replace('<option value="'.$row['BirthMonth'].'"','<option value="'.$row['BirthMonth'].'" selected', $month);
				echo $month;
				?>
				</select>&nbsp; <select name="year" class="field_filled1" onfocus="toggleHint('show', 'dateofbirth')" onblur="validate_dateofbirth(this.name);" style="width: 50px;" disabled>
				<?PHP
				$year='<option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option>';
				$year = str_replace('<option value="'.$row['BirthYear'].'"','<option value="'.$row['BirthYear'].'" selected', $year);
				echo $year;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint_dob" id="hint_dateofbirth">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select date of birth of the<br>person looking to get married.<br>(Visible only to you)</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
	<span class="smallgrey" style="line-height: 18px;">(you can update it later)</span><br>
	<span id="errmsg_dateofbirth" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('relationship');" valign="top" width="139"><em>*</em><b>Profile created by</b></td>
				<td class="td2 smallblack" valign="top"><select name="relationship" id="relationship" class="field" onfocus="toggleHint('show', 'relationship')" onblur="validate_relationship(this.name);"><option value="">Select</option><option value="Self">Self</option><option value="Parent / Guardian">Parent / Guardian</option><option value="Sibling">Sibling</option><option value="Friend">Friend</option><option value="Other">Other</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_relationship">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select your relationship with the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_relationship" class="error"></span></td>

			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('maritalstatus');" valign="top"><em>*</em><b>Marital Status</b></td>
				<td class="smallblack" valign="top"><select name="maritalstatus" id="maritalstatus" class="field" onchange="check_maritalstatus();" onfocus="toggleHint('show', 'maritalstatus')" onblur="validate_maritalstatus(this.name);"><option value="">Select</option><option value="Never Married">Never Married</option><option value="Divorced">Divorced</option><option value="Widowed">Widowed</option><option value="Separated">Separated</option><option value="Annulled">Annulled</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_maritalstatus">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select marital status of the <br>person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_maritalstatus" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('havechildren');" valign="top"><em>*</em><b>Have Children</b></td>
				<td class="smallblack" valign="top"><select name="havechildren" id="havechildren" onfocus="toggleHint('show', 'havechildren')" onblur="validate_havechildren(this.name);" class="field"><option value="">Select</option><option value="No">No</option><option value="Yes. Living together">Yes. Living together</option><option value="Yes. Not living together">Yes. Not living together</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_havechildren">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select if the person looking to get married has children.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_havechildren" class="error"></span>
				</td>
			</tr>

			<tr valign="top">
				<td class="td1" style="cursor: pointer;" onclick="focus_field('height');" valign="top"><em>*</em><b>Height</b></td>
				<td class="smallblack" valign="top">
				<select name="height" id="height" class="field" onfocus="toggleHint('show', 'height')" onblur="validate_height(this.name);"><option value="">Select</option><option value="4ft 5in - 134cm">4ft 5in - 134cm</option><option value="4ft 6in - 137cm">4ft 6in - 137cm</option><option value="4ft 7in - 139cm">4ft 7in - 139cm</option><option value="4ft 8in - 142cm">4ft 8in - 142cm</option><option value="4ft 9in - 144cm">4ft 9in - 144cm</option><option value="4ft 10in - 147cm">4ft 10in - 147cm</option><option value="4ft 11in - 149cm">4ft 11in - 149cm</option><option value="5ft - 152cm">5ft - 152cm</option><option value="5ft 1in - 154cm">5ft 1in - 154cm</option><option value="5ft 2in - 157cm">5ft 2in - 157cm</option><option value="5ft 3in - 160cm">5ft 3in - 160cm</option><option value="5ft 4in - 162cm">5ft 4in - 162cm</option><option value="5ft 5in - 165cm">5ft 5in - 165cm</option><option value="5ft 6in - 167cm">5ft 6in - 167cm</option><option value="5ft 7in - 170cm">5ft 7in - 170cm</option><option value="5ft 8in - 172cm">5ft 8in - 172cm</option><option value="5ft 9in - 175cm">5ft 9in - 175cm</option><option value="5ft 10in - 177cm">5ft 10in - 177cm</option><option value="5ft 11in - 180cm">5ft 11in - 180cm</option><option value="6ft - 182cm">6ft - 182cm</option><option value="6ft 1in - 185cm">6ft 1in - 185cm</option><option value="6ft 2in - 187cm">6ft 2in - 187cm</option><option value="6ft 3in - 190cm">6ft 3in - 190cm</option><option value="6ft 4in - 193cm">6ft 4in - 193cm</option><option value="6ft 5in - 195cm">6ft 5in - 195cm</option><option value="6ft 6in - 198cm">6ft 6in - 198cm</option><option value="6ft 7in - 200cm">6ft 7in - 200cm</option><option value="6ft 8in - 203cm">6ft 8in - 203cm</option><option value="6ft 9in - 205cm">6ft 9in - 205cm</option><option value="6ft 10in - 208cm">6ft 10in - 208cm</option><option value="6ft 11in - 210cm">6ft 11in - 210cm</option><option value="7ft - 213cm">7ft - 213cm</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_height">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select Height of the person <br>looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
					<span id="errmsg_height" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('bodytype');" valign="top"><em>*</em><b>Body Type</b></td>
				<td class="smallblack" valign="top"><select name="bodytype" id="bodytype" class="field" onfocus="toggleHint('show', 'bodytype')" onblur="validate_bodytype(this.name);"><option value="">Select</option><option value="Slim">Slim</option><option value="Average">Average</option><option value="Athletic">Athletic</option><option value="Heavy">Heavy</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_bodytype">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select body type of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_bodytype" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('complexion');" valign="top"><em>*</em><b>Complexion</b></td>
				<td class="smallblack" valign="top"><select name="complexion" id="complexion" class="field" onfocus="toggleHint('show', 'complexion')" onblur="validate_complexion(this.name);"><option value="">Select</option><option value="Very Fair">Very Fair</option><option value="Fair">Fair</option><option value="Wheatish">Wheatish</option><option value="Wheatish Medium">Wheatish Medium</option><option value="Wheatish Brown">Wheatish Brown</option><option value="Dark">Dark</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_complexion">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select complexion of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_complexion" class="error"></span>
				</td>
			</tr>


			</tbody></table>
			<!-- BASIC INFO EN -->

<br>

			<!-- RELIGIOUS & SOCIAL BACKGROUND ST -->
			<a name="releigon"></a>
			<div class="boldgreen" style="margin-top: 10px; color:#990000;"><b>Religious &amp; Social Background</b></div>


			<!-- Gender form element at registration page is radio button so to pass its value we need to do this.. -->
			<script language="JavaScript">
			<!--


			function nullify_caste()
			{
				document.profile.caste.options.length = 0;
				document.profile.caste[0] = new Option('---------Select Caste---------', '');
			}

		function getcastes()
		{

		religion = document.profile.religion.options[document.profile.religion.selectedIndex].value;
		if(religion == 1 || religion == 2 || religion == 3 || religion == 4 || religion == 5)
				{
				religioncastes = '<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);"><option value="">---------Select Caste---------</option><option value="">Doesn\'t Matter</option><option value="Muslim:Bengali">Muslim:Bengali</option><option value="Muslim:Dawoodi Bohra">Muslim:Dawoodi Bohra</option><option value="Muslim:Ehle-Hadith">Muslim:Ehle-Hadith</option><option value="Muslim:Khoja">Muslim:Khoja</option><option value="Muslim:Memon">Muslim:Memon</option><option value="Muslim:Rajput">Muslim:Rajput</option><option value="Muslim:Shia">Muslim:Shia</option><option value="Muslim:Shia Imami Ismaili">Muslim:Shia Imami Ismaili</option><option value="Muslim:Sunni">Muslim:Sunni</option></select>';
				}
				else if(religion == 6 || religion == 7 || religion == 8 || religion == 9)
				{
								religioncastes = '<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);"><option value="">---------Select Caste---------</option><option value="">Doesn\'t Matter</option><option value="Christian:Born Again">Christian:Born Again</option><option value="Christian:CMS">Christian:CMS</option><option value="Christian:CSI">Christian:CSI</option><option value="Christian:Evangelical">Christian:Evangelical</option><option value="Christian:Indian Orthodox">Christian:Indian Orthodox</option><option value="Christian:Jacobite">Christian:Jacobite</option><option value="Christian:Marthoma">Christian:Marthoma</option><option value="Christian:Nadar">Christian:Nadar</option><option value="Christian:Pentecost">Christian:Pentecost</option><option value="Christian:Protestant">Christian:Protestant</option><option value="Christian:Roman Catholic">Christian:Roman Catholic</option><option value="Christian:Syrian">Christian:Syrian</option></select>';
				}
				else if(religion == 10 || religion == 11 || religion == 12 || religion == 13 || religion == 14 || religion == 15 || religion == 16 || religion == 17 || religion == 18 || religion == 19 || religion == 20 || religion == 21 || religion == 22 || religion == 23 || religion == 24)
				{
				religioncastes = '<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);"><option value="">---------Select Caste---------</option><option value="">Doesn\'t Matter</option><option value="Hindu:6000 Niyogi">Hindu:6000 Niyogi</option><option value="Hindu:96K Kokanastha">Hindu:96K Kokanastha</option><option value="Hindu:Adi Dravida">Hindu:Adi Dravida</option><option value="Hindu:Agarwal">Hindu:Agarwal</option><option value="Hindu:Agri">Hindu:Agri</option><option value="Hindu:Ahom">Hindu:Ahom</option><option value="Hindu:Ambalavasi">Hindu:Ambalavasi</option><option value="Hindu:Arora">Hindu:Arora</option><option value="Hindu:Arunthathiyar">Hindu:Arunthathiyar</option><option value="Hindu:Arya Vysya">Hindu:Arya Vysya</option><option value="Hindu:Aryasamaj">Hindu:Aryasamaj</option><option value="Hindu:Bahi">Hindu:Bahi</option><option value="Hindu:Baidya">Hindu:Baidya</option><option value="Hindu:Baishnab">Hindu:Baishnab</option><option value="Hindu:Baishya">Hindu:Baishya</option><option value="Hindu:Baniya">Hindu:Baniya</option><option value="Hindu:Barujibi">Hindu:Barujibi</option><option value="Hindu:Bengali">Hindu:Bengali</option><option value="Hindu:Besta">Hindu:Besta</option><option value="Hindu:Bhandari">Hindu:Bhandari</option><option value="Hindu:Bhovi">Hindu:Bhovi</option><option value="Hindu:Billava">Hindu:Billava</option><option value="Hindu:Boyer">Hindu:Boyer</option><option value="Hindu:Brahmin">Hindu:Brahmin</option><option value="Hindu:Brahmin - Anavil">Hindu:Brahmin - Anavil</option><option value="Hindu:Brahmin - Audichya">Hindu:Brahmin - Audichya</option><option value="Hindu:Brahmin - Bengali">Hindu:Brahmin - Bengali</option><option value="Hindu:Brahmin - Bhumihar">Hindu:Brahmin - Bhumihar</option><option value="Hindu:Brahmin - Davadnya">Hindu:Brahmin - Davadnya</option><option value="Hindu:Brahmin - Deshastha">Hindu:Brahmin - Deshastha</option><option value="Hindu:Brahmin - Dhiman">Hindu:Brahmin - Dhiman</option><option value="Hindu:Brahmin - Garhwali">Hindu:Brahmin - Garhwali</option><option value="Hindu:Brahmin - Goswami">Hindu:Brahmin - Goswami</option><option value="Hindu:Brahmin - Gour">Hindu:Brahmin - Gour</option><option value="Hindu:Brahmin - Gowd Saraswat">Hindu:Brahmin - Gowd Saraswat</option><option value="Hindu:Brahmin - Gurukkal">Hindu:Brahmin - Gurukkal</option><option value="Hindu:Brahmin - Havyaka">Hindu:Brahmin - Havyaka</option><option value="Hindu:Brahmin - Iyer">Hindu:Brahmin - Iyer</option><option value="Hindu:Brahmin - Kannada Madhva">Hindu:Brahmin - Kannada Madhva</option><option value="Hindu:Brahmin - Kanyakubja">Hindu:Brahmin - Kanyakubja</option><option value="Hindu:Brahmin - Karhade">Hindu:Brahmin - Karhade</option><option value="Hindu:Brahmin - Kashmiri Pandit">Hindu:Brahmin - Kashmiri Pandit</option><option value="Hindu:Brahmin - Kokanastha">Hindu:Brahmin - Kokanastha</option><option value="Hindu:Brahmin - Kumaoni">Hindu:Brahmin - Kumaoni</option><option value="Hindu:Brahmin - Maharashtrian">Hindu:Brahmin - Maharashtrian</option><option value="Hindu:Brahmin - Maithili">Hindu:Brahmin - Maithili</option><option value="Hindu:Brahmin - Nagar">Hindu:Brahmin - Nagar</option><option value="Hindu:Brahmin - Niyogi Nandavariki">Hindu:Brahmin - Niyogi Nandavariki</option><option value="Hindu:Brahmin - Punjabi">Hindu:Brahmin - Punjabi</option><option value="Hindu:Brahmin - Sanadya">Hindu:Brahmin - Sanadya</option><option value="Hindu:Brahmin - Saraswat">Hindu:Brahmin - Saraswat</option><option value="Hindu:Brahmin - Saryuparin">Hindu:Brahmin - Saryuparin</option><option value="Hindu:Brahmin - Smartha">Hindu:Brahmin - Smartha</option><option value="Hindu:Brahmin - Telugu">Hindu:Brahmin - Telugu</option><option value="Hindu:Brahmin - Tyagi">Hindu:Brahmin - Tyagi</option><option value="Hindu:Brahmin - Vaidiki">Hindu:Brahmin - Vaidiki</option><option value="Hindu:Brahmin - Viswa">Hindu:Brahmin - Viswa</option><option value="Hindu:Bunt">Hindu:Bunt</option><option value="Hindu:CKP">Hindu:CKP</option><option value="Hindu:Chambhar">Hindu:Chambhar</option><option value="Hindu:Chaurasia">Hindu:Chaurasia</option><option value="Hindu:Chettiar">Hindu:Chettiar</option><option value="Hindu:Chhetri">Hindu:Chhetri</option><option value="Hindu:Coorgi">Hindu:Coorgi</option><option value="Hindu:Devanga">Hindu:Devanga</option><option value="Hindu:Devendra Kula Vellalar">Hindu:Devendra Kula Vellalar</option><option value="Hindu:Dhangar">Hindu:Dhangar</option><option value="Hindu:Dheevara">Hindu:Dheevara</option><option value="Hindu:Dhobi">Hindu:Dhobi</option><option value="Hindu:Digambar">Hindu:Digambar</option><option value="Hindu:Ediga">Hindu:Ediga</option><option value="Hindu:Ezhava">Hindu:Ezhava</option><option value="Hindu:Ezhuthachan">Hindu:Ezhuthachan</option><option value="Hindu:Gandla">Hindu:Gandla</option><option value="Hindu:Ganiga">Hindu:Ganiga</option><option value="Hindu:Garhwali">Hindu:Garhwali</option><option value="Hindu:Gavara">Hindu:Gavara</option><option value="Hindu:Ghumar">Hindu:Ghumar</option><option value="Hindu:Goswami">Hindu:Goswami</option><option value="Hindu:Goud">Hindu:Goud</option><option value="Hindu:Gounder">Hindu:Gounder</option><option value="Hindu:Gowda">Hindu:Gowda</option><option value="Hindu:Gujarati">Hindu:Gujarati</option><option value="Hindu:Gupta">Hindu:Gupta</option><option value="Hindu:Gurjar">Hindu:Gurjar</option><option value="Hindu:Iyengar">Hindu:Iyengar</option><option value="Hindu:Iyer">Hindu:Iyer</option><option value="Hindu:Jaiswal">Hindu:Jaiswal</option><option value="Hindu:Jat">Hindu:Jat</option><option value="Hindu:Kaibarta">Hindu:Kaibarta</option><option value="Hindu:Kalar">Hindu:Kalar</option><option value="Hindu:Kalinga Vysya">Hindu:Kalinga Vysya</option><option value="Hindu:Kamboj">Hindu:Kamboj</option><option value="Hindu:Kamma">Hindu:Kamma</option><option value="Hindu:Kannada Mogaveera">Hindu:Kannada Mogaveera</option><option value="Hindu:Kapu">Hindu:Kapu</option><option value="Hindu:Kapu Naidu">Hindu:Kapu Naidu</option><option value="Hindu:Karana">Hindu:Karana</option><option value="Hindu:Karuneekar">Hindu:Karuneekar</option><option value="Hindu:Kashyap">Hindu:Kashyap</option><option value="Hindu:Kayastha">Hindu:Kayastha</option><option value="Hindu:Khandayat">Hindu:Khandayat</option><option value="Hindu:Khandelwal">Hindu:Khandelwal</option><option value="Hindu:Khatri">Hindu:Khatri</option><option value="Hindu:Koli">Hindu:Koli</option><option value="Hindu:Kongu Vellala Gounder">Hindu:Kongu Vellala Gounder</option><option value="Hindu:Kori">Hindu:Kori</option><option value="Hindu:Koshti">Hindu:Koshti</option><option value="Hindu:Kshatriya">Hindu:Kshatriya</option><option value="Hindu:Kshatriya - Agnikula">Hindu:Kshatriya - Agnikula</option><option value="Hindu:Kshatriya - Bhavasar">Hindu:Kshatriya - Bhavasar</option><option value="Hindu:Kudumbi">Hindu:Kudumbi</option><option value="Hindu:Kulalar">Hindu:Kulalar</option><option value="Hindu:Kumawat">Hindu:Kumawat</option><option value="Hindu:Kumbara">Hindu:Kumbara</option><option value="Hindu:Kumbhakar">Hindu:Kumbhakar</option><option value="Hindu:Kumbhar">Hindu:Kumbhar</option><option value="Hindu:Kumhar">Hindu:Kumhar</option><option value="Hindu:Kummari">Hindu:Kummari</option><option value="Hindu:Kunbi">Hindu:Kunbi</option><option value="Hindu:Kurmi">Hindu:Kurmi</option><option value="Hindu:Kuruba">Hindu:Kuruba</option><option value="Hindu:Kurumbar">Hindu:Kurumbar</option><option value="Hindu:Kushwaha">Hindu:Kushwaha</option><option value="Hindu:Lambani">Hindu:Lambani</option><option value="Hindu:Leva Patil">Hindu:Leva Patil</option><option value="Hindu:Lingayat">Hindu:Lingayat</option><option value="Hindu:Lohana">Hindu:Lohana</option><option value="Hindu:Lubana">Hindu:Lubana</option><option value="Hindu:Madiga">Hindu:Madiga</option><option value="Hindu:Maharashtrian">Hindu:Maharashtrian</option><option value="Hindu:Maheshwari">Hindu:Maheshwari</option><option value="Hindu:Mahishya">Hindu:Mahishya</option><option value="Hindu:Malayalee Namboodiri">Hindu:Malayalee Namboodiri</option><option value="Hindu:Malayalee Variar">Hindu:Malayalee Variar</option><option value="Hindu:Mali">Hindu:Mali</option><option value="Hindu:Malla">Hindu:Malla</option><option value="Hindu:Mannuru Kapu">Hindu:Mannuru Kapu</option><option value="Hindu:Maratha">Hindu:Maratha</option><option value="Hindu:Maratha - Gomantak">Hindu:Maratha - Gomantak</option><option value="Hindu:Maruthuvar">Hindu:Maruthuvar</option><option value="Hindu:Marvar">Hindu:Marvar</option><option value="Hindu:Marwari">Hindu:Marwari</option><option value="Hindu:Maurya">Hindu:Maurya</option><option value="Hindu:Meenavar">Hindu:Meenavar</option><option value="Hindu:Menon">Hindu:Menon</option><option value="Hindu:Meru Darji">Hindu:Meru Darji</option><option value="Hindu:Mogaveera">Hindu:Mogaveera</option><option value="Hindu:Mudaliar">Hindu:Mudaliar</option><option value="Hindu:Mudaliar - Arcot">Hindu:Mudaliar - Arcot</option><option value="Hindu:Mudaliar - Saiva">Hindu:Mudaliar - Saiva</option><option value="Hindu:Mudaliar - Senguntha">Hindu:Mudaliar - Senguntha</option><option value="Hindu:Mudiraj">Hindu:Mudiraj</option><option value="Hindu:Mukulathur">Hindu:Mukulathur</option><option value="Hindu:Muthuraja">Hindu:Muthuraja</option><option value="Hindu:Nadar">Hindu:Nadar</option><option value="Hindu:Naicker">Hindu:Naicker</option><option value="Hindu:Naidu">Hindu:Naidu</option><option value="Hindu:Naidu - Balija">Hindu:Naidu - Balija</option><option value="Hindu:Nair">Hindu:Nair</option><option value="Hindu:Nair - Vilakkithala">Hindu:Nair - Vilakkithala</option><option value="Hindu:Nair - Vaniya">Hindu:Nair - Vaniya</option><option value="Hindu:Nair - Velethadathu">Hindu:Nair - Velethadathu</option><option value="Hindu:Namasudra">Hindu:Namasudra</option><option value="Hindu:Nambiar">Hindu:Nambiar</option><option value="Hindu:Napit">Hindu:Napit</option><option value="Hindu:Nayak">Hindu:Nayak</option><option value="Hindu:Nepali">Hindu:Nepali</option><option value="Hindu:OBC (Barber-Naayee)">Hindu:OBC (Barber-Naayee)</option><option value="Hindu:Oswal">Hindu:Oswal</option><option value="Hindu:Padmashali">Hindu:Padmashali</option><option value="Hindu:Parit">Hindu:Parit</option><option value="Hindu:Parkava Kulam">Hindu:Parkava Kulam</option><option value="Hindu:Patel - Dodia">Hindu:Patel - Dodia</option><option value="Hindu:Patel - Desai">Hindu:Patel - Desai</option><option value="Hindu:Patel - Kadva">Hindu:Patel - Kadva</option><option value="Hindu:Patel - Leva">Hindu:Patel - Leva</option><option value="Hindu:Perika">Hindu:Perika</option><option value="Hindu:Pillai">Hindu:Pillai</option><option value="Hindu:Prajapati">Hindu:Prajapati</option><option value="Hindu:Punjabi">Hindu:Punjabi</option><option value="Hindu:Rajaka">Hindu:Rajaka</option><option value="Hindu:Rajput">Hindu:Rajput</option><option value="Hindu:Rajput - Garhwali">Hindu:Rajput - Garhwali</option><option value="Hindu:Rajput - Kumaoni">Hindu:Rajput - Kumaoni</option><option value="Hindu:Ramdasia">Hindu:Ramdasia</option><option value="Hindu:Ramgharia">Hindu:Ramgharia</option><option value="Hindu:Ravidasia">Hindu:Ravidasia</option><option value="Hindu:Reddy">Hindu:Reddy</option><option value="Hindu:Sadgop">Hindu:Sadgop</option><option value="Hindu:Sahu">Hindu:Sahu</option><option value="Hindu:Saini">Hindu:Saini</option><option value="Hindu:Saliya">Hindu:Saliya</option><option value="Hindu:Scheduled Caste">Hindu:Scheduled Caste</option><option value="Hindu:Scheduled Tribe">Hindu:Scheduled Tribe</option><option value="Hindu:Senai Thalaivar">Hindu:Senai Thalaivar</option><option value="Hindu:Sepahia">Hindu:Sepahia</option><option value="Hindu:Setti Balija">Hindu:Setti Balija</option><option value="Hindu:Shimpi">Hindu:Shimpi</option><option value="Hindu:Sindhi">Hindu:Sindhi</option><option value="Hindu:Somvanshi">Hindu:Somvanshi</option><option value="Hindu:Sonar">Hindu:Sonar</option><option value="Hindu:Sowrashtra">Hindu:Sowrashtra</option><option value="Hindu:Sozhiya Vellalar">Hindu:Sozhiya Vellalar</option><option value="Hindu:Sutar">Hindu:Sutar</option><option value="Hindu:Swarnakar">Hindu:Swarnakar</option><option value="Hindu:Tamil Yadava">Hindu:Tamil Yadava</option><option value="Hindu:Telaga">Hindu:Telaga</option><option value="Hindu:Teli">Hindu:Teli</option><option value="Hindu:Telugu">Hindu:Telugu</option><option value="Hindu:Thevar">Hindu:Thevar</option><option value="Hindu:Thigala">Hindu:Thigala</option><option value="Hindu:Thiyya">Hindu:Thiyya</option><option value="Hindu:Udayar">Hindu:Udayar</option><option value="Hindu:Uppara">Hindu:Uppara</option><option value="Hindu:Vadagalai">Hindu:Vadagalai</option><option value="Hindu:Vaddera">Hindu:Vaddera</option><option value="Hindu:Vaish">Hindu:Vaish</option><option value="Hindu:Vaish - Dhaneshawat">Hindu:Vaish - Dhaneshawat</option><option value="Hindu:Vaishnav">Hindu:Vaishnav</option><option value="Hindu:Vaishnav - Bhatia">Hindu:Vaishnav - Bhatia</option><option value="Hindu:Vaishnav - Vania">Hindu:Vaishnav - Vania</option><option value="Hindu:Vaishya">Hindu:Vaishya</option><option value="Hindu:Valmiki">Hindu:Valmiki</option><option value="Hindu:Vanjara">Hindu:Vanjara</option><option value="Hindu:Vannar">Hindu:Vannar</option><option value="Hindu:Vanniyakullak Kshatriya">Hindu:Vanniyakullak Kshatriya</option><option value="Hindu:Vanniyar">Hindu:Vanniyar</option><option value="Hindu:Varshney">Hindu:Varshney</option><option value="Hindu:Veera Saivam">Hindu:Veera Saivam</option><option value="Hindu:Veerashaiva">Hindu:Veerashaiva</option><option value="Hindu:Vellalar">Hindu:Vellalar</option><option value="Hindu:Vellama">Hindu:Vellama</option><option value="Hindu:Vishwakarma">Hindu:Vishwakarma</option><option value="Hindu:Vokaliga">Hindu:Vokaliga</option><option value="Hindu:Vysya">Hindu:Vysya</option><option value="Hindu:Yadav">Hindu:Yadav</option></select>';
				}
				else if(religion == 25)
				{
					religioncastes = '<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);"><option value="">---------Select Caste---------</option><option value="">Doesn\'t Matter</option></select>';
				}
				else if(religion == 26 || religion == 27 || religion == 28 || religion == 29 || religion == 30)
				{
								religioncastes = '<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);"><option value="">---------Select Caste---------</option><option value="">Doesn\'t Matter</option><option value="Sikh:Clean Shaven">Sikh:Clean Shaven</option><option value="Sikh:Gursikh">Sikh:Gursikh</option><option value="Sikh:Jat">Sikh:Jat</option><option value="Sikh:Kamboj">Sikh:Kamboj</option><option value="Sikh:Kesadhari">Sikh:Kesadhari</option><option value="Sikh:Khatri">Sikh:Khatri</option><option value="Sikh:Kshatriya">Sikh:Kshatriya</option><option value="Sikh:Labana">Sikh:Labana</option><option value="Sikh:Ramdasia">Sikh:Ramdasia</option><option value="Sikh:Ramgharia">Sikh:Ramgharia</option><option value="Sikh:Ravidasia">Sikh:Ravidasia</option><option value="Sikh:Saini">Sikh:Saini</option></select>';
				}
				else if(religion == 31 || religion == 32 || religion == 33 || religion == 34)
				{
								religioncastes = '<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);"><option value="">---------Select Caste---------</option><option value="">Doesn\'t Matter</option><option value="Jain:Digambar">Jain:Digambar</option><option value="Jain:Shwetamber">Jain:Shwetamber</option><option value="Jain:Vania">Jain:Vania</option></select>';
				}
				else if(religion == 35 || religion == 36 || religion == 37 || religion == 38 || religion == 39)
				{
					religioncastes = '<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);"><option value="">---------Select Caste---------</option><option value="">Doesn\'t Matter</option></select>';
				}
				document.getElementById('selectedcastes').innerHTML = religioncastes;

		}


			//-->
			</script>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('religion');" valign="top" width="139"><em>*</em><b>Religion</b></td>
				<td class="td2" valign="top">
				<select id="religion" name="religion" class="field_filled"  onblur="validate_religion(this.name);" disabled>
				<?PHP
				$sqlCountry = "SELECT * FROM religion order by ReligionID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['ReligionID']?>"
						<?PHP
						if($row['ReligionID'] == $rowCountry['ReligionID'])
							echo "selected";
						?>
						><?PHP echo $rowCountry['Religion']?></option>
						<?
					}
				}
				?>
				</select><br>
				<span id="errmsg_religion" class="error"></span>
				</td>

			</tr>

			<tr id="show_hide_mothertongue">
				<td class="td1" style="cursor: pointer;" onclick="focus_field('mothertongue');" valign="top"><em>*</em><b>Mother Tongue</b></td>
				<td valign="top">
				<select id="mothertongue" name="mothertongue" class="field" onfocus="toggleHint('show', 'mothertongue')" onblur="validate_mothertongue(this.name);"><option value="" selected="selected">----Select Mother Tongue----</option><option value="Aka">Aka</option><option value="Arabic">Arabic</option><option value="Arunachali">Arunachali</option><option value="Assamese">Assamese</option><option value="Awadhi">Awadhi</option><option value="Baluchi">Baluchi</option><option value="Bengali">Bengali</option><option value="Bhojpuri">Bhojpuri</option><option value="Bhutia">Bhutia</option><option value="Brahui">Brahui</option><option value="Brij">Brij</option><option value="Burmese">Burmese</option><option value="Chattisgarhi">Chattisgarhi</option><option value="Chinese">Chinese</option><option value="Coorgi">Coorgi</option><option value="Dogri">Dogri</option><option value="English">English</option><option value="French">French</option><option value="Garhwali">Garhwali</option><option value="Garo">Garo</option><option value="Gujarati">Gujarati</option><option value="Haryanavi">Haryanavi</option><option value="Himachali/Pahari">Himachali/Pahari</option><option value="Hindi">Hindi</option><option value="Hindko">Hindko</option><option value="Kakbarak">Kakbarak</option><option value="Kanauji">Kanauji</option><option value="Kannada">Kannada</option><option value="Kashmiri">Kashmiri</option><option value="Khandesi">Khandesi</option><option value="Khasi">Khasi</option><option value="Konkani">Konkani</option><option value="Koshali">Koshali</option><option value="Kumaoni">Kumaoni</option><option value="Kutchi">Kutchi</option><option value="Ladakhi">Ladakhi</option><option value="Lepcha">Lepcha</option><option value="Magahi">Magahi</option><option value="Maithili">Maithili</option><option value="Malay">Malay</option><option value="Malayalam">Malayalam</option><option value="Manipuri">Manipuri</option><option value="Marathi">Marathi</option><option value="Marwari">Marwari</option><option value="Miji">Miji</option><option value="Mizo">Mizo</option><option value="Monpa">Monpa</option><option value="Nepali">Nepali</option><option value="Oriya">Oriya</option><option value="Pashto">Pashto</option><option value="Persian">Persian</option><option value="Punjabi">Punjabi</option><option value="Rajasthani">Rajasthani</option><option value="Russian">Russian</option><option value="Sanskrit">Sanskrit</option><option value="Santhali">Santhali</option><option value="Seraiki">Seraiki</option><option value="Sindhi">Sindhi</option><option value="Sinhala">Sinhala</option><option value="Spanish">Spanish</option><option value="Swedish">Swedish</option><option value="Tagalog">Tagalog</option><option value="Tamil">Tamil</option><option value="Telugu">Telugu</option><option value="Tulu">Tulu</option><option value="Urdu">Urdu</option><option value="Other">Other</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_mothertongue">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select mother tongue of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_mothertongue" class="error"></span>
				</td>
			</tr>

			<tr id="show_hide_caste">
				<td class="td1" style="cursor: pointer;" onclick="focus_field('caste');" valign="top"><em>*</em><b>Caste</b></td>
				<td valign="top">
								<span id="selectedcastes">
				<select id="caste" name="caste" class="field" onblur="validate_caste(this.name);">
				<?PHP
				if($row['ReligionID'] == 1 || $row['ReligionID'] == 2 || $row['ReligionID'] == 3 || $row['ReligionID'] == 4 || $row['ReligionID'] == 5)
				{
				$caste = '<option value="">---------Select Caste---------</option><option value="Doesn\'t Matter">Doesn\'t Matter</option>
				<option value="Muslim:Bengali">Muslim:Bengali</option><option value="Muslim:Dawoodi Bohra">Muslim:Dawoodi Bohra</option><option value="Muslim:Ehle-Hadith">Muslim:Ehle-Hadith</option><option value="Muslim:Khoja">Muslim:Khoja</option><option value="Muslim:Memon">Muslim:Memon</option><option value="Muslim:Rajput">Muslim:Rajput</option><option value="Muslim:Shia">Muslim:Shia</option><option value="Muslim:Shia Imami Ismaili">Muslim:Shia Imami Ismaili</option><option value="Muslim:Sunni">Muslim:Sunni</option>';
				}
				else if($row['ReligionID'] == 6 || $row['ReligionID'] == 7 || $row['ReligionID'] == 8 || $row['ReligionID'] == 9)
				{
								$caste = '<option value="">---------Select Caste---------</option><option value="Doesn\'t Matter">Doesn\'t Matter</option>
<option value="Christian:Born Again">Christian:Born Again</option><option value="Christian:CMS">Christian:CMS</option><option value="Christian:CSI">Christian:CSI</option><option value="Christian:Evangelical">Christian:Evangelical</option><option value="Christian:Indian Orthodox">Christian:Indian Orthodox</option><option value="Christian:Jacobite">Christian:Jacobite</option><option value="Christian:Marthoma">Christian:Marthoma</option><option value="Christian:Nadar">Christian:Nadar</option><option value="Christian:Pentecost">Christian:Pentecost</option><option value="Christian:Protestant">Christian:Protestant</option><option value="Christian:Roman Catholic">Christian:Roman Catholic</option><option value="Christian:Syrian">Christian:Syrian</option>';
				}
				else if($row['ReligionID'] == 10 || $row['ReligionID'] == 11 || $row['ReligionID'] == 12 || $row['ReligionID'] == 13 || $row['ReligionID'] == 14 || $row['ReligionID'] == 15 || $row['ReligionID'] == 16 || $row['ReligionID'] == 17 || $row['ReligionID'] == 18 || $row['ReligionID'] == 19 || $row['ReligionID'] == 20 || $row['ReligionID'] == 21 || $row['ReligionID'] == 22 || $row['ReligionID'] == 23 || $row['ReligionID'] == 24)
				{
				$caste = '<option value="">---------Select Caste---------</option><option value="Doesn\'t Matter">Doesn\'t Matter</option>
				<option value="Hindu:6000 Niyogi">Hindu:6000 Niyogi</option><option value="Hindu:96K Kokanastha">Hindu:96K Kokanastha</option><option value="Hindu:Adi Dravida">Hindu:Adi Dravida</option><option value="Hindu:Agarwal">Hindu:Agarwal</option><option value="Hindu:Agri">Hindu:Agri</option><option value="Hindu:Ahom">Hindu:Ahom</option><option value="Hindu:Ambalavasi">Hindu:Ambalavasi</option><option value="Hindu:Arora">Hindu:Arora</option><option value="Hindu:Arunthathiyar">Hindu:Arunthathiyar</option><option value="Hindu:Arya Vysya">Hindu:Arya Vysya</option><option value="Hindu:Aryasamaj">Hindu:Aryasamaj</option><option value="Hindu:Bahi">Hindu:Bahi</option><option value="Hindu:Baidya">Hindu:Baidya</option><option value="Hindu:Baishnab">Hindu:Baishnab</option><option value="Hindu:Baishya">Hindu:Baishya</option><option value="Hindu:Baniya">Hindu:Baniya</option><option value="Hindu:Barujibi">Hindu:Barujibi</option><option value="Hindu:Bengali">Hindu:Bengali</option><option value="Hindu:Besta">Hindu:Besta</option><option value="Hindu:Bhandari">Hindu:Bhandari</option><option value="Hindu:Bhovi">Hindu:Bhovi</option><option value="Hindu:Billava">Hindu:Billava</option><option value="Hindu:Boyer">Hindu:Boyer</option><option value="Hindu:Brahmin">Hindu:Brahmin</option><option value="Hindu:Brahmin - Anavil">Hindu:Brahmin - Anavil</option><option value="Hindu:Brahmin - Audichya">Hindu:Brahmin - Audichya</option><option value="Hindu:Brahmin - Bengali">Hindu:Brahmin - Bengali</option><option value="Hindu:Brahmin - Bhumihar">Hindu:Brahmin - Bhumihar</option><option value="Hindu:Brahmin - Davadnya">Hindu:Brahmin - Davadnya</option><option value="Hindu:Brahmin - Deshastha">Hindu:Brahmin - Deshastha</option><option value="Hindu:Brahmin - Dhiman">Hindu:Brahmin - Dhiman</option><option value="Hindu:Brahmin - Garhwali">Hindu:Brahmin - Garhwali</option><option value="Hindu:Brahmin - Goswami">Hindu:Brahmin - Goswami</option><option value="Hindu:Brahmin - Gour">Hindu:Brahmin - Gour</option><option value="Hindu:Brahmin - Gowd Saraswat">Hindu:Brahmin - Gowd Saraswat</option><option value="Hindu:Brahmin - Gurukkal">Hindu:Brahmin - Gurukkal</option><option value="Hindu:Brahmin - Havyaka">Hindu:Brahmin - Havyaka</option><option value="Hindu:Brahmin - Iyer">Hindu:Brahmin - Iyer</option><option value="Hindu:Brahmin - Kannada Madhva">Hindu:Brahmin - Kannada Madhva</option><option value="Hindu:Brahmin - Kanyakubja">Hindu:Brahmin - Kanyakubja</option><option value="Hindu:Brahmin - Karhade">Hindu:Brahmin - Karhade</option><option value="Hindu:Brahmin - Kashmiri Pandit">Hindu:Brahmin - Kashmiri Pandit</option><option value="Hindu:Brahmin - Kokanastha">Hindu:Brahmin - Kokanastha</option><option value="Hindu:Brahmin - Kumaoni">Hindu:Brahmin - Kumaoni</option><option value="Hindu:Brahmin - Maharashtrian">Hindu:Brahmin - Maharashtrian</option><option value="Hindu:Brahmin - Maithili">Hindu:Brahmin - Maithili</option><option value="Hindu:Brahmin - Nagar">Hindu:Brahmin - Nagar</option><option value="Hindu:Brahmin - Niyogi Nandavariki">Hindu:Brahmin - Niyogi Nandavariki</option><option value="Hindu:Brahmin - Punjabi">Hindu:Brahmin - Punjabi</option><option value="Hindu:Brahmin - Sanadya">Hindu:Brahmin - Sanadya</option><option value="Hindu:Brahmin - Saraswat">Hindu:Brahmin - Saraswat</option><option value="Hindu:Brahmin - Saryuparin">Hindu:Brahmin - Saryuparin</option><option value="Hindu:Brahmin - Smartha">Hindu:Brahmin - Smartha</option><option value="Hindu:Brahmin - Telugu">Hindu:Brahmin - Telugu</option><option value="Hindu:Brahmin - Tyagi">Hindu:Brahmin - Tyagi</option><option value="Hindu:Brahmin - Vaidiki">Hindu:Brahmin - Vaidiki</option><option value="Hindu:Brahmin - Viswa">Hindu:Brahmin - Viswa</option><option value="Hindu:Bunt">Hindu:Bunt</option><option value="Hindu:CKP">Hindu:CKP</option><option value="Hindu:Chambhar">Hindu:Chambhar</option><option value="Hindu:Chaurasia">Hindu:Chaurasia</option><option value="Hindu:Chettiar">Hindu:Chettiar</option><option value="Hindu:Chhetri">Hindu:Chhetri</option><option value="Hindu:Coorgi">Hindu:Coorgi</option><option value="Hindu:Devanga">Hindu:Devanga</option><option value="Hindu:Devendra Kula Vellalar">Hindu:Devendra Kula Vellalar</option><option value="Hindu:Dhangar">Hindu:Dhangar</option><option value="Hindu:Dheevara">Hindu:Dheevara</option><option value="Hindu:Dhobi">Hindu:Dhobi</option><option value="Hindu:Digambar">Hindu:Digambar</option><option value="Hindu:Ediga">Hindu:Ediga</option><option value="Hindu:Ezhava">Hindu:Ezhava</option><option value="Hindu:Ezhuthachan">Hindu:Ezhuthachan</option><option value="Hindu:Gandla">Hindu:Gandla</option><option value="Hindu:Ganiga">Hindu:Ganiga</option><option value="Hindu:Garhwali">Hindu:Garhwali</option><option value="Hindu:Gavara">Hindu:Gavara</option><option value="Hindu:Ghumar">Hindu:Ghumar</option><option value="Hindu:Goswami">Hindu:Goswami</option><option value="Hindu:Goud">Hindu:Goud</option><option value="Hindu:Gounder">Hindu:Gounder</option><option value="Hindu:Gowda">Hindu:Gowda</option><option value="Hindu:Gujarati">Hindu:Gujarati</option><option value="Hindu:Gupta">Hindu:Gupta</option><option value="Hindu:Gurjar">Hindu:Gurjar</option><option value="Hindu:Iyengar">Hindu:Iyengar</option><option value="Hindu:Iyer">Hindu:Iyer</option><option value="Hindu:Jaiswal">Hindu:Jaiswal</option><option value="Hindu:Jat">Hindu:Jat</option><option value="Hindu:Kaibarta">Hindu:Kaibarta</option><option value="Hindu:Kalar">Hindu:Kalar</option><option value="Hindu:Kalinga Vysya">Hindu:Kalinga Vysya</option><option value="Hindu:Kamboj">Hindu:Kamboj</option><option value="Hindu:Kamma">Hindu:Kamma</option><option value="Hindu:Kannada Mogaveera">Hindu:Kannada Mogaveera</option><option value="Hindu:Kapu">Hindu:Kapu</option><option value="Hindu:Kapu Naidu">Hindu:Kapu Naidu</option><option value="Hindu:Karana">Hindu:Karana</option><option value="Hindu:Karuneekar">Hindu:Karuneekar</option><option value="Hindu:Kashyap">Hindu:Kashyap</option><option value="Hindu:Kayastha">Hindu:Kayastha</option><option value="Hindu:Khandayat">Hindu:Khandayat</option><option value="Hindu:Khandelwal">Hindu:Khandelwal</option><option value="Hindu:Khatri">Hindu:Khatri</option><option value="Hindu:Koli">Hindu:Koli</option><option value="Hindu:Kongu Vellala Gounder">Hindu:Kongu Vellala Gounder</option><option value="Hindu:Kori">Hindu:Kori</option><option value="Hindu:Koshti">Hindu:Koshti</option><option value="Hindu:Kshatriya">Hindu:Kshatriya</option><option value="Hindu:Kshatriya - Agnikula">Hindu:Kshatriya - Agnikula</option><option value="Hindu:Kshatriya - Bhavasar">Hindu:Kshatriya - Bhavasar</option><option value="Hindu:Kudumbi">Hindu:Kudumbi</option><option value="Hindu:Kulalar">Hindu:Kulalar</option><option value="Hindu:Kumawat">Hindu:Kumawat</option><option value="Hindu:Kumbara">Hindu:Kumbara</option><option value="Hindu:Kumbhakar">Hindu:Kumbhakar</option><option value="Hindu:Kumbhar">Hindu:Kumbhar</option><option value="Hindu:Kumhar">Hindu:Kumhar</option><option value="Hindu:Kummari">Hindu:Kummari</option><option value="Hindu:Kunbi">Hindu:Kunbi</option><option value="Hindu:Kurmi">Hindu:Kurmi</option><option value="Hindu:Kuruba">Hindu:Kuruba</option><option value="Hindu:Kurumbar">Hindu:Kurumbar</option><option value="Hindu:Kushwaha">Hindu:Kushwaha</option><option value="Hindu:Lambani">Hindu:Lambani</option><option value="Hindu:Leva Patil">Hindu:Leva Patil</option><option value="Hindu:Lingayat">Hindu:Lingayat</option><option value="Hindu:Lohana">Hindu:Lohana</option><option value="Hindu:Lubana">Hindu:Lubana</option><option value="Hindu:Madiga">Hindu:Madiga</option><option value="Hindu:Maharashtrian">Hindu:Maharashtrian</option><option value="Hindu:Maheshwari">Hindu:Maheshwari</option><option value="Hindu:Mahishya">Hindu:Mahishya</option><option value="Hindu:Malayalee Namboodiri">Hindu:Malayalee Namboodiri</option><option value="Hindu:Malayalee Variar">Hindu:Malayalee Variar</option><option value="Hindu:Mali">Hindu:Mali</option><option value="Hindu:Malla">Hindu:Malla</option><option value="Hindu:Mannuru Kapu">Hindu:Mannuru Kapu</option><option value="Hindu:Maratha">Hindu:Maratha</option><option value="Hindu:Maratha - Gomantak">Hindu:Maratha - Gomantak</option><option value="Hindu:Maruthuvar">Hindu:Maruthuvar</option><option value="Hindu:Marvar">Hindu:Marvar</option><option value="Hindu:Marwari">Hindu:Marwari</option><option value="Hindu:Maurya">Hindu:Maurya</option><option value="Hindu:Meenavar">Hindu:Meenavar</option><option value="Hindu:Menon">Hindu:Menon</option><option value="Hindu:Meru Darji">Hindu:Meru Darji</option><option value="Hindu:Mogaveera">Hindu:Mogaveera</option><option value="Hindu:Mudaliar">Hindu:Mudaliar</option><option value="Hindu:Mudaliar - Arcot">Hindu:Mudaliar - Arcot</option><option value="Hindu:Mudaliar - Saiva">Hindu:Mudaliar - Saiva</option><option value="Hindu:Mudaliar - Senguntha">Hindu:Mudaliar - Senguntha</option><option value="Hindu:Mudiraj">Hindu:Mudiraj</option><option value="Hindu:Mukulathur">Hindu:Mukulathur</option><option value="Hindu:Muthuraja">Hindu:Muthuraja</option><option value="Hindu:Nadar">Hindu:Nadar</option><option value="Hindu:Naicker">Hindu:Naicker</option><option value="Hindu:Naidu">Hindu:Naidu</option><option value="Hindu:Naidu - Balija">Hindu:Naidu - Balija</option><option value="Hindu:Nair">Hindu:Nair</option><option value="Hindu:Nair - Vilakkithala">Hindu:Nair - Vilakkithala</option><option value="Hindu:Nair - Vaniya">Hindu:Nair - Vaniya</option><option value="Hindu:Nair - Velethadathu">Hindu:Nair - Velethadathu</option><option value="Hindu:Namasudra">Hindu:Namasudra</option><option value="Hindu:Nambiar">Hindu:Nambiar</option><option value="Hindu:Napit">Hindu:Napit</option><option value="Hindu:Nayak">Hindu:Nayak</option><option value="Hindu:Nepali">Hindu:Nepali</option><option value="Hindu:OBC (Barber-Naayee)">Hindu:OBC (Barber-Naayee)</option><option value="Hindu:Oswal">Hindu:Oswal</option><option value="Hindu:Padmashali">Hindu:Padmashali</option><option value="Hindu:Parit">Hindu:Parit</option><option value="Hindu:Parkava Kulam">Hindu:Parkava Kulam</option><option value="Hindu:Patel - Dodia">Hindu:Patel - Dodia</option><option value="Hindu:Patel - Desai">Hindu:Patel - Desai</option><option value="Hindu:Patel - Kadva">Hindu:Patel - Kadva</option><option value="Hindu:Patel - Leva">Hindu:Patel - Leva</option><option value="Hindu:Perika">Hindu:Perika</option><option value="Hindu:Pillai">Hindu:Pillai</option><option value="Hindu:Prajapati">Hindu:Prajapati</option><option value="Hindu:Punjabi">Hindu:Punjabi</option><option value="Hindu:Rajaka">Hindu:Rajaka</option><option value="Hindu:Rajput">Hindu:Rajput</option><option value="Hindu:Rajput - Garhwali">Hindu:Rajput - Garhwali</option><option value="Hindu:Rajput - Kumaoni">Hindu:Rajput - Kumaoni</option><option value="Hindu:Ramdasia">Hindu:Ramdasia</option><option value="Hindu:Ramgharia">Hindu:Ramgharia</option><option value="Hindu:Ravidasia">Hindu:Ravidasia</option><option value="Hindu:Reddy">Hindu:Reddy</option><option value="Hindu:Sadgop">Hindu:Sadgop</option><option value="Hindu:Sahu">Hindu:Sahu</option><option value="Hindu:Saini">Hindu:Saini</option><option value="Hindu:Saliya">Hindu:Saliya</option><option value="Hindu:Scheduled Caste">Hindu:Scheduled Caste</option><option value="Hindu:Scheduled Tribe">Hindu:Scheduled Tribe</option><option value="Hindu:Senai Thalaivar">Hindu:Senai Thalaivar</option><option value="Hindu:Sepahia">Hindu:Sepahia</option><option value="Hindu:Setti Balija">Hindu:Setti Balija</option><option value="Hindu:Shimpi">Hindu:Shimpi</option><option value="Hindu:Sindhi">Hindu:Sindhi</option><option value="Hindu:Somvanshi">Hindu:Somvanshi</option><option value="Hindu:Sonar">Hindu:Sonar</option><option value="Hindu:Sowrashtra">Hindu:Sowrashtra</option><option value="Hindu:Sozhiya Vellalar">Hindu:Sozhiya Vellalar</option><option value="Hindu:Sutar">Hindu:Sutar</option><option value="Hindu:Swarnakar">Hindu:Swarnakar</option><option value="Hindu:Tamil Yadava">Hindu:Tamil Yadava</option><option value="Hindu:Telaga">Hindu:Telaga</option><option value="Hindu:Teli">Hindu:Teli</option><option value="Hindu:Telugu">Hindu:Telugu</option><option value="Hindu:Thevar">Hindu:Thevar</option><option value="Hindu:Thigala">Hindu:Thigala</option><option value="Hindu:Thiyya">Hindu:Thiyya</option><option value="Hindu:Udayar">Hindu:Udayar</option><option value="Hindu:Uppara">Hindu:Uppara</option><option value="Hindu:Vadagalai">Hindu:Vadagalai</option><option value="Hindu:Vaddera">Hindu:Vaddera</option><option value="Hindu:Vaish">Hindu:Vaish</option><option value="Hindu:Vaish - Dhaneshawat">Hindu:Vaish - Dhaneshawat</option><option value="Hindu:Vaishnav">Hindu:Vaishnav</option><option value="Hindu:Vaishnav - Bhatia">Hindu:Vaishnav - Bhatia</option><option value="Hindu:Vaishnav - Vania">Hindu:Vaishnav - Vania</option><option value="Hindu:Vaishya">Hindu:Vaishya</option><option value="Hindu:Valmiki">Hindu:Valmiki</option><option value="Hindu:Vanjara">Hindu:Vanjara</option><option value="Hindu:Vannar">Hindu:Vannar</option><option value="Hindu:Vanniyakullak Kshatriya">Hindu:Vanniyakullak Kshatriya</option><option value="Hindu:Vanniyar">Hindu:Vanniyar</option><option value="Hindu:Varshney">Hindu:Varshney</option><option value="Hindu:Veera Saivam">Hindu:Veera Saivam</option><option value="Hindu:Veerashaiva">Hindu:Veerashaiva</option><option value="Hindu:Vellalar">Hindu:Vellalar</option><option value="Hindu:Vellama">Hindu:Vellama</option><option value="Hindu:Vishwakarma">Hindu:Vishwakarma</option><option value="Hindu:Vokaliga">Hindu:Vokaliga</option><option value="Hindu:Vysya">Hindu:Vysya</option><option value="Hindu:Yadav">Hindu:Yadav</option>';
				}
				else if($row['ReligionID'] == 25)
				{
					$caste = '<option value="">---------Select Caste---------</option><option value="Doesn\'t Matter">Doesn\'t Matter</option>';
				}
				else if($row['ReligionID'] == 26 || $row['ReligionID'] == 27 || $row['ReligionID'] == 28 || $row['ReligionID'] == 29 || $row['ReligionID'] == 30)
				{
								$caste = '<option value="">---------Select Caste---------</option><option value="Doesn\'t Matter">Doesn\'t Matter</option>
<option value="Sikh:Clean Shaven">Sikh:Clean Shaven</option><option value="Sikh:Gursikh">Sikh:Gursikh</option><option value="Sikh:Jat">Sikh:Jat</option><option value="Sikh:Kamboj">Sikh:Kamboj</option><option value="Sikh:Kesadhari">Sikh:Kesadhari</option><option value="Sikh:Khatri">Sikh:Khatri</option><option value="Sikh:Kshatriya">Sikh:Kshatriya</option><option value="Sikh:Labana">Sikh:Labana</option><option value="Sikh:Ramdasia">Sikh:Ramdasia</option><option value="Sikh:Ramgharia">Sikh:Ramgharia</option><option value="Sikh:Ravidasia">Sikh:Ravidasia</option><option value="Sikh:Saini">Sikh:Saini</option>';
				}
				else if($row['ReligionID'] == 31 || $row['ReligionID'] == 32 || $row['ReligionID'] == 33 || $row['ReligionID'] == 34)
				{
								$caste = '<option value="">---------Select Caste---------</option><option value="Doesn\'t Matter">Doesn\'t Matter</option>
<option value="Jain:Digambar">Jain:Digambar</option><option value="Jain:Shwetamber">Jain:Shwetamber</option><option value="Jain:Vania">Jain:Vania</option>';
				}
				else if($row['ReligionID'] == 35 || $row['ReligionID'] == 36 || $row['ReligionID'] == 37 || $row['ReligionID'] == 38 || $row['ReligionID'] == 39)
				{
					$caste = '<option value="">---------Select Caste---------</option><option value="Doesn\'t Matter">Doesn\'t Matter</option>';
				}
				$caste = str_replace('<option value="'.$row['Caste'].'">', '<option value="'.$row['Caste'].'" selected>', $caste);
				echo $caste;
				?>
</select>
</span>
<br>
				<span id="errmsg_caste" class="error"></span>
				</td>
				<td valign="top"><span id="loading_caste"></span></td>
			</tr>

			<tr>
				<td class="td1" valign="top"><em>&nbsp;</em><label for="subcaste" style="padding-left: 3px;"><b>Sub caste / sect</b></label></td>
				<td valign="top">
				<input name="subcaste" id="subcaste" class="field" value="" onkeydown="this.className='field_filled'" onblur="checkStyle(this, 'field', 'field_filled');" type="text">
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('familyvalues');" valign="top"><em>*</em><b>Family Values</b></td>
				<td class="td2 smallblack" valign="top"><select name="familyvalues" id="familyvalues" class="field" onfocus="toggleHint('show', 'familyvalues')" onblur="validate_select_box(this, 'field_filled', 'field_err');"><option value="">Select</option><option value="Traditional">Traditional</option><option value="Moderate">Moderate</option><option value="Liberal">Liberal</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_familyvalues">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select family values of the <br>person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_familyvalues" class="error"></span>
				</td>
			</tr>
			</tbody></table>

			<noscript>
				<style type="text/css">
				<!-- #show_hide_caste	{display: none;} -->
				</style>
			</noscript>
			<!-- RELIGIOUS & SOCIAL BACKGROUND EN -->

<br>

			<!-- EDUCATION & CAREER ST -->
			<a name="education"></a>
			<div class="boldgreen" style="color:#990000; "><b>Education &amp; Career</b></div>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('educationlevel');" valign="top" width="139"><em>*</em><b>Education</b></td>
				<td class="td2 smallblack" valign="top">
				<select name="educationlevel" id="educationlevel" class="field" onfocus="toggleHint('show', 'educationlevel')" onblur="validate_educationlevel(this.name);"><option value="" selected="selected">Select</option><option value="Bachelors">Bachelors</option><option value="Masters">Masters</option><option value="Doctorate">Doctorate</option><option value="Diploma">Diploma</option><option value="Undergraduate">Undergraduate</option><option value="Associates degree">Associates degree</option><option value="Honours degree">Honours degree</option><option value="Trade school">Trade school</option><option value="High school">High school</option><option value="Less than high school">Less than high school</option><option value="Bachelors">Graduate</option></select>&nbsp; in &nbsp;
				<select name="educationarea" class="field" onfocus="toggleHint('show', 'educationarea')" onblur="toggleHint('hide', 'educationarea'); checkStyleSelect(this, 'field', 'field_filled');" style="width: 159px;"><option value="" selected="selected">Select</option><option value="Advertising/ Marketing">Advertising/ Marketing</option><option value="Administrative services">Administrative services</option><option value="Architecture">Architecture</option><option value="Armed Forces">Armed Forces</option><option value="Arts">Arts</option><option value="Commerce">Commerce</option><option value="Computers/ IT">Computers/ IT</option><option value="Education">Education</option><option value="Engineering/ Technology">Engineering/ Technology</option><option value="Fashion">Fashion</option><option value="Finance">Finance</option><option value="Fine Arts">Fine Arts</option><option value="Home Science">Home Science</option><option value="Law">Law</option><option value="Management">Management</option><option value="Medicine">Medicine</option><option value="Nursing/ Health Sciences">Nursing/ Health Sciences</option><option value="Office administration">Office administration</option><option value="Science">Science</option><option value="Shipping">Shipping</option><option value="Travel &amp; Tourism">Travel &amp; Tourism</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint_educationlevel" id="hint_educationlevel">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select educational level of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->

		<!-- HINT STARTS HERE -->
		<span class="hint_educationlevel" id="hint_educationarea">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select educational area of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_educationlevel" class="error"></span><span id="errmsg_educationarea" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('occupation');" valign="top"><em>*</em><b>Profession</b></td>
				<td valign="top">
				<select name="occupation" id="occupation" class="field" onfocus="toggleHint('show', 'occupation')" onblur="validate_occupation(this.name);"><option selected="selected" value="">Select</option><option value="Not working">Not working</option><option value="Non-mainstream professional">Non-mainstream professional</option><option value="Accountant">Accountant</option><option value="Acting Professional">Acting Professional</option><option value="Actor">Actor</option><option value="Administration Professional">Administration Professional</option><option value="Advertising Professional">Advertising Professional</option><option value="Air Hostess">Air Hostess</option><option value="Architect">Architect</option><option value="Artisan">Artisan</option><option value="Audiologist">Audiologist</option><option value="Banker">Banker</option><option value="Beautician">Beautician</option><option value="Biologist / Botanist">Biologist / Botanist</option><option value="Business Person">Business Person</option><option value="Chartered Accountant">Chartered Accountant</option><option value="Civil Engineer">Civil Engineer</option><option value="Clerical Official">Clerical Official</option><option value="Commercial Pilot">Commercial Pilot</option><option value="Company Secretary">Company Secretary</option><option value="Computer Professional">Computer Professional</option><option value="Consultant">Consultant</option><option value="Contractor">Contractor</option><option value="Cost Accountant">Cost Accountant</option><option value="Creative Person">Creative Person</option><option value="Customer Support Professional">Customer Support Professional</option><option value="Defense Employee">Defense Employee</option><option value="Dentist">Dentist</option><option value="Designer">Designer</option><option value="Doctor">Doctor</option><option value="Economist">Economist</option><option value="Engineer">Engineer</option><option value="Engineer (Mechanical)">Engineer (Mechanical)</option><option value="Engineer (Project)">Engineer (Project)</option><option value="Entertainment Professional">Entertainment Professional</option><option value="Event Manager">Event Manager</option><option value="Executive">Executive</option><option value="Factory worker">Factory worker</option><option value="Farmer">Farmer</option><option value="Fashion Designer">Fashion Designer</option><option value="Finance Professional">Finance Professional</option><option value="Flight Attendant">Flight Attendant</option><option value="Government Employee">Government Employee</option><option value="Health Care Professional">Health Care Professional</option><option value="Home Maker">Home Maker</option><option value="Hotel &amp; Restaurant Professional">Hotel &amp; Restaurant Professional</option><option value="Human Resources Professional">Human Resources Professional</option><option value="Interior Designer">Interior Designer</option><option value="Investment Professional">Investment Professional</option><option value="IT / Telecom Professional">IT / Telecom Professional</option><option value="Journalist">Journalist</option><option value="Lawyer">Lawyer</option><option value="Lecturer">Lecturer</option><option value="Legal Professional">Legal Professional</option><option value="Manager">Manager</option><option value="Marketing Professional">Marketing Professional</option><option value="Media Professional">Media Professional</option><option value="Medical Professional">Medical Professional</option><option value="Medical Transcriptionist">Medical Transcriptionist</option><option value="Merchant Naval Officer">Merchant Naval Officer</option><option value="Nurse">Nurse</option><option value="Occupational Therapist">Occupational Therapist</option><option value="Optician">Optician</option><option value="Pharmacist">Pharmacist</option><option value="Physician Assistant">Physician Assistant</option><option value="Physicist">Physicist</option><option value="Physiotherapist">Physiotherapist</option><option value="Pilot">Pilot</option><option value="Politician">Politician</option><option value="Production professional">Production professional</option><option value="Professor">Professor</option><option value="Psychologist">Psychologist</option><option value="Public Relations Professional">Public Relations Professional</option><option value="Real Estate Professional">Real Estate Professional</option><option value="Research Scholar">Research Scholar</option><option value="Retired Person">Retired Person</option><option value="Retail Professional">Retail Professional</option><option value="Sales Professional">Sales Professional</option><option value="Scientist">Scientist</option><option value="Self-employed Person">Self-employed Person</option><option value="Social Worker">Social Worker</option><option value="Software Consultant">Software Consultant</option><option value="Sportsman">Sportsman</option><option value="Student">Student</option><option value="Teacher">Teacher</option><option value="Technician">Technician</option><option value="Training Professional">Training Professional</option><option value="Transportation Professional">Transportation Professional</option><option value="Veterinary Doctor">Veterinary Doctor</option><option value="Volunteer">Volunteer</option><option value="Writer">Writer</option><option value="Zoologist">Zoologist</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_occupation">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select profession of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_occupation" class="error"></span>
				</td>
			</tr>

			</tbody></table>
			<!-- EDUCATION & CAREER EN -->

<br>

			<!-- LIFESTYLE ST -->
			<a name="lifestyle"></a>
			<div class="boldgreen" style="color:#990000; "><b>Lifestyle</b></div>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('diet');" valign="top" width="139"><em>*</em><b>Diet</b></td>
				<td class="td2 smallblack" valign="top"><select name="diet" id="diet" class="field" onfocus="toggleHint('show', 'diet')" onblur="validate_select_box(this, 'field_filled', 'field_err');"><option value="">Select</option><option value="Veg">Veg</option><option value="Eggetarian">Eggetarian</option><option value="Occasionally Non-Veg">Occasionally Non-Veg</option><option value="Non-Veg">Non-Veg</option><option value="Jain">Jain</option><option value="Vegan">Vegan</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_diet">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select dietary habits of the <br>person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_diet" class="error"></span>
				</td>
			</tr>
			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('smoke');" valign="top"><em>*</em><b>Smoke</b></td>
				<td class="smallblack" valign="top"><select name="smoke" id="smoke" class="field" onfocus="toggleHint('show', 'smoke')" onblur="validate_select_box(this, 'field_filled', 'field_err');"><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option><option value="Occasionally">Occasionally</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_smoke">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select smoking habits of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_smoke" class="error"></span>
				</td>
			</tr>
			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('drink');" valign="top"><em>*</em><b>Drink</b></td>
				<td class="smallblack" valign="top"><select name="drink" id="drink" class="field" onfocus="toggleHint('show', 'drink')" onblur="validate_select_box(this, 'field_filled', 'field_err');"><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option><option value="Occasionally">Occasionally</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_drink">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select drinking habits of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_drink" class="error"></span>
				</td>
			</tr>
			</tbody></table>
			<!-- LIFESTYLE EN -->

<br>

			<!-- LOCATION ST -->
			<a name="location"></a>


			<div class="boldgreen" style="color:#990000; "><b>Location</b></div>

	<spacer type="block" height="1">

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">

				<tbody><tr valign="top">
					<td class="td1" valign="top" width="139"><em>&nbsp;</em><b>Country of Residence</b></td>
					<td colspan="2" class="td2 smallblack" style="line-height: 16px;" valign="top"><?PHP echo $row['Country']?><br>
					<span class="smallgrey">You can change this information later</span></td>
				</tr>

					<tr height="33">
						<td class="td1" style="cursor: pointer;" onclick="focus_field('stateofresidence');" valign="top"><em>*</em><b>State of Residence</b></td>
						<td colspan="2" class="formselect" id="show_hide_state" valign="top">
						<select name="stateofresidence" id="stateofresidence" class="field" onfocus="toggleHint('show', 'stateofresidence')" onblur="validate_stateofresidence(this.name);">
						<option value="">Select state</option>
						<?PHP
				$sqlCountry = "SELECT * FROM states where CountryID=".$row['CountryID']." order by StateID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['StateID']?>"
						><?PHP echo $rowCountry['State']?></option>
						<?
					}
				}
				?>
						<option value="-">Other</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_stateofresidence">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select state of current residence of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
					<span id="errmsg_stateofresidence" class="error"></span>
						</td>
						</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('nearest_city');" valign="top"><b>&nbsp;&nbsp;&nbsp;City of Residence</b></td>
				<td class="td1" id="show_hide_city" valign="top" width="200">
					<select id="nearest_city" name="nearest_city" class="field" onfocus="toggleHint('show', 'nearest_city')" onblur="toggleHint('hide', 'nearest_city'); checkStyleSelect(this, 'field', 'field_filled');"><option value="">Select a city</option>
					<?PHP
				$sqlCountry = "SELECT * FROM cities where CountryID=".$row['CountryID']." order by CityID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['CityID']?>"
						><?PHP echo $rowCountry['City']?></option>
						<?
					}
				}
				?>
					<option value="-">Other</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_nearest_city">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select city of residence of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
						</td>
					<td style="padding-top: 10px;" align="left" valign="top" width="250"><div id="loading_city"></div></td>

			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('residencystatus');" valign="top"><em>*</em><b>Residency Status</b></td>
				<td colspan="2" class="smallblack" valign="top"><select name="residencystatus" id="residencystatus" class="field" onfocus="toggleHint('show', 'residencystatus')" onblur="validate_select_box(this, 'field_filled', 'field_err');"><option value="">Select</option><option value="Citizen">Citizen</option><option value="Permanent Resident">Permanent Resident</option><option value="Student Visa">Student Visa</option><option value="Student Visa">Student Visa</option><option value="Temporary Visa">Temporary Visa</option><option value="Work Permit">Work Permit</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_residencystatus">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select residency status of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_residencystatus" class="error"></span>
				</td>
			</tr>
			</tbody></table>
			<!-- LOCATION EN -->

			<br>

			<!-- CONTACT DETAILS ST -->

			<a name="contact"></a>
			<div class="boldgreen" style="color:#990000; "><b>Contact Details</b></div>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr valign="top">
				<td valign="top">


			<table class="tbl1" border="0" cellpadding="3" cellspacing="0">
			<tbody><tr valign="top">
				<td class="td1" valign="top" width="139"><em>*</em><b><label for="no_type1">Contact Number</label></b></td>
				<td valign="top">

				<span class="smallblack" style="line-height: 14px; text-align: left;">Enter your Telephone or Mobile number and select display option</span><br><br style="line-height: 5px;">
									<table class="nopading" border="0" cellpadding="3" cellspacing="0">
					<tbody><tr>
						<td class="input" align="left" valign="top">
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_type">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select type of phone number of the person who will handle your matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<input name="type" id="no_type1" value="telephone" onclick="disable_field('profile', 'std_code', 'telephone');document.getElementById('errmsg_type').innerHTML=''" onfocus="toggleHint('show', this.name)" onblur="validate_type();contact_number_radio(this)" type="radio">

						<label id="lbl_telephone" for="no_type1" class="smallgrey swidthtext"><b>Telephone</b></label>
						&nbsp;&nbsp;
						<input name="type" id="no_type2" value="mobile" onclick="disable_field('profile', 'std_code', 'mobile');document.getElementById('errmsg_std_code').innerHTML='';document.getElementById('errmsg_type').innerHTML=''; document.forms['profile'].std_code.className='field_filled';" onfocus="toggleHint('show', this.name)" onblur="validate_type();contact_number_radio(this)" type="radio">

						<label id="lbl_mobile" for="no_type2" class="smallgrey swidthtext"><b>Mobile</b></label><br><span id="errmsg_type" class="error"></span></td>
					</tr>
					</tbody></table>
<br style="line-height: 7px;">
					<table border="0" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td valign="top" width="250">
						<select name="country_code" class="field" onchange="changecountrycode(this.value,document.getElementById('c_country_code'));" onfocus="toggleHint('show', 'country_code')" onblur="validate_country_select_box(this, 'field_filled', 'field_err');"><option value="">Select</option><option value="+91|India">India</option><option value="+1|USA">USA</option><option value="+44|United Kingdom">United Kingdom</option><option value="+971|United Arab Emirates">United Arab Emirates</option><option value="+1|Canada">Canada</option><option value="+61|Australia">Australia</option><option value="+92|Pakistan">Pakistan</option><option value="+966|Saudi Arabia">Saudi Arabia</option><option value="+965|Kuwait">Kuwait</option><option value="+27|South Africa">South Africa</option><optgroup value="">&nbsp;</optgroup><option value="+93|Afghanistan">Afghanistan</option><option value="+355|Albania">Albania</option><option value="+213|Algeria">Algeria</option><option value="+684|American Samoa">American Samoa</option><option value="+376|Andorra">Andorra</option><option value="+244|Angola">Angola</option><option value="+1|Anguilla">Anguilla</option><option value="+1|Antigua &amp; Barbuda">Antigua &amp; Barbuda</option><option value="+54|Argentina">Argentina</option><option value="+374|Armenia">Armenia</option><option value="+61|Australia">Australia</option><option value="+43|Austria">Austria</option><option value="+994|Azerbaijan">Azerbaijan</option><option value="+1|Bahamas">Bahamas</option><option value="+973|Bahrain">Bahrain</option><option value="+880|Bangladesh">Bangladesh</option><option value="+1|Barbados">Barbados</option><option value="+375|Belarus">Belarus</option><option value="+32|Belgium">Belgium</option><option value="+501|Belize">Belize</option><option value="+1|Bermuda">Bermuda</option><option value="+975|Bhutan">Bhutan</option><option value="+591|Bolivia">Bolivia</option><option value="+387|Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="+267|Botswana">Botswana</option><option value="+55|Brazil">Brazil</option><option value="+1|Virgin Islands (British)">Virgin Islands (British)</option><option value="+673|Brunei">Brunei</option><option value="+359|Bulgaria">Bulgaria</option><option value="+226|Burkina Faso">Burkina Faso</option><option value="+257|Burundi">Burundi</option><option value="+225|Cote d'Ivoire">Cote d'Ivoire</option><option value="+855|Cambodia">Cambodia</option><option value="+237|Cameroon">Cameroon</option><option value="+1|Canada">Canada</option><option value="+238|Cape Verde">Cape Verde</option><option value="+1|Cayman Islands">Cayman Islands</option><option value="+236|Central African Republic">Central African Republic</option><option value="+235|Chad">Chad</option><option value="+56|Chile">Chile</option><option value="+86|China">China</option><option value="+57|Colombia">Colombia</option><option value="+269|Comoros">Comoros</option><option value="+242|Congo">Congo</option><option value="+682|Cook Islands">Cook Islands</option><option value="+506|Costa Rica">Costa Rica</option><option value="+385|Croatia (Hrvatska)">Croatia (Hrvatska)</option><option value="+53|Cuba">Cuba</option><option value="+357|Cyprus">Cyprus</option><option value="+420|Czech Republic">Czech Republic</option><option value="+850|North Korea">North Korea</option><option value="+243|Congo (DRC)">Congo (DRC)</option><option value="+45|Denmark">Denmark</option><option value="+253|Djibouti">Djibouti</option><option value="+1|Dominica">Dominica</option><option value="+1|Dominican Republic">Dominican Republic</option><option value="+670|East Timor">East Timor</option><option value="+593|Ecuador">Ecuador</option><option value="+20|Egypt">Egypt</option><option value="+503|El Salvador">El Salvador</option><option value="+240|Equatorial Guinea">Equatorial Guinea</option><option value="+291|Eritrea">Eritrea</option><option value="+372|Estonia">Estonia</option><option value="+251|Ethiopia">Ethiopia</option><option value="+500|Falkland Islands">Falkland Islands</option><option value="+298|Faroe Islands">Faroe Islands</option><option value="+679|Fiji Islands">Fiji Islands</option><option value="+358|Finland">Finland</option><option value="+33|France">France</option><option value="+594|French Guiana">French Guiana</option><option value="+689|French Polynesia">French Polynesia</option><option value="+241|Gabon">Gabon</option><option value="+220|Gambia">Gambia</option><option value="+995|Georgia">Georgia</option><option value="+49|Germany">Germany</option><option value="+233|Ghana">Ghana</option><option value="+350|Gibraltar">Gibraltar</option><option value="+30|Greece">Greece</option><option value="+299|Greenland">Greenland</option><option value="+1|Grenada">Grenada</option><option value="+590|Guadeloupe">Guadeloupe</option><option value="+1|Guam">Guam</option><option value="+502|Guatemala">Guatemala</option><option value="+224|Guinea">Guinea</option><option value="+245|Guinea-Bissau">Guinea-Bissau</option><option value="+592|Guyana">Guyana</option><option value="+509|Haiti">Haiti</option><option value="+504|Honduras">Honduras</option><option value="+852|Hong Kong SAR">Hong Kong SAR</option><option value="+36|Hungary">Hungary</option><option value="+354|Iceland">Iceland</option><option value="+91|India">India</option><option value="+62|Indonesia">Indonesia</option><option value="+98|Iran">Iran</option><option value="+964|Iraq">Iraq</option><option value="+353|Ireland">Ireland</option><option value="+972|Israel">Israel</option><option value="+39|Italy">Italy</option><option value="+1|Jamaica">Jamaica</option><option value="+81|Japan">Japan</option><option value="+962|Jordan">Jordan</option><option value="+7|Kazakhstan">Kazakhstan</option><option value="+254|Kenya">Kenya</option><option value="+686|Kiribati">Kiribati</option><option value="+82|Korea">Korea</option><option value="+965|Kuwait">Kuwait</option><option value="+996|Kyrgyzstan">Kyrgyzstan</option><option value="+856|Laos">Laos</option><option value="+371|Latvia">Latvia</option><option value="+961|Lebanon">Lebanon</option><option value="+266|Lesotho">Lesotho</option><option value="+231|Liberia">Liberia</option><option value="+218|Libya">Libya</option><option value="+423|Liechtenstein">Liechtenstein</option><option value="+370|Lithuania">Lithuania</option><option value="+352|Luxembourg">Luxembourg</option><option value="+853|Macao SAR">Macao SAR</option><option value="+261|Madagascar">Madagascar</option><option value="+265|Malawi">Malawi</option><option value="+60|Malaysia">Malaysia</option><option value="+960|Maldives">Maldives</option><option value="+223|Mali">Mali</option><option value="+356|Malta">Malta</option><option value="+596|Martinique">Martinique</option><option value="+222|Mauritania">Mauritania</option><option value="+230|Mauritius">Mauritius</option><option value="+269|Mayotte">Mayotte</option><option value="+52|Mexico">Mexico</option><option value="+691|Micronesia">Micronesia</option><option value="+373|Moldova">Moldova</option><option value="+377|Monaco">Monaco</option><option value="+976|Mongolia">Mongolia</option><option value="+1|Montserrat">Montserrat</option><option value="+212|Morocco">Morocco</option><option value="+258|Mozambique">Mozambique</option><option value="+95|Myanmar">Myanmar</option><option value="+264|Namibia">Namibia</option><option value="+674|Nauru">Nauru</option><option value="+977|Nepal">Nepal</option><option value="+31|Netherlands">Netherlands</option><option value="+599|Netherlands Antilles">Netherlands Antilles</option><option value="+687|New Caledonia">New Caledonia</option><option value="+64|New Zealand">New Zealand</option><option value="+505|Nicaragua">Nicaragua</option><option value="+227|Niger">Niger</option><option value="+234|Nigeria">Nigeria</option><option value="+683|Niue">Niue</option><option value="+672|Norfolk Island">Norfolk Island</option><option value="+47|Norway">Norway</option><option value="+968|Oman">Oman</option><option value="+92|Pakistan">Pakistan</option><option value="+507|Panama">Panama</option><option value="+675|Papua New Guinea">Papua New Guinea</option><option value="+595|Paraguay">Paraguay</option><option value="+51|Peru">Peru</option><option value="+63|Philippines">Philippines</option><option value="+672|Pitcairn Islands">Pitcairn Islands</option><option value="+48|Poland">Poland</option><option value="+351|Portugal">Portugal</option><option value="+1|Puerto Rico">Puerto Rico</option><option value="+974|Qatar">Qatar</option><option value="+262|Reunion">Reunion</option><option value="+40|Romania">Romania</option><option value="+7|Russia">Russia</option><option value="+250|Rwanda">Rwanda</option><option value="+290|St. Helena">St. Helena</option><option value="+1|St. Kitts and Nevis">St. Kitts and Nevis</option><option value="+1|St. Lucia">St. Lucia</option><option value="+508|St. Pierre and Miquelon">St. Pierre and Miquelon</option><option value="+1|St. Vincent &amp; Grenadines">St. Vincent &amp; Grenadines</option><option value="+685|Samoa">Samoa</option><option value="+378|San Marino">San Marino</option><option value="+239|Sao Tome and Principe">Sao Tome and Principe</option><option value="+966|Saudi Arabia">Saudi Arabia</option><option value="+221|Senegal">Senegal</option><option value="+381|Serbia and Montenegro">Serbia and Montenegro</option><option value="+248|Seychelles">Seychelles</option><option value="+232|Sierra Leone">Sierra Leone</option><option value="+65|Singapore">Singapore</option><option value="+421|Slovakia">Slovakia</option><option value="+386|Slovenia">Slovenia</option><option value="+677|Solomon Islands">Solomon Islands</option><option value="+252|Somalia">Somalia</option><option value="+27|South Africa">South Africa</option><option value="+34|Spain">Spain</option><option value="+94|Sri Lanka">Sri Lanka</option><option value="+249|Sudan">Sudan</option><option value="+597|Suriname">Suriname</option><option value="+268|Swaziland">Swaziland</option><option value="+46|Sweden">Sweden</option><option value="+41|Switzerland">Switzerland</option><option value="+963|Syria">Syria</option><option value="+886|Taiwan">Taiwan</option><option value="+992|Tajikistan">Tajikistan</option><option value="+255|Tanzania">Tanzania</option><option value="+66|Thailand">Thailand</option><option value="+389|Macedonia">Macedonia</option><option value="+228|Togo">Togo</option><option value="+690|Tokelau">Tokelau</option><option value="+676|Tonga">Tonga</option><option value="+1|Trinidad and Tobago">Trinidad and Tobago</option><option value="+216|Tunisia">Tunisia</option><option value="+90|Turkey">Turkey</option><option value="+993|Turkmenistan">Turkmenistan</option><option value="+1|Turks and Caicos Islands">Turks and Caicos Islands</option><option value="+688|Tuvalu">Tuvalu</option><option value="+256|Uganda">Uganda</option><option value="+380|Ukraine">Ukraine</option><option value="+971|United Arab Emirates">United Arab Emirates</option><option value="+44|United Kingdom">United Kingdom</option><option value="+1|Virgin Islands">Virgin Islands</option><option value="+598|Uruguay">Uruguay</option><option value="+1|USA">USA</option><option value="+998|Uzbekistan">Uzbekistan</option><option value="+678|Vanuatu">Vanuatu</option><option value="+58|Venezuela">Venezuela</option><option value="+84|Vietnam">Vietnam</option><option value="+681|Wallis and Futuna">Wallis and Futuna</option><option value="+967|Yemen">Yemen</option><option value="+381|Yugoslavia">Yugoslavia</option><option value="+260|Zambia">Zambia</option><option value="+263|Zimbabwe">Zimbabwe</option></select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_country_code">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please enter country code for phone number of the person who will handle your matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
						<span id="errmsg_country_code" class="error"></span><br style="line-height: 5px;">
						<input class="field" name="c_country_code" id="c_country_code" value="" size="2" title="Country code"  style="width: 62px;" type="text" readonly> &nbsp;&nbsp;
						<input class="field" name="std_code" id="std_code" value="" size="2" title="Area code" style="width: 62px;" maxlength="6" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_std_code(this, 'field_filled', 'field_err');" type="text"> &nbsp;&nbsp;
						<input class="field" name="contact_number" value="" size="13" title="Phone number" style="width: 88px;" maxlength="15" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_contact_number(this, 'field_filled', 'field_err');" type="text"><br>
						<span class="smallgrey">Country code &nbsp;Area/STD code &nbsp;Phone number</span>
		<!-- HINT STARTS HERE -->
		<span class="hint_contact_number" id="hint_std_code">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please specify area code of the phone number of the person who will handle your matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->

		<!-- HINT STARTS HERE -->
		<span class="hint_contact_number" id="hint_contact_number">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please specify phone number of the person who will handle your <br>matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<span id="errmsg_std_code" class="error"></span><span id="errmsg_contact_number" class="error"></span>
						</td>
					</tr>
					</tbody></table>
				</td>
			</tr>

			</tbody></table>
			</td>
			<td width="200">
				<div style="font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; font-size-adjust: none; font-stretch: normal; color: rgb(129, 122, 122); padding-top: 5px; line-height: 15px;">
						<div>
			</div></div></td>
			</tr>
			<tr>
				<td colspan="2" valign="top">
					<table class="tbl1" border="0" cellpadding="3" cellspacing="0" width="100%">
					<tbody><tr>
				<td class="td1" valign="top" width="139"><em>*</em><b><label for="contact_details_dislay_status_show_all">Display Options</label></b></td>
				<td class="smallblack" valign="top">
								<input name="contact_details_dislay_status" id="contact_details_dislay_status_show_all" value="Show" style="margin-left: 0px;" onfocus="toggleHint('show', this.name)" onblur="validate_contact_details_dislay_status();contact_number_display_radio(this)" onclick="document.getElementById('errmsg_contact_details_dislay_status').innerHTML=''" type="radio">
		<!-- HINT STARTS HERE -->
		<span class="hint_display_options" id="hint_contact_details_dislay_status">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select if you wish to display your contact details.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<label id="lbl_cnt_display_yes" for="contact_details_dislay_status_show_all" class="swidthtext"><b>Yes</b>, I wish to display the contact details.</label> <img src="images/profile-show.gif" align="middle" border="0" height="23" width="19">

				<span style="line-height: 2px;"><br></span>

				<input name="contact_details_dislay_status" id="contact_details_dislay_status_none" value="None" style="margin-left: 0px;" onfocus="toggleHint('show', this.name)" onblur="validate_contact_details_dislay_status();contact_number_display_radio(this)" onclick="document.getElementById('errmsg_contact_details_dislay_status').innerHTML=''" type="radio"><label id="lbl_cnt_display_no" for="contact_details_dislay_status_none" class="swidthtext"> <b>No</b>, I do not wish to display the contact details.</label> <img src="images/profile-hide.gif" align="middle" border="0" height="23" width="19"><br><span id="errmsg_contact_details_dislay_status" class="error"></span>


				</td>

			</tr>
			<tr>
				<td colspan="2" valign="top">
				<span class="smallgrey"><b> Note :</b></span>


				<ul style="list-style-type: disc; list-style-position: outside; margin-top: 0px;">
				<li class="smallgrey">You can change your contact details preference anytime by visiting 'My Contact Details' section.</li>
				<li class="smallgrey">Your contact details are not shared with any third party.</li></ul>


				</td>
			</tr>
					</tbody></table>
				</td>
			</tr>
			</tbody></table>

						<!-- CONTACT DETAILS EN -->

			<!-- MORE ABOUT YOURSELF ST -->
			<a name="moreprofile1"></a>
			<div class="boldgreen" style="color:#990000; "><b>More About Yourself</b></div>

			<table class="tbl1" style="margin-left: 1px;" border="0" cellpadding="5" cellspacing="0" width="500">
			<tbody><tr valign="top">
				<td colspan="2" class="mediumblack" valign="top">This section will help you make a strong impression on your potential partner. So, express yourself.</td>
			</tr>

			<tr valign="top">
					<td class="td1" valign="top"><b style="float: left;"><em>*</em><label for="aboutyourself">Describe yourself, your likes &amp; dislikes, the kind of person you are looking for, etc.</label></b>


				<textarea name="aboutyourself" id="aboutyourself" rows="6" cols="90" onkeyup="calcCharLen('profile', 'aboutyourself', 'counter1', 4000)" onblur="toggleHint('hide', this.name); validate_describe_yourself(this, 'field_filled', 'field_err'); calcCharLen('profile', 'aboutyourself', 'counter1', 4000);" wrap="virtual" maxlength="4000" class="field" style="width: 595px;" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)"></textarea>
		<!-- HINT STARTS HERE -->
		<span class="hint_describe_yourself" id="hint_aboutyourself">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please enter more details about the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
					<div style="background: rgb(231, 231, 231) none repeat scroll 0%; width: 595px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;" class="smallblack"><img src="images/gry-arrow.gif" style="margin: 4px 4px 6px 8px;" align="middle" hspace="1">&nbsp;No. of characters:  <input name="counter1" id="counter1" value="0" class="formselect" size="2" readonly="readonly" style="border: medium none ; background: rgb(231, 231, 231) none repeat scroll 0%; width: 30px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; color: #FC9E86;" type="text">(min. 100 characters; max. 4000)</div><span id="errmsg_aboutyourself" class="error"></span>
				<a name="moreprofile2"></a>
				</td>
			</tr>

			</tbody></table>
			<!-- MORE ABOUT YOURSELF EN -->
<br>
<input type="hidden" name="continue" value="true">
			<script language="Javascript">	document.profile.elements['counter1'].value=document.profile.elements['aboutyourself'].value.length;	</script>

			<!-- PROFILE CONTENTS EN -->



			<!-- GET FREE NEWSLETTERS ST -->
			<table style="margin-left: 11px;" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr valign="top">
				<td style="font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(115, 111, 111);" valign="top">

				</td>
			</tr>
			<tr valign="top">
				<td style="font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(115, 111, 111);" valign="top">

				</td>
			</tr>
			<!-- GET FREE NEWSLETTERS EN -->
		</tbody></table>
		<table class="tbl1 end" style="margin-left: 11px;" border="0" cellpadding="0" cellspacing="0">
		<tbody><tr height="60">
			<td class="td2">
			<input src="images/create-my-profile.gif" style="width: 141px; height: 22px;" border="0" type="image" vspace="10">


			</td>
		</tr>

		</tbody></table>


	</form></div>





		</div><br clear="all">
	</div>
</div>
</center>

<!-- bottom banner space -->

			<!-- BTM BANNER download / registration STARTS-->
			<center>
				<?PHP
			include("footer.php");
		?>
			</center>


			<!-- BTM BANNER download / registration ENDS-->

</body></html>