<? session_start(); ?>
<form  name="regStepTwo" method="post" action="insert_register.php" >

        <div id="register_bg">
		<div  id="head">Registration<span class="step_text">Step - 2</span></div>
			<input type="hidden" name="index" value="second" >
	 	  	<div id="reg_top"></div>
			<div class="manitory" ><span class="star">*</span> Mandatory Fields </div>
			<div class="line_img"> </div> 
			<div class="sub_head1">Habits <span class="star">*</span></div> 
		    <br />
		    <div id="food" class="bg_width" style="float:left;" >
		    <div class="width">
					<div class="form_100_head" id="head_food">Food</div>
		    </div>
		  	<div class="width" >
				<div class="form_100"> 
				  <input name="radiofood" type="radio" id="rfood" value="Vegetarian" onClick="val_radio(this,'foodError','Please select the Food');" onBlur="val_radio(this,'foodError','Please select the Food');removecolor('food');" onFocus="setcolor('food');"/>
				Vegetarian
				  <input name="radiofood" type="radio" value="Non-Vegetatrian" id="rfood" onClick="val_radio(this,'foodError','Please select the Food');" onBlur="val_radio(this,'foodError','Please select the Food');removecolor('food');" onFocus="setcolor('food');"/>
				Non-Vegetatrian
				  <input name="radiofood" type="radio" value="Eggetarian" id="rfood" onClick="val_radio(this,'foodError','Please select the Food');" onBlur="val_radio(this,'foodError','Please select the Food');removecolor('food');" onFocus="setcolor('food');"/> 
				 Eggetarian
			  </div>
			</div>
			<div class="width">
				  <div class="form_100_red" id="foodError"> </div>
			</div>
		    </div>
			<div class="row style1"   id="line"></div> <div class="line_img"> </div>
			<div id="smoke" class="bg_width" style="float:left">
			<div class="width">
			<div class="form_48_head">Smoking</div>
			<div class="form_48_head">Liquor</div>
		  	</div>		
		  	<div class="width" >
			<div class="form_48">     
				<input name="radiosmoke" type="radio" id="rsmoke" value="Non-Smoker" onBlur="val_radio(this,'smokeError','Please select the Smoking');removecolor('smoke');" onClick="val_radio(this,'smokeError','Please select the Smoking');" onFocus="setcolor('smoke');"/>
				 Non-Smoker
				 <input name="radiosmoke" type="radio" id="rsmoke" value="Regular" onBlur="val_radio(this,'smokeError','Please select the Smoking');removecolor('smoke');" onClick="val_radio(this,'smokeError','Please select the Smoking');" onFocus="setcolor('smoke');"/>
				Regular
				<input name="radiosmoke" type="radio" id="rsmoke" value="Occasionally" onBlur="val_radio(this,'smokeError','Please select the Smoking');removecolor('smoke');" onClick="val_radio(this,'smokeError','Please select the Smoking');" onFocus="setcolor('smoke');"/>
			Occasionally
			</div>
			<div class="form_48">
			   <input name="radioliquor" type="radio" id="rliquor" value="Non-liquor" onBlur="val_radio(this,'liqurError','Please select the Liquor');removecolor('smoke');" onClick="val_radio(this,'liqurError','Please select the Liquor');" onFocus="setcolor('smoke');"/>
			  Non-liquor
				<input name="radioliquor" type="radio" id="rliquor" value="Regular" onBlur="val_radio(this,'liqurError','Please select the Liquor');removecolor('smoke');" onClick="val_radio(this,'liqurError','Please select the Liquor');" onFocus="setcolor('smoke');"/>
				Regular
				<input name="radioliquor" type="radio" id="rliquor" value="Occasionally" onBlur="val_radio(this,'liqurError','Please select the Liquor');removecolor('smoke');" onClick="val_radio(this,'liqurError','Please select the Liquor');" onFocus="setcolor('smoke');"/>
			Occasionally
			</div>
			</div>
			<div class="width"> 
			   <div class="form_48_red" id="smokeError">  </div>
			   <div class="form_48_red" id="liqurError"> </div>
			</div>
		    </div>			
		    <div class="row style1"   id="line"></div>
		    <div class="line_img"> </div> 
		    <div class="sub_head1">Physique & Health <span class="star">*</span></div>
			<br />
			<div id="comp" style="float:left" class="bg_width">	
		    <div class="width" id="id_width">
			<div class="form_100_head">Complexion</div>
		    </div>
		  	<div class="width" >
				<div class="form_100">
			   		  <input name="radiocomp" type="radio" id="rcomplex" value="Very Fair" onBlur="val_radio(this,'complexionError','Please select the Complexion');removecolor('comp');" onClick="val_radio(this,'complexionError','Please select the Complexion');" onFocus="setcolor('comp');"/>
					Very Fair
					  <input name="radiocomp" type="radio" id="rcomplex" value="Fair" onBlur="val_radio(this,'complexionError','Please select the Complexion');removecolor('comp');" onClick="val_radio(this,'complexionError','Please select the Complexion');" onFocus="setcolor('comp');"/>
					 Fair
					  <input name="radiocomp" type="radio" id="rcomplex" value="Wheatish" onBlur="val_radio(this,'complexionError','Please select the Complexion');removecolor('comp');" onClick="val_radio(this,'complexionError','Please select the Complexion');" onFocus="setcolor('comp');"/>
					 Wheatish
					 <input name="radiocomp" type="radio" id="rcomplex" value="Brown" onBlur="val_radio(this,'complexionError','Please select the Complexion');removecolor('comp');" onClick="val_radio(this,'complexionError','Please select the Complexion');" onFocus="setcolor('comp');"/>
					Wheatish Brown
					 <input name="radiocomp" type="radio" id="rcomplex" value="Dark" onBlur="val_radio(this,'complexionError','Please select the Complexion');removecolor('comp');" onClick="val_radio(this,'complexionError','Please select the Complexion');" onFocus="setcolor('comp');"/>
					 Dark
				</div>
			</div>
			<div class="width">
					<div class="form_100_red" id="complexionError">  </div>
			</div>
			</div>
			<div class="row style1"   id="line"></div> <div class="line_img"> </div>
			<div id="btype" class="bg_width"  style="float:left;">
		    <div class="width">
			<div class="form_48_head">Body Type</div>
			<div class="form_48_head">Blood Group</div>
		    </div>
		  	<div class="width" >
			<div class="form_48">       
			<input name="radiobody" type="radio" id="rbody" value="Average" onBlur="val_radio(this,'typeError','Please select the Body Type');removecolor('btype');" onClick="val_radio(this,'typeError','Please select the Body Type');" onFocus="setcolor('btype');"/>
			Average
			<input name="radiobody" type="radio" id="rbody" value="Athletic" onBlur="val_radio(this,'typeError','Please select the Body Type');removecolor('btype');" onClick="val_radio(this,'typeError','Please select the Body Type');" onFocus="setcolor('btype');"/>
			Athletic
			<input name="radiobody" type="radio" id="rbody" value="Slim" onBlur="val_radio(this,'typeError','Please select the Body Type');removecolor('btype');" onClick="val_radio(this,'typeError','Please select the Body Type');" onFocus="setcolor('btype');"/>
			Slim
			<input name="radiobody" type="radio" id="rbody" value="Heavy" onBlur="val_radio(this,'typeError','Please select the Body Type');removecolor('btype');" onClick="val_radio(this,'typeError','Please select the Body Type');" onFocus="setcolor('btype');"/>
			Heavy
			</div>
			<div class="form_48">
			  <select name="ddlblood" id="ddlblood" class="textfield" style="width:100px; height:18px; width:175px;" onBlur="ddlEmptyChk('ddlblood','bloodError','Please select the Blood Group');removecolor('btype');" onChange="ddlClear('ddlblood','bloodError');" onFocus="setcolor('btype');">
				<option>- Select - </option>
			  </select>
		   </div>
		  </div>
		  <div class="width">
			  <div class="form_48_red" id="typeError" style="width:337px;"></div>
			  <div class="form_100_red" id="bloodError" ></div>
		  </div>
		</div>
		 <div class="row style1"   id="line"></div> <div class="line_img"> </div>
		 <div id="height" class="bg_width" style="float:left;"><div class="width">
		 <div  class="form_48_head">Height</div>
		 <div  class="form_48_head">Weight</div>
		 </div>
		 <div class="width" >
			<div  class="form_48">
					  <select name="ddlfeet" id="ddlfeet" class="textfield" style="width:100px; height:18px;" onBlur="ddlEmptyChk('ddlfeet','heightError','Please select the Height');removecolor('height');" onChange="ddlClear('ddlfeet','heightError');" onFocus="setcolor('height');">
					    <option>- Feet/Inch -</option>
                      </select>
			</div>
			<div  class="form_48">
				  <select name="ddlkgs" id="ddlkgs" class="textfield"  style="width:100px; height:18px;" onBlur="ddlEmptyChk('ddlkgs','weightError','Please select the Weight');removecolor('height');" onChange="ddlClear('ddlkgs','weightError');" onFocus="setcolor('height');">
				  <option>- Kgs -</option>
                </select>
				   	<!--(or)
				<select name="ddllbs" id="ddllbs" class="textfield" style="width:100px;height:18px;" onBlur="ddlEmptyChk('ddllbs','weightError','Please select the Weight');removecolor('height');" onChange="ddlClear('ddllbs','weightError');" onfocus="setcolor('height');">
				  <option >- Lbs -</option>
				</select>-->
			</div>
			</div>
			<div class="width">
					<div class="form_48_red" id="heightError">  </div>
					<div class="form_48_red" id="weightError"> </div>
			</div>
		  </div>
			<div class="row style1" id="line"></div> <div class="line_img"> </div>
			<div id="status" class="bg_width" style="float:left;">
		   <div class="width">
			<div class="form_100_head">Physical Status</div>
		  </div>
		  <div class="width" >
				<div class="form_100">
					  <select name="ddlphysical" id="ddlphysical" class="textfield" style="width:100px; height:18px; width:175px;" onBlur="ddlEmptyChk('ddlphysical','statusError','Please select the Physical Status');removecolor('status');" onChange="ddlClear('ddlphysical','statusError');" onFocus="setcolor('status');">
					    <option>- Select - </option>
                      </select> 
			  </div>
		   </div>
			<div class="width"> 
					<div class="form_100_red" id="statusError"></div> 
			</div>
			</div>
			<div class="row style1"   id="line"></div> <div class="line_img"> </div> 
			<div class="sub_head1">Address of Communication</div> <br />
			<div id="city">
				<div class="width">
					<div class="form_31_head">City<span class="star">*</span></div>
					<div class="form_31_head">Zip/Pincode</div>
		  		</div>
			<div class="width" >
				<div id="statediv1" class="form_31_red1" style="height:20px;width:175px;" >
					  <!-- select name="ddlstate" id="ddlstate" class="textfield" style="width:175px; height:18px; font-size:11px" >
					    <option>- Select -</option>
				      </select -->
					  <input type="hidden" class="textfield1" name="txtcountry" id="txtcountry" value="<?=$row['ResidingCountry'];?>">		
					  <input type="hidden" name="txtcon" id="txtcon" value="<?=$_SESSION['state']?>"/> 
				</div>
			<div class="form_31" style="height:20px;">					
	<input type="text" class="textfield" style="height:12px; font-size:10px;" name="txtCity" id="txtCity" size="40" onFocus="document.getElementById('txtHint1').style.display=''; " onBlur="txt_empty('txtCity','cityError','Please enter your city');document.getElementById('txtHint1').style.display='none';document.getElementById('divloader').style.display='none'; " onKeyUp="if(document.getElementById('ddlstate').selectedIndex != 0) {getLocation(this.value,'<? echo $_SESSION['state']; ?>','ddlstate','txtHint1','second','city','divloader');}"/>	
	<div id="divloader"  style="float:left; margin-top:5px; height:25px; width:32%; display:none; padding-left:8px;"><img src="./images/preload.gif" width="25" height="25" /></div>		
					 <div id="txtHint1" style="padding-left:0px;display:none;"></div>
			</div>
				<div class="form_31" style="height:20px;">
					  <input name="txtpincode" id="txtpincode" type="text" class="textfield" maxlength="15" size="30" style="height:14px;" onKeyUp="document.getElementById('txtpincode').value=document.getElementById('txtpincode').value.toUpperCase();" onBlur="if(document.getElementById('txtpincode').value!=''){valid_chk('txtpincode','codeError','6','15','Your pincode should be 6 to 15 digits')};removecolor('city');" onFocus="setcolor('city');"/>
			</div>
			</div>	
			<div class="width">
			<div class="form_31_red" id="stateError"></div>
			<div class="form_31_red" id="cityError"></div>
     		<div class="form_31_red" id="codeError"></div>
	       </div>
		   <div class="width" style="float:left">
					<div class="form_100_head">Address<span class="star">*</span></div>
				
		   <div class="form_100" >
		     <textarea name="txtaddress" id="txtaddress"  style="height:35px; width:225px;" onBlur="if(document.getElementById('txtaddress').value == '') { txt_empty('txtaddress','addressError','Enetr Your Address'); } else { valid_chk('txtaddress','addressError','10','150','Address should be 10 to 150 Char') }" /></textarea>
            </div>
			<div class="width">
			<div class="form_31_red" id="addressError"></div>
			
	       </div></div>
			<div class="row style1"   id="line"></div></div> <div class="line_img"> </div>
			<div class="sub_head1">Education</div>
			<br />
			<div id="edu">
			<div class="width">
			<div class="form_31_head">Education  Category<span class="star">* </span></div>
					<div class="form_31_head">Education  Qualification<span class="star">*</span></div>
					<div class="form_31_head">&nbsp;Specialization</div>
		    </div>
			<div class="width" >
				<div class="form_31">
					  <select name="ddle_category" id="ddle_category" class="textfield"  style="width:100px; height:18px; width:175px;"  onchange="FillQualification('ddle_category','ddle_qual');ddlClear('ddle_category','categoryError'); Edu('ddle_category','ddle_qual','qualError')" onBlur="ddlEmptyChk('ddle_category','categoryError','Please select the Education Category');removecolor('edu');" onFocus="setcolor('edu');">
					    <option>- Select -</option>
                      </select>
				</div>
				<div class="form_31">
					  <select name="ddle_qual" id="ddle_qual" class="textfield"  style="width:100px; height:18px; width:175px;" onChange="ddlClear('ddle_qual','qualError');" onBlur="ddlEmptyChk('ddle_qual','qualError','Please select the Qualification');removecolor('edu');" onFocus="setcolor('edu');">
					    <option>- Select -</option>
                      </select>
				</div>
				<div class="form_31" style="height:18px;">&nbsp;
					  <input name="txtspecial" id="txtspecial" type="text" maxlength="30" class="textfield" style="height:14px;" size="30" onFocus="setcolor('edu');" onBlur="removecolor('edu');" onKeyUp="return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');" >
				</div>
			  </div>
				<div class="width">
			         <div class="form_31_red" id="categoryError" ></div>
					<div class="form_31_red" id="qualError"> <span class="star"></span></div>
					<div class="form_31_red" id="specialError"></div>
		 		</div>
				<div class="row style1"   id="line"></div></div> <div class="line_img"> </div> 
				<div class="sub_head1">Occupation<span class="star"></span></div><br />
				<div id="occ">
				<div class="width">
			        <div class="form_31_head">Occupation<span class="star">* </span></div>
					<div class="form_31_head">Employment Type</div>
					<div class="form_31_head">Annual Income</div>
		       </div>
				<div class="width" >
				<div class="form_31">
					   <select name="ddlocc" id="ddlocc" class="textfield" style="width:140px; height:18px;" onBlur=" ddlEmptyChk('ddlocc','occError','Please select the Occupation');" onChange="ddl_enable1('ddlocc','ddlemptype','ddlincome','txtincome','emptypeError','incomeError');ddlClear('ddlocc','occError');">
					    <option>- Select - </option>
                      </select>
				</div>
				<div class="form_31">
					  <select name="ddlemptype" id="ddlemptype" class="textfield"   style="width:100px; height:18px; width:175px;" onBlur="removecolor('occ');" onChange="ddlClear('ddlemptype','emptypeError');" onFocus="setcolor('occ');">
					    <option>- Select -</option>
                      </select>
				</div>
				<div class="form_31" style="height:18px;">
					  <select name="ddlincome" id="ddlincome" class="textfield" style="width:70px; height:18px;" onBlur="removecolor('occ');" onChange="ddlClear('ddlincome','incomeError');ddl_enablefun(this,'txtincome');" onFocus="setcolor('occ');">
					    <option>- Select -</option>
                      </select> 
					  <input name="txtincome" id="txtincome"  type="text" maxlength="10" style="height:14px;" class="textfield" size="20" disabled="disabled" onKeyUp="return char_val(this,'0123456789');"/>
				</div>
				</div>
				<div class="width">
					<div class="form_31_red" id="occError"></div>
					<div class="form_31_red" id="emptypeError"><span class="star"></span></div>
					<div class="form_31_red" id="incomeError"></div>
		       </div>
			   <div class="row style1"   id="line"></div></div> <div class="line_img"> </div> 
			   <div class="sub_head1">Basic Horoscopic Information</div>
			   <br />
			  <div id="rassi" class="bg_width" style="float:left;">	
		 	  <div class="width">
			  <div class="form_31_head">Gothra(m)</div>
			  <div class="form_31_head">Star<span class="star">* </span></div>
			  <div class="form_31_head">Raasi/Moon Sign<span class="star">* </span></div>
              </div>
			  <div class="width"  >
					<div class="form_31" style="height:18px;">
				    <input name="txtgrm" id="txtgrm" type="text" class="textfield" style="height:14px;" size="30" maxlength="30" onFocus="setcolor('rassi');" onKeyUp="return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');" onChange="capWords('txtgrm');"/>
			    </div>
					  <div class="form_31">
					    <select name="ddlstar" id="ddlstar" class="textfield" style=" height:18px; width:150px;" onBlur="ddlEmptyChk('ddlstar','starError','Please select the Star');removecolor('rassi');" onChange="ddlClear('ddlstar','starError');" onFocus="setcolor('rassi');">
                          <option> - Star -</option>
                      </select>
					  </div>
					  <div class="form_31">
					    <select name="ddlrassi" id="ddlrassi" class="textfield" style="width:100px; height:18px; width:150px;" onBlur="ddlEmptyChk('ddlrassi','rassiError','Please select the Raasi');removecolor('rassi');" onChange="ddlClear('ddlrassi','rassiError');" onFocus="setcolor('rassi');">
                          <option>- Rassi -</option>
                        </select>
					  </div>
			 </div>
			 <div class="width">
					  <div class="form_31_red" id=""></div>
					  <div class="form_31_red" id="starError"></div>
					  <div class="form_31_red" id="rassiError"></div>
			  </div>
		      </div>
			 <div class="row style1"   id="line"></div> <div class="line_img"> </div> 
			<div id="dosham"  class="bg_width" style="float:left;">
		    <div class="sub_head1">
		  	  Chevaai/ Kuja/Mangalik Dosham</div> <br />
			   <div class="row style1"   id="line"></div>
		       <div class="width" >
				 <div class="form_100">
				   <input name="radiodosham" id="c" type="radio" value="Yes" onFocus="setcolor('dosham');" onBlur="removecolor('dosham');"/>
					Yes
					<input name="radiodosham"  id="k" type="radio" value="No" onFocus="setcolor('dosham');" checked="checked" onBlur="removecolor('dosham');"/>
					No
					<input name="radiodosham" id="m" type="radio" value="Dont Know" onFocus="setcolor('dosham');" onBlur="removecolor('dosham');"/>
					Don't know
				</div>
		  </div>
		 <div class="width"> 
			  <div class="form_100_red"> </div>
		 </div>
		</div>
		   <div class="row style1"   id="line"></div> <div class="line_img"> </div>		  	         
   		      <div style="padding-top:10px; padding-bottom:10px;width:100%;" align="center">
		      <input type="submit" name="Submit2" value="Submit" id="Submit"  class="btn" onClick="return loadSubmitValue2();"/>   		    
   		       <input type="reset" name="Submit22" value="Reset" id="Submit2"  class="btn" onClick="DIVClear('foodError|smokeError|liqurError|complexionError|typeError|bloodError|heightError|weightError|statusError|stateError|cityError|addressError|categoryError|qualError|occError|emptypeError|incomeError|gothramError|starError|rassiError');document.regStepTwo.reset();"/>
  </div>
 </div>

</form>

<script type="text/javascript">
FillBlood('ddlblood');
FillFeet('ddlfeet');
FillKgs('ddlkgs');
FillPhysical('ddlphysical');
FillEducation('ddle_category');
FillOccupation('ddlocc');
FillEmptype('ddlemptype');
FillIncome('ddlincome');
FillStar('ddlstar');
FillRassi('ddlrassi');
getLocation('','<?= $_SESSION['state']?>','','statediv','second','state','');

$('input[value=Non-Vegetatrian][id=rfood]').attr('checked',true);
$('input[value=Non-Smoker][id=rsmoke]').attr('checked',true);
$('input[value=Non-liquor][id=rliquor]').attr('checked',true);
$('input[value=Non-Vegetatrian][id=rfood]').attr('checked',true);

</script>