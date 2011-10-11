<div style="height:220px;"> 
<div style=" width:94%; height:170px; margin-left:15px; background-repeat:repeat-x; background-position:top; ; margin-top:10px; border:0px #f4f4f3 solid; ">
<table width="487" border="0" cellspacing="0" cellpadding="0" id="divmsg1" style="border:#000000;" >
	<tr>	
		<td>To : </td><td style="padding-left:20px;">
		<? if($_REQUEST['limit'] == 'message') {  echo $inte->to_id; } 
		else if($_REQUEST['limit']== 'active') { echo $active->to_id; } ?></td>
	</tr>	
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>Subject : </td>
		<td style="padding-left:20px;"><input type="text" name="txtSubject" id="txtSubject" size="40"/></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>Message : </td>
		<td style="padding-left:20px;"> <textarea name="textAbout" id="textAbout" style="width:300px; height:100px;" cols="70" rows="4"  ></textarea></td>	
	</tr>
	<tr>
		<td>&nbsp;</td>		
	</tr>
	<tr>	
		<td colspan="2" align="center"> 
		<? if($_REQUEST['limit'] == 'message') { ?>
			<input name="button" type="submit"  class="s_btn" value= "Send" onclick="if(validate_msg()){ upd_messages('./ajax/message_class.php','<?php echo $inte->pid;?>','insert','RP','<?php echo $inte->to_id;?>',document.getElementById('txtSubject').value,document.getElementById('textAbout').value,'<?php echo $inte->msgID;?>'); }"/>
		<? } else if($_REQUEST['limit']== 'active'){ ?>
			<input name="button" type="submit"  class="s_btn" value= "Send" onclick="if(validate_msg()){ upd_messages('./ajax/message_class.php','<?php echo $active->pid;?>','insert','N','<?php echo $active->to_id;?>',document.getElementById('txtSubject').value,document.getElementById('textAbout').value,'<?php echo $active->msgID;?>'); } "/>
		<? } ?>
		</td>
	</tr>
</table>
</div>
</div>