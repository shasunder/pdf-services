<div id="light" class="white_content">
<form name="forgetemail" action="" method="post">
<table width="521" border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #f1f1f1;">
  <tr>
    <td class="light_forgetpwdtop"> 
	<table width="486" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="323" align="left" valign="top" class="light_forgetpwdhead">Forgot Password </td>
    <td width="212	" align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('fade').style.display='none';document.getElementById('cpass').style.display='none';">
<img src="images/forgetpwd_close.gif" width="19" height="18" border="0" /></a></td>
  </tr>
</table>

	
	 </td>
  </tr>
  <tr>
    <td class="light_forgetpwdctr">
	<table width="465" border="0" cellspacing="0" cellpadding="0" style=" color:#FFFFFF;" id="contentArea">
  <tr>
    <td height="48" colspan="2" align="left" valign="top" style="font-size:12px">
    Please enter E-mail ID provided at the time of registration to send your password to. </td>
    </tr>
  <tr>
    <td colspan="2"><strong>E- mail </strong></td>
    </tr>
  <tr>
    <td width="132" align="left" valign="middle">
		<input name="txtEmail"  class="light_forget_selectbx" id="txtEmail" type="text" size="28" value=""  maxlength="40" style="width:140px;height:14px;" onBlur="txt_empty('txtEmail','emailError','Enter Email Id');" />
		<input name="emailtextfield" type="hidden" id="emailtextfield"  />
</td>
    <td width="333" align="left" valign="top">
      <input type="button" name="Submit" class="f_btn" onclick="if(document.getElementById('txtEmail').value==''){txt_empty('txtEmail','emailError','Enter Email Id');}else{email_validationfp('txtEmail','emailError','Invalid EmailId...','EmailId','tm_profile');}"/></td>
  </tr>
  <tr>
    <td height="18" colspan="2" style="color:#FF0000;" id="emailError"></td>
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