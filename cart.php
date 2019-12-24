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
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="beehive.php">Home</a></li>
        <li><a href="pro.php">Products</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>
    </div>
    
     </div>
</nav>

<center>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "SELECT * from cart";
$result = mysqli_query($conn, $sql);

echo "<h1>Cart Items</h1>";
echo "<div>";
echo "<table>
<tr>
<th><center>Product-ID</center></th>
<th><center>Product-Type</center></th>
<th><center>Color</center></th>
<th><center>Price</center></th>
<th><center>Delete</center></th>
</tr>";

while($row = mysqli_fetch_array($result)){

echo "<tr>";
echo "<td><center>" . $row['id'] . "</center></td>";
echo "<td><center>" . $row['type'] . "</center></td>";
echo "<td><center>" . $row['color'] . "</center></td>";
echo "<td><center>$" . $row['price'] . "</center></td>";
echo '<td><center><a method="post" href="delcart.php?e='.$row['id'].'"><img src="http://icongal.com/gallery/image/220226/rubber_eraser_erase_empty.png" alt="Delete"></a></center></td>';
echo "</tr>";

 ?>
<?php

}
$sql1 = "SELECT SUM(price) as total from cart";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result1);
$total = $row['total'];
echo "</table>";
echo "</div>";

mysqli_close($conn);

?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<b><p>No of Items: <?php echo $count = mysqli_num_rows($result); ?></p></b>
<b><p>Total Amount: <?php echo $total; ?></p></b>
<p>&nbsp;</p>
<p>&nbsp;</p>
<button type="button" class="btn btn-primary btn-sm">Buy Out</button>
</center>

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

