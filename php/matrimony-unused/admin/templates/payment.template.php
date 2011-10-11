<?php 
session_start();
ob_start();


$qry="SELECT *  from tm_paymentdetail ";
		
				$Result= mysql_query($qry);
	$ResultCount=mysql_num_rows($Result);
	?>
    <table width="100%" class="grid" cellspacing="1" cellpadding="6" align="center">
    
<td class="gridhead">UserId</td>
<td class="gridhead">Profiles Viewed</td>
<td class="gridhead">Status</td>
<td class="gridhead">ProfileCount</td>
<td class="gridhead">Edit</td>
  <?php  while($row= mysql_fetch_array($Result))
			{
		echo	"<tr class='gridcell'>";
  echo "<td>" . $row['Profileid']."</td>";
    echo "<td>"  . $row['Viewedprofiles']."</td>";
    echo "<td>"  . $row['Status']."</td>";

  
     echo "<td>"  . $row['ProfileCount']."</td>";?>
	 <td  align="center"><a href="paymentdetailsedit.php?id=<?php echo $row['Profileid'] ;?>"> <img src="../images/edit.gif"  border="0"/></a></td>
     <?php
 echo "</tr>";
  } 
  	?>
  
</table>

	

	

	