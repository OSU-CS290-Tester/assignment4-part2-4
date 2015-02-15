<?php 
error_reporting(E_ALL);
ini_set('display_errors','On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "wrighste-db", "ydEX8evfxykcq1xZ", "wrighste-db");
if ($mysqli->connect_errno) {
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
	//echo "Connection worked!! <br>"; line used for debugging
}
	if(empty($_POST['name']))
    {
         echo "Please click the back button in your browser and enter a video name";
    } else if(isset($_POST['deleteall'])){
		//echo "Delete all";
		// sql to delete a record
		//TRUNCATE TABLE `table`
		$sql =  "TRUNCATE TABLE webdev1";//"DELETE FROM MyGuests WHERE id=3";
		if ($mysqli->query($sql) === TRUE) {
			echo "All Records deleted successfully";
		} else {
			echo "Error deleting record: " . $mysqli->error;
		}
	} else {
	/* Prepared statement, stage 1: prepare -->NAME */ 
	if (!($stmt = $mysqli->prepare("INSERT INTO webdev1(name,category,length,rented) VALUES (?,?,?,?)"))) {
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	$name = $_POST['name'];
	$category = $_POST['category'];
	$length = $_POST['length'];
	$rented = 1;

	$stmt->bind_param("ssii",$name,$category,$length,$rented);
	
	if (!$stmt->execute()) {	
		echo "Movie Name already Exist in Database!";
		//echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
   } //closing else block above...if emptyname else if deletpressed...then we land here
   if (!($stmt = $mysqli->prepare("SELECT name,category,length,rented FROM webdev1"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	if (!$stmt->execute()) {
		echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	$mysqli->close();

?>