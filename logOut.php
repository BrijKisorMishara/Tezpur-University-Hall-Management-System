<?php  
	session_start();
	if(isset($_SESSION["muname"]))
	{
		unset ($_SESSION["muname"]);	
	}

	if(isset($_SESSION["mname"]))
	{
		unset ($_SESSION["mname"]);	
	}
	
	if(isset($_SESSION["uname"]))
	{
		unset ($_SESSION["uname"]);	
	}

	if(isset($_SESSION["mname"]))
	{
		unset ($_SESSION["mname"]);	
	}

	echo"<script>location.href = 'http://localhost/Project/'; </script>"
	
?>

