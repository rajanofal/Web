<?php
require "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>LeatherHive</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
	  background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Leather Hive</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <a class="navbar-brand" href="beehive.php">LH</a></div>
    
<?php 

if($_SESSION["type"] == "guest")
{
?>
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="beehive.php">Home</a></li>
        <li><a href="pro.php">Products</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="test.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
        <li><a href="user1.php"><span class="glyphicon glyphicon-check"></span> SignUp</a></li>
        <!-- <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li> -->
      </ul>
    </div>
    
 <?php
} 
else if($_SESSION["type"] == "admin")
{
?>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="beehive.php">Home</a></li>
        <li><a href="viewprod.php">View Products</a></li>
        <li><a href="userdet.php">View Customers</a></li>
        <li><a href="details.php">New Customers</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                <!-- <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li> -->
      </ul>
    </div>

<?php
} 
else if($_SESSION["type"] == "user")
{
?>


    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="beehive.php">Home</a></li>
        <li><a href="pro.php">Products</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>
    </div>
    
<?php
}     
?>
        
  </div>
</nav>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active"><center>
      <img src="jacket2.jpg" alt="Jacket">
    </center></div>

    <div class="item"><center>
      <img src="bag1.jpg" alt="Bag">
   </center></div>

    <div class="item"><center>
      <img src="Classic-Belts-1.jpg" alt="Belt">
   </center> 
    </div>

    <div class="item"><center>
      <img src="shoes2.jpg" alt="Shoes">
    </center></div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<footer class="container-fluid text-center">
<b><i><p style= "color: red;">Contact Us:</p></i></b>
<b><p>000-111-222 - leatherhive@leatherhive.com - 
<a href="https://www.facebook.com/"><img src="http://icongal.com/gallery/image/14805/facebook_social_blue.png"/></a> - 
<a href="https://twitter.com/?lang=en"><img src="http://icongal.com/gallery/image/5578/twitter.png"/></a></p></b>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <p>LeatherHive Copyright</p>  
</footer>

</body>
</html>
