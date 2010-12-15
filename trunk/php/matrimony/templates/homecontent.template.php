<table width="800" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td><div style="width:800px; height:122px;"><img src="images/banner.gif" /></div>


<br />
<div style="width:785px; margin:auto; background-color:#FFFFFF;  height:250px; padding:0px 0px 10px 0px; ">
 <div style="width:196px; height:inherit; float:left;">  <table width="196" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="12"><img src="images/search_t_left.gif" width="19" height="35" /></td>
    <td width="219" align="left" valign="middle" class="h_search_head" style="background-image: url(images/search_top.gif); background-repeat:repeat-x;"> Search </td>
    <td width="15"><img src="images/search_t_right.gif" width="13" height="35" /></td>
  </tr>
  <tr>
    <td style="background-image:url(images/search_left.gif); background-repeat:repeat-y;"> </td>
    <td bgcolor="#FAF9F8" height="220"><br />
	<form name="homepage" action="search.php?type=gs" method="post" >
	<div class="h_search_sub_head" >Looking for </div>
	<div class="h_search_sub_head1">
	 <input name="gender" type="radio" value="F" id="fgender"  checked="checked" onclick="gen('fgender','txtagefrm','txtageto','18','40');"/>
	  Female
	 <input name="gender" type="radio" value="M" id="mgender" onclick="gen('mgender','txtagefrm','txtageto','21','40');"/>
	  Male </div>
	  <div class="h_search_sub_head" >Age</div>
	  <div class="h_search_sub_head1" >

        From
        <input type="text" name="txtagefrm" id="txtagefrm" value="18"  maxlength="2" style="width:20px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onkeyup="return char_val(this,'0123456789');"/>
        To <input type="text" name="txtageto" id="txtageto"  maxlength="2" value="40" style="width:20px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onkeyup="return char_val(this,'0123456789');" /> </div>
		<div class="gap" >
        </div>
		<div class="h_search_sub_head1">
        <select name="ddlReligion" id="ddlReligion" style="width:162px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onchange="FillCommunity('ddlReligion','ddlCommunity');">
        </select></div>
		<div class="gap" >
        </div>
		<div class="h_search_sub_head1" >
        <select name="ddlCommunity" id="ddlCommunity" style="width:162px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
          <option>- Select Caste  -</option>
        </select></div>
		<div class="gap" >
        </div>
		<div class="h_search_sub_head1" >
        <label for="textfield"></label>
        <input type="checkbox" name="chkphoto" value="Photo" id="chkphoto" />
        <label for="checkbox"></label>
        Profiles with Photo
		</div>
		<div class="gap" >
        </div>
		<div class="h_search_sub_head1">

		<input type="image" src="images/btn_search.gif" width="48" height="20" name="submit" value="submit" onclick="return SELECTreligion('ddlReligion','ddlCommunity')" /></div>
<input type="hidden" name="searchindex" id="searchindex" value="generalsrc"/>
		</form>
		</td>
    <td style="background-image:url(images/search_right.gif); background-repeat:repeat-y;"> </td>
  </tr>
  <tr>
    <td><img src="images/search_b_left.gif" width="19" height="16" /></td>
    <td style="background-image:url(images/search_b.gif); background-repeat:repeat-x;" ></td>
    <td><img src="images/search_b_right.gif" width="13" height="16" /></td>
  </tr>
</table> </div>
<div style="width:196px; height:inherit; float:left;">  <table width="196" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="19"><img src="images/reg_t_l.gif" width="19" height="35" /></td>
    <td width="185" align="left" valign="middle" class="h_search_head" style="background-image: url(images/reg_t.gif); background-repeat:repeat-x;"> Register</td>
    <td width="42"><img src="images/reg_t_r.gif" width="13" height="35" /></td>
  </tr>
  <tr>
    <td style="background-image:url(images/reg_l.gif); background-repeat:repeat-y;"> </td>
    <td bgcolor="#f8fcfc" height="220"><br />
<form name="home_register" method="post" action="register.php">
	<div class="h_search_sub_head" >Name</div>
	<div class="h_search_sub_head1">
	  <input type="text" name="textName" id="textName" style="width:155px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; " maxlength="25"  onblur="if(this.value == ''){this.value = 'Name';}" onfocus="if(this.value == 'Name'){this.value = '';}" onclick="if(this.value=='Name'){this.value='';}"/></div>
	  <div class="h_search_sub_head" >Age</div>
	  <div class="h_search_sub_head1" >
	    <input type="text" name="age" id="txtagefrm" maxlength="2" style="width:100px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; " onkeyup="return char_val(this,'0123456789');"onblur="if(this.value == ''){this.value = 'Age';}" onfocus="if(this.value == 'Age'){this.value = '';}"/></div>
		<div class="h_search_sub_head" >Gender</div>
		<div class="h_search_sub_head1" >
	  <input name="gender1" type="radio" value="female" id="gender"  />
	  Female
	  <input name="gender1" type="radio" value="male" id="gender" />
	  Male</div>
	  <div class="h_search_sub_head" >E-mail</div>
		<div class="h_search_sub_head1" >
        <label for="textfield"></label>
		<input name="txtEmail" id="txtEmail" type="text"  style="width:155px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; " value=""  maxlength="40" onBlur="if(this.value==''){txt_empty('txtEmail','emailError','Enter your EmailId');}else{email_validation('txtEmail','emailError','Enter your valid EmailId','EmailId','tm_profile');}" />
		<input name="emailtextfield" type="hidden" id="emailtextfield"  />
        </div>
		<div class="vali_red_email" id="emailError"></div>
		<div class="gap">
        </div>
		<div class="h_search_sub_head1">

		<input type="image" name="reg_submit" value="submit" img src="images/btn_register.gif" width="66" height="21" onclick="if(document.getElementById('emailError').innerHTML!='' && document.getElementById('emailError').style.color!='green'){document.getElementById('txtEmail').value=''}" /></div>
</form>
		</td>
    <td style="background-image:url(images/reg_r.gif); background-repeat:repeat-y;"> </td>
  </tr>
  <tr>
    <td><img src="images/reg_b_l.gif" width="19" height="16" /></td>
    <td style="background-image:url(images/reg_b.gif); background-repeat:repeat-x;" ></td>
    <td><img src="images/reg_b_r.gif" width="13" height="16" /></td>
  </tr>
</table> </div>
<div style="width:375px; height:inherit; float:left; padding:5px; margin-left:7px;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" valign="middle"> <h2>Welcome!</h2><!-- img src="images/txt_welcome.gif" width="199" height="11" /--></td>
    </tr>
    <!-- tr>
      <td style="background-image:url(images/welcome_bottom_line.gif); height:10px; background-repeat:repeat-x;"> </td>
    </tr -->
    <tr>
      <td bgcolor="#f7fbe3" style="padding:8px;"><p>Featured content represents the best that Wikipedia has to offer. These are the articles, pictures, and other contributions that showcase the polished result of the collaborative efforts that drive Wikipedia. </p>
        <p>All featured content undergoes a thorough review process to ensure that it meets the highest standards and can serve as an example of our end goals. A small bronze star (The featured content star) in the top right corner of a page indicates that the content is featured. This page gives links to all of Wikipedia's featured content and showcases one randomly selected example of each type of content. You can view another random content selection. </p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
</div>

</div><br />


<!--div style="width:785px; margin:auto; background-color:#FFFFFF; height:120px; padding:0px 0px 5px 0;">
<div style=" height:inherit; float:left; padding:5px; margin-left:2px;">
<table width="275" style=" border:1px #CACACA  solid" >
<tr><td rowspan="5" height="110px"><img src="./images/model.jpg" /></td>
<td class="search"><span style="color:#578BA4"><b>Latest Profile</b></span></td>
</tr>
<tr><td ><span style="color:#A0A0A4">Uma</span></td></tr>
<tr><td><span  style="color:#FF7F00">Age:</span> 25</td></tr>
<tr><td><span  style="color:#FF7F00">Profile Created</span>:4th apr 2009</td></tr>
<tr><td align="right"><img src="./images/more.gif" /></td></tr>
</table>
</div>
<div style=" height:inherit; float:left; padding:5px; margin-left:2px;">
<table width="250" height="111"  style=" border:1px #CACACA solid" >
<tr><td width="32" rowspan="2"><img  src="./images/astro.jpg"/></td>
<td width="206" height="34" colspan="2" align="left" valign="top"  class="search"><span style="color:#578BA4"><b>Astrology</b></span></td>
</tr>
<tr>
<td height="34" align="center" valign="top"  class="search"><b>comming soon...</b></td>
</tr>
<tr>
<td align="right" colspan="2" valign="bottom"><img src="./images/more.gif" /></td>
</tr>
</table>
</div>

<div style="height:118px; float:left; margin-left:2px; border:1px #CACACA solid; margin:5px;">
<table width="220" height="111">
<tr>
<td rowspan="0" height="100" align="center" valign="top" >
		<div class="leftFloatingDiv">
		<div class="imageSlideshowHolder" id="imageSlideshowHolder2">
			<img src="images/image8.jpg" width="200" height="100">
			<img src="images/image7.jpg" width="200" height="100">
			<img src="images/image6.jpg" width="200" height="100">
			<img src="images/image5.jpg" width="200" height="100">
			<img src="images/image4.jpg" width="200" height="100">
			<img src="images/image1.jpg" width="200" height="100">
			<img src="images/image3.jpg" width="200" height="100">
		</div>
		</div>
</td>
</tr>
</table>
</div>
</div -->
<? $browser = get_browser(); if($browser->browser!="IE"){ ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" height="2px" >&nbsp;</td>
  </tr>
</table>
<? } ?>
<!-- div style="width:800px; height: inherit;">
 <table width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" align="left" valign="bottom"><img src="images/homepg_m_profiles.gif" width="185" height="45" /></td>
    <td width="577" align="left" valign="bottom" class="m_profile_top"> </td>
    <td width="14" align="left" valign="bottom"><img src="images/home_pg_top_right.gif" width="14" height="45" /></td>
  </tr>
  <tr>
    <td height="34" class="m_profile_left"></td>
    <td height="50" align="center" valign="top"><img src="images/homepg_religion_btn.gif" width="126" height="21" /></td>
    <td align="left" valign="top"><a href="?rel=Hindu" style="text-decoration:none; color:black;"> Hindu </a>|<a href="?rel=Chrisitian" style="text-decoration:none; color:black;"> Chrisitian </a>|<a href="?rel=Muslim" style="text-decoration:none; color:black;"> Muslim </a>|<a href="?rel=Jain" style="text-decoration:none; color:black;"> Jain </a>|<a href="?rel=Buddhist" style="text-decoration:none; color:black;">
Buddhist </a>|<a href="?rel=Bahais" style="text-decoration:none; color:black;"> Baha'is </a>|<a href="?rel=Chinese Folks" style="text-decoration:none; color:black;"> Chinese Folks </a>|<a href="?rel=Confucianist" style="text-decoration:none; color:black;"> Confucianist </a>|<a href="?rel=Ethnoreligionist" style="text-decoration:none; color:black;"> Ethnoreligionist </a>|<a href="?rel=Jewish" style="text-decoration:none; color:black;"> Jewish </a>|<a href="?rel=Neoreligionist" style="text-decoration:none; color:black;"> Neoreligionist </a>|<a href="?rel=Shintoist" style="text-decoration:none; color:black;"> Shintoist </a>|<a href="?rel=Sikh" style="text-decoration:none; color:black;"> Sikh </a>|<a href="?rel=Spiritist" style="text-decoration:none; color:black;"> Spiritist </a>|<a href="?rel=Taoist" style="text-decoration:none; color:black;"> Taoist </a>|<a href="?rel=Zorastrian" style="text-decoration:none; color:black;"> Zorastrian </a> <!- -| <a href="?searchindex=home&rel=Inter-Religion" style="text-decoration:none; color:black;"> Inter-Religion </a>|<a href="" style="text-decoration:none; color:black;"> More <img src="images/site_arrow.gif" style="border:0px" /> </a>- -></td>
    <td class="m_profile_right"></td>
  </tr>
  <tr>
    <td width="11" height="36" class="m_profile_left"> </td>
    <td width="174" height="50" align="center" valign="top"><img src="images/homepg_caste_btn.gif" width="126" height="21" /></td>
    <td align="left" valign="top"><a href="?rel=Adi Dravida" style="text-decoration:none; color:black;"> Adi Dravida </a>|<a href="?rel=Agarwal" style="text-decoration:none; color:black;"> Agarwal </a>|<a href="?rel=Ansari" style="text-decoration:none; color:black;"> Ansari </a>|<a href="?rel=Brahmin - Barendra" style="text-decoration:none; color:black;"> Brahmin - Barendra </a>|<a href="?rel=Bengali" style="text-decoration:none; color:black;"> Bengali </a>|<a href="?rel=Chettiar" style="text-decoration:none; color:black;"> Chettiar </a>|<a href="?rel=Dheevara" style="text-decoration:none; color:black;"> Dheevara </a>|<a href="?rel=Gounder" style="text-decoration:none; color:black;"> Gounder </a>|<a href="?rel=Gulf Muslims" style="text-decoration:none; color:black;"> Gulf Muslims </a>|<a href="?rel=Gujarati" style="text-decoration:none; color:black;"> Gujarati </a>|<a href="?rel=Iyengar" style="text-decoration:none; color:black;"> Iyengar </a>|<a href="?rel=Iyer" style="text-decoration:none; color:black;"> Iyer </a>|<a href="?rel=Kalar" style="text-decoration:none; color:black;"> Kalar </a>|<a href="?rel=Kesadhari" style="text-decoration:none; color:black;"> Kesadhari </a>|<a href="?rel=Kongu Vellala Gounder" style="text-decoration:none; color:black;"> Kongu Vellala Gounder </a>|<a href="?rel=Labbai" style="text-decoration:none; color:black;"> Labbai </a>|<a href="?rel=Maharashtrian" style="text-decoration:none; color:black;"> Maharashtrian </a>|<a href="?rel=Mudaliyar" style="text-decoration:none; color:black;"> Mudaliyar </a>|<a href="?rel=Nair - Vilakkithala" style="text-decoration:none; color:black;"> Nair - Vilakkithala </a>|<a href="?rel=Nadar" style="text-decoration:none; color:black;"> Nadar </a>|<a href="?rel=Naidu" style="text-decoration:none; color:black;"> Naidu </a>|<a href="?rel=Naicker" style="text-decoration:none; color:black;"> Naicker </a>|<a href="?rel=Pillai" style="text-decoration:none; color:black;"> Pillai </a>|<a href="?rel=Punjabi" style="text-decoration:none; color:black;"> Punjabi </a>|<a href="?rel=Reddy" style="text-decoration:none; color:black;"> Reddy </a>|<a href="?rel=Shia" style="text-decoration:none; color:black;"> Shia </a>|<a href="?rel=Sunni Muslim" style="text-decoration:none; color:black;"> Sunni Muslim </a>|<a href="?rel=Thevar" style="text-decoration:none; color:black;"> Thevar </a>|<a href="?rel=Udayar" style="text-decoration:none; color:black;"> Udayar </a>|<a href="?rel=Vanniyar" style="text-decoration:none; color:black;"> Vanniyar </a>|<a href="?rel=Vysya" style="text-decoration:none; color:black;"> Vysya </a>|<a href="?rel=Yadav/Konar" style="text-decoration:none; color:black;"> Yadav/Konar </a></td>
    <td width="14" class="m_profile_right"> </td>
  </tr>
  <tr>
    <td height="13" align="right" valign="top"><img src="images/homepg_m_bleft.gif" width="10" height="10" /></td>
    <td class="m_profile_bottom"> </td>
    <td class="m_profile_bottom"> </td>
    <td width="14" align="right" valign="top"><img src="images/homepg_m_bright.gif" width="14" height="10" /></td>
  </tr>
</table>

</div -->
</td>
  </tr>
</table>
<SCRIPT type="text/javascript">
initImageGallery('imageSlideshowHolder2');
</SCRIPT>