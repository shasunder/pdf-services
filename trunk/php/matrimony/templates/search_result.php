<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body onLoad="timedCount();">
<div class="page" id="wholedisplay">
<br /><table  border="0" cellpadding="0" cellspacing="0"  width="700px">
<tr>
<td valign="top"> 
<form name="editProfile">

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="25"><span style="width:25px; height:25px; float:right;"><img src="" /></span></td>
<td  background="">&nbsp;</td>
<td width="31"><span style="width:25px; height:25px; float:left;"><img src="" /></span></td>
</tr>
<tr>
<td background=""></td>
<td>

<div  class="sch_menu_t1">
<div class="schmenu_lt" ></div>
<div class="schmenu_cr"><div class="schmenu_highlight" ><a href="search.php?type=gs" class="schmenu_active"> General Search </a></div></div>
<div class="schmenu_rt" ></div>
<div class="schmenu_lt" ></div>
<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=as"> Advanced Search </a> </div></div>
<div class="schmenu_rt" ></div>
<div class="schmenu_lt" ></div>
<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=ps"> By Profile ID </a> </div></div>
<div class="schmenu_rt" ></div>
<div class="schmenu_lt" ></div>
<div class="schmenu_cr"><div class="schmenu" ><a href="search.php?type=kes"> By Keyword(s) </a> </div></div>
<div class="schmenu_rt" ></div>			
</div>
<div style="width:100%; border:0px solid green;">
<div class="sch_con" > 
<? if($commonsearch->total_items == 0){?>
<div style="height:100px;">
<div class="sch_prof" style="width:98%;height:20px;text-align:center;padding-top:20px;color:#990000;font-weight:bold;font-size:12px;">Sorry , Search Result is Empty.</div>
</div>
<? } else { ?>	<div style="height:15px;"> </div>		
<div class="sch_b_arrow"><?	if ($commonsearch->prev_page >= 1) { ?>
<div style='float:left;'>
	<a><img src="images/l_arrow.jpg" style="border:0px;cursor:pointer;" onClick="searchlimit('<?= $commonsearch->pagename?>','<?= $commonsearch->limit?>','<?= $commonsearch->prev_page?>','<?php if($_REQUEST['searchindex'] != ""){echo $_REQUEST['searchindex'];}else{echo $_REQUEST['stype1']; }?>');"/> </a>
</div> <? } else {
echo ("<div style='float:left; padding-bottom:0px;border:0px solid blue;'>
						<img src='images/l_arrow_url.gif' style='border:0px;cursor:pointer;'/></div>");}
echo "<div style='float:left;padding-left:10px;padding-right:10px;'>".$commonsearch->pageval." - ".$commonsearch->endval." of ".$commonsearch->totalval."</div>";					
if ($commonsearch->endval >= ($commonsearch->total_items)) {
echo ("<div style='float:left;'><img src='images/r_arrow_url.gif' style='border:0px;cursor:pointer;'/></div>");} else { ?>
<div style="float:left;">
	<a href="javascript:void(0)"><img src="images/r_arrow.jpg"  style="border:0px;cursor:pointer;" onClick="searchlimit('<?= $commonsearch->pagename?>','<?= $commonsearch->limit?>','<?= $commonsearch->next_page?>','<?php if($_REQUEST['searchindex'] != ""){echo $_REQUEST['searchindex'];}else{echo $_REQUEST['stype1']; }?>');"/></a>
</div><? } ?>
</div><br />
<div class="sch_s_v">
	<div class="sch_select_all">
	<input name="chkall[]" id="chkall" type="checkbox" value="" />  Select All </div> 
	<div class="sch_view"> Forward </div>
</div>
<div class="sch_border"> </div>
<? $i = 0; for($j=0;$j<count($commonsearch->page_val);$j++){ $i++; ?>				
<div style="height:225px;" >
<div class="sch_s_v">
	<div class="sch_select_all"><input name="chkthis[]" id="chkthis" type="checkbox" value="" />  Select this Profile </div>
	<div class="sch_view"> 
		<a href="javascript:void(0)" onClick="similar_result('<?= $commonsearch->pagename?>','similar','ss','<?=$commonsearch->page_val[$j][Gender];?>','<?= $commonsearch->page_val[$j][Age];?>','<?= $commonsearch->page_val[$j][Height];?>','<?= $commonsearch->page_val[$j][Religion];?>','<?= $commonsearch->page_val[$j][CastDivision];?>','<?= $commonsearch->page_val[$j][Subcaste];?>','<?= $commonsearch->page_val[$j][Star];?>','<?= $commonsearch->page_val[$j][Raasi];?>','<?= $commonsearch->page_val[$j][City];?>','<?= $commonsearch->page_val[$j][State];?>','<?= $commonsearch->page_val[$j][ResidingCountry];?>','<?= $commonsearch->page_val[$j][EducationQual];?>','<?= $commonsearch->page_val[$j][EducationSpecialization];?>');" style="text-decoration:none;" class="prof-head">View Similar Profile</a> 
	</div>
</div><br />
<div <? if (($i % 2) == 0) { echo $divcolor = "class='sch_box_o'"; } else { echo $divcolor = "class='sch_box'";	}?>>
	<div class="prof_full" >
	<? $commonsearch->image_fetch($commonsearch->page_val[$j][ProfileId],'sr'); if($commonsearch->imgnum != 0){ ?>
		<div  class="sch_img" id="imgdiv_<?=j;?>" >
			<? if($_SESSION['valid']=='loginvalid'){?>
				<a href="imageView.php?pid=<?= $commonsearch->page_val[$j][ProfileId];?>" target="_blank" onClick="window.open(this.href,'newwindow','width=600,height=570,scrollbars=no,resize=0');return false;">
			<?  } else {?>
				<a  href="login.php");>
			<?php }?>
			<img src="member_image/<?= $commonsearch->img_data[0][image_thumb]; ?>" width="85" height="87" name="img_<?=$j;?>" style="border:1px solid  #CCCCCC;" onMouseOver="document.getElementById('show<?=$j?>').style.display='';" onMouseOut="document.getElementById('show<?=$j?>').style.display='none';"/></a></div>
			<input type="hidden" name="txtimgcnt_<?=$j;?>" id="txtimgcnt_<?=$j;?>" value="1" />
				<div style="position:relative;"> 
			<? $browser = get_browser(); if($browser->browser=="IE"){ ?>
				<div style='position:absolute; display:none; border:2px solid #126569; z-index:5000;  top:15px;left:0px; width:130px; height:128px; cursor:pointer;' id='show<?= $j;?>'>    
			<? }else { ?>
				<div style='position:absolute; display:none; border:2px solid #126569; z-index:5000;  top:15px;left:110px; width:130px; height:128px; cursor:pointer;' id='show<?= $j;?>'>
			<? } ?><img src="member_image/<?=$commonsearch->img_data[0][image_thumb];?>" style='width:130px;height:128px;border:0px;' name="lgt_img_<?=$j?>"/> </div>	
				</div>								
			<? } else { ?>							
				<div  class="sch_img" ><? if($commonsearch->page_val[$j][Gender] == M){?>
					<img src="images/boy_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? }else{?>
					<img src="images/lady_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? } ?>
				</div>
		<? } ?>
		<div class="sch_prof">
			<span class="prof-head"><?= $commonsearch->page_val[$j][FirstName]." ".$commonsearch->page_val[$j][MiddleName]." ".$commonsearch->page_val[$j][LastName];?>(<?= $commonsearch->page_val[$j][ProfileId];?>)</span>
			<span class="prof_text"><br /><?= $commonsearch->page_val[$j][Age];?> yrs,<?= $commonsearch->page_val[$j][Height];?>
			| <?= $commonsearch->page_val[$j][Religion];?>: <?= $commonsearch->page_val[$j][CastDivision];?> 
			<? if($commonsearch->page_val[$j][Subcaste]!=''){ ?> | Subcaste: <?= $commonsearch->page_val[$j][Subcaste];?><? } ?> <br />
			| <?= $commonsearch->page_val[$j][Star];?>:  <?= $commonsearch->page_val[$j][Raasi];?> 
			| <?= $commonsearch->page_val[$j][City];?>, <?= $commonsearch->page_val[$j][State];?>, <?= $commonsearch->page_val[$j][ResidingCountry];?> 
			| <?= $commonsearch->page_val[$j][EducationQual];?> | <?= $commonsearch->page_val[$j][EducationSpecialization];?> <br /></span>
			<? if($_SESSION['valid']=='loginvalid'){?> 
			<?php if($vprofile < $pcount ){?>
				<a style="cursor:pointer" onClick="profilecount('view','<?= $commonsearch->page_val[$j][ProfileId];?>');");><span class="red">Full Profile >></span></a>
			<? } } else {?>
			<a style="cursor:pointer" href="login.php");><span class="red">Full Profile >></span></a>
			<?php }?>
		</div>
	</div><? if($commonsearch->imgnum != 0){ ?>
	<div  style="height:20px; width:80px; padding-left:23px;">
		<div class="sch_l_arrow"><img src="images/l_arrow_url.gif" onClick="if(document.getElementById('txtimgcnt_<?=$j;?>').value > 1){if(document.getElementById('txtimgcnt_<?=$j;?>').value==2){srcimgprev('<?= $commonsearch->img_data[0][image_thumb]; ?>','<?=$j;?>')} else if(document.getElementById('txtimgcnt_<?=$j;?>').value==3){srcimgprev('<?= $commonsearch->img_data[1][image_thumb]; ?>','<?=$j;?>')} else if(document.getElementById('txtimgcnt_<?=$j;?>').value==4){srcimgprev('<?= $commonsearch->img_data[2][image_thumb]; ?>','<?=$j;?>')} else if(document.getElementById('txtimgcnt_<?=$j;?>').value==5){srcimgprev('<?= $commonsearch->img_data[3][image_thumb]; ?>','<?=$j;?>')}};" name="imglarr_<?=$j?>" style="cursor:pointer;"/></div> 
		<div class="sch_link"><span id="sp_<?= $j?>"> 1</span> -  <?=$commonsearch->imgnum;?> </div>
		<div class="sch_r_arrow"><? if($commonsearch->imgnum == 1){ ?><img src="images/r_arrow_url.gif"/><? } else { ?><img src="images/r_arrow.jpg" onClick="if(document.getElementById('txtimgcnt_<?=$j;?>').value < <?= $commonsearch->imgnum;?>){if(document.getElementById('txtimgcnt_<?=$j;?>').value==1){srcimgnext('<?= $commonsearch->img_data[1][image_thumb]; ?>','<?=$j;?>','<?=$commonsearch->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$j;?>').value==2){srcimgnext('<?= $commonsearch->img_data[2][image_thumb]; ?>','<?=$j;?>','<?=$commonsearch->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$j;?>').value==3){srcimgnext('<?= $commonsearch->img_data[3][image_thumb]; ?>','<?=$j;?>','<?=$commonsearch->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$j;?>').value==4){srcimgnext('<?= $commonsearch->img_data[4][image_thumb]; ?>','<?=$j;?>','<?=$commonsearch->imgnum;?>')}};" name="imgrarr_<?=$j?>" style="cursor:pointer;"/><? } ?></div>
	</div><? } ?>
</div><br />
<div class="sch_s_v">
	<div class="sch_select_all"></div>
	<? if($_SESSION['valid']=='loginvalid' && $commonsearch->page_val[$j][Gender]!=$_SESSION['Gender']){ ?>
	<div class="prof_full" style="height:40px; margin-right:10px;" align="right">
	<? $commonsearch->sendmsg($commonsearch->page_val[$j][ProfileId],$_SESSION['ProfileId'],3);
	if($commonsearch->msgnum>0){ ?>
		<input name="button"  type="button" class="s_btn" style="text-decoration:none;cursor:pointer;" onClick="document.getElementById('fade').style.display='block';msg_light('./ajax/message_class.php','<?= $_SESSION['ProfileId']?>','Reply','N','<?= $commonsearch->page_val[$j][ProfileId];?>','message','');" value="Sent Message" />
	<? } ?>
		<input name="button"  type="button" class="s_btn" style="text-decoration:none;cursor:pointer;" onClick="document.getElementById('fade').style.display='block';msg_light('./ajax/search_express.php','<?= $_SESSION['ProfileId']?>','','','<?= $commonsearch->page_val[$j][ProfileId];?>','','express');" value="Express Interest" />
      <!--    <input name="button"  type="button" class="s_btn" style="text-decoration:none;cursor:pointer;" onclick="profilesave('<?= $_SESSION['ProfileId']?>','<?= $commonsearch->page_val[$j][ProfileId];?>')" value="saveProfile" />  -->
	</div>
	<? } ?>
	</div>
	<div class="sch_border_b"> </div>
</div><br /><? } ?>
<div class="sch_s_v">
	<div class="sch_select_all"><input name="" type="checkbox" value="" /> Select All</div> 
	<div class="sch_view"> Forward </div> 
</div> <br />
<div class="sch_b_arrow" id="pagediv"><? if ($commonsearch->prev_page >= 1) { ?>
	<div style='float:left;'>
		<a><img src="images/l_arrow.jpg" style="border:0px;cursor:pointer;" onClick="searchlimit('<?= $commonsearch->pagename?>','<?= $commonsearch->limit?>','<?= $commonsearch->prev_page?>','<?=$_REQUEST['searchindex']?>');"/> </a>
	</div> 
	<?  } else { echo ("<div style='float:left; padding-bottom:0px;border:0px solid blue;'>
								<img src='images/l_arrow_url.gif' style='border:0px;'/></div>");}
	echo "<div style='float:left;padding-left:10px;padding-right:10px;'>" .$commonsearch->pageval." - ".$commonsearch->endval." of ".$commonsearch->totalval."</div>";					
	if ($commonsearch->endval >= ($commonsearch->total_items)) {
	echo ("<div style='float:left;'><img src='images/r_arrow_url.gif' style='border:0px;'/></div>");} else { ?>
	<div style="float:left;">
		<a href="javascript:void(0)"><img src="images/r_arrow.jpg" style="border:0px;cursor:pointer;" onClick="searchlimit('<?= $commonsearch->pagename?>','<?= $commonsearch->limit?>','<?= $commonsearch->next_page?>','<?=$_REQUEST['searchindex']?>');"/></a>
	</div><? } ?>
	</div><br />
	<? } ?>
	</div>
</div>

</td>
<td background="">&nbsp;</td>
</tr>
<tr>
<td><span style="width:25px; height:25px; float:right;"><img src="" width="25" height="25" /></span></td>
<td background="">&nbsp;</td>
<td><span style="width:25px; height:25px; float:left;"><img src="" width="25" height="25" /></span></td>
</tr>
</table> 
</form>
</td>
<td width="205" valign="top" height="">
<div id="headend" style="display:none;">:####:</div>
<div id="adddiv">
	<div id="rightadd" style=" position:absolute; top:170px; right:200px; width:230px; z-index:1002; float:left;" >
		<?php //include("advertisement/add_right.php");  ?>
		<br clear="all"/>
	</div>
</div>
<div id="headend" style="display:none;">:####:</div>
</td>
</tr>
</table>
</body>