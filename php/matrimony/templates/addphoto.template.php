<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bride&Groom</title>
<link href="./css/styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="debug.css" media="all" />
	<style type="text/css">
		#testWrap {
			width: 350px;
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

<script type="text/javascript" language="javascript" src="./js/general.js"></script>
<script type="text/javascript" language="javascript" src="./js/onSubmit.js"></script>
<script src="./lib/prototype.js" type="text/javascript"></script>	
<script src="./lib/scriptaculous.js?load=builder,dragdrop" type="text/javascript"></script>
<script src="./cropper.js" type="text/javascript"></script>
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
		if(document.sample.file.value==""){
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
<body onLoad="timedCount();">
<br /><table width="809" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="622" valign="top"> 
	<form name="sample" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data"  >
	
	<table width="620" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="25"><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_t.gif" /></span></td>
		<td width="544" background="./images/lightbox_top.gif">&nbsp;</td>
		<td width="31"><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_t.gif" /></span></td>
	  </tr>
	  <tr>
		<td background="./images/lightbox_left.gif"></td>
		<td>
	
			<div  class="sch_menu_t1">
					<div class="schmenu_lt" ></div>
					<div class="schmenu_cr"><div class="schmenu_highlight" >Manage Photo</div></div>
					<div class="schmenu_rt" ></div>
			</div>
	
	<div class="sch_con" style="height:inherit;"> 
		<div class="sch_top">  </div>
		<div class="search_line"> </div>
		<div class="search_100">You can upload upto 5 photos in .JPG,.GIF,.PNG,.BMP format. ( File size limit is 250KB for each photo )</div> 
		<br />
		<div class="search_width" style="height:107px">
			<?php 
			for($i=0;$i<5;$i++){
			if($insertimage->image_thumb[$i] != ""){ ?>
			<div class="add_photo_link" style="cursor:pointer; width:100px; height:85px;">
				<a href="?did=<?=$i?>&encid=<?=$insertimage->imgId[$i]?>" style="text-decoration:none;">
					<img src="./member_image/<?=$insertimage->image_thumb[$i]?>" border="double #EBF4F5" />
				</a>
			</div>
			<? } else {?>
			<div class="add_photo_link" style="cursor:pointer;"> 
				<img src="./images/add-photo_bg.gif" onClick="display(1,'upload');"/>
			</div>
			<?php }
			}
			?>
		</div>
		<div class="search_width" style="height:25px;">
			<?php 
			for($i=0;$i<5;$i++){
			if($insertimage->imgName[$i] != ""){?>
			<div class='add_photo_link'>
			<a href='javascript:void(0)' onClick="setval('<?=$insertimage->imgId[$i]?>','edit')" style="text-decoration:none;" class="prof-head">Edit</a>&nbsp;&nbsp;&nbsp;
			<a href="javascript:confirmDelete('<?=$insertimage->imgId[$i]?>','Want to Delete ?','managephoto.php')" style="text-decoration:none;" class="prof-head">Delete</a></div>
			<?php } else {?>
			<div class="add_photo_link"><a href="javascript:void(0)"  onClick="display(1,'upload');" style="text-decoration:none;" class="prof-head">Add</a></div>
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
		<div class="search_100" style="cursor:pointer;" > Password protection :
			<span class="red"><a href="javascript:void(0)" onClick="display(1,'pasw_content');document.getElementById('pwdError').innerHTML = '';document.getElementById('conpwdError').innerHTML = '';" class="red"> Click here to protect your photo.</a></span>
		</div>
		
		<div class="search_100"  id="pasw_content" style="display:none;">
			<label for="radiobutton"></label>
			Password :		
			<input type="password" name="txtPwd" id="txtPwd" style="size:36px; height:11px;font-family:Tahoma; font-size:11px; color:#000; padding:1px 0 1px 1px;" maxlength="15" onBlur="txt_empty('txtPwd','pwdError','Enter your Password');if(document.getElementById('txtPwd').value != ''){valid_chk('txtPwd','pwdError','4','8','Your password should be 4 to 8 characters') }" /> 
			Confirm Password : 
			<input type="password" name="txtConpwd" id="txtConpwd"  maxlength="15" style="size:36px; height:11px;font-family:Tahoma; font-size:11px; color:#000; padding:1px 0 1px 1px;" onBlur="txt_empty('txtConpwd','conpwdError','Please Confirm Your Password');checkpass('txtPwd','txtConpwd','conpwdError','Please check the given Password');">
			<input type="submit" class="btn_set" value="Submit" name="txtsubmit" onclick="return checkpass('txtPwd','txtConpwd','pwdError','conpwdError','Enter your Password','Please Confirm Your Password','Please check the given Password');"/>
			<input name="button2" type="button" class="btn_set " value="Cancel" onClick="display(0,'pasw_content');document.getElementById('pwdError').innerHTML = '';document.getElementById('conpwdError').innerHTML = '';" />
		</div>
		<div class="search_width_err">
			<div class="search_48_red" style="padding-left:65px; width:38%;"  id="pwdError"></div> 
			<div class="search_48_red"  id="conpwdError"></div>
			<div class="search_line"> </div>
		</div>
<? if($insertimage->imgName[0]){ 
	$id = $_REQUEST['did']?$_REQUEST['did']:0;
	$encid = $_REQUEST['encid']?$_REQUEST['encid']:"BGT_1";?>
<div class="search_100"> 
	    <table width="559" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th width="410" height="41">Click to crop</th>
            <th width="139" height="41" align="center">Crop Image</th>
          </tr>
          <tr>
            <td>
				<div id="testWrap">
					<img src="./member_image/<?=$insertimage->image_small[$id]?>" id="testImage" />
				</div>
			</td>
            <td align="left" valign="top">
			
				<div id="previewArea" align="left"></div>
				
				<div id="results">
						<input type="hidden" name="hdimgid" id="hdimgid" value="<?=$encid;?>" />
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
            <td height="41" colspan="2" align="center"><input type="submit" name="crop" value="Crop" id="crop"  class="btn" /></td>
          </tr>
        </table>
</div><br />
<? } ?>
</div>
	</td>
	 <td background="./images/lightbox_right.gif">&nbsp;</td>
	  </tr>
	  <tr>
		<td><span style="width:25px; height:25px; float:right;"><img src="./images/lightbox_l_b.gif" width="25" height="25" /></span></td>
		<td background="./images/lightbox_bottom.gif">&nbsp;</td>
		<td><span style="width:25px; height:25px; float:left;"><img src="./images/lightbox_r_b.gif" width="25" height="25" /></span></td>
	  </tr>
	</table>
</form>
</td>
<td width="241" valign="top">
<div id="rightadd" style="width:189px; z-index:1002; float:right;" >Right Add
<?php //include("advertisement/add_right.php");  ?>
<br clear="all"/>
</div>
</td>
</tr>
</table>
</body>
</html>