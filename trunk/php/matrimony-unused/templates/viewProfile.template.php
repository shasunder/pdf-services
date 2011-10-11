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
<br /><table  border="0" cellpadding="0" cellspacing="0" >
<tr>
<td  valign="top"> 
<div style="padding-left:50px">
<table width="600px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="" /></span></td>
    <td width="554" >&nbsp;</td>
    <td width="31"><span style="width:25px; height:25px; float:left;"><img src="" /></span></td>
  </tr>
  <tr>
    <td ></td>
    <td>
<div  class="sch_menu_t1">
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr">
				  <div class="schmenu_highlight" ><a href="?page=full" class="schmenu_active"> Full Profile </a> </div>
				</div>
				<div class="schmenu_rt" ></div>
				<div class="schmenu_lt" ></div>
				<div class="schmenu_cr">
				  <div class="schmenu" ><? if($myProfile->profileResult['FirstName']){ ?><a href="?page=edit"> Edit Profile </a> <? } else { ?><a href="?page=full"> Edit Profile </a> <? } ?></div>
				</div>
				<div class="schmenu_rt" ></div>
				</div>
<div class="sch_con" > <div class="sch_top">  </div>
  <div style="height:160px;" ><br /> 
   <div  class="sch_box" style="height:150px;">
     <div class="prof_full"  style="height:122px;" >
<? if($myProfile->imgnum != 0){ ?>
<div  class="sch_img" ><a href="imageView.php?pid=<?= $myProfile->profileResult['ProfileId']?>&iv=s" target="_blank" onClick="window.open(this.href,'newwindow','width=600,height=570,scrollbars=no,resize=0');return false;">
	<img src="member_image/<?= $myProfile->img_data[0][image_thumb]; ?>" name="img_0" style="border:1px solid  #CCCCCC;" onMouseOver="document.getElementById('show<?=$j?>').style.display='';" onMouseOut="document.getElementById('show<?=$j?>').style.display='none';"/></a>
</div><input type="hidden" name="txtimgcnt_0" value="1" />
	<div style="position:relative;"> 
<? $browser = get_browser(); if($browser->browser=="IE"){ ?>
    <div style='position:absolute; display:none; z-index:5000;  top:15px;left:0px; width:130px; height:128px; cursor:pointer;' id='show<?= $j;?>'>    
<? }else { ?>
    <div style='position:absolute; display:none; z-index:5000;  top:15px;left:116px; width:130px; height:128px; cursor:pointer;' id='show<?= $j;?>'>
	<!--<div id='show<?= $j;?>' style="position:absolute; display:none; border:2px solid #126569; margin-top:2px;left:390px; width:130px; height:128px; ">-->
<? } ?><img src="member_image/<?=$myProfile->img_data[0][image_thumb];?>" style='border:2px solid #126569;' name="lgt_img_0"/> </div>
	</div>

<? } else { ?>							
		<div  class="sch_img" ><? if($myProfile->profileResult['Gender'] == M){?>
			<img src="images/boy_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? }else{?>
			<img src="images/lady_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /><? } ?>
		</div>
<? } ?>
    <div class="sch_prof">
	<span class="prof-head">
	<?= $myProfile->profileResult['FirstName']." ".$myProfile->profileResult['MiddleName']." ".$myProfile->profileResult['LastName'];?>(<?= $myProfile->profileResult['ProfileId'];?>) </span><span class="prof_text"><br />
     <?= $myProfile->profileResult['Age'];?> yrs,<?= $myProfile->profileResult['Height'];?> | <?= $myProfile->profileResult['CastDivision'];?>  <br />
	 <? if($myProfile->profileResult['City']){ ?>
     <? if($myProfile->profileResult['Subcaste']!=''){ ?>Subcaste: <?= $myProfile->profileResult['Subcaste'];?>| <? } ?>  <?= $myProfile->profileResult['Star'];?>:  <?= $myProfile->profileResult['Raasi'];?> |  <?= $myProfile->profileResult['City'];?>, <?= $myProfile->profileResult['ResidingCountry'];?>  |  <?= $myProfile->profileResult['EducationQual'];?> | <?= $myProfile->profileResult['EducationSpecialization']; } else { echo $myProfile->profileResult['ResidingCountry']; } ?>  <br />
		<!--<div class="search_48" style="width:72%;">
			<strong>Till You didnt complete your Profile .....<br /><br />Please complete step2....
			<a href="register.php" style="text-decoration:none; color:#FF6633; cursor:pointer;">Complete Profile</a></strong></div>-->
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
   <div class="prof_h_b"> <div class="prof_head_i" >  About Me </div> 
   </div>
   <div class="prof_menu_in" id="view1">
   <div style="height:75px; " ><?= $myProfile->profileResult['AboutMe'];?>  </div>
</div>
   <div class="prof_h_b"><div class="prof_head_i" style="width:140px;">  Account Information </div>
    </div>
   <div class="prof_menu_in" id="view2">
<div style="height:40px;"> <div class="prof_width_i">
 <div class="search_24_head">Login ID</div>
 <div class="search_24"><?= $myProfile->profileResult['LoginId'];?> </div>
 <div class="search_24_head">Created by </div>
 <div class="search_24"> <?= $myProfile->profileResult['CreatedBy'];?>  </div>
 </div>
 </div>
   </div>
   <div class="prof_h_b"> <div class="prof_head_i" style="width:146px;">  Personal Information  </div>
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
   <div class="prof_h_b"> <div class="prof_head_i" style="width:140px;">  Physical  Information </div>
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
<?php
global $countryValue;
$country=explode('|',$countryValue);
$key = array_search($myProfile->profileResult['ResidingCountry'], $country);
?>
<div class="prof_h_b"> <div class="prof_head_i" style="width:140px;">  Contact   Information </div> 
   </div>
   <div class="prof_menu_in" id="view5">
<div style="height:150px;">
<div class="prof_width_i">
 <div class="search_24_head">Phone No. </div>
 <div class="search_24"><?= $myProfile->profileResult['Tele_country'] ?> <?= $myProfile->profileResult['Tee_mobile'];?></div>
 <div class="search_16_head" style="width:8%;">E-mail</div>
 <div class="search_31" style="width:38%;"><?= $myProfile->profileResult['EmailId'];?></div>
 </div>
  <div class="search_line"> </div> 
  <div class="prof_width_i" style="height:60px;">
 <div class="search_24_head">Address</div> <div class="search_48" style="width:70%; height:60px;"><?= $myProfile->profileResult['Address'];?></div>
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
 <div class="search_24_head">
   <div>
     <div>City</div>
   </div>
 </div>
 <div class="search_24"><?= $myProfile->profileResult['City'];?></div>
 <div class="search_24_head">Zip/Pincode</div>
 <div class="search_24"><?= $myProfile->profileResult['Zip'];?></div>
 </div>
 </div>
</div>
	<div class="prof_h_b"> <div class="prof_head_i" style="width:228px;">  Religion & Community Information </div></div>
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
   <div class="prof_h_b"> <div class="prof_head_i" style="width:160px;">  Horoscope Information  </div>
    </div>
   <div class="prof_menu_in" id="view7">
<div style="height:70px;"> <div class="prof_width_i">
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
   <div class="prof_h_b"> <div class="prof_head_i" style="width:265px;">Educational &amp; Professional    Information </div>
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
 <div class="search_24"><?= $myProfile->profileResult['AnnCurrency']." ". $myProfile->profileResult['Salary'];?></div>
 </div>
</div>
   </div>
   <div class="prof_h_b"> <div class="prof_head_i" style="width:75px;">  Habitation  </div>
     </div>
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
<div class="prof_h_b"> <div class="prof_head_i" style="width:136px;">  Family Background </div></div>
	<div class="prof_menu_in" id="view10" >
	<div style="height:250px;">
		<div class="prof_width_i">
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
		<div class="prof_width_i" style="height:30px;">
		<div class="search_24_head">No. of Sister's Married</div>
		<div class="search_48"><?= $myProfile->profileResult['Sistersmarried'];?></div>
		</div>
		<div class="search_line"> </div>
		<div class="prof_width_i" style="height:60px;">
		<div class="search_24_head">About Family </div> 
		<div class="search_48" style="width:70%; height:60px;"><?= $myProfile->profileResult['Aboutfamily'];?></div>
		</div>
	</div>
	</div>
<div class="prof_h_b"> <div class="prof_head_i" style="width:162px;">Better-Half Information </div>
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
<div style="height:650px;">
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
  <div class="prof_width_i" style="height:50px;">
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
 <div class="search_48" style="width:70%;"><?= $myProfile->profileResult['pFood'];?></div>
 </div>
 <div class="search_line"> </div>
 <div class="prof_in_head">Status &amp; Height </div>
 <div class="prof_width_i">
 <div class="search_24_head">Physical Status </div>
 <div class="search_48" style="width:70%;"><?= $myProfile->profileResult['pPhysicalStatus'];?></div>
 </div>
 <div class="prof_width_i">
 <div class="search_24_head">Height</div>
 <div class="search_48" style="width:70%;"><strong>From: </strong><?= $myProfile->profileResult['pHeightFrom'];?> &nbsp;&nbsp;&nbsp;&nbsp;<strong>To: </strong><?= $myProfile->profileResult['pHeightTo'];?></div>
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
   <div class="prof_h_b"> <div class="prof_head_i" style="width:100px;">About Partner  </div>
      </div>
   <div class="prof_menu_in" id="view12" >
   <div style="height:80px;"><?= $myProfile->profileResult['pAboutPartner'];?></div>
   </div>
   <div class="prof_menu_b_a">
   <div style="height:15px;text-decoration:none;" align="right"><a href="myProfile.php" ><img src="images/prof_top_arrow.gif" width="46" height="21" style="border:0px"/></a></div>
   </div>
   </div>

  


 </td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td><span style="width:25px; height:25px; float:right;"><img src="" width="25" height="25" /></span></td>
    <td >&nbsp;</td>
    <td><span style="width:25px; height:25px; float:left;"><img src="" width="25" height="25" /></span></td>
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