<?php
    include('config.php');
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="language" content="english">
    <title>CSE135 Bakery</title>
    <meta name="description" content="reporting page">
    <meta name="author" content="Meme Bakery Team">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
    include ('table_dump.php');
    table_dump("EventsTable");
    table_dump("EventTypes");
    table_dump("MouseTable");
    table_dump("ScrollTable");
?>
</body>

</html> 
