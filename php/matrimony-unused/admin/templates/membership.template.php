<?php 
session_start();
ob_start();
$id=$_REQUEST['id'];



			$qry="SELECT Id,Type,Month,Profiles,
			Amount,Paypal from tm_membership where Id=".$id;
		
				$Result= mysql_query($qry);
	$ResultCount=mysql_num_rows($Result);
	
	
	
				
?>
<h2>MANAGE MEMBERSHIP</h2>



<!--<input type="submit" value="Get" class="button" name="get" onclick="classified_ajax('recorddisplay.php'+ ManageFamily.adid.value)">-->



<?php /*?><div align="center" ><b style="font-size:12px"> MANAGE MEMBERSHIP</b>
<table cellspacing="5" width="370" border="1" align="center">
  <tr style="background-color:#D9F2AD;">
    <th>TYPE</th>
    <th>MONTH</th>
       <th>PROFILES</th>
    <th>AMOUNT</th>
     <th>SAVE</th>
     <th>DELETE</th>
 <?php
 $i=0;
 while($row = mysql_fetch_array($Result))
			{		?>	
	<tr>
    <td><input type="text" id="type" value="<?=  $row['Type']; ?>"/>
	</td>
        <td><input type="text"  id="month" value="<?php echo $row['Month'] ;?>" /></td>
         <td><input type="text" id="profiles" value="<?php echo  $row['Profiles'] ;?>" /></td>
    <td><input type="text" id="amount" value="<?php echo  $row['Amount'] ;?>" /></td>
    
  <td > <img src="../images/btn_submit.gif" onclick="editmembership('<?php echo $row['Id'];?>','edit','type','month','profiles','amount');" />
  </td>
  <td><img src="../images/edit.gif" onclick="deletemembership('<?php echo $row['Id'];?>','delete');" />
  </td>
  </tr>
  <?php $i++;}?>
  
</table>
</div>
<?php */?>
<div class="manageContainer">

<table width="80%" border="0" class="grid">
  <tr>
    <td class="gridhead" align="center">TYPE</td>
    <td class="gridhead" align="center">MONTH</td>
    <td class="gridhead" align="center">PROFILES</td>
    <td class="gridhead" align="center">AMOUNT</td>
     <td class="gridhead" align="center">PAYPAL</td>
    <td class="gridhead" align="center" width="100">SAVE</td>
    
  </tr>
    <?php
 $i=0;
 while($row = mysql_fetch_array($Result))
			{		?>	
  <tr>
    <td class="gridcell" style="color:#000;" align="center"><input type="text" id="type" value="<?=  $row['Type']; ?>"/></td>
    <td class="gridcell" align="center"><input type="text"  id="month" value="<?php echo $row['Month'] ;?>" /></td>
    <td class="gridcell" align="center"><input type="text" id="profiles" value="<?php echo  $row['Profiles'] ;?>" /></td>
    <td class="gridcell" align="center"><input type="text" id="amount" value="<?php echo  $row['Amount'] ;?>" /></td>
     <td class="gridcell" align="center"><input type="text" id="paypal" value="<?php echo  $row['Paypal'] ;?>" /></td>
    <td class="gridcell" align="center"><img src="../images/save.gif" onclick="editmembership('<?php echo $row['Id'];?>','edit','type','month','profiles','amount','paypal');" /></td>
    <td class="gridcell" align="center" style="display:none"><img src="../images/delete.gif" onclick="deletemembership('<?php echo $row['Id'];?>','delete');" /></td>
  </tr>
  <?php $i++;}?>
</table>
</div>

