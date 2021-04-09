<?PHP

$serverName = "localhost";
$dBUserName = "username";
$dBPassword = "password";
$dBName = "project";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn) {
	die("Verbinding mislukt: " . mysqli_connect_error());
}
?>