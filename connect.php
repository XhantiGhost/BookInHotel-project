<?php
    require_once('user.php');

    // Connecting to the database
    $db_server = new mysqli(DB_Host, DB_User, DB_Pass, DB_Name);

    // Checking if there is a connection
    if ($db_server->connect_error) {
        echo "Failed to connect: " . $db_server->connect_error;
    } 
?>