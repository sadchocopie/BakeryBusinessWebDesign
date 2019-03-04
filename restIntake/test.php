<?php

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || 
	$_SERVER['REQUEST_METHOD'] == 'DELETE') {
	exit();
}

require 'vendor/autoload.php';
$result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
$browser = $result->browser->toString();
$device = $result->device->type;

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

$cookie = $json['cookie'];
$timestamp = $json['timestamp'];
$resolution = $json['resolution'];
$url = $json['url'];
$js = $json['js_enabled'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO ClientTable (cookie, timestamp, device, browser, resolution, url, js)
	VALUES ('$cookie', '$timestamp', '$device', '$browser', '$resolution', '$url', '$js')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();

?>
