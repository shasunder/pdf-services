<style type="text/css">
#login
{
background-color:#dbe1ed;
border:1px solid #000000;
}
</style>
<body onLoad="loadpage()">
<table width="1024" border="0" align="center" bgcolor="#FFFFFF" style="border:0px solid red">
  <!--DWLayoutTable-->
  <tr>
    <td width="1054" height="373" valign="middle">
               
            <form name="loginfrm" id="form" method="post" action="./Loginuser.php" >
              <table width="250" align="center">
				<tr align="center"><td height="28" colspan="3" align="center" valign="top" id="error" style="height:28px;color:red;font-size:10px;" > <?php if($_REQUEST['id']=='1')
				{ echo "Invalid Username/Password";?></td>
			    </tr>
				<?php } else {echo "" ; } ?>
              </table>
              <table width="250"  border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01" style="border:1px solid #000000" bgcolor="#e8fcc3">
                <!--DWLayoutTable-->
               
               <tr>
                  <td height="29" colspan="3" valign="top" style='width:200px;height:35px'> <div align="center" style="font-size:11px; padding:'padding-bottom';color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif"><strong><br>
                    Login</STRONG></div></td>
				</tr>
                <tr>
                  <td width="10" height="28"><div align="right"><span class="style7">&nbsp;</span></div></td>
                  <td width="70"><div align="left"><span class="whiteText" style='color:#000000'>Username</span></div></td>
                  <td width="170"><input type="text" id="username" name="username" style="background-color:#87a429;color:#ffffff;font-family:verdana;font-size:11px;border:1px solid #000000" /></td>
                </tr>

                <tr>
                  <td height="28"><div align="right"><span class="style7">&nbsp;&nbsp;</span></div></td>
                  <td height="28"><div align="left"><span class="whiteText" style='color:#000000'>Password</span></div></td>
                  <td><input  type="password" id="password" name="password"  style="background-color:#87a429;color:#ffffff;font-family:verdana;border:1px solid #000000;font-size:11px;" ></td>
                </tr>
                <tr>
                  <td height="33" colspan="3" align="left" style='padding-left:81px;'><input type="submit" value="Login" name="login" style="background-color:#87a429;" onClick="return validate();" width="47" height="18" border='0px'></td>
                </tr>

                <tr>
                  <td height="13" colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </form></td>

  </tr> <tr>
    <td height="18" style='background-image:url(images/tabRowBg.gif);background-repeat:repeat-x;width:inherit;height:30px'>
	
	</td>
  </tr
></table>   
</body>
<script language="JavaScript" type="text/javascript">

function validate()
{

	var frm = document.loginfrm;
	var error = new Array();
	var errorMessage = "";
	//alert(frm.conpwd);
	
	if(frm.username.value==''){
		error[0] ="username is empty" ;	
	}
	if(frm.password.value==''){
	error[1] ="password is empty" ;
	}
	var i;
	
	for(i= 0 ;i<=error.length; ++i)
	if(error[i]!=undefined)
	errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : "";
	
	if(errorMessage == "")
	{
	 frm.submit();
	}
	else
	{	
	alert(errorMessage);
	return false;
	}
}

function loadpage()
{
	document.getElementById('username').focus();
}
</script>