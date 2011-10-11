<form name="form1" action="insert_register.php" method="POST">

<div>
  <div id="register_bg" >
		<div  id="head">Registration<span class="step_text">Step - 4</span></div>
	 	  	<div id="reg_top"></div>
			<div class="manitory" ><span class="star">*</span> Mandatory Fields </div>
			<div  class="line_img"> </div>
			<div  class="sub_head">Family Information</div>  <br />
		
			
		<div class="bg_width" id="family" style="float:left;">
		
		  <div class="width">
				<div class="form_31_head">Family Value<span class="star"> *</span></div>
					<div class="form_31_head">Family Type<span class="star">*</span></div>
					<div class="form_31_head">Family Status<span class="star">*</span></div>
		  </div>
					<div class="width">
					<div class="form_31">
					  <select name="ddlfvalue" id="ddlfvalue" class="textfield"   style="width:160px; height:18px;" onBlur=" ddlEmptyChk('ddlfvalue','valueError','Please select a family value');"onchange="ddlClear('ddlfvalue','valueError');"  >
					    <option value="Select">- Select -</option>
					    <option value="Orthodox">Orthodox</option>
					    <option value="Traditional">Traditional</option>
					     <option value="Moderate">Moderate</option>
					     <option value="Liberal">Liberal</option>
                      </select>
					</div>
					<div class="form_31">
					  <select name="ddlftype" id="ddlftype" class="textfield"   style="width:100px; height:18px; width:160px;" onBlur="ddlEmptyChk('ddlftype','typeError','Please select a family type');" onChange="ddlClear('ddlftype','typeError');" onFocus="setcolor('family');">
                       <option value="Select">- Select -</option>
					    <option value="Joint Family">Joint Family</option>
					    <option value="Nuclear Family">Nuclear Family</option>
					     <option value="Others">Others</option>
				      </select></div>
					  <div class="form_31">
					  <select name="ddlstatus" id="ddlstatus" class="textfield"   style="width:100px; height:18px; width:160px;" onBlur="ddlEmptyChk('ddlstatus','statusError','Please select a family status');" onChange="ddlClear('ddlstatus','statusError');"onfocus="setcolor('family');">
                        <option value="Select">- Select -</option>
					    <option value="Middle Class">Middle Class</option>
					    <option value="Upper Middle Class"> Upper Middle Class </option>
					     <option value="Rich / Affluent">Rich / Affluent</option>
                      </select></div>
					</div>
				<div class="width">
					<div class="form_31_red" id="valueError"></div>
					<div class="form_31_red" id="typeError"><span class="star"></span></div>
					<div class="form_31_red" id="statusError"></div>
		  </div>
		 </div>
	  			<div class="row style1"   id="line"></div> <div  class="line_img"> </div> <br />
				<div class="bg_width" id="occu" style="float:left;">
				<div class="width">
			<div class="form_31_head">Father's Occupation<span class="star"> </span></div>
					<div class="form_31_head">Mother's Occupation<span class="star"></span></div>
					<div class="form_31_head">No.of Brother(s)<span class="star"> </span></div>
		  </div>
		  
		  <div class="width">
		 <div class="form_31"><select name="ddlfather" id="ddlOccupation" class="textfield"   style="width:160px; height:18px;" onFocus="setcolor('occu');" onBlur="removecolor('occu');">
		   <option>- Select -</option>
                      </select>
		 </div>
					<div class="form_31"><select name="ddlmother" id="ddlccupationn" class="textfield"   style="width:160px; height:18px;" onFocus="setcolor('occu');" onBlur="removecolor('occu');">
					  <option>- Select -</option>
                      </select></div>
					<div class="form_31" style="height:18px;" ><input name="Brothers" id="Brothers" type="text" maxlength="2" class="textfield" size="30" onBlur="val_text1('Brothers','Brothers','BrotherError','Brothers','');removecolor('occu');"onfocus="setcolor('occu');"onkeyup="return char_val(this,'0123456789');"  / > 
					</div>
					
		  
		  </div>
		  <div class="width">
					<div class="form_31_red" id="occError"></div>
					<div class="form_31_red" id="occuError"></div>
					<div class="form_31_red" id="BrotherError">&nbsp;</div>
		  </div>
		  
		  </div>
							  <div class="row style1"   id="line"></div> <div  class="line_img"> </div> <br />
					
<div class="bg_width" id="sis" style="float:left;">					
		  <div class="width">
			<div class="form_31_head">No.of Sister(s)</div>
					<div class="form_31_head">No. of Brorther's Married<span class="star"></span></div>
						<div class="form_31_head">No. of Sister's Married<span class="star"></span></div>
		  </div>
							  <div class="width">
					<div class="form_31">
					  <input name="Sisters" id="Sisters" type="text" class="textfield" maxlength="2" size="30" onBlur="txt_empty('Sisters','SisterError','Please enter the no of sisters');val_text1('Sisters','Sisters','SisterError','Sisters','');removecolor('sis');" onKeyUp="return char_val(this,'0123456789');"  onfocus="setcolor('sis');"/>
					</div>
					<div class="form_31" id="brothers"><span class="row">
					  <input name="brothers_married" id="brothers_married" type="text" maxlength="2" class="textfield" size="30" onBlur="val_text1('brothers_married','Brothers','bmariedError','Brothers','Married');removecolor('sis');"  onkeyup="return char_val(this,'0123456789');"  onfocus="setcolor('sis');"/>
					</span></div>
										<div class="form_31" style="height:18px;">
		<input name="sister_married" id="sister_married" class="textfield" size="30" maxlength="2" onBlur="val_text1('sister_married','Sisters','gmariedError','Sisters','Married'); removecolor('sis');" onKeyUp="return char_val(this,'0123456789');removecolor('sis');"  onfocus="setcolor('sis');" />
										</div>
					</div>
					<input type="hidden" name="index" value="fourth">
					<div class="width">
					<div class="form_31_red" id="SisterError"></div>
					<div class="form_31_red" id="bmariedError">&nbsp;</div>
					<div class="form_31_red" id="gmariedError">&nbsp;</div>
		  </div>
</div>				
<div class="row style1"   id="line"></div> <div  class="line_img"> </div> <br />
	<div class="bg_width" id="about" style="float:left;">					
	<div class="width">
	<div class="form_48_head">About Family<span class="star"> </span></div>
	<div class="form_48_head">About Me<span class="star"> </span></div>
	</div>
	<div class="width">
	<div class="form_48_head">
	<textarea name="txtfamily" id="txtfamily"  cols="70" style="width:300px; height:65px;" onFocus="setcolor('about');"></textarea>
	</div>
	<div class="form_48_head">
	<textarea name="txtme" id="txtme"  cols="70" style="width:300px; height:65px;" onFocus="setcolor('about');"></textarea>
	</div>
	</div>
	<div class="width">
	<div class="form_100_red" id="famError"></div>
	</div>
	</div>					
										<div class="row style1"   id="line"></div> <div  class="line_img"> </div> <br />
		    <div style="padding-top:10px; padding-bottom:10px;width:100%;" align="center">

		      <input type="submit" name="Submit2" value="Submit" id="Submit" src="../images/btn_submit.gif" class="btn"  onclick="return loadFamilyinfo()" />
   		    
   		       <input type="reset" name="Reset" value="Reset" id="Submit2"  class="btn" onClick="SELECTtext('ddlfvalue|ddlftype|ddlstatus|ddlOccupation|ddlccupationn');DIVClear('famError|SisterError|bmariedError|gmariedError|occError|BrotherError|occError|valueError|typeError|statusError');TXTClear('Brothers|Sisters|brothers_married|sister_married|txtfamily');"style="cursor: pointer;" />
	      </div>
			<div id="reg_bottom"></div>                  
		 	</div>
</div>
</form>

<script type="text/javascript">
Fillfamilysoccupation('ddlOccupation');
Fillfamilysoccupation('ddlccupationn');
</script>
