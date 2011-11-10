<?PHP

$server = "box710.bluehost.com";//localhost
$user = "marryban_banjara";
$password = "banjara123";
$dbName = "marryban_banjara";

$conn = mysql_connect($server,$user,$password, $dbName)
	or die("There was a problem connecting to MySQL. Please try again later.");

		if (!@mysql_select_db($dbName, $conn))
		{
			die ("There was a problem connecting to the database. Please try again later.");
		}
		return $conn;

	function GetAge($y, $m, $d) {
  $Year = $y;
  $Month = $m;
  $Day = $d;
  $YearDifference  = date("Y") - $Year;
  $MonthDifference = date("m") - $Month;
  $DayDifference   = date("d") - $day;
  if ($DayDifference < 0 || $MonthDifference < 0) {
    $YearDifference--;
  }
  return $YearDifference;
}
?>