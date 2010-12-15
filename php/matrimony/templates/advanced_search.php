<body onLoad="FillFeet('ddlheightfrm');FillFeet('ddlheightto');FillPhysical('ddlphysical');FillReligion('ddlReligion');FillMotherTongue('ddlmother');FillStar('ddlstar');FillEducation('ddle_category');FillOccupation('ddlocc');FillEmptype('ddlemptype');">
<form name="advancesearch" action="search.php" method="post">
<br /><table width="809" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="622" valign="top"> 
<table width="558" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif" height="25px" width="25px" /></span></td>
    <td width="550" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif"  height="25px" width="25px" /></span></td>
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
				  <div class="schmenu_highlight" ><a href="search.php?type=as" class="schmenu_active"> Advanced Search </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=ps"> By Profile ID </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=kes"> By Keyword(s) </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
</div>
<div class="sch_con"><br>
			<input type="hidden" name="searchindex" id="searchindex" value="advancesrc" />
 <div class="sch_s_head" ><strong> Advanced Search </strong></div> <br />
 <div class="search_100" > This is a Advanced search releted to Partner. </div> 
 <div class="sch_b_arrow"></div>
 <div class="search_line"> </div>
 <div class="sch_menu_in_h"> <span style=" vertical-align:text-bottom; width:25px; "> <img src="./images/search_h_arrow.gif"  /> </span>  Search Now  </div> 
 <div class="sch_menu_in"> <div style="height:70px;"> <div class="search_width_i">
 <div class="search_48_head">  </div>
 <div class="search_48_head">Age </div>
 </div>
 <div class="search_width1_i">
 <div class="search_48">
   <input name="gender" id="fgender" value="F" checked="checked" onClick="gen('fgender','txtagefrm','txtageto','18','40');" type="radio" />
   Female
   <input name="gender" id="mgender" value="M" onClick="gen('mgender','txtagefrm','txtageto','21','40');" type="radio" />
Male </div>
 <div class="search_48">From 
   <label for="textfield"></label>
   <input name="txtagefrm" type="text" class="textbox" id="txtagefrm" style="width:35px;"  value="18"onkeyup="return char_val(this,'0123456789');"/> 
   To  <input name="txtageto" type="text" class="textbox" id="txtageto" value="40" style="width:35px;" onKeyUp="return char_val(this,'0123456789');" onBlur="val_Age('txtagefrm','txtageto','ageerr','Please Enter Correct Age','The difference between a partners age should not exceed 22 years');" /> 
   Years  
 </div>
 </div>
 <div class="search_width_i">
 <div class="search_48_red"></div>
 <div class="search_48_red" id="ageerr"></div>
 </div>
 <div class="search_line"> </div> 
 </div>
 <div style="height:70px;"> <div class="search_width_i">
 <div class="search_48_head">Height</div>
 <div class="search_48_head">Physical Status </div>
 </div>
 <div class="search_width1_i">
 <div class="search_48">From 
   <select class="selecttbox" name="ddlheightfrm"  id="ddlheightfrm" size="1"  tabindex="5" style="width:100px;" ></select> 
   To <select class="selecttbox" name="ddlheightto" size="1" id="ddlheightto" tabindex="5" style="width:100px;" ></select> </div>
 <div class="search_48">
 <select class="selecttbox" name="ddlphysical" id="ddlphysical" size="1"  tabindex="5" style="width: 165px;" ></select><br />
 </div>
 </div>
 <div class="search_width_i">
 <div class="search_48_red"></div>
 <div class="search_48_red"></div>
 </div>
 <div class="search_line"> </div> 
 </div>
 <div style="height:160px; border:0px solid #996600; display:none; " id="divv1" > <div style="height:70px; "> <div class="search_width_i">
 <div class="search_100_head">Marital status </div>
 </div>
 <div class="search_width1_i" >
 <div class="search_100">
   <input type="checkbox" name="chkany" value="DM" id="any1" onClick="div_tab('div','1','1');"/>
   Any 
   <input type="checkbox" name="chkunmarried" value="UnMarried" id="any2" checked="checked" />
   <label for="checkbox3"></label>
   <font  onclick=""> Unmarried</font> 
   <input type="checkbox" name="chkwidow" value="Widow\Widower" id="any3" />
   <font  onclick=""> Widow/Widower</font> 
   <input type="checkbox" name="chkdivorced" value="Divorced" id="any4" />
   <font  onclick="">Divorced</font> 
   <input type="checkbox" name="chkseperated" value="Seperated" id="any5" />
   Separated    
  </div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">  </div>
 </div>
 <div class="search_line"> </div> 
 </div>
 <div style="height:70px; "> <div class="search_width_i">
 <div class="search_100_head">Have Children </div>
 </div>
 <div class="search_width1_i" >
 <div class="search_100" id="div1" style="display:;">

     <input name="radioChildStatus" id="rdmatter" value="DM" checked="checked" type="radio" />
     Doesn't matter 
     <input name="radioChildStatus" id="rliving" value="Living" type="radio" />
     Yes, living together  
  <input name="radioChildStatus" id="rnotliving" value="Not Living" type="radio" />
     Yes, not living together
 </div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">  </div>
 </div>

 <div class="search_line"> </div> <div class="sch_plus" ><img src="./images/minus.gif" width="13" height="13" onClick="div_tab('divv','2','2');"/> Fewer options </div></div>
 
 </div>
 
<div class="sch_plus" id="divv2"> <img src="./images/plus.gif" width="13" height="13" onClick="div_tab('divv','2','1');"/><span class="style5"> More options (Marital Status, Physical Status) </span></div>
 
 </div>
 <div class="sch_menu_in_h"> <span style=" vertical-align:text-bottom; width:25px; "> <img src="./images/search_h_arrow.gif"  /> </span>  Community & Religion  </div>
 <div class="sch_menu_in">
   
 <div style="height:70px;"> <div class="search_width_i">
 <div class="search_100_head">Religion</div>
 </div>
 <div class="search_width1_i">
 <div class="search_100">
   <select class="selecttbox" name="ddlReligion"  id="ddlReligion" size="1"  tabindex="5" style="width:175px;" onChange="FillCommunity('ddlReligion','ddlCommunity');">
	</select>
 </div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red"></div>
 </div>
 <div class="search_line"> </div> 
 </div>
 <div style="height:135px;"> <div class="search_width_i">
 <div class="search_100_head">Community/caste</div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="198" align="center">
          <select name="ddlCommunity" size="5" multiple="multiple" id="ddlCommunity" style="width:175px;"class="multi_box_text">
          </select>          </td>
        <td width="111" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center" onClick="if(document.getElementById('ddlCommunity').selectedIndex!=0){addOptions('ddlCommunity','ddlCommunityout');hidden('ddlCommunityout','communityhd');} "/>  <br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;" onClick="RemoveOption('ddlCommunity','ddlCommunityout');hidden('ddlCommunityout','communityhd');"/></td>
        <td width="199" align="center"><select name="ddlCommunityout" size="5" multiple="multiple" id="ddlCommunityout" style="width:175px;"class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">
   <input type="hidden" name="communityhd"  id="communityhd" value="" style=" margin-left:300px;" /></div>
 </div>
 <div class="search_line"> </div> 
 </div>
 <div style="height:225px;  display:none;" id="content1" ><div style="height:70px;"> <div class="search_width_i">
 <div class="search_100_head">Sub caste</div>
 </div>
 <div class="search_width1_i">
 <div class="search_100">
  
   <input name="txtsubcaste" type="text" class="textbox" id="txtsubcaste" style="width:200px;" />
 </div>
 </div>
 <div class="search_width_i">
 <div class="search_48_red">  </div>
 <div class="search_48_red"> </div>
 </div>
 <div class="search_line"> </div> 
 </div>
 <div style="height:135px;"> <div class="search_width_i">
 <div class="search_100_head">Mother Tongue </div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" align="center">
          <select name="ddlmother" size="5" multiple="multiple" id="ddlmother" style="width:175px;"class="multi_box_text">
          </select>          </td>
        <td width="100" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center" onClick="if(document.getElementById('ddlmother').selectedIndex!=0){addOptions('ddlmother','ddlmotherout');hidden('ddlmotherout','motherhd');} "/>  <br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;" onClick="RemoveOption('ddlmother','ddlmotherout');hidden('ddlmotherout','motherhd');"/></td>
        <td width="199" align="center"><select name="ddlmotherout" size="5" multiple="multiple" id="ddlmotherout" style="width:175px;"class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">  <input type="hidden" name="motherhd" id="motherhd" value="" style="margin-left:300px;" /></div>
 </div>
 <div class="search_line"> </div> <div class="sch_plus" ><img src="./images/minus.gif" width="13" height="13" onClick="div_tab('content','2','2');"/>  Fewer options </div>
 </div>
 </div> </div>
 
 <div class="sch_plus" id="content2" style="margin-left:18px;"> <img src="./images/plus.gif" width="13" height="13"  onclick="div_tab('content','2','1');"/><span class="style5"> More options (SubCaste, Mother Tongue) </span></div>
 
 <div class="sch_menu_in_h"> <span style=" vertical-align:text-bottom; width:25px; "> <img src="./images/search_h_arrow.gif"  /> </span>  Horoscopic Information</div>
 <div class="sch_menu_in">
 
 <div style="height:135px;"> <div class="search_width_i">
 <div class="search_100_head">Star</div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" align="center">
          <select name="ddlstar" size="5" multiple="multiple" id="ddlstar" style="width:175px;"class="multi_box_text">
          </select>          </td>
        <td width="100" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center" onClick="if(document.getElementById('ddlstar').selectedIndex!=0){addOptions('ddlstar','ddlstarout');hidden('ddlstarout','starhd');} "/>  <br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;" onClick="RemoveOption('ddlstar','ddlstarout');hidden('ddlstarout','starhd');"/></td>
        <td width="199" align="center"><select name="ddlstarout" size="5" multiple="multiple" id="ddlstarout" style="width:175px;"class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">
   <input type="hidden" name="starhd" id="starhd" value="" style="margin-left:300px;"/> </div>
 </div>
 <div class="search_line"> </div> 
 </div>
  <div style="height:70px; display:none;" id="mangalik1"> <div class="search_width_i">
    <div class="search_100_head">Mangalik</div>
 </div>
 <div class="search_width1_i">
   <div class="search_100">
     <input name="rmang" id="man1" value="Yes" type="radio" />
     Yes
   <input name="rmang" id="man2" value="No"  type="radio" checked="checked" />
   No
   <input name="rmang" id="man3" value="Dont Know"  type="radio" />
   Doesn't Matter </div>
 </div>
 <div class="search_width_i">
   <div class="search_100_red"> </div>
 </div>
 <div class="search_line"> </div> <div class="sch_plus" ><img src="./images/minus.gif" width="13" height="13" onClick="div_tab('mangalik','2','2');"/>  Fewer options </div>
 </div>
 <div class="sch_plus" id="mangalik2"> <img src="./images/plus.gif" width="13" height="13" onClick="div_tab('mangalik','2','1');"/><span class="style5"> More options (Mangalik) </span></div>
 
 </div>
 <div class="sch_menu_in_h"> <span style=" vertical-align:text-bottom; width:25px; "> <img src="./images/search_h_arrow.gif"  /> </span>  Education / Occupation</div>



<div class="sch_menu_in"> <div style="height:135px;"> <div class="search_width_i">
 <div class="search_100_head">Education</div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" align="center">
          <select name="ddle_category" size="5" multiple="multiple" id="ddle_category" style="width:175px;"class="multi_box_text">
          </select>          </td>
        <td width="100" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center"  onclick="if(document.getElementById('ddle_category').selectedIndex!=0){addOptions('ddle_category','ddle_categoryout');hidden('ddle_categoryout','categoryhd');} "/> <br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;"onclick="RemoveOption('ddle_category','ddle_categoryout');hidden('ddle_categoryout','categoryhd');"/></td>
        <td width="199" align="center"><select name="ddle_categoryout" size="5" multiple="multiple" id="ddle_categoryout" style="width:175px;"class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">
   <input type="hidden" name="categoryhd" id="categoryhd" value="" style="margin-left:300px;"/> </div>
 </div>
 <div class="search_line"> </div> 
 </div>
 
 <div style="height:275px;  display:none;" id="educontent1"><div style="height:135px;"> <div class="search_width_i">
 <div class="search_100_head"> Occupation </div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" align="center">
          <select name="ddlocc" size="5" multiple="multiple" id="ddlocc" style="width:175px;"class="multi_box_text">
          </select>          </td>
        <td width="100" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center"onclick="if(document.getElementById('ddlocc').selectedIndex!=0){addOptions('ddlocc','ddloccout');hidden('ddloccout','occhd');} "/> <br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;" onClick="RemoveOption('ddlocc','ddloccout');hidden('ddloccout','occhd');"/></td>
        <td width="199" align="center"><select name="ddloccout" size="5" multiple="multiple" id="ddloccout" style="width:175px;"class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 
 <div class="search_width_i">
 <div class="search_100_red">  <input type="hidden" name="occhd" id="occhd" value="" style="margin-left:300px;"/> </div>
 </div>
 <div class="search_line"> </div> 
 </div><div style="height:135px;"> <div class="search_width_i">
 <div class="search_100_head">Edmployment type</div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" align="center">
          <select name="ddlemptype" size="5" multiple="multiple" id="ddlemptype" style="width:175px;"class="multi_box_text">
          </select>          </td>
        <td width="100" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center" onClick="if(document.getElementById('ddlemptype').selectedIndex!=0){addOptions('ddlemptype','ddlemptypeout');hidden('ddlemptypeout','emptypeHd');} "/> <br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;"onclick="RemoveOption('ddlemptype','ddlemptypeout');hidden('ddlemptypeout','emptypeHd');"/></td>
        <td width="199" align="center"><select name="ddlemptypeout" size="5" multiple="multiple" id="ddlemptypeout" style="width:175px;"class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 
 <div class="search_width_i">
 <div class="search_100_red">  <input type="hidden" name="emptypeHd" id="emptypeHd" value="" style="margin-left:300px;"/></div>
 </div>
 <div class="search_line"> </div><div class="sch_plus" ><img src="./images/minus.gif" width="13" height="13" onClick="div_tab('educontent','2','2');"/>  Fewer options </div>
 </div>
 </div>  </div>
 <div class="sch_plus" style="margin-left:15px;" id="educontent2"> <img src="./images/plus.gif" width="13" height="13" onClick="div_tab('educontent','2','1');"/><span class="style5"> More options (Occupation,Employment type) </span></div>
 <div class="sch_menu_in_h"> <span style=" vertical-align:text-bottom; width:25px; "> <img src="./images/search_h_arrow.gif"  /> </span> Locations </div>
 <div class="sch_menu_in" style="margin-left:15px;">
 <div style="height:270px; display:none;" id="country1" ><div style="height:135px;"> <div class="search_width_i">
 <div class="search_100_head"><span class="search_48_head">Citizenship</span></div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100_head"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" align="center">
          <select name="citizen" size="5" multiple="multiple" id="citizen" style="width:175px; " class="multi_box_text">
		 <?
		$country=explode("|",$countryValue);
		$countCountry=count($country);				    									   					    
		for($i=0;$i<count($country);$i++)
		{
		?>
		<option style="width:112px;" value='<?=$i;?>'><? echo $country[$i];?></option>
		<?
		}							
		?>
          </select>          </td>
        <td width="100" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center" onClick="if(document.getElementById('citizen').selectedIndex!=0){addOptions('citizen','citizenout');hidden('citizenout','citizenhd');} "/><br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;" onClick="RemoveOption('citizen','citizenout');hidden('citizenout','citizenhd');"/></td>
        <td width="199" align="center"><select name="citizenout" size="5" multiple="multiple" id="citizenout" style="width:175px;" class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red"> <input type="hidden" name="citizenhd" id="citizenhd" value="" style="margin-left:300px;"/></div>
 </div>
 <div class="search_line"> </div> 
 </div><div style="height:135px; "> <div class="search_width_i">
 <div class="search_100_head"><span class="search_48_head">Residing country</span></div>
 </div>
 <div class="search_width_i" style="height:90px;">
 <div class="search_100_head"><table width="508" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" align="center">
          <select name="country" size="5" multiple="multiple" id="country" style="width:175px;"class="multi_box_text">
		  <?
		$country=explode("|",$countryValue);
		$countCountry=count($country);				    									   					    
		for($i=0;$i<count($country);$i++)
		{
		?>
		<option style="width:112px;" value='<?=$i;?>'><? echo $country[$i];?></option>
		<?
		}							
		?>
          </select>          </td>
        <td width="100" align="center"><input type="button"  class="s_btn" value="Add" style="width:60px; text-align:center" onClick="if(document.getElementById('country').selectedIndex!=0){addOptions('country','countryout');hidden('countryout','countryhd');} "/> <br/>  <br/>
          <input type="button" class="s_btn" value="Remove" style="width:60px;"onclick="RemoveOption('country','countryout');hidden('countryout','countryhd');"/></td>
        <td width="199" align="center"><select name="countryout" size="5" multiple="multiple" id="countryout" style="width:175px;"class="multi_box_text">
        </select></td>
      </tr>
    </table></div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red"> <input type="hidden" name="countryhd" id="countryhd" value="" style="margin-left:300px;"/> </div>
 </div>
 <div class="search_line"> </div> <div class="sch_plus" ><img src="./images/minus.gif" width="13" height="13" onClick="div_tab('country','2','2');"/>  Fewer options </div>
 </div>
 </div> </div>
   
 
 <div class="sch_plus" style="margin-left:15px;" id="country2"> <img src="./images/plus.gif" width="13" height="13" onClick="div_tab('country','2','1');"/><span class="style5"> More options (Residing Country) </span></div>
 
 <div class="sch_menu_in_h"> <span style=" vertical-align:text-bottom; width:25px; "> <img src="./images/search_h_arrow.gif"  /> </span> Habits  </div>
 <div class="sch_menu_in" style="margin-left:15px;">
 <div style="height:210px;   display:none;" id="habits1"><div style="height:70px;"> <div class="search_width_i">
 <div class="search_100_head">Food</div>
 </div>
 <div class="search_width1_i">
 <div class="search_100">
   <input name="rfood" id="rdmtr" value="DM" type="radio" checked="checked"/>
   Doesn't Matter
   <input name="rfood" id="rnveg" value="Non-Vegetatrian" type="radio" />
   Non-Vegetatrian
   <input name="rfood" id="regg" value="Eggetarian"  type="radio" />
Eggetarian
<input name="rfood" id="rveg" value="Vegetarian"  type="radio" />
 Vegetarian</div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">  </div>
 </div>
 <div class="search_line"> </div> 
 </div> <div style="height:70px;"> <div class="search_width_i">
 <div class="search_100_head">Smoking</div>
 </div>
 <div class="search_width1_i">
 <div class="search_100">
   <input name="radiosmoke" id="rsmoke" value="DM" type="radio" checked="checked" />
   Doesn't Matter
   <input name="radiosmoke" id="rsmoke" value="Non-Smoker"  type="radio"  />
Non-Smoker
<input name="radiosmoke" id="rsmoke" value="Regular"  type="radio" />
Regular
<input name="radiosmoke" id="rsmoke" value="Occasionally"  type="radio" />
Occasionally </div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">  </div>
 </div>
 <div class="search_line"> </div> 
 </div><div style="height:70px;"> <div class="search_width_i">
 <div class="search_100_head">Liquor</div>
 </div>
 <div class="search_width1_i">
 <div class="search_100">
   <input name="rdrink" id="rdmtr" value="DM"  type="radio" checked="checked"/>
   Doesn't Matter
   <input name="rdrink" id="rsmoke" value="Non-liquor"  type="radio"  />
     Non-liquor 				
   <input name="rdrink" id="rliquor" value="Regular"  type="radio" />
	Regular
	<input name="rdrink" id="rliquor" value="Occasionally"  type="radio" />
	Occasionally </div>
 </div>
 <div class="search_width_i">
 <div class="search_100_red">  </div>
 </div>
 <div class="search_line"> </div> <div class="sch_plus" ><img src="./images/minus.gif" width="13" height="13" onClick="div_tab('habits','2','2');"/>  Fewer options </div>
 </div>
 </div>    </div>
<div class="sch_plus" style="margin-left:15px;"  id="habits2"> <img src="./images/plus.gif" width="13" height="13" onClick="div_tab('habits','2','1');"/><span class="style5"> More options (Food,Smokeing, Liquor) </span></div>
 
 <div class="sch_menu_in_h"> <span style=" vertical-align:text-bottom; width:25px; "> <img src="./images/search_h_arrow.gif"  /> </span> Others  </div>
 <div class="sch_menu_in"> 
 
 <div style="height:120px;  display:none; " id="others1" > <div style="height:70px;"> <div class="search_width_i">
 <div class="search_48_head" style="width:55%">Date Posted </div>
 </div>
 <div class="search_100" style="height:20px;" >
 <div style="width:120px; float:left">
   <input type="radio" name="rpostdate" value="All" checked="checked" id="rpostdate" onClick="hide_placediv('postafter','datepic');" />
   All
   <input type="radio" name="rpostdate" value="PostAfter" id="rpostdate" onClick="show_placediv('postafter','datepic');"/>
   Post After  </div> 
   
	<div style="width:90px; float:left; display:none" id="postafter">
		<input name="jscal_field_date_start" id="jscal_field_date_start" type="text" readonly="readonly" value="" style="width:70px;"/>
	</div>
	<div style="width:60px; float:left; display:none;" id="datepic">
		<span class="whiteTextBold">
			<img src="images/calendar.gif" title="Select Date" id="jscal_trigger_date_start" align="bottom" style="cursor:pointer;" />
		</span>
	</div>
	<div style="width:120px; float:left"></div>
   </div>
   <div class="search_width">
 <div class="search_48_head" style="width:55%">Search By </div>
 </div>
 <div class="search_100" style="height:20px;" >
 <div style="width:180px; float:left">
   <input type="radio" name="rsearchby" value="DateUpdated" id="rsearchby" /> Date Updated
   <input type="radio" name="rsearchby" value="LastLogin" id="rsearchby" /> Last Login  </div> 
   </div>
   <div class="search_width">
 <div class="search_48_head" style="width:55%">Show Profiles With  </div>
 </div>
 <div class="search_100" style="height:20px;" >
 <div style="width:180px; float:left">
   <input type="checkbox" name="chkphoto" value="Photo" id="chkphoto" /> Photo
   <input type="checkbox" name="chkhoro" value="Horoscope" id="chkhoro" /> Horoscope  </div> 
   </div>
 <div class="search_line"> </div>  <div class="sch_plus" ><img src="./images/minus.gif" width="13" height="13" onClick="div_tab('others','2','2');"/>  Fewer options </div>
 </div> </div>
 
 
<div class="sch_plus" id="others2"> <img src="./images/plus.gif" width="13" height="13" onClick="div_tab('others','2','1');"/><span class="style5"> More options (Photo, horoscope) </span></div>

 </div>
<div style="padding-top:4px; padding-bottom:4px;width:100%;" align="center">
<input type="submit" value="Search" id="Submit" class="s_btn"  />
</div>
 </div>
 </td>
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
</html>

<script type="text/javascript">
function dateInRange1(dateIn){
	var inputDate = dateIn;
	var today = new Date();
	var compareToday = compareDatesOnly(inputDate, today);
	if (compareToday > 0) {
		return(true);
	}
}
function compareDatesOnly(date1, date2) {
	var year1 = date1.getYear();
	var year2 = date2.getYear();
	var month1 = date1.getMonth();
	var month2 = date2.getMonth();
	var day1 = date1.getDate();
	var day2 = date2.getDate();

	if (year1 < year2) {
		return -1;
	}
	if (year2 < year1) {
		return -1;
	}

	//years are equal
	if (month1 < month2) {
		return -1;
	}
	if (month2 < month1) {
		return -1;
	}

	//years and months are equal
	if (day1 < day2) {
		return -1;
	}
	if (day2 < day1) {
		return -1;
	}

	//days are equal
	return -1;
}
</script>

<script type="text/javascript">
Calendar.setup ({
	inputField : "jscal_field_date_start", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_date_start", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})

</script>