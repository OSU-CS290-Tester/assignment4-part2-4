<?php 

ini_set('display_errors', 'On');

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "wrighste-db", "ydEX8evfxykcq1xZ" ,"wrighste-db");
if ($mysqli->connect_errno) {
	echo "Failed to connect MYSQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
	echo "Connection worked!! <br>";
}
?>