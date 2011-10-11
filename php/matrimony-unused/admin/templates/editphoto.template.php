<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
   	$link="ManageImage.php";
	$atid=$_REQUEST['encid']?$_REQUEST['encid']:$insertimage->imgId[0];
	$condition=" where Profile_ID='".$_REQUEST['Id']."' and Image_ID = '$atid'";
	$matrimony->switchqry('tm_image','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
?>

<h2><? if($action=="edit"){echo "Edit";}else{echo "Add";}?> Image </h2>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="debug.css" media="all" />
	<style type="text/css">
		#testWrap {
			width: auto;
			float: left;
			margin: 20px 0 0 30px; /* Just while testing, to make sure we return the correct positions for the image & not the window */
		}
		
		#previewArea {
			margin: 20px 0 0 10px;
			float: left;
		}
		
		#results {
			clear: both;
		}
	</style>

<script type="text/javascript" language="javascript" src="../js/general.js"></script>
<script type="text/javascript" language="javascript" src="../js/onSubmit.js"></script>
<script src="../lib/prototype.js" type="text/javascript"></script>	
<script src="../lib/scriptaculous.js?load=builder,dragdrop" type="text/javascript"></script>
<script src="../cropper.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
		
		function onEndCrop( coords, dimensions ) {
			$( 'x1' ).value = coords.x1;
			$( 'y1' ).value = coords.y1;
			$( 'x2' ).value = coords.x2;
			$( 'y2' ).value = coords.y2;
			$( 'width' ).value = dimensions.width;
			$( 'height' ).value = dimensions.height;
		}
		
		// example with a preview of crop results, must have minimumm dimensions
		Event.observe( 
			window, 
			'load', 
			function() { 
				new Cropper.ImgWithPreview( 
					'testImage',
					{ 
						minWidth: 90, 
						minHeight: 90,
						//ratioDim: { x: 200, y: 120 },
						displayOnInit: true, 
						onEndCrop: onEndCrop,
						previewWrap: 'previewArea'
					} 
				) 
			} 
		);
</script>
<script type="text/javascript">

	function display(divid,content){
		if(divid==1){
			document.getElementById(content).style.display='';
		} else { 
			document.getElementById(content).style.display='none'; }
	}
	
	function setval(imgId,act){
		frm = document.sample;
		document.getElementById('img_id').value =imgId;
		document.getElementById('action').value =act;
		display(1,'upload');
	}
	function validation(){
		if((document.sample.file.value=="")){
			alert("Please Browse photo");
			return false;
		} else {
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
	function confirmDelete(id, ask, url) {
		temp = window.confirm(ask);
		if (temp){
			document.getElementById('img_id').value =id;
			document.getElementById('action').value ='delete';
			document.sample.submit();
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
<td>
	<tr>
		<td width="100px"><b>Profile Id :</b><span class="marker">*</span></td>
		<td align="left">
	<? if($action!='edit') {
			$sel="SELECT ProfileId FROM tm_profile where ProfileId in($pfid)" ;
			$result=mysql_query($sel); $j=0; ?>
		<select name="pid" id="pid" style="width:100px; height:20px; width:215px;" onChange="document.getElementById('Id').value=this.value;" >
		   <option >Select</option>
			<? while($row=mysql_fetch_array($result)){ if($row['ProfileId']!=''){?>
				<option value="<?=$row['ProfileId']?>"><?=$row['ProfileId']?></option>
				<? $j++; }
			}?>
		</select>
	<? } ?>		<?= $_REQUEST['Id']?>
		<input type="hidden" name="Id" id="Id" value="<?= $_REQUEST['Id']?>"/>
		</td>
	</tr>
</td>
</tr>
<tr>
<td colspan="2">
		<div style="height:107px">
			<?php 
			for($i=0;$i<5;$i++){
			if($insertimage->image_thumb[$i] != ""){ ?>
			<div class="add_photo_link" style="cursor:pointer; border:double #EBF4F5; width:90px; height:85px;">
				<a href="?Id=<?=$_GET['Id']?>&action=edit&encid=<?=$insertimage->imgId[$i]?>" style="text-decoration:none;">			
					<img src="../member_image/<?=$insertimage->image_thumb[$i]?>" style="height:85px; width:90px;" border="0" />
				</a>
			</div>
			<? }
			}
			?>
		</div>
		<div class="search_width" style="height:25px;">
			<?php 
				for($i=0;$i<5;$i++){
				if($insertimage->imgName[$i] != ""){?>
				<div class='add_photo_link'>
				<a href='javascript:void(0)' onClick="setval('<?=$insertimage->imgId[$i]?>','edit')" style="text-decoration:none;" class="prof-head">Edit</a>&nbsp;&nbsp;&nbsp;
				<a href="javascript:confirmDelete('<?=$insertimage->imgId[$i]?>','Want to Delete ?','AddPhoto.php')" style="text-decoration:none;" class="prof-head">Delete</a></div>
				<?php }
				}
			?>
		</div>
		<input type='hidden' name='img_id' id='img_id' value=''/>
		<input type='hidden' name='action' id='action' value=''/>
		<div class="search_line"> </div> 
		<div class="search_100"  id="upload"  style="display:none;">
			<label for="textfield"></label>
			<input name="file" type="file" class="textbox" id="file" style="height:22px;" />
			<input name="upload" type="submit" class="btn_set" id="upload" value="Upload"  onclick="return validation();"/>
			<input name="button" type="button" class="btn_set " value="Cancel"  onclick="display(0,'upload');"/>
			<div id="error" ></div>
		</div> 
		<br />
<? if($value['Image_Name']){?>
<div class="search_100"> 
	    <table width="553" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th width="330" height="41" align="left"> <font size="1.5" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Click to crop</font></th>
            <th width="200" height="41" align="center"><font size="1.5" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Crop Image</font></th>
          </tr>
          <tr>
            <td>
				<div id="testWrap">
					<img src="../member_image/<?=$value['Image_Name']?>" id="testImage" />
				</div>
			</td>
            <td align="left" valign="top">
			
				<div id="previewArea" align="left"></div>
				
				<div id="results">
						<input type="hidden" name="hdimgid" id="hdimgid" value="<?=$encid;?>" />
						<input type="hidden" name="hpid" id="hpid" value="<?=$_REQUEST['Id'];?>" />
						<input type="hidden" name="x1" id="x1" />
						<input type="hidden" name="y1" id="y1" />
						<input type="hidden" name="x2" id="x2" />
						<input type="hidden" name="y2" id="y2" />
						<input type="hidden" name="width" id="width" />
						<input type="hidden" name="height" id="height" />
				</div> 
			</td>
          </tr>
          <tr>
            <td width="550" height="41" colspan="2" align="center"><input type="submit" name="crop" value="Crop" id="crop"  class="button" /></td>
          </tr>
        </table>
</div><br />
<? } ?>
</div>
</td>
</tr>
</tbody>
</table>
</form>

</form>
<script language="javascript">
function validate() { 
	var frm = document.sample;
	var error = new Array();
	var errorMessage = ""; 	var i,j,k;
	error[0] = checkSelected(frm.pid) ? "" : "Please Select Profile Id"; 
	var i;
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='addphoto.php'; } else { alert(errorMessage); return false; } }
	
	
	function update1() {
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
