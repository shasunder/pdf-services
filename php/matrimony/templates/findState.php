<?php
$country=intval($_GET['country']);
$multi = $_REQUEST['page'];
$stateEdit = $_REQUEST['state'];
include_once("../common/state.php");
if($multi == 'third')
{ ?>
<select name="ddlstate" size="1" multiple="multiple" class="textfield" id="ddlstate" style=" height:70px; width:225px;" onchange="gethdValue('ddlstate','stateHd');getLocation('','<?=$country?>','ddlstate','citydiv','third','multicity','');ddlClearmulti('ddlstate','stateError');" onblur=" ddlEmptyChkmulti('ddlstate','stateError','Select your State');">
<? } else if($multi == 'myProfile') {
?>
<select name="ddlstate" id="ddlstate" class="selecttbox_p" multiple="multiple" style="height:70px;overflow:scroll" onclick="gethdValue('ddlstate','stateVal');" onchange="gethdValue('ddlstate','stateVal');ddlClear('ddlstate','stateError');" onblur="ddlEmptyChk('ddlstate','stateError','Please select the State');">
<? } else {
?>
<select name="ddlstate" id="ddlstate" class="textfield" style="width:180px; height:auto;overflow:scroll"  onchange="gethdValue('ddlstate','stateHd'); ddlClear('ddlstate','stateError');" onblur="ddlEmptyChk('ddlstate','stateError','Please select the State'); gethdValue('ddlstate','stateHd');">
<? } ?>
<option>Select</option>
<? for($i=0;$i<$count-1;$i++) {
if($stateEdit == $one[$i])
{ ?>
	<option value=<?=$i;?> selected ><?=$one[$i];?></option>
<? }
else {
?>

<option value=<?=$i;?>><?=$one[$i];?></option>
<? } } ?>
</select> <input type="hidden" name="stateHd" id="stateHd" value=""><input type="hidden" name="stateVal" id="stateVal" value="<?= $myProfile->profileResult['State'] ?>"> </div>