
<?php
require_once 'index.php'

$sql = "CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

?>

//INSERT INTO `login` (`id`, `username`, `password`) VALUES (NULL, 'admin', 'admin');