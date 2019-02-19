<?php
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

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysql_query($checkroom) or die (mysql_error($db_server));
$roomcount=mysql_fetch_array($check);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="UPDATE roomdetail set username='".$username."',checkin_date='".$startdate."',checkout_date='".$enddate."',room_type='".$roomtype."',no_of_room='".$room_nos."',amount='".$amount."' where id='".$id."'";
mysql_query($s1) or die (mysql_error($db_server));
header("location:success.php");
}
}
?>

<div id="contenar">
<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$getdata= "select * from roomdetail where id='".$id."' ";
$check1=mysql_query($getdata) or die (mysql_error($db_server));
$room=mysql_fetch_array($check1);
}
?>
	