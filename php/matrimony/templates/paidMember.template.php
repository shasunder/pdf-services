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
    <div class="paidMember" style=" font-size:12px;">
    <!--header-->
    	<div class="" >
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

		<br/>
		<div>
			Membership options and price are as below:
			<ul>
			                    	<li>3 months Rs. 500 (£7.1)</li>
			                        <li>6 months Rs. 750 (£10.7)</li>
			                        <li>9 months Rs. 1000 (£14.2)</li>
                    </ul>
		</div>

<img alt="coin" src="images/orange.jpg"/><span style=" font-size:12px;"><b>Get Matched by a Relationship Manager. Choose Assisted Matchmaking Service.Get Expert help by Appointing<br />Relationship Manager to find u a perfect match.</b></span>
		              	<br/>
		              	<br/>
		              	Please note: your subscription will be activated within 24 hours of payment.
		              	<br/>
		<br/>

          <?php if($_SESSION['valid']=='loginvalid'){ ?>

          <div id="payments">
		              <div class="relationShip">

		              	<b>Pay by </b>&nbsp;<input type="radio" name="payMode" id="payMode" value="paypal" checked onClick="showPaymentOption('paypal');"/> Paypal
		              	<input type="radio" name="payMode" id="payMode" value="google" onClick="showPaymentOption('google');"/>Google checkout
		              	<input type="radio" name="payMode" id="payMode" value="bank" onClick="showPaymentOption('bank');"/>Bank transfer
		              </div>
		              <br/>


		  			<div id="optionPaypal">

		  				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		  					<input type="hidden" name="cmd" value="_s-xclick">
		  					<table>
		  					<tr><td><input type="hidden" name="on0" value="Membership options">Choose membership option</td></tr><tr><td><select name="os0">
		  						<option value="3 months">3 months £7.10</option>
		  						<option value="6 months">6 months £10.70</option>
		  						<option value="9 months">9 months £14.20</option>
		  					</select> </td></tr>
		  					</table>
		  					<br/>
		  					<div style="padding-left:250px; padding-bottom-20px">
		  						<input type="hidden" name="currency_code" value="GBP">
			  					<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
			  					">
			  					<input type="image" src="https://www.paypal.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
			  					<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
		  					</div>
		  				</form>

		  			</div>
		  			<div id="optionGoogle">

		  				<form action="https://checkout.google.com/api/checkout/v2/checkoutForm/Merchant/850675057200700" id="BB_BuyButtonForm" method="post" name="BB_BuyButtonForm" target="_top">
		  				    <table cellpadding="5" cellspacing="0" width="1%">
		  				    <tr><td><input type="hidden" name="on0" value="Membership options">Choose membership option</td></tr>
		  				        <tr>
		  				            <td align="right" width="1%">
		  				                <select name="item_selection_1">
		  				                    <option value="1">£7.10 - 3 months</option>
		  				                    <option value="2">£10.70 - 6 months</option>
		  				                    <option value="3">£14.20 - 9 months</option>
		  				                </select>
		  				                <input name="item_option_name_1" type="hidden" value="3 months"/>
		  				                <input name="item_option_price_1" type="hidden" value="7.1"/>
		  				                <input name="item_option_description_1" type="hidden" value="3 months subscription"/>
		  				                <input name="item_option_quantity_1" type="hidden" value="1"/>
		  				                <input name="item_option_currency_1" type="hidden" value="GBP"/>
		  				                <input name="item_option_name_2" type="hidden" value="6 months"/>
		  				                <input name="item_option_price_2" type="hidden" value="10.7"/>
		  				                <input name="item_option_description_2" type="hidden" value="6 months subscription"/>
		  				                <input name="item_option_quantity_2" type="hidden" value="1"/>
		  				                <input name="item_option_currency_2" type="hidden" value="GBP"/>
		  				                <input name="item_option_name_3" type="hidden" value="9 months"/>
		  				                <input name="item_option_price_3" type="hidden" value="14.2"/>
		  				                <input name="item_option_description_3" type="hidden" value="9 months subscription"/>
		  				                <input name="item_option_quantity_3" type="hidden" value="1"/>
		  				                <input name="item_option_currency_3" type="hidden" value="GBP"/>
		  				            </td>
		  				            <td align="left" width="1%">
		  				                <input alt="" src="https://checkout.google.com/buttons/buy.gif?merchant_id=850675057200700&amp;w=117&amp;h=48&amp;style=white&amp;variant=text&amp;loc=en_US" type="image"/>
		  				            </td>
		  				        </tr>
		  				    </table>
		  				</form>

		  			</div>
		  			<div id="optionBank">
		  				Please send an email to <b>service@marrybanjara.com</b> requesting for the number of month of subscription you are interested in. We will contact you shortly with the bank details for payment.
		  			</div>

		 </div>

          <div class="">
          <br/>

		 	<br/>

		  </div>
		  <?php } else {?>
			<div >

				<div style="margin-left:10px">
					<a href="login.php"><img src="images/buyNowbtn.png" border="0" height="30px"/></a> &nbsp;(Please login or register free first by clicking this button)
				</div>
			</div>
		<?php } ?>



<br/><br/><br/>


</form>
</div>



        </div>

</div>

    </div>


<script type="text/javascript">

	hide(["optionGoogle","optionBank"]);

	function showPaymentOption(type){

		hide(["optionGoogle","optionBank","optionPaypal"]);

		if(type =='paypal'){

			$("#optionPaypal").show();
		}else if(type =='google'){
			$("#optionGoogle").show();
		}else if(type =='bank'){
			$("#optionBank").show();
		}

	}
</script>