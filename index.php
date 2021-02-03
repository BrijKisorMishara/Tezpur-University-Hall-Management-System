
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

$q = "select * from halls";
$result = mysqli_query($con,$q);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="wrapper">
		<div id="banner">
			<a href="http://localhost/Project/"><img src="TU_logo.png"></a>
			<b><center><h3>Hall Booking Portal</h3></Center></b>
				<b><center><h1>Tezpur University</h1></Center></b>
				</div>

				<div id="nav">
					<a href="http://localhost/Project/">Home</a>
					<div id="dropdown">
						<button id="dropbtn">Halls</button>
						<div id="dropdown-content">
							<?php
							
							
							while ($row = mysqli_fetch_assoc($result)) {
					//echo "" + $row['hall_name'];
								echo"<a href=halls.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
							}
				/*<a href="kbr.html">Kalaguru Bishnuprosad Rabha Auditorium (KBR)</a>
				<a href="saikaini.html">Chandraprapha Saikiani Hall</a>
				<a href="community.html">Community Hall</a>
				<a href="council.html">Council Hall</a>
				<a href="seminar.html">Seminar Hall</a>
				<a href="lecture.html">Lecture Hall</a>*/

				?>



				
			</div>
		</div>
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
	<br>
	<center>
		<div id="slider" >


		</div>  
		<b><p>About TU</p></b><p>There are four main halls in Tezpur University I)Kalaguru Bishnuprosad Rabha Auditorium II)Chandraprapha Saikiani Hall III)Community Hall IV)Council Hall</p>
		<p>These halls can be booked by university assicoated and non-university assicoated persons. The description of respective halls booking charge can be found in the halls section. </p> <p>Tezpur University was established by an Act of Parliament in 1994. The objects of this Central University as envisaged in the statutes are that it shall strive to offer employment oriented and interdisciplinary courses to meet the local and regional aspirations and the development needs of the state of Assam and also offer courses and promote research in areas which are of special and direct relevance to the region and in emerging areas in Science and Technology....</p>
		
	</center>
</div>
<div id="footer">
	<p><center>Tezpur University, Napaam, Sonitpur, Assam-784028, INDIA</center></p>

</div>
</div>
</body>
</html>

