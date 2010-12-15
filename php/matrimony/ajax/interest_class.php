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
		$this->limit= $_REQUEST['limit'];
	   	$this->page = $_REQUEST['page'];		
	}
	function getCount()
	{
		$interest_status = array("1"=>"N","2"=>"RD","3"=>"AC","4"=>"DE");		
		$tbname = "tm_interest";
		if($this->action == 'Received'){
			$this->whr = "Interest_To= '".$this->pid."'";			
		}	else if($this->action == 'Sent') {
			$this->whr = "Interest_From = '".$this->pid."'";
		}
		for($i=1;$i<=count($interest_status);$i++){
			//$whrarg = " where ".$this->whr." and Interest_Msgstatus='".$interest_status[$i]."' and Interest_Cstatus not in('IA','B')";
			$whrarg = " where ".$this->whr." and Interest_Msgstatus='".$interest_status[$i]."'";
			$dbfldarg = "Interest_msgid";
			$this->switchqry($tbname,'SELECT',$whrarg,$dbfldarg);
			$this->rows[$interest_status[$i]] = mysql_num_rows($this->qry_result);
		}
	}
	function getMessages(){

		if($this->action == 'Received'){
			$whr = "Interest_To= '".$this->pid."'";			
		}	else if($this->action == 'Sent') {
			$whr = "Interest_From = '".$this->pid."'";			
		}
		//$this->whr = $whr." and Interest_Msgstatus='".$this->status."' and Interest_Cstatus not in('IA','B') ORDER BY Interest_DOC DESC";
		$this->whr = $whr." and Interest_Msgstatus='".$this->status."' ORDER BY Interest_DOC DESC";
		$this->tbname = "tm_interest";
		$this->whrarg = " where ".$this->whr;
		$this->dbfldarg = "Interest_To,Interest_From,date_format(Interest_DOC,'%d %b %y') as senddate,Interest_msgid,Interest_Msgstatus,Int_id";
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
			$this->msg_int[$i]['Interest_To'] = $this->messages['Interest_To'];
			$this->msg_int[$i]['Interest_From'] = $this->messages['Interest_From'];
			$this->msg_int[$i]['senddate'] = $this->messages['senddate'];
			$this->msg_int[$i]['Interest_msgid'] = $this->messages['Interest_msgid'];
			$this->msg_int[$i]['Interest_Msgstatus'] = $this->messages['Interest_Msgstatus'];
			$this->msg_int[$i]['Int_id'] = $this->messages['Int_id'];
			$i++;
		}
	}
	function displayResult(){

		$reject = "class='menusubs'";$accept = "class='menusubs'";$pending = "class='menusubs'";$new = "class='menusubs'";
		
		if($this->status == "N"){
			$new = "class='menusubs_highlight'";
		} else if($this->status == "RD"){
			$pending = "class='menusubs_highlight'";
		} else if($this->status == "AC"){
			$accept = "class='menusubs_highlight'";
		} else if($this->status == "DE"){
			$reject = "class='menusubs_highlight'";
		}
?>
<!-- main in div-->

<div class="menu_in">
	
     <div style="width:550px; padding-left:5px; height:17px;">
		 <div style="float:left;cursor:pointer;" id="a1" onclick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','N','','','','','','');" <?=$new ?>>New (<?= $this->rows['N'];?>)</div>
	 <? if($this->action == 'Received'){ ?>
	 	<div  style="float:left; position:relative; width:5px;"> | </div>
		<div style="float:left;cursor:pointer" onClick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','RD','','','','','','');" <?=$pending?>>Read (<?= $this->rows['RD'];?>)</div>
	<? } ?>
		<div  style="float:left; position:relative; width:5px;"> | </div>
		<div style="float:left;cursor:pointer" id="a3" onClick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','AC','','','','','','');" <?=$accept?>>Accepted (<?= $this->rows['AC'];?>)</div>
		<div  style="float:left; position:relative; width:5px;"> | </div>
		<div style="cursor:pointer" id="a4" onClick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','DE','','','','','','');" <?=$reject?>>Declined (<?= $this->rows['DE'];?>)</div>
	 </div>
	 
	 
<? if(count($this->msg_int) >0) { ?>
	<div class="mech_s_v">
		<div class="mech_b_arrow">
		 <? if ($this->prev_page >= 1) { ?>
			<div style='float:left;'>
				<a><img src="images/l_arrow.jpg" style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->prev_page?>','');"/> </a>
			</div> 
		<? 	} else {
				echo ("<div style='float:left; padding-bottom:0px;' class='decor'><img src='images/l_arrow_url.gif' style='border:0px;'/></div>"); 
			}
				echo "<div style='float:left;padding-left:10px;padding-right:10px;'>" . $this->pageval ." - " . $this->endval . " of " . $this->totalval . "</div>";
	
			if ($this->endval >= ($this->total_items)) {
				echo ("<div style='float:left;'><img src='images/r_arrow_url.gif' style='border:0px;'/></div>");
			} else { ?>
			   <div style="float:left;"><? print_r($argpostarr); ?>
					<a href="javascript:void(0)"><img src="images/r_arrow.jpg"  style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->next_page?>','');"/></a>
				</div>
			<? } ?>
		</div>
	</div>

	<div class="menu_con"><div class="sch_border"></div></div>

 <!---Profile Starts Here-->
<? for($i=0;$i<count($this->msg_int);$i++){
	//while($this->messages = mysql_fetch_assoc($this->qry_result)){
		$msgID = $this->msg_int[$i]['Interest_msgid'];

		if($this->action == 'Received'){				
			$PID = $this->msg_int[$i]['Interest_From'];
		} else if($this->action == 'Sent') {
			$PID =$this->msg_int[$i]['Interest_To'];
		}		
		$intMsg = $this->getInterest($this->msg_int[$i]['Int_id']);		
		$tbname = "tm_profile";
		$whrarg = " where ProfileId='".$PID."'";
		$dbfldarg = "*";
		$this->switchqry($tbname,'SELECT',$whrarg,$dbfldarg);
		$this->messages_profile = mysql_fetch_assoc($this->qry_result);		
		$this->to_id = $this->messages_profile['ProfileId'];
?>
<!-- div color-->
<div <? if (($i % 2) == 0) { echo $divcolor = "class='sch_box'"; } else { echo $divcolor = "class='sch_box_o'";	}?>>
	<div class="prof_full">
	<? $this->image_fetch($this->messages_profile['ProfileId'],'sr');
	   if($this->imgnum != 0){ ?>

		<div  class="sch_img" id="imgdiv_<?=i;?>" >
			<a href="imageView.php?pid=<?= $this->messages_profile['ProfileId'];?>" target="_blank" onClick="window.open(this.href,'newwindow','width=600,height=570,scrollbars=no,resize=0');return false;">
			<img src="member_image/<?= $this->img_data[0][image_thumb]; ?>" width="85" height="87" name="img_<?=$i;?>" style="border:1px solid  #CCCCCC;" onMouseOver="document.getElementById('show<?=$i?>').style.display='';" onMouseOut="document.getElementById('show<?=$i?>').style.display='none';"/></a>
		</div>
		<input type="hidden" name="txtimgcnt_<?=$i;?>" id="txtimgcnt_<?=$i;?>" value="1" />
		<div style="position:relative;"> 
		<? $browser = get_browser(); if($browser->browser=="IE"){ ?>
			<div style='position:absolute; display:none; border:2px solid #126569; z-index:5000;  margin-top:0px;left:0px; width:130px; height:128px; cursor:pointer;' id='show<?=$i;?>'>
		<? } else {?><input type="hidden" name="txtrow_<?=$i;?>" id="txtrow_<?=$i;?>" value="<?=$i;?>" />
			<div id='show<?= $i;?>' style="position:absolute; display:none; border:2px solid #126569; margin-top:0px;left:116px; width:130px; height:128px; ">
		<? } ?>
		<img src="member_image/<?=$this->img_data[0][image_thumb];?>" style='width:130px;height:128px;border:0px;' name="lgt_img_<?=$i?>"/>
	</div>	</div>								

		<? } else { ?>							
				<div  class="sch_img" ><? if($this->messages_profile['Gender'] == M){?>
					<img src="images/boy_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? }else{?>
					<img src="images/lady_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? } ?>
				</div>
		<? } ?>
	
	<div class="sch_prof">
		<span class="prof-head"><?= $this->messages_profile['FirstName']." ".$this->messages_profile['MiddleName']." ".$this->messages_profile['LastName']  ."(".$this->messages_profile['ProfileId'].")" ?></span>
		<span class="prof_text"><br />
			<?= $this->messages_profile['Age'] ."yrs,". $this->messages_profile['Height'] ."|". $this->messages_profile['Religion'] ."-". $this->messages_profile['CastDivision']?>, <br />
		Subcaste:<?= $this->messages_profile['Subcaste'] ."|". $this->messages_profile['City'].",".  $this->messages_profile['State'].",". $this->messages_profile['ResidingCountry'] ."|". $this->messages_profile['EducationCat'] ."|". $this->messages_profile['Occupation'] ?><br />
		</span>
		<a href="myProfile.php?page=view&pid=<?=$this->messages_profile['ProfileId']?>" target="_blank" style="text-decoration:none;">
			<span class="red">Full Profile >></span>
		</a>
	</div>
</div>
<!-- div color-->

	<? if($this->imgnum != 0){ ?>
		<div  style="height:20px; width:80px; padding-left:23px;">
			<div class="sch_l_arrow"><img src="images/l_arrow_url.gif" onClick="if(document.getElementById('txtimgcnt_<?=$i;?>').value > 1){if(document.getElementById('txtimgcnt_<?=$i;?>').value==2){srcimgprev('<?= $this->img_data[0][image_thumb]; ?>','<?=$i;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==3){srcimgprev('<?= $this->img_data[1][image_thumb]; ?>','<?=$i;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==4){srcimgprev('<?= $this->img_data[2][image_thumb]; ?>','<?=$i;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==5){srcimgprev('<?= $this->img_data[3][image_thumb]; ?>','<?=$i;?>')}};" name="imglarr_<?=$i?>" style="cursor:pointer;"/></div> 
			<div class="sch_link"><span id="sp_<?= $i?>"> 1</span> -  <?=$this->imgnum;?> </div>
			<div class="sch_r_arrow"><? if($this->imgnum == 1){ ?><img src="images/r_arrow_url.gif"/><? } else { ?><img src="images/r_arrow.jpg" onClick="if(document.getElementById('txtimgcnt_<?=$i;?>').value < <?= $this->imgnum;?>){if(document.getElementById('txtimgcnt_<?=$i;?>').value==1){srcimgnext('<?= $this->img_data[1][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==2){srcimgnext('<?= $this->img_data[2][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==3){srcimgnext('<?= $this->img_data[3][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')} else if(document.getElementById('txtimgcnt_<?=$i;?>').value==4){srcimgnext('<?= $this->img_data[4][image_thumb]; ?>','<?=$i;?>','<?=$this->imgnum;?>')}};" name="imgrarr_<?=$i?>" style="cursor:pointer;"/><? } ?></div>
		</div>
	<? } ?>	
	

</div><br />
<!-- main in div-->

<div class="mech_s_v">
	<div class="mech_select_all">Msg :<?= $this->msg_int[$i]['senddate']." ".substr($intMsg,0,10)?>...
		<a href="javascript:void(0)" onclick="document.getElementById('fade').style.display='block';msg_light('./ajax/message_details.php','<?= $this->pid?>','<?= $this->action?>','<?= $this->status;?>','<?= $this->msg_int[$i]['Int_id']?>','Show','ints');" style="text-decoration:none; color:#FF0000;"><b>More</b></a>
	</div>
	
	<div class="mech_view">
	<? if($this->status != 'DE' && $this->status != 'AC' && $this->action != 'Sent'){?>
	<input type="submit" value="Accept" id="Submit" class="s_btn" onclick="upd_messages('./ajax/interest_class.php','<?= $this->pid?>','Reject','AC','<?= $this->to_id?>','','','<?= $msgID;?>');"/><? }?>&nbsp;&nbsp;&nbsp;<? if($this->status != 'DE'){?><input type="submit" value="Decline" id="Submit" class="s_btn" onclick="upd_messages('./ajax/interest_class.php','<?= $this->pid?>','Reject','DE','<?= $this->to_id?>','','','<?= $msgID;?>');"/>
	<? } if($this->status == 'DE'){?><input type="submit" value="Restore" id="Submit" class="s_btn" onclick="upd_messages('./ajax/interest_class.php','<?= $this->pid?>','Reject','RD','<?= $this->to_id?>','','','<?= $msgID;?>');"/>
	<? } ?>
	</div>
	
</div><br />

<? }//forLoop ?>
<div class="sch_border_b"></div>

<div class="mech_s_v">
	<div class="mech_b_arrow" >
	<? if ($this->prev_page >= 1) { ?>
			<div style='float:left;'>
					<a><img src="images/l_arrow.jpg" style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->prev_page?>','');"/> </a>
			</div> 
	<?  } else {
			echo ("<div style='float:left; padding-bottom:0px;' class='decor'><img src='images/l_arrow_url.gif' style='border:0px;'/></div>");	
		}
			echo "<div style='float:left;padding-left:10px;padding-right:10px;'>" . $this->pageval ." - " . $this->endval . " of " . $this->totalval . "</div>";
			
	if ($this->endval >= ($this->total_items)) {
		echo ("<div style='float:left;'><img src='images/r_arrow_url.gif' style='border:0px;'/></div>");
	} else { ?>
	   <div style="float:left;">
			<a href="javascript:void(0)"><img src="images/r_arrow.jpg" style="border:0px;cursor:pointer;" onclick="msg_messages('./ajax/interest_class.php','<?=$this->pid?>','<?= $this->action?>','<?= $this->status ?>','','','','<?= $this->limit?>','<?= $this->next_page?>','');"/></a>
		</div>
	<? } ?>
	
</div>

<? } else { ?>
<div class="prof_full">
	<div style="padding-top:30px;padding-left:24px;"><b>Currently there are no messages in this folder.</b></div>
</div>
<? } ?>

	</div>

<?
	}
	function getInterest($intid){	
		$tbname = "tm_interestmsg";
		$whrarg = " where Int_id='".$intid."' and Int_Type='I' and Int_Status = 'A'";
		$dbfldarg = "Int_id,Int_Msg";
		$this->switchqry($tbname,'SELECT',$whrarg,$dbfldarg);
		$this->intMsg = mysql_fetch_assoc($this->qry_result);
		return $this->intMsg['Int_Msg'];
	}
	function Messages_update($status,$msgid){
		$tb_name = "tm_interest";
		$setValues = "Interest_Msgstatus='".$status."',Interest_DOC = now() where Interest_msgid='".$msgid."'";
		$this->switchqry($tb_name,'UPDATE',$setValues,'');
		echo "ajax/interestTab.php:#:".$this->pid.":#:inter";
	}
	function messagesUpdate(){
		$tb_name = "tm_interest";
		$fields = "Int_id,Interest_To,Interest_From,Interest_Msgstatus,Interest_Cstatus,Interest_DOC,Interest_DOAT,Interest_DOB,Interest_DOAT";
		//$this->subject;
		$argValues = "'1','".$this->to_id."','".$this->pid."','N','A',now(),now(),now(),now()";
		$this->switchqry($tb_name,'INSERT',$fields,$argValues);
		$result_update = mysql_query($sql_insert);
		echo "ajax/interestTab.php:#:".$this->pid.":#:inter";
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
	$inte->Messages_update($inte->msgStatus,$inte->inter_msg_id);
	//include("message_reply.php");
} else if($inte->action == "Reject"){
	$inte->Messages_update($inte->msgStatus,$inte->msgID);
} else if($inte->action == 'insert'){
	$inte->Messages_update($inte->msgStatus,$inte->msgID);
	$inte->messagesUpdate();
}
?>