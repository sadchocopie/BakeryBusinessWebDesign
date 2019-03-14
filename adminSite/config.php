<?php

/* Database Connection Infromation */
define('DB_SERVER', '157.230.150.204');
define('DB_USERNAME', 'reporter');
define('DB_PASSWORD', 'Reportingpassword1!');
define('DB_DATABASE', 'bakery_db');
/* End of database connection info */

function get_mysql_connection()
{

    // attempt database connection
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    //$db = mysqli_connect($db_host, $db_user, $db_pswd, $db_name);
    if (mysqli_connect_errno()) {
        die('Cannot connect to database');
    }

    // attempt selecting the database
    if (!mysqli_select_db($db, DB_DATABASE)) {
        die('Cannot select ' . DB_DATABASE);
    }
    return $db;
}
?> 