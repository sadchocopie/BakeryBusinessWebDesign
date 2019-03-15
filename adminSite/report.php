<?php
include 'config.php';//to handle the database connection
include 'session.php';//to handle the UserTable query
define('IS_ADMIN',2);//to get the right column from the query

$session_info = get_login_session(get_mysql_connection());
$user = mysqli_fetch_row($session_info);
if($user[IS_ADMIN]){
    include 'admin-report.html';
}else{
    //include 'baker-report-render.php';
    include 'baker-report.html';
}

?>