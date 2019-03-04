<?php
include('session.php');
function table_dump($table_name)
{
    /* Database Connection Infromation */
    $db_host = '157.230.150.204';
    $db_user = 'reporter';
    $db_pswd = 'Reportingpassword1!';
    $db_name = 'bakery_db';
    /* End of database connection info */

    // attempt database connection
    $link = mysqli_connect($db_host, $db_user, $db_pswd, $db_name);
    if (mysqli_connect_errno()) {
        die('Cannot connect to database');
    }

    // attempt selecting the database
    if (!mysqli_select_db($link, $db_name)) {
        die('Cannot select ' . $db_name);
    }

    // attempt querying the entire database
    $result = mysqli_query($link, "SELECT * FROM {$table_name}");
    if (!$result) {
        die('query failed');
    }

    // get the count of the fields of the databse
    $num_fields = mysqli_num_fields($result);

    // begin printing the table
    echo "<h1>{$table_name}</h1>";

    // table creation stuff 
    echo "<table border='1'>\n";
    echo "<tr>";

    // loop over the fields to set the table header
    for ($i = 0; $i < $num_fields; $i++) {
        $field = mysqli_fetch_field($result);
        echo "<td>{$field->name}</td>";
    }
    echo "</tr>\n";
    // end loop 

    // track if the table is empty or not
    $empty = true;

    // loop over the rows in the query
    while ($row = mysqli_fetch_row($result)) {
        $empty = false;// it's not empty
        echo "<tr>";
        //loop over the fields to add to the table
        for ($i = 0; $i < $num_fields; $i++) {
            echo "<td>{$row[$i]}</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>";
    // end loop

    // print empty message if table was empty
    if ($empty) {
        echo '<br/>';
        echo 'table is empty';
    }
}
 
