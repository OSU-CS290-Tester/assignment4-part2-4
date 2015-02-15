<?php 
error_reporting(E_ALL);
ini_set('display_errors','On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "wrighste-db", "ydEX8evfxykcq1xZ", "wrighste-db");
if ($mysqli->connect_errno) {
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
	echo "Connection worked!! <br>";
}
	if(empty($_POST['name']))
    {
         echo "Please click the back button in your browser and enter a video name";
    } else
	
	{
	/* Prepared statement, stage 1: prepare -->NAME */ 
	if (!($stmt = $mysqli->prepare("INSERT INTO webdev1(id,name,category,length,rented) VALUES (?,?,?,?,?)"))) {
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	$id = $_POST['ID'];
	$name = $_POST['name'];
	$category = $_POST['category'];
	$length = $_POST['length'];
	$rented = 1;

	$stmt->bind_param("issii", $id,$name,$category,$length,$rented);

	if (!$stmt->execute()) {	
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
}
?>