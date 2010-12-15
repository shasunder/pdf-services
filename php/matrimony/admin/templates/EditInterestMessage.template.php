<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
   	$link="InterestMessage.php";
if(($action=='edit') || ($action=='view')) {
	$condition=" where Int_id='".$_GET['Id']."'";
	$matrimony->switchqry('tm_interestmsg','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
	$disabled='disabled';
}

?>

<h2><? if($action=="edit"){echo "Edit";}else if($action=="view"){echo "View"; }else{echo "Add";}?> Partner Preference </h2>
<script type="text/javascript">
var product = [<? echo $city; ?>];
//alert(product);
var sample = [<? echo $product; ?>];
//alert(sample);
 
</script>

<b><a href="<? echo $link; ?>">Go Back</a> </b>
<form name="frmPost" method="POST" action="" class="box" autocomplete="off">
<table >
<tbody>
	<tr>
		<td><b>Maritial  Status :</b><span class="marker">*</span></td>
		<td>
		<input name="Intid" id="Intid" size="25" maxlength="10" type="hidden" value="<? echo $value['Int_id']; ?>"  />
		<input type="radio" name="radiomarital" id="Express1" value="My parents and I like your profilePlease send me your contact details" <?  if($value['Int_Msg']=='My parents and I like your profilePlease send me your contact details') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >My parents and I like your profilePlease send me your contact details

		<br /><input type="radio" name="radiomarital" id="Express2" value="I feel we have a lot in common Please go through my profile and reply to my interest" <? if($value['Int_Msg']=='I feel we have a lot in common Please go through my profile and reply to my interest') { echo "checked"; } ?> <? echo $disabled; ?> >I feel we have a lot in common Please go through my profile and reply to my interest

		<br /><input type="radio" name="radiomarital" id="Express3" value="Interested in your profile Would like to know more about you Please Accept if you are interested too" <? if($value['Int_Msg']=='Interested in your profile Would like to know more about you Please Accept if you are interested too') { echo "checked"; } ?> <? echo $disabled; ?> >Interested in your profile Would like to know more about you Please Accept if you are interested too

		<!--<br /><input type="radio" name="radiomarital" id="Express4" value="Our childrens profiles seem to match Please Accept if you want us to contact you further
" <?// if($value['Int_Msg']=='Our childrens profiles seem to match Please Accept if you want us to contact you further') { echo "checked"; } ?> <? echo $disabled; ?> >Our childrens profiles seem to match Please Accept if you want us to contact you further

		<br /><input type="radio" name="radiomarital" id="Express5" value="You are the kind of person we have been searching for Please send us your contact details" <? //if($value['Int_Msg']=='You are the kind of person we have been searching for Please send us your contact details') { echo "checked"; } ?> <? echo $disabled; ?> >You are the kind of person we have been searching for Please send us your contact details

	<br /><input type="radio" name="radiomarital" id="Express6" value="We like your profile and would like to contact your parents Please reply to this interest" <?// if($value['Int_Msg']=='We like your profile and would like to contact your parents Please reply to this interest') { echo "checked"; } ?> <? echo $disabled; ?> >We like your profile and would like to contact your parents Please reply to this interest-->
	</td>
	</tr>
  
	<tr>
		<td >	
		<input type="hidden" name="Id" id="Id" value="<?=$_GET['Id']; ?>"/> 
		<? if(($action!='edit') && ($action!='view')) { ?>
		<input type="hidden" name="webpage" value="request"/>
		<button type="submit" name="submit_list" id="submit_list" value="1"  onclick="return validate();" style="cursor:pointer">Post Now</button>
		<?  } if($action=='edit') {?>
		<span id="editspanid" style="display:block; float:left; margin-right:4px;"><button type="button" onClick="TXTEnable('Express1|Express2|Express3');DISStyle('updatespanid');DISStylenone('editspanid');" style="cursor:pointer">Edit</button></span>
		<span id="updatespanid" style="display:none;">
		<button type="submit" name="update" id="update" value="change" onClick="return update1();">Update</button>
		</span> </td>
	</tr>
	
  </tbody></table> 
<!--<span id="delspanid" style="display:"><button type="submit" id="del" name="del" value="del" onClick=" return delete_row(); TXTEnable('suggest1');" style="cursor:pointer" >Delete</button></span>
<input name="verify" value="Verify" class="button" onclick="return check('Verify')" type="submit" style="cursor:pointer">
<input name="active" type="submit" class="button" id="active" value="Active" onclick="return check('Activate')" style="cursor:pointer">
<input name="pending" type="submit" class="button" id="pending" value="Pending" onclick="return check('Pending')" style="cursor:pointer">
<input name="suspend" value="Blocked" class="cautionbutton" onClick="return check('Block')" type="submit" style="cursor:pointer">
<?/* } if(($action!='view')&&($action!='edit')) {*/?>-->
   <!--<button type="button" onClick="TXTClear('suggest1|description|month|txtVerifycode'); TXTEnable('suggest1|description|month|txtVerifycode');" style="cursor:pointer">RESET</button>--><? }?>
   
 <? /* if(($action!='view')&&($action=='edit')) {*/?>
  <!-- <button type="button" onClick="TXTClear('description|month'); TXTEnable('description|month');DISStyle('updatespanid');DISStylenone('editspanid');" style="cursor:pointer">RESET</button>-->
   <? /*} */?>
</form>
<script language="javascript">
function validate() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	error[0] = checkText(frm.age1) ? "" : "From Age is empty"; 
	error[1] = checkText(frm.age2) ? "" : "To Age is empty";
	error[2] = checkSelected(frm.Mtongue) ? "" : "MotherTongue is empty";
	error[3] = checkSelected(frm.ddlReligion) ? "" : "Religion is empty";
	error[4] = checkSelected(frm.ddlCommunity) ? "" : "Community is empty";
	error[5] = checkSelected(frm.ddle_category) ? "" : "Education Categorty is empty";
	error[6] = checkSelected(frm.occ) ? "" : "Occu[pation is empty";
	error[7] = checkSelected(frm.emp) ? "" : "Employee Type is empty";
	error[8] = checkSelected(frm.ddlCitizen) ? "" : "Citizenship is empty";
	error[9] = checkSelected(frm.ddlCountry) ? "" : "Country is empty";
	error[10] = checkSelected(frm.ddlstate) ? "" : "State is empty";
	error[11] = checkText(frm.description) ? "" : "AboutPartner is empty";
	error[12] = checkSelected(frm.pstatus) ? "" : "PhysicalStatus is empty";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='PostInterestMessage.php'; } else { alert(errorMessage); return false; } }
	
	function update1() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='PostInterestMessage.php?action=update'; } else { alert(errorMessage); return false; } }
	
function check(id) {
		frm = document.frmPost;
		var tick = frm.Id; 
		var flag = 0; 	
			if(tick.value) {
				flag = 1;
				if(id=='Pending') {
					if(confirm('Are you sure you want to move Selected Request to Pending')) {
						document.frmPost.action; document.frmPost.submit(); return true; 
					} else {  return false; }
				} else  {
					if(confirm(id+' Selected Request')) {
						document.frmPost.action; document.frmPost.submit(); return true;
					} else { return false; } 
				} }
			if(flag == 0) { alert("Select a Request to "+id); return false; } }
</script>
