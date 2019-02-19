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
    <!-- this part is where the booking happens and information is stored -->

    <!-- first part welcomes the user with their username displayed -->

<div id="r">
	<form action="register.php" method="POST">
	<h2 align="center" id="h"><u><i>Book Room</i></u></h2>
  <h3> Welcome <?php session_start();

   if(isset($_SESSION['username'])){
     
     echo $_SESSION['username'];
     
     } 
     
     ?> !!!</h3>
     <!-- create a table that requires the checkin dates etc.  -->
     <!-- using post to store them  -->
        <table >
		
          <tr>
            <td width="113">Check in Date</td>
            <td width="215">
              <input name="startdate1" type="date"  value="<?php if(isset($_POST['startdate1']))
              { echo $_POST['startdate1']; }?>" /></td>
          </tr>
          <tr>
            <td>Check out Date</td>
            <td>
              <input name="enddate1" type="date" value="<?php if(isset($_POST['enddate1']))
              { echo $_POST['enddate1']; }?>" onchange='this.form.submit()' /></td>
          </tr>
			
       </table>
		</form>
		<form action="register.php" method="POST">
        <table >
		
          <tr>
            <td width="113"></td>
            <td width="215">
              <input name="startdate" type="hidden" value="
               <?php if(isset($_POST['startdate1'])){
                  echo $_POST['startdate1']; }?> " /></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="username" type="hidden" value="
            <?php session_start();
             if(isset($_SESSION['username'])){
                echo $_SESSION['username']; } ?>"  />
              <input name="enddate" type="hidden" value=" 
              <?php 
              if(isset($_POST['enddate1'])){
                 echo $_POST['enddate1']; }?> "  /></td>
          </tr>
		  <tr>
            <td>Room Type </td>
            <td>
              <select class="text_select" id="field_1" name="field_1" >  
<option value="00">- Select -</option> 

  <!--date is selected here using dropdown method  -->
  
<?php if(isset($_POST['startdate1'])){
$paymentDate = $_POST['startdate1'];
$contractDateBegin = '2018-12-20';
$contractDateEnd ='2025-03-25';

// payment mmethod and how much it will cost for the period of the stay

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd))
{
 $s2="select * from roomtype where room_seson ='high season' ";
$s3=mysql_query($s2);
}
else
{
$s2="select * from roomtype where room_seson='low season' ";
$s3=mysql_query($s2);
}


?>
<?php while($catdata=mysql_fetch_array($s3)) { ?>  <option value="<?php echo $catdata['room_price']; ?>"><?php echo $catdata['room_type']; ?></option>
           <?php } ?>
		   <?php } ?>
           </select></td>
          </tr>
		  <tr>
            <td>Price per Room</td>
            <td>
             <span id="a1"  ></span>$
           </td>
          </tr>
		   <tr>
            <td>No. of Guest per Room</td>
            <td>
              <input name="guest" type="text " size="10"/></td>
          </tr>
		  <tr>
            <td>No. of Rooms </td>
            <td>
              <input name="room_nos" id="room_nos" type="text " size="10" onChange="gettotal1()" /></td>
          </tr>
		  <tr>
            <td>Total Amount To Pay</td>
            <td>
             <input type="text" name="roomprice" id="total1"  size="10px" readonly="" />
           </td>
          </tr>
		  
          <tr>
            <td colspan="2" align="center">
			<input type="submit" name="sub" value="Pay & Book" /></td>
            </tr>
			
       </table>
		</form>
		
		<script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
 var strUser=document.getElementById('a1').innerHTML=strUser;




}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('room_nos').value;
      var gender3=parseFloat(gender1)* parseFloat(gender2);
			
      document.getElementById('total1').value=gender3;
	
   }
			</script>
 
		
	</div>

</body>
</html>