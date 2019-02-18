<?php
session_start();

?>
<?php
//connect to database
// include_once 'connect.php';



// accept link to the database and the query to create the table
    // if(mysqli_query($conn, $sql)) {
    //     echo '<br>Table film created successfully. you may now procced to <a>
    //     href="add.php">add</a> data to the table';
    // }else {
    //     echo "<br> Error create table: " . mysqli_error($conn);
    // }

    //delete the table manually for testing purposes eg. DROP table publications.film;

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===================================================================================================-->

       <body>
	   <div>
	   <?php
	  if (isset($_SESSION['userId']) ) {
		echo '<form action="logout.inc.php" method="post">
		<button type="submit" name="logout-submit">Logout</button>	 ';
	  }
	  else {
		  echo ' <form action= "login.inc.php" method="post">
		  <input type="text" name="username" placeholder="Username">
		  <input type="password" name="password" placeholder="Password">
		  <button type="submit" name="login-submit">Login</button>
		  </form>
			 <a class="signup" href="signup.php">Signup</a>';
	  }

	  ?>
	  
	   
	   </div>
	  <?php
	  if (isset($_SESSION['userId']) ) {
		echo '<p class="login-status"> You are logged in!</p>';
	  }
	  else {
		  echo '<p class="login-status"> You are logged out!</p>';
	  }

	  ?>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

   
        
    </body>
    </html>
