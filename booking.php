<?php

require_once 'connect.php';
?>

<?php

$sql = "CREATE TABLE IF NOT EXISTS hotel (
  id int(11)  NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  surname varchar(50) NOT NULL,
  checkin_date date NOT NULL,
  checkout_date date NOT NULL,
  room_type varchar(50) NOT NULL,
  no_of_room varchar(50) NOT NULL,
  amount varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ";



  $username = "";
  $surname = "";
  $checkin_date = "";
  $checkout_date = "";
  $room_type = "";
  $no_of_room = "";
  $amount = "";

  $sql = "INSERT INTO hotel ( username, surname, room_type, checkin_date, checkout_date)
   VALUES ('$username', '$surname', '$room_type', '$checkin_date', '$checkout_date')";

    if ($db_server->query($sql) === TRUE) {
      
    };


//   switch ($hotel) {
//     case ($hotel == "Crystal Hotel"):
//     $price = 500;
//     break;

//     case ($hotel == "Cape Lodge"):
//     $price = 800;
//     break;

//     case ($hotel == "Hotel Cezar"):
//     $price = 850;
//     break;

//     case ($hotel == "Presidente"):
//     $price = 10000;
//     break;
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<div class="navbar">
            <a href="booking.php">Book Now!</a>
            <a href="index.php">Home</a>
        </div>

        <!-- Main header for the page -->

        <div class="header">
            <h1 class="heading">
                Book A Hotel
            </h1>
        </div>

        <!-- Main container with booking content below -->

        <div class="grid-container">
            <div class="grid">
                <form action="book.php" method="post">
        
                First Name:<br>
                <input type="text" name="username" class="firstname" required>
                <br>
                Surname:<br>
                <input type="text" name="surname" class="surname" required>
                
                <div class="hotel-drpdwn">
                    <h2>Select Your Hotel</h2>
                    <select name="hotelname" required>
                        <option name="" value=""</option>
                        <option name="" value="Crystal Hotel">Crystal Hotel and Spa</option>
                        <option name="" value="Cape Lodge">Cape Lodge Hotel</option>
                        <option name="" value="Hotel Cezar">Hotel Cezar</option>
                        <option name="" value="Presidente">Presidente Hotel</option>
                    </select>
                </div>

                <div class="nights">
                    <div class="check-in" >
                        <h3>Check In</h3>
                        <input type="date" name="check-in" required>
                    </div>

                    <div class="check-out" >
                        <h3>Check Out</h3>
                        <input type="date" name="check-out"required>
                    </div>
            </div>

                <button class="button" name="submit"><span>Book Now!</span></button>

                </form>
                <!-- END OF THE FORM -->
            
            </div>

<!-- CONTAINER WHICH DISPLAYS THE BOOKING MADE BY THE USER -->

                <div class="grid">
                    <div class="display">
                    <?php if (isset($_POST['submit'])) {
                        echo "Hello $name $surname, <br>you booked the $hotel <br>from the <br> $checkin <br>until the <br> $checkout for $days nights <br> for the price of <br>R$TotalCost" . '<br><a href="index.php">Return to Home</a> <br><a href="book.php">Make another booking</a>' ;
                    } 
                     // CHECKING FOR DUPLICATES

                    $duplicate = 'SELECT * FROM users WHERE Arrival="$checkin"';
                    $dupresult = $db_server->query($duplicate);

                    
                    $row_cnt = $dupresult->num_rows;

                    if ($row_cnt > 0) {

                    echo "There is a matching record";

                    }
                    ?>
                    </div>
                </div>
            </div>

</body>
</html>
  





  