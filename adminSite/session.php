<?php
session_start();
if (!isset($_SESSION['login_user'])) {
   header("location: login");
}

function get_login_session($db)
{
   $db = get_mysql_connection();
   $user_check = $_SESSION['login_user'];
   $user_check = mysqli_real_escape_string($db, $user_check);
   $result = mysqli_query($db, "select * from UserTable where username = '$user_check'; ");
   return $result;
}