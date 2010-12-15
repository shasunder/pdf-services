<?php
@session_start();
?>
<div class="prof_h_b">
	<div class="mesmenu_active"  id="onesub" onclick="mainTab('onesub','twosub','','mesmenu_active','mesmenu');msg_messages('./ajax/interest_class.php','<?=$_SESSION['ProfileId']?>','Received','N','','','','','')">Received </div>
	<div class="mesmenu" id="twosub" onclick="mainTab('twosub','onesub','','mesmenu_active','mesmenu');msg_messages('./ajax/interest_class.php','<?=$_SESSION['ProfileId']?>','Sent','N','','','','','');"> Sent</div>
</div>
<!-- Content 1 starts here-->
<div id="content1" style="display:'';"></div>
<!-- Content 1 Ends here-->