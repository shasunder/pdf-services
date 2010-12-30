<?php
ob_start();
session_start();
$fname=basename($_SERVER['PHP_SELF'],".php");
include("common/common.class.php");
//echo print_r($_SESSION);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title><?php echo $commonCls->title?></title>
    <meta name="keywords" content="<?php echo $commonCls->keywords?>" />
    <meta name="description" content="<?php echo $commonCls->desc?>" />
    <link href="css/paidMember.css" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href="css/register_style.css" rel="stylesheet" type="text/css" />
    <link href="css/addvertise_company.css" rel="stylesheet" type="text/css" />
    <link href="./css/Matrimony_Calendar.css" rel="stylesheet" type="text/css" />
    <link href="css/override-styles.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/image-slideshow-4.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/styles-layouts.css" />

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

	<script type="text/javascript" language="javascript" src="ajax/admin_ajaxjs.js"></script>
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
	<script language="javascript" type="text/javascript" src="./js/jquery/jquery-1.2.3.pack.js"></script>
	<script language="javascript" type="text/javascript" src="./js/jquery/plugins/jquery.form.js"></script>
	<script language="javascript" type="text/javascript" src="./js/jquery/jquery-custom.js"></script>

</head>

<body <? if($fname=='index' && !$_SESSION['valid']){ ?>onload="FillReligion('ddlReligion');"<? } ?> >
<div class="page_main">
		<div id="fade" class="matri_overlayout" style="border:0px;display:'none';z-index:1000;width:1200px"></div>
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
<div>
	<div style="float:left">
		<img src="images/logo.gif"/>
	</div>
	<!-- login -->
	<div style="float:right;margin:5px;padding:1px;" >
			<table width="330" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <? if($_SESSION['valid']=='loginvalid'){ ?>

                    <td width="250" align="center" valign="middle"><b>Welcome <? echo ucfirst($_SESSION['LoginId']); ?>
                    </b></td>

                    <td width="110" align="left" class="headerforgetpswd"><a href="./signout.php" style="cursor:pointer; text-decoration:none; outline:0;" class="headerforgetpswd"><strong>Logout</strong></a> </td>
                    <? } else { ?>

                    <td>
                      <form name="form1" method="post" action="login.php">
                        <table>
                          <tr>
                            <td width="77" align="left" valign="middle">
	                            <input type="text" value='Email'  size="25" name="matrimonyid" id="matrimonyid"
	                            onblur="if(this.value == ''){ this.value = 'Email';}" onfocus="if (this.value == 'Email') {this.value = '';}" onclick="if (this.value == 'ID/Email') { this.value = ''; }"/>
                            </td>

                            <td width="81" align="center" valign="middle">
                            	<input type="password" size="10" name="txtpassword" id="txtpassword" value="" />
                            </td>

                            <td width="51" align="center" valign="middle">
                            	<input type="submit" class="loginButton" name="reg_submit" value="Login"   />
                            </td>
						 </tr>
						 <tr>
                            <td colspan="2" align="right" class="headerforgetpswd" nowrap="nowrap">
                            	<a href="register.php" style="text-decoration:none;" class="anchor-text">Sign up</a>&nbsp;&nbsp;
                           		<a href="javascript:void(0)" onclick="document.getElementById('fade').style.display='block';showmain('1');" style="text-decoration:none;" class="headerforgetpswd">Forgot Password ?</a>
                            </td>
                            <? }?>
                          </tr>
                        </table>
                      </form>
                    </td>

                  </tr>
                </table>
	</div>
	<div style="float:bottom">
		 <div class="homebutton22">
                  <ul>
                    <li <? if($fname=='index'){ ?> class="current" <? } ?>>
                      <a href="./"><span>Home</span></a>
                    </li>
                    <!-- li <? if($fname=='aboutus'){ ?> class="current" <? } ?>><a href="aboutus.php"><span>About Us</span></a></li -->
                    <? if(!$_SESSION['valid']=='loginvalid'){ ?>
                    <!--li <? if($fname=='register'){ ?> class="current" <? } ?>><a href="register.php"><span>Register</span></a></li -->
                    <? } ?>

                    <li <? if($fname=='search'){ ?> class="current" <? } ?>><a href="search.php"><span>Search</span></a></li>
                    <? if($_SESSION['valid']=='loginvalid'){ ?>

                    <li <? if($fname=='mymessages'){ ?> class="current" <? } ?>><a href="mymessages.php"><span>My Messages</span></a></li>

                    <li <? if($fname=='myProfile'){ ?> class="current" <? } ?>><a href="myProfile.php"><span>My Profile</span></a></li>

                    <li <? if($fname=='managephoto'){ ?> class="current" <? } ?>><a href="managephoto.php"><span>Manage Photo</span></a></li>
                    <? } ?>

                    <!-- li <? if($fname=='services'){ ?> class="current" <? } ?>><a href="services.php"><span>Services</span></a></li -->

                    <li <? if($fname=='paidmembership'){ ?> class="current" <? } ?>><a href="paidmembership.php"><span>Upgrade</span></a></li>
                    <!-- li><a href="board/"><span>Forum</span></a></li -->

                  </ul>
                </div>
      </div>

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
