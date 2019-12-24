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
	
	table, th, td {
	border-colapse: colapse;
    border: 1px solid black;
	margin-top: 100px;
	}
	
	.text {
    width: 750px;
    height: 600px;
    //padding: 10%;
    border: 1px solid #000080;
	background-color: white;
	margin-top: 150px;
	box-shadow: 10px 10px 5px grey;
	text-align: center, justify;
	font-size: 20px;
	font-variant: small-caps;
	font-family: "Courier New", Times, serif;
	font-weight: bold;
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
      
      <a class="navbar-brand" href="beehive.php">LH</a>
    </div>
    
    <?php 

if($_SESSION["type"] == "guest")
{
?>
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="beehive.php">Home</a></li>
        <li><a href="pro.php">Products</a></li>
        <li class="active"><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="test.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
        <li><a href="user1.php"><span class="glyphicon glyphicon-check"></span> SignUp</a></li>
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
        <li><a href="beehive.php">Home</a></li>
        <li><a href="pro.php">Products</a></li>
        <li class="active"><a href="about.php">About Us</a></li>
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


<center>
<div class="text">
<h1>About Us:</h1>
<p>LeatherHive deals in hand stitched leather products of finest quality to its customers in US. With one of the best and technically proficient teams working assiduously at our production units, we have maintained the quality level of our each product. The hard work and integrity has earned us numerous satisfied customers who trust us for their leather products needs, be it a leather jacket, a leather coat or any leather product.</p>

<p>Today, with a set-up of 52000 PCs per annum of production facility, equipped with most modern Japanese machinery, The quality management system of this fast progressive unit is certified against ISO 9001:2008. we always use leather and accessories according to the European standard AZO ,PCP Nickle and chrome free.</p>

<p>We are capable of producing high end fashion leather products with all kinds of stitching details.</p>

<p>Our leather products are manufactured by us in our factory with great care, to the highest standards of workmanship. Choose any leather from sheep, goat, cow & buffalo in any color or choose color from the list of products. Each product is made according to customer specific needs and requirements.</p>
</div>
</center>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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

