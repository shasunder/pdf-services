<?php
session_start();
ob_start();
include("templates/homeheader.template.php");
if($_SESSION['valid']=='loginvalid'){
	include("common/config.inc.php");
	include("common/function.php");
	$id=$_REQUEST['id'];

if($_REQUEST['mode']=="Save")
{
$id=$_REQUEST['no'];
$title=$_REQUEST['title'];



$result= "UPDATE tm_savesearch SET Title='".$title."' WHERE Id=".$id;
echo $result;

		$qry=mysql_query($result);
		header("Location:index.php");

}
if($_REQUEST['mode']=="Delete")
{
$id=$_REQUEST['no'];

$result= "delete from tm_savesearch  WHERE id=".$id;

		$qry=mysql_query($result);
		header("Location:index.php");
		

}
}

	$qry="SELECT Id,Title from tm_savesearch where id=".$id;
		//echo $qry;
				$Result= mysql_query($qry);
	$ResultCount=mysql_num_rows($Result);
?>

<form action="one.php" method="post">
<br />
<table width="809" border="0" cellpadding="0" cellspacing="0" >
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


<div  class="sch_menu_t1">
		<div class="schmenu_lt" ></div>
		<div class="schmenu_cr">
		  <div class="schmenu">Edit / Delete</div>
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
    <td>
    <table> <?php 
 $i=0;
 while($row=mysql_fetch_array($Result))
			{	?>	
			
  <tr>
  <td class="gridcell" align="center">
  <input type="hidden" name="no" id="no" value="<?php echo $row['Id'] ;?>"  /></td>
          <td class="gridcell" align="center"><input name="title" type="text"  id="month" value="<?php echo $row['Title'];?>" /></td>
    <td class="gridcell" align="center"><input type="submit" name='mode' value="Save" class="s_btn" /></td>
    <td class="gridcell" align="center" ><input type="submit" name='mode' value="Delete" class="s_btn" /></a></td>
    </tr>
 
  <?php $i++;}?>
</table>
    
    </td>
  </tr>
	

 
</table>

        
        
        </div>
		<!-- Msg Content 1 Ends here -->      
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
</td>
<td width="241" valign="top">
<div id="rightadd" style="width:189px; z-index:1002; float:right;" >Right Add
<?php //include("advertisement/add_right.php");  ?>
<br clear="all"/>
</div>
</td>
</tr>
</table>
</form>





<!--

<form action="one.php" method="post">
  <table> <?php 
 $i=0;
 while($row=mysql_fetch_array($Result))
			{	?>	
			
  <tr>
  <td class="gridcell" align="center">
  <input type="hidden" name="no" id="no" value="<?php echo $row['Id'] ;?>"  /></td>
          <td class="gridcell" align="center"><input name="title" type="text"  id="month" value="<?php echo $row['Title'];?>" /></td>
    <td class="gridcell" align="center"><input type="submit" name='mode' value="Save" /></td>
    <td class="gridcell" align="center" ><input type="submit" name='mode' value="Delete" /></a></td>
    </tr>
 
  <?php $i++;}?>
</table>
</form>
-->


<?php include("templates/homefooter.template.php");?>