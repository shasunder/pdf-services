<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
	
   	$link="InterestMessage.php";
if(($action=='edit') || ($action=='view')) {
	$condition=" where ProfileId='".$_GET['Id']."'";
	$matrimony->switchqry('tm_family','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
	$disabled='disabled';
	
}

?>

<h2><? if($action=="edit"){echo "Edit";}else if($action=="view"){echo "View"; }else{echo "Add";}?> Add InterestMessage </h2>
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
	
	<tr>
		<td height="58"><b>Maritial Status:</b><span class="marker">*</span></td>
		<td width="75%"><label>  <textarea name="Maritial" id="Maritial" cols="60" rows="5"  <? echo $disabled; ?> ></textarea></label></td>
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
<? }?>
</form>

<script language="javascript">
function validate() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	error[0] = checkText(frm.Maritial) ? "" : "Please enter Maritial status";
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='PostInterestMessage.php'; } else { alert(errorMessage); return false; } }
</script>
