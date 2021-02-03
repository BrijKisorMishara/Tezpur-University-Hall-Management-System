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




$name = $_POST['hname'];
$iprice = $_POST['iprice'];
$oprice = $_POST['oprice'];
$desc = $_POST['desc'];


$q = "select * from halls where hall_name ='$name' ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num >= 1)
{

  echo"<script> alert('already registered !!!!!!'); </script>";
  echo"<script>location.href = 'http://localhost/Project/dashboard/admin.php?addnew';</script>";
}
else
{
  $qy = " insert into halls (hall_name,chargein,chargeout,description)
  values('$name','$iprice','$oprice','$desc') ";
  if(mysqli_query($con,$qy))
  {
   
    echo"<script> alert('insertion Sucessful '); </script>";
    echo"<script>location.href = 'http://localhost/Project/dashboard/admin.php?addnew';</script>";

  }
  else{
    echo"<script> alert('already registered '); </script>";
    echo"<script>location.href = 'http://localhost/Project/dashboard/admin.php?addnew';</script>";
  }
}  

?>