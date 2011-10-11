<?php
include("common/config.inc.php"); include("common/function.php");
$arg2="*";
if($_REQUEST['vlogin']) {
	$ulogin=$_REQUEST['vlogin']; $field=$_REQUEST['field']; $table=$_REQUEST['table']; $spanId=$_REQUEST['spanId']; 
	$arg1 = " WHERE $field ='".$ulogin."'";
	$matrimony->switchqry($table,'SELECT',$arg1,$arg2);
	if(mysql_num_rows($matrimony->qry_result)>0)
	{echo "*Sorry already available!#$ulogin#$spanId#Login ID#logintextfield";} else {echo "*Available#$ulogin#$spanId#Login ID#logintextfield";} }

if($_REQUEST['vemail']) 
{
	$email=$_REQUEST['vemail']; $field=$_REQUEST['field']; $table=$_REQUEST['table']; $spanId=$_REQUEST['spanId'];
	$arg1 = " WHERE $field ='$email'"; 
	$matrimony->switchqry($table,'SELECT',$arg1,$arg2);
	if(mysql_num_rows($matrimony->qry_result)>0)
	{ echo "*Email ID has used Already!#$email#$spanId#Email ID#emailtextfield"; }else { echo "*Available#$email#$spanId#Email ID#emailtextfield"; } } 
?>