<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MarryBanjara - View Photo</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/light_box.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.style1 {color: #00CCFF}
.gallerycontainer{
position: relative;
height: 300px;
width: 300px;
} 
 </style>
<script type="text/javascript" language="javascript" src="js/general.js"></script>
</head>
<body onload="image_display('member_image/<?=$myProfile->img_data[0][image_small];?>');">
<div  class="body" style=" width:682px;">
<div id="leftadd"> </div>
<div style="width:600px; float:left; position:relative;"> 
<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
 <td width="25"><span style="width:25px; height:25px; float:left;"><img src="images/lightbox_l_t.gif" /></span></td>
    <td width="544" background="images/lightbox_top.gif">&nbsp;</td>
    <td width="31"><span style="width:25px; height:25px; float:left;"><img src="images/lightbox_r_t.gif" /></span></td>
  </tr>
  <tr>
    <td background="images/lightbox_left.gif"></td>
    <td>
   <div style=" padding:5px; font-family:Tahoma; font-size:11px; height: inherit; width:75; height:inherit; ">
  <!--<div class="fleft"><img src="../images/logo1.jpg" ></div>-->
   <div class="width">
	 <div class="form_100_head" style="height:20px;"><b><span class="style1"><?=$myProfile->proresult[FirstName]." ".$myProfile->proresult[MiddleName]." ".$myProfile->proresult[LastName]."(".$myProfile->proresult[ProfileId].")"?></span></b></font></div>
    </div>
    <div class="width" style="padding-top:6px;"> <div  id="line" style="height:5px;"> </div> </div>
    <div class="width" style="height:465px; ">
	<div  style="height:18px; width:100px; float:left; padding-left:8px; height: inherit;">
<!-- image dispaly-->
	 <? for($a=0; $a <$myProfile->imgnum; $a++) { ?>
			<div style="padding:2px; border:0px solid #E6E6E6; width:80px; cursor:pointer;" align="center" class="thumbnail" >
			<img src="member_image/<?=$myProfile->img_data[$a][image_thumb];?>" style="cursor:pointer;" id="image1" onclick="image_display('member_image/<?=$myProfile->img_data[$a][image_small];?>')" /></div>
	<? } ?>
 </div>
	<div id="divloader" style="float:left;height:20px; width:20%;display:'none'; padding-left:8px;"></div>
	<div style="height:400px; width:410px; float:left; padding:5px;" ><img src="" id="div_disp" /></div>
    </div>
	<div class="width" style="padding-top:6px;"> <div  id="line" style="height:5px;"> </div> </div>
	</td>
    <td background="images/lightbox_right.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><span style="width:25px; height:25px; float:left;"><img src="images/lightbox_l_b.gif" width="25" height="25" /></span></td>
    <td background="images/lightbox_bottom.gif">&nbsp;</td>
    <td><span style="width:25px; height:25px; float:left;"><img src="images/lightbox_r_b.gif" width="25" height="25" /></span></td>
  </tr>
</table>
</div>
</div>
<div class="fright" style="margin-right:15px;width:160px; float:left;"><center><iframe frameborder=0 marginheight=0 marginwidth=0 scrolling="no" allowTransparency="true" width=160 height=250></iframe></center></div>
</body>
</html>