<head>
<style type="text/css">
<!--
.style2 {color: #a80b21}
.li {color:#000000}
-->
</style>

</head>
<body onLoad="timedCount();">
<br /><table width="809" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="604" valign="top"> 
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_l_t.gif" width="25" height="25" /></span></td>
    <td width="550" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="25"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" width="25" height="25" /></span></td>
  </tr>
  <tr>
    <td background="./images/lightbox_left.gif"></td>
    <td>
	<div style=" width:250px; height:26px; " >
    <div style="float:left; width:6px; height:22px;"><img src="./images/fr_left.gif" /> </div>
    <div style="float:left; width:auto; height:22px; padding-top:4px;background-image:url(./images/fr_center.gif); font-family:Tahoma; font-size:11px; font-weight:bold; color:#fff;">My Matches</div>
    <div style="float:left; width:6px; "><img src="./images/fr_right.gif" /> </div>
  </div>
<div style="border:1px green solid; padding:0px; font-family:Tahoma; font-size:11px; height:inherit; width:510px; padding:20px; color:#333333; margin-bottom:1.5px; ">



<div  style="width:200px"><span class="style2" ><strong>Personal Details</strong></span></div><br/>
  
<div align="justify" style="height:100px; border:1px solid #EBF4F5;">
<div style="width:380px; float:left; padding-left:15px;">
	<div class="sch_prof">
		<span class="prof-head">
		<?= $myhome->myhomeResult['FirstName']." ".$myhome->myhomeResult['MiddleName']." ".$myhome->myhomeResult['LastName'];?>
		(<?= $myhome->myhomeResult['ProfileId'];?>)
		</span><br />
		<span class="prof_text">
			<?= $myhome->myhomeResult['MaritialStatus'];?> | <?= $myhome->myhomeResult['Age'];?> yrs,<?= $myhome->myhomeResult['Height'];?> 
			|<?= $myhome->myhomeResult['Religion'];?>: <?= $myhome->myhomeResult['CastDivision'];?><br />
			<? if($myhome->myhomeResult['Subcaste']){ ?>Subcaste: <?= $myhome->myhomeResult['Subcaste'];?> | <? } ?>
			<? if($myhome->myhomeResult['State']){ ?><?= $myhome->myhomeResult['Star'];?> :  <?= $myhome->myhomeResult['Raasi'];?>|   <br />
			<?= $myhome->myhomeResult['City'];?>, <?= $myhome->myhomeResult['State'];?>, <?= $myhome->myhomeResult['ResidingCountry'];?>  
			|  <?= $myhome->myhomeResult['EducationQual'];?> | <?= $myhome->myhomeResult['EducationSpecialization']; } else { echo $myhome->myhomeResult['ResidingCountry']; }?>  <br />
		</span>
		</div>
	</div>

	<div style="width:90px;float:left;" align="right">
	
	
		<? if($myhome->imgnum != 0){ ?>

		<a href="managephoto.php">
			<img src="member_image/<?= $myhome->img_data[0][image_thumb]; ?>" style="border:1px solid  #CCCCCC;"/></a>
		<? } else { ?>							
		<? if($myhome->myhomeResult['Gender'] == M){?>
		<a href="managephoto.php">
		<img src="images/boy_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /></a><? }else{?>
		<a href="managephoto.php">
		<img src="images/lady_img.jpg" width="85" height="87" style="border:1px solid  #CCCCCC;" /></a><? } ?>
		<? } ?>

	<div style="float:right; width:95px;" align="center"><strong><a href="managephoto.php" style="text-decoration:none; color:#FF0000">
	<? if($myhome->imgnum != 0){ ?>
		Manage Photo
	<? } else { ?>
		Add Photo
	<? } ?>
	</a></strong></div>
	
	</div>
</div><br/>

<div  style="width:200px"><span class="style2" ><strong>Personal Settings</strong></span></div><br/>

<div style="width:550px; height:140px;" >
<div align="justify" style=" width:250px; height:130px; border:1px solid #EBF4F5; float:left; margin-right:15px; background-image:url(./images/blue_bg.gif); background-repeat: repeat-x; ">
<div style="  padding:10px 0px 10px 5px;width:180px;"  ><font  style="line-height: 13px;"><b>Profile Settings</b></font></div>

<table width="241">
<tr><td height="30" ><img src="./images/InboundEmail.gif">&nbsp;&nbsp;&nbsp;</td>
<td height="30"><a href="register.php" style="text-decoration:none; color:#FF6633; cursor:pointer;">Complete Registration </a> </td>
</tr>
<tr><td height="30"><img src="./images/EmailMan.gif"  /></td>
<td height="30"><a href="javascript:void(0)" style="text-decoration:none; color:#FF6633; cursor:pointer;" onClick="document.getElementById('fade').style.display='block';showmain('5');">Change Password</a></td>
</tr>
<tr><td height="30"><img src="./images/Backups.gif" /></td>
<td height="30"><a onClick="javascript:confrminactive('Want to Deactivate Your Profile ?','deactive.php')" style="text-decoration:none; color:#FF6633; cursor:pointer;">Deactivate Profile</a></td></tr>
</table>
 
    </div>

	<div align="justify" style=" width:250px; height:130px;  border:1px solid #EBF4F5; float:left; margin-right:15px; background-image:url(./images/ligt_color_bg.gif); background-repeat: repeat-x; ">
	<div style="  padding: 10px 0px 10px 5px;width:180px; "  ><font  style="line-height: 13px;"><b>Enhance Profile</b></font></div>
	<table width="239">
	  <tr>
		<td height="30"><img src="./images/InboundEmail.gif" />&nbsp;&nbsp;&nbsp;</td>
		<td height="30"><a href="managephoto.php" style="text-decoration:none; color:#FF6633; cursor:pointer;">
			<? if($myhome->imgnum != 0){ echo "Manage Photo (s)"; } else { echo	"Add Photo"; } ?>
		</a></td>
	  </tr>
	  <tr>
		<td height="30"><img src="./images/EmailMan.gif"></td>
		<td height="30"><a style="text-decoration:none; color:#FF6633; cursor:pointer;">Horoscope</a></td></tr>
        <!--
        <td height="30"><img src="./images/saveSearch.gif"/></td>
        <td height="30"><a  href="mysearch.php?session=<?= $myhome->myhomeResult['ProfileId'];?>" style="text-decoration:none; color:#FF6633; cursor:pointer;">Shortlisted Profiles</a></td></tr>
        -->
        
         <td height="30"><img src="./images/saveSearch.gif"/></td>       
        <td height="30"><a  href="searchrules.php?session=<?= $myhome->myhomeResult['ProfileId'];?>" style="text-decoration:none; color:#FF6633; cursor:pointer;">Saved Searches</a></td></tr>
	</table>
	</div>
	</div>
<br>
<div  style="width:200px"><span class="style2" ><strong>Personalised Messages</strong></span></div><br/>
  
<div style="width:550px; height:150px;" >
<div align="justify" style=" width:250px; height:140px; border:1px solid #EBF4F5; float:left; margin-right:15px; background-image:url(./images/blue_bg.gif); background-repeat: repeat-x; ">
<div style="  padding:10px 0px 10px 5px;width:180px;"  ><font  style="line-height: 13px;"><b>Received</b></font></div>

<table width="241">
<tr><td height="30" ><img src="./images/InboundEmail.gif">&nbsp;&nbsp;&nbsp;</td>
<td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">New Messages</a>  </td></tr>
<tr><td height="30"><img src="./images/EmailMan.gif"  /></td>
<td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose&status=RE" onClick="mainTab('two','one','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">Read Messages</a></td></tr>
<tr><td height="30"><img src="./images/Backups.gif" /></td>
<td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">
Rejected messages</a></td></tr>
</table>
 
    </div>
	
	
	 
	  <div align="justify" style=" width:250px; height:140px;  border:1px solid #EBF4F5; float:left; margin-right:15px; background-image:url(./images/ligt_color_bg.gif); background-repeat: repeat-x; ">
        <div style="  padding: 10px 0px 10px 5px;width:180px; "  ><font  style="line-height: 13px;">
              <b>Sent</b></font></div>
	    <table width="239">
          <tr>
            <td height="30"><img src="./images/InboundEmail.gif" />&nbsp;&nbsp;&nbsp;</td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('two','one','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">New Messages</a></td></tr>
          <tr>
            <td height="30"><img src="./images/EmailMan.gif"></td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">
Rejected Messages</a></td></tr>
        </table>
	    </div>
</div>	 
<div style="width:550px; height:190px;" >
<div  style="width:200px"><span class="style2" ><strong>Express Interests</strong></span></div><br/>
  <div style="width:550px;">
	  <div align="justify" style=" width:250px; height:180px; border:1px solid #EBF4F5; float:left; margin-right:15px; background-image:url(./images/blue_bg.gif); background-repeat: repeat-x;  ">
        <div style="  padding: 10px 0px 10px 5px;width:180px; "  ><font  style="line-height: 13px;">
              <b>Received</b></font></div>
	    <table width="240">
          <tr>
            <td height="30" ><img src="./images/InboundEmail.gif" />&nbsp;&nbsp;&nbsp;</td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">New Interests</a></td></tr>
          <tr>
            <td height="30"><img src="./images/EmailMan.gif"></td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">Read Interests</a></td></tr>
          <tr>
            <td height="30"><img src="./images/Backups.gif" /></td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">
Accepted Interests</a></td></tr>
          <tr>
            <td height="30"><img src="./images/Releases.gif" /></td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">
Declined Interests</a></td></tr>
        </table>
	    </div>

	 <div align="justify" style=" width:250px; height:180px;  border:1px solid #EBF4F5; float:left; margin-right:15px; background-image:url(./images/ligt_color_bg.gif); background-repeat: repeat-x; ">
        <div style="  padding: 10px 0px 10px 5px;width:180px; "  ><font  style="line-height: 13px;">
              <b>Sent</b></font></div>
	    <table width="241">
          <tr>
            <td height="30" ><img src="./images/InboundEmail.gif" />&nbsp;&nbsp;&nbsp;</td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">New Interests</a></td></tr>
          <tr>
            <td height="30"><img src="./images/EmailMan.gif"></td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">Accepted Interests</a></td></tr>
          <tr>
            <td height="30"><img src="./images/Backups.gif" /></td>
            <td height="30"> <a href="./myMessages.php?id=<?=$_SESSION['ProfileId'];?>&action=compose" onClick="mainTab('one','two','three','schmenu_active','schmenu');" style="text-decoration:none;cursor:pointer;color:#FF6633">Declined Interests</a></td></tr>
        </table>
	    </div>
	</div>
	</div>
    
    
    
    
<div style="width:550px; height:190px;" >
<div  style="width:200px"><span class="style2" ><strong>Payment Details</strong></span></div><br/>
  <div style="width:550px;">
	  <div align="justify" style=" width:250px; height:180px; border:1px solid #EBF4F5; float:left; margin-right:15px; background-image:url(./images/blue_bg.gif); background-repeat: repeat-x;  ">
      <!--
        <div style="  padding: 10px 0px 10px 5px;width:180px; "  ><font  style="line-height: 13px;">
              <b>Received</b></font></div>
       -->
	    <table width="240">
          <tr>
            <td height="30"><img src="./images/EmailMan.gif"></td>
		<td height="30"><a  href="myaccountprofiles.php"  style="text-decoration:none; color:#FF6633; cursor:pointer;"> Account Details</a></td>
        </tr>
        </table>
	    </div>

	 <div align="justify" style=" width:250px; height:180px;   float:left; margin-right:15px;">
        
	    </div>
	</div>
	</div>    
    
    
    
    
    
    
    
    
    
<br>	
	
	
</td>
    <td background="./images/lightbox_right.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_l_b.gif" width="25" height="25" /></span></td>
    <td background="./images/lightbox_bottom.gif">&nbsp;</td>
    <td><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_b.gif" width="25" height="25" /></span></td>
  </tr>
</table>
</td>
<td width="205" valign="top">
<div id="rightadd" style="width:189px; z-index:1002; float:right;" >Right Add
<?php //include("advertisement/add_right.php");  ?>
<br clear="all"/>
</div>
</td>
</tr>
</table>
</body>