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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<style>

.contact {
	background-color: grey;
	margin-top: 100px;
	margin-bottom: 20px;
  border: 2px solid black;
  border-radius: 10px;
  height: 40%;
  width: 40%;
  
}

.heading{
  padding-left: 35px;
  font-size: 18px;
    color: #212121;
}

.subimage{
  
  
}


.subheading{
  
  height: auto;
  width: auto;
}
</style>
</head>
<body>
	<div id="wrapper">
		<div id="banner">
		<a href="http://localhost/Project/"><img src="TU_logo.png"></a>
		<b><center><h3>Hall Booking Portal</h3></Center></b>
		<b><center><h1>Tezpur University</h1></Center></b>
		</div>

	<div id="nav">
		<a href="http://localhost/Project">My Page</a>
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

	<div id="content_area">

	
					<center>
			


			<div class="contact">
				
<div class="heading">
  <h2 ><u>Contact Person</u></h2>	
</div>
	  
  
 <h3> <img src ="icon/user.png" style='vertical-align: bottom' width="25px" height="25px" />  Mr. Prafulla Borah (Estate Officer)</h3>
  <h3> <img src ="icon/call.png" style='vertical-align: bottom' width="25px" height="25px" />   03712-27-3107    Mobile: 986443125</h3>
   <h3> <img src ="icon/email.png" style='vertical-align: bottom' width="25px" height="25px" />                pborah8@tezu.ernet.in</h3>
    
     			</div>
    



					</center>
					<h3><img src ="icon/map.png" style='vertical-align: bottom' width="25px" height="25px" />Office Address Google Map Info -----------------------------------------------------------------------------------------------------------</h3>



					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d773.9060829346782!2d92.83218582918077!3d26.70039919705182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDQyJzAxLjQiTiA5MsKwNDknNTcuOCJF!5e1!3m2!1sen!2sin!4v1575434163902!5m2!1sen!2sin"  border="5" width=100% height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>
	<div id="footer">
	<p><center>Tezpur University, Napaam, Sonitpur, Assam-784028, INDIA</center></p>

	</div>
	</div>
</body>
</html>

