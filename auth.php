<?php

$dbhost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
$dbusername = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbpassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$db_name = getenv('OPENSHIFT_APP_NAME');

$db = new mysqli($dbhost, $dbusername, $dbpassword, $db_name) or die("Database Connection Failed:" . mysqli_error());
?>
