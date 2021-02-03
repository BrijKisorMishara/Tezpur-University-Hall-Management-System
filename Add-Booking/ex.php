<?php
session_start();
if(!isset($_SESSION["uname"]))
{
	echo"<script>location.href = 'http://localhost/Project/Add-Booking/bookingLogin.php';</script>";
}


$con = mysqli_connect('localhost','root');
if($con)
{
	//echo "Connection Sucessful";
}
else
{
	echo "<script>alert('database connetion failed')</script>";
}mysqli_select_db($con,'project');


if(isset($_SESSION['hall_id']))
{
	$id=$_SESSION['hall_id'];
	$q = "select * from halls where  hall_id ='$id' ";
	$result = mysqli_query($con,$q);
	$row = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html leng="en">
<head>
	<meta charset="utf-8">
	<title>LoginForm</title>
	
	<link rel="stylesheet" type="text/css" href="st.css">
	<script type="text/javascript">
		function textBox() {
			var v = document.getElementById('pourpose').value;
			var t="Other";
			if(v.search(t)==0)
			{
				
				document.getElementById('textBoxFor').innerHTML="<input type='text' placeholder='type your Pourpose' name='pourpose' id='pourpose' class='c3'>";
				document.getElementById('pourpose').focus();	
			}
			
			//alert("hello");
		}

		function charge() {
			var v = document.getElementById('userType').value;
			if(v!="1")
			{
				document.getElementById('amaunt').innerHTML="<p>Payable Amaunt: <span>"+v+" </span> </p>";	
			}
			else
			{
				document.getElementById('amaunt').innerHTML=" ";	

			}
			
				
				
			
		
		}



	</script>
</head>
<body >
	<div id="wrapper">
		<div id="banner">
			<img src="TU_logo.png">
			<b><center><h3>Halls Booking</h3></Center></b>
				<b><center><h1>Tezpur University</h1></Center></b>
				</div>		
				<div id="nav">

					<div class="c1">
						<div class="c2">
							<h2>User</h2>
							<form method="POST" action="bookNow.php">
								<input type="text" name="hall_id" hidden value='<?php echo $_SESSION['hall_id'];
								 ?>' >
							<select class="c3" id="userType" name="userType" onchange="charge()" >
								<option value="1">Select User Type</option>
								<?php 
								echo"<option value=".$row['chargein']." >Userinner</option>";
								echo"<option value=".$row['chargeout'].">Userouter</option>";
								?>
							</select>
							<br>
							<br>
							<div id="textBoxFor">
							<select class="c3" id="pourpose" name="pourpose" onchange="textBox()">
								<option>Pourpose</option>
								<option>Meeting</option>
								<option>Cultural Program</option>
								<option>Drama</option>
								<option>Fashion Show</option>
								<option>VC address</option>
								<option>Convocation</option>
								<option>Other</option>	
							</select>
						</div>

							<br>
							<br>
							<select class="c3" name='bookingType'>
								<option>Booking Type</option>
								<option>First Half</option>
								<option>Second Half</option>
								<option>Full Day</option>
							</select>
							

							<br>
							<br>
							<div>
								<input type="date" name="date" class="c3" placeholder="Date  ">
							</div>
							
							
							<div id="amaunt">
								
							</div> 
							
							
							<br>
							<br>

							
							<div>
								<button type="submit"> SUBMIT</button>

							</div>
							</form>
							<br>


						</div>

						<div class="c5">
							
						</div>
						<div class="c6">

							
						</div>      



					</div>
				</div>
				<div id="footer">
					<p><center>Tezpur University, Napaam, Sonitpur, Assam-784028, INDIA</center></p>
				</div>
			</div>    
		</body>
		</html>