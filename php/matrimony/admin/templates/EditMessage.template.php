<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
   	$link="ManageMessage.php";
	if(($action=='edit') || ($action=='view')) {
	$condition=" where Messages_ID='".$_GET['Id']."'";
	$matrimony->switchqry('tm_message','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
	$disabled='disabled';
}
?>

<h2><? if($action=="edit"){echo "Edit";}else if($action=="view"){echo "View"; }else{echo "Add";}?> Message Details </h2>
<script type="text/javascript">
var product = [<? echo $city; ?>];
//alert(product);
var sample = [<? echo $product; ?>];
//alert(sample);
 
</script>

<b><a href="<? echo $link; ?>">Go Back</a> </b>
<form name="frmPost" method="POST" action="" class="box" autocomplete="off">
<table width="799">
<tbody>
	<? if(($action!='edit') && ($action!='view')) { ?>
	<tr>
		<td width="25%"><b>Profile Id :</b><span class="marker">*</span></td>
		<td width="75%">
		<select name="pid" id="pid" style="width:100px; height:20px; width:215px;" >
		<? $sel="SELECT ProfileId FROM tm_profile where ProfileId not in(SELECT Profile_ID FROM tm_message)" ;
		   $result=mysql_query($sel); $j=0; ?>
		   <option >Select</option>
		   <? while($row=mysql_fetch_array($result)){ if($row['ProfileId']!=''){?>
				<option <? if($_POST['pid']==$row['ProfileId']){ echo "selected"; }?>  value="<?=$row['ProfileId']?>"><?=$row['ProfileId']?></option>
				<? $j++; }
				}?>
		</select>
		<input type="hidden" name="pid1" id="pid1" value=""/>
		</td>
	</tr>
	<? } ?>
<? //Profile_ID, To_profileId, Message_Subject, Message_Content, Message_Status, Message_Cstatus, Message_DOC, Message_DOA, Message_DOM, Messages_ID?>	
	<tr>
		<td width="25%"><b>ProfileId :</b><span class="marker">*</span>&nbsp</td>
		<td><input name="mid" id="mid" size="25" maxlength="100" type="hidden" value="<? echo $value['Messages_ID']; ?>"  /> <input name="frompid" type="text" id="frompid" value="<? echo $value['Profile_ID']; ?>" <? echo $disabled; ?> size="40" maxlength="25" /></td>
	</tr>
	
	<tr>
		<td width="25%"><b>To ProfileId :</b><span class="marker">*</span>&nbsp</td>
		<td><input name="topid" type="text" id="topid" value="<? echo $value['To_profileId']; ?>" <? echo $disabled; ?> size="40" maxlength="25" /></td>
	</tr>
  
	<tr>
		<td valign="top" nowrap=nowrap><b>Message Subject :</b> <span class="marker">*</span></td>
		<td><input name="subject" type="text" id="subject" value="<? echo $value['Message_Subject']; ?>" <? echo $disabled; ?> size="40" maxlength="25" /></td>
	</tr>
  
	<tr>
		<td height="58"><b>Message Content :</b><span class="marker">*</span></td>
		<td width="75%"><label>  <textarea name="mcontent" id="mcontent" cols="60" rows="5"  <? echo $disabled; ?> ><? echo $value['Message_Content']; ?></textarea></label></td>
	</tr>
   
   <tr>
   <td >	
	<input type="hidden" name="Id" id="Id" value="<?=$_GET['Id']; ?>"/> 
	<? if(($action!='edit') && ($action!='view')) { ?>
	<input type="hidden" name="webpage" value="request"/>
	<button type="submit" name="submit_list" id="submit_list" value="1"  onclick="return validate();" style="cursor:pointer">Post Now</button>
	<?  } if($action=='edit') {?>
	<span id="editspanid" style="display:block; float:left; margin-right:4px;"><button type="button" onClick="TXTEnable('subject|mcontent');DISStyle('updatespanid');DISStylenone('editspanid');" style="cursor:pointer">Edit</button></span>
<span id="updatespanid" style="display:none;">
<button type="submit" name="update" id="update" value="change" onclick="return update1();">Update</button>
</span> </td>
    </tr>
	</tbody></table> 
<? }?>
 
</form>
<script language="javascript">
function validate() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	error[0] = checkSelected(frm.ddlFvalue) ? "" : "Family value is empty"; 
	error[1] = checkSelected(frm.ddlFvalueType) ? "" : "Family Type is empty";
	error[2] = checkSelected(frm.ddlFStatus) ? "" : "Family Status is empty";
	error[3] = checkSelected(frm.ddlFOcc) ? "" : "Father Occupation  is empty";
	error[4] = checkSelected(frm.ddlMOcc) ? "" : "Mother Occupation  is empty";
	error[5] = checkText(frm.noofBros) ? "" : "No of Brothers  is empty";
	error[6] = checkText(frm.noofSis) ? "" : "No of Sisters is empty";
	error[7] = checkText(frm.noofBrosM) ? "" : "No of Brothers Married  is empty";
	error[8] = checkText(frm.noofSisM) ? "" : "No of Sisters Married  is empty";
	error[9] = checkText(frm.description) ? "" : "About Family Description  is empty";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postMessage.php'; } else { alert(errorMessage); return false; } }	
	
	function update1() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	error[0] = checkText(frm.subject) ? "" : "Subject is empty"; 
	error[1] = checkText(frm.mcontent) ? "" : "Message Content is empty";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postMessage.php?action=update'; } else { alert(errorMessage); return false; } }
	
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
