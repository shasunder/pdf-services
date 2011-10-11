
<?php
include("common/config.inc.php");
include_once("common/function.php");
$id=$_REQUEST['t'];
$rest = substr($id,-1); 
$session=$_REQUEST['sessionid'];
$qry="SELECT Paypal,Profiles  from tm_membership  where Id=".$rest;
		
				$Result= mysql_query($qry);
	$ResultCount=mysql_num_rows($Result);
	 while($row = mysql_fetch_array($Result))
			{	
           $paypal[0]=$row['Paypal'];
           $profile[0]=$row['Profiles'];
           $type[0]=$row['Type'];
           
				 }
$insert="insert into tm_paymentdetail values('0','".$rest."',0,'P','".$session."','".$profile[0]."')";
//echo $insert;

//$insertquery= mysql_query($insert);
	



	?>
