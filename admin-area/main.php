<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TU </title>
  <style>


  *{
    margin: 0;
    padding: 0;

  }


  body {
    font-family: arial,helvetica,sans-serif;
    

  }


  #row {

    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    
    padding-top: 10px;
  }


  #oitem {
    margin-top: 10px;
  }



  #rtitle {
    margin-top: 18px;

  }




  #container {

    width: 100%;
    height: 100%;
  }

  #item {


    margin-bottom: 20px;
    margin-bottom: 20px;
  }


  #header {
    height: 120px;
    background-color: #4d6d9a;
    width: 100%;

  }
  #menu {

    float: left;
    width: 100%;
    background-color: #112747;
  }
  #menu ul li {
    list-style-type: none;
    display: inline;
  }
  #menu li a {
    display: block;
    text-decoration: none;
    border-right: 2px solid #FFFFFF;
    padding: 1px 15px;
    float: left;
    color: #FFFFFF;
  }
  #menu li a:hover {
    background-color: #000000;
  }


  #last {
    padding-bottom: 0;
  }

  



  .topnav {
    background-color: #000080;
    overflow: hidden;
  }

  /* Style the links inside the navigation bar */
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

  /* Add a color to the active/current link */
  .topnav a.active {
    background-color: #4CAF50;
    color: white;
  }



  #sidebar{

    float: left;
    width: 20%;
    height: 480px;
    background-color: #34495e;
  }


  #sidebar.ul li{
    display: inline-block;
    padding-bottom: 20px;

  }
  li{
    padding-top: 20px;
    padding-bottom: 30px;
    border-bottom: 3px solid grey;
  }
  li:hover {
    background: black;
    color: white;
    padding-left:10px;
    -moz-transition: padding-left .3s ease-in;
    -o-transition: padding-left  .3s ease-in;
    -webkit-transition: padding-left  .3s ease-in;
    transition: padding-left  .3s ease-in;
  }

  a{
    text-decoration:none;
    color:white;
  }


  #main{
    float: left;
    width: auto;
    height: 480px;
    background-color: ;

  }



  #footer {

    clear: both;
    
    background-color: #4d6d9a;
    text-align: center;
    width: 100%;
    height: 5%;


  }




</style>
</head>

<body>

<script>
function load_home() {
     document.getElementById("main").innerHTML='<object type="text/html" data="panel.html" ></object>';
}

</script>
  <div id="header">
    <h1><center>This is my site!</center> </h1>

  </div> <!-- end header -->
  <div class="topnav">
    <a href="#home">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>



  <div id="sidebar" >
   <ul>
    <a href="http://localhost/project/main.php?applied=1"><li data-toggle="collapse" data-target="#main"> View Applied Halls </li></a>
    <a href="http://localhost/project/main.php?cancelled=1" ><li> View Cancelled Requests </li></a>
    <a href="http://localhost/project/main.php?histry=1" > <li>View History </li></a>
    <a href="http://localhost/project/main.php?applie4=1" ><li> ----------- </li></a>
  </ul>  
</div>




<div id="main" style="border: 1px solid red;width: 79%">
  <?php
    if(isset($_GET['applied']))
    {
      //include("applied.php");
      echo"<h1>applied</h>";
    }
    else if(isset($_GET['cancelled']))
    {
      ?>

      <h1>cancelled</h1>
        
    <?php
    }
    else if (isset($_GET['histry']))
    {
      echo"<h1>histry</h>";
    }
    else
    {
      echo"narmal";
    }
  ?>

</div>


<div id="footer">

  <br>                  <p>Copyright (c) </p>
</div> <!-- end footer -->


</div> <!-- end container -->







</body>
</html>