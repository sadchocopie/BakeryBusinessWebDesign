<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {


	$myusername = mysqli_real_escape_string($db,$_POST['username']);
	$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

	$sql = "SELECT * FROM UserTable WHERE username = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
	            
	$count = mysqli_num_rows($result);
	
	if($count == 1) {
		$_SESSION['login_user'] = $myusername;
		header("location: index.php");
	}else {
		echo "Your Login Name or Password is invalid";
		header("location: login.html");
	}
}
?>       
