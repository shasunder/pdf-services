<?
	include("connection.php");
?>
<select id="nearest_city" name="nearest_city" class="field" onfocus="toggleHint('show', 'nearest_city')" onblur="toggleHint('hide', 'nearest_city'); checkStyleSelect(this, 'field', 'field_filled');"><option value="">Select a city</option>
				<?
				$sql12 = "SELECT * FROM cities where CountryID = ".$_REQUEST['CountryID']." order by CityID";
				$result12 = mysql_query($sql12, $conn);
				if (@mysql_num_rows($result12)!=0){
					while($row12 = mysql_fetch_array($result12))
					{
						?>
						<option value="<?=$row12['CityID']?>"><?=$row12['City']?></option>
						<?
					}
				}				
				?>
				</select>