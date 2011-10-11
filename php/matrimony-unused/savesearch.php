<?php

session_start();
ob_start();
include("common/config.inc.php");
include("common/function.php");

$id=$_REQUEST['id'];
$session=$_REQUEST['session'];

$sql="INSERT INTO tm_search (Profileid,Searchid) VALUES
('$session','$id')";
mysql_query($sql);

header("Location:search.php");


?>