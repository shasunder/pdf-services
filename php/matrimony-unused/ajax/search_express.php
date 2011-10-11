<?php
include("../common/config.inc.php");
include("../common/function.php");
session_start();
@ob_start();

class search_express extends matrimony
{
	function search_express(){
		$this->pid  = $_REQUEST['pid'] ? $_REQUEST['pid'] : $_SESSION['ProfileId'];//sessionid
		$this->intId = $_REQUEST['status'] ? $_REQUEST['status'] : "";
		$this->to_id = $_REQUEST['to_id'] ? $_REQUEST['to_id'] : "";
	   	$this->page = $_REQUEST['page'];
		$this->view = $_REQUEST['view'];	 
	}
	function getsearch(){
		$this->tbname = "tm_interestmsg";
		$this->dbfldarg = "Int_id,Int_Msg as Interest_Content,date_format(Int_DOM,'%d %b %y') as senddate";
		$whr=" where Int_Status!='B'";
		$this->switchqry($this->tbname,'SELECT',$whr,$this->dbfldarg);	
		while($this->Interests = mysql_fetch_assoc($this->qry_result)){
			$this->msg_int[$i]['Interest_Content'] = $this->Interests['Interest_Content'];
			$this->msg_int[$i]['Int_id'] = $this->Interests['Int_id'];
			if($i == 0){ $chk="checked";}else{$chk = "";} 
			echo "<input type='radio' name='exradio' value='".$this->msg_int[$i]['Int_id']." id='exradio' onclick=\"selVal('".$this->msg_int[$i]['Int_id']."','intId')\" ".$chk."/>".$this->msg_int[$i]['Interest_Content']."<br> <br>";
			$i++;
		}
	}
	function displayexpress(){
?>
<div class="sch_page">
<table width="570" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="25"><span style="width:25px; height:25px; float:right;"><img src="" /></span></td>
<td width="554" background="">&nbsp;</td>
<td width="31"><span style="width:25px; height:25px; float:left;"><img src="" /></span></td>
</tr>
<tr>
<td background=""></td>
<td>

	<div  class="sch_menu_t1">
		<div class="schmenu_lt" ></div>
		<div class="schmenu_cr"><div class="schmenu_highlight" >Express Interest (<?= $this->pid?>)</div></div>
		<div class="schmenu_rt" ></div>
		<div><span style="margin-left:370px;">
		<a href = "javascript:void(0)" onclick ="document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';" style="text-decoration:none;">
		<img src="images/forgetpwd_close.gif" width="19" height="18" border="0" /></a></span></div>
	</div>

	<!--<div  class="add_head" style="border:solid 1px #126569">Express Interest (<?= $this->pid?>)
		<span style="margin-left:370px;">
			<a href = "javascript:void(0)" onclick ="document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';">  
				<img src="images/add_close_btn.gif" width="17" height="17" style="border:0px;"/>
			</a>
		</span>
	</div>-->
	<div class="sch_con" style="height:198px;" > 
		<div class="sch_top"></div> 
		<div style="height:3px;"> </div>
		<div class="search_width" >
			<div class="search_24_head" style="width:20%">Express Interest To </div>
			<div class="search_24_head" style="color:#990000;">:  <?= $this->to_id;?> </div>
		</div>
		<div style="height:5px;"> </div>
		<div class="search_line"> </div>
		<div class="search_100" style="height:100px; color:#236266; " >
		<? $this->getsearch();?>
		<div class="search_100_red" style="text-align:center" id="experror" ></div>
		<div class="search_line"> </div> 
		<div class="search_100">
	    <div style="width:180px; float:left; padding-left:240px;">
			<input name="button" type="button" class="s_btn" value= "Send" onclick ="msg_light('./ajax/search_express.php','<?= $this->pid?>','','','<?= $this->to_id;?>',document.getElementById('intId').value,'update');"/>
			<input type="hidden" name="intId" id="intId" value="1"/>
		</div>
		</div><br />
		<!--<div class="sch_btm"></div>-->
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

<? }//displayexpress()
	//function to insert the interest
	function messagesUpdate(){
		$tb_name = "tm_interest";
		$fields = "Int_id,Interest_To,Interest_From,Interest_Msgstatus,Interest_Cstatus,Interest_DOC,Interest_DOAT,Interest_DOB,Interest_DOAC";
		//$this->subject;
		$argValues = "'".$this->view."','".$this->to_id."','".$this->pid."','N','IA',now(),now(),now(),now()";
		$this->switchqry($tb_name,'INSERT',$fields,$argValues);
		$result_update = mysql_query($sql_insert);
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

	<div  class="sch_menu_t1">
		<div class="schmenu_lt" ></div>
		<div class="schmenu_cr"><div class="schmenu_highlight" >Express Interest (<?= $this->pid?>)</div></div>
		<div class="schmenu_rt" ></div>
		<div><span style="margin-left:370px;">
		<a href = "javascript:void(0)" onclick ="document.getElementById('inner_msg').style.display='none';document.getElementById('fade').style.display='none';" style="text-decoration:none;">
		<img src="images/forgetpwd_close.gif" width="19" height="18" border="0" /></a></span></div>
	</div>

	<!--Thanks Message-->
	<div class="sch_con">
		<div class="sch_top"></div>
		<div style="height:3px;"></div>
		<div class="search_width">
			<div class="search_24_head" style="width:80%">Your Interest has Been Send to member(<?= $this->to_id?>).</div>
		</div>
		<div style="height:3px;"></div>
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
	<!--Thanks Message-->


<?
	}//messagesUpdate()
}//End Of Class
$src_expobj  = new search_express();

if($src_expobj->page == "express"){
	$src_expobj->displayexpress();
} else if($src_expobj->page == "update"){
	$src_expobj->messagesUpdate();
}
?>