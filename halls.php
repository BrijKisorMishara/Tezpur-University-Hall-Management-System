
<?php
session_start();
$con = mysqli_connect('localhost','root');
if($con)
{
	//echo "Connection Sucessful";
}
else
{
	echo "<script>alert('database connetion failed')</script>";
}
mysqli_select_db($con,'project');






if(isset($_GET['hall_id']))
{
	$id=$_GET['hall_id'];
	$q = "select * from halls where  hall_id ='$id' ";
	$result = mysqli_query($con,$q);
	$row = mysqli_fetch_assoc($result);
	$_SESSION['hall_id']=$id;
?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/hall.css">




</head>
<body>
	<div id="wrapper">



	<div id="banner">
		<b><center><h1><?php echo $row['hall_name'];?></h1></Center></b>
		<b><center><h3>Tezpur University</h3></Center></b>
		</div>


	<div id="nav">
		<a href="http://localhost/Project/">Home</a>
		
	<!--	<div id="dropdown">
		<button id="dropbtn">Information</button>
			<div id="dropdown-content">
		 		<a href="display_faculty.php">Faculty Details</a>
				<a href="display_dept.php">Department Details</a>
				<a href="display_course.php">Course Details</a>
				<a href="responsibility.php">Responsibilty</a>
				
			</div>
		</div>
	-->	
		<?php
			echo'<a href="http://localhost/Project/Add-Booking/ex.php?hall_id='.$row['hall_id'].'">Book now</a>';
			
			echo"<a href=halls.php?hall_id=".$row['hall_id']."&charge=1>Charge</a>";
			?>
			<a href="contact.php">Contact Us </a>
			
			<?php
			if(isset($_SESSION['uname']) || isset($_SESSION['muname']) )
			{
				echo '<a href="logOut.php" style="color:red">Logout</a>	';
			}
			else
			{

				echo ' <div id="dropdown">
				<button id="dropbtn">Login</button>
					<div id="dropdown-content">
					<a href="loginform/user.html">User Login</a>
					<a href="loginform/manager.html">Manager Login</a>
					<a href="Registration-Form/index.html">Register user</a>
					
					</div> '; 
			}
			

			?>
			</div>	
	</div>

	<div id="content_area">


<div id="first"><center>	

		<?php
		if(isset($_GET['charge']))
		{
		echo "<h2>hall Charge </h2>";
		echo "<h3>charge for inner: ";
		echo $row['chargein'];
		echo "<h3>charge for outers: ";
		echo $row['chargeout'];
		echo "</h3>";

}
else
{
	?>



<b><p>Description<br><br></b>
		<?php
			echo $row['description'];
		?>

	</p>


	<?php


}
	
			?>
			</center>
</div>
					<div id="second"><center>
		 <img src="images/kbr.jpg" height="300px" width="450">
			
		 			</center>
		 			</div>
					
</div>		
	<div id="footer">
	<p><center>Tezpur University, Napaam, Sonitpur, Assam-784028, INDIA</center></p>

	</div>
	</div>
</body>
</html>

<?php
	}
	else{


	echo"<script>location.href = 'http://localhost/project';</script>";

	}
?>










