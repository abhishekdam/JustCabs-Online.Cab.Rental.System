<?php
include("db.php");
include("auth.php");


if(isset($_REQUEST['pickup'])){
$pickup = stripslashes($_POST['pickup']);
 $pickup = mysqli_real_escape_string($con,$pickup); 
 $dropto = stripslashes($_POST['dropto']);
 $dropto = mysqli_real_escape_string($con,$dropto);	
 $cartype = stripslashes($_POST['cartype']);
 $cartype = mysqli_real_escape_string($con,$cartype);
 $us=$_SESSION["userid"];
 
 $query1 = "INSERT into `citydummy` (pickup, dropto, cartype, userid)
VALUES ('$pickup', '$dropto', '$cartype', '$us')";
$result = mysqli_query($con,$query1);
	if($result){
            echo "<div class='form'>
<center><h2>booking successfully.</h3></center>
<br/><center>Click here to <a href='billcity.php'>Generate bill.</a></center></div>";
        }
    }else{
?>
	


<!DOCTYPE html>
<html>
<head>
  <a href="index.php">  <img src="images/logo2.jpg"  alt="Smiley face" width="250" height="50" align="left"></a>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" type="text/css">
     <link rel="stylesheet" href="css/style2.css" type="text/css">
    <style>
    .bg-img {
  /* The image used */
  background-image: url("images/cityman.jpg");

  min-height: 520px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
    </style>
</head>
<body bgcolor="#FBFBFD">

    <div class="topnav">
    <a href="rental.php">Rental</a>
    <a href="outstation.php">Outstation</a>
    <a href="citytaxi.php">City Ride</a>
  <a class="active" href="index.php">Home</a>
  <p align="right"> Welcome <?php echo $_SESSION['userid']; ?>    .</p>
  <a class="active" href="logout.php">Logout</a>
   <a class="active" href="profile.php">Profile</a>
</div>
    
    <center><h1><font color="green">CITY TAXI</font></h1></center>
<div class="bg-img">
  <form action="billcity.php" class="container" method="POST">
    <h1>Book a City Ride</h1>

    <label for="from">From:</label>
 
 <select name="pickup" required />  

    <option value="">Pickup location.</option>
   <?php 
   $que="select * from place";
   $run = mysqli_query($con,$que);
   while($row=mysqli_fetch_array($run))
   {
	   ?>
  <option value=" <?php  echo $row['pvalue'];?>"><?php  echo $row['pname'];?></option>
   <?php } ?>
    </select>

    <label for="to">To:</label>
	<select name="dropto" required />  

    <option value="">Drop location.</option>
   <?php 
   $que2="select * from place";
   $run2 = mysqli_query($con,$que2);
   while($row2=mysqli_fetch_array($run2))
   {
	   ?>
  <option value=" <?php  echo $row2['pvalue'];?>"><?php  echo $row2['pname'];?></option>
   <?php } ?>
    </select>
      <label for="choose">Please select Cab Type:</label>
      <select name="cartype">
    <option value="">Car type</option>
   <?php 
   $que1="select * from cartype";
   $run1 = mysqli_query($con,$que1);
   while($row1=mysqli_fetch_array($run1))
   {
	   ?>
  <option value=" <?php  echo $row1['cvalue'];?>"><?php  echo $row1['ctype'];?></option>
   <?php } ?>
    </select>

<button type="submit" name="submit" class="btn">Book now</button>
  </form>
</div>


<?php } ?>
</body>
</html>