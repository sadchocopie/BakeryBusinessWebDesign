<?php
include 'config.php'; //to handle the database connection
include 'session.php'; //to handle the UserTable query
define('IS_USER', 2); //to get the right column from the query

$session_info = get_login_session(get_mysql_connection());
$user = mysqli_fetch_row($session_info);
if ($user[IS_USER] == 0) {
    include 'baker-extra.html';
} else {
    //bounce them if they're signed out
    header("location: /login");
}