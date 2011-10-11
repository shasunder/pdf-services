<div style="padding: 1px 0pt 3px 0px; width: 748px; margin-right: 14px;">
<a href="index.php" title="Matrimonial Home" class="smallbluelink" style="color:#000066;">Home</a> | <a href="aboutus.php" title="About Us" class="smallbluelink" style="color:#000066;">About Us</a> | <a href="contactus.php" title="Contact Us" class="smallbluelink" style="color:#000066;">Contact Us</a>
<?PHP
if($_SESSION['UserID']!="")
{
?>
 | <a href="myaccount.php" title="My Account" class="smallbluelink" style="color:#000066;">My Account</a> | <a href="logout.php" title="Log Out" class="smallbluelink" style="color:#000066;">Log Out</a>
<?PHP
}
?>		
<br clear="all"></div>