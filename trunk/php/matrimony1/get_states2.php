<?
	include("connection.php");
?>
<select name="stateofresidence" id="stateofresidence" class="field" onfocus="toggleHint('show', 'stateofresidence')" onblur="validate_stateofresidence(this.name);">
<option value="">Select state</option>
				<?
				$sql12 = "SELECT * FROM states where CountryID = ".$_REQUEST['CountryID']." order by StateID";
				$result12 = mysql_query($sql12, $conn);
				if (@mysql_num_rows($result12)!=0){
					while($row12 = mysql_fetch_array($result12))
					{
						?>
						<option value="<?=$row12['StateID']?>"><?=$row12['State']?></option>
						<?
					}
				}				
				?>
				</select>