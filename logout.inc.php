<?php
//logout page is simple it is just to start a session and destory it and then taking us

//back to the index page


session_start();
session_unset();
session_destroy();
header("Location: ../index.php");


?>
