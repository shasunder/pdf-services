<?
	$matrimony=new matrimony();
	$action=$_REQUEST['action'];
   	$link="ManageImage.php";
	$atid=$_REQUEST['encid']?$_REQUEST['encid']:$insertimage->imgId[0];
	$condition=" where Profile_ID='".$_GET['Id']."' and Image_ID = '$atid'";
	$matrimony->switchqry('tm_image','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
?>

<h2>View Image </h2>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<b><a href="<? echo $link; ?>">Go Back</a> </b>
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<form name="sample" method="post" class="box" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data"  >
		<div style="height:107px">
			<?php 
			for($i=0;$i<5;$i++){
			if($insertimage->image_thumb[$i] != ""){ ?>
			<div class="add_photo_link" style="cursor:pointer; border:double #EBF4F5; width:90px; height:85px;">
				<a href="?Id=<?=$_GET['Id']?>&action=view&encid=<?=$insertimage->imgId[$i]?>" style="text-decoration:none;">			
					<img src="../member_image/<?=$insertimage->image_thumb[$i]?>" style="height:85px; width:90px;" border="0" />
				</a>
			</div>
			<? } 
			}
			?>
		</div>
		<br />
<? if($value['Image_Name']){ ?>
<div class="search_100"> 
	    <table width="553" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th width="330" height="41" align="left"> <font size="1.5" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Full Image</font></th>
          </tr>
          <tr>
            <td>
				<img src="../member_image/<?=$value['Image_Name']?>" />
			</td>
          </tr>
        </table>
</div><br />
<? } ?>
</div>
</form>