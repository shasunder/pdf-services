<?php
include("../common/config.inc.php");
include("../common/function.php");

class editProfile extends matrimony
{
	function editProfile()
	{		
	    $this->profileId = $_REQUEST['pid'];
		$this->id=$_REQUEST['id'];
		$this->sid=$_REQUEST['sid'];
		$this->hid=$_REQUEST['hid'];
		$this->tbl = $_REQUEST['tbl'];		
		$this->type = $_REQUEST['type'];
		$tbname = "tm_profile tmp,tm_partnerpreference tmpart,tm_family tmf";
		$arg1 = " WHERE tmp.ProfileId = '".$this->profileId."' and tmf.ProfileId = '".$this->profileId."'";
		$arg2 = "*,date_format(DOB,'%d %m %Y') as DOB";
		$this->switchqry($tbname,'SELECT',$arg1,$arg2);
		$this->profileResult = mysql_fetch_array($this->qry_result);			
	}
	
	function getProfile()
	{	

		$whrst3=" where ProfileId='".$this->profileId."'";
		$this->switchqry('tm_partnerpreference','SELECT',$whrst3,'ProfileId');
		$this->numst3=mysql_num_rows($this->qry_result);
		
		$whrst3=" where ProfileId='".$this->profileId."'";
		$this->switchqry('tm_family','SELECT',$whrst3,'ProfileId');
		$this->numst4=mysql_num_rows($this->qry_result);
		
		if($this->numst3>0){
			$tbname = "tm_profile tmp,tm_partnerpreference tmpart,tm_family tmf";
			$arg1 = " WHERE tmp.ProfileId = '".$this->profileId."' and tmf.ProfileId = '".$this->profileId."' and tmpart.ProfileId = '".$this->profileId."'";
		} else if($this->numst4>0){
			$tbname = "tm_profile tmp,tm_family tmf";
			$arg1 = " WHERE tmp.ProfileId = '".$this->profileId."' and tmf.ProfileId = '".$this->profileId."'".$ctn;
		} else {
			$tbname = "tm_profile tmp";
			$arg1 = " WHERE tmp.ProfileId = '".$this->profileId."'";		
		}
		$arg2 = "*,date_format(DOB,'%d %m %Y') as DOB";
		$this->switchqry($tbname,'SELECT',$arg1,$arg2);
		$this->profileResult = mysql_fetch_array($this->qry_result);		 
					
	}
	function showProfile()
	{		
		$this->getProfile();
		$show="";
		if($this->id == '1')
		{
			$show .= "<div style='height:68px;' id='txt1'><textarea name='txtFam' class='selecttbox_p' id='txtFam' style='width:475px; height:50px;'>".$this->profileResult['AboutMe']."</textarea></div><div style='height:18px; color:red;' id='famError'></div>";
		}
		else if($this->id == '2')
		{
			$show .= "<div class='prof_width_i' ><div class='search_24_head'>Login ID</div><div class='search_24'><input name='txtLogin' id='txtLogin' type='text' class='textbox_p' maxlength='15' size='25' value='".$this->profileResult['LoginId']."' disabled='disabled' onblur=\"txt_empty('txtLogin','useridError','Enter your LoginId');if(document.getElementById('txtLogin').value != ''){ return showlogin(txtLogin.value,'login','LoginId','tm_profile','useridError'); }\" onchange=\"capWords('txtLogin');\"><input name='logintextfield' type='hidden' id='logintextfield'  value='' /></div> <div class='search_24_head'>Created by </div> <div class='search_24'>";
			$show .="<select name='ddlProfile' id='ddlProfile' class='selecttbox_p' onclick=\"gethdValue('ddlProfile','createdBy');\" onblur=\"ddlEmptyChk('ddlProfile','profileError','Select your Prfolie Creater');\" onchange=\"ddlClear('ddlProfile','profileError')\">";
			$typeString = 'Select|Self|Father|Mother|Friend|Siblings|Relation|Others';
			$profileCreater = explode('|',$typeString);
			for($i=0;$i<count($profileCreater);$i++)
			{
				if($this->profileResult['CreatedBy'] == $profileCreater[$i])
				{
					$show .= '<option value="'.$profileCreater[$i].'" selected>'.$profileCreater[$i].'</option>';
				}
				else
				{
					$show .= '<option value="'.$profileCreater[$i].'">'.$profileCreater[$i].'</option>';
				}
			}
$show .= "</select><input type='hidden' id='createdBy' name='createdby' value='".$this->profileResult['CreatedBy']."'></div></div><div class='prof_width_i_err'><div class='search_48_red' id='useridError'></div><div class='search_48_red' id='profileError'></div></div>";
		}
	    else if($this->id == '3')
		{	
		   $show .= " <div class='prof_width_i'>
							<div class='search_24_head'>First Name </div>
							<div class='search_24' >
							<input name='txtFname' id='txtFname' type='text' class='textbox_p' value='".$this->profileResult['FirstName']."' onkeyup=\"return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');\" onblur=\"txt_empty('txtFname','fnameError','Enter your First Name')\" onchange=\"capWords('txtFname');\"></div>
							<div class='search_24_head'>Middle Name</div>
							<div class='search_24' >
							<input name='txtMname' id='txtMname' type='text' class='textbox_p' value='".$this->profileResult['MiddleName']."' onkeyup=\"return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');\"></div>
					 </div>
					<div class='prof_width_i_err'><div class='search_48_red' id='fnameError'></div> <div class='search_48_red'></div> </div><div class='search_line'></div> ";
		   $show .= " <div class='prof_width_i'>
							<div class='search_24_head'>Last Name </div>
							<div class='search_24' >
							<input name='txtLname' id='txtLname' type='text' class='textbox_p' value='".$this->profileResult['LastName']."' onkeyup=\"return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');\" onblur=\"txt_empty('txtLname','lnameError','Enter your Last Name')\" onchange=\"capWords('txtLname');\"></div>
							<div class='search_24_head'>Age</div>
							<div class='search_24' >
				<input type='hidden' id='txtAge1' name='txtAge1' value=''>
				<input name='txtAge' id='txtAge' type='text' class='textbox_p' value='".$this->profileResult['Age']."' style='width:50px;' readonly='readonly'></div>
					 </div>
					<div class='prof_width_i_err'><div class='search_48_red' id='lnameError'></div> <div class='search_48_red'></div> </div><div class='search_line'></div> ";
		  			
		  			$show .=" <div class='prof_width_i'>
					<div class='search_24_head'>Date of Birth </div>
					<div class='search_48'>";
					 $sdat=$this->profileResult['DOB']; 
					 $dxd=explode(' ',$sdat);
					  $date= $dxd[0];
					   $month=$dxd[1];
					   $yr=$dxd[2];
					 $doe=$date." ". $month." ". $yr;
					 $dobVal=$yr."-". $month."-".$date ;
					 $show .="<select name='ddlDate' id='ddlDate' style='width:50px;' onclick=\"gethdValue('ddlDate','dateVal');gethdValue('ddlMonth','monthVal');dob(document.getElementById('dateVal').value,document.getElementById('monthVal').value,document.getElementById('yearVal').value,'dobVal');\" onblur=\"ddlEmptyChk('ddlDate','dobError','Select your Year');\">";
                      	 $dayString = 'Date|01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31';
			             $dateDOB = explode('|',$dayString);
						for($i=0;$i<count($dateDOB);$i++)
						{
							if($date == $dateDOB[$i])
							{
								$show .= '<option value="'.$dateDOB[$i].'" selected>'.$dateDOB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$dateDOB[$i].'">'.$dateDOB[$i].'</option>';
							}
						}		
                      $show .="</select>
					  <input type='hidden' id='date' name='date' value='".$date."'><input type='hidden' id='dateVal' name='dateVal' value='".$date."'>   
                      		<select name='ddlMonth' id='ddlMonth' style='width:50px;' onclick=\"gethdValue('ddlMonth','monthVal');gethdValue('ddlYear','yearVal');dob(document.getElementById('dateVal').value,document.getElementById('monthVal').value,document.getElementById('yearVal').value,'dobVal');\" onblur=\"ddlEmptyChk('ddlYear','dobError','Select your Date & Year');\">";
			 $monthINT = 'Month|01|02|03|04|05|06|07|08|09|10|11|12';
			 $monthDOB = explode('|',$monthINT);
						for($i=0;$i<count($monthDOB);$i++)
						{
							if($month == $monthDOB[$i])
							{
								$show .= '<option value="'.$monthDOB[$i].'" selected>'.$monthDOB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$monthDOB[$i].'">'.$monthDOB[$i].'</option>';	
							}
						}												//no need all the hidden but for checking.
					  	$show .= "</select>
                                <input type='hidden' id='month' name='month' value='".$month."'><input type='hidden' id='monthVal' name='monthVal' value='".$month."'>  
				<select name='ddlYear' id='ddlYear'  style='width:50px;' onclick=\"gethdValue('ddlYear','yearVal');dob(document.getElementById('dateVal').value,document.getElementById('monthVal').value,document.getElementById('yearVal').value,'dobVal');\" onchange=\" Age('ddlDate','ddlMonth','ddlYear','txtAge','ageError');ddlClear('ddlMonth','dobError');\">";
                    	$show .= "<option value='-Year-'>Year</option>";
						for ($y=1990; $y>=1937; $y--)
						{
							if($yr == $y)
							{
							   	$show .= '<option value="'.$y.'" selected>'.$y.'</option>';
							}
							else
							{
								$show .= '<option value="'.$y.'">'.$y.'</option>';
							}
					    }
					$show .= "</select>
                     <input type='hidden' id='year' name='year' value='".$yr."'><input type='hidden' id='yearVal' name='yearVal' value='".$yr."'> <input type='hidden' id='dobVal' name='dobVal' value='".$dobVal."'>
					</div></div>
					 <div class='prof_width_i_err'><div class='search_48_red' id='dobError'> </div>
					 <div class='search_48_red'></div>
					 </div><div class='search_line'> </div>
					<div class='prof_width_i'>
					<div class='search_24_head'>Gender</div>
					<div class='search_24'>";
					if($this->profileResult['Gender']=='F')
					{ 
						$fgender =  "checked";
					} 
					else 
					{
						$mgender =  "checked"; //disabled='disabled'
					}	
			$show .= "<input name='radioGender' id='fgender' type='radio' '".$fgender."' value='F' onclick=\"document.getElementById('txtgen').value='F';\"/> Female 
					  <input name='radioGender' id='mgender' type='radio' '".$mgender."' value='M' onclick=\"document.getElementById('txtgen').value='M';\"/>Male 
						<input type='hidden' name='txtgen' id='txtgen' value='".$this->profileResult['Gender']."'>
					</div>";
		  $show .="<div class='search_24_head' style='width:70px;'>Blood Group </div><div class='search_24'>
					  <select name='ddlblood' id='ddlblood' class='selecttbox_p' style='width:55px; margin-left:42px;' onclick=\"gethdValue('ddlblood','bloodVal');\" onblur=\"ddlEmptyChk('ddlblood','bloodError','Please select the Blood Group');\" onchange=\"ddlClear('ddlblood','bloodError');\">";
   					  $bloodString ='- Select -|Doesn\t Matter|O +ve|O -ve|A +ve|A -ve|B +ve|B -ve|A1 +ve|A1 -ve|A2 +ve|A2 -ve|AB +ve|AB -ve|A1B +ve|A1B -ve|A2B +ve|A2B -ve';
					  $bloodDB = explode('|',$bloodString);
				        for($i=0;$i<count($bloodDB);$i++)
						{
							if($this->profileResult['BloodGroup'] == $bloodDB[$i])
							{
								$show .= '<option value="'.$bloodDB[$i].'" selected>'.$bloodDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$bloodDB[$i].'">'.$bloodDB[$i].'</option>';
							}
						}
				
						 	$show .= "</select>
						 <input type='hidden' name='bloodgroup' id='bloodgroup' value='".$this->profileResult['BloodGroup']."'>
						 <input type='hidden' name='bloodVal' id='bloodVal' value='".$this->profileResult['BloodGroup']."'>
						 </div></div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red' id='bloodError'></div></div> <div class='search_line'> </div>";
					$show .= "<div class='prof_width_i'><div class='search_24_head'>Marital Status </div><div class='search_24'>
					  <select name='ddlMarital' id='ddlMarital'  style='width:75px;' class='selecttbox_p'  onclick=\"gethdValue('ddlMarital','martialVal');\" onblur=\"ddlEmptyChk('ddlMarital','maritalError','Select your Marital Status');if(document.getElementById('ddlChildren').disabled == false) {ddlEmptyChk('ddlChildren','childError','Select your No of Children');}\" onchange=\"ddl_enable('ddlMarital','ddlChildren','childError','radioL','radioNL');ddlClear('ddlMarital','maritalError');if(document.getElementById('ddlChildren').disabled == true){ddlClear('ddlChildren','childError');}\">";
					  $maritalString = 'Select|UnMarried|Divorced|Separated|Widow/Widower';
					  $maritalDB=explode('|',$maritalString);
                      	for($i=0;$i<count($maritalDB);$i++)
						{
							if($this->profileResult['MaritialStatus'] == $maritalDB[$i])
							{
								$show .= '<option value="'.$maritalDB[$i].'" selected>'.$maritalDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$maritalDB[$i].'">'.$maritalDB[$i].'</option>';
							}
						}
				 $show .= "</select>
					  <input type='hidden' name='martial' id='martial' value='".$this->profileResult['MaritialStatus']."'> 
					  <input type='hidden' name='martialVal' id='martialVal' value='".$this->profileResult['MaritialStatus']."'>
					  </div>";
					$show .= "<div class='search_24_head' style='width:98px;'>No. of Children </div><div class='search_24'>
					  <select name='ddlChildren' id='ddlChildren' style='margin-left:14px;' class='selecttbox_p' onclick=\"gethdValue('ddlChildren','NoofchildrenVal');\" onblur=\"ddlEmptyChk('ddlChildren','childError','Select your No of Children');\" onchange=\"rad_enable('ddlChildren','radioL','radioNL');ddlClear('ddlMarital','maritalError');ddlClear('ddlChildren','childError')\"  disabled='true'>";
     					 $childString = 'Select|0|1|2|3|4|5|5+';
					     $childDB=explode('|',$childString);			
						for($i=0;$i<count($childDB);$i++)
						{
							if($this->profileResult['NoofChildren'] == $childDB[$i])
							{
								$show .= '<option value="'.$childDB[$i].'" selected>'.$childDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$childDB[$i].'">'.$childDB[$i].'</option>';
							}
						}
									  
  $show .= "</select><input type='hidden' name='Noofchildren' id='Noofchildren' value='".$this->profileResult['NoofChildren']."'> 
  <input type='hidden' name='NoofchildrenVal' id='NoofchildrenVal' value='".$this->profileResult['NoofChildren']."'> <!--hidden  -->
				  </div></div><div class='prof_width_i_err'><div class='search_48_red' id='maritalError'></div><div class='search_48_red' id='childError'></div></div> <div class='search_line'> </div>";
		  
			$show .="<div class='prof_width_i'><div class='search_24_head'>Citizenship</div><div class='search_48'>
				<select name='ddlCitizen' id='ddlCitizen' class='selecttbox_p' onclick=\"gethdValue('ddlCitizen','citizenVal');\" onblur=\"gethdValue('ddlCitizen','citizenHd');ddlEmptyChk('ddlCitizen','citizenError','Select your Citizenship');\"  onchange=\"ddlClear('ddlCitizen','citizenError')\">";
							global $countryValue;
						 	$country=explode('|',$countryValue);												
							for($i=0;$i<count($country);$i++)
							{
							if($this->profileResult['Citizenchip'] == $country[$i])
							{
							$show .= '<option value="'.$country[$i].'" selected>'.$country[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$country[$i].'">'.$country[$i].'</option>';
							}
						}
					  
                      $show .= "</select><input type='hidden' name='citizenHd' id='citizenHd' value=''><input type='hidden' name='citizenVal' id='citizenVal' value='".$this->profileResult['Citizenchip']."'></div></div><div class='prof_width_i_err'><div class='search_48_red' id='citizenError'></div><div class='search_48_red'></div></div>";
		}
		else if($this->id == '4')
		{	
		$show .= "<div class='prof_width_i'>
 <div class='search_24_head'>Body Type </div>
 <div class='search_48'>";
 				   if($this->profileResult['BodyType']=='Average')
					{ 
						$Abtype =  "checked";
					} 
					else if($this->profileResult['BodyType']=='Athletic')
					{
						$Tbtype =  "checked";
					}
					else if($this->profileResult['BodyType']=='Slim')
					{
						$Sbtype =  "checked";
					}
					else if($this->profileResult['BodyType']=='Heavy')
					{
						$Hbtype =  "checked";
					}
	
		 $show .="<input name='rbody' id='rbody' type='radio' '".$Abtype."' onclick=\"radioVal('RBtnVal','Average');\" >Average
		 <input name='rbody' id='rbody' type='radio' '".$Tbtype."' onclick=\"radioVal('RBtnVal','Athletic');\" >Athletic 
		 <input name='rbody' id='rbody' type='radio' '".$Sbtype."' onclick=\"radioVal('RBtnVal','Slim');\" >Slim
		 <input name='rbody' id='rbody' type='radio' '".$Hbtype."' onclick=\"radioVal('RBtnVal','Heavy');\" >Heavy <input type='hidden' name='RBtnVal' id='RBtnVal' value='".$this->profileResult['BodyType']."'></div></div>
		  <div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red'></div></div><div class='search_line'> </div> 
		 <div class='prof_width_i'>
 <div class='search_24_head'>Complexion</div>
 <div class='search_48' style='width:67%;'> ";
 				   if($this->profileResult['Complaexion']=='Very Fair')
					{ 
						$Vcomp =  "checked";
					} 
					else if($this->profileResult['Complaexion']=='Fair')
					{
						$Fcomp =  "checked";
					}
					else if($this->profileResult['Complaexion']=='Wheatish')
					{
						$Wcomp =  "checked";
					}
					else if($this->profileResult['Complaexion']=='Brown')
					{
						$Bcomp =  "checked";
					}
					else if($this->profileResult['Complaexion']==' Dark ')
					{
						$Dcomp =  "checked";
					}
$show .="<input name='radiocomp' id='radiocomp' type='radio' '".$Vcomp."' onclick=\"radioVal('RBtnVal2','Very Fair');\"/>Very Fair
<input name='radiocomp' id='radiocomp' type='radio' '".$Fcomp."' onclick=\"radioVal('RBtnVal2','Fair');\"/>Fair 
<input name='radiocomp' id='radiocomp' type='radio' '".$Wcomp."' onclick=\"radioVal('RBtnVal2','Wheatish');\"/>Wheatish
<input name='radiocomp' id='radiocomp' type='radio' '".$Bcomp."' onclick=\"radioVal('RBtnVal2','Brown');\"/>Wheatish Brown
<input name='radiocomp' id='radiocomp' type='radio' '".$Dcomp."' onclick=\"radioVal('RBtnVal2','Dark');\">Dark <input type='hidden' name='RBtnVal2' id='RBtnVal2' value='".$this->profileResult['Complaexion']."'></div>
     </div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red'></div></div>
    <div class='search_line'> </div>
<div class='prof_width_i' style='height:25px;'>
 <div class='search_24_head'>Height</div>
 <div class='search_24'>";
  $show .="<select name='ddlfeet' id='ddlfeet' class='selecttbox_p'  onclick=\"gethdValue('ddlfeet','heightVal');\" onblur=\"ddlEmptyChk('ddlfeet','heightError','Please select the Height');\" onchange=\"ddlClear('ddlfeet','heightError');\">";
  						 $feetString = 'Feet/Inch/Cm |4ft 5in 134cm|4ft  6in  137cm|4ft  7in  139cm|4ft  8in  142cm|4ft  9in  144cm|4ft  10in  147cm|4ft  11in  149cm|5ft  0in  152cm|5ft  1in  154cm|5ft  2in  157cm|5ft  3in  160cm|5ft  4in  162cm|5ft  5in  165cm|5ft  6in  167cm|5ft  7in  170cm|5ft  8in  172cm|5ft  9in  175cm|5ft  10in  177cm|5ft  11in  180cm|6ft  0in  182cm|6ft  1in  185cm|6ft  2in  187cm|6ft  3in  190cm|6ft  4in  193cm|6ft  5in  195cm|6ft  6in  198cm|6ft  7in  200cm|6ft  8in  203cm|6ft  9in  205cm|6ft  10in  208cm|6ft  11in  210cm|7ft  0in  213cm';
					     $feetDB=explode('|',$feetString);
        				for($i=0;$i<count($feetDB);$i++)
						{
							if($this->profileResult['Height'] == $feetDB[$i])
							{
								$show .= '<option value="'.$feetDB[$i].'" selected>'.$feetDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$feetDB[$i].'">'.$feetDB[$i].'</option>';
							}
						}
       $show .="</select><input type='hidden' id='heightVal' name='heightVal' value='".$this->profileResult['Height']."'>
    </div>
 <div class='search_16_head' >Weight</div>
 <div class='search_24'> 
     <select name='ddlkgs' id='ddlkgs' class='selecttbox_p' onclick=\"gethdValue('ddlkgs','weightVal');\" onblur=\"ddlEmptyChk('ddlkgs','weightError','Please select the Weight');\" onchange=\"ddlClear('ddlkgs','weightError');\">";
	 $kgString = '- Kgs -|41kg|42kg|43kg|44kg|45kg|46kg|47kg|48kg|49kg|50kg|51kg|52kg|53kg|54kg|55kg|56kg|57kg|58kg|59kg|60kg|61kg|62kg|63kg|64kg|65kg|66kg|67kg|68kg|69kg|70kg|71kg|72kg|73kg|74kg|75kg|76kg|77kg|78kg|79kg|80kg|81kg|82kg|83kg|84kg|85kg|86kg|87kg|88kg|89kg|90kg|91kg|92kg|93kg|94kg|95kg|96kg|97kg|98kg|99kg|100kg|101kg|102kg|103kg|104kg|105kg|106kg|107kg|108kg|109kg|110kg|111kg|112kg|113kg|114kg|115kg|116kg|117kg|118kg|119kg|120kg|121kg|122kg|123kg|124kg|125kg|126kg|127kg|128kg|129kg|130kg|131kg|132kg|135kg|136kg|137kg|138kg|139kg|140kg';
	                   $weightDB=explode('|',$kgString);
	 				   for($i=0;$i<count($weightDB);$i++)			
					   {
							if($this->profileResult['Weight'] == $weightDB[$i])
							{
								$show .= '<option value="'.$weightDB[$i].'" selected>'.$weightDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$weightDB[$i].'">'.$weightDB[$i].'</option>';
							}
					  }	 
	$show .="</select><input type='hidden' id='weightVal' name='weightVal' value='".$this->profileResult['Weight']."'>
   </div></div><div class='prof_width_i_err'><div class='search_48_red' id='heightError'></div><div class='search_48_red' id='weightError'></div></div>";
		}
		else if($this->id == '5')	
		{
		  $show .="<div class='prof_width_i'><div class='search_24_head'>Phone No. </div><div class='search_24'>";
					
			 $show .="<input name='txtCcode' id='txtCcode' type='text' class='textbox_p' value='".$this->profileResult['Tele_country']."' style='width:30px;' readonly='READONLY'><input name='txtMobile' id='txtMobile' type='text' class='textbox_p' value='".$this->profileResult['Tee_mobile']."' size='16' maxlength='15' style='width:70px;' onkeyup=\"return char_val(this,'0123456789');\" onblur=\"valid_chk('txtMobile','mobileError','10','15','Your phone number should be 10 to 15 digits')\" >";     
			  $show .="</div> <div class='search_16_head' style='width:8%;'>E-mail</div><div class='search_31' style='width:38%;'>
					  <input name='txtEmail' id='txtEmail' type='text' class='textbox_p' value='".$this->profileResult['EmailId']."' size='28' value='' maxlength='40' style='width:140px;height:14px;' onblur=\"if(document.getElementById('txtEmail').value==''){txt_empty('txtEmail','emailError','Enter your EmailId');}else{email_validation('txtEmail','emailError','Enter your valid EmailId','EmailId','tm_profile');}\" /></div> 		
			  </div><div class='prof_width_i_err'><div class='search_48_red' id='mobileError'></div><div class='search_48_red' id='emailError'></div></div>
  <div class='search_line'> </div>"; 	 
		  $show .=" <div class='prof_width_i' style='height:60px;'>
 <div class='search_24_head'>Address</div> <div class='search_48' style='width:70%; height:60px;'>
  			  <textarea name='txtaddress' id='txtaddress' class='selecttbox_p' style='width:275px; height:50px;' onblur=\"if(document.getElementById('txtaddress').value == '') { txt_empty('txtaddress','addressError','Enetr Your Address'); } else { valid_chk('txtaddress','addressError','10','150','Address should be 10 to 150 Char') }\" /> ".$this->profileResult['Address']." </textarea>  </div> </div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red' id='addressError'></div></div> <div class='search_line'> </div>";
			  $show .="<div class='prof_width_i'><div class='search_24_head'>Residing Country </div><div class='search_24'><select name='ddlCountry' id='ddlCountry' class='selecttbox_p' onblur=\"gethdValue('ddlCountry','countryVal');ddlEmptyChk('ddlCountry','countryError','Select your Country')\" onchange=\"gethdValue('ddlCountry','countryVal'); ddlClear('ddlCountry','countryError');FillCcode_ph('txtCcode','ddlCountry'); getLocation('',this.selectedIndex,'','statediv','myProfile','editState','');\">";
 				            global $countryValue;
						 	$country=explode('|',$countryValue);
							$key = array_search($this->profileResult['ResidingCountry'], $country);
							for($i=0;$i<count($country);$i++)
							{
							if($this->profileResult['ResidingCountry'] == $country[$i])
							{
							$show .= '<option value="'.$country[$i].'" selected >'.$country[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$country[$i].'" style="width:50px;">'.$country[$i].'</option>';
							}
						}
 			  $show .="</select><input type='hidden' name='countryHd' id='countryHd' value=''><input type='hidden' name='countryVal' id='countryVal' value='".$this->profileResult['ResidingCountry']."'></div><div class='search_24_head'>State/Province </div><div class='search_24' id='statediv'><select name='ddlstate' id='ddlstate' class='selecttbox_p' value='".$this->profileResult['State']." onclick=\"gethdValue('ddlstate','stateVal');\" onblur=\"ddlEmptyChk('ddlstate','stateError','Please select the State');\" onchange=\"ddlClear('ddlstate','stateError');\"><option style='width:50px;'></option></select><input type='hidden' name='txtcon' id='txtcon' value=''/><input type='hidden' name='stateVal' id='stateVal' value=''> </div>
 </div><div class='prof_width_i_err'><div class='search_48_red' id='countryError'></div><div class='search_48_red' id='stateError'></div></div><div class='search_line'> </div>";
  			 $show .="<div class='prof_width_i'><div class='search_24_head'>City</div><div class='search_24'><input type='text' class='textbox_p' name='txtCity' id='txtCity' value='".$this->profileResult['City']."' size='40' onBlur=\"txt_empty('txtCity','cityError','Please enter your city');\"></div><div class='search_24_head'>Zip/Pincode</div><div class='search_24'><input name='txtpincode' id='txtpincode' type='text' class='textbox_p' maxlength='15' size='30' value='".$this->profileResult['Zip']."' onkeyup=\"document.getElementById('txtpincode').value=document.getElementById('txtpincode').value.toUpperCase();\" onblur=\"if(document.getElementById('txtpincode').value!=''){valid_chk('txtpincode','codeError','6','15','Your pincode should be 6 to 15 digits')}else{ txt_empty('txtpincode','codeError','Please enter your Code'); };\"/></div>
 </div><div class='prof_width_i_err'><div class='search_48_red' id='cityError'></div><div class='search_48_red' id='codeError'></div></div> ";	
		 }
		 else if($this->id == '6')
		 {
			 $show .="<div class='prof_width_i'><div class='search_24_head'>Religion</div><div class='search_24' >
					  <select name='ddlReligion' id='ddlReligion' class='selecttbox_p' onclick=\"gethdValue('ddlReligion','religionVal');\" onblur=\"ddlEmptyChk('ddlReligion','religionError','Select your Religion');\" onchange=\"ddlClear('ddlReligion','religionError');FillCommunity('ddlReligion','ddlCommunity');ddl_disable('ddlReligion','ddlCommunity','communityError');\">";    
		  			   $religionString = '- Select -|Buddhist|Baha\is|Chinese Folks|Christian|Confucianist|Ethnoreligionist|Hindu|Jain|Jewish|Muslim|Neoreligionist|Shintoist|Sikh|Spiritist|Taoist|Zorastrian|Atheist|No Religion|Inter-Religion|Others';
					   $religionDB=explode('|',$religionString);
					  for($i=0;$i<count($religionDB);$i++)
					  {
							if($this->profileResult['Religion'] == $religionDB[$i])
							{
								$show .= '<option value="'.$religionDB[$i].'" selected>'.$religionDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$religionDB[$i].'">'.$religionDB[$i].'</option>';
							}
					  }
														  
				 $show .="</select><input type='hidden' name='religionVal' id='religionVal' value='".$this->profileResult['Religion']."'></div><div class='search_24_head'>Division/Caste</div><div class='search_24' >
					  <select name='ddlCommunity' id='ddlCommunity' class='selecttbox_p' onclick=\"gethdValue('ddlCommunity','communityVal');\" onblur=\"ddlEmptyChk('ddlCommunity','communityError','Select your Community')\" onchange=\"ddlClear('ddlCommunity','communityError');\">";
                      $show .= '<option value="'.$this->profileResult['CastDivision'].'">'.$this->profileResult['CastDivision'].'</option>';
					  $show .="</select><input type='hidden' name='communityVal' id='communityVal' value='".$this->profileResult['CastDivision']."'></div></div><div class='prof_width_i_err'><div class='search_48_red' id='religionError'></div><div class='search_48_red' id='communityError'></div></div> <div class='search_line'> </div><div class='prof_width_i'><div class='search_24_head'>Sub Caste </div><div class='search_48' style='width:72%;'><input name='txtCaste' id='txtCaste' type='text' size='30'  value='".$this->profileResult['Subcaste']."' maxlength='15' class='textbox_p'  style='width:165px;' onBlur=\"txt_empty('txtCaste','casteError','Please enter your Caste');\" onkeyup=\"return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');\" onchange=\"capWords('txtCaste');\"></div></div><div class='prof_width_i_err'><div class='search_48_red' id='casteError'></div><div class='search_48_red'></div></div>";
	}
	else if($this->id == '7')
	{
			 $show .="<div class='prof_width_i'><div class='search_24_head'>Gothra (m)</div><div class='search_24' >
					  <input name='txtgrm' id='txtgrm' type='text' class='textbox_p'  maxlength='30' value='".$this->profileResult['Gothram']."' onkeyup=\"return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');\" onchange=\"capWords('txtgrm');\"/></div><div class='search_24_head'>Star</div><div class='search_24' >
					  <select name='ddlstar' id='ddlstar' class='selecttbox_p' onclick=\"gethdValue('ddlstar','starVal');\" onblur=\"ddlEmptyChk('ddlstar','starError','Please select the Star');\" onchange=\"ddlClear('ddlstar','starError');\">";
    				$starString = '- Select -|Anuradha / Anusham / Anizham|Ardra / Thiruvathira|Ashlesha / Ayilyam|Ashwini / Ashwathi|Bharani|Chitra / Chitha|Dhanista / Avittam|Hastha / Atham|Jyesta / Kettai|Krithika / Karthika|Makha / Magam|Moolam / Moola|Mrigasira / Makayiram|Poorvabadrapada / Puratathi|Poorvapalguni / Puram / Pubbhe|Poorvashada / Pooradam|Punarvasu / Punarpusam|Pushya / Poosam / Pooyam|Revathi|Rohini|Shatataraka / Sadayam / Satabishek|Shravan / Thiruvonam|Swati / Chothi|Uttarabadrapada / Uthratadhi|Uttarapalguni / Uthram|Uttarashada / Uthradam|Vishaka /Vishakam';
					$starDB=explode('|',$starString);
					for($i=0;$i<count($starDB);$i++)
					{
						if($this->profileResult['Star'] == $starDB[$i])
						{
							$show .= '<option value="'.$starDB[$i].'" selected>'.$starDB[$i].'</option>';
						}
						else
						{
							$show .= '<option value="'.$starDB[$i].'">'.$starDB[$i].'</option>';
						}
					}
					  $show .="</select><input type='hidden' name='starVal' id='starVal' value='".$this->profileResult['Star']."'></div></div>
					  <div class='prof_width_i_err'><div class='search_48_red' id='religionError'></div><div class='search_48_red' id='communityError'></div></div>
					  <div class='search_line'> </div>
					  <div class='prof_width_i'><div class='search_24_head'>Raasi/Moon Sign </div><div class='search_48'><select name='ddlrassi' id='ddlrassi' class='selecttbox_p' onclick=\"gethdValue('ddlrassi','raasiVal');\" onblur=\"ddlEmptyChk('ddlrassi','rassiError','Please select the Raasi');\" onchange=\"ddlClear('ddlrassi','rassiError');\">";
  					$raasiString = '- Select -|Mesh (Aries)|Vrishabh (Taurus)|Mithun (Gemini)|Kark (Cancer)|Simha (Leo)|Kanya (Virgo)|Thul (Libra)|Vrishchik (Scorpio)|Dhanu (Sagittarius)|Makar (Capricorn)|Kumbh (Aquarius)|Meen (Pisces)';
					$raasiDB=explode('|',$raasiString);
					for($i=0;$i<count($raasiDB);$i++)
					{
						if($this->profileResult['Raasi'] == $raasiDB[$i])
						{
							$show .= '<option value="'.$raasiDB[$i].'" selected>'.$raasiDB[$i].'</option>';
						}
						else
						{
							$show .= '<option value="'.$raasiDB[$i].'">'.$raasiDB[$i].'</option>';
						}
					}
				$show .="</select><input type='hidden' name='raasiVal' id='raasiVal' value='".$this->profileResult['Raasi']."'></div>";
				   if($this->profileResult['KujaDhosam']=='Yes')
					{ 
						$Ykuja =  "checked";
					} 
					else if($this->profileResult['KujaDhosam']=='No')
					{ 
						$Nkuja =  "checked";
					} 
					else if($this->profileResult['KujaDhosam']=='Dont Know')
					{
						$Dkuja =  "checked";
					}

				$show .="</div><div class='search_line'> </div><div class='prof_width_i'><div class='search_24_head'>Kuja Dhosam</div><div class='search_48'>
					<input name='riodosham' id='riodosham' type='radio' '".$Ykuja."' onclick=\"radioVal('RBtnVal33','Yes');\"/>Yes 
					<input name='riodosham' id='riodosham' type='radio' '".$Nkuja."' onclick=\"radioVal('RBtnVal33','No');\"/>No
					<input name='riodosham' id='riodosham' type='radio' '".$Dkuja."' onclick=\"radioVal('RBtnVal33','Dont know');\"/>Dont know
					<input type='hidden' name='RBtnVal33' id='RBtnVal33' value='".$this->profileResult['KujaDhosam']."'></div></div>
					<div class='prof_width_i_err'><div class='search_48_red' id='casteError'></div><div class='search_48_red'></div></div>";
		}	
	else if($this->id == '8')
	{
	$show .="<div class='prof_width_i'><div class='search_24_head'>Education Category</div><div class='search_24'>
					 <select name='ddle_category' id='ddle_category' class='selecttbox_p'  onclick=\"gethdValue('ddle_category','eduVal');\" onchange=\"FillQualification('ddle_category','ddle_qual');ddlClear('ddle_category','categoryError'); Edu('ddle_category','ddle_qual','qualError')\" onblur=\"ddlEmptyChk('ddle_category','categoryError','Please select the Education Category');\">";
						$EduString = '- Select -|Bachelors - Engineering/ Computers|Masters - Engineering/ Computers|Bachelors - Arts/ Science/Commerce/ Others|Masters - Arts/ Science/ Commerce/ Others|Finanace & Accounts|Management - BBA/ MBA/ Others|Medicine - General/ Dental/ Surgeon/ Others|Legal - BL/ ML/ LLB/ LLM/ Others|Service - IAS/ IPS/ Others|PhD|Diploma|Higher Secondary/Secondary/Schooling|Uneducated';
					$EduDB=explode('|',$EduString);
						for($i=0;$i<count($EduDB);$i++)
						{
							if($this->profileResult['EducationCat'] == $EduDB[$i])
							{
								$show .= '<option value="'.$EduDB[$i].'" selected>'.$EduDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$EduDB[$i].'">'.$EduDB[$i].'</option>';
							}
						}
					  $show .="</select><input type='hidden' name='eduVal' id='eduVal' value='".$this->profileResult['EducationCat']."'></div><div class='search_24_head'>Qualification</div> <div class='search_24'>
					 <select name='ddle_qual' id='ddle_qual' class='selecttbox_p' onclick=\"gethdValue('ddle_qual','qualVal');\" onchange=\"ddlClear('ddle_qual','qualError');\" onblur=\"ddlEmptyChk('ddle_qual','qualError','Please select the Qualification');\">"; 
					  $show .= '<option value="'.$this->profileResult['EducationQual'].'">'.$this->profileResult['EducationQual'].'</option>';
					  $show .="</select><input type='hidden' name='qualVal' id='qualVal' value='".$this->profileResult['EducationQual']."'></div></div><div class='prof_width_i_err'><div class='search_48_red' id='categoryError'></div><div class='search_48_red' id='qualError'></div></div> <div class='search_line'> </div><div class='prof_width_i'><div class='search_24_head'>Occupation</div><div class='search_24'><select name='ddlocc' id='ddlocc' class='selecttbox_p' onclick=\"gethdValue('ddlocc','occVal');\" onblur=\"ddlEmptyChk('ddlocc','occError','Please select the Occupation');\" onchange=\"ddl_enable1('ddlocc','ddlemptype','ddlincome','txtincome','emptypeError','incomeError');ddlClear('ddlocc','occError');\">";  
						$OccString = '- Select -|Salaried|Labour|Unable to Work|Looking For Job|Not Working|Self-Employed|Others';
					    $OccDB=explode('|',$OccString);
						for($i=0;$i<count($OccDB);$i++)
						{
							if($this->profileResult['Occupation'] == $OccDB[$i])
							{
								$show .= '<option value="'.$OccDB[$i].'" selected>'.$OccDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$OccDB[$i].'">'.$OccDB[$i].'</option>';
							}
						}
					  
				 $show .="</select><input type='hidden' name='occVal' id='occVal' value='".$this->profileResult['Occupation']."'></div><div class='search_24_head'>Employment Type</div><div class='search_24'>
					   <select name='ddlemptype' id='ddlemptype' class='selecttbox_p' onclick=\"gethdValue('ddlemptype','empVal');\" onblur=\"ddlEmptyChk('ddlemptype','emptypeError','Please select the Employment Type');\" onchange=\"ddlClear('ddlemptype','emptypeError');\">";   
						$EmpString = '- Select -|Government|Private|Business|Defence|Self-Employment|Not working';
					    $EmpDB=explode('|',$EmpString);
						for($i=0;$i<count($EmpDB);$i++)
						{
							if($this->profileResult['Employementtype'] == $EmpDB[$i])
							{
								$show .= '<option value="'.$EmpDB[$i].'" selected>'.$EmpDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$EmpDB[$i].'">'.$EmpDB[$i].'</option>';
							}
						}
				   $show .="</select><input type='hidden' name='empVal' id='empVal' value='".$this->profileResult['Employementtype']."'></div></div><div class='prof_width_i_err'><div class='search_48_red' id='occError'></div><div class='search_48_red' id='emptypeError'></div></div> <div class='search_line'> </div><div class='prof_width_i'><div class='search_24_head'>Annual Income </div><div class='search_48'><select name='ddlincome' id='ddlincome' class='selecttbox_p' onclick=\"gethdValue('ddlincome','incomeVal');\" onblur=\"ddlEmptyChk('ddlincome','incomeError','Please select the Annual Income');currency_error('txtincome','incomeError');\" onchange=\"ddlClear('ddlincome','incomeError');ddl_enablefun(this,'txtincome');\">"; 
		  				global $incomeString;
						$incomeDB=explode('|',$incomeString);  				
						for($i=0;$i<count($incomeDB);$i++)
						{
							if($this->profileResult['AnnCurrency'] == $incomeDB[$i])
							{
								$show .= '<option value="'.$incomeDB[$i].'" selected>'.$incomeDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$incomeDB[$i].'">'.$incomeDB[$i].'</option>';
							}
						}

		  	$show .="</select><input type='hidden' name='incomeVal' id='incomeVal' value='".$this->profileResult['AnnCurrency']."'>&nbsp;<input name='txtincome' id='txtincome'  type='text' maxlength='10' class='textbox_p' value='".$this->profileResult['Salary']."' size='20' onkeyup=\"return char_val(this,'0123456789');\" onblur=\"txt_empty('txtincome','incomeError','Please enter the Amount');\"/></div></div><div class='prof_width_i_err'>
   <div class='search_48_red'></div><div class='search_48_red' id='incomeError'></div></div>";
	}
	else if($this->id == '9')
	{
		  $show .="<div class='prof_width_i'><div class='search_24_head'>Food</div><div class='search_48' style='width:70%;'>";
		
					if($this->profileResult['Food']=='Vegetarian')
					{ 
						$Vfood =  "checked";
					} 
					else if($this->profileResult['Food']=='Non-Vegetatrian')
					{ 
						$Nfood =  "checked";
					} 
					else if($this->profileResult['Food']=='Eggetarian')
					{
						$Efood =  "checked";
					}
					
			$show .="
			<input name='radfood' type='radio' id='rfood' '".$Vfood."' onclick=\"radioVal('foodVal','Vegetarian');\" />Vegetarian
			<input name='radfood' type='radio' id='rfood' '".$Nfood."' onclick=\"radioVal('foodVal','Non-Vegetatrian');\"/>Non-Vegetatrian
		    <input name='radfood' type='radio' id='rfood' '".$Efood."' onclick=\"radioVal('foodVal','Eggetarian');\"/>Eggetarian 
		    <input type='hidden' name='foodVal' id='foodVal' value='".$this->profileResult['Food']."'></div></div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red'></div></div><div class='search_line'> </div> <div class='prof_width_i'><div class='search_24_head'>Smoking</div><div class='search_48' >";
					
					if($this->profileResult['Smoking']=='Non-Smoker')
					{ 
						$Nsmoke =  "checked";
					} 
					else if($this->profileResult['Smoking']=='Regular')
					{ 
						$Rsmoke =  "checked";
					} 
					else if($this->profileResult['Smoking']=='Occasionally')
					{
						$Osmoke =  "checked";
					}
					
		$show.="
		<input name='radsmoke' type='radio' id='rsmoke' '".$Nsmoke."' onclick=\"radioVal('smokeVal','Non-Smoker');\"/>Non-Smoker
		<input name='radsmoke' type='radio' id='rsmoke' '".$Rsmoke."' onclick=\"radioVal('smokeVal','Regular');\"/>Regular
		<input name='radsmoke' type='radio' id='rsmoke' '".$Osmoke."' onclick=\"radioVal('smokeVal','Occasionally');\"/>Occasionally 
		<input type='hidden' name='smokeVal' id='smokeVal' value='".$this->profileResult['Smoking']."'>
		</div></div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red'></div></div><div class='search_line'> </div><div class='prof_width_i'><div class='search_24_head'>Liquor</div><div class='search_48' >";

			if($this->profileResult['Drinking']=='Non-liquor')
					{ 
						$Ndrink =  "checked";
					} 
					else if($this->profileResult['Drinking']=='Regular')
					{ 
						$Rdrink =  "checked";
					} 
					else if($this->profileResult['Drinking']=='Occasionally')
					{
						$Odrink =  "checked";
					}
	$show.="<input name='radliquor' type='radio' id='rliquor' '".$Ndrink."' onclick=\"radioVal('liquorVal','Non-liquor');\"/>Non-liquor
			<input name='radliquor' type='radio' id='rliquor' '".$Rdrink."' onclick=\"radioVal('liquorVal','Regular');\"/>Regular
			<input name='radliquor' type='radio' id='rliquor' '".$Odrink."' onclick=\"radioVal('liquorVal','Occasionally');\"/>Occasionally 
			<input type='hidden' name='liquorVal' id='liquorVal' value='".$this->profileResult['Drinking']."'></div></div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red'></div></div>";
	}
	else if($this->id =='10')
	{
		   $show.="<div class='prof_width_i'><div class='search_24_head'>Family Value</div><div class='search_24'>
					  <select name='ddlfvalue' id='ddlfvalue' class='selecttbox_p' onclick=\"gethdValue('ddlfvalue','familyVal');\" onblur=\"ddlEmptyChk('ddlfvalue','valueError','Please select a family value');\" onchange=\"ddlClear('ddlfvalue','valueError');\"  >";
						$familyString = '- Select -|Orthodox|Traditional|Moderate|Liberal';
					    $familyDB=explode('|',$familyString);
						for($i=0;$i<count($familyDB);$i++)
						{
							if($this->profileResult['Familyvalue'] == $familyDB[$i])
							{
								$show .= '<option value="'.$familyDB[$i].'" selected>'.$familyDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$familyDB[$i].'">'.$familyDB[$i].'</option>';
							}
						}
				    $show.="</select><input type='hidden' name='familyVal' id='familyVal' value='".$this->profileResult['Familyvalue']."'></div><div class='search_24_head'>Family Type</div><div class='search_24'>
					  <select name='ddlftype' id='ddlftype' class='selecttbox_p' onclick=\"gethdValue('ddlftype','ftypeVal');\" onblur=\"ddlEmptyChk('ddlftype','typeError','Please select a family type');\" onchange=\"ddlClear('ddlftype','typeError');\">";
							$FtypeString = '- Select -|Joint Family|Nuclear Family|Others';
					    	$FtypeDB=explode('|',$FtypeString);
							for($i=0;$i<count($FtypeDB);$i++)
							{
								if($this->profileResult['Familytype'] == $FtypeDB[$i])
								{
									$show .= '<option value="'.$FtypeDB[$i].'" selected>'.$FtypeDB[$i].'</option>';
								}
								else
								{
									$show .= '<option value="'.$FtypeDB[$i].'">'.$FtypeDB[$i].'</option>';
								}
							}
					  $show.="</select><input type='hidden' name='ftypeVal' id='ftypeVal' value='".$this->profileResult['Familytype']."'></div></div><div class='prof_width_i_err'><div class='search_48_red' id='valueError'></div><div class='search_48_red' id='typeError'></div></div><div class='search_line'> </div> <div class='prof_width_i'><div class='search_24_head'>Family Status</div><div class='search_24'><select name='ddlstatus' id='ddlstatus' class='selecttbox_p' onclick=\"gethdValue('ddlstatus','fstatusVal');\" onblur=\"ddlEmptyChk('ddlstatus','statusError','Please select a family status');\" onchange=\"ddlClear('ddlstatus','statusError');\">";
						$FstatusString = '- Select -|Middle Class|Upper Middle Class|Rich / Affluent';
					    $FstatusDB=explode('|',$FstatusString);
						for($i=0;$i<count($FstatusDB);$i++)
						{
							if($this->profileResult['Familystatus'] == $FstatusDB[$i])
							{
								$show .= '<option value="'.$FstatusDB[$i].'" selected>'.$FstatusDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$FstatusDB[$i].'">'.$FstatusDB[$i].'</option>';
							}
						}
			          $show.="</select><input type='hidden' name='fstatusVal' id='fstatusVal' value='".$this->profileResult['Familystatus']."'></div><div class='search_24_head'>FatherS Occupation </div><div class='search_24'> 
					  <select name='ddlFOccu' id='ddlFOccu' class='selecttbox_p' onclick=\"gethdValue('ddlFOccu','fOccVal');\" onblur=\"ddlEmptyChk('ddlFOccu','ddlFOccuErr','Please select a Fathers Occupation');\" onchange=\"ddlClear('ddlFOccu','ddlFOccuErr');\">";   
						$FOccString = '- Select -|Salaried|Labour|Unable to Work|Looking For Job|Not Working|Self-Employed|Others';
					    $FOccDB=explode('|',$FOccString);
						for($i=0;$i<count($FOccDB);$i++)
						{
							if($this->profileResult['Fatheroccupation'] == $FOccDB[$i])
							{
								$show .= '<option value="'.$FOccDB[$i].'" selected>'.$FOccDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$FOccDB[$i].'">'.$FOccDB[$i].'</option>';
							}
						}
					 $show.="</select><input type='hidden' name='fOccVal' id='fOccVal' value='".$this->profileResult['Fatheroccupation']."'> </div></div><div class='prof_width_i_err'><div class='search_48_red' id='statusError'></div><div class='search_48_red' id='ddlFOccuErr'></div></div><div class='search_line'> </div>";
					  $show.="<div class='prof_width_i'><div class='search_24_head'>Mother's Occupation </div><div class='search_24'>
					  <select name='ddlMOccu' id='ddlMOccu' class='selecttbox_p' onclick=\"gethdValue('ddlMOccu','ddlMOVal');\" onblur=\"ddlEmptyChk('ddlMOccu','ddlMOccuErr','Please select a Fathers Occupation');\" onchange=\"ddlClear('ddlMOccu','ddlMOccuErr');\">";
						$MOccString = '- Select -|Salaried|Labour|Unable to Work|Looking For Job|Not Working|Self-Employed|Others';
					    $MOccDB=explode('|',$MOccString);
						for($i=0;$i<count($MOccDB);$i++)
						{
							if($this->profileResult['Motheroccupation'] == $MOccDB[$i])
							{
								$show .= '<option value="'.$MOccDB[$i].'" selected>'.$MOccDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$MOccDB[$i].'">'.$MOccDB[$i].'</option>';
							}
						}
				  $show.="</select><input type='hidden' name='ddlMOVal' id='ddlMOVal' value='".$this->profileResult['Motheroccupation']."'></div><div class='search_24_head'>No. of Brother\s</div><div class='search_24'>
					  <input name='Brothers' id='Brothers' type='text' maxlength='2' class='textbox_p' size='30' value='".$this->profileResult['Brothers']."' onblur=\"if(document.getElementById('Brothers').value != '') { val_text1('Brothers','Brothers','BrotherError','Brothers',''); } else { txt_empty('Brothers','BrotherError','Please enter Your No. of Brothers'); } \" onkeyup=\"return char_val(this,'0123456789');\"></div></div><div class='prof_width_i_err'><div class='search_48_red' id='ddlMOccuErr'></div><div class='search_48_red' id='BrotherError'></div></div><div class='search_line'> </div>
					  <div class='prof_width_i' style='height:37px;'><div class='search_24_head'>No. of Sister's</div><div class='search_24'> <input name='Sisters' id='Sisters' type='text' class='textbox_p' maxlength='2' size='30' value='".$this->profileResult['Sisters']."' onblur=\"if(document.getElementById('Sisters').value != '') { val_text1('Sisters','Sisters','SisterError','Sisters',''); } else { txt_empty('Sisters','SisterError','Please enter Your No. of Sisters'); } \" onkeyup=\"return char_val(this,'0123456789');\"/></div>
 <div class='search_24_head'>No. of Brorther\s Married</div><div class='search_24'> <input name='brothers_married' id='brothers_married' type='text' maxlength='2' class='textbox_p' size='30' value='".$this->profileResult['Brothersmarried']."' onblur=\"if(document.getElementById('brothers_married').value != '') { val_text1('brothers_married','Brothers','bmariedError','Brothers','Married'); } else { txt_empty('brothers_married','bmariedError','Please enter Your No. of Brothers Married'); } \" onkeyup=\"return char_val(this,'0123456789');\" /></div></div><div class='prof_width_i_err'><div class='search_48_red' id='SisterError'></div><div class='search_48_red' id='bmariedError'></div></div><div class='search_line'> </div>
 <div class='prof_width_i' style='height:40px;'><div class='search_24_head'>No. of Sister's Married</div><div class='search_48'> <input name='sister_married' id='sister_married' class='textbox_p' size='30' maxlength='2' value='".$this->profileResult['Sistersmarried']."' onblur=\"if(document.getElementById('sister_married').value != '') { val_text1('sister_married','Sisters','gmariedError','Sisters','Married'); } else { txt_empty('sister_married','gmariedError','Please enter Your No. of Sisters Married'); } \"  onkeyup=\"return char_val(this,'0123456789');\"/></div></div><div class='prof_width_i_err'><div class='search_48_red' id='gmariedError'></div><div class='search_48_red'></div></div><div class='search_line'> </div><div class='prof_width_i' style='height:60px;'><div class='search_24_head'>About Family </div><div class='search_48' style='width:70%; height:60px;'>
					 <textarea name='txtfamily' id='txtfamily' cols='70' style='width:325px; height:50px;' onblur=\"txt_empty('txtfamily','famError','Please enter Details about your Family');\">".$this->profileResult['Aboutfamily']." </textarea>
					</div></div><div class='prof_width_i_err'><div class='search_24_red'></div><div class='search_48_red' id='famError'></div></div>";
	}
	else if($this->id == '11')
	{
		   $show .="<div class='prof_width_i'><div class='search_24_head'>Age</div><div class='search_48' style='width:300px;'>
			    <strong>From: </strong><input name='txtage1' type='text' class='textbox_p' id='txtage1' size='3' maxlength='2' value='".$this->profileResult['pAgeFrom']."' onblur=\"txt_empty('txtage1','ageError','Please enter your Age');\">&nbsp;&nbsp;&nbsp;<strong>To: </strong><input name='txtage1' type='text' class='textbox_p' id='txtage2' size='3' maxlength='2' value='".$this->profileResult['pAgeTO']."' onblur=\"txt_empty('txtage1','ageError','Please enter your Age');\"> </div> ";	
					  	 $show.="</div><div class='prof_width_i_err'><div class='search_48_red' id='ageErrorF'></div><div class='search_48_red' id='ageErrorT'></div></div><div class='search_line'> </div>";
						
						$show.="<div class='prof_width_i' style='height:75px;'><div class='search_24_head' style='height:70px;'>Mother Tongue</div><div class='search_24' style='height:70px;'>
                       <select name='ddlPrefer' id='ddlPrefer' class='selecttbox_p' multiple='multiple' style='height:70px; width:125px;' onclick=\"gethdValue('ddlPrefer','ddlPreferVal');\" onblur=\" ddlEmptyChk('ddlPrefer','preferError','Select your Mother Tongue')\"; onchange=\"ddlClear('ddlPrefer','preferError')\">";
					$preferString = '- Select -|Arunachali|Assamese|Awadhi|Bengali|Bhojpuri|Brij|Bihari|Dogri|English|French|Garo|Gujarati|Himachali/Pahari|Hindi|Kanauji|Kannada|Kashmiri|Khandesi|Khasi|Konkani|Koshali|Kumoani|Kutchi|Lepcha|Ladacki|Magahi|Maithili|Malayalam|Manipuri|Marathi|Marwari|Miji|Mizo|Monpa|Nicobarese|Nepali|Oriya|Punjabi|Rajasthani|Sanskrit|Santhali|Sindhi|Sourashtra|Tamil|Telugu|Tripuri|Tulu|Urdu';
					$preferDB=explode('|',$preferString);
					for($i=0;$i<count($preferDB);$i++)
					{						 					
					   if($this->profileResult['pMotherTonque'] == $preferDB[$i])
						{
							$show .= '<option value="'.$preferDB[$i].'" selected>'.$preferDB[$i].'</option>';			
						}
						else
						{
							$show .= '<option value="'.$preferDB[$i].'">'.$preferDB[$i].'</option>';							
						}										
					}
					  $show.="</select><input type='hidden' name='ddlPreferVal' id='ddlPreferVal' value='".$this->profileResult['pMotherTonque']."'> </div><div class='search_24_head' style='height:70px;'>Marital Status</div> <div class='search_24'><select name='ddlMarital' id='ddlMarital' multiple='multiple' style='height:70px; width:125px;' class='selecttbox_p' onclick=\"gethdValue('ddlMarital','ddlmaritalVal');\" onblur=\" ddlEmptyChk('ddlMarital','maritalError','Select your Marital Status');\" onchange=\"ddlClear('ddlMarital','maritalError');\">";
					  $maritalString = 'Select|UnMarried|Divorced|Separated|Widow/Widower';
					        $maritalDB=explode('|',$maritalString);
                      	for($i=0;$i<count($maritalDB);$i++)
						{
							if($this->profileResult['pMaritialStatus'] == $maritalDB[$i])
							{
								$show .= '<option value="'.$maritalDB[$i].'" selected>'.$maritalDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$maritalDB[$i].'">'.$maritalDB[$i].'</option>';
							}
						}
					  $show.="</select><input type='hidden' name='ddlmaritalVal' id='ddlmaritalVal' value='".$this->profileResult['pMaritialStatus']."'> </div></div><div class='prof_width_i_err'><div class='search_48_red' id='preferError'></div><div class='search_48_red' id='maritalError'></div></div><div class='search_line'> </div>";
					  $show.=" <div class='prof_width_i'><div class='prof_in_head'>Religion &amp; Community</div></div>
			<div class='prof_width_i' style='height:80px;'><div class='search_24_head' >Religion</div><div class='search_24' >
			<select name='ddlReligion' id='ddlReligion' class='selecttbox_p' multiple='multiple' style='height:70px; width:125px;' onclick=\"gethdValue('ddlReligion','ddlReligionVal');\" onblur=\" ddlEmptyChk('ddlReligion','religionError','Select your Religion');\" onchange=\"ddlClear('ddlReligion','religionError');FillCommunity('ddlReligion','ddlCommunity');ddl_disable('ddlReligion','ddlCommunity','communityError');\">";    
		  			   $religionString = '- Select -|Buddhist|Baha\is|Chinese Folks|Christian|Confucianist|Ethnoreligionist|Hindu|Jain|Jewish|Muslim|Neoreligionist|Shintoist|Sikh|Spiritist|Taoist|Zorastrian|Atheist|No Religion|Inter-Religion|Others';
					   $religionDB=explode('|',$religionString);
					  for($i=0;$i<count($religionDB);$i++)
					  {
							if($this->profileResult['pReligion'] == $religionDB[$i])
							{
								$show .= '<option value="'.$religionDB[$i].'" selected>'.$religionDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$religionDB[$i].'">'.$religionDB[$i].'</option>';
							}
					  }
		 $show.="</select><input type='hidden' name='ddlReligionVal' id='ddlReligionVal' value='".$this->profileResult['pReligion']."'></div>
				<div class='search_24_head'>Community</div>
				<div class='search_24' >
					<select name='ddlCommunity' id='ddlCommunity' class='selecttbox_p' multiple='multiple' style='height:70px; width:125px;' onclick=\"gethdValue('ddlCommunity','ddlCommunityVal');\" onblur=\" ddlEmptyChk('ddlCommunity','communityError','Select your Community')\" onchange=\"ddlClear('ddlCommunity','communityError');\">";
                       $show .= '<option value="'.$this->profileResult['pCastDivision'].'">'.$this->profileResult['pCastDivision'].'</option>';
        $show.=" </select><input type='hidden' name='ddlCommunityVal' id='ddlCommunityVal' value='".$this->profileResult['pCastDivision']."'></div></div>
		<div class='prof_width_i_err'><div class='search_48_red' id='religionError'></div><div class='search_48_red' id='communityError'></div></div>
		<div class='search_line'></div><div class='prof_width_i'>
		<div class='search_24_head'>Sub-Caste</div>
		<div class='search_48'>
			<input name='txtCaste' id='txtCaste' type='text' size='30'  value='".$this->profileResult['pSubcaste']."' maxlength='15' class='textbox_p'  style='width:165px;' onblur=\"txt_empty('txtCaste','casteError','Please enter your caste');\" onkeyup=\"return char_val(this,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ');\" onchange=\"capWords('txtCaste');\"></div>
		</div>
		<div class='prof_width_i_err'><div class='search_48_red' id='casteError'></div><div class='search_48_red'></div></div>
		<div class='search_line'></div>";
		$show.="<div class='prof_width_i'><div class='prof_in_head'>Education &amp; Nationality</div></div>
  <div class='prof_width_i' style='height:80px;'><div class='search_24_head'>Education</div><div class='search_24'>
		  <select name='ddle_category' id='ddle_category' multiple='multiple' style='height:70px; width:125px;' class='selecttbox_p' onclick=\"gethdValue('ddle_category','ddlCategoryVal');\"  onchange=\"ddlClear('ddle_category','categoryError');\" onblur=\"ddlEmptyChk('ddle_category','categoryError','Please select the Education Category');\">";
						$EduString = '- Select -|Bachelors - Engineering/ Computers|Masters - Engineering/ Computers|Bachelors - Arts/ Science/Commerce/ Others|Masters - Arts/ Science/ Commerce/ Others|Finanace & Accounts|Management - BBA/ MBA/ Others|Medicine - General/ Dental/ Surgeon/ Others|Legal - BL/ ML/ LLB/ LLM/ Others|Service - IAS/ IPS/ Others|PhD|Diploma|Higher Secondary/Secondary/Schooling|Uneducated';
					$EduDB=explode('|',$EduString);
						for($i=0;$i<count($EduDB);$i++)
						{
							if($this->profileResult['pEducationCat'] == $EduDB[$i])
							{
								$show .= '<option value="'.$EduDB[$i].'" selected>'.$EduDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$EduDB[$i].'">'.$EduDB[$i].'</option>';
							}
						}
				 $show.=" </select><input type='hidden' name='ddlCategoryVal' id='ddlCategoryVal' value='".$this->profileResult['pEducationCat']."'> </div>
				 <div class='search_24_head'>Occupation</div><div class='search_24'>
					<select name='ddlocc' id='ddlocc' class='selecttbox_p' onclick=\"gethdValue('ddlocc','ddloccVal');\"  onblur=\"ddlEmptyChk('ddlocc','occError','Please select the Occupation');\" onchange=\"ddlClear('ddlocc','occError'); ddl_enable1('ddlocc','ddlemptype','ddlincome','txtincome','emptypeError','incomeError'); \">";  
						$OccString = '- Select -|Salaried|Labour|Unable to Work|Looking For Job|Not Working|Self-Employed|Others';
					    $OccDB=explode('|',$OccString);
						for($i=0;$i<count($OccDB);$i++)
						{
							if($this->profileResult['pOccupation'] == $OccDB[$i])
							{
								$show .= '<option value="'.$OccDB[$i].'" selected>'.$OccDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$OccDB[$i].'">'.$OccDB[$i].'</option>';
							}
						}
		  $show.="</select><input type='hidden' name='ddloccVal' id='ddloccVal' value='".$this->profileResult['pOccupation']."'></div></div>
		  <div class='prof_width_i_err'><div class='search_48_red' id='categoryError'></div><div class='search_48_red' id='occError'></div></div>
		  <div class='search_line'> </div>
		  <div class='prof_width_i' style='height:70px;'>
		  <div class='search_24_head'>Employment Type </div>
		  <div class='search_24'>
			<select name='ddlemptype' id='ddlemptype' class='selecttbox_p' multiple='multiple' style='height:70px; width:125px;' onclick=\"gethdValue('ddlemptype','ddlEmpVal');\" onblur=\"ddlEmptyChk('ddlemptype','emptypeError','Please select the Employment Type');\" onchange=\"ddlClear('ddlemptype','emptypeError');\">";   
						$EmpString = '- Select -|Government|Private|Business|Defence|Self-Employment|Not working';
					    $EmpDB=explode('|',$EmpString);
						for($i=0;$i<count($EmpDB);$i++)
						{
							if($this->profileResult['pEmployementtype'] == $EmpDB[$i])
							{
								$show .= '<option value="'.$EmpDB[$i].'" selected>'.$EmpDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$EmpDB[$i].'">'.$EmpDB[$i].'</option>';
							}
						}
				$show.="</select><input type='hidden' name='ddlEmpVal' id='ddlEmpVal' value='".$this->profileResult['pEmployementtype']."'> </div>
				<div class='search_24_head'>Citizenship</div>
				<div class='search_24' >
                  <select name='ddlCitizen' id='ddlCitizen' class='selecttbox_p' multiple='multiple' style='height:70px; width:125px;' onclick=\"gethdValue('ddlCitizen','ddlCitizenVal');\"  onblur=\"gethdValue('ddlCitizen','citizenHd');ddlEmptyChk('ddlCitizen','citizenError','Select your Citizenship');\"  onchange=\"ddlClear('ddlCitizen','citizenError')\">";
							global $countryValue;
						 	$country=explode('|',$countryValue);												
							for($i=0;$i<count($country);$i++)
							{
							if($this->profileResult['pCitizenchip'] == $country[$i])
							{
							$show .= '<option value="'.$country[$i].'" selected>'.$country[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$country[$i].'">'.$country[$i].'</option>';
							}
						}
			$show.="</select><input type='hidden' name='citizenHd' id='citizenHd' value=''><input type='hidden' name='ddlCitizenVal' id='ddlCitizenVal' value='".$this->profileResult['pCitizenchip']."'></div></div>
				<div class='prof_width_i_err'><div class='search_48_red' id='emptypeError'></div><div class='search_48_red' id='citizenError'></div></div>
				<div class='search_line'> </div>";
				$show.="<div class='prof_width_i' style='height:70px;' >				
				<div class='search_24_head' style='height:70px;'>Residing Country </div>
				<div class='search_24' style='height:70px;'>
	<select name='ddlCountry' id='ddlCountry' class='selecttbox_p' multiple='multiple' style='height:70px; width:125px;' onclick=\"gethdValue('ddlCountry','ddlCountryVal');\"  onblur=\" ddlEmptyChk('ddlCountry','countryError','Select your Country')\" onchange=\"ddlClear('ddlCountry','countryError');gethdValue('ddlCountry','countryHd'); getLocation('',this.selectedIndex,'','statediv','myProfile','editState','');\" >";
 				            global $countryValue;
						 	$country=explode('|',$countryValue);												
							for($i=0;$i<count($country);$i++)
							{
							if($this->profileResult['pResidingCountry'] == $country[$i])
							{
							$show .= '<option value="'.$country[$i].'" selected>'.$country[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$country[$i].'">'.$country[$i].'</option>';
							}
						}
			   $show.="</select><input type='hidden' name='countryHd' id='countryHd' value=''>
			   <input type='hidden' name='ddlCountryVal' id='ddlCountryVal' value='".$this->profileResult['pResidingCountry']."'></div>
			   <div class='search_24_head' style='height:70px;'>Residing State</div>
			   <div class='search_24' id='statedivv'>
		<select name='ddlstatec' id='ddlstatec' class='selecttbox_p' multiple='multiple' style='height:60px; width:125px;' onblur=\"ddlEmptyChk('ddlstatec','stateErrorc','Please select the State');\" onchange=\"ddlClear('ddlstatec','stateErrorc');\"></select><input type='hidden' name='txtcon' id='txtcon' value=''/></div></div>
			   <div class='prof_width_i_err'><div class='search_24_red' id='countryError'></div><div class='search_24_red' id='stateErrorc'></div></div>
			   <div class='search_line'> </div>
			   <div class='prof_width_i' ><br><div class='search_24_head'>Residing City </div></div><div class='prof_width_i' ><div class='search_24' >
			  <input type='text' class='textbox_p' name='txtCity' id='txtCity' value='".$this->profileResult['City']."' size='40' onBlur=\"txt_empty('txtCity','cityError','Please enter your city');\">
			  </div></div><div class='prof_width_i_err'><div class='search_48_red' id='cityError'></div><div class='search_48_red'></div></div>
			  <div class='search_line'> </div>";
			 $show.="<div class='prof_width_i'><div class='prof_in_head'>Habits</div></div>
			 <div class='prof_width_i'><div class='search_24_head'>Food</div><div class='search_48' style='width:70%;'>";
				   if($this->profileResult['pFood']=='Vegetarian')
					{ 
						$Vfood =  "checked";
					} 
					else if($this->profileResult['pFood']=='Non-Vegetatrian')
					{ 
						$Nfood =  "checked";
					} 
					else if($this->profileResult['pFood']=='Eggetarian')
					{
						$Efood =  "checked";
					}
		$show.="<input name='foodPartner' type='radio' id='refood' '".$Vfood."' onclick=\"radioVal('betterHalf','Vegetarian');\" />Vegetarian
			<input name='foodPartner' type='radio' id='refood' '".$Nfood."' onclick=\"radioVal('betterHalf','Non-Vegetatrian');\"/>Non-Vegetatrian
		    <input name='foodPartner' type='radio' id='refood' '".$Efood."' onclick=\"radioVal('betterHalf','Eggetarian');\"/>Eggetarian 
		    <input type='hidden' name='betterHalf' id='betterHalf' value='".$this->profileResult['pFood']."'>
		</div></div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red'></div></div><div class='search_line'> </div>
		<div class='prof_width_i'><div class='prof_in_head'>Status &amp; Height</div></div>
		<div class='prof_width_i' style='height:85px;'><div class='search_24_head'>Physical Status </div><div class='search_48' style='width:72%;'>
			 <select name='ddlphysical' id='ddlphysical'  class='selecttbox_p' multiple='multiple' style='height:60px; width:125px;' onclick=\"gethdValue('ddlphysical','ddlphysicalVal');\" onblur=\"ddlEmptyChk('ddlphysical','statusError','Please select the Physical Status');\" onchange=\"ddlClear('ddlphysical','statusError');\">";
						$phyString = '- Select -|Normal|Physically challenged |Mentally challenged';
					    $phyDB=explode('|',$phyString);
						for($i=0;$i<count($phyDB);$i++)
						{
							if($this->profileResult['pPhysicalStatus'] == $phyDB[$i])
							{
								$show .= '<option value="'.$phyDB[$i].'" selected>'.$phyDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$phyDB[$i].'">'.$phyDB[$i].'</option>';
							}	
						}
				$show.="</select> <input type='hidden' name='ddlphysicalVal' id='ddlphysicalVal' value='".$this->profileResult['pPhysicalStatus']."'></div></div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red' id='statusError'></div></div>
				<div class='search_line'> </div>
				<div class='prof_width_i'> <div class='search_24_head'>Height</div> <div class='search_48' style='width:70%;'><strong>From</strong>
					    <select name='ddlfeet' id='ddlfeet'  class='selecttbox_p' onclick=\"gethdValue('ddlfeet','feetVal');\" onblur=\"ddlEmptyChk('ddlfeet','heightError','Please select the Height');\" onchange=\"ddlClear('ddlfeet','heightError');\">";
  						 $feetString = 'Feet/Inch/Cm |4ft 5in 134cm|4ft  6in  137cm|4ft  7in  139cm|4ft  8in  142cm|4ft  9in  144cm|4ft  10in  147cm|4ft  11in  149cm|5ft  0in  152cm|5ft  1in  154cm|5ft  2in  157cm|5ft  3in  160cm|5ft  4in  162cm|5ft  5in  165cm|5ft  6in  167cm|5ft  7in  170cm|5ft  8in  172cm|5ft  9in  175cm|5ft  10in  177cm|5ft  11in  180cm|6ft  0in  182cm|6ft  1in  185cm|6ft  2in  187cm|6ft  3in  190cm|6ft  4in  193cm|6ft  5in  195cm|6ft  6in  198cm|6ft  7in  200cm|6ft  8in  203cm|6ft  9in  205cm|6ft  10in  208cm|6ft  11in  210cm|7ft  0in  213cm';
					     $feetDB=explode('|',$feetString);
        				for($i=0;$i<count($feetDB);$i++)
						{
							if($this->profileResult['pHeightFrom'] == $feetDB[$i])
							{
								$show .= '<option value="'.$feetDB[$i].'" selected>'.$feetDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$feetDB[$i].'">'.$feetDB[$i].'</option>';
							}
						}
						$show.="</select><input type='hidden' name='feetVal' id='feetVal' value='".$this->profileResult['pHeightFrom']."'><strong>To</strong>
					    <select name='ddlfeetTo' id='ddlfeetTo'  class='selecttbox_p' onclick=\"gethdValue('ddlfeetTo','feetValTo');\" onblur=\"ddlEmptyChk('ddlfeetTo','heightError','Please select the Height');\" onchange=\"ddlClear('ddlfeetTo','heightError');\">";
						$feetString = 'Feet/Inch/Cm |4ft 5in 134cm|4ft  6in  137cm|4ft  7in  139cm|4ft  8in  142cm|4ft  9in  144cm|4ft  10in  147cm|4ft  11in  149cm|5ft  0in  152cm|5ft  1in  154cm|5ft  2in  157cm|5ft  3in  160cm|5ft  4in  162cm|5ft  5in  165cm|5ft  6in  167cm|5ft  7in  170cm|5ft  8in  172cm|5ft  9in  175cm|5ft  10in  177cm|5ft  11in  180cm|6ft  0in  182cm|6ft  1in  185cm|6ft  2in  187cm|6ft  3in  190cm|6ft  4in  193cm|6ft  5in  195cm|6ft  6in  198cm|6ft  7in  200cm|6ft  8in  203cm|6ft  9in  205cm|6ft  10in  208cm|6ft  11in  210cm|7ft  0in  213cm';
					     $feetDB=explode('|',$feetString);
        				for($i=0;$i<count($feetDB);$i++)
						{
							if($this->profileResult['pHeightTo'] == $feetDB[$i])
							{
								$show .= '<option value="'.$feetDB[$i].'" selected>'.$feetDB[$i].'</option>';
							}
							else
							{
								$show .= '<option value="'.$feetDB[$i].'">'.$feetDB[$i].'</option>';
							}
						}
						$show.="</select><input type='hidden' name='feetValTo' id='feetValTo' value='".$this->profileResult['pHeightTo']."'></div></div><div class='prof_width_i_err'><div class='search_48_red'></div><div class='search_48_red' id='heightError'></div></div><br><div class='search_line'> </div>";
					$show.="<div class='prof_in_head'>Chevaai/Kuja/Mangalik Dosham</div><div class='prof_width_i'><div class='search_100'>";
		  			if($this->profileResult['pKujaDhosam']=='Yes')
					{ 
						$Ykuja =  "checked";
					} 
					else if($this->profileResult['pKujaDhosam']=='No')
					{ 
						$Nkuja =  "checked";
					} 
					else if($this->profileResult['pKujaDhosam']=='Dont Know')
					{
						$Dkuja =  "checked";
					}
			$show.="<input name='pChevaai' id='pChevaaiS' type='radio' '".$Ykuja."' onclick=\"radioVal('pManglik','Yes');\"/>Yes
					<input name='pChevaai' id='pChevaaiNo' type='radio' '".$Nkuja."' onclick=\"radioVal('pManglik','No');\"/>No
					<input name='pChevaai' id='pChevaaiDK' type='radio' '".$Dkuja."' onclick=\"radioVal('pManglik','Dont Know');\"/>Dont Know
					<input type='hidden' name='pManglik' id='pManglik' value='".$this->profileResult['pKujaDhosam']."'>
	</div></div><div class='prof_width_i_err'><div class='search_100_red'></div></div>";
	}
	else if($this->id =='12')
	{
	   $show .="<textarea name='txtabout' id='txtabout' style='width:475px; height:50px;' onblur=\"txt_empty('txtabout','aboutError','Please enter the About Partner');if(document.getElementById('txtabout').value!=''){valid_chk('txtabout','aboutError','50','250','About Partner should be 50 to 250 character');}\" >".$this->profileResult['pAboutPartner']."</textarea><div style='height:18px; color:red;' id='aboutError'>  </div>";
	}
		echo $show."##".$this->id;
	}

	function updateProfile(){
		global $fields;
		$fields = array("a"=>array("AboutMe"),"b"=>array("LoginId","CreatedBy"),"c"=>array("FirstName","MiddleName","LastName","DOB","Age","Gender","BloodGroup","MaritialStatus","NoofChildren","Citizenchip"),"d"=>array("BodyType","Complaexion","Height","Weight"),"e"=>array("Tele_Phone","EmailId","Address","ResidingCountry","State","City","Zip"),"f"=>array("Religion","CastDivision","Subcaste"),"g"=>array("Gothram","Star","Raasi","KujaDhosam"),"h"=>array("EducationCat","EducationQual","Occupation","Employementtype","AnnCurrency","Salary"),"i"=>array("Food","Smoking","Drinking"),"j"=>array("Familyvalue","Familytype","Familystatus","Fatheroccupation","Motheroccupation","Brothers","Sisters","Brothersmarried","Sistersmarried","Aboutfamily"),"k"=>array("pAgeFrom","pAgeTO","pMotherTonque","pMaritialStatus","pReligion","pCastDivision","pSubcaste","pEducationCat","pOccupation","pEmployementtype","pCitizenchip","pResidingCountry","pState","pCity","pFood","pPhysicalStatus","pHeightFrom","pHeightTo","pKujaDhosam"),"l"=>array("pAboutPartner"));
		$values = array("v1","v2","v3","v4","v5","v6","v7","v8","v9","v10","v11","v12","v13","v14","v15","v16","v17","v18","v19");
		
		/*echo "<pre>";
		print_r($fields);
		echo "</pre>";
		echo "<pre>";
		print_r($values);
		echo "</pre>";*/
		$typeval = $this->type;	
		$fieldsval = "";		
		if($this->tbl == "p"){
			$tblName= 'tm_profile';			
		} else if($this->tbl == "F"){
			$tblName= 'tm_family';
		} else if($this->tbl == "pp"){
			$tblName= 'tm_partnerpreference';
		}
		for($i=0;$i<count($fields[$typeval]);$i++){			
			if($fieldsval == ""){				
				$fieldsval .= $fields[$typeval][$i]."='".$_GET[$values[$i]]."'";
			} else {				
				$fieldsval .= ",".$fields[$typeval][$i]."='".$_GET[$values[$i]]."'";
			}
		}
		$fieldsval .=" where ProfileId='".$_GET['pid']."'";
		$this->switchqry($tblName,'UPDATE',$fieldsval,'');
	}
}
$editProfile = new editProfile();
if($_GET['action']=='Update'){
	$editProfile->updateProfile();
} else {
	$editProfile->showProfile(); }
?>