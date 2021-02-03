<?php 

session_start();
$con = mysqli_connect('localhost','root');
if($con)
{

}

else {
	echo "No Connection";
}

if(!isset($_SESSION["uname"]))
{

	echo"<script>location.href = 'http://localhost/Project/loginform/user.html';</script>";
}




mysqli_select_db($con,'project');

$q = "select * from halls";
$result = mysqli_query($con,$q);






?>
<html>
<head>
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> </title>
	<style>


		*{margin:0;padding: 0px;}


		body{
			font-family: arial,helvetica,sans-serif;


		}

		#wrapper{
			align-content: center;
			border: 1px solid black;
			width: 60%;
			height: 80%;
			background-color: #a1f1f1f1;

		}

		#container{
			width: 100%;
			height: 100%;



		}

		.sidenav {
			height: 100%;
			width: 16%;
			position: fixed;

			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			padding-top: 20px;
		}

		.sidenav img {

			height: 100px;
			width: 100px;
		}

		/* Style the sidenav links and the dropdown button */
		.sidenav a, .dropdown-btn {
			padding: 16px;
			text-decoration: none;
			font-size: 18px;
			color: #818181;
			display: block;
			border: none;
			background: none;
			width: 100%;
			text-align: left;
			cursor: pointer;
			outline: none;
			border-radius: 10px;
		}


		.sidenav p {
			padding: 16px;
			text-decoration: none;
			font-size: 20px;
			color: #818181;
			display: block;
			border: none;
			background: none;
			width: 100%;
			text-align: left;
			cursor: pointer;
			outline: none;
		}

		.active {
			background-color: rgba(220, 0, 0, 1);
			color: white;
		}

		/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
		.dropdown-container {
			display: none;
			background-color: #262626;
			padding-left: 8px;
		}


		/* On mouse-over */
		.sidenav a:hover, .dropdown-btn:hover {
			color: #f1f1f1;
		}

		@media screen {
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
		}

		#main {
			float: right;
			position: relative;
			width: 84%;
			border: 2px solid black;
			min-height: 100%;
			overflow-x: hidden;


			/* Same as the width of the sidenav */
			/* Increased text to enable scrolling */

		}

		#nav
		{
			position: relative;
			text-align:center;
			background-color:#c0c0c0;
			width: 100%;
			height: 8%;



		}

		#nav a
		{
			font-size:20px;
			float:left;
			color:black;
			text-align:center;
			padding:14px 16px;
			text-decoration:none;

		}

		#nav p
		{
			font-size:24px;
			float:right;
			display: none;
			color:black;
			text-align:center;
			padding:14px 16px;
			text-decoration:none;

		}


		form.example input[type=text] {
			float: right;

			position: relative;
			height: 40px;
			border: none;
			font-size: 17px;
		}

		form.example button {
			float: right;
			width: 25%;
			padding: 10px;
			background: #2196F3;
			color: white;
			font-size: 16px;
			position: relative;
			border: 1px solid grey;

			cursor: pointer;
		}

		#content{
			min-height: 92%;
			width: 100%;
			position: relative;
			background-color: lightgreen;
			height: 690px;
		}



		table {


			border: 1px solid black;
			border-collapse: collapse;
		}

		th, td {

			padding: 5px;
			border: 1px solid black;
			border-collapse: collapse;
		}

	</style>
</head>

<body>

	<div id="container">


		<div class="sidenav">
			<center>
				<img src="boss.png">  
				<a href="#about"><b>Welcome!! <br> <?php echo $_SESSION['name']?> </b></a>
			</center>
			<hr>


		 <a href="http://localhost/Project/dashboard/student-dashboard.php?confirm=true"> <button class="dropdown-btn">View Hall Requests


			</button></a>


			<div class="dropdown-container">




	 </div>

	 <a href="http://localhost/Project/dashboard/student-dashboard.php?cancel=true"><button class="dropdown-btn">
		View Cancelled Requests
	</button></a>
	<div class="dropdown-container">










</div>


 <a href="http://localhost/Project/dashboard/student-dashboard.php?history=true"><button class="dropdown-btn">View History Requests


</button></a>
<div class="dropdown-container">
	

</div>



 <a href="http://localhost/Project/dashboard/student-dashboard.php?pending=true"><button class="dropdown-btn">Pending Requests


</button></a>
<div class="dropdown-container">
	

</div>



</div>
<div id="main">
 <div id="nav">
	<a href="http://localhost/Project/">Home</a>

	<?php
	if(isset($_SESSION['uname']) || isset($_SESSION['muname']) )
	{
		echo '<a href="../logOut.php" style="color:red">Logout</a> ';
	}


	?>

	<form class="example" action="http://localhost/Project/dashboard/admin.php" method="post" style="margin:auto;max-width:300px">
		<button type="submit">search</i></button>
		<input type="text" placeholder="search records.." name="search">

	</form>
</div>
<hr>
<div id="content">
	<br><br>
	<center>


<?php

	$mod=$_SESSION['uname'];
		 $q = "select * from booking,customer where customer.mobile=booking.mobile AND booking.mobile = '$mod'";
			$result = mysqli_query($con,$q);

			echo "<table>";

			echo"<th>Client Name</th><th>Client Type</th><th>Booking Date</th><th>Apply Data</th><th>Shift</th><th>Status</th>";
			while ($row = mysqli_fetch_assoc($result)) 
			{
			

				if(isset($_GET['confirm']))
				{
					if ($row['status']==30) 
					{
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>confimed</td><tr>";
					}
					
					if ($row['status']=="" || is_null($row['status'])) {
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>Pending</td><tr>";
						
					}
				}

				else if(isset($_GET['cancel']))
				{

					if ($row['status']==-30) 
					{
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>Rejected</td><tr>";
					}
					
				}

				else if(isset($_GET['history']))
				{
					if ($row['status']==30) 
					{
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>confimed</td><tr>";
					}
					else if ($row['status']==-30) 
					{
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>Rejected</td><tr>";
					}
					else if ($row['status']=="" || is_null($row['status'])) {
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>Pending</td><tr>";
						
					}
					else{

					}
					
				}

				else if(isset($_GET['pending']))
				{
					if ($row['status']=="" || is_null($row['status'])) {
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>Pending</td><tr>";
						
					}
				}

				else
				{
					if ($row['status']=="" || is_null($row['status'])) {
					echo"<tr><td>".$row['name']."</td><td>".$row['usertype']."</td><td>".$row['date']."</td><td>".$row['timestamp']."</td><td>".$row['session']."</td><td>Pending</td><tr>";
						
					}
				}



			}

 echo "</table>";


?>
	 
</center>

</div>
</div>

</div>



<script>

	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}




</script>






</body>
</html>