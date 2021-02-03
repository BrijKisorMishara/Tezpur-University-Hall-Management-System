3<?php
session_start();
$con = mysqli_connect('localhost','root');
if($con)
{
	//echo "Connection Sucessful";
}

else {
	echo "No Connection";
}
mysqli_select_db($con,'project');

$mob = $_POST['mob'];
$pass = $_POST['password'];



$q = "select * from customer where password='$pass' && mobile ='$mob' ";

$result = mysqli_query($con,$q);

$num = mysqli_num_rows($result);

if($num <= 0)
{
	echo"<script> alert('invalid caredential '); </script>";
	echo"<script>location.href = 'http://localhost/Project/Add-Booking/bookingLogin.php';</script>";

}
else{

	$row = mysqli_fetch_assoc($result);
	
	$_SESSION["uname"] = $mob;
	$_SESSION["name"] = $row['name'];

	//http://localhost/Project/Add-Booking/ex.php?hall_id=2
	echo"<script>location.href = 'http://localhost/Project/Add-Booking/ex.php';</script>";
	


?>


<!DOCTYPE html>
<html>
<head>
	<title>dashboard</title>
</head>
<body>
<h2>name : <?php echo $row['name'];  ?></h2>

<h2>mobile : <?php echo $row['mobile'];  ?></h2>

<h2>email : <?php echo $row['email'];  ?></h2>




</body>
</html>




<?php


} 



?>


