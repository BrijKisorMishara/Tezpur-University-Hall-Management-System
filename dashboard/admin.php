<?php 

session_start();
$con = mysqli_connect('localhost','root');
if($con)
{

}

else {
  echo "No Connection";
}

if(!isset($_SESSION["muname"]))
{

  echo"<script>location.href = 'http://localhost/Project/loginform/manager.html';</script>";
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
        <a href="#about"><b>Welcome!! <br> <?php echo $_SESSION['role_name']?> </b></a>
      </center>
      <hr>


      <button class="dropdown-btn">View Hall Requests


      </button>
      <div class="dropdown-container">

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          //echo "" + $row['hall_name'];


          if(strcasecmp($_SESSION['role_name'], "CSEHOD")==0)
          {
            if(strcasecmp($row['hall_name'], "cse seminarhall")==0)
            {
              echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
            }
          }

          else if(strcasecmp($_SESSION['role_name'], "dean")==0)
          {
            if(strcasecmp($row['hall_name'], "deans gallery")==0)
            {
              echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
            }
          }

          else if(strcasecmp($_SESSION['role_name'], "mathshod")==0)
          {
            if(strcasecmp($row['hall_name'], "maths seminarhall")==0)
            {
              echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
            }
          }








          else if(strcasecmp($_SESSION['role_name'], "dr")==0)
          {
            echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";

          }
          else if(strcasecmp($_SESSION['role_name'], "dsw")==0)
          {
            if(strcasecmp($row['hall_name'], "community hall")==0)
            {
              echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
            }
          }

          else if(strcasecmp($_SESSION['role_name'], "hod")==0 )
          {
           if(strcasecmp($row['hall_name'], "seminar hall")==0)
           {
             echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
           }
         }

         else 
         {
          if(strcasecmp($row['hall_name'], "community hall")==0 || strcasecmp($row['hall_id'], "seminar hall")==0)
          {
          }
          else
          {
           echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";

         }
       }


     }

     ?>




   </div>

   <button class="dropdown-btn">
    View Cancelled Requests


  </button>
  <div class="dropdown-container">











    <?php
    $q = "select * from halls";
    $result = mysqli_query($con,$q);
    while ($row = mysqli_fetch_assoc($result)) {
          //echo "" + $row['hall_name'];


      if(strcasecmp($_SESSION['role_name'], "CSEHOD")==0)
      {
        if(strcasecmp($row['hall_name'], "cse seminarhall")==0)
        {
         echo'<a href="http://localhost/Project/dashboard/admin.php?hall_id='.$_GET["hall_id"].'&&cancel=yes"></a>';
         // echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
       }
     }

     else if(strcasecmp($_SESSION['role_name'], "dean")==0)
     {
      if(strcasecmp($row['hall_name'], "deans gallery")==0)
      {
       echo'<a href="http://localhost/Project/dashboard/admin.php?hall_id='.$_GET["hall_id"].'&&cancel=yes"></a>';
          //echo"<a href=http://localhost/Project/dashboard/admin.php?hall_id=".$row['hall_id']."> ".$row['hall_name']."</a>";
     }
   }

   else if(strcasecmp($_SESSION['role_name'], "mathshod")==0)
   {
    if(strcasecmp($row['hall_name'], "maths seminarhall")==0)
    {
      echo'<a href="http://localhost/Project/dashboard/admin.php?hall_id='.$row["hall_id"].'&&cancel=yes"> '.$row['hall_name'].'</a>';

    }
  }








  else if(strcasecmp($_SESSION['role_name'], "dr")==0)
  {
    echo'<a href="http://localhost/Project/dashboard/admin.php?hall_id='.$row["hall_id"].'&&cancel=yes"> '.$row['hall_name'].'</a>';
  }
  else if(strcasecmp($_SESSION['role_name'], "dsw")==0)
  {
    if(strcasecmp($row['hall_name'], "community hall")==0)
    {
      echo'<a href="http://localhost/Project/dashboard/admin.php?hall_id='.$row["hall_id"].'&&cancel=yes">'.$row['hall_name'].'</a>';
    }
  }

  else if(strcasecmp($_SESSION['role_name'], "hod")==0 )
  {
   if(strcasecmp($row['hall_name'], "seminar hall")==0)
   {
     echo'<a href="http://localhost/Project/dashboard/admin.php?hall_id='.$row["hall_id"].'&&cancel=yes">'.$row['hall_name'].'</a>';
   }
 }

 else 
 {
  if(strcasecmp($row['hall_name'], "community hall")==0 || strcasecmp($row['hall_id'], "seminar hall")==0)
  {
  }
  else
  {
    echo'<a href="http://localhost/Project/dashboard/admin.php?hall_id='.$row["hall_id"].'&&cancel=yes">'.$row['hall_name'].'</a>';
  }
}


}

?>





</div>


<button class="dropdown-btn">View History Requests


</button>
<div class="dropdown-container">
  <a href="http://localhost/Project/dashboard/admin.php?history=1&&hall_id=1">All Booking And Cancellation</a>
  


</div>


<button class="dropdown-btn">Change Hall Details

</button>
<div class="dropdown-container">
</div>

<?php
if(strcasecmp($_SESSION['role_name'], "dr")==0)
{
  echo '<a href="http://localhost/Project/dashboard/admin.php?addnew">Add new Hall</a>';
}
?>

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
    if(isset($_GET['addnew']))
    {
      ?>
      <div id="wrapper">
        <center>
          <br/><br/><br/><br/>
          <h1>Add New Hall</h1>
          <br>
          <form action="http://localhost/Project/dashboard/new-hall.php" method="post">

            <label for="name">Hall Name</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input name="hname" type="text"  /> <br /> <br />

            <label for="name">Hall price for inner peoples</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <input name="iprice" type="text"  /> <br /> <br />

            <label for="name">Hall price for outer peoples</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input name="oprice" type="text"  /> 
            <br><br>

            <label for="name">Description</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <input name="desc" type="text"  /> 

            <br><br>

            <button type="submit"> ADD HALL</button>
          </form>
        </center>
      </div>

      
      <?php
    }

    else if(isset($_POST['search']))
    {


     
      $search=$_POST['search'];
      $q = "select * from booking,customer where  booking.mobile = customer.mobile AND customer.name LIKE '%$search%'";
      $result = mysqli_query($con,$q);
      echo "<table>";
      echo"<th>Client Name</th><th>Client Type</th><th>Booking Date</th><th>Apply Data</th><th>Shift</th><th>Confirm</th><th>Reject</th>";

      while ($row = mysqli_fetch_assoc($result)) 
      {

        echo "<tr>";

        echo "<td>";
        echo $row['name'];
        echo "</td>";



        echo "<td>";
        echo $row['usertype'];
        echo "</td>";


        echo "<td>";
        echo $row['date'];
        echo "</td>";

        echo "<td>";
        echo $row['timestamp'];
        echo "</td>";


        echo "<td>";
        echo $row['session'];
        echo "</td>";




        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=yes"> <button> Confirm </button> </a> </td>';
        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=no"> <button> Reject </button> </a> </td>';

        echo "</tr>";
      }
       echo "</table>";
    }


    else if(isset($_GET['history']))
    {


      $hall_id = $_GET['hall_id'];
      $q = "select * from booking,customer where  booking.mobile = customer.mobile";
      $result = mysqli_query($con,$q);
      echo "<table>";
      echo"<th>Client Name</th><th>Client Type</th><th>Booking Date</th><th>Apply Data</th><th>Shift</th><th>Confirm</th><th>Reject</th>";

      while ($row = mysqli_fetch_assoc($result)) 
      {

        echo "<tr>";

        echo "<td>";
        echo $row['name'];
        echo "</td>";



        echo "<td>";
        echo $row['usertype'];
        echo "</td>";


        echo "<td>";
        echo $row['date'];
        echo "</td>";

        echo "<td>";
        echo $row['timestamp'];
        echo "</td>";


        echo "<td>";
        echo $row['session'];
        echo "</td>";




        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=yes"> <button> Confirm </button> </a> </td>';
        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=no"> <button> Reject </button> </a> </td>';

        echo "</tr>";
      }
       echo "</table>";
    }

    else if(isset($_GET['hall_id']))
    {

      $hall_id = $_GET['hall_id'];
      $q = "select * from booking,customer where hall_id='$hall_id' AND booking.mobile = customer.mobile";
      $result = mysqli_query($con,$q);

      echo "<table>";

      echo"<th>Client Name</th><th>Client Type</th><th>Booking Date</th><th>Apply Data</th><th>Shift</th><th>Confirm</th><th>Reject</th>";
      while ($row = mysqli_fetch_assoc($result)) 
      {


        if( (strcasecmp($_SESSION['role_name'], "dr")==0 ) && isset($_GET['cancel']) && $row['status']==-10 && (strcasecmp($_GET['hall_id'],$row['hall_id'])==0 ))
        {
          echo "<tr>";

          echo "<td>";
          echo $row['name'];
          echo "</td>";



          echo "<td>";
          echo $row['usertype'];
          echo "</td>";


          echo "<td>";
          echo $row['date'];
          echo "</td>";

          echo "<td>";
          echo $row['timestamp'];
          echo "</td>";


          echo "<td>";
          echo $row['session'];
          echo "</td>";




          echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=yes"> <button> Confirm </button> </a> </td>';
          echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=no"> <button> Reject </button> </a> </td>';

          echo "</tr>";
        }
        

      
      else if(($row['status']==10 || $row['status']==20) && strcasecmp($_SESSION['role_name'], "vc")==0)
      {
        echo "<tr>";

        echo "<td>";
        echo $row['name'];
        echo "</td>";



        echo "<td>";
        echo $row['usertype'];
        echo "</td>";


        echo "<td>";
        echo $row['date'];
        echo "</td>";

        echo "<td>";
        echo $row['timestamp'];
        echo "</td>";


        echo "<td>";
        echo $row['session'];
        echo "</td>";




        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=yes"> <button> Confirm </button> </a> </td>';
        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=no"> <button> Reject </button> </a> </td>';

        echo "</tr>";

      }

      else if($row['status']==0 && strcasecmp($_SESSION['role_name'], "dr")==0)
      {

        echo "<tr>";

        echo "<td>";
        echo $row['name'];
        echo "</td>";



        echo "<td>";
        echo $row['usertype'];
        echo "</td>";


        echo "<td>";
        echo $row['date'];
        echo "</td>";

        echo "<td>";
        echo $row['timestamp'];
        echo "</td>";


        echo "<td>";
        echo $row['session'];
        echo "</td>";




        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=yes"> <button> Confirm </button> </a> </td>';
        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=no"> <button> Reject </button> </a> </td>';

        echo "</tr>";

      }

      else if(($row['status']==10 || $row['status']==20) && strcasecmp($_SESSION['role_name'], "Registrar")==0)
      {

        echo "<tr>";

        echo "<td>";
        echo $row['name'];
        echo "</td>";



        echo "<td>";
        echo $row['usertype'];
        echo "</td>";


        echo "<td>";
        echo $row['date'];
        echo "</td>";

        echo "<td>";
        echo $row['timestamp'];
        echo "</td>";


        echo "<td>";
        echo $row['session'];
        echo "</td>";




        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=yes"> <button> Confirm </button> </a> </td>';
        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=no"> <button> Reject </button> </a> </td>';

        echo "</tr>";

      }

      else if($row['status']==0 && strcasecmp($_SESSION['role_name'], "dsw")==0)
      {

        echo "<tr>";

        echo "<td>";
        echo $row['name'];
        echo "</td>";



        echo "<td>";
        echo $row['usertype'];
        echo "</td>";


        echo "<td>";
        echo $row['date'];
        echo "</td>";

        echo "<td>";
        echo $row['timestamp'];
        echo "</td>";


        echo "<td>";
        echo $row['session'];
        echo "</td>";




        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=yes"> <button> Confirm </button> </a> </td>';
        echo '<td> <a href="http://localhost/Project/dashboard/admin.php?booking='.$row['booking_id'].'&&role='.$_SESSION['role_name'].'&&conf=no"> <button> Reject </button> </a> </td>';

        echo "</tr>";

      }


    }

    echo "</table>";



  }





  if (isset($_GET['booking']) && isset($_GET['role'])) {


    $flag=0;

    if(strcasecmp($_SESSION['role_name'], "dr")==0)
    {
      $flag=10;
    }
    else if(strcasecmp($_SESSION['role_name'], "Registrar")==0)
    {
      $flag=20;
    }
    else if(strcasecmp($_SESSION['role_name'], "vc")==0)
    {
      $flag=30;
    }
    else if(strcasecmp($_SESSION['role_name'], "dsw")==0)
    {
      $flag=40;
    }
    else if(strcasecmp($_SESSION['role_name'], "hod")==0)
    {
      $flag=40;
    }
    else
    {

    }







    if(strcasecmp($_GET['conf'],"yes")==0)
    {


      $b_id=$_GET['booking'];
      $qy="UPDATE booking SET status='$flag' where booking_id='$b_id'";
      if(mysqli_query($con,$qy))
      {
       echo"<script> alert('Confirmed'); </script>";
     }
     else{
      echo"<script> alert('there are some error in database'); </script>";

    }

  }

  if(strcasecmp($_GET['conf'],"no")==0)
  {
    $flag=-$flag;
    $b_id=$_GET['booking'];
    $qy="UPDATE booking SET status='$flag' where booking_id='$b_id'";
    if(mysqli_query($con,$qy))
    {
     echo"<script> alert('Confirmed'); </script>";
   }
   else{
    echo"<script> alert('there are some error in database'); </script>";

  }

}















}
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