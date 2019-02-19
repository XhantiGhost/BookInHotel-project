<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

//the registration form of the page once you have logged in

//gives the option of chosing the hotel you want e.g.

include('connect.php');
session_start();
if(isset($_POST['sub']))
{
$username=$_POST['username'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];

//create querys to check for availability of rooms 
//and information inputed to the database using sql

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";

$check=mysql_query($checkroom) or die (mysql_error($db_server));

$roomcount=mysql_fetch_array($check);

 $checkcount=$roomcount[0];

if($checkcount>=10) {

?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }

else {

$s1= "INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
mysql_query($s1) or die (mysql_error($db_server));
header("location:success.php");
}
}
?>