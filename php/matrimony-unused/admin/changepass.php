<?
session_start();
ob_start();
if($_SESSION["login"] == "validuser") {
	include("../common/config.inc.php");
	include("templates/header.template.php");
	include("templates/menu.template.php");
	include("templates/changepass.template.php");
	include("templates/footer.template.php");  
	echo"<span>&nbsp;</span>";
	if($_POST)
	{
		$oldpassword=$_POST['oldpass'];
		$newpassword=$_POST['newpass'];
		/*$result= "UPDATE user SET password='$newpassword' WHERE id='".$_SESSION['admin_ID']."' and password='".$oldpassword."'";
		$qry=mysql_query($result);*/
		
		$resul= "UPDATE tm_admin SET ad_Password='$newpassword',ad_DOM=now() WHERE ad_ID='".$_SESSION['admin_ID']."' and ad_Password='".$oldpassword."'";
		$qrye=mysql_query($resul);
		if(mysql_affected_rows()==1)
		{ ?> 
		<span  style="position:absolute; left:380px; top:110px"  ><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Your password has been Successfully Changed !</font>
			</strong></span>
	   <?
		}
		else{ ?>
			<span style="position:absolute; left:450px; top:110px" ><font  color='#FF0000' size="2" face="Verdana, Arial, Helvetica, sans-serif" >Incorrect Old Password!</font></span>
			<? 
		}
	}
}else{
	header("Location:index.php");
}
?>