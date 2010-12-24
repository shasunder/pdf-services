<div class="page">

<div style="width:246px; height:inherit; float:left;padding:30px;" >
<form name="home_register" method="post" action="login.php">  
<table height="20px">
<table  width="246" border="0"  cellspacing="0" cellpadding="0" >

  <tr>
	<!--<div style="background:url(images/header_login.gif); background-repeat:repeat-y; cursor:pointer;">&nbsp;</div> -->
    <td>
      <br />
	<div style="width:100%; color:#FF0000; height:15px; display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php	
        if($_REQUEST['id']=='1') {
			echo "Invalid Email Id/Password"; 
		}
	 	?>
   </div> 
	<h2>Sign in</h2>
	<div class="h_search_sub_head1">
	 <input type="text" value='Email' class="textfield"  style="width:170px; font-size:11px;" name="matrimonyid" id="matrimonyid" onBlur="if (this.value == ''){ this.value = 'Email';}" onFocus="if (this.value == 'Email') {this.value = '';}" onClick="if (this.value == 'Email') { this.value = ''; }" /> </div>
	  <div class="h_search_sub_head" >Password</div>
	  <div class="h_search_sub_head1">
	    <input type="password" class="textfield"  style="width:170px; font-size:11px;" name="txtpassword" id="txtpassword" value="" size="6"  onFocus="if (this.value == 'password'){this.value = '';}" onClick="if (this.value == 'password'){this.value= '';}" /> 	  </div>
		
	 
		<br />
		<div class="h_search_sub_head1">
         
		<input type="submit" name="reg_submit" value="Login" class="loginButton"  border="0"/></div><br/>
		<div ><a href = "javascript:void(0)" onclick = "document.getElementById('fade').style.display='block';showmain('1');" style="text-decoration:none;" class="headerforgetpswd">Forgot Password ?</a></div>
		</td>
  </tr>
</table></form> </div>
</div></div>