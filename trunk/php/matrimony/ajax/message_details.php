<?php
include("../common/config.inc.php");
include("../common/function.php");
session_start();
@ob_start();

class message_light extends matrimony
{
	function message_light(){
		$this->action = $_REQUEST['act'] ? $_REQUEST['act'] : "Received";
		$this->status = $_REQUEST['status'] ?  $_REQUEST['status'] : "N";
		$this->inter_msg_id = $_REQUEST['inter_msg_id'] ? $_REQUEST['inter_msg_id'] : "";
		$this->to_id = $_REQUEST['to_id'] ? $_REQUEST['to_id'] : "";
		$this->pid  = $_REQUEST['pid'] ? $_REQUEST['pid'] : "";
		$this->msgID = $_REQUEST['msgID'] ? $_REQUEST['msgID'] : "";		
		$this->view  = $_REQUEST['view'] ? $_REQUEST['view'] : "Show";
	   	$this->page = $_REQUEST['page'];		
	}
	function getmessage(){
		$this->tbname = "tm_message";
		$this->whrarg = " where Messages_ID = '$this->to_id'";
		$this->dbfldarg = "Profile_ID,To_ProfileId,date_format(Message_DOC,'%d %b %y') as senddate,Messages_ID,Message_Status,Message_Subject,Message_Content";
		$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);	
		while($this->messages = mysql_fetch_assoc($this->qry_result)){
			$this->msg_dbdata[$i]['Profile_ID'] = $this->messages['Profile_ID'];
			$this->msg_dbdata[$i]['To_ProfileId'] = $this->messages['To_ProfileId'];
			$this->msg_dbdata[$i]['senddate'] = $this->messages['senddate'];
			$this->msg_dbdata[$i]['Messages_ID'] = $this->messages['Messages_ID'];
			$this->msg_dbdata[$i]['Message_Status'] = $this->messages['Message_Status'];
			$this->msg_dbdata[$i]['Message_Subject'] = $this->messages['Message_Subject'];
			$this->msg_dbdata[$i]['Message_Content'] = $this->messages['Message_Content'];
			$i++;
		}
	}
	function getinterests(){
		$this->tbname = "tm_interestmsg";
		$this->whrarg = " where Int_id = '$this->to_id'";
		$this->dbfldarg = "Int_Msg as Interest_Content,date_format(Int_DOM,'%d %b %y') as senddate";
		$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);	
		while($this->Interests = mysql_fetch_assoc($this->qry_result)){
			$this->msg_int[$i]['senddate'] = $this->Interests['senddate'];
			$this->msg_int[$i]['Interest_Content'] = $this->Interests['Interest_Content'];
			$i++;
		}
	}
	function displayMessage(){
?>
<div class="sch_page">
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_l_t.gif" width="25" height="25" /></span></td>
    <td width="550" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" width="25" height="25" /></span></td>
  </tr>
  <tr>
    <td background="./images/lightbox_left.gif"></td>
    <td>

	<div  class="add_head" style="border:solid 1px #126569">Message More Details 
		<span style="margin-left:400px;">
			<a href = "javascript:void(0)" onclick ="document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';" style="text-decoration:none;"> <img src="images/add_close_btn.gif" width="17" height="17" style="border:0px;"/>
			</a>
		</span>
	</div>
	<!-- for message details -->
	<div class="sch_con"> 
		<div class="sch_top"></div> 
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head"> Message From </div>
			<div class="search_48">:  <?= $this->msg_dbdata[$i]['Profile_ID'];?> </div>
		</div>
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head"> Subject </div>
			<div class="search_48">:  <?= $this->msg_dbdata[$i]['Message_Subject'];?> </div>
		</div>
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head"> Sent Date </div>
			<div class="search_48">:  <?= $this->msg_dbdata[$i]['senddate'];?> </div>
		</div><div style="height:3px;"> </div>
		<div class="search_width" style="height:40px;" >
			<div class="search_24_head" style="height:28px;" > Message </div>
			<div class="search_48" style="height:28px; width:72%; ">:  <?= $this->msg_dbdata[$i]['Message_Content'];?> </div>
		</div>
		<div class="search_line"> </div> 
		<div class="search_100">
	    <div style="width:180px; height:30px; float:left; padding-left:230px;  padding-top:inherit;">
			<? if($this->action == 'Received' && $this->status != 'TR'){?>
				<input type="submit" value="Reply" id="Submit" class="s_btn" onClick="document.getElementById('fade').style.display='block';msg_light('./ajax/message_class.php','<?= $this->pid?>','Reply','<?= $this->status;?>','<?= $this->msg_dbdata[$i]['Profile_ID'];?>','message','');"/><? }?>
			<? if($this->status != 'TR'){?>
				<input type="submit" value="Reject" id="Submit" class="s_btn" onclick="upd_messages('./ajax/message_class.php','<?= $this->pid?>','Reject','TR','<?= $this->msg_dbdata[$i]['Profile_ID'];?>','','','<?= $this->msg_dbdata[$i]['Messages_ID'];?>');document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';"/>
			<? } if($this->status == 'TR'){?>
				<input type="submit" value="Restore" id="Submit" class="s_btn" onclick="upd_messages('./ajax/message_class.php','<?= $this->pid?>','Reject','RE','<?= $this->msg_dbdata[$i]['Profile_ID'];?>','','','<?= $this->msg_dbdata[$i]['Messages_ID'];?>');document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';"/>
			<? } ?>
		</div>
		</div>
		<!--<div class="sch_btm"></div>-->
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
	
</div>
<? }
	function displayInterest(){
?>
<div class="sch_page">
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_l_t.gif" width="25" height="25" /></span></td>
    <td width="550" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" width="25" height="25" /></span></td>
  </tr>
  <tr>
    <td background="./images/lightbox_left.gif"></td>
    <td>

	<div  class="add_head" style="border:solid 1px #126569">Interest More Details 
		<span style="margin-left:400px;">
			<a href = "javascript:void(0)" onclick ="document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';" style="text-decoration:none;"> <img src="images/add_close_btn.gif" width="17" height="17" style="border:0px;"/>
			</a>
		</span>
	</div>
	<!-- for Interest details -->
	<div class="sch_con"> 
		<div class="sch_top"></div> 
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head"> Interest From </div>
			<div class="search_48">:  <?= $this->pid;?> </div>
		</div>
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head"> Sent Date </div>
			<div class="search_48">:  <?= $this->msg_int[$i]['senddate']; ?> </div>
		</div>
		<div style="height:3px;"> </div>
		<div class="search_width" style="height:60px; " >
			<div class="search_24_head" style="height:48px;" > Interest Msg </div>
			<div class="search_48" style="height:45px; width:72%; ">:  <?= $this->msg_int[$i]['Interest_Content']; ?> </div>
		</div>
		<div class="search_line"> </div> 
		<div class="search_100">
	    <div style="width:180px; float:left; padding-left:240px;">
			<? if($this->status != 'DE' && $this->status != 'AC' && $this->action != 'Sent'){?>
				<input type="submit" value="Accept" id="Submit" class="s_btn" onclick="upd_messages('./ajax/interest_class.php','<?= $this->pid?>','Reject','AC','<?= $this->to_id?>','','','<?= $msgID;?>');document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';"/><? }?>
			<? if($this->status != 'DE'){?>
				<input type="submit" value="Decline" id="Submit" class="s_btn" onclick="upd_messages('./ajax/interest_class.php','<?= $this->pid?>','Reject','DE','<?= $this->to_id?>','','','<?= $msgID;?>');document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';"/>
			<? } if($this->status == 'DE'){?>
				<input type="submit" value="Restore" id="Submit" class="s_btn" onclick="upd_messages('./ajax/interest_class.php','<?= $this->pid?>','Reject','RD','<?= $this->to_id?>','','','<?= $msgID;?>');document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';"/>
			<? } ?>
		</div>
		</div><br />	
		<!--<div class="sch_btm"></div>-->
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
</div>
<? }		
}//End Of Class
$int_light  = new message_light();

if(($int_light->action == "Received" || $int_light->action == "Sent") && $int_light->page == "msg"){
	$int_light->getmessage();
	$int_light->displayMessage();
}else if(($int_light->action == "Received" || $int_light->action == "Sent") && $int_light->page == "ints"){
	$int_light->getinterests();
	$int_light->displayInterest();
}
?>