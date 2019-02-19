<?php
//this is to check when the submit button is press the information pass is going to be checked against
//the information in the database

if (isset($_POST['login-submit'])) {

    require_once 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['pass'];

//this is to check if any of the lines in the form are empty

//if so the script must take the user back to the signup site

    if(empty($username) || empty($password)) {
        header("Location: ..//signup.php?error=emptyfields");
        exit();

//this process the information the user inputs saves its if correct using query

//by selecting from the database using mysqli

//and verifying it

    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($db_server);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['passUsers']);

                if($pwdCheck == false) {
                    echo "Wrong Password";
                } 
                elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    echo "Welcome MR. ". $username;
 
                }
            }
        }

    }
}
?>