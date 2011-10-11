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
$i=0;
$hobbies = "";
while($i < count($_REQUEST['hobbiesarray']))
{
if($i==0)
{
$hobbies = $_REQUEST['hobbiesarray'][$i];
}
else
{
$hobbies .= "|".$_REQUEST['hobbiesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['hobbies_choose']!="")
{
$hobbies = $_REQUEST['hobbies_choose'];
}

$i=0;
$interestsarray = "";
while($i < count($_REQUEST['interestsarray']))
{
if($i==0)
{
$interestsarray = $_REQUEST['interestsarray'][$i];
}
else
{
$interestsarray .= "|".$_REQUEST['interestsarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['interests_choose']!="")
{
$interestsarray = $_REQUEST['interests_choose'];
}

$i=0;
$favourite_musicarray = "";
while($i < count($_REQUEST['favourite_musicarray']))
{
if($i==0)
{
$favourite_musicarray = $_REQUEST['favourite_musicarray'][$i];
}
else
{
$favourite_musicarray .= "|".$_REQUEST['favourite_musicarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['favourite_music_choose']!="")
{
$favourite_musicarray = $_REQUEST['favourite_music_choose'];
}

$i=0;
$favourite_readsarray = "";
while($i < count($_REQUEST['favourite_readsarray']))
{
if($i==0)
{
$favourite_readsarray = $_REQUEST['favourite_readsarray'][$i];
}
else
{
$favourite_readsarray .= "|".$_REQUEST['favourite_readsarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['favourite_reads_choose']!="")
{
$favourite_readsarray = $_REQUEST['favourite_reads_choose'];
}

$i=0;
$preferred_moviesarray = "";
while($i < count($_REQUEST['preferred_moviesarray']))
{
if($i==0)
{
$preferred_moviesarray = $_REQUEST['preferred_moviesarray'][$i];
}
else
{
$preferred_moviesarray .= "|".$_REQUEST['preferred_moviesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['preferred_movies_choose']!="")
{
$preferred_moviesarray = $_REQUEST['preferred_movies_choose'];
}

$i=0;
$sports_fitness_activitiesarray = "";
while($i < count($_REQUEST['sports_fitness_activitiesarray']))
{
if($i==0)
{
$sports_fitness_activitiesarray = $_REQUEST['sports_fitness_activitiesarray'][$i];
}
else
{
$sports_fitness_activitiesarray .= "|".$_REQUEST['sports_fitness_activitiesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['sports_fitness_activities_choose']!="")
{
$sports_fitness_activitiesarray = $_REQUEST['sports_fitness_activities_choose'];
}

$i=0;
$favourite_cuisinearray = "";
while($i < count($_REQUEST['favourite_cuisinearray']))
{
if($i==0)
{
$favourite_cuisinearray = $_REQUEST['favourite_cuisinearray'][$i];
}
else
{
$favourite_cuisinearray .= "|".$_REQUEST['favourite_cuisinearray'][$i];
}
$i=$i+1;
}

if($_REQUEST['favourite_cuisine_choose']!="")
{
$favourite_cuisinearray = $_REQUEST['favourite_cuisine_choose'];
}

$i=0;
$preferred_dress_stylearray = "";
while($i < count($_REQUEST['preferred_dress_stylearray']))
{
if($i==0)
{
$preferred_dress_stylearray = $_REQUEST['preferred_dress_stylearray'][$i];
}
else
{
$preferred_dress_stylearray .= "|".$_REQUEST['preferred_dress_stylearray'][$i];
}
$i=$i+1;
}

if($_REQUEST['preferred_dress_style_choose']!="")
{
$preferred_dress_stylearray = $_REQUEST['preferred_dress_style_choose'];
}

$i=0;
$spoken_languagesarray = "";
while($i < count($_REQUEST['spoken_languagesarray']))
{
if($i==0)
{
$spoken_languagesarray = $_REQUEST['spoken_languagesarray'][$i];
}
else
{
$spoken_languagesarray .= "|".$_REQUEST['spoken_languagesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['spoken_languages_choose']!="")
{
$spoken_languagesarray = $_REQUEST['spoken_languages_choose'];
}

$insert = "update user_profile set Hobbies='".mysql_escape_string($hobbies)."', Interests='".mysql_escape_string($interestsarray)."', FavoriteMusic='".mysql_escape_string($favourite_musicarray)."', FavoriteReads='".mysql_escape_string($favourite_readsarray)."', PreferredMovies='".mysql_escape_string($preferred_moviesarray)."', Sports='".mysql_escape_string($sports_fitness_activitiesarray)."', FavoriteCuisine='".mysql_escape_string($favourite_cuisinearray)."', PreferredDress='".mysql_escape_string($preferred_dress_stylearray)."', SpokenLanguages='".mysql_escape_string($spoken_languagesarray)."' where UserID=".$_SESSION['UserID_reg'];	
			
			$resultt = mysql_query($insert);

	
	header("Location: profile5.php");
	exit();
}
$sql = "SELECT * FROM users, user_profile, countries WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.UserID=".$_SESSION['UserID_reg'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>- Add Your Hobbies, Interests and More</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<script language="javascript" src="js/ajax-v2.js"></script>
<link rel="stylesheet" href="css/profile4.css">
</head>

<body topmargin="2" leftmargin="0" oncontextmenu="return false" onselectstart="return false" ondragstart="return false" marginheight="2" marginwidth="0" background="images/background.jpg">


<script language="javascript" src="images/matrimonials-v10.js"></script>
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
				<h2>Add your Hobbies, Interests, and more...</h2>
			</div>
		

		<!-- PAGE STYLE ST -->
		
		<!-- PAGE STYLE EN -->
Describe your personality so that people can know you better, and this
will also help you get featured in keyword-based searches.<br><br>

		<b>Note:</b><br>
		<ul class="list">
			<li>All visitors viewing your profile will also be able to view your hobbies, interests, etc.</li>
			<li>You can update this data at any time.</li>
		</ul>

		<div style="text-align: right;"><a class="mediumbluelink" href="myaccount.php">I'll do this later »</a></div>
<script language="JavaScript">
<!--



function radio_check(obj,check_box_name)
{
	 if(obj.checked)
	{
		for(var i=0;i<document.frm_main.elements[check_box_name].length;i++)
		{
			if(document.frm_main.elements[check_box_name][i].checked)
			{
				document.frm_main.elements[check_box_name][i].checked = false;
			}
		}
	}
}


function radio_uncheck(obj)
{
	if(document.frm_main.elements[obj].length > 1)
	{
		for(var i=0;i<document.frm_main.elements[obj].length;i++)
		{
			if(document.frm_main.elements[obj][i].checked)
			{
				document.frm_main.elements[obj][i].checked = false;
			}
		}
	}
	else
	{
		document.frm_main.elements[obj].checked = false;
	}
}
//-->
</script>

<form method="post" name="frm_main" action="profile4.php">
<input type="hidden" name="continue" value="true">
	

	<a name="Hobbies"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Hobbies</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="hobbiesarray[]" value="Acting" id="testhobbiesarray[]0" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]0">Acting</label><br>
<input name="hobbiesarray[]" value="Animal breeding" id="testhobbiesarray[]1" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]1">Animal breeding</label><br>
<input name="hobbiesarray[]" value="Art / Handicraft" id="testhobbiesarray[]2" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]2">Art / Handicraft</label><br>
<input name="hobbiesarray[]" value="Astrology / Palmistry / Numerology" id="testhobbiesarray[]3" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]3">Astrology / Palmistry / Numerology</label><br>
<input name="hobbiesarray[]" value="Astronomy" id="testhobbiesarray[]4" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]4">Astronomy</label><br>
<input name="hobbiesarray[]" value="Bird watching" id="testhobbiesarray[]5" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]5">Bird watching</label><br>
<input name="hobbiesarray[]" value="Collectibles" id="testhobbiesarray[]6" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]6">Collectibles</label><br>
<input name="hobbiesarray[]" value="Cooking" id="testhobbiesarray[]7" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]7">Cooking</label><br>
 </td>
 <td class="smallblack">
<input name="hobbiesarray[]" value="Dancing" id="testhobbiesarray[]8" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]8">Dancing</label><br>
<input name="hobbiesarray[]" value="DIY(do it yourself) projects" id="testhobbiesarray[]9" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]9">DIY(do it yourself) projects</label><br>
<input name="hobbiesarray[]" value="Film-making" id="testhobbiesarray[]10" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]10">Film-making</label><br>
<input name="hobbiesarray[]" value="Fishing" id="testhobbiesarray[]11" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]11">Fishing</label><br>
<input name="hobbiesarray[]" value="Gardening / Landscaping" id="testhobbiesarray[]12" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]12">Gardening / Landscaping</label><br>
<input name="hobbiesarray[]" value="Graphology" id="testhobbiesarray[]13" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]13">Graphology</label><br>
<input name="hobbiesarray[]" value="Ham radio" id="testhobbiesarray[]14" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]14">Ham radio</label><br>
<input name="hobbiesarray[]" value="Home / Interior decoration" id="testhobbiesarray[]15" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]15">Home / Interior decoration</label><br>
 </td>
 <td class="smallblack">
<input name="hobbiesarray[]" value="Hunting" id="testhobbiesarray[]16" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]16">Hunting</label><br>
<input name="hobbiesarray[]" value="Model building" id="testhobbiesarray[]17" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]17">Model building</label><br>
<input name="hobbiesarray[]" value="Painting / Drawing" id="testhobbiesarray[]18" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]18">Painting / Drawing</label><br>
<input name="hobbiesarray[]" value="Photography" id="testhobbiesarray[]19" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]19">Photography</label><br>
<input name="hobbiesarray[]" value="Playing musical instruments" id="testhobbiesarray[]20" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]20">Playing musical instruments</label><br>
<input name="hobbiesarray[]" value="Singing" id="testhobbiesarray[]21" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]21">Singing</label><br>
<input name="hobbiesarray[]" value="Solving Crosswords, Puzzles" id="testhobbiesarray[]22" onclick="radio_uncheck('hobbies_choose');" type="checkbox"><label for="testhobbiesarray[]22">Solving Crosswords, Puzzles</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="hobbies_choose" id="hobbies_choose0" value="Will tell you later" onclick="radio_check(this,'hobbiesarray[]');" checked="checked" type="radio"><label for="hobbies_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table>

	<a name="Interests"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Interests</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="interestsarray[]" value="Alternative healing" id="testinterestsarray[]0" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]0">Alternative healing</label><br>
<input name="interestsarray[]" value="Bikes / Cars" id="testinterestsarray[]1" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]1">Bikes / Cars</label><br>
<input name="interestsarray[]" value="Blogging" id="testinterestsarray[]2" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]2">Blogging</label><br>
<input name="interestsarray[]" value="Clubbing" id="testinterestsarray[]3" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]3">Clubbing</label><br>
<input name="interestsarray[]" value="Driving" id="testinterestsarray[]4" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]4">Driving</label><br>
<input name="interestsarray[]" value="Eating out" id="testinterestsarray[]5" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]5">Eating out</label><br>
<input name="interestsarray[]" value="Health &amp; Fitness" id="testinterestsarray[]6" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]6">Health &amp; Fitness</label><br>
<input name="interestsarray[]" value="Hiking / Camping" id="testinterestsarray[]7" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]7">Hiking / Camping</label><br>
<input name="interestsarray[]" value="Learning new languages" id="testinterestsarray[]8" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]8">Learning new languages</label><br>
<input name="interestsarray[]" value="Listening to music" id="testinterestsarray[]9" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]9">Listening to music</label><br>
<input name="interestsarray[]" value="Mehendi Designing" id="testinterestsarray[]10" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]10">Mehendi Designing</label><br>
 </td>
 <td class="smallblack">
<input name="interestsarray[]" value="Movies" id="testinterestsarray[]11" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]11">Movies</label><br>
<input name="interestsarray[]" value="Museums / Galleries / Exhibitions" id="testinterestsarray[]12" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]12">Museums / Galleries / Exhibitions</label><br>
<input name="interestsarray[]" value="Nature" id="testinterestsarray[]13" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]13">Nature</label><br>
<input name="interestsarray[]" value="Net surfing" id="testinterestsarray[]14" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]14">Net surfing</label><br>
<input name="interestsarray[]" value="Pets" id="testinterestsarray[]15" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]15">Pets</label><br>
<input name="interestsarray[]" value="Politics" id="testinterestsarray[]16" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]16">Politics</label><br>
<input name="interestsarray[]" value="Reading / Book clubs" id="testinterestsarray[]17" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]17">Reading / Book clubs</label><br>
<input name="interestsarray[]" value="Religion" id="testinterestsarray[]18" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]18">Religion</label><br>
<input name="interestsarray[]" value="Shopping" id="testinterestsarray[]19" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]19">Shopping</label><br>
<input name="interestsarray[]" value="Sports - Indoor" id="testinterestsarray[]20" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]20">Sports - Indoor</label><br>
<input name="interestsarray[]" value="Sports - Outdoor" id="testinterestsarray[]21" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]21">Sports - Outdoor</label><br>
 </td>
 <td class="smallblack">
<input name="interestsarray[]" value="Stitching" id="testinterestsarray[]22" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]22">Stitching</label><br>
<input name="interestsarray[]" value="Technology" id="testinterestsarray[]23" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]23">Technology</label><br>
<input name="interestsarray[]" value="Theatre" id="testinterestsarray[]24" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]24">Theatre</label><br>
<input name="interestsarray[]" value="Travel / Sightseeing" id="testinterestsarray[]25" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]25">Travel / Sightseeing</label><br>
<input name="interestsarray[]" value="Trekking / Adventure sports" id="testinterestsarray[]26" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]26">Trekking / Adventure sports</label><br>
<input name="interestsarray[]" value="Video / Computer games" id="testinterestsarray[]27" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]27">Video / Computer games</label><br>
<input name="interestsarray[]" value="Volunteering / Social Service" id="testinterestsarray[]28" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]28">Volunteering / Social Service</label><br>
<input name="interestsarray[]" value="Watching television" id="testinterestsarray[]29" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]29">Watching television</label><br>
<input name="interestsarray[]" value="Wine tasting" id="testinterestsarray[]30" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]30">Wine tasting</label><br>
<input name="interestsarray[]" value="Writing" id="testinterestsarray[]31" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]31">Writing</label><br>
<input name="interestsarray[]" value="Yoga / Meditation" id="testinterestsarray[]32" onclick="radio_uncheck('interests_choose');" type="checkbox"><label for="testinterestsarray[]32">Yoga / Meditation</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="interests_choose" id="interests_choose0" value="Will tell you later" onclick="radio_check(this,'interestsarray[]');" checked="checked" type="radio"><label for="interests_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table>

	<a name="Favoritemusic"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Favorite music</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="favourite_musicarray[]" value="Acid Rock / Hard Rock" id="testfavourite_musicarray[]0" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]0">Acid Rock / Hard Rock</label><br>
<input name="favourite_musicarray[]" value="Alternative Music" id="testfavourite_musicarray[]1" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]1">Alternative Music</label><br>
<input name="favourite_musicarray[]" value="Bhajans / Devotional" id="testfavourite_musicarray[]2" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]2">Bhajans / Devotional</label><br>
<input name="favourite_musicarray[]" value="Bhangra" id="testfavourite_musicarray[]3" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]3">Bhangra</label><br>
<input name="favourite_musicarray[]" value="Blues" id="testfavourite_musicarray[]4" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]4">Blues</label><br>
<input name="favourite_musicarray[]" value="Christian / Gospel / Blue Grass" id="testfavourite_musicarray[]5" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]5">Christian / Gospel / Blue Grass</label><br>
<input name="favourite_musicarray[]" value="Classical - Carnatic" id="testfavourite_musicarray[]6" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]6">Classical - Carnatic</label><br>
<input name="favourite_musicarray[]" value="Classical - Hindustani" id="testfavourite_musicarray[]7" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]7">Classical - Hindustani</label><br>
<input name="favourite_musicarray[]" value="Classical &#8211; Opera" id="testfavourite_musicarray[]8" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]8">Classical &#8211; Opera</label><br>
<input name="favourite_musicarray[]" value="Classical - Western" id="testfavourite_musicarray[]9" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]9">Classical - Western</label><br>
<input name="favourite_musicarray[]" value="Country Music" id="testfavourite_musicarray[]10" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]10">Country Music</label><br>
<input name="favourite_musicarray[]" value="Disco" id="testfavourite_musicarray[]11" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]11">Disco</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_musicarray[]" value="Folk" id="testfavourite_musicarray[]12" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]12">Folk</label><br>
<input name="favourite_musicarray[]" value="Ghazals" id="testfavourite_musicarray[]13" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]13">Ghazals</label><br>
<input name="favourite_musicarray[]" value="Heavy Metal" id="testfavourite_musicarray[]14" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]14">Heavy Metal</label><br>
<input name="favourite_musicarray[]" value="Hip-Hop" id="testfavourite_musicarray[]15" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]15">Hip-Hop</label><br>
<input name="favourite_musicarray[]" value="House Music" id="testfavourite_musicarray[]16" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]16">House Music</label><br>
<input name="favourite_musicarray[]" value="Indipop" id="testfavourite_musicarray[]17" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]17">Indipop</label><br>
<input name="favourite_musicarray[]" value="Instrumental - Indian" id="testfavourite_musicarray[]18" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]18">Instrumental - Indian</label><br>
<input name="favourite_musicarray[]" value="Instrumental - Western" id="testfavourite_musicarray[]19" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]19">Instrumental - Western</label><br>
<input name="favourite_musicarray[]" value="Jazz" id="testfavourite_musicarray[]20" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]20">Jazz</label><br>
<input name="favourite_musicarray[]" value="Latest film songs" id="testfavourite_musicarray[]21" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]21">Latest film songs</label><br>
<input name="favourite_musicarray[]" value="Latin Music" id="testfavourite_musicarray[]22" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]22">Latin Music</label><br>
<input name="favourite_musicarray[]" value="New Age Music" id="testfavourite_musicarray[]23" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]23">New Age Music</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_musicarray[]" value="Old film songs" id="testfavourite_musicarray[]24" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]24">Old film songs</label><br>
<input name="favourite_musicarray[]" value="Pop" id="testfavourite_musicarray[]25" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]25">Pop</label><br>
<input name="favourite_musicarray[]" value="Qawalis" id="testfavourite_musicarray[]26" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]26">Qawalis</label><br>
<input name="favourite_musicarray[]" value="R&amp;B / Soul" id="testfavourite_musicarray[]27" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]27">R&amp;B / Soul</label><br>
<input name="favourite_musicarray[]" value="Rap" id="testfavourite_musicarray[]28" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]28">Rap</label><br>
<input name="favourite_musicarray[]" value="Reggae" id="testfavourite_musicarray[]29" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]29">Reggae</label><br>
<input name="favourite_musicarray[]" value="Remixes" id="testfavourite_musicarray[]30" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]30">Remixes</label><br>
<input name="favourite_musicarray[]" value="Soft Rock" id="testfavourite_musicarray[]31" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]31">Soft Rock</label><br>
<input name="favourite_musicarray[]" value="Sufi music" id="testfavourite_musicarray[]32" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]32">Sufi music</label><br>
<input name="favourite_musicarray[]" value="Techno / Trance" id="testfavourite_musicarray[]33" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]33">Techno / Trance</label><br>
<input name="favourite_musicarray[]" value="Western Country Music" id="testfavourite_musicarray[]34" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]34">Western Country Music</label><br>
<input name="favourite_musicarray[]" value="World Music" id="testfavourite_musicarray[]35" onclick="radio_uncheck('favourite_music_choose');" type="checkbox"><label for="testfavourite_musicarray[]35">World Music</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="favourite_music_choose" id="favourite_music_choose0" value="Enjoy most forms of music" onclick="radio_check(this,'favourite_musicarray[]');" type="radio"><label for="favourite_music_choose0">Enjoy most forms of music</label></td>
  <td class="smallblack"><input name="favourite_music_choose" id="favourite_music_choose1" value="Not too keen on music" onclick="radio_check(this,'favourite_musicarray[]');" type="radio"><label for="favourite_music_choose1">Not too keen on music</label></td>
  <td class="smallblack"><input name="favourite_music_choose" id="favourite_music_choose2" value="Will tell you later" onclick="radio_check(this,'favourite_musicarray[]');" checked="checked" type="radio"><label for="favourite_music_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="Favoritereads"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Favorite reads</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="favourite_readsarray[]" value="Biographies" id="testfavourite_readsarray[]0" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]0">Biographies</label><br>
<input name="favourite_readsarray[]" value="Business / Occupational" id="testfavourite_readsarray[]1" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]1">Business / Occupational</label><br>
<input name="favourite_readsarray[]" value="Classic literature" id="testfavourite_readsarray[]2" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]2">Classic literature</label><br>
<input name="favourite_readsarray[]" value="Comics" id="testfavourite_readsarray[]3" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]3">Comics</label><br>
<input name="favourite_readsarray[]" value="Fantasy" id="testfavourite_readsarray[]4" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]4">Fantasy</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_readsarray[]" value="History" id="testfavourite_readsarray[]5" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]5">History</label><br>
<input name="favourite_readsarray[]" value="Humour" id="testfavourite_readsarray[]6" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]6">Humour</label><br>
<input name="favourite_readsarray[]" value="Magazines &amp; Newspapers" id="testfavourite_readsarray[]7" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]7">Magazines &amp; Newspapers</label><br>
<input name="favourite_readsarray[]" value="Philosophy / Spiritual" id="testfavourite_readsarray[]8" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]8">Philosophy / Spiritual</label><br>
<input name="favourite_readsarray[]" value="Poetry" id="testfavourite_readsarray[]9" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]9">Poetry</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_readsarray[]" value="Romance" id="testfavourite_readsarray[]10" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]10">Romance</label><br>
<input name="favourite_readsarray[]" value="Science Fiction" id="testfavourite_readsarray[]11" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]11">Science Fiction</label><br>
<input name="favourite_readsarray[]" value="Self-help" id="testfavourite_readsarray[]12" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]12">Self-help</label><br>
<input name="favourite_readsarray[]" value="Short stories" id="testfavourite_readsarray[]13" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]13">Short stories</label><br>
<input name="favourite_readsarray[]" value="Thriller / Suspense" id="testfavourite_readsarray[]14" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox"><label for="testfavourite_readsarray[]14">Thriller / Suspense</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="favourite_reads_choose" id="favourite_reads_choose0" value="Love reading almost anything" onclick="radio_check(this,'favourite_readsarray[]');" type="radio"><label for="favourite_reads_choose0">Love reading almost anything</label></td>
  <td class="smallblack"><input name="favourite_reads_choose" id="favourite_reads_choose1" value="Not much of a reader" onclick="radio_check(this,'favourite_readsarray[]');" type="radio"><label for="favourite_reads_choose1">Not much of a reader</label></td>
  <td class="smallblack"><input name="favourite_reads_choose" id="favourite_reads_choose2" value="Will tell you later" onclick="radio_check(this,'favourite_readsarray[]');" checked="checked" type="radio"><label for="favourite_reads_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="PreferredMovies"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Preferred Movies</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="preferred_moviesarray[]" value="Action / Suspense" id="testpreferred_moviesarray[]0" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]0">Action / Suspense</label><br>
<input name="preferred_moviesarray[]" value="Classics" id="testpreferred_moviesarray[]1" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]1">Classics</label><br>
<input name="preferred_moviesarray[]" value="Comedy" id="testpreferred_moviesarray[]2" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]2">Comedy</label><br>
<input name="preferred_moviesarray[]" value="Documentaries" id="testpreferred_moviesarray[]3" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]3">Documentaries</label><br>
 </td>
 <td class="smallblack">
<input name="preferred_moviesarray[]" value="Drama" id="testpreferred_moviesarray[]4" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]4">Drama</label><br>
<input name="preferred_moviesarray[]" value="Epics" id="testpreferred_moviesarray[]5" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]5">Epics</label><br>
<input name="preferred_moviesarray[]" value="Horror" id="testpreferred_moviesarray[]6" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]6">Horror</label><br>
<input name="preferred_moviesarray[]" value="Non-commercial / Art" id="testpreferred_moviesarray[]7" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]7">Non-commercial / Art</label><br>
 </td>
 <td class="smallblack">
<input name="preferred_moviesarray[]" value="Romantic" id="testpreferred_moviesarray[]8" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]8">Romantic</label><br>
<input name="preferred_moviesarray[]" value="Sci-Fi &amp; Fantasy" id="testpreferred_moviesarray[]9" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]9">Sci-Fi &amp; Fantasy</label><br>
<input name="preferred_moviesarray[]" value="Short films" id="testpreferred_moviesarray[]10" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]10">Short films</label><br>
<input name="preferred_moviesarray[]" value="World cinema" id="testpreferred_moviesarray[]11" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox"><label for="testpreferred_moviesarray[]11">World cinema</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="preferred_movies_choose" id="preferred_movies_choose0" value="Love all kinds of movies" onclick="radio_check(this,'preferred_moviesarray[]');" type="radio"><label for="preferred_movies_choose0">Love all kinds of movies</label></td>
  <td class="smallblack"><input name="preferred_movies_choose" id="preferred_movies_choose1" value="Not a movie buff" onclick="radio_check(this,'preferred_moviesarray[]');" type="radio"><label for="preferred_movies_choose1">Not a movie buff</label></td>
  <td class="smallblack"><input name="preferred_movies_choose" id="preferred_movies_choose2" value="Will tell you later" onclick="radio_check(this,'preferred_moviesarray[]');" checked="checked" type="radio"><label for="preferred_movies_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="Sportsfitnessactivities"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Sports / fitness activities</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="sports_fitness_activitiesarray[]" value="Aerobics" id="testsports_fitness_activitiesarray[]0" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]0">Aerobics</label><br>
<input name="sports_fitness_activitiesarray[]" value="Athletics" id="testsports_fitness_activitiesarray[]1" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]1">Athletics</label><br>
<input name="sports_fitness_activitiesarray[]" value="Badminton" id="testsports_fitness_activitiesarray[]2" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]2">Badminton</label><br>
<input name="sports_fitness_activitiesarray[]" value="Baseball" id="testsports_fitness_activitiesarray[]3" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]3">Baseball</label><br>
<input name="sports_fitness_activitiesarray[]" value="Basketball" id="testsports_fitness_activitiesarray[]4" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]4">Basketball</label><br>
<input name="sports_fitness_activitiesarray[]" value="Billiards / Snooker / Pool" id="testsports_fitness_activitiesarray[]5" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]5">Billiards / Snooker / Pool</label><br>
<input name="sports_fitness_activitiesarray[]" value="Bowling" id="testsports_fitness_activitiesarray[]6" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]6">Bowling</label><br>
<input name="sports_fitness_activitiesarray[]" value="Boxing / Wrestling" id="testsports_fitness_activitiesarray[]7" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]7">Boxing / Wrestling</label><br>
<input name="sports_fitness_activitiesarray[]" value="Card games" id="testsports_fitness_activitiesarray[]8" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]8">Card games</label><br>
<input name="sports_fitness_activitiesarray[]" value="Carrom" id="testsports_fitness_activitiesarray[]9" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]9">Carrom</label><br>
<input name="sports_fitness_activitiesarray[]" value="Chess" id="testsports_fitness_activitiesarray[]10" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]10">Chess</label><br>
<input name="sports_fitness_activitiesarray[]" value="Cricket" id="testsports_fitness_activitiesarray[]11" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]11">Cricket</label><br>
<input name="sports_fitness_activitiesarray[]" value="Cycling" id="testsports_fitness_activitiesarray[]12" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]12">Cycling</label><br>
 </td>
 <td class="smallblack">
<input name="sports_fitness_activitiesarray[]" value="Football / Soccer" id="testsports_fitness_activitiesarray[]13" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]13">Football / Soccer</label><br>
<input name="sports_fitness_activitiesarray[]" value="Golf" id="testsports_fitness_activitiesarray[]14" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]14">Golf</label><br>
<input name="sports_fitness_activitiesarray[]" value="Gym workouts / Weight training" id="testsports_fitness_activitiesarray[]15" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]15">Gym workouts / Weight training</label><br>
<input name="sports_fitness_activitiesarray[]" value="Hockey" id="testsports_fitness_activitiesarray[]16" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]16">Hockey</label><br>
<input name="sports_fitness_activitiesarray[]" value="Horseback Riding" id="testsports_fitness_activitiesarray[]17" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]17">Horseback Riding</label><br>
<input name="sports_fitness_activitiesarray[]" value="Jogging / Walking / Running" id="testsports_fitness_activitiesarray[]18" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]18">Jogging / Walking / Running</label><br>
<input name="sports_fitness_activitiesarray[]" value="Martial Arts" id="testsports_fitness_activitiesarray[]19" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]19">Martial Arts</label><br>
<input name="sports_fitness_activitiesarray[]" value="Motor Racing" id="testsports_fitness_activitiesarray[]20" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]20">Motor Racing</label><br>
<input name="sports_fitness_activitiesarray[]" value="Polo" id="testsports_fitness_activitiesarray[]21" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]21">Polo</label><br>
<input name="sports_fitness_activitiesarray[]" value="Rugby" id="testsports_fitness_activitiesarray[]22" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]22">Rugby</label><br>
<input name="sports_fitness_activitiesarray[]" value="Sailing / Boating / Rowing" id="testsports_fitness_activitiesarray[]23" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]23">Sailing / Boating / Rowing</label><br>
<input name="sports_fitness_activitiesarray[]" value="Scrabble" id="testsports_fitness_activitiesarray[]24" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]24">Scrabble</label><br>
<input name="sports_fitness_activitiesarray[]" value="Scuba Diving" id="testsports_fitness_activitiesarray[]25" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]25">Scuba Diving</label><br>
 </td>
 <td class="smallblack">
<input name="sports_fitness_activitiesarray[]" value="Shooting" id="testsports_fitness_activitiesarray[]26" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]26">Shooting</label><br>
<input name="sports_fitness_activitiesarray[]" value="Skating / Snowboarding / Skiing" id="testsports_fitness_activitiesarray[]27" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]27">Skating / Snowboarding / Skiing</label><br>
<input name="sports_fitness_activitiesarray[]" value="Squash" id="testsports_fitness_activitiesarray[]28" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]28">Squash</label><br>
<input name="sports_fitness_activitiesarray[]" value="Swimming / Water sports" id="testsports_fitness_activitiesarray[]29" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]29">Swimming / Water sports</label><br>
<input name="sports_fitness_activitiesarray[]" value="Table-tennis" id="testsports_fitness_activitiesarray[]30" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]30">Table-tennis</label><br>
<input name="sports_fitness_activitiesarray[]" value="Tennis" id="testsports_fitness_activitiesarray[]31" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]31">Tennis</label><br>
<input name="sports_fitness_activitiesarray[]" value="Trekking / Adventure sports" id="testsports_fitness_activitiesarray[]32" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]32">Trekking / Adventure sports</label><br>
<input name="sports_fitness_activitiesarray[]" value="Volleyball" id="testsports_fitness_activitiesarray[]33" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]33">Volleyball</label><br>
<input name="sports_fitness_activitiesarray[]" value="Weight training" id="testsports_fitness_activitiesarray[]34" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]34">Weight training</label><br>
<input name="sports_fitness_activitiesarray[]" value="Winter / Rink sports" id="testsports_fitness_activitiesarray[]35" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]35">Winter / Rink sports</label><br>
<input name="sports_fitness_activitiesarray[]" value="Yoga / Meditation" id="testsports_fitness_activitiesarray[]36" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox"><label for="testsports_fitness_activitiesarray[]36">Yoga / Meditation</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="sports_fitness_activities_choose" id="sports_fitness_activities_choose0" value="Not a sportsperson" onclick="radio_check(this,'sports_fitness_activitiesarray[]');" type="radio"><label for="sports_fitness_activities_choose0">Not a sportsperson</label></td>
  <td class="smallblack"><input name="sports_fitness_activities_choose" id="sports_fitness_activities_choose1" value="Will tell you later" onclick="radio_check(this,'sports_fitness_activitiesarray[]');" checked="checked" type="radio"><label for="sports_fitness_activities_choose1">Will tell you later</label></td>
<td colspan="1">&nbsp;</td>
 </tr></tbody></table>

	<a name="Favoritecuisine"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Favorite cuisine</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="favourite_cuisinearray[]" value="American" id="testfavourite_cuisinearray[]0" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]0">American</label><br>
<input name="favourite_cuisinearray[]" value="Arabic" id="testfavourite_cuisinearray[]1" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]1">Arabic</label><br>
<input name="favourite_cuisinearray[]" value="Bengali" id="testfavourite_cuisinearray[]2" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]2">Bengali</label><br>
<input name="favourite_cuisinearray[]" value="Chinese" id="testfavourite_cuisinearray[]3" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]3">Chinese</label><br>
<input name="favourite_cuisinearray[]" value="Continental" id="testfavourite_cuisinearray[]4" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]4">Continental</label><br>
<input name="favourite_cuisinearray[]" value="Fast food" id="testfavourite_cuisinearray[]5" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]5">Fast food</label><br>
<input name="favourite_cuisinearray[]" value="Gujarati" id="testfavourite_cuisinearray[]6" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]6">Gujarati</label><br>
<input name="favourite_cuisinearray[]" value="Italian" id="testfavourite_cuisinearray[]7" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]7">Italian</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_cuisinearray[]" value="Japanese" id="testfavourite_cuisinearray[]8" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]8">Japanese</label><br>
<input name="favourite_cuisinearray[]" value="Konkan" id="testfavourite_cuisinearray[]9" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]9">Konkan</label><br>
<input name="favourite_cuisinearray[]" value="Lebanese" id="testfavourite_cuisinearray[]10" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]10">Lebanese</label><br>
<input name="favourite_cuisinearray[]" value="Mexican" id="testfavourite_cuisinearray[]11" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]11">Mexican</label><br>
<input name="favourite_cuisinearray[]" value="Moghlai" id="testfavourite_cuisinearray[]12" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]12">Moghlai</label><br>
<input name="favourite_cuisinearray[]" value="North Indian" id="testfavourite_cuisinearray[]13" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]13">North Indian</label><br>
<input name="favourite_cuisinearray[]" value="Persian" id="testfavourite_cuisinearray[]14" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]14">Persian</label><br>
<input name="favourite_cuisinearray[]" value="Punjabi" id="testfavourite_cuisinearray[]15" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]15">Punjabi</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_cuisinearray[]" value="Rajasthani" id="testfavourite_cuisinearray[]16" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]16">Rajasthani</label><br>
<input name="favourite_cuisinearray[]" value="Seafood" id="testfavourite_cuisinearray[]17" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]17">Seafood</label><br>
<input name="favourite_cuisinearray[]" value="Sindhi" id="testfavourite_cuisinearray[]18" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]18">Sindhi</label><br>
<input name="favourite_cuisinearray[]" value="Soul Food" id="testfavourite_cuisinearray[]19" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]19">Soul Food</label><br>
<input name="favourite_cuisinearray[]" value="South Indian" id="testfavourite_cuisinearray[]20" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]20">South Indian</label><br>
<input name="favourite_cuisinearray[]" value="Spanish" id="testfavourite_cuisinearray[]21" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]21">Spanish</label><br>
<input name="favourite_cuisinearray[]" value="Thai" id="testfavourite_cuisinearray[]22" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox"><label for="testfavourite_cuisinearray[]22">Thai</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="favourite_cuisine_choose" id="favourite_cuisine_choose0" value="Anything edible is great!" onclick="radio_check(this,'favourite_cuisinearray[]');" type="radio"><label for="favourite_cuisine_choose0">Anything edible is great!</label></td>
  <td class="smallblack"><input name="favourite_cuisine_choose" id="favourite_cuisine_choose1" value="Not much of a food-lover" onclick="radio_check(this,'favourite_cuisinearray[]');" type="radio"><label for="favourite_cuisine_choose1">Not much of a food-lover</label></td>
  <td class="smallblack"><input name="favourite_cuisine_choose" id="favourite_cuisine_choose2" value="Will tell you later" onclick="radio_check(this,'favourite_cuisinearray[]');" checked="checked" type="radio"><label for="favourite_cuisine_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="Preferreddressstyle"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Preferred dress style</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="preferred_dress_stylearray[]" value="Business casual - semi-formal office wear" id="testpreferred_dress_stylearray[]0" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox"><label for="testpreferred_dress_stylearray[]0">Business casual - semi-formal office wear</label><br>
<input name="preferred_dress_stylearray[]" value="Casual - usually in jeans and T-shirts" id="testpreferred_dress_stylearray[]1" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox"><label for="testpreferred_dress_stylearray[]1">Casual - usually in jeans and T-shirts</label><br>
 </td>
 <td class="smallblack">
<input name="preferred_dress_stylearray[]" value="Classic Indian - typically Indian formal wear" id="testpreferred_dress_stylearray[]2" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox"><label for="testpreferred_dress_stylearray[]2">Classic Indian - typically Indian formal wear</label><br>
<input name="preferred_dress_stylearray[]" value="Classic Western - typically western formal wear" id="testpreferred_dress_stylearray[]3" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox"><label for="testpreferred_dress_stylearray[]3">Classic Western - typically western formal wear</label><br>
 </td>
 <td class="smallblack">
<input name="preferred_dress_stylearray[]" value="Designer - only leading brands will do" id="testpreferred_dress_stylearray[]4" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox"><label for="testpreferred_dress_stylearray[]4">Designer - only leading brands will do</label><br>
<input name="preferred_dress_stylearray[]" value="Trendy - in line with the latest fashion" id="testpreferred_dress_stylearray[]5" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox"><label for="testpreferred_dress_stylearray[]5">Trendy - in line with the latest fashion</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="preferred_dress_style_choose" id="preferred_dress_style_choose0" value="Will tell you later" onclick="radio_check(this,'preferred_dress_stylearray[]');" checked="checked" type="radio"><label for="preferred_dress_style_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table>
	
	

	<a name="SpokenLanguages"></a>
	<div class="largewhitebold bluepatch" style="color:#990000;"><b>Spoken Languages</b></div>
	
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="spoken_languagesarray[]" value="Afrikaans" id="testspoken_languagesarray[]0" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]0">Afrikaans</label><br>
<input name="spoken_languagesarray[]" value="Arabic" id="testspoken_languagesarray[]1" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]1">Arabic</label><br>
<input name="spoken_languagesarray[]" value="Assamese" id="testspoken_languagesarray[]2" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]2">Assamese</label><br>
<input name="spoken_languagesarray[]" value="Bengali" id="testspoken_languagesarray[]3" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]3">Bengali</label><br>
<input name="spoken_languagesarray[]" value="Bulgarian" id="testspoken_languagesarray[]4" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]4">Bulgarian</label><br>
<input name="spoken_languagesarray[]" value="Burmese" id="testspoken_languagesarray[]5" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]5">Burmese</label><br>
<input name="spoken_languagesarray[]" value="Cantonese" id="testspoken_languagesarray[]6" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]6">Cantonese</label><br>
<input name="spoken_languagesarray[]" value="Croatian" id="testspoken_languagesarray[]7" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]7">Croatian</label><br>
<input name="spoken_languagesarray[]" value="Danish" id="testspoken_languagesarray[]8" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]8">Danish</label><br>
<input name="spoken_languagesarray[]" value="Dutch" id="testspoken_languagesarray[]9" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]9">Dutch</label><br>
<input name="spoken_languagesarray[]" value="English" id="testspoken_languagesarray[]10" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]10">English</label><br>
<input name="spoken_languagesarray[]" value="Finnish" id="testspoken_languagesarray[]11" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]11">Finnish</label><br>
<input name="spoken_languagesarray[]" value="French" id="testspoken_languagesarray[]12" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]12">French</label><br>
<input name="spoken_languagesarray[]" value="German" id="testspoken_languagesarray[]13" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]13">German</label><br>
<input name="spoken_languagesarray[]" value="Greek" id="testspoken_languagesarray[]14" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]14">Greek</label><br>
<input name="spoken_languagesarray[]" value="Gujarati" id="testspoken_languagesarray[]15" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]15">Gujarati</label><br>
<input name="spoken_languagesarray[]" value="Hebrew" id="testspoken_languagesarray[]16" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]16">Hebrew</label><br>
<input name="spoken_languagesarray[]" value="Hindi" id="testspoken_languagesarray[]17" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]17">Hindi</label><br>
 </td>
 <td class="smallblack">
<input name="spoken_languagesarray[]" value="Indonesian" id="testspoken_languagesarray[]18" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]18">Indonesian</label><br>
<input name="spoken_languagesarray[]" value="Italian" id="testspoken_languagesarray[]19" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]19">Italian</label><br>
<input name="spoken_languagesarray[]" value="Japanese" id="testspoken_languagesarray[]20" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]20">Japanese</label><br>
<input name="spoken_languagesarray[]" value="Kannada" id="testspoken_languagesarray[]21" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]21">Kannada</label><br>
<input name="spoken_languagesarray[]" value="Kashmiri" id="testspoken_languagesarray[]22" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]22">Kashmiri</label><br>
<input name="spoken_languagesarray[]" value="Konkani" id="testspoken_languagesarray[]23" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]23">Konkani</label><br>
<input name="spoken_languagesarray[]" value="Korean" id="testspoken_languagesarray[]24" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]24">Korean</label><br>
<input name="spoken_languagesarray[]" value="Kutchi" id="testspoken_languagesarray[]25" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]25">Kutchi</label><br>
<input name="spoken_languagesarray[]" value="Malay" id="testspoken_languagesarray[]26" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]26">Malay</label><br>
<input name="spoken_languagesarray[]" value="Malayalam" id="testspoken_languagesarray[]27" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]27">Malayalam</label><br>
<input name="spoken_languagesarray[]" value="Mandarin" id="testspoken_languagesarray[]28" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]28">Mandarin</label><br>
<input name="spoken_languagesarray[]" value="Manipuri" id="testspoken_languagesarray[]29" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]29">Manipuri</label><br>
<input name="spoken_languagesarray[]" value="Marathi" id="testspoken_languagesarray[]30" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]30">Marathi</label><br>
<input name="spoken_languagesarray[]" value="Marwadi" id="testspoken_languagesarray[]31" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]31">Marwadi</label><br>
<input name="spoken_languagesarray[]" value="Mizo" id="testspoken_languagesarray[]32" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]32">Mizo</label><br>
<input name="spoken_languagesarray[]" value="Nepalese" id="testspoken_languagesarray[]33" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]33">Nepalese</label><br>
<input name="spoken_languagesarray[]" value="Norwegian" id="testspoken_languagesarray[]34" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]34">Norwegian</label><br>
<input name="spoken_languagesarray[]" value="Oriya" id="testspoken_languagesarray[]35" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]35">Oriya</label><br>
 </td>
 <td class="smallblack">
<input name="spoken_languagesarray[]" value="Persian" id="testspoken_languagesarray[]36" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]36">Persian</label><br>
<input name="spoken_languagesarray[]" value="Polish" id="testspoken_languagesarray[]37" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]37">Polish</label><br>
<input name="spoken_languagesarray[]" value="Portuguese" id="testspoken_languagesarray[]38" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]38">Portuguese</label><br>
<input name="spoken_languagesarray[]" value="Punjabi" id="testspoken_languagesarray[]39" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]39">Punjabi</label><br>
<input name="spoken_languagesarray[]" value="Pushto" id="testspoken_languagesarray[]40" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]40">Pushto</label><br>
<input name="spoken_languagesarray[]" value="Russian" id="testspoken_languagesarray[]41" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]41">Russian</label><br>
<input name="spoken_languagesarray[]" value="Sindhi" id="testspoken_languagesarray[]42" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]42">Sindhi</label><br>
<input name="spoken_languagesarray[]" value="Spanish" id="testspoken_languagesarray[]43" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]43">Spanish</label><br>
<input name="spoken_languagesarray[]" value="Swahili" id="testspoken_languagesarray[]44" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]44">Swahili</label><br>
<input name="spoken_languagesarray[]" value="Swedish" id="testspoken_languagesarray[]45" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]45">Swedish</label><br>
<input name="spoken_languagesarray[]" value="Tagalog" id="testspoken_languagesarray[]46" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]46">Tagalog</label><br>
<input name="spoken_languagesarray[]" value="Tamil" id="testspoken_languagesarray[]47" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]47">Tamil</label><br>
<input name="spoken_languagesarray[]" value="Telugu" id="testspoken_languagesarray[]48" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]48">Telugu</label><br>
<input name="spoken_languagesarray[]" value="Thai" id="testspoken_languagesarray[]49" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]49">Thai</label><br>
<input name="spoken_languagesarray[]" value="Tulu" id="testspoken_languagesarray[]50" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]50">Tulu</label><br>
<input name="spoken_languagesarray[]" value="Turkish" id="testspoken_languagesarray[]51" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]51">Turkish</label><br>
<input name="spoken_languagesarray[]" value="Urdu" id="testspoken_languagesarray[]52" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox"><label for="testspoken_languagesarray[]52">Urdu</label><br>
			</td>
		</tr>
	
 <tr height="21">
  <td class="smallblack"><input name="spoken_languages_choose" id="spoken_languages_choose0" value="Will tell you later" onclick="radio_check(this,'spoken_languagesarray[]');" checked="checked" type="radio"><label for="spoken_languages_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table><br>

	<table class="tbl1 end" border="0" cellpadding="6" cellspacing="0">
	<tbody><tr height="60">
		<td class="td1"><br></td>
		<td class="td1">
		<input src="images/submit.gif" style="width: 76px; height: 22px;" border="0" type="image" vspace="20"></td>
		<td class="td1"><br></td>
	</tr>
	</tbody></table>

</form>

<div style="margin-left: 12px;">
	
	
</div><div style="text-align: right;"><a class="mediumbluelink" href="myaccount.php">I'll do this later »</a></div>
	</div><br>

	



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

</body></html>