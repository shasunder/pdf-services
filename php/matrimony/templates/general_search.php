
<form name="search" action="<?= $_SERVER['PHP_SELF']?>" method="post">
<br /><table width="809" border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td width="100%" valign="top"> 
      <table width="100%" border="0"  cellspacing="0" cellpadding="0">
        <tr>
          <td><div  class="sch_menu_t1">
            <div class="schmenu_lt" ></div>
            <div class="schmenu_cr">
              <div class="schmenu_highlight" ><a href="search.php?type=gs" class="schmenu_active"> General Search </a> </div>
            </div>
            <div class="schmenu_rt" ></div>
            <div class="schmenu_lt" ></div>
            <div class="schmenu_cr">
              <div class="schmenu" ><a href="search.php?type=as"> Advanced Search </a> </div>
            </div>
            <div class="schmenu_rt" ></div>
            <div class="schmenu_lt" ></div>
            <div class="schmenu_cr">
              <div class="schmenu" ><a href="search.php?type=ps"> By Profile ID </a> </div>
            </div>
            <div class="schmenu_rt" ></div>
            <div class="schmenu_lt" ></div>
            <div class="schmenu_cr">
              <div class="schmenu" ><a href="search.php?type=kes"> By Keyword(s) </a> </div>
            </div>
            <div class="schmenu_rt" ></div>
          </div>
                <input type="hidden" name="searchindex" id="searchindex" value="generalsrc" />
                <div class="sch_con" style="height:1000px;"><br>
                  <div class="sch_s_head" ><strong> General Search </strong></div>
                  <br />
                  <div style="height:159px;">
                    <div class="search_width">
                      <div class="search_48_head">Looking for </div>
                      <div class="search_48_head">Age </div>
                    </div>
                    <div class="search_width1">
                      <div class="search_48">
                        <input name="gender" id="fgender" value="F" type="radio" checked="checked"  onClick="gen('fgender','txtagefrm','txtageto','18','40');"/>
                        Female
                        <input name="gender" id="mgender" value="M" type="radio" onClick="gen('mgender','txtagefrm','txtageto','21','40');"/>
                        Male</div>
                      <div class="search_48">From
                        <label for="textfield"></label>
                          <input name="txtagefrm" type="text" class="textbox" id="txtagefrm" style="width:35px;" value="18"  onKeyUp="return char_val(this,'0123456789');"/>
                        To
                        <input name="txtageto" type="text" class="textbox" id="txtageto"  value="40" style="width:35px;"  onKeyUp="return char_val(this,'0123456789');" onBlur="val_Age('txtagefrm','txtageto','ageError','Please Enter Correct Age','The difference between a partners age should not exceed 22 years');"/>
                        Years </div>
                    </div>
                    <div class="search_width">
                      <div class="search_48_red"></div>
                      <div class="search_48_red" id="ageError"></div>
                    </div>
                    <div class="search_width">
                      <div class="search_48_head" style="width:90%">Height </div>
                    </div>
                    <div class="search_width">
                      <div class="search_48" style="width:30%">
                        <label>
                        <select class="selecttbox" name="ddlheightfrm"  id="ddlheightfrm"size="1"  tabindex="5" style="width: 165px;" >
                        </select>
                        </label>
                      </div>
                      <div class="search_48" style="width:5%" >to</div>
                      <div class="search_48" style="width:30%">
                        <label>
                        <select class="selecttbox" name="ddlheightto"  id="ddlheightto"size="1"  tabindex="5" style="width: 165px;" >
                          <option value="7ft - 213cm" selected="selected">7ft - 213cm</option>
                        </select>
                        </label>
                      </div>
                    </div>
                    <div class="search_width">
                      <div class="search_48_head" style="width:90%">Maritial Status </div>
                    </div>
                    <div class="search_100" >
                      <input type="checkbox" name="chkany" value="DM" id="any1" />
                      Any
                      <input type="checkbox" name="chkunmarried" value="UnMarried" id="any2" checked="checked"/>
                      Un Married
                      <input type="checkbox" name="chkwidow" value="Widow\Widower" id="any3" />
                      Widow\Widower
                      <input type="checkbox" name="chkdivorced" value="Divorced" id="any4" />
                      Divorced
                      <input type="checkbox" name="chkseperated" value="Seperated" id="any5" />
                      Seperated </div>
                    <div class="search_line"> </div>
                  </div>
                  <input name="ddlReligion" type="hidden" value="Hindu"/>
                  <!-- div style="height:50px;">
                    <div class="search_width">
                      <div class="search_48_head" style="width:55%">Religion </div>
                      <div class="search_48" style="width:30%"> </div>
                    </div>
                    <div class="search_width">
                      <div class="search_48_red" style="width:55%">
                        <label>
                        <select name="ddlReligion" class="selecttbox" id="ddlReligion" onChange="FillCommunity('ddlReligion','ddlCommunity');">
                        </select>
                        </label>
                      </div>
                      <div class="search_48_red"style="width:30%"></div>
                    </div>
                  </div -->
                  <div style="">
                    <!-- div class="search_width">
                      <div class="search_48_head" style="width:55%">Caste/ Division </div>
                    </div>
                    <div class="search_width1" style="height:90px; ">
                      <div class="search_48" style="width:98%; padding-left:1px;">
                        <table width="551" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="227" align="center"><select name="ddlCommunity" size="5" multiple="multiple" id="ddlCommunity" style="width:210px; height:80px;" class="multi_box_text">
                              </select>
                            </td>
                            <td width="90" align="center"><input name="button" type="button"  class="s_btn" style="width:60px; text-align:center"  onClick="if(document.getElementById('ddlCommunity').selectedIndex!=0){addOptions('ddlCommunity','ddlCommunityout');hidden('ddlCommunityout','communityhd');} " value="Add"/>
                                <br/>
                                <br/>
                                <input name="button" type="button"  class="s_btn" style="width:60px;" onClick="RemoveOption('ddlCommunity','ddlCommunityout');hidden('ddlCommunityout','communityhd');" value="Remove"/></td>
                            <td width="234" align="center"><select name="ddlCommunityout" size="5" multiple="multiple" id="ddlCommunityout" style="width:210px; height:80px;" class="multi_box_text">
                            </select></td>
                          </tr>
                        </table>
                      </div>
                    </div -->
                    
                     <input type="hidden" name="ddlCommunityout" id="communityhd" value="" />
                    
                        <input type="hidden" name="communityhd" id="communityhd" value="" />
                    
                    <div class="search_width">
                      <div class="search_48_red" style="width:55%"></div>
                      <div class="search_48_red" style="width:30%"></div>
                    </div>
                    <div class="search_width">
                      <div class="search_48_head">Sub Caste </div>
                      <div class="search_48_head"></div>
                    </div>
                    <div class="search_width">
                      <div class="search_48_head">
                        <label>
                        <input type="text" name="txtsubcaste" id="txtsubcaste" class="textbox" />
                        </label>
                      </div>
                      <div class="search_48_head"></div>
                    </div>
                    <div class="search_line"> </div>
                  </div>
                  <div style="height:450px;">
                    <div style="height:450px;">
                      <div style="height:450px;">
                        <div style="height:160px; margin-top:10px;">
                          <div class="search_width">
                            <div class="search_48_head" style="width:55%">Citizenship</div>
                          </div>
                          <div class="search_width1" style="height:90px;">
                            <div class="search_48" style="width:98%; padding-left:1px;">
                              <table width="551" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="227" align="center"><select name="ddlcitizen" size="5" multiple="multiple" id="ddlcitizen" style="width:210px; height:80px;" class="multi_box_text">
                                      <?
				$country=explode("|",$countryValue);
				$countCountry=count($country);				    									   					    
				for($i=0;$i<count($country);$i++)
				{ ?>
                                      <option style="width:112px;" value='<?=$i;?>'>
                                        <?= $country[$i];?>
                                      </option>
                                      <? }							
		?>
                                    </select>
                                  </td>
                                  <td width="90" align="center"><input name="button" type="button"  class="s_btn" style="width:60px; text-align:center"  onClick="if(document.getElementById('ddlcitizen').selectedIndex!=0){addOptions('ddlcitizen','ddlcitizenout');hidden('ddlcitizenout','citizenhd');}" value="Add"/>
                                      <br/>
                                      <br/>
                                      <input name="button" type="button"  class="s_btn" style="width:60px;"onClick="RemoveOption('ddlcitizen','ddlcitizenout');hidden('ddlcitizenout','citizenhd');" value="Remove"/></td>
                                  <td width="234" align="center"><select name="ddlcitizenout" size="5" multiple="multiple" id="ddlcitizenout" style="width:210px; height:80px;" class="multi_box_text">
                                    </select>
                                      <input type="hidden" name="citizenhd" value="" id="citizenhd"/></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <div class="search_width">
                            <div class="search_48_red" style="width:55%"></div>
                            <div class="search_48_red" style="width:30%"></div>
                          </div>
                          <div class="search_line"> </div>
                        </div>
                        <div style="height:148px;">
                          <div class="search_width">
                            <div class="search_48_head" style="width:55%">Country Living In </div>
                          </div>
                          <div class="search_width1" style="height:90px;">
                            <div class="search_48" style="width:98%; padding-left:1px;">
                              <table width="551" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="227" align="center"><select name="ddlcountry" size="5" multiple="multiple" id="ddlcountry" style="width:210px; height:80px;" class="multi_box_text">
                                      <? 	for($i=0;$i<count($country);$i++){
				echo "<option value='$i'>$country[$i]</option>"; } ?>
                                    </select>
                                  </td>
                                  <td width="90" align="center"><input name="button" type="button"  class="s_btn" style="width:60px; text-align:center" onClick="if(document.getElementById('ddlcountry').selectedIndex!=0){addOptions('ddlcountry','ddlcountryout');hidden('ddlcountryout','countryhd');}" value="Add"/>
                                      <br/>
                                      <br/>
                                      <input name="button" type="button"  class="s_btn" style="width:60px;" onClick="RemoveOption('ddlcountry','ddlcountryout');hidden('ddlcountryout','countryhd');" value="Remove"/></td>
                                  <td width="234" align="center"><select name="ddlcountry" size="5" multiple="multiple" id="ddlcountryout" style="width:210px; height:80px;">
                                    </select>
                                      <input type="hidden" name="countryhd"  id="countryhd" value="" /></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <div class="search_width">
                            <div class="search_48_red" style="width:55%"></div>
                            <div class="search_48_red" style="width:30%"></div>
                          </div>
                          <div class="search_line"> </div>
                        </div>
                        <div style="height:148px;">
                          <div class="search_width">
                            <div class="search_48_head" style="width:55%">Education</div>
                          </div>
                          <div class="search_width1" style="height:90px;">
                            <div class="search_48" style="width:98%; padding-left:1px;">
                              <table width="551" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="227" align="center"><select name="ddleducategory" size="5" multiple="multiple" id="ddleducategory" style="width:210px; height:80px;" class="multi_box_text">
                                    </select>
                                  </td>
                                  <td width="90" align="center"><input name="button" type="button"  class="s_btn" style="width:60px; text-align:center" onClick="if(document.getElementById('ddleducategory').selectedIndex!=0){addOptions('ddleducategory','ddleducategoryout');hidden('ddleducategoryout','categoryhd');}" value="Add"/>
                                      <br/>
                                      <br/>
                                      <input name="button" type="button"  class="s_btn" style="width:60px;" onClick="RemoveOption('ddleducategory','ddleducategoryout');hidden('ddleducategoryout','categoryhd');" value="Remove"/></td>
                                  <td width="234" align="center"><select name="ddleducategoryout" size="5" multiple="multiple" id="ddleducategoryout" style="width:210px; height:80px;" class="multi_box_text">
                                    </select>
                                      <input type="hidden" name="categoryhd"id="categoryhd" value="" /></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <div class="search_width">
                            <div class="search_48_red" style="width:55%"></div>
                            <div class="search_48_red" style="width:30%"></div>
                          </div>
                          <div class="search_line"> </div>
                        </div>
                      </div>
                      <div style="height:188px;  border:0px solid #999999; float:left; margin-top:12px;">
                        <div class="sch_s_head" style="height:20px; margin:0px; padding:3px 0 0 10px; background:#f8ca9e; color:#FFFFFF" ><strong> Show Result </strong>Based On </div>
                        <div class="search_width">
                          <div class="search_48_head" style="width:55%">Date Posted </div>
                        </div>
                        <div class="search_100" style="height:20px;" >
                          <div style="width:120px; float:left">
                            <input type="radio" name="rpostdate" value="All" checked="checked" id="rpostdate" onClick="hide_placediv('postafter','datepic');" />
                            All
                            <input type="radio" name="rpostdate" value="PostAfter" id="rpostdate" onClick="show_placediv('postafter','datepic');"/>
                            Post After </div>
                          <div style="width:90px; float:left; display:none" id="postafter">
                            <input name="jscal_field_date_start" id="jscal_field_date_start" type="text" readonly="readonly" value="" style="width:70px;"/>
                          </div>
                          <div style="width:60px; float:left; display:none;" id="datepic"> <span class="whiteTextBold"> <img src="images/calendar.gif" title="Select Date" id="jscal_trigger_date_start" align="bottom" style="cursor:pointer;" /> </span> </div>
                          <div style="width:120px; float:left"></div>
                        </div>
                        <div class="search_width">
                          <div class="search_48_head" style="width:55%">Search By </div>
                        </div>
                        <div class="search_100" style="height:20px;" >
                          <div style="width:180px; float:left">
                            <input type="radio" name="rsearchby" value="DateUpdated" id="rsearchby" />
                            Date Updated
                            <input type="radio" name="rsearchby" value="LastLogin" id="rsearchby" />
                            Last Login </div>
                        </div>
                        <div class="search_width">
                          <div class="search_48_head" style="width:55%">Show Profiles With </div>
                        </div>
                        <div class="search_100" style="height:20px;" >
                          <div style="width:180px; float:left">
                            <input type="checkbox" name="chkphoto" value="Photo" id="chkphoto" />
                            Photo
                            <input type="checkbox" name="chkhoro" value="Horoscope" id="chkhoro" />
                            Horoscope </div>
                        </div>
                        <br />
                        <!-- <div class="search_line"> </div>-->
                        <div class="search_width">
                          <div class="search_48_head" style="width:55%">
                        <?php if((isset($_SESSION['valid']))&&(isset($_SESSION['ProfileId'])))
                        {?>
                           Search Title:
                           </div>
                           </div>
                           <div class="search_100" style="height:20px;" >
                          <div style="height:30px;">
                            <input type="text" id="savetitle1" name="savetitle1" value=""/>
                            <div id="titleerr"></div>
                            </div>
                            <br />
                        	<input name="generalsave" type="submit" class="s_btn" style="text-align:center" value="Save Search" onClick="return titlesave('savetitle1');"/>
                            
                        	 <input name="submit" type="submit"  class="s_btn" style="width:60px; text-align:center" value="Search" />
                        	
                        <?php }
                        else{?>
                        	 <input name="submit" type="submit"  class="s_btn" style="width:60px; text-align:center" value="Search" />
                        <?php }?>
                             
                             
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div></td>
                
                 
        </tr>
    </table>
</td>
<td width="241" valign="top">
<div id="rightadd" style="width:189px; z-index:1002; float:right;" >
<?php include("advertisement/add_right.php");  ?>
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

<script language="javascript">
FillEducation('ddleducategory');FillReligion('ddlReligion');FillFeet('ddlheightfrm');FillFeet('ddlheightto');timedCount();
</script>

<script type="text/javascript">
Calendar.setup ({
	inputField : "jscal_field_date_start", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_date_start", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})

</script>