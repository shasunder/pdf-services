<?
	include("connection.php");
?>
<select multiple="multiple" name="stateofresidence_fromarray[]" size="5" class="formselect" style="width: 175px;">
					<?PHP
					$countryid = explode("|",$_REQUEST['p']);
					for($x=0; $x < count($countryid); $x++)
					{
				$sqlCountry = "SELECT * FROM states,countries where countries.CountryID=states.CountryID and countries.CountryID=".$countryid[$x]." order by states.CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['StateID']?>"						
						><?PHP echo $rowCountry['Country'].":".$rowCountry['State']?></option>
						<?
					}
				}				
				}
				?>
					</select>