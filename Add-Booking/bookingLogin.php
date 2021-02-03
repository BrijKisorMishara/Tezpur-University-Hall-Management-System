<!DOCTYPE html>
<html leng="en">
<head>
	<meta charset="utf-8">
	<title>LoginForm</title>
	<link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="c1">
		<div class="c2">
			<img   src="TU_logo.png" id="i1" >
			<h2>User Login</h2>
			<form action="bookingLogin1.php" method="post">
				<div>
					<input type="text" name="mob"  id="mob" class="c3" placeholder="Mobile No" required>
					
				</div>
				<br>
				<div>
					<input type="Password" name="password" id="password" class="c3" placeholder="Password" required>
					
				</div>
				<br>
				<div>
					<button type="submit"> LOGIN</button>
	
				</div>
				<br>
			</form>
			<div class="c4">
				<h4> <a href="http://localhost/Project/Registration-Form/index.html"> Not a user!! Register</a></h4>
			</div>
			
		</div>
		
	</div>

</body>
</html>