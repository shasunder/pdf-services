<?
$country=intval($_GET['country']);
$state=intval($_GET['state']);
$pgname = $_REQUEST['page'];
include("../common/city.php");
//multiselectbox city
if($pgname == 'third'){ ?>
<select name="ddlcity" size="1" multiple="multiple" class="textfield" id="ddlcity" style="width:100px; height:70px; width:225px;" onchange="gethdValue('ddlcity','cityHd');ddlClearmulti('ddlcity','cityError');" onblur=" ddlEmptyChkmulti('ddlcity','cityError','Select your City');">
<option>-select-</option>
<? for($i=0;$i<$countCity-1;$i++) { ?>
<option value=<?=$i;?>><?=$two[$i];?></option>
<? } ?>
</select> <input type="hidden" name="cityHd" id="cityHd" value="">
<? } //if end
//city textbox auto load
else {
$q=$_GET["q"];//lookup all hints from array if length of q>0
if (strlen($q) > 2) { $hint=""; 
	  for($i=0; $i<count($two); $i++) {
		if (strtolower($q) == strtolower(substr($two[$i],0,strlen($q)))) {
		if ($hint=="") {
		$hint=$two[$i]; } else {
		$hint=$hint." , ".$two[$i]; } } }
}
if ($hint == "") { $response="";
} else { $response=$hint; }
if($response=="") {
?>
	<div style="padding-left:0px;padding-top:0px;background-color:#FFFFFF;" id="show1">
	</div>
<? } else {
	$value=explode(",",$response);
	$count=sizeof($value);
	?>
	<div style="background-color:#FFFFFF;z-index:1000;z-index:5000px;position:absolute">
	<div style="background-color:white;width:178px;padding-left:0px; height: 100px; overflow:scroll;overflow-x:hidden;overflow-y:auto;z-index:1000;border:1px solid #cccccc" id="show" onmouseover="document.getElementById('show').style.display='';" onclick="document.getElementById('show').style.display='none';">
	<?
	for($i=0;$i<$count;$i++) {
		?>
		<input type="hidden" class="textfield"  name="" id="test<? echo $i; ?>" value="<? echo $value[$i];?>" />
		<div style="background-color:#ffffff;z-index:10000px;margin:0px;padding-left:0px" id="option<? echo $i;  ?>">
		<input type="text" class="textfield"  style="border:0px;width:170px;height:20px;padding-left:5px" name="" id="city<? echo $i; ?>" value="<? echo $value[$i];  ?>" onmouseover="document.getElementById('city<? echo $i;  ?>').style.backgroundColor='#cccccc';document.getElementById('txtCity').value=document.getElementById('test<? echo $i; ?>').value; " 
		onmouseout="document.getElementById('city<? echo $i;  ?>').style.backgroundColor='#ffffff';" >
		</div>
		<?
		}
	?>
</div>
</div>
<?
}
} //else if end

?>