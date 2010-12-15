<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
	$cat= array("Orthodox","Traditional","Moderate","Liberal");
	$scat= array("Joint Family","Nuclear Family","Others");
	$icat= array("Middle Class","Upper Middle Class","Rich");
	$FOcc= array("Salaried","Labour","Unable to Work","Looking For Job","Not Working","Self-Employed","Others");	
   	$link="ManageFamily.php";
if(($action=='edit') || ($action=='view')) {
	$condition=" where ProfileId='".$_GET['Id']."'";
	$matrimony->switchqry('tm_family','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
	$disabled='disabled';
	 for($i=0; $i<sizeof($cat); $i++) { if($value['Familyvalue']==$cat[$i]) { $selc[$i]='selected';  } else { $selc[$i]=''; } }
	 for($i=0; $i<sizeof($scat); $i++) { if($value['Familytype']==$scat[$i]) { $sels[$i]='selected';  } else { $sels[$i]=''; } }	
	 for($i=0; $i<sizeof($icat); $i++) { if($value['Familystatus']==$icat[$i]) { $seli[$i]='selected';  } else { $seli[$i]=''; } }	
	 for($i=0; $i<sizeof($FOcc); $i++) { if($value['Fatheroccupation']==$FOcc[$i]) { $self[$i]='selected';  } else { $self[$i]=''; } }
	 for($i=0; $i<sizeof($FOcc); $i++) { if($value['Motheroccupation']==$FOcc[$i]) { $selm[$i]='selected';  } else { $selm[$i]=''; } }	
}

?>

<h2><? if($action=="edit"){echo "Edit";}else if($action=="view"){echo "View"; }else{echo "Add";}?> Family Details </h2>
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
		<? $sel="SELECT ProfileId FROM tm_profile where ProfileId not in(SELECT ProfileId FROM tm_family)" ;
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
	
	<tr>
		<td width="25%"><b>Family Value :</b><span class="marker">*</span>&nbsp</td>
		<td><input name="userid" id="userid" size="25" maxlength="40" type="hidden" value="<? echo $value['ProfileId']; ?>"  />
			 <select name="ddlFvalue" id="ddlFvalue" style="width:100px; height:18px; width:215px;" onChange="showMessage();" <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($cat); $i++) { echo '<option value="'.$cat[$i].'"'.$selc[$i].'>'.$cat[$i].'</option>'; } ?>
		</select></td>
	</tr>
  
	<tr>
		<td><b>Family Type :</b><span class="marker">*</span></td>
		<td><select name="ddlFvalueType" id="ddlFvalueType" style="width:100px; height:18px; width:215px;" onChange="showMessage();" <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($scat); $i++) { echo '<option value="'.$scat[$i].'"'.$sels[$i].'>'.$scat[$i].'</option>'; } ?>
		</select></td>
	</tr>
	
	<tr>
		<td><b>Family Status :</b><span class="marker">*</span></td>
		<td><select name="ddlFStatus" id="ddlFStatus" style="width:100px; height:18px; width:215px;" onChange="showMessage();" <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($icat); $i++) { echo '<option value="'.$icat[$i].'"'.$seli[$i].'>'.$icat[$i].'</option>'; } ?>
		</select></td>
	</tr>
  
	<tr>
		<td><b>Father Occupation:</b><span class="marker">*</span></td>
		<td><select name="ddlFOcc" id="ddlFOcc" style="width:100px; height:18px; width:215px;" onChange="showMessage();" <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($FOcc); $i++) { echo '<option value="'.$FOcc[$i].'"'.$self[$i].'>'.$FOcc[$i].'</option>'; } ?>
		</select></td>
	</tr>
  
	<tr>
		<td><b>Mother Occupation:</b><span class="marker">*</span></td>
		<td><select name="ddlMOcc" id="ddlMOcc" style="width:100px; height:18px; width:215px;" onChange="showMessage();" <? echo $disabled; ?> ><option >Select</option>
		<? for($i=0; $i<count($FOcc); $i++) { echo '<option value="'.$FOcc[$i].'"'.$selm[$i].'>'.$FOcc[$i].'</option>'; } ?>
		</select></td>
	</tr>
  
	<tr>
		<td valign="top" nowrap=nowrap><b>No Of Bothers :</b> </td>
		<td><input name="noofBros" type="text" id="noofBros" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['Brothers']; ?>" <? echo $disabled; ?> size="40" maxlength="2" /></td>
	</tr>
  
	<tr>
		<td valign="top" nowrap=nowrap><b>No Of Sisters :</b> </td>
		<td><input name="noofSis" type="text" id="noofSis" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['Sisters']; ?>" <? echo $disabled; ?> size="40" maxlength="2" /></td>
	</tr>
  
	<tr>
		<td valign="top" nowrap=nowrap><b>No Of Brothers Married :</b> </td>
		<td><input name="noofBrosM" type="text" id="noofBrosM" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['Brothersmarried']; ?>" <? echo $disabled; ?> size="40" maxlength="2" /></td>
	</tr>
	
	<tr>
		<td valign="top" nowrap=nowrap><b>No Of Sisters Married :</b> </td>
		<td><input name="noofSisM" type="text" id="noofSisM" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['Sistersmarried']; ?>" <? echo $disabled; ?> size="40" maxlength="2" /></td>
	</tr>
  
	<tr>
		<td height="58"><b>About Family:</b></td>
		<td width="75%"><label>  <textarea name="description" id="description" cols="60" rows="5"  <? echo $disabled; ?> ><? echo $value['Aboutfamily']; ?></textarea></label></td>
	</tr>
   
   <tr>
   <td >	
	<input type="hidden" name="Id" id="Id" value="<?=$_GET['Id']; ?>"/> 
	<? if(($action!='edit') && ($action!='view')) { ?>
	<input type="hidden" name="webpage" value="request"/>
	<button type="submit" name="submit_list" id="submit_list" value="1"  onclick="return validate();" style="cursor:pointer">Post Now</button>
	<?  } if($action=='edit') {?>
	<span id="editspanid" style="display:block; float:left; margin-right:4px;"><button type="button" onClick="TXTEnable('ddlFvalue|ddlFvalueType|ddlFStatus|ddlFOcc|ddlMOcc|noofBros|noofSis|noofBrosM|noofSisM|description');DISStyle('updatespanid');DISStylenone('editspanid');" style="cursor:pointer">Edit</button></span>
<span id="updatespanid" style="display:none;">
<button type="submit" name="update" id="update" value="change" onclick="return update1();">Update</button>
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
	error[0] = checkSelected(frm.pid) ? "" : "Select Profile Id";
	error[1] = checkSelected(frm.ddlFvalue) ? "" : "Family value is empty"; 
	error[2] = checkSelected(frm.ddlFvalueType) ? "" : "Family Type is empty";
	error[3] = checkSelected(frm.ddlFStatus) ? "" : "Family Status is empty";
	error[4] = checkSelected(frm.ddlFOcc) ? "" : "Father Occupation  is empty";
	error[5] = checkSelected(frm.ddlMOcc) ? "" : "Mother Occupation  is empty";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postFamily.php'; } else { alert(errorMessage); return false; } }
	
	
	function update1() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	//error[0] = checkSelected(frm.pid) ? "" : "Select Profile Id";
	error[0] = checkSelected(frm.ddlFvalue) ? "" : "Family value is empty"; 
	error[1] = checkSelected(frm.ddlFvalueType) ? "" : "Family Type is empty";
	error[2] = checkSelected(frm.ddlFStatus) ? "" : "Family Status is empty";
	error[3] = checkSelected(frm.ddlFOcc) ? "" : "Father Occupation  is empty";
	error[4] = checkSelected(frm.ddlMOcc) ? "" : "Mother Occupation  is empty";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postFamily.php?action=update'; } else { alert(errorMessage); return false; } }
	
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
