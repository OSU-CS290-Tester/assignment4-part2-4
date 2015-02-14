<?php 

ini_set('display errors', 'On');
include 'storedInfo.php';

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "wrighste-db", "ydEX8evfxykcq1xZ","wrighste-db");
if ($mysqli->connect_errono) {
	echo "Failed to connect MYSQL: (" .$mysqli->connect_errno. ")" . .$mysqli->connect_error;

} else {
	echo "connection worked!! <br>";
}
?>