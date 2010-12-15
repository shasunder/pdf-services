<div class="page">
<div style="width:738px; margin:auto; background-color:#FFFFFF; border:1px solid #ebebeb; height:600px; padding:10px; ">

<div style=" position:absolute; top:172px; left:268px; width:130px; height:26px; " >
    <div style="float:left; width:6px; height:22px;"><img src="./images/lightbox_h_l.gif" /> </div>
    <div style="float:left; width:auto; height:18px; padding-top:4px;background-image:url(./images/lightbox_c.gif); font-family:Tahoma; font-size:11px; font-weight:bold; color:#fff;">&nbsp;Login&nbsp;</div>
    <div style="float:left; width:6px; "><img src="./images/lightbox_h_r.gif" /> </div>
  </div>
<div style="width:246px; height:inherit; float:left;"><form name="home_register" method="post" action="login.php">  
<table height="20px">
<tr>
<td height="20">

</td>
</tr>
</table>
<table  width="246" border="0"  cellspacing="0" cellpadding="0" >

  <tr>
  
    <td width="12"><img src="images/reg_t_l_log.gif" width="12" height="14" /></td>
    <td width="219" style="background-image: url(images/reg_t_log.gif); background-repeat:repeat-x;"> </td>
    <td width="15"><img src="images/reg_t_r_log.gif" width="12" height="14" /></td>
  </tr>
  <tr>
    <td style="background-image:url(images/reg_l_log.gif); background-repeat:repeat-y;"> </td>
	<!--<div style="background:url(images/header_login.gif); background-repeat:repeat-y; cursor:pointer;">&nbsp;</div> -->
	 <div>  </div> 
    <td bgcolor="#5CACB5">
      <br />
	<div style="width:100%; color:#FF0000; height:15px; display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php	
        if($_REQUEST['id']=='1') {
			echo "Invalid Email Id/Password"; 
		}
	 	?>
   </div> 
	<div class="h_search_sub_head" >Matrimony ID / E-mail</div>
	<div class="h_search_sub_head1">
	 <input type="text" value='ID/Email' class="textfield"  style="width:170px; font-size:11px;" name="matrimonyid" id="matrimonyid" onBlur="if (this.value == ''){ this.value = 'ID/Email';}" onFocus="if (this.value == 'ID/Email') {this.value = '';}" onClick="if (this.value == 'ID/Email') { this.value = ''; }" /> </div>
	  <div class="h_search_sub_head" >Password</div>
	  <div class="h_search_sub_head1">
	    <input type="password" class="textfield"  style="width:170px; font-size:11px;" name="txtpassword" id="txtpassword" value="password" size="6" onBlur="if (this.value == ''){this.value = 'password';}" onFocus="if (this.value == 'password'){this.value = '';}" onClick="if (this.value == 'password'){this.value= '';}" /> 	  </div>
		
	 
		<br />
		<div class="h_search_sub_head1">
         
		<input type="image" name="reg_submit" value="submit" src="images/btn_loginpg_login.gif"  border="0"/></div>
		<div ><a href = "javascript:void(0)" onclick = "document.getElementById('fade').style.display='block';showmain('1');" style="text-decoration:none;" class="headerforgetpswd">Forget Password ?</a></div>
		</td>
    <td style="background-image:url(images/reg_r_log.gif); background-repeat:repeat-y;"> </td>
  </tr>
  <tr>
    <td><img src="images/reg_b_l_log.gif" width="12" height="10" /></td>
    <td style="background-image:url(images/reg_b_log.gif); background-repeat:repeat-x;" ></td>
    <td><img src="images/reg_b_r_log.gif" width="12" height="10" /></td>
  </tr>
</table></form> </div>
<div style="float:right; width:425px; border:1px solid red;"> 
<img src="./images/pothys.gif" />
</div>
</div></div>