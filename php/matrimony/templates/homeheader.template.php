<?php
ob_start();
session_start();
$fname=basename($_SERVER['PHP_SELF'],".php");
include("common/common.class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $commonCls->title?></title>
<META NAME="keywords" CONTENT="<?php echo $commonCls->keywords?>">
<META NAME="description" CONTENT="<?php echo $commonCls->desc?>">


<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/register_style.css" rel="stylesheet" type="text/css" />
<link href="css/addvertise_company.css" rel="stylesheet" type="text/css" />
<link href="./css/Matrimony_Calendar.css" rel="stylesheet" type="text/css" />

<link href="css/override-styles.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:369px;
	top:146px;
	width:338px;
	height:23px;
	z-index:1;
}
.style1 {color: #CCCCCC}
.style3 {color: #990000}
-->
<!--
.style1 {
	color: #418181;
	font-weight: bold;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<link rel="stylesheet" type="text/css" media="screen" href="css/image-slideshow-4.css">
<script type="text/javascript" src="js/image-slideshow-4.js"></script>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore)
{ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script type="text/javascript" language="javascript" src="ajax/country.js"></script>
<script type="text/javascript" language="javascript" src="js/onload.js"></script>
<script type="text/javascript" language="javascript" src="js/onSubmit.js"></script>
<script type="text/javascript" language="javascript" src="js/general.js"></script>
<script type="text/javascript" language="javascript" src="ajax/message.js"></script>
<script type="text/javascript" src="js/advetisement.js"></script>
<script language="javascript" type="text/javascript" src="./js/calender/ValidateFormElements_search.js"></script>
<script language="javascript" type="text/javascript" src="./js/calender/Calendar_search.js"></script>
<script language="javascript" type="text/javascript" src="./js/calender/calendar-en_search.js"></script>
<script language="javascript" type="text/javascript" src="./js/calender/calendar-setup.js"></script>
</head>

<body <? if($fname=='index' && !$_SESSION['valid']){ ?>onload="FillReligion('ddlReligion');"<? } ?> >
<div class="page">
		<iframe id="fade" class="matri_overlayout" style="border:0px;display:'none';z-index:1000"></iframe>
		<!-- Light Box for search starts -->
		<div id="light"></div>
    	<div style="width:100%;position:absolute;z-index:9000;left:0px;display:'none'" align="center" id="over_divmsg">
			<div id="inner_msg" align="left" style="display:none;"></div>
		</div>
		<!-- Light Box for search  Ends here   -->
		<!-- Light Box for forget Password starts -->
		<div style="width:100%;position:absolute;z-index:200000;left:0px" align="center" id="alignpwd">
		<div style="width:800px;position:relative" ><div id="cpass" align="left" style="display:none;z-index:100000000"></div></div></div>
		<!-- Light Box for forget Password  Ends here   -->


<!-- div class="header_top"> </div -->
<div class="header_middle">

<table width="795" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <!-- td width="64" rowspan="2"><img src="images/logo.gif" width="61" height="91" /></td -->
    <td width="398" height="65" align="left" valign="middle"><p><img src="images/logo.gif"/></p></td>
    <td width="333"><table width="333" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" align="right" valign="middle"><img src="images/header_login_left.gif" width="6" height="38" /></td>
        <td width="333"  class="header_login_center" ><table width="330" height="23" border="0" cellpadding="0" cellspacing="0">
          <tr>

			<? if($_SESSION['valid']=='loginvalid'){ ?>
            <td width="250" align="center" valign="middle"><b>Welcome <? echo ucfirst($_SESSION['LoginId']); ?></td>
            <td width="110" align="left" class="headerforgetpswd"><a href="./signout.php" style="cursor:pointer; text-decoration:none; outline:0;" class="headerforgetpswd"><strong>Logout </strong> </a></td>
			<? } else { ?>
		  <form name="form1" method="post" action="login.php" >
            <td width="77" align="left" valign="middle"><label>
			<input type="text" value='ID/Email' class="header_login_select_box"  size="5" name="matrimonyid" id="matrimonyid" onBlur="if(this.value == ''){ this.value = 'ID/Email';}" onFocus="if (this.value == 'ID/Email') {this.value = '';}" onClick="if (this.value == 'ID/Email') { this.value = ''; }" />
            </label></td>
            <td width="81" align="center" valign="middle">
			<input type="password" class="header_login_select_box" name="txtpassword" id="txtpassword" value="password" onBlur="if (this.value == ''){this.value = 'password';}" onFocus="if (this.value == 'password'){this.value = '';}" onClick="if (this.value == 'password'){this.value= '';}" />
			</td>
            <td width="51" align="center" valign="middle">
			<input type="image" name="reg_submit" value="submit" src="images/header_login.gif" width="44" height="19" border="0"/>
			</td>
            <td width="125" align="right" class="headerforgetpswd"><a href = "javascript:void(0)" onclick = "document.getElementById('fade').style.display='block';showmain('1');" style="text-decoration:none;" class="headerforgetpswd">Forgot Password ?</a></td></form><? }?>

          </tr>
        </table></td>
        <td width="10" align="left" valign="middle"><img src="images/header_login_right.gif" width="6" height="38" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" >
<div class="homebutton22" >
<ul>
	<li></li>
	<li <? if($fname=='index'){ ?> class="current" <? } ?>><a href="./"><span>Home</span></a></li>
	<li <? if($fname=='aboutus'){ ?> class="current" <? } ?>><a href="aboutus.php"><span>About Us</span></a></li>
	<? if(!$_SESSION['valid']=='loginvalid'){ ?>
		<li <? if($fname=='register'){ ?> class="current" <? } ?>><a href="register.php"><span>Register</span></a></li>
	<? } ?>
	<li <? if($fname=='search'){ ?> class="current" <? } ?>><a href="search.php"><span>Search</span></a></li>
	<? if($_SESSION['valid']=='loginvalid'){ ?>
		<li <? if($fname=='mymessages'){ ?> class="current" <? } ?>><a href="mymessages.php"><span>My Messages</span></a></li>
		<li <? if($fname=='myProfile'){ ?> class="current" <? } ?>><a href="myProfile.php"><span>My Profile</span></a></li>
		<li <? if($fname=='managephoto'){ ?> class="current" <? } ?>><a href="managephoto.php"><span>Manage Photo</span></a></li>
	<? } ?>
	<li <? if($fname=='services'){ ?> class="current" <? } ?>><a  href="services.php"><span>Services</span></a></li>
</ul>
</div>


	</td>
    </tr>
</table>
</div>
<br/>
<!-- div class="header_submenu">
<? if($_SESSION['valid']=='loginvalid'){
		$pname = "search.php?searchindex=home";
	} else {
		$pname = "register.php?reg=home";
} ?>
			<div class="ht_top_content"><a href="?lng=Assameme" style="text-decoration:none; color:black;"> Assameme </a>|<a href="?lng=Bengali" style="text-decoration:none; color:black;"> Bengali </a>|<a href="?lng=Gujarati" style="text-decoration:none; color:black;"> Gujarati </a>|<a href="?lng=Hindi" style="text-decoration:none; color:black;"> Hindi </a>|<a href="?lng=Kannada" style="text-decoration:none; color:black;"> Kannada </a>|<a href="?lng=Malayalee" style="text-decoration:none; color:black;"> Malayalee </a>|<a href="?lng=Marathi" style="text-decoration:none; color:black;"> Marathi </a>|<a href="?lng=Marwadi" style="text-decoration:none; color:black;"> Marwadi </a>|<a href="?lng=oriya" style="text-decoration:none; color:black;"> oriya </a>|<a href="?lng=Parsi" style="text-decoration:none; color:black;"> Parsi </a>|<a href="?lng=Punjabi" style="text-decoration:none; color:black;"> Punjabi </a>|<a href="?lng=Sindhi" style="text-decoration:none; color:black;"> Sindhi </a>|<a href="?lng=Tamil" style="text-decoration:none; color:black;"> Tamil </a>|<a href="?lng=Telugu" style="text-decoration:none; color:black;"> Telugu </a>|<a href="?lng=Urdu" style="text-decoration:none; color:black;"> Urdu </a></div>
</div -->
<div id="headend" style="display:none;">:###:</div>