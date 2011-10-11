<form name="change" action="" method="post">
<table style="position:absolute; left:330px; top:130px; height: 160px; width:380px " cellpadding="0px" cellspacing="0px" bgcolor="#f1f2f7" >
<tr>
<td height="27" colspan="2" align="center"  style="background:url(../images/bgGray.gif); height:40px " ><strong>Change Password</strong></td>
</tr>
<tr >
<td width="180" height="25">&nbsp&nbsp;Old Password</td>
<td width="198"><input  type="password" name="oldpass" maxlength="15" id="oldpass" value=""> <div id="username"></div></td>
</tr>
<tr>
<td width="180" height="4"></td>
<td width="198" id="operr"></td>
</tr>

<tr><td height="25">&nbsp&nbsp;New Password</td>
<td width="198"><input type="password" maxlength="15" name="newpass" id="newpass" value=""><div id="password"></div></td></tr>

<tr>
<td width="180" height="5"></td>
<td width="198" id="nperr"></td>
</tr>
<tr><td width="180" height="25">&nbsp&nbsp;Confirm Password</td>
<td width="198" ><input type="password" maxlength="15" name="cpass" id="cpass" value=""><div id="password"></div></td></tr>

<tr>
<td width="180" height="10"></td>
<td width="198" id="cperr"></td>
</tr>

<tr>
<td height="30px;" colspan="2" align="center"  style=" padding-left:28px"   ><input type="image" src="../images/pass_submit.gif" style='border:0px'  name="submit" id="submit" value="submit"  onclick="return validate();"></td>
</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">


function validate()
{
	var frm = document.change;
	var error = new Array();
	var errorMessage = "";
	//alert("frm.conpwd");
	
	if(frm.oldpass.value==''){
		error[0] ="Old Password is empty" ;	
	}
	if(frm.newpass.value==''){
	error[1] ="New password is empty" ;
	}
	if(frm.cpass.value==''){
	error[2] ="Confirm password is empty" ;
	}
	if(frm.newpass.value!=frm.cpass.value){
	error[3] ="New Password & Confirm Password Should be same" ;
	}
	var i;
	
	for(i= 0 ;i<=error.length; ++i)
	if(error[i]!=undefined)
	errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : "";
	
	if(errorMessage == "")
	{
		return true;
	 //frm.submit();
	}
	else
	{	
	alert(errorMessage);
	return false;
	}
}

</script>