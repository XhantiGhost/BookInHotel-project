<?php

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

$username = $mysql-> escape_string($_POST['username']);
$password = $mysql-> escape_string($_POST['password']);


?>