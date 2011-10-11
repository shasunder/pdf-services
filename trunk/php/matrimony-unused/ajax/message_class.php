<?php
include("../common/config.inc.php");
include("../common/function.php");
session_start();
@ob_start();

class interests extends matrimony
{
	function interests(){
		$this->action = $_REQUEST['act'] ? $_REQUEST['act'] : "Received";
		$this->status = $_REQUEST['status'] ?  $_REQUEST['status'] : "N";
		$this->inter_msg_id = $_REQUEST['inter_msg_id'] ? $_REQUEST['inter_msg_id'] : "";
		$this->pid  = $_REQUEST['pid'] ? $_REQUEST['pid'] : "";
		$this->view  = $_REQUEST['view'] ? $_REQUEST['view'] : "Show";
		$this->msgStatus = $_REQUEST['msgStatus'] ? $_REQUEST['msgStatus'] : "RD";
		$this->to_id = $_REQUEST['to_id'] ? $_REQUEST['to_id'] : "";
		$this->msgID = $_REQUEST['msgID'] ? $_REQUEST['msgID'] : "";		
		$this->subject = $_REQUEST['subject'] ? $_REQUEST['subject'] : "";
		$this->text = $_REQUEST['text'] ? $_REQUEST['text'] : "";		
	}
	function getCount(){				
		$interest_status = array("1"=>"N","2"=>"RD","3"=>"AC","4"=>"DE");
		$message_status = array("1"=>"N","2"=>"RE","3"=>"RP","4"=>"TR");
		$tbname = "tm_message";
		if($this->action == 'Received'){
		$this->whr = "To_ProfileId = '".$this->pid."'";
			for($i=1;$i<=count($message_status);$i++){
				$whrarg = " where ".$this->whr." and Message_Status='".$message_status[$i]."' and Message_Cstatus not in('IA','B')";
				$dbfldarg = "Messages_ID";
				$this->switchqry($tbname,'SELECT',$whrarg,$dbfldarg);
				$this->rows[$message_status[$i]] = mysql_num_rows($this->qry_result);
			}
		} else if($this->action == 'Sent') {
			$this->whr = "Profile_ID = '".$this->pid."'";
			for($i=1;$i<=count($message_status);$i++){
				$whrarg = " where ".$this->whr." and Message_Status='".$message_status[$i]."' and Message_Cstatus not in('B')";
				$dbfldarg = "Messages_ID";
				$this->switchqry($tbname,'SELECT',$whrarg,$dbfldarg);
				$this->rows[$message_status[$i]] = mysql_num_rows($this->qry_result);
			}
		}
	}
	function getMessages(){
		if($this->action == 'Received'){
			$this->whr = "To_ProfileId = '".$this->pid."' and Message_Status='".$this->status."' and Message_Cstatus not in('IA','B') ORDER BY Message_DOC DESC ";
		} else if($this->action == 'Sent') {
			$this->whr = "Profile_ID = '".$this->pid."' and Message_Status='".$this->status."' and Message_Cstatus not in('B') ORDER BY Message_DOC DESC";
		}

		$this->tbname = "tm_message";
		$this->whrarg = " where ".$this->whr;
		$this->dbfldarg = "Profile_ID,To_ProfileId,date_format(Message_DOC,'%d %b %y') as senddate,Messages_ID,Message_Status,Message_Subject,Message_Content";
		$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);	

			$this->total_items = mysql_num_rows($this->qry_result);
			$this->pagename = basename($_SERVER['PHP_SELF']);
			$this->limit = $_GET['limit'];
			$this->page = $_GET['page'];
			
			if ((!$this->limit) || (is_numeric($this->limit) == false) || ($this->limit < 10) ||
			($this->limit > 50)) {
				$this->limit = 5;
			}
			if ((!$this->page) || (is_numeric($this->page) == false) || ($this->page < 0) ||
			($this->page > $this->total_items)) {
				$this->page = 1;
			}
			$this->total_pages = ceil($this->total_items / $this->limit);
			$this->set_limit = $this->page * $this->limit - ($this->limit);
			$this->sql_limit = " LIMIT $this->set_limit, $this->limit";
			$this->whrlimit = $this->whrarg.$this->sql_limit;
			$this->switchqry($this->tbname,'SELECT',$this->whrlimit,$this->dbfldarg);
			$this->prev_page = $this->page - 1;
			
			$this->pageval = $this->set_limit + 1;
			if ($this->total_items >= 5) {
			$this->endval = $this->set_limit + 5;
			if ($this->endval > $this->total_items) {
				$this->remval = $this->endval - $this->total_items;
				$this->endval = $this->pageval + (4 - $this->remval);}
			} else {
				$this->endval = $this->set_limit + $this->total_items;
			}
			$this->totalval = $this->total_items;
			
			$this->next_page = $this->page + 1;			

		$i=0;
		while($this->messages = mysql_fetch_assoc($this->qry_result)){
			$this->msg_val[$i]['Profile_ID'] = $this->messages['Profile_ID'];
			$this->msg_val[$i]['To_ProfileId'] = $this->messages['To_ProfileId'];
			$this->msg_val[$i]['senddate'] = $this->messages['senddate'];
			$this->msg_val[$i]['Messages_ID'] = $this->messages['Messages_ID'];
			$this->msg_val[$i]['Message_Status'] = $this->messages['Message_Status'];
			$this->msg_val[$i]['Message_Subject'] = $this->messages['Message_Subject'];
			$this->msg_val[$i]['Message_Content'] = $this->messages['Message_Content'];
			$i++;
		}		
	}
	function displayResult(){
		
		$reject = "class='menusubs'";$accept = "class='menusubs'";$pending = "class='menusubs'";$new = "class='menusubs'";
		
		if($this->status == "N"){
			$new = "class='menusubs_highlight'";
		} else if($this->status == "RE"){
			$pending = "class='menusubs_highlight'";
		} else if($this->status == "RP"){
			$accept = "class='menusubs_highlight'";
		} else if($this->status == "TR"){
			$reject = "class='menusubs_highlight'";
		}
?>
	<div class="menu_in">
     <div style="width:550px; padding-left:5px; height:17px; "><div style="float:left;cursor:pointer" id="a1"  onclick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','N','','','','','','');" <?=$new ?>>New (<?= $this->rows['N'];?>)</div><? if($this->action == 'Received'){ ?><div  style="float:left; position:relative; width:5px;"> | </div> <div style="float:left;cursor:pointer" onClick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','RE','','','','','','');" <?=$pending?>> Read (<?= $this->rows['RE'];?>)</div><? } if($this->action == 'Send'){ ?><div  style="float:left; position:relative; width:5px;"> | </div><div style="float:left;cursor:pointer" id="a3" onClick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','RP','','','','','','');" <?=$accept?>> Replied (<?= $this->rows['RP'];?>)</div><? } ?><div  style="float:left; position:relative; width:5px;"> | </div> <div style="cursor:pointer" id="a4" onClick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','TR','','','','','','');" <?= $reject?>> Rejected (<?= $this->rows['TR'];?>)</div></div>
<? if(count($this->msg_val) >0) { ?>
 <div class="mech_s_v">
  <div class="mech_b_arrow">
  <? if ($this->prev_page >= 1) { ?>
			<div style='float:left;'>
					<a><img src="images/l_arrow.jpg" style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->prev_page?>','');"/> </a>
			</div> 
       	<? 	} else { echo ("<div style='float:left; padding-bottom:0px;border:0px solid blue;' class='decor'><img src='images/l_arrow_url.gif' style='border:0px;'/></div>"); }
			echo "<div style='float:left;padding-left:10px;padding-right:10px;'>" . $this->pageval ." - " . $this->endval . " of " . $this->totalval . "</div>";
			if ($this->endval >= ($this->total_items)) {
				echo ("<div style='float:left;'><img src='images/r_arrow_url.gif' style='border:0px;'/></div>");
			} else { ?>
		       <div style="float:left;"><? print_r($argpostarr); ?>
					<a href="javascript:void(0)"><img src="images/r_arrow.jpg"  style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->next_page?>','');"/></a>
				</div>
			<? } ?>
  </div>
  </div>
  <br />
<!-- <div class="mech_s_v">  
<div class="mech_select_all_f"> <input name="" type="checkbox" value="" />  Select All  </div>
<div class="mech_view_f"> Delete All </div>
</div>-->
<!---Profile Starts Here-->
<? for($i=0;$i<count($this->msg_val);$i++){
	//while($this->messages = mysql_fetch_assoc($this->qry_result)){
		$msgID = $this->msg_val[$i]['Messages_ID'];

		if($this->action == 'Received'){				
			$PID = $this->msg_val[$i]['Profile_ID'];
		} else if($this->action == 'Sent') {
			$PID = $this->msg_val[$i]['To_ProfileId'];	
		}
		
		$tbname = "tm_profile";
		$whrarg = " where ProfileId='".$PID."'";
		$dbfldarg = "*";
		$this->switchqry($tbname,'SELECT',$whrarg,$dbfldarg);
		$this->messages_profile = mysql_fetch_assoc($this->qry_result);		
		$this->to_id = $this->messages_profile['ProfileId'];
?>
	<div class="menu_con">
	<div class="sch_border"> </div>
	<div style="height:210px;" ><div class="mech_s_v">  
	<div class="mech_select_all"> <input name="" type="checkbox" value="" /> Select this Profile </div>
	<div class="mech_view"> Delete <!--| View Similar Profile--> </div>
	</div><br />   
	<div <? if (($i % 2) == 0) { echo $divcolor = "class='sch_box'"; } else { echo $divcolor = "class='sch_box_o'";	}?>>
	<div class="prof_full" >
	
	
	
								<? $this->image_fetch($this->messages_profile['ProfileId'],'sr'); if($this->imgnum != 0){ ?>
								<div  class="sch_img" id="imgdiv_<?=i;?>" >
									<a href="imageView.php?pid=<?= $this->messages_profile['ProfileId'];?>" target="_blank" onClick="window.open(this.href,'newwindow','width=600,height=570,scrollbars=no,resize=0');return false;">
									<img src="member_image/<?= $this->img_data[0][image_thumb]; ?>" width="85" height="87" name="img_<?=$i;?>" style="border:1px solid  #CCCCCC;" onMouseOver="document.getElementById('show<?=$i?>').style.display='';" onMouseOut="document.getElementById('show<?=$i?>').style.display='none';"/></a></div>
									<input type="hidden" name="txtimgcnt_<?=$i;?>" id="txtimgcnt_<?=$i;?>" value="1" />
									<input type="hidden" name="txtrow_<?=$i;?>" id="txtrow_<?=$i;?>" value="<?=$i;?>" />
										<div style="position:relative;"> 
									<? $browser = get_browser(); if($browser->browser=="IE"){ ?>
										<div style='position:absolute; display:none; border:2px solid #126569; z-index:5000;  margin-top:0px;left:0px; width:130px; height:128px; cursor:pointer;' id='show<?=$i;?>'>
									<? }else {?>
										<div id='show<?= $i;?>' style="position:absolute; display:none; border:2px solid #126569; margin-top:0px;left:116px; width:130px; height:128px; ">
									<? } ?><img src="member_image/<?=$this->img_data[0][image_thumb];?>" style='width:130px;height:128px;border:0px;' name="lgt_img_<?=$i?>"/> </div>	</div>								
									<? } else { ?>							
										<div  class="sch_img" ><? if($this->messages_profile['Gender'] == M){?>
											<img src="images/boy_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? }else{?>
											<img src="images/lady_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? } ?>
										</div>
								<? } ?>


	<div class="sch_prof"> <span class="prof-head"><?= $this->messages_profile['FirstName']." ".$this->messages_profile['MiddleName']." ".$this->messages_profile['LastName'] ."(".$this->messages_profile['ProfileId'].")" ?></span><span class="prof_text"><br />
	<?= $this->messages_profile['Age'] ."yrs,". $this->messages_profile['Height'] ."|". $this->messages_profile['Religion'] ."-". $this->messages_profile['CastDivision']?>, <br />
	<? if( $this->messages_profile['Subcaste']!=''){ ?> Subcaste:<?= $this->messages_profile['Subcaste'] ."|"; } ?><?= $this->messages_profile['City'].",".  $this->messages_profile['State'].",". $this->messages_profile['ResidingCountry'] ."|". $this->messages_profile['EducationCat'] ."|". $this->messages_profile['Occupation'] ?><br />
	</span><a href="myProfile.php?page=view&pid=<?=$this->messages_profile['ProfileId']?>" target="_blank" style="text-decoration:none;"><span class="red">Full Profile >></span></a>
	</div>
	</div>
	
	<? if($this->imgnum != 0){ ?>
		<div  style="height:20px; width:80px; padding-left:23px;">
			<div class="sch_l_arrow"><img src="images/l_arrow_url.gif" onClick="if(document.getElementById('txtimgcnt_<?=$i;?>').value > 1){if(document.getElementById('txtimgcnt_<?=$i;?>').value==2){srcimgprev('<?= $this->img_data[0][image_thumb]; ?>','<?=$i;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==3){srcimgprev('<?= $this->img_data[1][image_thumb]; ?>','<?=$i;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==4){srcimgprev('<?= $this->img_data[2][image_thumb]; ?>','<?=$i;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==5){srcimgprev('<?= $this->img_data[3][image_thumb]; ?>','<?=$i;?>')}};" name="imglarr_<?=$i?>" style="cursor:pointer;"/></div> 
			<div class="sch_link"><span id="sp_<?= $i?>"> 1</span> -  <?=$this->imgnum;?> </div>
			<div class="sch_r_arrow"><? if($this->imgnum == 1){ ?><img src="images/r_arrow_url.gif"/><? } else { ?><img src="images/r_arrow.jpg" onClick="if(document.getElementById('txtimgcnt_<?=$i;?>').value < <?= $this->imgnum;?>){if(document.getElementById('txtimgcnt_<?=$i;?>').value==1){srcimgnext('<?= $this->img_data[1][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==2){srcimgnext('<?= $this->img_data[2][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==3){srcimgnext('<?= $this->img_data[3][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==4){srcimgnext('<?= $this->img_data[4][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')}};" name="imgrarr_<?=$i?>" style="cursor:pointer;"/><? } ?></div>
		</div>
	<? } ?>	
								
	<div style="height:20px; width:200px; padding-left:4px; float:left;">
	<!-- <div class="sch_link">  Sent Request on 04 oct 2008 </div> -->
	</div>
	</div><br />
	<div class="mech_s_v"><div class="mech_select_all">Msg :<?= $this->msg_val[$i]['senddate']." ".substr($this->msg_val[$i]['Message_Content'],0,10)?>...
		<a href="javascript:void(0)" onclick="document.getElementById('fade').style.display='block';msg_light('./ajax/message_details.php','<?= $this->pid?>','<?= $this->action?>','<?= $this->status;?>','<?= $this->msg_val[$i]['Messages_ID']?>','Show','msg');" style="text-decoration:none; color:#FF0000;"><b>More</b></a>
	</div>
	<div class="mech_view">
	<? if($this->action == 'Received' && $this->status != 'TR'){?>
	<input type="button" value="Reply" id="Submit" class="s_btn" onClick="document.getElementById('fade').style.display='block';msg_light('./ajax/message_class.php','<?= $this->pid?>','Reply','<?= $this->status;?>','<?= $this->to_id?>','message','');"/><? }?>&nbsp;&nbsp;&nbsp;<? if($this->status != 'TR'){?><input type="submit" value="Reject" id="Submit" class="s_btn" onclick="upd_messages('./ajax/message_class.php','<?= $this->pid?>','Reject','TR','<?= $this->to_id?>','','','<?= $this->msg_val[$i]['Messages_ID'];?>');"/>
	<? } if($this->status == 'TR'){?><input type="submit" value="Restore" id="Submit" class="s_btn" onclick="upd_messages('./ajax/message_class.php','<?= $this->pid?>','Reject','RE','<?= $this->to_id?>','','','<?= $this->msg_val[$i]['Messages_ID'];?>');"/>
	<? } ?>
	</div>
	</div>
	<div class="sch_border_b"></div>
	</div>
	</div>
<? }//whileLoop ?>
<!---Profile Ends Here-->
<!--<div class="mech_s_v">
<div class="mech_select_all_f"> <input name="" type="checkbox" value="" />Select All  </div>
<div class="mech_view_f"> Delete All </div>
</div>-->
 <div class="mech_s_v">
  <div class="mech_b_arrow">
  <? if ($this->prev_page >= 1) { ?>
			<div style='float:left;'>
					<a><img src="images/l_arrow.jpg" style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->prev_page?>','');"/> </a>
			</div> 
       	<? 	} else { echo ("<div style='float:left; padding-bottom:0px;border:0px solid blue;' class='decor'><img src='images/l_arrow_url.gif' style='border:0px;'/></div>"); }
			echo "<div style='float:left;padding-left:10px;padding-right:10px;'>" . $this->pageval ." - " . $this->endval . " of " . $this->totalval . "</div>";
			if ($this->endval >= ($this->total_items)) {
				echo ("<div style='float:left;'><img src='images/r_arrow_url.gif' style='border:0px;'/></div>");
			} else { ?>
		       <div style="float:left;">
					<a href="javascript:void(0)"><img src="images/r_arrow.jpg"  style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/message_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->next_page?>','');"/></a>
				</div>
			<? } ?>
  </div>
  
<? } else { ?>
<div class="prof_full">
	<div style="padding-top:30px;padding-left:24px;"><b>Currently there are no messages in this folder.</b></div>
</div>
<? } ?>

  </div>
  </div>
<? }
	function light_reply(){
?>
<div class="sch_page" >
<table width="570" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="25"><span style="width:25px; height:25px; float:right;"><img src="" /></span></td>
<td width="554" background="">&nbsp;</td>
<td width="31"><span style="width:25px; height:25px; float:left;"><img src="" /></span></td>
</tr>
<tr>
<td background=""></td>
<td>

<div class="sch_page" style="height:297px;">

	<div  class="sch_menu_t1">
		<div class="schmenu_lt" ></div>
		<div class="schmenu_cr"><div class="schmenu_highlight" >Message (<?= $this->pid?>)</div></div>
		<div class="schmenu_rt" ></div>
		<div><span style="margin-left:390px;">
		<a href = "javascript:void(0)" onclick ="document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';" style="text-decoration:none;">
		<img src="images/forgetpwd_close.gif" width="19" height="18" border="0" /></a></span></div>
	</div>

	<!-- for Interest details -->
	<div class="sch_con"> 
		<div class="sch_top"></div> 
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head" style="width:20%"> Message From  : </div>
			<div class="search_48"> <?= $this->pid;?> </div>
		</div>
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head" style="width:20%"> Message To  : </div>
			<div class="search_48"> <?= $this->to_id; ?> </div>
		</div>
		<div style="height:3px;"> </div>
		<div class="search_width" style="height:60px; " >
			<div class="search_24_head" style="height:48px; width:20%"> Subject  : </div>
			<div class="search_48" style="height:45px; width:72%; "> <input type="text" name="txtSubject" id="txtSubject" size="40"/> </div>
		</div>
		<div style="height:3px;"> </div>
		<div class="search_width" style="height:125px;" >
			<div class="search_24_head" style="width:20%"> Message  : </div>
			<div class="search_48" > <textarea name="textAbout" id="textAbout" style="width:350px; height:100px;" cols="70" rows="4"  ></textarea> </div>
		</div>		
		<div class="search_line"> </div> 
		<div class="search_100">
	    <div style="width:180px; float:left; padding-left:240px;">
		<? if($_REQUEST['view'] == 'message') { ?>
			<input name="button" type="submit"  class="s_btn" value= "Send" onclick="if(validate_msg()){ upd_messages('./ajax/message_class.php','<?= $this->pid;?>','insert','RP','<?= $this->to_id;?>',document.getElementById('txtSubject').value,document.getElementById('textAbout').value,'<?= $this->msgID;?>');document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';}"/>
		<? } else if($_REQUEST['view']== 'active'){ ?>
			<input name="button" type="submit"  class="s_btn" value= "Send" onclick="if(validate_msg()){ upd_messages('./ajax/message_class.php','<?= $this->pid;?>','insert','N','<?= $this->to_id;?>',document.getElementById('txtSubject').value,document.getElementById('textAbout').value,'<?= $this->msgID;?>');document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none'; } "/>
		<? } ?>
		</div>
		</div>
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
</div>
<?
	}
	function Messages_update($status,$msgid){							
		$tb_name = "tm_message";
		$setValues = "Message_Status='".$status."',Message_DOM = now() where Messages_ID='".$msgid."'";
		$this->switchqry($tb_name,'UPDATE',$setValues,'');
		echo "ajax/messageTab.php:#:".$this->pid;
	}
	function messagesUpdate(){												
		$tb_name = "tm_message";
		$fields = "profile_ID,To_ProfileId,Message_Subject,Message_Content,Message_Status,Message_Cstatus,Message_DOC,Message_DOA,Message_DOM";
		$argValues = "'".$this->pid."','".$this->to_id."','".$this->subject."','".$this->text."','N','IA',now(),now(),now()";
		$this->switchqry($tb_name,'INSERT',$fields,$argValues);
		$result_update = mysql_query($sql_insert);		
		echo "ajax/messageTab.php:#:".$this->pid;
	}
}//End Of Class
$inte  = new interests();

if(($inte->action == "Received" || $inte->action == "Sent")){
	$inte->getCount();
	$inte->getMessages();
	$inte->displayResult();
} else if($inte->action == "Update") {
	$inte->Messages_update($inte->msgStatus,$inte->inter_msg_id);
}	else if($inte->action == "Reply") {
	$inte->light_reply();
//	include("message_reply.php");
} else if($inte->action == "Reject"){
	$inte->Messages_update($inte->msgStatus,$inte->msgID);
} else if($inte->action == 'insert'){
	$inte->Messages_update($inte->msgStatus,$inte->msgID);
	$inte->messagesUpdate();
}
?>