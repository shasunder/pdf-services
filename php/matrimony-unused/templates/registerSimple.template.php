<div style="float: left;margin:20px;width:90%;height:100%" >         		

          	 <form name="home_register" method="post" action="insert_register.php">
                     <input type="hidden" name="index" value="simple"/>
                     
	              <table>
	                <thead>
	                 	<tr align="left"> <th colspan="2"><h1>Sign up ( Free! ) </h1></th></tr>
	                </thead>
	                <tr ><td colspan="2"><div class="error" id="error"/>
	                        <?php
	                         if($_GET['status']==-1){
	                        	echo 'Sorry! Invalid email id or it is already taken!!';
	                         }
	                         ?></div></td></tr>
					<tr>
						<td width="20%">Name</td>
						<td>
							<input type="text" name="txtName" id="txtName" style="width: 155px;" maxlength="25"  value="">
						</td>
					</tr>
					<tr>
						<td>Age</td>
						<td>
						 <input type="text" name="txtAge" id="txtAge" maxlength="2" style="width: 50px;" value="">
						</td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td>
	  					  <input name="txtGender" type="radio" value="F" id="gender"> Female <input name="txtGender" type="radio" value="M" id="gender"> Male
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
	  					   <input name="txtEmail" id="txtEmail" type="text" style="width: 155px;" value="" maxlength="40" onblur="validateRegistration()" > 
	                     	<div class="vali_red_email" id="emailError"/>
	                        </div>
	                   </td>
					</tr>
					<tr>
						<td>Password</td>
						<td>
	  					   <input name="txtPwd" id="txtPwd" type="password" style="width: 55px;" value="" maxlength="15"/>
	                     	<div class="vali_red_email" id="emailError">
	                        </div>
	                   </td>
					</tr>
	                <tr>
	                  <td colspan="2">
	                        <div class="h_search_sub_head1">
	                          <input type="submit" name="reg_submit" value="Register"  class="button" width="66" height="21" onclick=
	                          "validateRegistration();if(document.getElementById('emailError').innerHTML!='')return false; else if(document.getElementById('emailError').style.color!='green'){document.getElementById('txtEmail').value=''; return true;}">
	                        </div>
	                     
	                  </td>
	
	                </tr>
	              </table>
             </form>
             </div>
