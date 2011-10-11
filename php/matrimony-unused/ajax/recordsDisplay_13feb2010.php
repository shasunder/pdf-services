<?
require("../common/pagination_admin.class.php");

class displayRecords extends Pagination  
{
	var $db;
	var $SuccMsg = array();
	var $searchResult =  array();
	var $fields_val = array();

	function displayRecords(){
		$this->Pagination();  
	}
function displayPage(){
	$fname=basename($_SERVER['PHP_SELF'],".php"); 
	?>
	<form name="recordsPage" action="<?php echo $_SERVER['PHP_SELF']?>" method="get" style="display:inline" >
	<?php
	global 	$global_config;
	$WebPage=$fname;
	if($WebPage=='picklist') { $pageCount = 5; } else {
	$pageCount = 5; }
	$start = $_GET['b'] ? $_GET['b'] : 0;	
	$this->pageVal = $_GET['b'] ? $_GET['b'] : 0;
	$end = $start + $pageCount;

	if($WebPage=='ManageUser')
	{	
	  $arguments='ProfileId,LoginId,FirstName, EmailId, CreatedBy, ProfileCategory, Gender, MaritialStatus, ResidingCOuntry, DOJ,tm_autoid,tmid_count,LastVisted,ProfileStatus';
	  $page="tm_profile";
	  $conditionValue="";
	  $search="";
	  $search=array("1"=>$_REQUEST['verified'],"2"=>$_REQUEST['status'],"3"=>$_REQUEST['sortby'],"4"=>$_REQUEST['sortorder'],"5"=>$_REQUEST['searchname'],"6"=>$_REQUEST['fdate'],"7"=>$_REQUEST['todate'],"8"=>$_REQUEST['userID'],"9"=>$_REQUEST['alpha']);
	  $searchValue="";
		for($i=1;$i<=10;$i++) {
			if($search[$i]!="") { 
					if(($i==1)) {
						if($searchValue=="") {
							$searchValue.="CreatedBy ='".$_REQUEST['verified']."'";
						} 
					}
					if(($i==2)) {
						if($searchValue=="") {
							$searchValue.="ProfileStatus ='".$_REQUEST['status']."'";
						} else {
							$searchValue.=" AND ProfileStatus ='".$_REQUEST['status']."'";
						}
					}
					if(($i==5)) {
						if($searchValue=="") {
							$searchValue.="FirstName ='".trim($_REQUEST['searchname'])."'";
						} else {
							$searchValue.=" AND FirstName ='".trim($_REQUEST['searchname'])."'";
						}
					}
					if($i==7) {
					if($_REQUEST['fdate']!='' && $_REQUEST['todate']!='' && $_REQUEST['fdate']!=$_REQUEST['todate']) {
						$fmdate = explode("-",$_REQUEST['fdate']);
						$from=$fmdate[2]."-".$fmdate[1]."-".$fmdate[0];
						$fromdatetime = $fmdate[2]."-".$fmdate[1]."-".$fmdate[0]." 01:01:01";
						$todate1 = explode("-",$_REQUEST['todate']);
						$todatetime = $todate1[2]."-".$todate1[1]."-".$todate1[0]." 59:59:59";
						if($searchValue=="") {
							$searchValue.=" (DOJ between '$fromdatetime' AND '$todatetime') ";
						} else {
							$searchValue.=" AND (DOJ between '$fromdatetime' AND '$todatetime') ";
						}
					}
					if($_REQUEST['fdate']==$_REQUEST['todate'] && $_REQUEST['fdate']!='') {
						$fmdate = explode("-",$_REQUEST['fdate']);
						$from=$fmdate[2]."-".$fmdate[1]."-".$fmdate[0];
						if($searchValue=="") {
							$searchValue.=" (DOJ LIKE '$from%') ";
						} else {
							$searchValue.=" AND (DOJ LIKE '$from%') ";
						}
					}
					
					}
					if(($i==8)) {
						if($searchValue=="") {
							$searchValue.="ProfileId ='".trim($_REQUEST['userID'])."'";
						} else {
							$searchValue.=" AND ProfileId ='".trim($_REQUEST['userID'])."'";
						}
					}
				if(($i==9)) {
						if($searchValue=="") {
							$searchValue.="(EmailId LIKE '".trim($_REQUEST['alpha'])."%')";	
						} else {
							$searchValue.=" AND (EmailId LIKE '".trim($_REQUEST['alpha'])."%')";	
						}
					}
				if(($i==10)) {
						if($searchValue=="") {
							$searchValue.="(tmid_count LIKE '".trim($_REQUEST['tmid_count'])."%')";	
						} else {
							$searchValue.=" AND (tmid_count LIKE '".trim($_REQUEST['tmid_count'])."%')";
						}
					}
				}
			}//FOR
			$search=$searchValue;
			if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by ProfileId desc";
			} 
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by ProfileId ".$_REQUEST['sortorder'];
			}
			else if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." desc";
			}
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." ".$_REQUEST['sortorder'];
			}
			$limit=""; 
			//} 
	}/*ProfileId, Familyvalue, Familytype, Familystatus, Fatheroccupation, Motheroccupation, Brothers, Sisters, Brothersmarried, Sistersmarried, Aboutfamily/////ProfileID,FirstName, EmailId, CreatedBy, ProfileCategory, Gender, MaritialStatus, ResidingCOuntry, DOJ,tm_autoid,tmid_count,LastVisted,ProfileStatus*/
	if($WebPage=='ManageFamily')
	{	
	  $arguments='ProfileId, Familyvalue, Familytype, Familystatus, Brothers, Sisters';
	  $page="tm_family";
	  $conditionValue="";
	  $search=""; 
	  $search=array("1"=>$_REQUEST['sortby'],"2"=>$_REQUEST['sortorder'],"3"=>$_REQUEST['searchname'],"4"=>$_REQUEST['userID'],"5"=>$_REQUEST['alpha']);
	  $searchValue="";
		for($i=1;$i<=5;$i++) { 
			if($search[$i]!="") { 
					
					if(($i==3)) {
						if($searchValue=="") {
							$searchValue.="Familyvalue ='".trim($_REQUEST['searchname'])."' or Familytype ='".trim($_REQUEST['searchname'])."' or Familystatus ='".trim($_REQUEST['searchname'])."'";
						} else {
							$searchValue.=" AND (Familyvalue ='".trim($_REQUEST['searchname'])."' or Familytype ='".trim($_REQUEST['searchname'])."' or Familystatus ='".trim($_REQUEST['searchname'])."')";
						}
					}
					if(($i==4)) {
						if($searchValue=="") {
							$searchValue.="ProfileID ='".trim($_REQUEST['userID'])."'";
						} else {
							$searchValue.=" AND ProfileID ='".trim($_REQUEST['userID'])."'";
						}
					}
				if(($i==5)) {
						if($searchValue=="") {
							$searchValue.="(Familyvalue LIKE '".trim($_REQUEST['alpha'])."%')";	
						} else {
							$searchValue.=" AND (Familyvalue LIKE '".trim($_REQUEST['alpha'])."%')";	
						}
				      }
					}
				}
			//}//FOR
			$search=$searchValue; 
			if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by ProfileID desc";
			} 
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by ProfileID ".$_REQUEST['sortorder'];
			}
			else if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." desc";
			}
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." ".$_REQUEST['sortorder'];
			}
			$limit=""; 
			//} 
			
			
	}//Interest_msgid, Int_id, Interest_To, Interest_From, Interest_Msgstatus, Interest_Cstatus, Interest_DOC, Interest_DOAT, Interest_DOB, Interest_DOAC
	if($WebPage=='ManageInterest')
	{	
	  $arguments='Interest_msgid, Int_id, Interest_To, Interest_From, Interest_Msgstatus, Interest_Cstatus, Interest_DOC, Interest_DOAT, Interest_DOB, Interest_DOAC';
	  $page="tm_interest";
	  $conditionValue="";
	  $search=""; 
	  $search=array("1"=>$_REQUEST['sortby'],"2"=>$_REQUEST['sortorder'],"3"=>$_REQUEST['searchname'],"4"=>$_REQUEST['userID'],"5"=>$_REQUEST['alpha']);
	  $searchValue="";
		for($i=1;$i<=5;$i++) { 
			if($search[$i]!="") { 
					
					if(($i==3)) {
						if($searchValue=="") {
							$searchValue.="Interest_Msgstatus ='".trim($_REQUEST['searchname'])."'";
						} else {
							$searchValue.=" AND Interest_Msgstatus ='".trim($_REQUEST['searchname'])."'";
						}
					}
					if(($i==4)) {
						if($searchValue=="") {
							$searchValue.="Interest_msgid ='".trim($_REQUEST['userID'])."'";
						} else {
							$searchValue.=" AND Interest_msgid ='".trim($_REQUEST['userID'])."'";
						}
					}
				if(($i==5)) {
						if($searchValue=="") {
							$searchValue.="(Familyvalue LIKE '".trim($_REQUEST['alpha'])."%')";	
						} else {
							$searchValue.=" AND (Familyvalue LIKE '".trim($_REQUEST['alpha'])."%')";	
						}
				      }
					}
				}
			$search=$searchValue; 
			if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by Interest_msgid desc";
			} 
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by Interest_msgid ".$_REQUEST['sortorder'];
			}
			else if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." desc";
			}
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." ".$_REQUEST['sortorder'];
			}
			$limit=""; 
	}


	
	if($WebPage=='ManageMessage')
	{	//Profile_ID, To_profileId, Message_Subject, Message_Content, Message_Status, Message_Cstatus, Message_DOC, Message_DOA, Message_DOM, Messages_ID
	  $arguments='Profile_ID, To_profileId, Message_Subject, Message_Content, Message_Status, Message_Cstatus, Message_DOC, Message_DOA, Message_DOM, Messages_ID';
	  $page="tm_message";
	  $conditionValue="";
	  $search=""; 
	  $search=array("1"=>$_REQUEST['sortby'],"2"=>$_REQUEST['sortorder'],"3"=>$_REQUEST['searchname'],"4"=>$_REQUEST['userID'],"5"=>$_REQUEST['alpha']);
	  $searchValue="";
		for($i=1;$i<=5;$i++) { 
			if($search[$i]!="") { 
					
					if(($i==3)) {
						if($searchValue=="") {
							$searchValue.="Messages_ID ='".trim($_REQUEST['searchname'])."' or Messages_ID ='".trim($_REQUEST['searchname'])."' or Messages_ID ='".trim($_REQUEST['searchname'])."'";
						} else {
							$searchValue.=" AND (Messages_ID ='".trim($_REQUEST['searchname'])."' or Messages_ID ='".trim($_REQUEST['searchname'])."' or Messages_ID ='".trim($_REQUEST['searchname'])."')";
						}
					}
					if(($i==4)) {
						if($searchValue=="") {
							$searchValue.="To_profileId ='".trim($_REQUEST['userID'])."'";
						} else {
							$searchValue.=" AND To_profileId ='".trim($_REQUEST['userID'])."'";
						}
					}
				if(($i==5)) {
						if($searchValue=="") {
							$searchValue.="(Message_Subject LIKE '".trim($_REQUEST['alpha'])."%')";	
						} else {
							$searchValue.=" AND (Message_Subject LIKE '".trim($_REQUEST['alpha'])."%')";	
						}
				      }
					}
				}
			$search=$searchValue; 
			if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by Messages_ID desc";
			} 
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by Messages_ID ".$_REQUEST['sortorder'];
			}
			else if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." desc";
			}
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." ".$_REQUEST['sortorder'];
			}
			$limit=""; 
	}
	
	if($WebPage=='ManagePartner')
	{	
	  $arguments='ProfileId, pMaritialStatus, pMotherTonque, pReligion, pCastDivision, pEducationCat, pOccupation, pCitizenchip';
	  $page="tm_partnerpreference";
	  $conditionValue="";
	  $search=""; 
	  $search=array("1"=>$_REQUEST['sortby'],"2"=>$_REQUEST['sortorder'],"3"=>$_REQUEST['searchname'],"4"=>$_REQUEST['userID'],"5"=>$_REQUEST['alpha']);
	  $searchValue="";
		for($i=1;$i<=5;$i++) { 
			if($search[$i]!="") { 
					
					if(($i==3)) {
						if($searchValue=="") {
							$searchValue.="pMaritialStatus ='".trim($_REQUEST['searchname'])."' or pMotherTonque ='".trim($_REQUEST['searchname'])."' or pReligion ='".trim($_REQUEST['searchname'])."' or pCastDivision ='".trim($_REQUEST['searchname'])."' or pEducationCat ='".trim($_REQUEST['searchname'])."' or pOccupation ='".trim($_REQUEST['searchname'])."' or pCitizenchip ='".trim($_REQUEST['searchname'])."'";
						} else {
							$searchValue.=" AND (pMaritialStatus ='".trim($_REQUEST['searchname'])."' or pMotherTonque ='".trim($_REQUEST['searchname'])."' or pReligion ='".trim($_REQUEST['searchname'])."' or pCastDivision ='".trim($_REQUEST['searchname'])."' or pEducationCat ='".trim($_REQUEST['searchname'])."' or pOccupation ='".trim($_REQUEST['searchname'])."' or pCitizenchip ='".trim($_REQUEST['searchname'])."')";
						}
						
					}
					if(($i==4)) {
						if($searchValue=="") {
							$searchValue.="ProfileID ='".trim($_REQUEST['userID'])."'";
						} else {
							$searchValue.=" AND ProfileID ='".trim($_REQUEST['userID'])."'";
						}
					}
				if(($i==5)) {
						if($searchValue=="") {
							$searchValue.="(pMotherTonque LIKE '".trim($_REQUEST['alpha'])."%')";	
						} else {
							$searchValue.=" AND (pMotherTonque LIKE '".trim($_REQUEST['alpha'])."%')";	
						}
				      }
					}
				}
			//}//FOR
			$search=$searchValue; 
			if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by ProfileID desc";
			} 
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']=="")) {
				$orderBy="order by ProfileID ".$_REQUEST['sortorder'];
			}
			else if(($_REQUEST['sortorder']=="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." desc";
			}
			else if(($_REQUEST['sortorder']!="")&&($_REQUEST['sortby']!="")) {
				$orderBy="order by ".$_REQUEST['sortby']." ".$_REQUEST['sortorder'];
			}
			$limit=""; 
			//} 
	}//IF	

	$limit = $condition == "1" ?  " LIMIT ".$start.",".$pageCount : "";
	if($_REQUEST['id']=='1') {
		//echo "sfsa".$arguments.$page.$conditionValue.$search.$orderBy.$limit.$WebPage;
		$this->selectRecords($arguments,$page,$conditionValue,$search,$orderBy,$limit,$WebPage);
		$row=mysql_num_rows($this->query);
	}
	else if($_REQUEST['val']=='go') {
		//echo $arguments.$page.$conditionValue.$search.$orderBy.$limit.$WebPage;
		$this->selectRecords($arguments,$page,$conditionValue,$search,$orderBy,$limit,$WebPage);
		$row=mysql_num_rows($this->query);
	} else {
		//echo "nor".$arguments.$page.$conditionValue.$search.$orderBy.$limit.$WebPage;
		$this->selectRecords($arguments,$page,$conditionValue,$search,$orderBy,$limit,$WebPage);
		$row=mysql_num_rows($this->query);
	}
	$recordCount = $row;
	$condition = "1";
	$limit = $condition == "1" ? " LIMIT ".$start.",".$pageCount: "";
     
	if($_REQUEST['id']=='1') {
		$this->selectRecords($arguments,$page,$conditionValue,$search,$orderBy,$limit,$WebPage);
		
		$row1=mysql_num_rows($this->query);
		$rowValue=mysql_fetch_assoc($this->query);
	} else if($_REQUEST['val']=='go') {
		$this->selectRecords($arguments,$page,$conditionValue,$search,$orderBy,$limit,$WebPage);
		$row1=mysql_num_rows($this->query);
		while($rowValue=mysql_fetch_assoc($this->query)) {
			$k++;
			$contentValue[$k]=$rowValue;
		}
	} else {
		$this->selectRecords($arguments,$page,$conditionValue,$search,$orderBy,$limit,$WebPage);
		$row1=mysql_num_rows($this->query);
		while($rowValue=mysql_fetch_assoc($this->query)) {
			$k++;			
			$contentValue[$k]=$rowValue;
		} 
	}
	//print_r($contentValue);
	echo "<div style='display:none'>split</div>";   //echo $search;  
	if($WebPage=='ManageUser'){ //echo $search; ?> 
			<table id="paginate_response" class="grid" width="100%" cellpadding="6" cellspacing="1">
				<tbody><tr>
					<td class="gridhead" width="15%" align="center">Profile ID </td>
					<td class="gridhead" width="15%" align="center">User ID </td>
					<td class="gridhead" width="25%" align="center">Name </td>
					<td class="gridhead" width="30%" align="center">Email / IP</td>
					<td class="gridhead" width="5%" align="center">No Of times Login </td>
					<td class="gridhead" width="10%" align="center">Last Login Date</td>
					<td class="gridhead" width="10%" align="center">Created By </td>
					<td class="gridhead" width="2%" align="center">Profile Status</td>
					<td class="gridhead" width="3%" align="center">View</td>
					<td class="gridhead" width="3%" align="center">Edit</td>
					<td class="gridhead" width="3%" align="center">Send Email</td>
					<td class="gridhead" width="3%" align="center">Send SMS</td>
					<td class="gridhead" width="3%" align="center">View Listing</td>
					<td class="gridhead" width="3%" align="center">View MailBox</td>
					<td class="gridhead" width="3%" align="center">
					<input onClick="javascript:checkall(this.checked);" type="checkbox"></td>
				</tr>
				
		<? } if($WebPage=='ManageFamily'){ //echo $search; ?> 
			<table id="paginate_response" class="grid" width="100%" cellpadding="6" cellspacing="1">
				<tbody><tr>
					<td class="gridhead" width="5%" align="center">User ID </td>
					<td class="gridhead" width="10%" align="center">Family Value</td>
					<td class="gridhead" width="10%" align="center">Family Type</td>
					<td class="gridhead" width="10%" align="center">Family Status</td>
					<td class="gridhead" width="2%" align="center">No of Bothers</td>
					<td class="gridhead" width="2%" align="center">No of Sisters</td>
					<td class="gridhead" width="3%" align="center">View</td>
					<td class="gridhead" width="3%" align="center">Edit</td>
				</tr>
	   <? }	if($WebPage=='ManageInterest'){ //echo $search;Interest_msgid, Int_id, Interest_To, Interest_From, Interest_Msgstatus, Interest_Cstatus, Interest_DOC, Interest_DOAT, Interest_DOB, Interest_DOAC ?> 
			<table id="paginate_response" class="grid" width="100%" cellpadding="6" cellspacing="1">
				<tbody><tr>
					<td class="gridhead" width="5%" align="center">Interest ID </td>
					<td class="gridhead" width="10%" align="center">Interest Message</td>
					<td class="gridhead" width="10%" align="center">Interest To</td>
					<td class="gridhead" width="10%" align="center">Interest From</td>
					<td class="gridhead" width="10%" align="center">Interest Msgstatus</td>
					<td class="gridhead" width="10%" align="center">Interest Cstatus</td>
					<td class="gridhead" width="10%" align="center">Interest DOC</td>
					<td class="gridhead" width="10%" align="center">Interest DOAT</td>
					<td class="gridhead" width="10%" align="center">Interest DOB</td>
					<td class="gridhead" width="10%" align="center">Interest DOAC</td>
					<td class="gridhead" width="3%" align="center">
					<input onClick="javascript:checkall(this.checked);" type="checkbox"></td>
				</tr>
	   <? }	if($WebPage=='ManageMessage'){ //echo $search; ?> 
		<table id="paginate_response" class="grid" width="100%" cellpadding="6" cellspacing="1">
		<tbody><tr>
			<td class="gridhead" width="5%" align="center">Profile ID </td>
			<td class="gridhead" width="30%" align="center">To profileId</td>
			<td class="gridhead" width="30%" align="center">Message Subject</td>
			<td class="gridhead" width="5%" align="center">Message Content </td>
			<td class="gridhead" width="10%" align="center">Message Status</td>
			<td class="gridhead" width="10%" align="center">Message Cstatus </td>
			<td class="gridhead" width="2%" align="center">Message DOC</td>
			<td class="gridhead" width="2%" align="center">Message DOM</td>
			<td class="gridhead" width="3%" align="center">
			<input onClick="javascript:checkall(this.checked);" type="checkbox"></td>
		</tr>
				
	   <? }	if($WebPage=='ManagePartner'){ //echo $search; ?> 
			<table id="paginate_response" class="grid" width="100%" cellpadding="6" cellspacing="1">
				<tbody><tr>
					<td class="gridhead" width="5%" align="center">User ID </td>
					<td class="gridhead" width="6%" align="center">Marital Status</td>
					<td class="gridhead" width="6%" align="center">Mother Tonque</td>
					<td class="gridhead" width="7%" align="center">Religion</td>
					<td class="gridhead" width="7%" align="center">Caste Devision</td>
					<td class="gridhead" width="15%" align="center">Education Category</td>
					<td class="gridhead" width="10%" align="center">Occupation</td>
					<td class="gridhead" width="10%" align="center">Citizenship</td>
					<td class="gridhead" width="3%" align="center">View</td>
					<td class="gridhead" width="3%" align="center">Edit</td>
				</tr>
	   <? }			  		   
	$j=0; 
    $recordCount10 = $row1;
	if ($recordCount10==0) {
		echo '<tr ><td height="22"  colspan="15" align="center" valign="middle" bgcolor="#FFFFFF" style="cursor:pointer;  color:#FF0000;">No Records Found </td></tr>';   	} else {
		for($j=0;$j<=$recordCount10;$j++)
		{  
			$no = $j;
			if($WebPage=='ManageUser'){
				 $this->Result[$no]['LoginId'] =$contentValue[$j]['LoginId'];
				 $this->Result[$no]['ProfileID'] =$contentValue[$j]['ProfileId'];
				 $this->Result[$no]['cs_Email'] =$contentValue[$j]['EmailId'];
				 $this->Result[$no]['cs_ActiveStatus'] =$contentValue[$j]['ProfileStatus'];
				 $this->Result[$no]['cs_DOA'] =$contentValue[$j]['DOA'];
				 $this->Result[$no]['cs_DOM'] =$contentValue[$j]['DOA'];
				 $this->Result[$no]['cs_VisitCount'] =$contentValue[$j]['tmid_count'];
				 $this->Result[$no]['cs_DOLV'] =$contentValue[$j]['LastVisted'];
				 $this->Result[$no]['CreatedBy'] =$contentValue[$j]['CreatedBy'];
				 $this->Result[$no]['cs_VerifiedStatus'] =$contentValue[$j]['cs_VerifiedStatus'];
				 $this->Result[$no]['cs_Name'] =$contentValue[$j]['FirstName'];
				 $this->Result[$no]['cs_AutoID'] =$contentValue[$j]['tm_autoid'];
			}
			if($WebPage=='ManageFamily'){

				 $this->Result[$no]['ProfileId'] =$contentValue[$j]['ProfileId'];
				 $this->Result[$no]['Familyvalue'] =$contentValue[$j]['Familyvalue'];
				 $this->Result[$no]['Familytype'] =$contentValue[$j]['Familytype'];
				 $this->Result[$no]['Familystatus'] =$contentValue[$j]['Familystatus'];
				 $this->Result[$no]['Brothers'] =$contentValue[$j]['Brothers'];
				 $this->Result[$no]['Sisters'] =$contentValue[$j]['Sisters'];
			}//Interest_msgid, Int_id, Interest_To, Interest_From, Interest_Msgstatus, Interest_Cstatus, Interest_DOC, Interest_DOAT, Interest_DOB, Interest_DOAC
			if($WebPage=='ManageInterest'){
				 $this->Result[$no]['Interest_msgid'] =$contentValue[$j]['Interest_msgid'];
				 $this->Result[$no]['Int_id'] =$contentValue[$j]['Int_id'];
				 $this->Result[$no]['Interest_To'] =$contentValue[$j]['Interest_To'];
				 $this->Result[$no]['Interest_From'] =$contentValue[$j]['Interest_From'];
				 $this->Result[$no]['Interest_Msgstatus'] =$contentValue[$j]['Interest_Msgstatus'];
				 $this->Result[$no]['Interest_Cstatus'] =$contentValue[$j]['Interest_Cstatus'];
				 $this->Result[$no]['Interest_DOC'] =$contentValue[$j]['Interest_DOC'];
				 $this->Result[$no]['Interest_DOAT'] =$contentValue[$j]['Interest_DOAT'];
				 $this->Result[$no]['Interest_DOB'] =$contentValue[$j]['Interest_DOB'];
				 $this->Result[$no]['Interest_DOAC'] =$contentValue[$j]['Interest_DOAC'];
			}
			if($WebPage=='ManageMessage'){ 
				 $this->Result[$no]['Profile_ID'] =$contentValue[$j]['Profile_ID'];
				 $this->Result[$no]['To_profileId'] =$contentValue[$j]['To_profileId'];
				 $this->Result[$no]['Message_Subject'] =$contentValue[$j]['Message_Subject'];
				 $this->Result[$no]['Message_Content'] =$contentValue[$j]['Message_Content'];
				 $this->Result[$no]['Message_Status'] =$contentValue[$j]['Message_Status'];
				 $this->Result[$no]['Message_Cstatus'] =$contentValue[$j]['Message_Cstatus'];
				 $this->Result[$no]['Message_DOC'] =$contentValue[$j]['Message_DOC'];
				 $this->Result[$no]['Message_DOM'] =$contentValue[$j]['Message_DOM'];
			}
			if($WebPage=='ManagePartner'){/*ProfileId, pMaritialStatus, pMotherTonque, pReligion, pCastDivision, pEducationCat, pOccupation, pCitizenchip*/

				 $this->Result[$no]['ProfileId'] =$contentValue[$j]['ProfileId'];
				 $this->Result[$no]['pMaritialStatus'] =$contentValue[$j]['pMaritialStatus'];
				 $this->Result[$no]['pMotherTonque'] =$contentValue[$j]['pMotherTonque'];
				 $this->Result[$no]['pReligion'] =$contentValue[$j]['pReligion'];
				 $this->Result[$no]['pCastDivision'] =$contentValue[$j]['pCastDivision'];
				 $this->Result[$no]['pEducationCat'] =$contentValue[$j]['pEducationCat'];
				 $this->Result[$no]['pOccupation'] =$contentValue[$j]['pOccupation'];
				 $this->Result[$no]['pCitizenchip'] =$contentValue[$j]['pCitizenchip'];
			}
		}
		//print_r($this->Result);

		for($j=0;$j<=$recordCount10;$j++) {
			 $no = $j+1;
		}
	   if($condition == "1") {
			$totalRecords =$recordCount;
			$this->set('urlscheme','?page=%page%');
			$this->set('perpage',$pageCount);
			$this->set('total',$totalRecords);
			$this->set('offset',$start);
			$arrayStart = 0;
			$arrayEnd = $pageCount;
			$serialNo = $start;
		} else {
			$totalRecords =  $recordCount10;
			$this->set('urlscheme','?page=%page%&searchText='.trim($searchText));
			$this->set('perpage',$pageCount);
			$this->set('total',$totalRecords);
			$this->set('offset',$start);
			$arrayStart =  $start + 1 ;
			$arrayEnd = $end;
			$serialNo = 0;
		}
		for($i= $arrayStart+1;$i<=$recordCount10;$i++) {
			if($WebPage=='ManageUser') {
				 if($this->Result[$i]['cs_ActiveStatus'] =='A'){$bgcolor = "style='color:black'";}
				 else if($this->Result[$i]['cs_ActiveStatus']=='I'){$bgcolor = "style='color:blue'";}
				 else if($this->Result[$i]['cs_ActiveStatus']=='B'){$bgcolor = "style='color:red'";}
				echo ' <tr class="gridcell" height="55" >
				<td align="center">'.$this->Result[$i]['ProfileID'].'</td>
				<td align="center">'.$this->Result[$i]['LoginId'].'</td>
				<td align="left">'.$this->Result[$i]['cs_Name'].'</td>
				<td><a href="mailto:'.$this->Result[$i]['cs_Email'].'">'.$this->Result[$i]['cs_Email'].'</a></td>
				<td align="center">	'.$this->Result[$i]['cs_VisitCount'].'</td> 
				<td height="22" align="left" valign="middle" bgcolor="#FEFDDF">'.$this->Result[$i]['cs_DOLV'].'</td><td align="left">'.$this->Result[$i]['CreatedBy'].'</td>				
				<td align="center">'.$this->Result[$i]['cs_ActiveStatus'].'</td>
				<td align="center"><a href="AddUser.php?Id='.$this->Result[$i]['ProfileID'].'&action=view"><img src="../images/edit.gif" border="0"></a></td>
				<td align="center"><a href="AddUser.php?Id='.$this->Result[$i]['ProfileID'].'&action=edit"><img src="../images/edit.gif" border="0"></a></td>
				<td align="center"><a class="adlink" href="" target="_blank">Send Email</a>	</td>
				<td align="center"><a class="adlink" href="" target="_blank">Send Sms</a></td>
				<td align="center"> <a class="adlink" href="" target="_blank">View Listings</a></td>
				<td align="center"> <a class="adlink" href="" target="_blank">View MailBox</a></td>
				<td align="center"><input name="ad[]" value="'.$this->Result[$i]['cs_AutoID'].'" type="checkbox"></td>  </tr>';
			}
			
			if($WebPage=='ManageFamily') {
				/*ProfileId, Familyvalue, Familytype, Familystatus, Fatheroccupation, Motheroccupation, Brothers, Sisters, Brothersmarried, Sistersmarried, Aboutfamily*/
				echo ' <tr class="gridcell" height="55" >
				<td align="center">'.$this->Result[$i]['ProfileId'].'</td>
				<td align="left">'.$this->Result[$i]['Familyvalue'].'</td>
				<td align="left">'.$this->Result[$i]['Familytype'].'</td>
				<td align="left">'.$this->Result[$i]['Familystatus'].'</td> 
				<td height="22" align="center" valign="middle" bgcolor="#FEFDDF">'.$this->Result[$i]['Brothers'].'</td><td align="center">'.$this->Result[$i]['Sisters'].'</td>				
				<td align="center"><a href="AddFamily.php?Id='.$this->Result[$i]['ProfileId'].'&action=view"><img src="../images/edit.gif" border="0"></a></td>
				<td align="center"><a href="AddFamily.php?Id='.$this->Result[$i]['ProfileId'].'&action=edit"><img src="../images/edit.gif" border="0"></a></td>
				</tr>';
			}
			//Interest_msgid, Int_id, Interest_To, Interest_From, Interest_Msgstatus, Interest_Cstatus, Interest_DOC, Interest_DOAT, Interest_DOB, Interest_DOAC
			if($WebPage=='ManageInterest') {
				 if($this->Result[$i]['cs_ActiveStatus'] =='A'){$bgcolor = "style='color:black'";}
				 else if($this->Result[$i]['cs_ActiveStatus']=='I'){$bgcolor = "style='color:blue'";}
				 else if($this->Result[$i]['cs_ActiveStatus']=='B'){$bgcolor = "style='color:red'";}
				echo ' <tr class="gridcell" height="55" >
				<td align="center">'.$this->Result[$i]['Interest_msgid'].'</td>
				<td align="center">'.$this->Result[$i]['Int_id'].'</td>
				<td align="center">'.$this->Result[$i]['Interest_To'].'</td>
				<td align="center">	'.$this->Result[$i]['Interest_From'].'</td> 
				<td height="22" align="center" valign="middle" bgcolor="#FEFDDF">'.$this->Result[$i]['Interest_Msgstatus'].'</td>
				<td align="center">'.$this->Result[$i]['Interest_Cstatus'].'</td>				
				<td align="center">'.$this->Result[$i]['Interest_DOC'].'</td>
				<td align="center">'.$this->Result[$i]['Interest_DOAT'].'</td>
				<td align="center">'.$this->Result[$i]['Interest_DOB'].'</td>
				<td align="center">'.$this->Result[$i]['Interest_DOAC'].'</td>
				<td align="center"><input name="ad[]" value="'.$this->Result[$i]['Interest_msgid'].'" type="checkbox"></td>  </tr>';
			}
			
			if($WebPage=='ManageMessage') {
				 if($this->Result[$i]['cs_ActiveStatus'] =='A'){$bgcolor = "style='color:black'";}
				 else if($this->Result[$i]['cs_ActiveStatus']=='I'){$bgcolor = "style='color:blue'";}
				 else if($this->Result[$i]['cs_ActiveStatus']=='B'){$bgcolor = "style='color:red'";}
				echo ' <tr class="gridcell" height="55" >
				<td align="center">'.$this->Result[$i]['Profile_ID'].'</td>
				<td align="left">'.$this->Result[$i]['To_profileId'].'</td>
				<td><a href="">'.$this->Result[$i]['Message_Subject'].'</a></td>
				<td align="center">	'.$this->Result[$i]['Message_Content'].'</td> 
				<td height="22" align="left" valign="middle" bgcolor="#FEFDDF">'.$this->Result[$i]['Message_Status'].'</td>
				<td align="left">'.$this->Result[$i]['Message_Cstatus'].'</td>				
				<td align="center">'.$this->Result[$i]['Message_DOC'].'</td>
				<td align="center">'.$this->Result[$i]['Message_DOM'].'</td>
				<td align="center"><a href="AddUser.php?Id='.$this->Result[$i]['ProfileID'].'&action=view"><img src="../images/edit.gif" border="0"></a></td>
				<td align="center"><a href="AddUser.php?Id='.$this->Result[$i]['ProfileID'].'&action=edit"><img src="../images/edit.gif" border="0"></a></td>
				<td align="center"><a class="adlink" href="" target="_blank">Send Email</a>	</td>
				<td align="center"><a class="adlink" href="" target="_blank">Send Sms</a></td>
				<td align="center"> <a class="adlink" href="" target="_blank">View Listings</a></td>
				<td align="center"> <a class="adlink" href="" target="_blank">View MailBox</a></td>
				<td align="center"><input name="ad[]" value="'.$this->Result[$i]['cs_AutoID'].'" type="checkbox"></td>  </tr>';
			}
			
			if($WebPage=='ManagePartner') {
				/*ProfileId, pMaritialStatus, pMotherTonque, pReligion, pCastDivision, pEducationCat, pOccupation, pCitizenchip*/
				echo ' <tr class="gridcell" height="55" >
				<td align="center">'.$this->Result[$i]['ProfileId'].'</td>
				<td align="left">'.$this->Result[$i]['pMaritialStatus'].'</td>
				<td align="left">'.$this->Result[$i]['pMotherTonque'].'</td>
				<td align="left">	'.$this->Result[$i]['pReligion'].'</td> 
				<td height="22" align="left" valign="middle" bgcolor="#FEFDDF" >'.$this->Result[$i]['pCastDivision'].' </td><td align="left">'.$this->Result[$i]['pEducationCat'].'</td>
				<td align="left">'.$this->Result[$i]['pOccupation'].'</td>
				<td align="left">	'.$this->Result[$i]['pCitizenchip'].'</td> 
				<td align="center"><a href="Add_partner.php?Id='.$this->Result[$i]['ProfileId'].'&action=view"><img src="../images/edit.gif" border="0"></a></td>
				<td align="center"><a href="Add_partner.php?Id='.$this->Result[$i]['ProfileId'].'&action=edit"><img src="../images/edit.gif" border="0"></a></td>
				</tr>';
			}
		}
		echo '<tr><td colspan=10 align="center" style="padding:10px;" >';
		echo '<div>'.$this->display().'</div><div style="padding-top:10px; height:20px;">'. $this->show_info().'</div>';
		echo '</td></tr>';
	}
}
}
	$displayRecords = new displayRecords();
?>