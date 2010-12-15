<body onLoad="FillMotherTongues('ddlmother');FillReligions('ddlReligion');FillEducations('ddle_category');FillOccupations('ddlocc'); FillEmptypes('ddlemptype');FillPhysicals('ddlstatus');FillFeet('ddlfeet');FillFeet('ddlfeet1');">
<form name="regStepThree" action="insert_register.php" method="POST" >
<!--<div>
<table align="center"  cellpadding="0" cellspacing="0" >
<tr>
<td  background="./images/bg_03.jpg" height="92px" width="11"></td>
<td width="148"  background="./images/bg_05.jpg" align="center" valign="middle">
<span style="color:#36706F"><b>STEP 1</b></span><br /><span style=" color:#36706F" >Registration</span></td>
<td width="148" background="./images/bg_05.jpg" align="center" valign="middle">
<span style="color:#36706F"><b>STEP 2</b></span><br /><span style=" color:#36706F" >Registration</span></td>
<td width="148"  background="./images/bg_05.jpg" align="center" valign="middle">
<span style=" color:#FFFFFF"><b>STEP 3</b></span><br /><span style=" color:#FFFFFF" >Registration</span></td>
<td width="148" background="./images/bg_05.jpg" align="center" valign="middle">
<span style=" color:#36706F"><b>STEP 4</b></span><br /><span style=" color:#36706F" >Registration</span></td>
<td  background="./images/bg_07.jpg" height="92px" width="17"> </td>
</tr>
</table>
</div>-->

<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
<table width="643" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif" /></span></td>
    <td width="650" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="31"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" /></span></td>
  </tr>
  <tr >
    <td background="./images/lightbox_left.gif"></td>
    <td>

<div>
  <div id="register_bg">
		<div  id="head">Registration<span class="step_text">Step - 3</span></div>
	 	  	<div id="reg_top"></div>
			<!--<div class="manitory"><span class="star"></span>Mandatory Fields</div>-->
			<div  class="line_img"> </div>
			<div class="sub_head">Partner Preference</div>  <br />
			
			<input type="hidden" name="index" value="third">
			<div class="bg_width" id="age" style="float:left; height:105px;" >
				  <div class="width" >
					<div class="form_31_head" style="width:20%;">Preferred Age<span class="star"></span></div>
					<div class="form_31_head" style="width:40%;">Marital Status<span class="star"></span></div>
					<div class="form_31_head">Mother Tongue <span class="star"></span></div>
				  </div>
 				  <div class="width" >
					<div class="form_31" style="height:70px; width:20%">
					  <p>
				    <input name="txtage1" type="text" class="textfield" id="txtage1"  value="" size="3" maxlength="2" onKeyUp="return char_val(this,'0123456789');"/> 
					  To  
					  <input name="txtage2" type="text" class="textfield" id="txtage2"  value="" size="3" maxlength="2" onKeyUp="return char_val(this,'0123456789');" />
					</div>
					<div class="form_31" style="height:70px; width:40%;">
					    <input type="radio" name="radiomarital" id="marital" value="Any" > Any
                        <input type="radio" name="radiomarital" id="marital" value="UnMarried" checked="checked"/> UnMarried<br/> 
                        <input type="radio" name="radiomarital"  id="marital" value="Widow\Widower" >Widow/Widower
                        <input type="radio" name="radiomarital" id="marital" value="Divorced" > Divorced
                     <input type="radio" name="radiomarital" id="marital" value="Separated" > Separted</p> 
					</div>
                    <div class="form_31">
                      <select name="ddlmother" class="textfield" id="ddlmother" style="width:100px; height:18px;" onChange="ddlClear('ddlmother','motherError');gethdmulti('ddlmother','motherHd');" >
                        <option value="0">- Select -</option>
                      </select> 
                      <input type="hidden" name="motherHd" id="motherHd" value=""/>
                    </div>
					</div>
								
					<div class="width">
						<div class="form_31_red"id="ageError" style="width:20%;" ><span class="star"></span></div>
						<div class="form_31_red" id="maritalError" style=" width:40%;"> <span class="star"></span></div>
						<div class="form_31_red" id="motherError"> <span class="star"></span></div>
		  			</div>
				  </div>
	
				   <div class="row style1" id="line"></div> <div  class="line_img"> </div>
		            <div class="sub_head">Religion & Community</div>
					<br />
					<div class="bg_width" id="caste" style="float:left">      
					  <div class="width">
						<div class="form_48_head" style="width:35%;" >Religion<span class="star"> </span></div>
						<div class="form_48_head" style="width:35%;">Community<span class="star"></span></div>
						<div class="form_31_head" style="width:25%">Sub Caste</div>
					 </div>
		  
				    <div class="width"   id="caste">
					 <div class="form_48" style="width:35%;">
						 <select name="ddlReligion" size="15" multiple="multiple" class="textfield" id="ddlReligion"  style="height:70px; width:225px;" onChange="gethdmulti('ddlReligion','religionHd');FillCommunity('ddlReligion','ddlCommunity');ddlClearmulti('ddlReligion','religionError');">
                	        <option>Select</option>
                    	  </select> 
						  <input type="hidden" name="religionHd" id="religionHd" value="">
 				     </div>
					 <div  class="form_48" style="width:35%;">
					 	<select name="ddlCommunity" size="15" multiple="multiple" class="textfield" id="ddlCommunity" style="height:70px; width:225px;" onChange="gethdmulti('ddlCommunity','communityHd');ddlClearmulti('ddlCommunity','communityError');" >
                	        <option>Select</option>
                      	</select>
					    <input type="hidden" name="communityHd" id="communityHd" value=""/>
		    		 </div>
					 <div class="form_31" style="height:70px; width:25%" >
						<input name="txtcaste" id="txtcaste" maxlength="50" type="text"  style="width:155px;"class="textfield" size="26"> 
					 </div>
		  			</div>
		  
		  			<div class="width">
						<div class="form_48_red" id="religionError" style="width:35%;"><span class="star"></span></div>
						<div class="form_48_red" id="communityError" style="width:35%;"><span class="star"></span></div>
						<div class="form_31_red" style="width:25%;" id="casteError"></div>
		 		    </div>		  
				  </div>
					  <div class="row style1"id="line"></div> <div  class="line_img"> </div>
					  <div class="sub_head">Education</div><br />
					  <div class="bg_width" id="edu" style="float:left">					
				    <div class="width">
						<div class="form_100_head">Education  Category<span class="star"></span></div>
					</div>
				    <div class="width" id="quql">
						<div class="form_100">
						  <select name="ddle_category" size="15" multiple="multiple" class="textfield" id="ddle_category" style="width:100px; height:70px; width:175px;" onChange="gethdmulti('ddle_category','categoryHd');ddlClearmulti('ddle_category','categoryError');" >
        		                <option>Select</option>
                	      </select>
                    	  <input type="hidden" name="categoryHd" id="categoryHd" value="">
						</div>
					</div>
		  		    <div class="width">
						<div class="form_100_red" id="categoryError"><span class="star"></span></div>
					</div>
					</div>
							  <div class="row style1"   id="line"></div> <div  class="line_img"> </div>
							  <div class="sub_head">Occupation</div><br />
					<div class="bg_width" id="occ" style="float:left">					
				    <div class="width">
						<div class="form_48_head">Occupation<span class="star"></span></div>
						<div class="form_48_head">Employment Type</div>
					</div>
				    <div class="width" id="emp">
						<div class="form_48" style="height:70px;">
						  <select name="ddlocc" size="15" multiple="multiple" class="textfield" id="ddlocc"  style="width:100px; height:70px; width:225px;" onChange="gethdmulti('ddlocc','occHd');ddlClearmulti('ddlocc','occError');" >
						    <option>Select</option>
        	              </select>
            	          <input type="hidden" name="occHd" id="occHd" value="">
						</div>
						<div class="form_48" >
						  <select name="ddlemptype" size="15" multiple="multiple" class="textfield" id="ddlemptype" style="width:100px; height:70px; width:225px;" onChange="gethdmulti('ddlemptype','emptypeHd');">
					    	<option>Select</option>
	                      </select>
						  <input type="hidden" name="emptypeHd" id="emptypeHd" value="" />
						</div>
					</div>
					<div class="width">
						<div class="form_48_red" id="occError"><span class="star"></span></div>
						<div class="form_48_red" >&nbsp;</div>
					</div>
				</div>
					<div class="row style1" id="line"></div> <div  class="line_img"> </div>
					<div class="sub_head">Nationality</div><br />
					<div class="bg_width" id="con" style="float:left">	
			    <div class="width">
					<div class="form_48_head">Citizenship<span class="star"></span></div>
					<div class="form_48_head">Residing Country<span class="star"></span></div>
				</div>
				<div class="width" >
					<div class="form_48">
						 <select name="ddlcitizen" size="15" multiple="multiple"  class="textfield" id="ddlcitizen" style="width:100px; height:70px; width:225px;" onChange="gethdmulti('ddlcitizen','citizenHd');ddlClearmulti('ddlcitizen','citizenError');" >
						<option value='0'>Doesn't Matter</option>
					    <?
							$country=explode("|",$countryValue);
							$countCountry=count($country);				    									   					    
						  	for($i=1;$i<count($country);$i++)
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
					  <select name="ddlcountry" size="15" multiple="multiple" class="textfield" id="ddlcountry" style="width:100px; height:70px; width:225px;" onChange="gethdmulti('ddlcountry','countryHd');getLocation('',this.value,'','statediv','third','state','');ddlClearmulti('ddlcountry','countryError');" >
							
					    <?
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
						<div class="form_48_red" id="citizenError"><span class="star"></span></div>
						<div class="form_48_red" id="countryError"></div>
		 		    </div>
					</div>
				  <div class="row style1" id="line"></div> <div class="line_img"> </div>
				  <div class="bg_width" id="city" style="float:left">							  
			 	  <div class="width">
					<div class="form_48_head">Residing State <span class="star"></span></div>
					<div class="form_48_head">Residing City  <span class="star"></span></div>
		    </div>
					<div class="width" >
					<div class="form_48" id="statediv">
					  <select name="ddlstate" size="1" multiple="multiple" class="textfield" id="ddlstate" style=" height:70px; width:225px;" onChange="gethdmulti('ddlstate','stateHd');ddlClearmulti('ddlstate','stateError');" >
					    <option>Select</option>
                      </select>
					</div>
					<div class="form_48" id="citydiv">
					  <select name="ddlcity" size="1" multiple="multiple" class="textfield" id="ddlcity" style="width:100px; height:70px; width:225px;" onChange="gethdmulti('ddlcity','cityHd');ddlClearmulti('ddlcity','cityError');" >
					    <option>Select</option>
                      </select>
					</div>
					</div>
					<div class="width">
						<div class="form_48_red" id="stateError"><span class="star"></span></div>
						<div class="form_48_red" id="cityError"></div>
		 			</div>
				</div>
						  <div class="row style1"   id="line"></div><div  class="line_img"> </div>
						  <div class="sub_head">Habits</div> <br /> 
						  <div class="row style1"   id="line"></div>
						  <div class="bg_width" id="food" style="float:left">			
						  <div class="width">
							<div class="form_100_head">Food<span class="star"></span></div>
						  </div>
						  <div class="width" id="veg">
							<div class="form_100">
							  <input type="radio" name="rfood" id="foodI" value="Vegetarian" onFocus="setcolor('food');" />Vegetarian
							  <input type="radio" name="rfood" id="foodI" value="Non-Vegetatrian" />Non-Vegetatrian
							  <input type="radio" name="rfood" id="foodI" value="Eggetarian" />Eggetarian 
							  <input type="radio" name="rfood" id="foodI" value="Doesn't Matter" checked="checked"/> Doesn't Matter
							</div>
						</div>
						<div class="form_100_red" id="foodError"></div>
					</div>
					  <div class="row style1"   id="line"></div> 
					  <div class="line_img"> </div> 
			          <div class="bg_width" id="des" style="float:left">
				  <div class="width">
					<div class="form_100_head">About Partner<span class="star"></span> </div>
				  </div>
				  <div class="width">
					<div class="form_100">
						  <textarea name="txtabout" id="txtabout" cols="70" style="width:475px; height:50px;" ></textarea>
				    </div>
				  </div>
				  <div class="width">
					  <div class="form_31_red" id="aboutError"></div>
				  </div>
				</div>
				  <div class="row style1"   id="line"></div> <div  class="line_img"> </div> 
					<div class="sub_head">Status & Height</div> <br />
                    <div class="bg_width">
					<div class="row style1"   id="line"></div>
					<div class="bg_width" id="status" style="float:left">
					  <div class="width">
							<div class="form_48_head">Physical Status<span class="star"></span></div>
							<div class="form_48_head">Height<span class="star"></span></div>
					  </div>
					  <div class="width">
							<div class="form_48">
							  <select name="ddlstatus" size="15" multiple="multiple" class="textfield" id="ddlstatus" style=" height:70px; width:225px;" onchange=	"gethdmulti('ddlstatus','statusHd');ddlClearmulti('ddlstatus','statusError');" >
	    	                    <option value="0">- Select - </option>
	    	                  </select>
    		                  <input type="hidden" name="statusHd" id="statusHd" value=""/>
						  </div>
							<div class="form_48" style="height:20px;">From 
							    <select name="ddlfeet" id="ddlfeet" class="textfield" style="width:90px; height:18px;" onChange="ddlClear('ddlfeet','heightError')">
	        		                <option value="0">- Feet/Inch -</option>
    		                  </select> 
							  To
							  <select name="ddlfeet1" id="ddlfeet1" class="textfield" style="width:90px; height:18px;" onChange="ddlClear('ddlfeet1','heightError')">
        		                <option value="0">- Feet/Inch -</option>
                		      </select>
						   </div>
						  
					</div>
				</div>
					<div class="width">
						<div class="form_48_red" id="statusError"><span class="star"></span></div>
						<div class="form_48_red"  id="heightError"></div>
					</div>
				</div>
							  <div class="row style1" id="line"></div> <div  class="line_img"> </div>
							  <div class="sub_head">Chevaai/ Kuja/Mangalik Dosham </div><br />
				 		  <div class="width" id="dos" style="float:left">
							<div class="bg_width"></div>
							<div class="width" id="feet"> 
							<div  class="form_100">
							 <input name="rdosham" id="dosham" type="radio" value="Yes" >Yes
							 <input name="rdosham" id="dosham" type="radio" value="No" >No
							 <input name="rdosham" id="dosham" type="radio" value="Doesn't Matter" checked="checked">Doesn't Matter
							</div>
							</div>
							<div class="width">
								<div class="form_100_red" id="doshamError"><span class="star"></span></div>
							</div>
						 </div>					
						<div class="row style1"   id="line"></div>
						<div  class="line_img"> </div>
						<div style="padding-top:10px; padding-bottom:10px;width:100%;" align="center">

		      <input type="submit" name="Submit2" value="Submit" id="Submit"  class="btn" /><!--onClick="return loadSubmitValue3();"-->
   		    
   		       <input type="reset" name="Submit22" value="Reset" id="Submit2"  class="btn" onClick="DIVClear('ageError|maritalError|motherError|religionError|categoryError|occError|citizenError|countryError|stateError|cityError|foodError|aboutError|statusError|heightError');document.regStepThree.reset();"/>
	      </div>
			<div id="reg_bottom"></div>
			            
	 	</div>
</div>
</td>
    <td background="./images/lightbox_right.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_b.gif" width="25" height="25" /></span></td>
    <td background="./images/lightbox_bottom.gif">&nbsp;</td>
    <td><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_b.gif" width="25" height="25" /></span></td>
  </tr>
</table>
</form>
</body>