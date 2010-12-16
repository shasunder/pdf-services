<body onLoad="timedCount();">
<form name="keywordsearch" action="search.php" method="post">
<br /><table width="809" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="622" valign="top"> 
<table width="215" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif"  width="25" height="25"/></span></td>
    <td width="550" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" width="25" height="25" /></span></td>
  </tr>
  <tr>
    <td background="./images/lightbox_left.gif"></td>
    <td>

<div  class="sch_menu_t1">
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=gs"> General Search </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr">
				  <div class="schmenu" ><a href="search.php?type=as"> Advanced Search </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=ps"> By Profile ID </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr"><div class="schmenu_highlight" ><a href="search.php?type=kes" class="schmenu_active"> By Keyword(s) </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
		</div>
<input type="hidden" name="searchindex" id="searchindex" value="keywordsrc" />
<div class="sch_con"> <br>
<div class="sch_s_head" >
	<strong> Keyword(s) Search </strong></div> <br />
<div class="search_100" >   Find profiles based on keywords. This search will get results based on keywords found in the profile description of members. </div> <br />
<div class="search_line"> </div>
<div style="height:70px;"> 
	<div class="search_width">
		<div class="search_48_head">Looking for </div>
		<div class="search_48_head">Age </div>
	</div>
<div class="search_width1">
<div class="search_48">
   <input name="gender" id="fgender" value="F" type="radio" checked="checked" onClick="gen('fgender','txtagefrm','txtageto','18','40');"/> 
   Female
   <input name="gender" id="mgender" value="M" type="radio" onClick="gen('mgender','txtagefrm','txtageto','21','40');"/> Male</div>
<div class="search_48">
	<label for="textfield"></label>
	From <input name="txtagefrm" type="text" class="textbox" id="txtagefrm" style="width:35px;" value="18" onKeyUp="return char_val(this,'0123456789');"/> 
	To  <input name="txtageto" type="text" class="textbox" id="txtageto" style="width:35px;" value="40" onKeyUp="return char_val(this,'0123456789');" onBlur="val_Age('txtagefrm','txtageto','ageError','Please Enter Correct Age','The difference between a partners age should not exceed 22 years');" /> Years</div>
</div>
	<div class="search_width">
	<div class="search_48_red"> </div>
	<div class="search_48_red" id="ageError"></div>
</div>
<div class="search_line"> </div> 
</div>
<div style="height:70px;"> <div class="search_width">
	<div class="search_48_head">Key Words</div>
	<div class="search_48_head"></div>
</div>
<div class="search_width1">
<div class="search_31">
   <input type="text" name="txtkeyword" id="txtkeyword" class="textbox" style="width: 165px;" onBlur="txt_empty('txtkeyword','keyError','Please Enter Any Word');"/>
 </div>
 <div class="search_48">
	<input name="any_word" id="any_word" value="Any Words" type="radio" checked="checked"/>Any Words 
	<input name="any_word" id="all_word" value="All Words " type="radio" />All Words 
	<input name="any_word" id="ex_word" value="Exact word" type="radio" />Exact word</div>
</div>
<div class="search_width">
	<div class="search_48_red" id="keyError"></div>
	<div class="search_48_red"></div>
</div>
<div class="search_line"> </div> 
</div>
<div style="height:70px;"> <div class="search_width">
	<div class="search_48_head">Show profiles with </div>
	<div class="search_48_head"></div>
</div>
<div class="search_width1">
<div class="search_31">
   <input type="checkbox" name="chkphoto" id="chkphoto" value="Photo" /> Photo 
   <input type="checkbox" name="chkhoro" id="chkhoro" value="Horoscope" /> Horoscope</div>
</div>
<div class="search_width">
	<div class="search_48_red"></div>
	<div class="search_48_red"></div>
</div>
<div class="search_line"> </div> 
</div>

<div class="search_48_head" style="width:100%;">Search Title</div>
<div style="padding-top:7px; padding-bottom:7px;width:100%; float:left; margin-left:15px; height:40px;">

<?php if((isset($_SESSION['valid']))&&(isset($_SESSION['ProfileId'])))
                        {?>
                            <input type="text" id="keytitle" name="keytitle" value=""/>
                            <div id="titleerr"></div>
                            </div>
                        <div style="margin-left:15px; margin-bottom:10px;">
                        	<input name="keysave" type="submit" class="s_btn" style="text-align:center" value="Save Search" onClick="return titlesave('keytitle');" />
        	<input type="submit"  class="s_btn" value="Search" style="width:60px; text-align:center" name="Search" id="Search" onClick="return Submit('txtkeyword','keyError','Please Enter Any Word','');"/>
                        <?php }
                        else if(($_SESSION['valid']=='loginvalid')&&($_SESSION['ProfileId'])){?>
                     <input type="submit"  class="s_btn" value="Search" style="width:60px; text-align:center" name="Search" id="Search" onClick="return Submit('txtkeyword','keyError','Please Enter Any Word','');"/>   
                        <?php }
                        
                        else {
                        ?>
                        <a href="register.php"><img src="images/btn_register.gif"></a>	
                       <?php  }?>
	
      
</div>
</div></td>
    <td background="./images/lightbox_right.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_b.gif" width="25" height="25" /></span></td>
    <td background="./images/lightbox_bottom.gif">&nbsp;</td>
    <td><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_b.gif" width="25" height="25" /></span></td>
  </tr>
</table>
</td>
<td width="241" valign="top">
<div id="rightadd" style="width:189px; z-index:1002; float:right;" >Right Add
<?php //include("advertisement/add_right.php");  ?>
<br clear="all"/>
</div>
</td>
</tr>
</table>
</form>
</body>