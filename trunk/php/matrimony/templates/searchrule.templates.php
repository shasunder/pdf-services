<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<br /><table width="809" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="622" valign="top"> 
<table width="600px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif" /></span></td>
    <td width="554" background="./images/lightbox_top.gif">&nbsp;</td>
    <td width="31"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" /></span></td>
  </tr>
  <tr>
    <td background="./images/lightbox_left.gif"></td>
    <td>

<form name="editProfile">

<input type="hidden" name="int_profile_id" id="int_profile_id" value="<?php echo $_SESSION['ProfileId']?>" />

<div  class="sch_menu_t1">
		<div class="schmenu_lt" ></div>
		<div class="schmenu_cr">
		  <div class="schmenu">Search Title</div>
		</div>
		
		
		
		<div class="schmenu_rt" ></div>
		<div class="schmenu"></div>
</div>

	<div class="sch_con" >
		<div class="sch_top"></div>
		<!-- Msg Content 1 Starts here -->
		<div id="msg_content1">
        	<table width="100%" border="0">
  <tr>
    <td class="searchheader">Id</td>
    <td class="searchheader">Title</td>
     <td class="searchheader">Edit/Delete</td>
  </tr>
  
 <?php 
  	$h=0;
  	$r=1;
	while ($row=mysql_fetch_array($Result)) 
	{
	$rule[$h]=$row['Query'];
$title[$h]=$row['Title'];
$id[$h]=$row['Id'];
$type[$h]=$row['Type'];
//echo $id;
?>
<tr>
    <td class="prof_text" style="text-align:center;"><?php echo $r;?></td>
    <td class="prof_text" style="text-align:center;">
    <input type="hidden" name="query1" id="query1" value="<?php echo $rule[$h];?>"/>
     <input type="hidden" name="stype" id="stype" value="<?php echo $type[$h];?>"/>
     
    <a  onclick="dispsearch('<?php echo $id[$h];?>','query1','stype');" style="cursor:pointer">
		<?php echo $title[$h];?></a></td>
		 <td class="prof_text" style="text-align:center;">  <a href="one.php?id=<?php echo $id[$h];?>">
		<img src="images/edit-delete-icon.gif" border="o"/></a></td>
  </tr>
	<?php 
$h++;
$r++;
}
	?>

 
</table>

        
        
        </div>
		<!-- Msg Content 1 Ends here -->      
	</div>
</form>
 </td>
    <td background="./images/lightbox_right.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_b.gif" width="25" height="25" /></span></td>
    <td background="./images/lightbox_bottom.gif">&nbsp;</td>
    <td><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_b.gif" width="25" height="25" /></span></td>
  </tr>
</table> 
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
</html>
