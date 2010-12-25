<?php 
session_start();
ob_start();

include("common/config.inc.php");
include_once("common/function.php");
$qry="SELECT Id,Type,Month,Profiles,Amount,Paypal  from tm_membership ";
	
$Result= mysql_query($qry);
$ResultCount=mysql_num_rows($Result);


$qry1="SELECT distinct(Type) FROM tm_membership ";
$Result1= mysql_query($qry1);

$qry2="SELECT distinct(Month) FROM tm_membership ";
$Result2= mysql_query($qry2);
?>
    <div class="paidMember" >
    <!--header-->
    	<div class="" style=" font-size:12px;">
            <div class="">
            <br/>
            <h1>Privilege Matrimony</h1>
            <br/>
            
            	<div >
            		&nbsp;&nbsp;<b>Why Paid Membership ?</b>
                	<ul>
                    	<li>Top Ranking Display</li>
                        <li>See Contact Information</li>
                        <li>Highlighted Display</li>
                        <li>Send Personalized Messages</li>
                        <li>Advanced search and save</li>
                    </ul>
                </div>
                <?php if($_SESSION['valid']!='loginvalid'){ ?>
                Please login/register(FREE) to upgrade to premium membership
                <?php } else{?>
                Please choose your membership option below:
                <div style="padding-top:15px"></div>	
                 <?php } ?>
                
            </div>
        </div>
     <!--header-->
    <div class="middlecontainer" style="font-size:12px">
    	<div class="bg">
       <div class="monthview" style="padding-top:19px">
       
             	<table style="width:70%" border="0">
                <?php 
 $i=0;
     while($row2 = mysql_fetch_array($Result2))
			{	?>
  <tr>
    <td ><?php echo $row2['Month'] ." Months";?></td>
 <?php }?>
  </tr>
</table>

       </div>
        	<div class="tableview">
             <form method="post" action="https://www.paypal.com/cgi-bin/webscr"  name="myform">
            	<table style="width:50%" border="0">
  <tr><?php 
 $i=0;
     while($row1 = mysql_fetch_array($Result1))
			{	?>
    <td  class="title" style="padding-left:12px"><?php echo $row1['Type'];?></td>
    <?php }?>
  </tr>
 <tr>
    <?php
	$i=0;
     while($row = mysql_fetch_array($Result))
			{	
		

			 ?>
              
            <td >
            <input name="classic" type="radio" value="classic<?php echo $row['Id'];?>" id='classic'/>&nbsp;Rs.<?php echo $row['Amount'] ;?>
            </td> 
            
            
         <?php 
		 $i++;
		 if($i%3==0)
		 { 
		echo "</tr>";
		 }
		 }?>
         </tr>
 

  

  
</table>

            
</div>
          
          
		<br/>
            <div class="relationShip">
            	<img alt="coin" src="images/orange.jpg"/><span style=" font-size:12px;"><b>Get Matched by a Relationship Manager. Choose Assisted Matchmaking Service.Get Expert help by Appointing<br />Relationship Manager to find u a perfect match.</b></span>
            	<br/>
            	<br/>
            	<b>Pay by </b>&nbsp;<input type="radio" name="payMode" id="payMode" value="paypal" checked/> Paypal 
            	<input type="radio" name="payMode" id="payMode" value="google"/>Google checkout 
            	<input type="radio" name="payMode" id="payMode" value="bank"/>Bank transfer
            </div>
          <?php if($_SESSION['valid']=='loginvalid'){ ?> 
          <div class="">
          <br/>
			<input name="" type="checkbox" value="" onchange="vote('classic','<?php echo $_SESSION['ProfileId'];?>');"/><b> I Agree</b>
		 	<br/>
		 	<br/>
		 	
		  </div>
		  <?php } else {?>
			<div >
				
				<div style="margin-left:350px">
					<a href="login.php"><img src="images/buyNowbtn.png" border="0" height="30px"/></a> &nbsp;(need to login first)
				</div>
			</div>
		<?php } ?>


 <?php if($_SESSION['valid']=='loginvalid'){ ?> 
<div class="bynowbtn" id="paypal" style="float:right;padding-right:100px">
	
  	 <input type="hidden" value="_s-xclick" name="cmd"> 
	 <input type="hidden" id="payvalue" value="" name="hosted_button_id">
	  <input type="image" src="images/buyNowbtn.png" height="30px" name="submit" alt="PayPal - The safer, easier way to pay online!" > 
	  

</div>
 <?php } ?>
<br/><br/><br/>


</form>
</div>
            
 
       
        </div>
        
</div>
    
    </div>


