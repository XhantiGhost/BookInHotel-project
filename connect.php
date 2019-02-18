<?php
    require_once 'signup.inc.php';

    // User credentials
    define('DB_Host', 'localhost');
    define('DB_User', 'root');
    define('DB_Pass', '');
    define('DB_Name', 'booking_hotel');

    // Connecting to the database
    $db_server = new mysqli(DB_Host, DB_User, DB_Pass, DB_Name);

    // Checking if there is a connection
    if ($db_server->connect_error) {
        echo "Failed to connect: " . $db_server->connect_error;
    } 

?>