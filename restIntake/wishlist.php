<?php

//set the headers to allow CORS
header('Access-Control-Allow-Origin: http://157.230.150.204:2020');
header('Access-Control-Allow-Headers: Content-type');

if ($_SERVER['REQUEST_METHOD'] != 'GET' &&
	$_SERVER['REQUEST_METHOD'] != 'POST') {
	exit();
}

$servername = "localhost";
$username = "reporter";
$password = "reportingpassword1!";
$dbname = "bakery_db";

if(!empty($_GET)) {
	$arr = array_keys($_GET);
	$json = json_decode($arr[0], true);
}

if($_SERVER['CONTENT_TYPE'] === "application/json") {
	$json = file_get_contents('php://input');
	$json = json_decode($json, true);
}

$bread = $json['bread'];
$timestamp = $json['timestamp'];

ob_start();
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Wishlist (bread, timestamp) 
	VALUES ('$bread', '$timestamp')";

if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

ob_end_clean();

$conn->close();

?>
