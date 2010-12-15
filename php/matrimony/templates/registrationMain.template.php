<body onLoad="FillProfile('ddlProfile');FillMonth('ddlMonth');FillDate('ddlDate');FillMarital('ddlMarital');FillChild('ddlChildren');FillReligion('ddlReligion');">
<!--<div>
<table align="center"  cellpadding="0" cellspacing="0" >
<tr>
<td  background="./images/bg_03.jpg" height="92px" width="11"></td>
<td width="148"  background="./images/bg_05.jpg" align="center" valign="middle">
<span style="color:#FFFFFF"><b>STEP 1</b></span><br /><span style=" color:#FFFFFF" >Registration</span></td>
<td width="148" background="./images/bg_05.jpg" align="center" valign="middle">
<span style="color:#36706F"><b>STEP 2</b></span><br /><span style=" color:#36706F" >Registration</span></td>
<td width="148"  background="./images/bg_05.jpg" align="center" valign="middle">
<span style=" color:#36706F"><b>STEP 3</b></span><br /><span style=" color:#36706F" >Registration</span></td>
<td width="148" background="./images/bg_05.jpg" align="center" valign="middle">
<span style=" color:#36706F"><b>STEP 4</b></span><br /><span style=" color:#36706F" >Registration</span></td>
<td  background="./images/bg_07.jpg" height="92px" width="17"> </td>
</tr>
</table>
</div>-->


<table width="570" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif" /></span></td>
<td width="554" background="./images/lightbox_top.gif">&nbsp;</td>
<td width="31"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" /></span></td>
</tr>
<tr>
<td background="./images/lightbox_left.gif"></td>
<td>

<form name="regMain" action="insert_register.php" method="post" >
<div class="">  
        <input type="hidden" name="index" value="first">
	 	<div id="register_bg" >
		<div  id="head">Registration<span class="step_text">Step - 1</span></div>
	 	  	<div id="reg_top"></div>
			<div class="manitory" ><span class="star">*</span>Mandatory Fields </div>
			<div class="line_img"> </div> <br />
			<div  id="divPrefer" class="width">
		  <div class="row">
			  <label>Prefer<span class="star">*</span></label>
		    <span class="row" > :
		    <select name="ddlPrefer" id="ddlPrefer" class="textfield" style="width:140px; height:18px;" onBlur=" ddlEmptyChk('ddlPrefer','preferError','Select your Prefer Type')" onChange="ddlClear('ddlPrefer','preferError')">
              <option>- Select - </option>
            	<? for($i=0; $i<count($pcat); $i++) { echo '<option value="'.$pcat[$i].'"'.$spcat[$i].'>'.$pcat[$i].'</option>'; } ?>
				</select>
		    </span><span  class="vali_red"></span></div> 
			</div>
			<div  class="row" style="width:100%; height:15px;">
				<div class="vali_red_login" style="width:8.5%; float:left;"> </div>
				
			    <div  class="vali_red_email" style="width:36%; float:left; text-align:left;" align="left" id="preferError" >  </div>
		  </div>						
			 <br/>
			<div class="line_img"> </div>  <div  class="sub_head">Your Account Information </div>  
			<div id="divLogin"  style="float:left" class="bg_width">
			<div class="row" style="width:100%; height:15px;">
					<div class="row_in"style="width:50%; float:left; ">
					  <label>Login ID<span class="star"> *</span></label>
					  :
					    <input name="txtLogin" id="txtLogin" type="text" class="textfield" maxlength="15" size="25" style="height:14px;width:140px;" value=""  onblur="txt_empty('txtLogin','useridError','Enter your LoginId');if(document.getElementById('txtLogin').value != ''){ return showlogin(txtLogin.value,'login','LoginId','tm_profile','useridError'); }" onChange="capWords('txtLogin');"  >
					    <input name="logintextfield" type="hidden" id="logintextfield"  value="" />
					</div>
			  <div class=""style="width:49%; float:left; height:20px;"><span  style="margin-left:44px;"class="form_text">Email ID</span> <span class="star">*</span> :
			<input name="txtEmail" id="txtEmail" type="text" class="textfield" size="28" value="<?php echo $_POST['txtEmail'];?>"  maxlength="40" style="width:140px;height:14px;" onBlur="if(document.getElementById('txtEmail').value==''){txt_empty('txtEmail','emailError','Enter your EmailId');}else{email_validation('txtEmail','emailError','Enter your valid EmailId','EmailId','tm_profile');}" />
					  <input name="emailtextfield" type="hidden" id="emailtextfield"  />
			  </div>
		  </div>
			<div class="row" style="width:100%; height:15px;">
				<div class="vali_red_login" style="width:25.5%; float:left;" id="useridError" ></div>
				<div class="vali_red_email" style="width:36%; float:left; " align="left" id="emailError" ></div>
			</div>
		  </div> 		  			
			<div id="divPwd" class="width" style="float:left; height:40px;">
		  <div class="row" ><label>Password<span class="star">* </span></label>
		    :
		      <input name="txtPwd" id="txtPwd" type="password" class="textfield" size="25" maxlength="8" style="height:14px;width:140px;" onBlur="txt_empty('txtPwd','pwdError','Enter your Password');if(document.getElementById('txtPwd').value != ''){valid_chk('txtPwd','pwdError','4','8','Your password should be 4 to 8 characters') }" />
</div>
				<div class="row" style="margin-left:84px;">
				  <span class="vali_red_login" id="pwdError"></span>		  </div>		
</div>
		<div id="divProfile" class="width" style="float:left">
		  <div  class="row"style="width:100%; height:15px;">
					<div class="row_in"style="width:50%; float:left;"><label>Confirm Password<span class="star"> *</span></label>
					  :
					    <input name="txtConpwd" id="txtConpwd" type="password" maxlength="8" class="textfield" size="25" style="height:14px;width:140px;"  onblur="txt_empty('txtConpwd','conpwdError','Please Enter your confirm Password');checkpasss('txtPwd','txtConpwd','conpwdError','Please confirm the given Password')">
					</div>	
					<div  class=""style="width:49%; float:left;"><span class="form_text">Profile Created by </span> <span class="star">*</span> : 
					  <select name="ddlProfile" id="ddlProfile" class="textfield" style="width:100px; height:18px; width:140px;"  onblur=" ddlEmptyChk('ddlProfile','profileError','Select your Prfolie Creater')" onChange="ddlClear('ddlProfile','profileError')">
                        <option>- Select -</option>
                      </select> 
			  </div>	
		  </div>					
					<div  class="row"style="width:100%; height:15px;">
					<div class="vali_red_login" style="width:37%; textalign:left; float:left;" id="conpwdError" align="left"></div>
					<div  class="vali_red_email" style="width:31%; float:left;" id="profileError" ></div>	
					</div>
		  </div>
					<div class="row style1"   id="line"></div>
					<div  class="line_img"> </div>
					<div class="sub_head">Can you just brief about yourself?</div> <br>
					<div class="sub_head1">Basic Information</div> <br>
					<div class="row style1"   id="line"></div>
					<div id="divName" class="width" style="float:left;">
					<div class="width" >
					<div class="form_31_head">First Name <span class="star">* </span></div>
					<div class="form_31_head">Middle Name</div>
					<div class="form_31_head">Last Name<span class="star">* </span></div>
					</div>
					<div class="width" >
					<div class="form_31"><span class="row">
					  <input name="txtFname" id="txtFname" type="text" class="textfield" size="30" maxlength="15" value="<?= $_POST['textName'];?>" style="height:14px;width:140px;" onKeyUp="return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');" onBlur="txt_empty('txtFname','fnameError','Enter your First Name')" onChange="capWords('txtFname');">
					</span></div>
					<div class="form_31"><span class="row">
					  <input name="txtMname" id="txtMname" type="text" class="textfield" size="30" maxlength="15" style="height:14px;width:140px;" onKeyUp="return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');" onChange="capWords('txtMname');">
					</span></div>
					<div class="form_31"><span class="row">
					  <input name="txtLname" id="txtLname" type="text" class="textfield" size="30" maxlength="15" style="height:14px;width:140px;" onKeyUp="return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');" onBlur="txt_empty('txtLname','lnameError','Enter your Last Name')" onChange="capWords('txtLname');">
					</span></div>
					</div>
					<div class="width">
					<div  class="form_31_red" id="fnameError"></div>
					<div  class="form_31_red" id="mnameError"></div>
					<div  class="form_31_red" id="lnameError"> 	
		  </div> 
		  </div>					
					<div id="divDob" class="width" style="float:left">
					<div class="width" ></div><div  class="line_img"> </div>	
					<div class="form_31_head">Gender<span class="star">* </span></div>
					<div class="form_31_head">Date of Birth<span class="star">  </span></div>
					<div class="form_31_head">Age<span class="star">* </span></div>
					</div>
					<div class="width" >
					<div class="form_31">
					  <input name="radioGender" id="Gender" type="radio" value="F" onBlur="val_radio(this,'genderError','Please select the gender');"  onclick="gender_year('ddlYear','18','53')"/> Female
					  <input name="radioGender" id="Gender" type="radio" value="M" onBlur="val_radio(this,'genderError','Please select the gender');" onClick="gender_year('ddlYear','21','50')"/>Male
					</div>
					<div class="form_31">
				<select name="ddlMonth" id="ddlMonth" class="textfield" style=" height:18px; width:60px;" >
					    <option>- Month - </option>
                      </select>
				<select name="ddlDate" id="ddlDate" class="textfield"  style=" height:18px; width:60px;" >
					<option> - Date -</option>
                      </select>
				<select name="ddlYear" id="ddlYear" class="textfield" style=" height:18px; width:60px;" onChange="Age('ddlDate','ddlMonth','ddlYear','txtAge','ageError');ddlClear('ddlMonth','dobError');">
					<option value="0">- Year -</option>
                    </select>
											<span class="style3">(or)</span>					  </div>
					<div class="form_31" style="height:18px;"><span class="row">
					  <input name="txtAge" id="txtAge" type="text" class="textfield1" size="2" maxlength="2" value="<?= $_POST['age'];?>" style="width:40px;height:14px;"  onkeyup="return char_val(this,'0123456789');"onblur="txt_empty('txtAge','ageError','Enter your Age')" readonly="readonly"> 
					</span>Years</div>
					</div>
					<div class="width">
					<div  class="form_31_red" id="genderError"></div>
					<div  class="form_31_red" id="dobError"></div>
					<div  class="form_31_red" id="ageError"></div>		
		  </div> 
		  </div>
					
					<div id="divMarital" class="width" style="float:left"><div  class="line_img"> </div>
		  <div class="width" >
			<div class="form_31_head">Marital Status<span class="star">* </span></div>
					<div class="form_31_head">No. of Children<span class="star">*  </span></div>
					<div class="form_31_head">Children Living Status</div>
		  </div>
					<div class="width" >
					<div class="form_31">
					  <select name="ddlMarital" id="ddlMarital" class="textfield" style="width:140px; height:18px;" onBlur=" ddlEmptyChk('ddlMarital','maritalError','Select your Marital Status');if(document.getElementById('ddlChildren').disabled == false) {ddlEmptyChk('ddlChildren','childError','Select your No of Children');}" onChange="ddl_enable('ddlMarital','ddlChildren','childError','radioL','radioNL');ddlClear('ddlMarital','maritalError');if(document.getElementById('ddlChildren').disabled == true){ddlClear('ddlChildren','childError');}">
					    <option>- Select -</option>
                      </select>
					</div>
					<div class="form_31">
					  <select name="ddlChildren" id="ddlChildren" class="textfield" style="width:140px; height:18px;" onBlur=" ddlEmptyChk('ddlChildren','childError','Select your No of Children');" onChange="rad_enable('ddlChildren','radioL','radioNL');ddlClear('ddlMarital','maritalError');ddlClear('ddlChildren','childError');if(this.value=='Select'){document.getElementById('radioL').disabled=true;document.getElementById('radioNL').disabled=true;}" disabled="true">
					    <option>Select</option>
                      </select>
					</div>
					<div class="form_31">
					  <input name="radioChildStatus" id="radioL" type="radio" value="Living" disabled="disabled" >Living with me
					  <input name="radioChildStatus" id="radioNL" type="radio" value="Not Living" disabled="disabled"> Not living with me
					</div>
					</div>
					<div class="width">
					<div  class="form_31_red" id="maritalError"></div>
					<div  class="form_31_red" id="childError"></div>
					<div  class="form_31_red" id="childstatusError">&nbsp;</div>		
		  </div> 
		  </div>
					<div class="row style1"   id="line"></div>
					<div  class="line_img"> </div> <br />
                    <div class="sub_head1">Nationality</div>
					<div class="row style1"   id="line"></div>
					<div id="divCountry" class="width" style="float:left">
					<br />
							  <div class="width" >
			<div class="form_31_head">Citizenship<span class="star">*</span></div>
					<div class="form_48_head">Residing Country<span class="star"> * </span></div>
		  </div>
					<div class="width" >
					<div class="form_31"  >
					  <select name="ddlCitizen" id="ddlCitizen" class="textfield" style="width:140px; height:18px;" onBlur="gethdValue('ddlCitizen','citizenHd');ddlEmptyChk('ddlCitizen','citizenError','Select your Citizenship');"  onchange="ddlClear('ddlCitizen','citizenError')">
					   <?php
						 	$country=explode("|",$countryValue);
							$countCountry=count($country);				    									   					    
						  	for($i=0;$i<count($country);$i++)
							{
							?>
							<option style="width:112px;" value='<?=$i;?>'><? echo $country[$i];?></option>
							<?
							}
						?>
                      </select>
					  <input type="hidden" name="citizenHd" id="citizenHd" value="">
					</div>
					<div class="form_48">
					  <select name="ddlCountry" id="ddlCountry" class="textfield" style="width:140px; height:18px;" onBlur=" ddlEmptyChk('ddlCountry','countryError','Select your Country')" onChange="ddlClear('ddlCountry','countryError');FillCcode_ph('txtCcode','ddlCountry');gethdValue('ddlCountry','countryHd');" >
					 
					  <?php
						  	for($i=0;$i<count($country);$i++)
							{
							?>
							<option style="width:112px;" value='<?=$i;?>'><? echo $country[$i];?></option>
							<?
							}
						?>
                      </select>
                      <input type="hidden" name="countryHd" id="countryHd" value="">
                   	  </div>
					</div>
					
					<div class="width">
					<div  class="form_31_red" id="citizenError"></div>
					<div  class="form_48_red" id="countryError">&nbsp;</div>
					</div>
					</div>
					<div class="row style1"   id="line"></div>
					<div  class="line_img"> </div> <br />
							  <div class="sub_head1">Religion & Community</div> <br />
					<div class="row style1"   id="line"></div>
					<div id="divReligion" class="width" style="float:left">
							  <div class="width" >
			<div class="form_31_head">Religion <span class="star">* </span></div>
					<div class="form_31_head">Division/Caste <span class="star">*  </span></div>
					<div class="form_31_head">Sub Caste</div>
		  </div>
					<div class="width" >
					<div class="form_31">
					  <select name="ddlReligion" id="ddlReligion" class="textfield" style="width:140px; height:18px;" onBlur=" ddlEmptyChk('ddlReligion','religionError','Select your Religion');" onChange="ddlClear('ddlReligion','religionError');FillCommunity('ddlReligion','ddlCommunity');ddl_disable('ddlReligion','ddlCommunity','communityError');">
					    <option>- Select -</option>
                      </select>
					</div>
					<div class="form_31">
					  <select name="ddlCommunity" id="ddlCommunity" class="textfield" style="width:140px; height:18px;" onBlur=" ddlEmptyChk('ddlCommunity','communityError','Select your Community')" onChange="ddlClear('ddlCommunity','communityError');">
					    <option>- Select -</option>
                      </select>
					</div>
					<div class="form_31" style="height:18px;"><span class="row">
					  <input name="txtCaste" id="txtCaste" type="text" class="textfield" size="30" maxlength="15" style="height:14px;width:140px;" onKeyUp="return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');" onChange="capWords('txtCaste');">
					</span></div>
					</div>
					<div class="width">
					<div  class="form_31_red" id="religionError"></div>
					<div  class="form_31_red" id="communityError"></div>
					<div  class="form_31_red" id="casteError"></div>		
		  </div>
		  </div> 
					<div class="row style1"   id="line"></div>
					<div  class="line_img"> </div> <br />
					<div class="sub_head1">Communtication</div>
					<div class="row style1"   id="line"></div> <br />
					<div id="divPhone" class="width" style="float:left">
					  <div class="width" >
			<div class="form_31_head">Country code Mobile Number<span class="star">* </span></div>
					<div class="form_48_head">STD code Telephone Number</div>
					</div>
							  <div class="width" >
					<div class="form_31" style="height:18px;"><span class="row">
					  <input name="txtCcode" id="txtCcode" type="text" class="textfield" style="height:14px;width:40px;" size="8" maxlength="5" readonly="READONLY">
                    </span><span class="row">
                    <input name="txtMobile" id="txtMobile" type="text" class="textfield" size="16" maxlength="15" style="height:14px;width:110px;" onKeyUp="return char_val(this,'0123456789');" onBlur="valid_chk('txtMobile','mobileError','10','15','Your phone number should be 10 to 15 digits')" >
                    </span></div>
					<div class="form_48"style="height:18px;">
					  <input name="txtAcode" id="txtAcode" type="text"  style="height:14px;width:40px;" class="textfield" size="8" maxlength="7" onKeyUp="return char_val(this,'123456789');" onBlur="valid_chk('txtAcode','phoneError','2','7','Your code number should be 2 to 7 digits')"/>
                <input name="txtPhone" id="txtPhone" type="text"  class="textfield" size="16" maxlength="15" style="height:14px;width:110px;" onKeyUp="return char_val(this,'0123456789');" onBlur="valid_chk('txtPhone','phoneError','6','15','Your Phone number should be 6 to 15 digits')"/>
					</div>
					</div>
					<div class="width">
					<div  class="form_31_red" id="mobileError">&nbsp;</div>
					<div  class="form_48_red" id="phoneError">	</div>
					</div>
					</div>
					<div class="row style1"   id="line"></div>
					<div class="line_img"> </div>


			<div class="form_100" >
			  <div align="center">
   		        <input type="checkbox" name="checkAgree" id="checkAgree" checked="checked" onClick="val_checkbox('checkError','Please select the terms and conditions');">
		   		   I have read and agree to the <a style="text-decoration:none; color:#990000" href="javascript:void(0)" onclick = "document.getElementById('fade').style.display='block';showmain('2');">Privacy Policy</a> And <a style="text-decoration:none; color:#990000" href="javascript:void(0)" onclick = "document.getElementById('fade').style.display='block';showmain('3');">Terms & Conditions</a></div>
					<center><div style="width:308px; color:red; height:14px;" align="left" id="checkError"></div>
					</center>
			</div>
		  <div class="line_img"> </div>
		    
			
			<div style="padding-top:10px; padding-bottom:10px;width:100%;" align="center">

		      <input type="submit" name="Submit2" value="Submit" id="Submit"  class="btn" onClick="return loadSubmitValue();"/>
   		    
   		       <input type="reset" name="Submit22" value="Reset" id="Submit2"  class="btn" onClick="DIVClear('preferError|useridError|emailError|pwdError|conpwdError|profileError|fnameError|lnameError|genderError|ageError|maritalError|childError|citizenError|countryError|religionError|communityError|mobileError|phoneError');TXTClear('txtLogin|txtEmail|txtPwd|txtFname|txtLname|txtAge|txtMobile|txtPhone');SELECTtext('username|password|email');CHKFalse('Gender')" />
	           <input type="hidden" name="insert" id="insert" value="" />
		  </div>
			<div id="reg_bottom"></div>
   		  </div>

  </div>
</div>
</form>
</td>
<td background="./images/lightbox_right.gif">&nbsp;</td>
</tr>
<tr>
<td><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_b.gif" width="25" height="25" /></span></td>
<td background="./images/lightbox_bottom.gif">&nbsp;</td>
<td><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_b.gif" width="25" height="25" /></span></td>
</tr>
</table> 
</body>