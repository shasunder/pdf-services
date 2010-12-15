<div id="light" class="white_content">
<form name="change" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<table width="521" border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #f1f1f1;">
  <tr>
    <td class="light_forgetpwdtop"> 
	<table width="486" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="323" align="left" valign="top" class="light_forgetpwdhead">Change Password </td>
    <td width="163" align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('fade').style.display='none';document.getElementById('cpass').style.display='none';">
<img src="images/forgetpwd_close.gif" width="19" height="18" border="0" /></a></td>
  </tr>
</table>

	
	 </td>
  </tr>
  <tr>
    <td class="light_forgetpwdctr">
	<table width="465" border="0" cellspacing="0" cellpadding="0" style=" color:#FFFFFF;" id="contentArea">
	
	<tr>
	<td width="132" align="left" valign="middle"><strong>Old Password</strong></td>
	<td width="333" align="left" valign="top">
	<input name="oldpass"  class="light_forget_selectbx" id="oldpass" type="password" size="28" value=""  maxlength="40" style="width:140px;height:14px;" onBlur="txt_empty('oldpass','oldError','Enter Old Password');" />
		<input name="emailtextfield" type="hidden" id="emailtextfield"  /></td>
	</tr>
	
	<tr>
	<td >&nbsp;</td>
    <td height="18" align="left" colspan="2" style="color:#FF0000;" id="oldError"></td>
    </tr>
	
	<tr>
	<td width="132" align="left" valign="middle"><strong>New Password</strong></td>
	<td width="333" align="left" valign="top">
	<input name="newpass"  class="light_forget_selectbx" id="newpass" type="password" size="28" value=""  maxlength="40" style="width:140px;height:14px;" onBlur="txt_empty('newpass','newError','Enter New Password');" />
		<input name="emailtextfield" type="hidden" id="emailtextfield"  /></td>
	</tr>
	
	<tr>
	<td >&nbsp;</td>
    <td height="18" align="left" colspan="2" style="color:#FF0000;" id="newError"></td>
    </tr>
	
	<tr>
	<td width="132" align="left" valign="middle"><strong>Confirm Password</strong></td>
	<td width="333" align="left" valign="top">
	<input name="conpass"  class="light_forget_selectbx" id="conpass" type="password" size="28" value=""  maxlength="40" style="width:140px;height:14px;" onBlur="txt_empty('conpass','conError','Enter Confirm Password');if(this.value!=''){checkpasss('newpass','conpass','conError','Please confirm the given Password')}" />
		<input name="emailtextfield" type="hidden" id="emailtextfield"  /></td>
	</tr>
	
	<tr>
	<td >&nbsp;</td>
    <td height="18" align="left" colspan="2" style="color:#FF0000;" id="conError"></td>
	</tr>
	
	<tr>
	<td width="333" align="right" valign="top" >
	  <input type="image" name="Submit" value="Submit" src="images/update.jpg" onclick="return changepass('oldpass|newpass|conpass','oldError|newError|conError','Enter Old Password|Enter New Password|Enter Confirm Password')"/></td>
	</tr>
	
</table>


    </td>
  </tr>
  <tr>
    <td class="light_forgetpwdbottom">&nbsp;</td>
  </tr>
</table>
</form>
</div>