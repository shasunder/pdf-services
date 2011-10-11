<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
   	$link="ManageImage.php";
	$pfid='';
	$i=1;
	$matrimony->switchqry('tm_profile','SELECT','','ProfileId');
	while($row = mysql_fetch_array($matrimony->qry_result)) {
		$query = "select Profile_ID from tm_image where Profile_ID='".$row['ProfileId']."'";
		$exeqry=mysql_query($query);
		$numimg=mysql_num_rows($exeqry);
		if($numimg<5){
			if($pfid==''){
				$pfid = "'".$row['ProfileId']."'";
			}else{
				$pfid.=",'".$row['ProfileId']."'";
			}
		}
	$i++; 
	}	
?>

<h2><? if($action=="edit"){echo "Edit";}else{echo "Add";}?> Image </h2>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	function validation(){
		if(document.sample.pid.selectedIndex==0)
		{
			alert("Please Select Profile Id");
			return false;
		} else {
			if((document.sample.file.value=="")){
				alert("Please Browse photo");
				return false;
			} 
			else
			{
				var fup = document.getElementById('file');
				var fileName = fup.value;
				var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
				if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc"){
					return true;
				} else {
					alert("Upload Gif or Jpg images only");
					fup.focus();
					return false;
				}
			}
		}
	}
</script>
</head>
<body>
<b><a href="<? echo $link; ?>">Go Back</a> </b>
<form name="sample" method="post" class="box" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data"  >
<table cellpadding="0" cellspacing="0">
<tbody>
	<tr>
		<td width="25%"><b>Profile Id :</b><span class="marker">*</span></td>
		<td width="75%">
		<?	$sel="SELECT ProfileId FROM tm_profile where ProfileId in($pfid)" ;
			$result=mysql_query($sel); $j=0; ?>
		<select name="pid" id="pid" style="width:100px; height:20px; width:215px;" onChange="document.getElementById('Id').value=this.value;" >
		   <option >Select</option>
			<? while($row=mysql_fetch_array($result)){ if($row['ProfileId']!=''){?>
				<option value="<?=$row['ProfileId']?>"><?=$row['ProfileId']?></option>
				<? $j++; }
			}?>
		</select>
		<input type="hidden" name="Id" id="Id" value="<?= $_REQUEST['Id']?>"/>
		</td>
	</tr>
	<tr>
		<td height="20px;" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="25%"><b>Upload Image :</b><span class="marker">*</span></td>
		<td width="75%"><input name="file" type="file" class="textbox" id="file" style="height:22px;" /></td>
	</tr>
	<tr>
		<td height="20px;" colspan="2">&nbsp;</td>
	</tr>
	<tr>
	
	<td colspan="2" align="center">
	<span id="savespan"  style="display:;"> <input type="submit" name="upload" id="upload" value="Upload" class="button" onClick="return validation()"></span>
	</td>
</tr>
</tbody>
</table>
</form>