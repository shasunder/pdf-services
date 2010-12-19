<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bride & Groom</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="ajax/profilejs.js"></script>
<script type="text/javascript" language="javascript" src="js/general.js"></script>
<script type="text/javascript" language="javascript" src="js/onload.js"></script>
<script type="text/javascript" language="javascript" src="js/general.js"></script>
<script type="text/javascript" language="javascript" src="js/message.js"></script>
<script type="text/javascript" language="javascript" src="ajax/country.js"></script>
</head>
<body onLoad="timedCount();">
<form name="editProfile">
<br /><table width="809" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td  valign="top"> 
<div style="padding-left:50px">
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif" /></span></td>
    <td width="554" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="31"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" /></span></td>
  </tr>
  <tr>
    <td background="./images/lightbox_left.gif"></td>
    <td>

<div  class="sch_menu_t1">
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr">
				  <div class="schmenu" ><a href="?page=full"> Full Profile </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr">
				  <div class="schmenu_highlight" ><a href="?page=edit" class="schmenu_active"> Edit Profile </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
</div>
<div class="sch_con" > <div class="sch_top">  </div>
  <div style="height:160px;" ><br /> 
   <div  class="sch_box" style="height:150px;">
     <div class="prof_full" style="height:122px;" >
<? if($myProfile->imgnum != 0){ ?>
<div  class="sch_img" ><a href="imageView.php?pid=<?= $myProfile->profileResult['ProfileId']?>&iv=s" target="_blank" onClick="window.open(this.href,'newwindow','width=600,height=570,scrollbars=no,resize=0');return false;">
	<img src="member_image/<?= $myProfile->img_data[0][image_thumb]; ?>" name="img_0" style="border:1px solid  #CCCCCC;" onMouseOver="document.getElementById('show<?=$j?>').style.display='';" onMouseOut="document.getElementById('show<?=$j?>').style.display='none';"/>
</a>
</div><input type="hidden" name="txtimgcnt_0" value="1" />
	<div style="position:relative;"> 
<? $browser = get_browser(); if($browser->browser=="IE"){ ?>
    <div style='position:absolute; display:none; z-index:5000;  top:15px;left:0px; width:130px; height:128px; cursor:pointer;' id='show<?= $j;?>'>    
<? }else { ?>
    <div style='position:absolute; display:none; z-index:5000;  top:15px;left:116px; width:130px; height:128px; cursor:pointer;' id='show<?= $j;?>'>
<? } ?><img src="member_image/<?=$myProfile->img_data[0][image_thumb];?>" style='border:2px solid #126569;' name="lgt_img_0"/> </div>

</div>
<? } else { ?>							
		<div  class="sch_img" >
		
		<? if($myProfile->profileResult['Gender'] == M){?>
			<img src="images/boy_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? }else{?>
			<img src="images/lady_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? } ?>
		</div>
<? } ?>
    <div class="sch_prof"> <span class="prof-head"><?= $myProfile->profileResult['FirstName']." ".$myProfile->profileResult['MiddleName']." ".$myProfile->profileResult['LastName'];?>(<?= $myProfile->profileResult['ProfileId'];?>) </span><span class="prof_text"><br />
     <?= $myProfile->profileResult['Age'];?> yrs,<?= $myProfile->profileResult['Height'];?> |<?= $myProfile->profileResult['Religion'];?>: <?= $myProfile->profileResult['CastDivision'];?>  <br />
	 <? if($myProfile->profileResult['State']){ ?>
     <? if($myProfile->profileResult['Subcaste']!=''){ ?>Subcaste: <?= $myProfile->profileResult['Subcaste'];?>| <? } ?>  <?= $myProfile->profileResult['Star'];?>:  <?= $myProfile->profileResult['Raasi'];?> |  <?= $myProfile->profileResult['City'];?>, <?= $myProfile->profileResult['State'];?>, <?= $myProfile->profileResult['ResidingCountry'];?>  |  <?= $myProfile->profileResult['EducationQual'];?> | <?= $myProfile->profileResult['EducationSpecialization']; } else { echo $myProfile->profileResult['ResidingCountry']; } ?>  <br />
      </span></div>
    </div><? if($myProfile->imgnum != 0){ ?>
    <div  style="height:20px; width:80px; padding-left:23px; cursor:pointer;">
		<div class="sch_l_arrow"><img src="images/l_arrow_url.gif" onClick="if(document.editProfile.txtimgcnt_0.value > 1){if(document.editProfile.txtimgcnt_0.value==2){srcimgprev('<?= $myProfile->img_data[0][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')} else if(document.editProfile.txtimgcnt_0.value==3){srcimgprev('<?= $myProfile->img_data[1][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')} else if(document.editProfile.txtimgcnt_0.value==4){srcimgprev('<?= $myProfile->img_data[2][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')} else if(document.editProfile.txtimgcnt_0.value==5){srcimgprev('<?= $myProfile->img_data[3][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')}}" name="imglarr_0" style="cursor:pointer;" /> </div> 
		<div class="sch_link"><span id="sp_0"> 1</span> - <?= $myProfile->imgnum ?> </div>
		<div class="sch_r_arrow"><img src="images/r_arrow.jpg" onClick="if(document.editProfile.txtimgcnt_0.value < <?= $myProfile->imgnum;?>){if(document.editProfile.txtimgcnt_0.value==1){srcimgnext('<?= $myProfile->img_data[1][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')} else if(document.editProfile.txtimgcnt_0.value==2){srcimgnext('<?= $myProfile->img_data[2][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')} else if(document.editProfile.txtimgcnt_0.value==3){srcimgnext('<?= $myProfile->img_data[3][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')} else if(document.editProfile.txtimgcnt_0.value==4){srcimgnext('<?= $myProfile->img_data[4][image_thumb]; ?>',0,'<?=$myProfile->imgnum;?>')}}" name="imgrarr_0" style="cursor:pointer;" /></div>
	</div><? } ?>
    </div><br />
</div>
<br />
   <div class="prof_h_b"> <div class="prof_head_i">  About Me </div> 
   <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn"  id="edit1" onClick="showDiv(1,'<?= $myProfile->profileResult['ProfileId'];?>');"><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update1" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','a','p',document.getElementById('txtFam').value,'','','','','','','','','','','','','','','',''); updateNew(1);"> <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" style="display:none;" id="cancel1" onClick="updateNew(1);"> <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" /></div></div>
      </div>
   <div class="prof_menu_in" id="view1">
   <div style="height:68px;" id="abtdiv" ><?= $myProfile->profileResult['AboutMe'];?>  </div>
</div>
   <!--////////.............About me Text Area Div...........-->
   <div class="prof_menu_in" id="editview1" style="display:none;height:68px;"></div>
 <!--//////////////////////////div end////////////////////////-->
   <div class="prof_h_b"><div class="prof_head_i" style="width:140px;">  Account Information </div>
   <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit2" onClick="showDiv(2,'<?= $myProfile->profileResult['ProfileId'];?>');" ><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn"  style="display:none;" id="update2" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','b','p',document.getElementById('txtLogin').value,document.getElementById('createdBy').value,'','','','','','','','','','','','','','',''); updateNew(2);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" style="display:none;" id="cancel2" onClick="updateNew(2);" > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" /></div></div>
      </div>
   <div class="prof_menu_in" id="view2">
<div style="height:30px;"> <div class="prof_width_i">
 <div class="search_24_head">Login ID</div>
 <div class="search_24"><?= $myProfile->profileResult['LoginId'];?> </div>
 <div class="search_24_head">Created by </div>
 <div class="search_24"> <?= $myProfile->profileResult['CreatedBy'];?>  </div>
 </div>
 </div>
   </div>
      <!--////////////////Start Accound Information Div////////////////-->
		<div class="prof_menu_in" id="editview2" style="display:none;">
		<div style="height:40px;"></div>
		</div>
   <!--////////////////end Accound Information Div////////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:146px;">  Personal Information  </div>
  <div  class="prof_h_button"><div class="prof_edit_btn" id="edit3" onClick="showDiv(3,'<?= $myProfile->profileResult['ProfileId'];?>'); " style="cursor:pointer;"><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update3" onClick=" updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','c','p',document.getElementById('txtFname').value,document.getElementById('txtMname').value,document.getElementById('txtLname').value,document.getElementById('dobVal').value,document.getElementById('txtAge').value,document.getElementById('txtgen').value,document.getElementById('bloodVal').value,document.getElementById('martialVal').value,document.getElementById('NoofchildrenVal').value,document.getElementById('citizenVal').value,'','','','','','','',''); updateNew(3);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" style="display:none;" id="cancel3" onClick="updateNew(3);"> <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" /></div></div>
      </div>
   <div class="prof_menu_in" id="view3">
   <div style="height:130px;" > <div class="prof_width_i">
 <div class="search_24_head">Name </div>
 <div class="search_24"><?= $myProfile->profileResult['FirstName']." ".$myProfile->profileResult['MiddleName']." <br>".$myProfile->profileResult['LastName'];?> </div>
 <div class="search_24_head">Citizenship</div>
 <div class="search_24"><?= $myProfile->profileResult['Citizenchip'];?></div>
 </div>
   <div class="search_line"> </div> 
   <div class="prof_width_i">
 <div class="search_24_head">Date of Birth </div>
 <div class="search_24"><?= $myProfile->profileResult['DOB'];?> </div>
 <div class="search_24_head">Age</div>
 <div class="search_24"><?= $myProfile->profileResult['Age'];?> </div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="search_24_head">Gender</div>
 <? if($myProfile->profileResult['Gender']=='M'){$stat="Male";}else if($myProfile->profileResult['Gender']=='F'){$stat="Female";}else{$stat="";} ?>
 <div class="search_24"><?= $stat;?></div>
 <div class="search_24_head">Blood group </div>
 <div class="search_24"> <?= $myProfile->profileResult['BloodGroup'];?> </div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="search_24_head">Marital Status </div>
 <div class="search_24"><?= $myProfile->profileResult['MaritialStatus'];?></div>
 <div class="search_24_head">No. of Children </div>
 <div class="search_24"><?= $myProfile->profileResult['NoofChildren'];?></div>
 </div>
 </div>
   </div>
    <!--/////Personel Information Div Start/////////////-->
	<div class="prof_menu_in" id="editview3" style="height:inherit;display:none">
	<div style="height:200px;"> 
	<div class="search_line"> </div><div class="search_line"> </div>
	<div class="search_line"> </div><div class="search_line"> </div>
	</div>
	</div>
   <!--/////Personel Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:160px;">  Physical  Information </div>
   <div  class="prof_h_button"><div  class="prof_edit_btn" id="edit4" onClick="showDiv(4,'<?= $myProfile->profileResult['ProfileId'];?>');" style="cursor:pointer;" ><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update4" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','d','p',document.getElementById('RBtnVal').value,document.getElementById('RBtnVal2').value,document.getElementById('heightVal').value,document.getElementById('weightVal').value,'','','','','','','','','','','','','',''); updateNew(4);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" > <img src="images/prof_cancel_btn.gif" width="58" height="17" style="display:none;cursor:pointer;" id="cancel4" onClick="updateNew(4);" /></div></div>
      </div>
	  <div class="prof_menu_in" id="view4">
<div style="height:60px;"> <div class="prof_width_i">
 <div class="search_24_head">Body Type </div>
 <div class="search_24"><?= $myProfile->profileResult['BodyType'];?></div>
 <div class="search_24_head">Complexion</div>
 <div class="search_24"><?= $myProfile->profileResult['Complaexion'];?></div>
 </div>
  <div class="search_line"> </div> 
  <div class="prof_width_i">
 <div class="search_24_head">Height</div>
 <div class="search_24"><?= $myProfile->profileResult['Height'];?></div>
 <div class="search_24_head">Weight</div>
 <div class="search_24"><?= $myProfile->profileResult['Weight'];?></div>
 </div>
 </div>
   </div>
 <!--/////Physical Information Div Start/////////////-->  
   <div class="prof_menu_in" id="editview4" style="display:none; height:inherit;">
<div style="height:100px;">
 </div>
</div>
<?php
global $countryValue;
$country=explode('|',$countryValue);
$key = array_search($myProfile->profileResult['ResidingCountry'], $country);
?>
 <!--/////Physical Information Div End/////////////-->
<div class="prof_h_b"> <div class="prof_head_i" style="width:140px;">  Contact   Information </div> 
   <div  class="prof_h_button"><div  class="prof_edit_btn" id="edit5" style="cursor:pointer;" onClick="showDiv(5,'<?= $myProfile->profileResult['ProfileId'];?>'); getLocation('','<?= $key ?>','<?= $myProfile->profileResult['State'];?>','statediv','myProfile','editState','');" ><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;cursor:pointer;" id="update5" onClick="gethdValue('ddlstate','stateVal'); updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','e','p',document.getElementById('txtMobile').value,document.getElementById('txtEmail').value,document.getElementById('txtaddress').value,document.getElementById('countryVal').value,document.getElementById('stateVal').value,document.getElementById('txtCity').value,document.getElementById('txtpincode').value,'','','','','','','','','','');updateNew(5);" > <img src="images/prof_upd_btn.gif"/></div><div class="prof_cancel_btn" > <img src="images/prof_cancel_btn.gif" width="58" height="17" style="display:none;" id="cancel5" onClick="updateNew(5);" /></div></div>
      </div>
   <div class="prof_menu_in" id="view5">
<div style="height:160px;"> <div class="prof_width_i">
	<div class="search_24_head">Phone No. </div>
	<div class="search_24"><?= $myProfile->profileResult['Tele_country'] ?> <?= $myProfile->profileResult['Tee_mobile'];?></div>
	<div class="search_16_head" style="width:8%;">E-mail</div>
	<div class="search_31" style="width:38%;"><?= $myProfile->profileResult['EmailId'];?></div>
	</div>
	<div class="search_line"> </div> 
	<div class="prof_width_i" style="height:40px;">
	<div class="search_24_head">Address</div> <div class="search_48" style="width:70%; height:50px;"><?= $myProfile->profileResult['Address'];?></div>
	</div>
 <div class="search_line"> </div>
  <div class="prof_width_i">
 <div class="search_24_head">Residing Country </div>
 <div class="search_24"><?= $myProfile->profileResult['ResidingCountry'];?></div>
 <div class="search_24_head">State/Province </div>
 <div class="search_24"><?= $myProfile->profileResult['State'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="search_24_head">City</div>
 <div class="search_24"><?= $myProfile->profileResult['City'];?></div>
 <div class="search_24_head">Zip/Pincode</div>
 <div class="search_24"><?= $myProfile->profileResult['Zip'];?></div>
 </div>
 </div>
</div>
<div class="prof_menu_in" id="editview5" style="display:none;height:170px;">
<div style="height:200px;">
</div>
</div>
 <!--/////Contact Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:228px;">  Religion & Community Information </div>
   <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit6" onClick="showDiv(6,'<?= $myProfile->profileResult['ProfileId'];?>');FillCommunity('ddlReligion','ddlCommunity');ddl_disable('ddlReligion','ddlCommunity','communityError');"><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update6" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','f','p',document.getElementById('religionVal').value,document.getElementById('communityVal').value,document.getElementById('txtCaste').value,'','','','','','','','','','','','','',''); updateNew(6);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;display:none;" width="58" height="17" id="cancel6" onClick="updateNew(6);"/></div></div>
      </div>
   <div class="prof_menu_in" id="view6">
<div style="height:60px;">
<div class="prof_width_i">
 <div class="search_24_head">Religion</div>
 <div class="search_24"><?= $myProfile->profileResult['Religion'];?></div>
 <div class="search_24_head">Division/Caste</div>
 <div class="search_24"><?= $myProfile->profileResult['CastDivision'];?></div>
</div>
  <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="search_24_head">Sub Caste </div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['Subcaste'];?></div>
 </div>
</div>
   </div>
<!--/////Religion Information Div Start/////////////-->
   <div class="prof_menu_in" id="editview6" style="display:none;">
<div style="height:65px;"> </div>
   </div>
   <!--/////Religion Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:160px;">  Horoscope Information  </div>
   <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit7" onClick="showDiv(7,'<?= $myProfile->profileResult['ProfileId'];?>');"><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update7" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','g','p',document.getElementById('txtgrm').value,document.getElementById('starVal').value,document.getElementById('raasiVal').value,document.getElementById('RBtnVal33').value,'','','','','','','','','','','','',''); updateNew(7);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn"  style="display:none;" id="cancel7" > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17"  onclick="updateNew(7);"/></div></div>
      </div>
   <div class="prof_menu_in" id="view7">
<div style="height:60px;"> <div class="prof_width_i">
 <div class="search_24_head">
Gothra (m)</div>
 <div class="search_24"><?= $myProfile->profileResult['Gothram'];?></div>
 <div class="search_24_head">
Star</div>
 <div class="search_24"><?= $myProfile->profileResult['Star'];?></div>
 </div>
<div class="search_line"> </div> 
  <div class="prof_width_i">
 <div class="search_24_head">Raasi/Moon Sign </div>
 <div class="search_24"><?= $myProfile->profileResult['Raasi'];?></div>
 <div class="search_24_head">Kuja Dhosam</div>
 <div class="search_24"><?= $myProfile->profileResult['KujaDhosam'];?></div>
 </div>
</div>
   </div>
   <!--/////Horoscope Information Div Start/////////////-->
   <div class="prof_menu_in" id="editview7" style="display:none">
<div style="height:60px;">
</div>
 </div>
 <!--/////Horoscope Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:270px;">Educational &amp; Professional    Information </div>
   <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit8" onClick="showDiv(8,'<?= $myProfile->profileResult['ProfileId'];?>');FillQualification('ddle_category','ddle_qual'); Edu('ddle_category','ddle_qual','qualError');"><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update8" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','h','p',document.getElementById('eduVal').value,document.getElementById('qualVal').value,document.getElementById('occVal').value,document.getElementById('empVal').value,document.getElementById('incomeVal').value,document.getElementById('txtincome').value,'','','','','','','','','','',''); updateNew(8);"> <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn"  style="display:none;" id="cancel8"  > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" onClick="updateNew(8);"></div></div>
      </div>
   <div class="prof_menu_in" id="view8">
<div style="height:100px;"> <div class="prof_width_i" style="height:30px;">
 <div class="search_24_head">Education Category</div>
 <div class="search_48"><?= $myProfile->profileResult['EducationCat'];?></div>
 </div>
<div class="search_line"> </div> 
  <div class="prof_width_i">
 <div class="search_24_head">Qualification</div>
 <div class="search_24"><?= $myProfile->profileResult['EducationQual'];?></div>
 <div class="search_24_head">Occupation</div>
 <div class="search_24"><?= $myProfile->profileResult['Occupation'];?></div>
 </div>
  <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="search_24_head">Employment Type</div>
 <div class="search_24"><?= $myProfile->profileResult['Employementtype'];?></div>
 <div class="search_24_head">Annual Income </div>
 <div class="search_24"><?= $myProfile->profileResult['AnnCurrency']." ".$myProfile->profileResult['Salary'];?></div>
 </div>
</div>
   </div>
   <!--/////Educational Information Div End/////////////-->
   <div class="prof_menu_in" id="editview8" style="display:none">
<div style="height:270px;"> 
</div>
</div>
<!--/////Educational Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:75px;">  Habitation  </div>
  <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit9" onClick="showDiv(9,'<?= $myProfile->profileResult['ProfileId'];?>');" ><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update9" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','i','p',document.getElementById('foodVal').value,document.getElementById('smokeVal').value,document.getElementById('liquorVal').value,'','','','','','','','','','','','','',''); updateNew(9);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" style="display:none;" id="cancel9" > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" onClick="updateNew(9);"/></div></div></div>
   
   <div class="prof_menu_in" id="view9" >
<div style="height:60px;"> <div class="prof_width_i">
 <div class="search_24_head">Food</div>
 <div class="search_24"><?= $myProfile->profileResult['Food'];?></div>
 <div class="search_24_head">Smoking</div>
 <div class="search_24"> <?= $myProfile->profileResult['Smoking'];?> </div>
 </div>
  <div class="search_line"> </div> 
  <div class="prof_width_i">
 <div class="search_24_head">Liquor</div>
 <div class="search_48"><?= $myProfile->profileResult['Drinking'];?></div>
  </div>
 </div>


   </div>
   <!--/////Habitation Information Div Start/////////////-->
   <div class="prof_menu_in" id="editview9" style="display:none">
<div style="height:80px;"> 
</div>
</div>
<!--/////habitation Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:136px;">  Family Background </div>
  <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit10" onClick="showDiv(10,'<?= $myProfile->profileResult['ProfileId'];?>');" ><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update10" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','j','F',document.getElementById('familyVal').value,document.getElementById('ftypeVal').value,document.getElementById('fstatusVal').value,document.getElementById('fOccVal').value,document.getElementById('ddlMOVal').value,document.getElementById('Brothers').value,document.getElementById('Sisters').value,document.getElementById('brothers_married').value,document.getElementById('sister_married').value,document.getElementById('txtfamily').value,'','','','','','',''); updateNew(10);"> <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" style="display:none;" id="cancel10" > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" onClick="updateNew(10);"/></div></div>
         </div>
     <div class="prof_menu_in" id="view10" >
  <div style="height:260px;"> <div class="prof_width_i">
 <div class="search_24_head">Family Value</div>
 <div class="search_24"><?= $myProfile->profileResult['Familyvalue'];?></div>
 <div class="search_24_head">Family Type</div>
 <div class="search_24"><?= $myProfile->profileResult['Familytype'];?></div>
 </div>
 
   <div class="search_line"> </div> 
   <div class="prof_width_i">
 <div class="search_24_head">Family Status</div>
 <div class="search_24"><?= $myProfile->profileResult['Familystatus'];?></div>
 <div class="search_24_head">Father's Occupation </div>
 <div class="search_24"><?= $myProfile->profileResult['Fatheroccupation'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="search_24_head">Mother's Occupation </div>
 <div class="search_24"><?= $myProfile->profileResult['Motheroccupation'];?></div>
 <div class="search_24_head">No. of Brother's</div>
 <div class="search_24"><?= $myProfile->profileResult['Brothers'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i" style="height:37px;">
 <div class="search_24_head">No. of Sister's</div>
 <div class="search_24"><?= $myProfile->profileResult['Sisters'];?></div>
 <div class="search_24_head">No. of Brorther's Married</div>
 <div class="search_24"><?= $myProfile->profileResult['Brothersmarried'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i" style="height:37px;">
 <div class="search_24_head">No. of Sister's Married</div>
 <div class="search_48"><?= $myProfile->profileResult['Sistersmarried'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i" style="height:60px;">
 <div class="search_24_head">About Family </div> 
 <div class="search_48" style="height:60px;"><?= $myProfile->profileResult['Aboutfamily'];?></div>
 </div>
 </div>
   </div>
   <!--/////Family Information Div End/////////////-->
   <div class="prof_menu_in"  id="editview10" style="display:none">
  <div style="height:260px;">
 </div>
   </div>
   <!--/////Family Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:162px;">Better-Half  Information </div>
   <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit11" onClick="showDiv(11,'<?= $myProfile->profileResult['ProfileId'];?>');  getLocation('','<?= $key ?>','<?= $myProfile->profileResult['State'];?>','statedivv','myProfile','editState','');" ><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update11" onClick="gethdValue('ddlstate','stateVal'); updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','k','pp',document.getElementById('txtage1').value,document.getElementById('txtage2').value,document.getElementById('ddlPreferVal').value,document.getElementById('ddlmaritalVal').value,document.getElementById('ddlReligionVal').value,document.getElementById('ddlCommunityVal').value,document.getElementById('txtCaste').value,document.getElementById('ddlCategoryVal').value,document.getElementById('ddloccVal').value,document.getElementById('ddlEmpVal').value,document.getElementById('ddlCitizenVal').value,document.getElementById('ddlCountryVal').value,document.getElementById('stateVal').value,document.getElementById('txtCity').value,document.getElementById('betterHalf').value,document.getElementById('ddlphysicalVal').value,document.getElementById('feetVal').value,document.getElementById('feetValTo').value,document.getElementById('pManglik').value); updateNew(11);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" style="display:none;" id="cancel11" > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" onClick="updateNew(11);"/></div></div>
      </div>
 <div class="prof_menu_in" id="view11" >
<? if($myProfile->numst3==0){ ?>	
<div style="height:100px;">
<div class="prof_width_i">
<div class="search_24_head">&nbsp;</div>
<div class="search_48" style="width:72%;"> <strong>Till You didnt complete your partner preference .....<br /><br />Please Update....<a href="register.php" style="text-decoration:none; color:#FF6633; cursor:pointer;">Complete Profile</a></strong></div>
</div>
</div>
<? } else { ?>
	 
<div style=" height:650px;">
<div class="prof_width_i">
<div class="search_24_head">Age</div>
<div class="search_24">
	<strong>From: </strong><?= $myProfile->profileResult['pAgeFrom'];?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>To: </strong><?= $myProfile->profileResult['pAgeTO'];?></div>
</div>
 <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="search_24_head">Mother Tongue</div>
 <div class="search_24"><?= $myProfile->profileResult['pMotherTonque'];?></div>
 <div class="search_24_head"><strong>Marital Status</strong></div>
 <div class="search_24"><?= $myProfile->profileResult['pMaritialStatus'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_width_i">
 <div class="prof_in_head">Religion &amp; Community</div>
 </div>
 <div class="prof_width_i">
 <div class="search_24_head">Religion</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pReligion'];?></div>
 </div>
  <div class="prof_width_i">
 <div class="search_24_head">Community</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pCastDivision'];?></div>
 </div>
  <div class="prof_width_i">
 <div class="search_24_head">Sub-Caste</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pSubcaste'];?></div>
 </div>
  <div class="search_line"> </div>
  <div class="prof_in_head">Education</div>
  <div class="prof_width_i">
 <div class="search_24_head">Education</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pEducationCat'];?></div>
 </div>
  <div class="search_line"> </div>
  <div class="prof_in_head">Occupation</div>
  <div class="prof_width_i">
 <div class="search_24_head">Occupation</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pOccupation'];?></div>
 </div>
  <div class="prof_width_i">
 <div class="search_24_head">Employment Type</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pEmployementtype'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_in_head">Nationality</div>
 <div class="prof_width_i">
 <div class="search_24_head">Citizenship</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pCitizenchip'];?></div>
 </div>
 <div class="prof_width_i">
 <div class="search_24_head">Residing Country </div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pResidingCountry'];?></div>
 </div>
 <div class="prof_width_i">
 <div class="search_24_head">Residing State </div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pState'];?></div>
 </div>
 <div class="prof_width_i">
 <div class="search_24_head">Residing City </div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pCity'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_in_head">Habits</div>
 <div class="prof_width_i">
 <div class="search_24_head">Food</div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pFood'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_in_head">Status &amp; Height </div>
 <div class="prof_width_i">
 <div class="search_24_head">Physical Status </div>
 <div class="search_48" style="width:72%;"><?= $myProfile->profileResult['pPhysicalStatus'];?></div>
 </div>
 <div class="prof_width_i">
 <div class="search_24_head">Height</div>
 <div class="search_48" style="width:72%;"><strong>From: </strong><?= $myProfile->profileResult['pHeightFrom'];?> &nbsp;&nbsp;&nbsp;&nbsp;<strong>To: </strong><?= $myProfile->profileResult['pHeightTo'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_in_head">Chevaai/Kuja/Mangalik Dosham</div>
 <div class="prof_width_i">
 <div class="search_48"><?= $myProfile->profileResult['pKujaDhosam'];?></div>
 <div class="search_48"></div>
 </div>
   </div>
<? } ?>   
</div>
<!--/////better-half Information Div End/////////////-->
<div class="prof_menu_in" id="editview11" style="display:none">
	<div style="height:1500px;"></div>
</div>
<!--/////Better Information Div End/////////////-->
   <div class="prof_h_b"> <div class="prof_head_i" style="width:100px;">About Partner  </div>
   <div  class="prof_h_button"><div style="cursor:pointer;" class="prof_edit_btn" id="edit12" onClick="showDiv(12,'<?= $myProfile->profileResult['ProfileId'];?>');" ><img src="images/prof_edit_btn.gif" width="42" height="17" border="0" /></div> <div class="prof_update_btn" style="display:none;" id="update12" onClick="updateDiv('<?= $myProfile->profileResult['ProfileId'];?>','l','pp',document.getElementById('txtabout').value,'','','','','','','','','','','','','','','',''); updateNew(12);" > <img src="images/prof_upd_btn.gif" style="cursor:pointer;" /></div><div class="prof_cancel_btn" style="display:none;" id="cancel12" > <img src="images/prof_cancel_btn.gif" style="cursor:pointer;" width="58" height="17" onClick="updateNew(12);"/></div></div>
      </div>
   <div class="prof_menu_in" id="view12" >
   <div style="height:70px;"><?= $myProfile->profileResult['pAboutPartner'];?></div>
   </div>
   <div class="prof_menu_in" id="editview12" style="display:none">
   <div style="height:70px;">    
   </div>
   </div>
   <!--/////About Partner Information Div End/////////////-->
   <div class="prof_menu_b_a">
   <div style="height:15px;text-decoration:none;" align="right"><a href="myProfile.php?page=edit&pid=<?= $myProfile->profileResult['ProfileId'];?>" ><img src="images/prof_top_arrow.gif" width="46" height="21" style="border:0px"/></a></div>
   </div>
   <br />
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
</div>
</td>
<td width="241" valign="top">
<div id="rightadd" style="width:189px; z-index:1002; float:right;" >
<?php //include("advertisement/add_right.php");  ?>
<br clear="all"/>
</div>
</td>
</tr>
</table>
</form>
</body>
</html>