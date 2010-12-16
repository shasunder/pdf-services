<?php 
session_start();
ob_start();

if($_REQUEST['delete']=="delete")
{
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$month=$_REQUEST['month'];
$amount=$_REQUEST['amount'];
$result= "delete from tm_membership  WHERE id=".$id;
//echo $result;
		$qry=mysql_query($result);

}
$qry="SELECT Id,Type,Month,Profiles,Amount,Paypal  from tm_membership ";
		
				$Result= mysql_query($qry);
	$ResultCount=mysql_num_rows($Result);
	
	
	
				
?>
<h2>MANAGE MEMBERSHIP</h2>



<!--<input type="submit" value="Get" class="button" name="get" onclick="classified_ajax('recorddisplay.php'+ ManageFamily.adid.value)">-->




<?php /*?><table cellspacing="5" width="370" border="1" align="center">
  <tr style="background-color:#D9F2AD;">
    <th>TYPE</th>
    <th>MONTH</th>
     <th>PROFILES</th>
    <th>AMOUNT</th>
     <th>EDIT/DELETE</th>
 <?php
 $i=0;
 while($row = mysql_fetch_array($Result))
			{		?>	
	<tr>
    <td><input type="text" id="type" value="<?=  $row['Type'];?>" disabled="disabled"/>
	</td>
        <td><input type="text"  id="month" value="<?php echo $row['Month'] ;?>" disabled="disabled" /></td>
        <td><input type="text" id="amount" value="<?php echo  $row['Profiles'] ;?>"  disabled="disabled"/></td>
    <td><input type="text" id="amount" value="<?php echo  $row['Amount'] ;?>"  disabled="disabled"/></td>
    
  <td align="center" ><a href="membership.php?id=<?php echo $row['Id'] ;?>"> <img src="../images/edit.gif"  /></a>
  </td>
  </tr>
  <?php $i++;}?>
 
<?php */?>
<div class="manageContainer">

<table width="80%" border="0" class="grid">
  <tr>
    <td class="gridhead" align="center">TYPE</td>
    <td class="gridhead" align="center">MONTH</td>
    <td class="gridhead" align="center">PROFILES</td>
    <td class="gridhead" align="center">AMOUNT</td>
     <td class="gridhead" align="center">PAYPAL</td>
    <td class="gridhead" width="100">EDIT</td>
  </tr>
   <?php
 $i=0;
 while($row = mysql_fetch_array($Result))
			{		?>	
  <tr>
    <td class="gridcell" style="color:#000;" align="center" id="Type"><span style="color:#bb5a03; font-weight:bold;"><?php echo $row['Type'] ;?></span></td>
    <td class="gridcell" align="center" id="month"><?php echo $row['Month'] ;?></span></td>
    <td class="gridcell" align="center" id="Profiles"><?php echo  $row['Profiles'] ;?></td>
    <td class="gridcell" align="center" id="amount"><?php echo  $row['Amount'] ;?></td>
    <td class="gridcell" align="center" id="paypal"><?php echo  $row['Paypal'] ;?></td>
    <td class="gridcell" align="center"><a href="membership.php?id=<?php echo $row['Id'] ;?>"> <img src="../images/edit.gif"  border="0"/></a></td>
  </tr>
  <?php $i++;}?>
</table>
</div>
