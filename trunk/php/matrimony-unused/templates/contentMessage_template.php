<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bride& groom </title>
<script type="text/javascript" src="./js/message.js"></script>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body onLoad="timedCount();">
<br /><table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>

<td width="100%" valign="top"> 
<div style="padding-left:50px">
<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="" /></span></td>
    <td width="554" background="">&nbsp;</td>
    <td width="31"><span style="width:25px; height:25px; float:left;"><img src="" /></span></td>
  </tr>
  <tr>
    <td background=""></td>
    <td>

<form name="editProfile">

<input type="hidden" name="int_profile_id" id="int_profile_id" value="<?php echo $_SESSION['ProfileId']?>" />

<div  class="sch_menu_t1">
		<div class="schmenu_lt" ></div>
		<div class="schmenu_cr">
		  <div class="schmenu" id="one" onClick="compose('ajax/messageTab.php','<?=$_SESSION['ProfileId'];?>'); mainTab('one','two','three','schmenu_active','schmenu');">Message</div>
		</div>
		<div class="schmenu_rt" ></div>
		<div class="schmenu_lt" ></div>
		<div class="schmenu_cr">
		  <div class="schmenu" id="two" onClick="compose_interest('ajax/interestTab.php','<?=$_SESSION['ProfileId'];?>'); mainTab('two','one','three','schmenu_active','schmenu');">Interest</div>
		</div>
		<div class="schmenu_rt" ></div>
		<div class="schmenu" id="three" onClick="compose('ajax/messageTab.php','<?=$_SESSION['ProfileId'];?>'); mainTab('three','two','one','schmenu_active','schmenu');"></div>
</div>

	<div class="sch_con" >
		<div class="sch_top"></div>
		<!-- Msg Content 1 Starts here -->
		<div id="msg_content1" style="display:'';"></div>
		<!-- Msg Content 1 Ends here -->      
	</div>
</form>
 </td>
    <td background="">&nbsp;</td>
  </tr>
  <tr>
    <td><span style="width:25px; height:25px; float:right;"><img src="" width="25" height="25" /></span></td>
    <td background="">&nbsp;</td>
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
</body>
<script>
mainTab('one','two','three','schmenu_active','schmenu');
compose('ajax/messageTab.php','<?=$_SESSION['ProfileId'];?>');
</script>
</html>