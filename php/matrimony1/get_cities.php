<?
	include("connection.php");
?>
<select name="cityofbirth" class="forminput">
				<option value="0">Select City</option>
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