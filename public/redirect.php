<?php

require '../auth.php';

error_reporting(0);

if ($_REQUEST["pin"]) {
    $a = strtolower($_REQUEST["pin"]);
    
    $a = $db->real_escape_string($a);
    $query = "SELECT Link FROM linksmap WHERE short_key = '" . $a . "'";
    
    $result = $db->query($query);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        header('Location: ' . $row["Link"]);
        exit;
    } else {
        header('Location: /?not_found');
        exit;
    }
}
?>