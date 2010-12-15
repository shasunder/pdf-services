<body onLoad="timedCount();">
<form name="profileidsearch" action="search.php" method="post">
<br /><table width="809" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="622" valign="top"> 
<table width="180" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif" width="25" height="25" /></span></td>
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
				<div class="schmenu_cr"><div class="schmenu_highlight" ><a href="search.php?type=ps" class="schmenu_active"> By Profile ID </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=kes"> By Keyword(s) </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
			</div>
			<input type="hidden" name="searchindex" id="searchindex" value="profileidsrc" />
			<div class="sch_con">
				<br>
				<div class="sch_s_head" ><strong> Profile ID Search </strong></div><br />
				<div class="search_100" > Enter the Profile ID of the member whose profile you would like to see. </div> <br />
				<div class="search_line"> </div>

				<div style="height:70px;"> 
					<div class="search_width1" style="height:27px;">
						<div class="search_16_head">Profile ID    
							<label for="textfield"></label>
						</div> 
						<div class="search_24"> 
							<input name="txtproid" type="text" class="textbox" id="txtproid" style="width:130px;"  onkeyup="document.getElementById('txtproid').value=document.getElementById('txtproid').value.toUpperCase();" onBlur="txt_empty('txtproid','proidError','Please Enter Profile ID');" maxlength="10"/>
						</div>
						<div class="search_24">
							<label for="Submit"></label>
							<input type="submit" name="search" class="s_btn" value="Search" onClick="return Submit('txtproid','proidError','Please Enter Profile ID','');"/>
						</div>
					</div>

					<div class="search_width_err">
						<div class="search_16_red"></div> 
						<div class="search_48_red" id="proidError"></div>
					</div>
					<div class="search_line"> </div> 
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