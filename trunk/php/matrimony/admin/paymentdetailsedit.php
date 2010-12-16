<?php
session_start(); ob_start();
if($_SESSION["login"] == "validuser")
 {
include("../common/config.inc.php");
include("../common/function.php");
include("templates/header.template.php");
include("templates/menu.template.php");
include("../ajax/recordsDisplay.php");





if($_REQUEST['action'] !="")
{

$result="UPDATE  tm_paymentdetail  SET Status='".$_REQUEST['action']."' WHERE Id='".$_REQUEST['id']."'";
//echo $result;
		$ans=mysql_query($result);
		

}



$qry="SELECT *  from tm_paymentdetail ";
		
				$Result= mysql_query($qry);
	$ResultCount=mysql_num_rows($Result);


?>
<form action="paymentdetailsedit.php" method="post" name="edit">
  <table width="100%" class="grid" cellspacing="1" cellpadding="6" align="center">
  <td class="gridhead">Type</td>
<td class="gridhead">Months</td>
<td class="gridhead">UserId</td>
<td class="gridhead">Profiles Viewed</td>
<td class="gridhead">Status</td>
<td class="gridhead">ProfileCount</td>
<td class="gridhead"> Received</td>
<td class="gridhead"> Pending</td>

  <?php  while($row= mysql_fetch_array($Result))
			{
$type="SELECT Type,Month  FROM `tm_membership` where Id=(select Typeid from tm_paymentdetail WHERE Profileid='".$row['Profileid']."')" ;
//echo $type;
$month=mysql_query($type);
while($plan=mysql_fetch_array($month))
{
$choosenplan[0]= $plan['Type'];
$choosenmon[0]= $plan['Month'];
}
		echo "<tr class='gridcell'>";
		echo "<td>".$choosenplan[0]."</td>";
   echo "<td>".$choosenmon[0]."</td>";
  echo "<td>".$row['Profileid']."</td>";
   echo "<td>".$row['Viewedprofiles']."</td>";
    echo "<td>".$row['Status']."</td>";
	 echo "<td>".$row['ProfileCount']."</td>";
	 ?>
	<td><a href="paymentdetailsedit.php?id=<?php echo $row['Id'];?>&action=R">Received</a></td>
   <td> <a href="paymentdetailsedit.php?id=<?php echo $row['Id'];?>&action=P">Pending</a></td>
	<?php
	/* echo " <td  align='center'><input type='submit' name='mode' value='edit' class='s_btn' /></td>";
	 
	*/ 
	echo "</tr>";
   }
	 ?>
	
   
</table>

</form>
<?php
include("templates/footer.template.php"); }
else { header("Location:index.php"); }
?>