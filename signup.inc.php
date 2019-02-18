<?php
   if (isset($_POST['signup-submit'])) {

    require_once 'connect.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $passwordRepeat = $_POST['pass12'];

//this is to check if any of the lines in the form are empty

//if so the script must take the user back to the signup site

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ..//signup.php?error=emptyfields&username".$username."&mail=".$email);
        exit();

//this sets up boarders as to which letters can be included in the user name of the signup

    }elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ..//signup.php?error=invaildfields&username".$username."&mail=".$email);
        exit();
    }

    //to check if the two passwords match

    elseif ($password !== $passwordRepeat) {
        header("Location: ..//signup.php?error=emptyfields&username".$username."&mail=".$email);
        exit();
    }

    //connecting to the sql database when adding the informatiion using perpared statements

    else {
        $sql = "SELECT uidUsers FROM users where uidUsers=?";
        $stmt = mysqli_stmt_init($db_server);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ..//signup.php?error=sqlerror");
        exit();

        //this script is to check if the username is already taken or not
        } 
         else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
    
            mysqli_stmt_store_result($stmt);
    
            $resultCheck = mysqli_stmt_num_rows($stmt); }
    }
if($resultCheck > 0) {
        header("Location: ..//signup.php?error=usernameTaken&mail=.$email");
    exit();
    }
   

        //connecting to the sql database when inserting the informatiion using perpared statements

    else {
        $sql = "INSERT INTO users (uidUsers, emailUsers, passUsers) values (?, ?, ?)";
        $stmt = mysqli_stmt_init($db_server);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ..//signup.php?error=sqlerror");
        exit();

        }  
        else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../signup.php?signup=success");
            exit();

            mysqli_stmt_close($stmt);
        mysqli_close($db_server);
        } 
        
    //    else {
    //     header("Location: ../signup.php");
    //     exit(); 

    }
   
   }

?>