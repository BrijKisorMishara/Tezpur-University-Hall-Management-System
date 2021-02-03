<?php
//session_start();
$con = mysqli_connect('localhost','root');
if($con)
{
	echo "Connection Sucessful";
}

else {
	echo "No Connection";
}
mysqli_select_db($con,'project');




$name = $_POST['username'];
$mno = $_POST['mno'];
$email = $_POST['email'];
$pass = $_POST['password'];
$gender = $_POST['gender'];
$userType = $_POST['userType'];

$q = "select * from customer where mobile ='$mno' ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num >= 1)
{
	
	echo"<script> alert('already registered first phase!!!!!!'); </script>";
	echo"<script>location.href = 'http://localhost/project/Registration-Form/index.html';</script>";
}
else
{
	$qy = " insert into customer (name,mobile,email,password,gender,usertype) values('$name','$mno','$email','$pass','$gender','$userType') ";
	if(mysqli_query($con,$qy))
	{
		echo "  Insert Sucessful";
	}
	else
	{
		echo"<script> alert('already registered '); </script>";
		echo"<script>location.href = 'http://localhost/project/Registration-Form/index.html';</script>";
	}
}  

