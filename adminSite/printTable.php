<?php

require_once("/pChart/bootstrap.php");

use pChart\pColor;
use pChart\pDraw;
use pChart\pCharts;

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

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}


$data = array();
$sql = "select username, permissions from UserPermissions;";
$result = $conn->query($sql);


echo "<table border='1'>
<tr>
<th>Name</th>
<th>Permission</th>
<th>Toggle Perm.</th>
</tr>";



foreach($result as $row) {
	$u = $row['username'];
	$p = $row['permissions'];
	echo "<tr>";
	echo "<td>" . $row['username'] . "</td>";
	echo "<td>" . $row['permissions'] . "</td>";
	echo "<td><button onclick='toggle($u, $p)'>Toggle</button>";

	echo "</tr>";
}




?>
