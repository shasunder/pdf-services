<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
	$cat= array("Any","UnMarried","Widow\Widower","Divorced","Separated");
	$scat= array("Arunachali","Assamese","Awadhi","Bengali","Bhojpuri","Brij"."Bihari","Dogri","English","French","Garo","Gujarati","Himachali/Pahari","Hindi","Kanauji","Kannada","Kashmiri","Khandesi","Khasi","Konkani","Koshali","Kumoani","Kutchi","Lepcha","Ladacki","Magahi","Maithili","Malayalam","Manipuri","Marathi","Marwari","Miji","Mizo","Monpa","Nicobarese","Nepali","Oriya","Punjabi","Rajasthani","Sanskrit","Santhali","Sindhi","Sourashtra","Tamil","Telugu","Tripuri","Tulu","Urdu");
	$icat= array("Buddhist","Baha'is","Chinese Folks","Christian","Confucianist","Ethnoreligionist","Hindu","Jain","Jewish","Muslim","Neoreligionist","Shintoist","Sikh","Spiritist","Taoist","Zorastrian","Atheist","No Religion","Inter-Religion","Others");
	$educ= array("Bachelors - Engineering/ Computers","Masters - Engineering/ Computers","Bachelors - Arts/ Science/Commerce/ Others","Masters - Arts/ Science/ Commerce/ Others","Finanace & Accounts","Management - BBA/ MBA/ Others","Medicine - General/ Dental/ Surgeon/ Others","Legal - BL/ ML/ LLB/ LLM/ Others","Service - IAS/ IPS/ Others","PhD","Diploma","Higher Secondary/Secondary/Schooling","Uneducated");	
	$FOcc= array("Salaried","Labour","Unable to Work","Looking For Job","Not Working","Self-Employed","Others");
	$emp= array("Government","Private","Business","Defence","Self-Employment","Not working");	
	$phy= array("Normal","Physically challenged ","Mentally challenged");
	$hight= array("4ft 5in 134cm","4ft  6in  137cm","4ft  7in  139cm","4ft  8in  142cm","4ft  9in  144cm","4ft  10in  147cm","4ft  11in  149cm","5ft  0in  152cm","5ft  1in  154cm","5ft  2in  157cm","5ft  3in  160cm","5ft  4in  162cm","5ft  5in  165cm","5ft  6in  167cm","5ft  7in  170cm","5ft  8in  172cm","5ft  9in  175cm","5ft  10in  177cm","5ft  11in  180cm","6ft  0in  182cm","6ft  1in  185cm","6ft  2in  187cm","6ft  3in  190cm","6ft  4in  193cm","6ft  5in  195cm","6ft  6in  198cm","6ft  7in  200cm","6ft  8in  203cm","6ft  9in  205cm","6ft  10in  208cm","6ft  11in  210cm","7ft  0in  213cm");	
	$hight1= array("4ft 5in 134cm","4ft  6in  137cm","4ft  7in  139cm","4ft  8in  142cm","4ft  9in  144cm","4ft  10in  147cm","4ft  11in  149cm","5ft  0in  152cm","5ft  1in  154cm","5ft  2in  157cm","5ft  3in  160cm","5ft  4in  162cm","5ft  5in  165cm","5ft  6in  167cm","5ft  7in  170cm","5ft  8in  172cm","5ft  9in  175cm","5ft  10in  177cm","5ft  11in  180cm","6ft  0in  182cm","6ft  1in  185cm","6ft  2in  187cm","6ft  3in  190cm","6ft  4in  193cm","6ft  5in  195cm","6ft  6in  198cm","6ft  7in  200cm","6ft  8in  203cm","6ft  9in  205cm","6ft  10in  208cm","6ft  11in  210cm","7ft  0in  213cm");	
   	$link="ManagePartner.php";
if(($action=='edit') || ($action=='view')) {
	$condition=" where ProfileId='".$_GET['Id']."'";
	$matrimony->switchqry('tm_partnerpreference','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
	$disabled='disabled';
	 for($i=0; $i<sizeof($cat); $i++) { if($value['pMaritialStatus']==$cat[$i]) { $selc[$i]='selected';  } else { $selc[$i]=''; } }
	 for($i=0; $i<sizeof($scat); $i++) { if($value['pMotherTonque']==$scat[$i]) { $sels[$i]='selected';  } else { $sels[$i]=''; } }	
	 for($i=0; $i<sizeof($icat); $i++) { if($value['pReligion']==$icat[$i]) { $seli[$i]='selected';  } else { $seli[$i]=''; } }	
	 for($i=0; $i<sizeof($educ); $i++) { if($value['pEducationCat']==$educ[$i]) { $sedu[$i]='selected';  } else { $sedu[$i]=''; } }
	 for($i=0; $i<sizeof($FOcc); $i++) { if($value['pOccupation']==$FOcc[$i]) { $self[$i]='selected';  } else { $self[$i]=''; } }
	 for($i=0; $i<sizeof($emp); $i++) { if($value['pEmployementtype']==$emp[$i]) { $semp[$i]='selected';  } else { $semp[$i]=''; } }
	 for($i=0; $i<sizeof($phy); $i++) { if($value['pPhysicalStatus']==$phy[$i]) { $sphy[$i]='selected';  } else { $sphy[$i]=''; } }	
	 for($i=0; $i<sizeof($hight); $i++) { if($value['pHeightFrom']==$hight[$i]) { $shight[$i]='selected';  } else { $shight[$i]=''; } }	
	 for($i=0; $i<sizeof($hight1); $i++) { if($value['pHeightTo']==$hight1[$i]) { $shight1[$i]='selected';  } else { $shight1[$i]=''; } }	
}

?>
<?
/*$city='';
$condition=" ";ProfileId, Familyvalue, Familytype, Familystatus, Fatheroccupation, Motheroccupation, Brothers, Sisters, Brothersmarried, Sistersmarried, Aboutfamily
$classifieds->manipulate('cs_profile','SELECT',$condition,'*');
$count=mysql_num_rows($classifieds->qry_result);
$i=1;
while($row = mysql_fetch_array($classifieds->qry_result)) {
	
	$city.="'".$row['cs_Email']."'".",";
	$i++; 
}*/
?>
<? 
/*
$condition=" ";
$classifieds->manipulate('cs_allcategory','SELECT',$condition,'*');
$count1=mysql_num_rows($classifieds->qry_result);
$j=1;
while($row1 = mysql_fetch_array($classifieds->qry_result)) {
	if($count1!=$j) {
	$product.='"'.$row1['cy_Name'].'"'.',';
	$j++; }
}
*/
//echo $monthValue;

?>

<h2><? if($action=="edit"){echo "Edit";}else if($action=="view"){echo "View"; }else{echo "Add";}?> Partner Preference </h2>
<script type="text/javascript">
var product = [<? echo $city; ?>];
//alert(product);
var sample = [<? echo $product; ?>];
//alert(sample);
 
</script>

<b><a href="<? echo $link; ?>">Go Back</a> </b>
<form name="frmPost" method="POST" action="" class="box" autocomplete="off">
<table width="799" height="650">
<tbody>
	<? if(($action!='edit') && ($action!='view')) { ?>
	<tr>
		<td width="25%"><b>Profile Id :</b><span class="marker">*</span></td>
		<td width="75%">
		<select name="pid" id="pid" style="width:100px; height:20px; width:215px;" >
		<? $sel="SELECT ProfileId FROM tm_profile where ProfileId not in(SELECT ProfileId FROM tm_partnerpreference)";
		   $result=mysql_query($sel); $j=0; ?>
		   <option >Select</option>
		   <? while($row=mysql_fetch_array($result)){ if($row['ProfileId']!=''){?>
				<option <? if($_POST['pid']==$row['ProfileId']){ echo "selected"; }?>  value="<?=$row['ProfileId']?>"><?=$row['ProfileId']?></option>
				<? $j++; }
				}?>
		</select>
		<input type="hidden" name="pid1" id="pid1" value=""/>
		</td>
	</tr>
	<? } ?>
	<tr>
	<td><b>Age :</b></td>
		<td>
		<input name="profileid" id="profileid" size="40" maxlength="10" type="hidden" value="<? echo $value['ProfileId']; ?>" />
		<input name="age1" id="age1" size="15" maxlength="2" type="text" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['pAgeFrom']; ?>" <? echo $disabled; ?>/> 
		&nbsp;<b>TO</b>&nbsp;&nbsp;<input name="age2" id="age2" size="15" maxlength="2" type="text" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['pAgeTO']; ?>" <? echo $disabled; ?>/>
		</td>
	</tr>
  
	<tr>
		<td><b>Maritial  Status :</b></td>
		<td>
		<input type="radio" name="radiomarital" id="marital" value="Any" <?  if($value['pMaritialStatus']=='Any') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Any
		<input type="radio" name="radiomarital" id="marital1" value="UnMarried" <? if($value['pMaritialStatus']=='UnMarried') { echo "checked"; } ?> <? echo $disabled; ?> >UnMarried
		<input type="radio" name="radiomarital" id="marital2" value="Widow\Widower" <? if($value['pMaritialStatus']=='Widow\Widower') { echo "checked"; } ?> <? echo $disabled; ?> >Widow\Widower
		<input type="radio" name="radiomarital" id="marital3" value="Divorced" <? if($value['pMaritialStatus']=='Divorced') { echo "checked"; } ?> <? echo $disabled; ?> >Divorced
		<input type="radio" name="radiomarital" id="marital4" value="Separated" <? if($value['pMaritialStatus']=='Separated') { echo "checked"; } ?> <? echo $disabled; ?> >Separated
	</td>
	</tr>
  
	<tr>
		<td><b>Mother Tongue </b></td>
		<td><select name="Mtongue" id="Mtongue"  style="width:100px; height:70px; width:215px;" multiple="multiple"  <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($scat); $i++) { echo '<option value="'.$scat[$i].'"'.$sels[$i].'>'.$scat[$i].'</option>'; } ?>
		</select>
		 <input type="hidden" name="motherHd" id="motherHd" value=""/>
		</td>
	</tr>
  
	<tr>
		<td><b>Religion</b></td>
		<td><select name="ddlReligion" id="ddlReligion" class="textfield" style="width:100px; height:70px; width:215px;" multiple="multiple"  onChange="FillCommunity('ddlReligion','ddlCommunity');ddl_disable('ddlReligion','ddlCommunity','communityError');"<? echo $disabled; ?>>
		<option >Select</option>
		<? for($i=0; $i<count($icat); $i++) { echo '<option value="'.$icat[$i].'"'.$seli[$i].'>'.$icat[$i].'</option>'; } ?>
		</select>
		<input type="hidden" name="religionHd" id="religionHd" value="">
		</td>
	</tr>
  
	<tr>
		<td><b>Cast Devision </b> </td>
		<td> <select name="ddlCommunity" id="ddlCommunity" class="textfield" style="width:100px; height:70px; width:215px;" multiple="multiple"  <? echo $disabled; ?>>
		<option><? echo $value['pCastDivision']; ?></option></select>
		 <input type="hidden" name="communityHd" id="communityHd" value=""/>
		</td>
	</tr>
  
  <tr>
	 <td><b>Sub Cast  :</b> </td>
	 <td><input name="subcast" type="text" id="subcast" value="<? echo $value['pSubcaste']; ?>" <? echo $disabled; ?> size="40" maxlength="50" /></td>
  </tr>
  
  <tr>
	<td><b>Education </b> </td>
	<td><select name="ddle_category" id="ddle_category" class="textfield"  style="width:100px; height:70px; width:215px;" multiple="multiple"  <? echo $disabled; ?>>
	<option >Select</option>
	<? for($i=0; $i<count($educ); $i++) { echo '<option value="'.$educ[$i].'"'.$sedu[$i].'>'.$educ[$i].'</option>'; } ?>
	</select>
	<input type="hidden" name="categoryHd" id="categoryHd" value="">
	</td>
  </tr>
  
	<tr>
		<td ><b>Occupation:</b> </td>
		<td><select name="occ" id="occ" onChange="showMessage();" style="width:100px; height:70px; width:215px;" multiple="multiple"  <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($FOcc); $i++) { echo '<option value="'.$FOcc[$i].'"'.$self[$i].'>'.$FOcc[$i].'</option>'; } ?>
		</select>
		<input type="hidden" name="occHd" id="occHd" value="">
		</td>
	</tr>
  
	<tr>
		<td><strong>Employement</strong></td>
		<td><select name="emp" id="emp" onChange="showMessage();" style="width:100px; height:70px; width:215px;" multiple="multiple"  <? echo $disabled; ?> >
		<option >Select</option>
		<? for($i=0; $i<count($emp); $i++) { echo '<option value="'.$emp[$i].'"'.$semp[$i].'>'.$emp[$i].'</option>'; } ?>
		</select>
		<input type="hidden" name="emptypeHd" id="emptypeHd" value="" />
		</td>
	</tr>
  
	<tr>
		<td><strong>Citizenchip</strong></td>
		<td>
		<select name="ddlCitizen" id="ddlCitizen" class="textfield" style="width:100px; height:70px; width:215px;" multiple="multiple"  onBlur="gethdValue('ddlCitizen','citizenHd');ddlEmptyChk('ddlCitizen','citizenError','Select your Citizenship');"  onchange="ddlClear('ddlCitizen','citizenError')" <? echo $disabled; ?>>
		<?php
		$country=explode("|",$countryValue);
		$countCountry=count($country);				    									   					    
		for($i=0;$i<count($country);$i++)
		{
		?>
		<option style="width:112px;" value='<?=$i;?>' <? if($value['pCitizenchip']==$country[$i]) { echo 'selected';  } ?>><? echo $country[$i];?></option>
		<?
		}
		?>
		</select>
		<input type="hidden" name="citizenHd" id="citizenHd" value="<? echo $value['pCitizenchip']?>">
		</td>
	</tr>
  
	<tr>
		<td><strong>  ResidingCountry</strong></td>
		<td>
		
		<select name="ddlCountry" id="ddlCountry" class="textfield" style="width:100px; height:70px; width:215px;" multiple="multiple"  onChange="gethdValue('ddlCountry','countryHd');getLocation('',this.value,'','statediv','second','state','');" <? echo $disabled; ?> >
		
		<?php
		for($i=0;$i<count($country);$i++)
		{
		?>
		<option style="width:112px;" value='<?=$i;?>' <? if($value['pResidingCountry']==$country[$i]) { echo 'selected';  } ?>><? echo $country[$i];?></option>
		<?
		}
		?>
		</select>
		<input type="hidden" name="countryHd" id="countryHd" value="<? echo $value['pResidingCountry']?>">
		</td>
	</tr>
	
	<tr>
		<td><strong>State</strong></td>
		<td>
		<div id="statediv" class="form_31_red" style="height:20px;">
		<select name="ddlstate" id="ddlstate" class="textfield" style="width:100px; height:20px; width:215px;" multiple="multiple"  <? echo $disabled; ?>>
		<? if($action=="edit" || $action=="view"){ ?>
		<option><? echo $value['pState']; ?></option>
		<? }else{?>
		<option>- Select -</option>
		<? } ?>
		</select>
		<input type="hidden" name="stateHd" id="stateHd" value="<? echo $value['pState']; ?>">
		</div>
		</td>
	</tr>
	
	 <tr>
	 <td height="22" valign="top"><b>City :</b> </td>
	<td>
	<input type="text" id="city" name="city" value="<? echo $value['pCity']; ?>" <? echo $disabled; ?> 
	 size="40" maxlength="15" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
	
	<tr>
		<td><strong>AboutPartner</strong></td>
		<td><textarea name="description" id="description" cols="60" rows="5"  <? echo $disabled; ?> ><? echo $value['pAboutPartner']; ?></textarea></td>
	</tr>
  
	<tr>
		<td><strong>Food</strong></td>
		<td>
		<input type="radio" name="rfood" id="food" value="V" <?  if($value['pFood']=='V') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Vegetarian
		<input type="radio" name="rfood" id="food1" value="N" <? if($value['pFood']=='N') { echo "checked"; } ?> <? echo $disabled; ?>  >Non-Vegetatrian
		<input type="radio" name="rfood" id="food2" value="E" <? if($value['pFood']=='E') { echo "checked"; } ?> <? echo $disabled; ?>  >Eggetarian
		<input type="radio" name="rfood" id="food3" value="D" <? if($value['pFood']=='D') { echo "checked"; } ?> <? echo $disabled; ?>  >Doesn't Matter 
		</td>
	</tr>
  
	<tr>
		<td><strong>PhysicalStatus</strong></td>
		<td><select name="pstatus" id="pstatus" onChange="showMessage();" style="width:100px; height:70px; width:215px;" multiple="multiple"  <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($phy); $i++) { echo '<option value="'.$phy[$i].'"'.$sphy[$i].'>'.$phy[$i].'</option>'; } ?>
		</select>
		<input type="hidden" name="statusHd" id="statusHd" value=""/>
		</td>
	</tr>
	
	<tr>
	<td><b>Height :</b></td>
		<td>
		<select name="height1" id="height1" style="height:18px; width:90px;" <? echo $disabled; ?> >
		<option>- Feet/Inch/Cm -</option>
		<? for($i=0; $i<count($hight); $i++) { echo '<option value="'.$hight[$i].'"'.$shight[$i].'>'.$hight[$i].'</option>'; } ?>
		</select>
		&nbsp;<b>TO</b>&nbsp;&nbsp;<select name="height2" id="height2" style="height:18px; width:90px;" <? echo $disabled; ?> >
		<option>- Feet/Inch/Cm -</option>
		<? for($i=0; $i<count($hight1); $i++) { echo '<option value="'.$hight1[$i].'"'.$shight1[$i].'>'.$hight1[$i].'</option>'; } ?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td><strong>KujaDhosam</strong></td>
		<td>
		<input type="radio" name="rdosham" id="dosham" value="Y" <?  if($value['pKujaDhosam']=='Y') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Yes
		<input type="radio" name="rdosham" id="dosham1" value="N" <? if($value['pKujaDhosam']=='N') { echo "checked"; } ?> <? echo $disabled; ?>  >No
		<input type="radio" name="rdosham" id="dosham2" value="D" <? if($value['pKujaDhosam']=='D') { echo "checked"; } ?> <? echo $disabled; ?>  >Don't know
		</td>
	</tr>
	
	<tr>
		<td >	
		<input type="hidden" name="Id" id="Id" value="<?=$_GET['Id']; ?>"/> 
		<? if(($action!='edit') && ($action!='view')) { ?>
		<input type="hidden" name="webpage" value="request"/>
		<button type="submit" name="submit_list" id="submit_list" value="1" style="cursor:pointer" onClick="return pvalid();">Save</button>
		<?  } if($action=='edit') {?>
		<span id="editspanid" style="display:block; float:left; margin-right:4px;"><button type="button" onClick="TXTEnable('age1|age2|marital|marital1|marital2|marital3|marital4|Mtongue|ddlReligion|ddlCommunity|subcast|ddle_category|occ|emp|ddlCitizen|ddlCountry|ddlstate|city|description|food|food1|food2|food3|pstatus|height1|height2|dosham|dosham1|dosham2');DISStyle('updatespanid');DISStylenone('editspanid');" style="cursor:pointer">Edit</button></span>
		<span id="updatespanid" style="display:none;">
		<button type="submit" name="update" id="update" value="change" onClick="return upvalid();">Update</button>
		</span> </td>
	</tr>
	
  </tbody></table> 
<!--<span id="delspanid" style="display:"><button type="submit" id="del" name="del" value="del" onClick=" return delete_row(); TXTEnable('suggest1');" style="cursor:pointer" >Delete</button></span>
<input name="verify" value="Verify" class="button" onclick="return check('Verify')" type="submit" style="cursor:pointer">
<input name="active" type="submit" class="button" id="active" value="Active" onclick="return check('Activate')" style="cursor:pointer">
<input name="pending" type="submit" class="button" id="pending" value="Pending" onclick="return check('Pending')" style="cursor:pointer">
<input name="suspend" value="Blocked" class="cautionbutton" onClick="return check('Block')" type="submit" style="cursor:pointer">
<?/* } if(($action!='view')&&($action!='edit')) {*/?>-->
   <!--<button type="button" onClick="TXTClear('suggest1|description|month|txtVerifycode'); TXTEnable('suggest1|description|month|txtVerifycode');" style="cursor:pointer">RESET</button>--><? }?>
   
 <? /* if(($action!='view')&&($action=='edit')) {*/?>
  <!-- <button type="button" onClick="TXTClear('description|month'); TXTEnable('description|month');DISStyle('updatespanid');DISStylenone('editspanid');" style="cursor:pointer">RESET</button>-->
   <? /*} */?>
</form>
<script language="javascript">
function pvalid(){
	if(document.frmPost.pid.selectedIndex==0){
		alert("* Select Profile Id");
		return false;
	}else{
		 document.frmPost.action='postpartener.php';
	}
}
function upvalid(){
	/*if(document.frmPost.pid.selectedIndex==0){
		alert("* Select Profile Id");
		return false;
	}else{*/
		 document.frmPost.action='postpartener.php?action=update';
	/*}*/
}
function validate() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	error[0] = checkText(frm.age1) ? "" : "From Age is empty"; 
	error[1] = checkText(frm.age2) ? "" : "To Age is empty";
	error[2] = checkSelected(frm.Mtongue) ? "" : "MotherTongue is empty";
	error[3] = checkSelected(frm.ddlReligion) ? "" : "Religion is empty";
	error[4] = checkSelected(frm.ddlCommunity) ? "" : "Community is empty";
	error[5] = checkSelected(frm.ddle_category) ? "" : "Education Categorty is empty";
	error[6] = checkSelected(frm.occ) ? "" : "Occu[pation is empty";
	error[7] = checkSelected(frm.emp) ? "" : "Employee Type is empty";
	error[8] = checkSelected(frm.ddlCitizen) ? "" : "Citizenship is empty";
	error[9] = checkSelected(frm.ddlCountry) ? "" : "Country is empty";
	error[10] = checkSelected(frm.ddlstate) ? "" : "State is empty";
	error[11] = checkText(frm.description) ? "" : "AboutPartner is empty";
	error[12] = checkSelected(frm.pstatus) ? "" : "PhysicalStatus is empty";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postpartener.php'; } else { alert(errorMessage); return false; } }
	
	function update1() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	error[0] = checkText(frm.age1) ? "" : "From Age is empty"; 
	error[1] = checkText(frm.age2) ? "" : "To Age is empty";
	error[2] = checkSelected(frm.Mtongue) ? "" : "MotherTongue is empty";
	error[3] = checkSelected(frm.ddlReligion) ? "" : "Religion is empty";
	error[4] = checkSelected(frm.ddlCommunity) ? "" : "Community is empty";
	error[5] = checkSelected(frm.ddle_category) ? "" : "Education Categorty is empty";
	error[6] = checkSelected(frm.occ) ? "" : "Occu[pation is empty";
	error[7] = checkSelected(frm.emp) ? "" : "Employee Type is empty";
	error[8] = checkSelected(frm.ddlCitizen) ? "" : "Citizenship is empty";
	error[9] = checkSelected(frm.ddlCountry) ? "" : "Country is empty";
	error[10] = checkSelected(frm.ddlstate) ? "" : "State is empty";
	error[11] = checkText(frm.description) ? "" : "AboutPartner is empty";
	error[12] = checkSelected(frm.pstatus) ? "" : "PhysicalStatus is empty";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postpartener.php?action=update'; } else { alert(errorMessage); return false; } }
	
function check(id) {
		frm = document.frmPost;
		var tick = frm.Id; 
		var flag = 0; 	
			if(tick.value) {
				flag = 1;
				if(id=='Pending') {
					if(confirm('Are you sure you want to move Selected Request to Pending')) {
						document.frmPost.action; document.frmPost.submit(); return true; 
					} else {  return false; }
				} else  {
					if(confirm(id+' Selected Request')) {
						document.frmPost.action; document.frmPost.submit(); return true;
					} else { return false; } 
				} }
			if(flag == 0) { alert("Select a Request to "+id); return false; } }
</script>
