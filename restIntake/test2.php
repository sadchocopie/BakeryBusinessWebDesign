<?php

require 'vendor/autoload.php';
$result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
echo $result->browser->toString();
echo $result->device->type;
?>
