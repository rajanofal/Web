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
      
      <a class="navbar-brand" href="beehive.php">LH</a>
    </div>
    
<?php 

if($_SESSION["type"] == "guest")
{
?>
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="beehive.php">Home</a></li>
        <li class="active"><a href="pro.php">Products</a></li>
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
else if($_SESSION["type"] == "user")
{
?>


    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="beehive.php">Home</a></li>
        <li class="active"><a href="pro.php">Products</a></li>
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

<div class="container">    
  <div class="row">
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}

$sql = "SELECT * from product";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){

  ?>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $row['color']." ".$row['type']; ?></div>
        <div class="panel-body"><img src="<?php echo $row['image']; ?>" style="width:100%; height:50%" alt="Image"></div>
        <div class="panel-footer">
           <?php
    if($_SESSION["type"] == "guest")
    {
   ?>
        <p>$<?php echo $row['price']; ?></p>
        
   <?php
    }
    else if($_SESSION["type"] == "user")
    {
   ?>
        <p>$<?php echo $row['price']; ?>
        <?php echo '<a method="post" href="addtocart.php?e='.$row['id'].'"><img src="http://icongal.com/gallery/image/37872/to_shapesfree_add_cart.png" alt="Cart"></a>';
        

     }
     ?>
        </div>
      </div>
    </div>
        <?php 
    }
    ?>
    </div>

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


</script>

</body>
</html>