<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "config.php";

    $db = get_mysql_connection();
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM UserTable WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        
        //die(var_dump($_SESSION));
        header("location: report");
    } else {
        header("location: login");
    }
} else {
    header("location: login");
}