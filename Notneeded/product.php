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
        <li class="active"><a href="product.php">Products</a></li>
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
        <li class="active"><a href="product.php">Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
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
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Black Leather Shoes</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
           <?php
    if($_SESSION["type"] == "guest")
    {
   ?>
        <p>90$</p>
        
   <?php
    }
    else if($_SESSION["type"] == "user")
    {
   ?>
        <p>90$
        <button type="button" class="btn btn-primary btn-sm">Add To Cart</button></p>
        
     <?php
     }
     ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">Red Sheep Leather Jacket</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
           <?php
    if($_SESSION["type"] == "guest")
    {
   ?>
        <p>150$</p>
        
   <?php
    }
    else if($_SESSION["type"] == "user")
    {
   ?>
        <p>150$
        <button type="button" class="btn btn-primary btn-sm">Add To Cart</button></p>
        
     <?php
     }
     ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">Black Leather Belt</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
           <?php
    if($_SESSION["type"] == "guest")
    {
   ?>
        <p>60$</p>
        
   <?php
    }
    else if($_SESSION["type"] == "user")
    {
   ?>
        <p>60$
        <button type="button" class="btn btn-primary btn-sm">Add To Cart</button></p>
        
     <?php
     }
     ?>
        </div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Blue Leather Purse</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
           <?php
    if($_SESSION["type"] == "guest")
    {
   ?>
        <p>75$</p>
        
   <?php
    }
    else if($_SESSION["type"] == "user")
    {
   ?>
        <p>75$
        <button type="button" class="btn btn-primary btn-sm">Add To Cart</button></p>
        
     <?php
     }
     ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Grey Leather Belt</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
           <?php
    if($_SESSION["type"] == "guest")
    {
   ?>
        <p>50$</p>
        
   <?php
    }
    else if($_SESSION["type"] == "user")
    {
   ?>
        <p>50$
        <button type="button" class="btn btn-primary btn-sm">Add To Cart</button></p>
        
     <?php
     }
     ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Black Leather Jacket</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
        
   <?php
    if($_SESSION["type"] == "guest")
    {
   ?>
        <p>100$</p>
        
   <?php
    }
    else if($_SESSION["type"] == "user")
    {
   ?>
        <p>100$
        <button type="button" class="btn btn-primary btn-sm">Add To Cart</button></p>
        
     <?php
     }
     ?>
     
        </div>
      </div>
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>LeatherHive Copyright</p>  
</footer>

</body>
</html>