<?php
@ob_start();
session_start();
if($_SESSION["login"] == "validuser") {
include("../common/config.inc.php");
include("../common/function.php");
include("imageResizer.php");	
include("templates/header.template.php");
include("templates/menu.template.php");


class insert_image extends matrimony
{
	function insert(){
		$this->Image_Id=$this->getCount();
		$value=explode(".",$this->imageName);
		$Thumb_image=$value[0]."_T".".".$value[1];
		$Enl_image=$value[0]."_E".".".$value[1];
		$argVal="'".$_REQUEST['Id']."','$this->Image_Id','$this->imageName','I',now(),now(),'$Thumb_image','$Enl_image','new'";
		$fields="Profile_ID,Image_ID,Image_Name,Image_Status,Image_DOM,Image_DOA,image_thumb,image_small,Image_Content";
		$this->switchqry('tm_image','INSERT',$fields,$argVal);
		$directory='../member_image/'.$this->imageName;
		$thumb = new thumbnail($directory,120,100);
		$this->enlarge();
	}
	function update(){
		$value=explode(".",$this->imageName);
		$Thumb_image=$value[0]."_T".".".$value[1];
		$Enl_image=$value[0]."_E".".".$value[1];
		$fields=" Image_Name='$this->imageName',image_small='$Enl_image',image_thumb='$Thumb_image',Image_DOM=now() where Image_ID='".$_POST['img_id']."'";
		$this->switchqry('tm_image','UPDATE',$fields,'');
		$directory='../member_image/'.$this->imageName;
		$thumb = new thumbnail($directory,120,100);
		$this->enlarge();
	}
	function cropupdate(){
		$whrarg = " WHERE Image_ID = '".$_POST['hdimgid']."'";
		$this->switchqry('tm_image','SELECT',$whrarg,'image_small');
		$row=mysql_fetch_array($this->qry_result);

		$targ_w =  $_POST['width'];
		$targ_h = $_POST['height'];
		$jpeg_quality = 90;
		
		$src = '../member_image/'.$row['image_small'];
		
		$imageName=explode(".",$row['image_small']);
		
		if(($imageName[1]=="jpg")||($imageName[1]=="jpeg")||($imageName[1]=="JPG")||($imageName[1]=="JPEG")){
			$img_r = imagecreatefromjpeg($src);
		} else if(($imageName[1]=="png")||($imageName[1]=="PNG")){
			$img_r = imagecreatefrompng($src);
		} else if(($imageName[1]=="gif")||($imageName[1]=="GIF")){
			$img_r = imagecreatefromgif($src);
		}

		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x1'],$_POST['y1'],$targ_w,$targ_h,$_POST['width'],$_POST['height']);
		
		$char1 = strtolower(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 3));
		
		if(($imageName[1]=="jpg")||($imageName[1]=="jpeg")||($imageName[1]=="JPG")||($imageName[1]=="JPEG")){
			$filename = "../member_image/".$char1."_".$row['image_small'];
			imagejpeg($dst_r,$filename,100);
		} else if(($imageName[1]=="png")||($imageName[1]=="PNG")){
			$filename = "../member_image/".$char1."_".$row['image_small'];
			imagepng($dst_r,$filename,100);
		} else if(($imageName[1]=="gif")||($imageName[1]=="GIF")){
			$filename = "../member_image/".$char1."_".$row['image_small'];
			imagegif($dst_r,$filename,100);
		}
		$thumb = new thumbnail($filename,120,100);
		$thumbimg = explode("/",$thumb);
		$fields=" image_thumb='$thumbimg[2]',Image_Content='update',Image_DOM=now() where Image_ID='".$_POST['hdimgid']."'";
		$this->switchqry('tm_image','UPDATE',$fields,'');
		header("location:ManageImage.php");
	}
	function deleteImage(){
		$whrarg=" where Image_ID = '".$_POST['img_id']."'";
		$this->switchqry("tm_image",'DELETE',$whrarg,'');
	}
	function select(){
		$whrarg = " WHERE Profile_ID = '".$_REQUEST['Id']."'";
		$this->switchqry('tm_image','SELECT',$whrarg,'*');
		$this->numimg=mysql_num_rows($this->qry_result);
		$i = 0;
		while($row=mysql_fetch_array($this->qry_result)){
			$this->imgName[$i] = $row['Image_Name'];
			$this->image_thumb[$i] = $row['image_thumb'];
			$this->image_small[$i] = $row['image_small'];
			$this->Image_Status[$i] = $row['Image_Status'];
			$this->imgId[$i] = $row['Image_ID'];
			$i++;
		}
	}
	function insertpassword(){
		$pass=$_POST['txtPwd'];
		$fields="Image_Password = '$pass'  where Profile_ID = '".$_REQUEST['Id']."'";
		$this->switchqry('tm_image','UPDATE',$fields,'');
	}
	function getCount(){
		$this->switchqry('tm_image','SELECT','','count(Image_autoid)');		
		$row=mysql_fetch_array($this->qry_result);
		if($row[0] == 0){
			$reg="BGT_"."1";
		} else {
			$reg=$row[0]+1;
			$reg="BGT_".$reg;
		}		
		return $reg;
	}
	function enlarge(){
		$filename = '../member_image/'.$this->imageName;
		list($width_orig, $height_orig) = getimagesize($filename);
		
		if($width_orig>=400){
			$width = 400;
			$height = 400;
		} else {
			$width =  $width_orig;
			$height = $height_orig;
		}
		
		$originalName=explode(".",$this->imageName);
		if(($originalName[1]=="jpg")||($originalName[1]=="jpeg")||($originalName[1]=="JPG")||($originalName[1]=="JPEG")){
			header('Content-type: image/jpeg');
		} else if(($originalName[1]=="gif")||($originalName[1]=="GIF")) {
			header('Content-type: image/gif');
		} else if(($originalName[1]=="png")||($originalName[1]=="PNG")) {
			header('Content-type: image/png');
		}
		
		list($width_orig, $height_orig) = getimagesize($filename);
		$ratio_orig = $width_orig/$height_orig;
		if ($width/$height > $ratio_orig) {
		   $width = $height*$ratio_orig;
		} else {
		   $height = $width/$ratio_orig;
		}
		
		$image_p = imagecreatetruecolor($width, $height);
		
		if(($originalName[1]=="jpg")||($originalName[1]=="jpeg")||($originalName[1]=="JPG")||($originalName[1]=="JPEG")) {
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			header('Content-type: image/jpeg');
			$filename = "member_image/".$this->imageName;
			$imageName=imagejpeg($image_p, null, 100);
		} else if(($originalName[1]=="gif")||($originalName[1]=="GIF")) {
			$image = imagecreatefromgif($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			header('Content-type: image/gif');
			$filename = "member_image/".$this->imageName;
			$imageName=imagegif($image_p, null, 100);
		} else if(($originalName[1]=="png")||($originalName[1]=="PNG")) {
			$image = imagecreatefrompng($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			header('Content-type: image/png');
			$filename = "member_image/".$this->imageName;
			$imageName=imagepng($image_p, null, 100);
		}
		
		if(($originalName[1]=="jpg")||($originalName[1]=="jpeg")||($originalName[1]=="JPG")||($originalName[1]=="JPEG")){
			header('Content-type: image/jpeg');
			$enlargedImage=$originalName[0]."_E".".".$originalName[1];
			echo $filename = "../member_image/".$enlargedImage;
			imagejpeg($image_p,$filename,100);
		} else if(($originalName[1]=="gif")||($originalName[1]=="GIF")) {
			header('Content-type: image/gif');
			$enlargedImage=$originalName[0]."_E".".".$originalName[1];
			$filename = "../member_image/".$enlargedImage;
			imagegif($image_p,$filename,100);
		} else if(($originalName[1]=="png")||($originalName[1]=="PNG")) {
			header('Content-type: image/png');
			$enlargedImage=$originalName[0]."_E".".".$originalName[1];
			$filename = "../member_image/".$enlargedImage;
			imagepng($image_p,$filename,100);
		}
		header("location:ManageImage.php");
	}
}
$insertimage=new insert_image();

	if($_POST['crop'] == "Crop"){	
		$insertimage->cropupdate();
	} else if($_POST['upload'] == "Upload"){
				if($_POST['img_id'] != ""){		
					if($insertimage->uploadImages()){
						$insertimage->update();
					}	
				} else {
					if($insertimage->uploadImages()){
						$insertimage->insert();
					}
				}
	} else if($_POST['action'] == 'delete'){				
		$insertimage->deleteImage();
	}
	
	if($_POST['txtsubmit']){
		$insertimage->insertpassword();
	}
	
$insertimage->select();
if($_REQUEST['action']=='view'){
	include("templates/viewphoto.template.php");
}else if($_REQUEST['action']=='edit'){
	include("templates/editphoto.template.php");
}else{
	include("templates/addphoto.template.php");
}
include("templates/footer.template.php"); 
} else {
	header("location:./");
}
?>