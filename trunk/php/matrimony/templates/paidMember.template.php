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
	
		
    <div class="paidMember">
    <!--header-->
    	<div class="header">
        	<div class="membershipBtn">
        		<!--  a href="#"><img src="images/membershipbtn.gif" border="0"/></a-->
        	</div>
            <div class="matrimonyBanner">
            	<div class="left">
            	<h1>Why Paid Membership ?</h1>
                	<ul>
                    	<li>Top Ranking Display</li>
                        <li>See Contact Information</li>
                        <li>Highlighted Display</li>
                        <li>Send Personalized Messages</li>
                        <li>Advanced search and save</li>
                    </ul>
                </div>
                <div class="right">
                	<a href="#"><img src="images/registerBtn.gif" border="0"/></a>
                </div>
            </div>
        </div>
     <!--header-->
    <div class="middlecontainer">
    	<div class="bg">
       <div class="monthview">
       	<table width="100%" border="0">
        <tr>
    <td class="title">&nbsp;</td>
  </tr>
             	<table width="100%" border="0">
  <tr><?php 
 $i=0;
     while($row2 = mysql_fetch_array($Result2))
			{	?>
  <tr>
    <td class="title2" align="center"><?php echo $row2['Month'] ." Months";?></td>
 <?php }?>
  </tr>
</table>

       </div>
        	<div class="tableview">
             <form method="post" action="https://www.paypal.com/cgi-bin/webscr"  name="myform">
            	<table width="100%" border="0">
  <tr><?php 
 $i=0;
     while($row1 = mysql_fetch_array($Result1))
			{	?>
    <td align="center" valign="middle" class="title"><?php echo $row1['Type'];?></td>
    <?php }?>
  </tr>
 <tr>
    <?php
	$i=0;
     while($row = mysql_fetch_array($Result))
			{	
		

			 ?>
              
            <td align="center" valign="middle" class="title2">
            <input name="classic" type="radio" value="classic<?php echo $row['Id'];?>" id='classic'/><?php echo $row['Amount'] ;?>
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
          
        <div class="paidMemberfooter">
        	<div class="privilege">PRIVILEGE MATRIMONY</div>
            <div class="relationShip"><b>0000 (3 Months)</b><span style="color:#fff; font-size:12px;"><b>Get Matched by a Relationship Manager</b></span></div>
          <?php if($_SESSION['valid']=='loginvalid'){ ?> <div class="Iagree">
<input name="" type="checkbox" value="" onchange="vote('classic','<?php echo $_SESSION['ProfileId'];?>');"/> I Agree</div><?php } else {?>
<div >
<a href="login.php"><img src="images/buyNowbtn.gif" border="0" /></a>
</div>
<?php } ?>
            <div class="ChooseAssisted">Choose Assisted Matchmaking Service.Get Expert help by Appointing<br />Relationship Manager to find u a perfect match.
</div>

<div class="bynowbtn" id="paypal" style="display:none">
	
   <input type="hidden" value="_s-xclick" name="cmd"> 
	 <input type="hidden" id="payvalue" value="" name="hosted_button_id">
	  <input type="image" src="images/buyNowbtn.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" > 
	<img height="1" width="1" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" > 
	  

</div>



</form>
</div>
            
 
       
        </div>
        
     <!--  footer membership message -->  
    <div class="fotterbtn">
    	<ul>
        	<li><a href="#">Send & receive e-mails</a></li>
            <li>|</li>
            <li><a href="#">Chat online</a> </li>
            <li>|</li>
            <li><a href="#">View horoscope of members</a></li>
            <li>|</li>
            <li><a href="#">Get better visibility for your profile</a></li>
            <li>|</li>
            <li><a href="#">Participate in online matrimony meet</a></li>
            
        </ul>
        
    
    
    </div>
</div>
    
    


