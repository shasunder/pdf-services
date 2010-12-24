<form name="regMain" action="insert_register.php" method="post" >
<div class="">  
        <input type="hidden" name="index" value="first">
	 	<div id="register_bg" >
		<div  id="head">Registration<span class="step_text">Step - 1</span></div>
	 	  	<div id="reg_top"></div>
			<div class="manitory" ><span class="star">*</span>Mandatory Fields </div>
			<div  id="divPrefer" class="width">
			</div>
		  
		  <br/>
					<div class="sub_head">Can you just brief about yourself?</div> <br>
					 <div  class="row"style="width:100%; height:15px;">	
					<div  class=""style="width:49%; float:left;"><span class="form_text">Profile Created by </span> <span class="star">*</span> : 
					  <select name="ddlProfile" id="ddlProfile" class="textfield" style="width:100px; height:18px; width:140px;"  onblur=" ddlEmptyChk('ddlProfile','profileError','Select your Prfolie Creater')" onChange="ddlClear('ddlProfile','profileError')">
                        <option>- Select -</option>
                      </select> 
			  </div>	
		  </div>
		  <br/>
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
					<div class="form_31_head">Date of Birth<span class="star">  </span></div>
					</div>
					<div class="width" >
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
											<span class="style3"></span>					  </div>
					</div>
					<div class="width">
					<div  class="form_31_red" id="dobError"></div>
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
							  <div class="sub_head1">Community</div> <br />
					<div class="row style1"   id="line"></div>
					<div id="divReligion" class="width" style="float:left">
							  <div class="width" >
					<div class="form_31_head">Sub Caste</div>
		  </div>
					<div class="width" >
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
</form>


<script language="javascript" type="text/javascript">
FillProfile('ddlProfile');
FillMonth('ddlMonth');
FillYears('ddlYear');
FillDate('ddlDate');
FillMarital('ddlMarital');
FillChild('ddlChildren');
//defaults
//$('#ddlMarital').val('single');

</script>