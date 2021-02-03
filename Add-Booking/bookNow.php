<?php
session_start();

$con = mysqli_connect('localhost','root');
if($con)
{
	echo "Connection Sucessful";
}

else {
	echo "No Connection";
}
mysqli_select_db($con,'project');




if(isset($_SESSION["uname"]))
{
	$date = $_POST['date'];
	$userType = $_POST['userType'];
	$pourpose = $_POST['pourpose'];
	$bookingType = $_POST['bookingType'];
	$hall_id = $_SESSION['hall_id'];
	$mobile=$_SESSION["uname"];


	$today=date("Y-m-d");
	if($today > $date)
	{
		echo"<script> alert('invaliod date'); </script>";
		echo"<script>location.href = 'http://localhost/Project/Add-Booking/ex.php';</script>";
	}


	$q = "select * from booking where date ='$date' ";

	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);

	if($num >= 1)
	{

		echo"<script> alert('hall is not free on ".$date."'); </script>";
		echo"<script>location.href = 'http://localhost/Project/Add-Booking/ex.php';</script>";
	}
	else
	{
		

		$qy = " insert into booking (session,date,mobile,hall_id)
		values('$bookingType','$date','$mobile','$hall_id')";

		if(mysqli_query($con,$qy))
		{
			echo"<script> alert('data inserted Sucessfully'); </script>";
		}
		else
		{
			echo"<script> alert('data not inserted '); </script>";
			echo"<script>location.href = 'http://localhost/Project/Add-Booking/ex.php';</script>";
			
		}
	}

}



else
{
	echo"<script>location.href = 'http://localhost/Project/Add-Booking/bookingLogin.php';</script>";
}

?>