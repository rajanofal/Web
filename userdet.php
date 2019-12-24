<?php
require "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Leather Hive</title>
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
        <li><a href="viewprod.php">View Products</a></li>
        <li class="active"><a href="userdet.php">View Customers</a></li>
        <li><a href="details.php">New Customers</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                <!-- <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li> -->
      </ul>
    </div>
    
     </div>
</nav>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "SELECT * from user";
$result = mysqli_query($conn, $sql);

echo "<center>";
echo "<h1>User Details</h1>";

echo "<div>";
echo "<table>
<tr>
<th><center>Username</center></th>
<th><center>Email</center></th>
<th><center>Password</center></th>
</tr>";

while($row = mysqli_fetch_array($result)){

echo "<tr>";
echo "<td><center>" . $row['username'] . "</center></td>";
echo "<td><center>" . $row['email'] . "</center></td>";
echo "<td><center>   ********  </center></td>";
//echo '<td><center><a method="post" href="deluser.php?e='.$row['username'].'"><img src="http://icongal.com/gallery/image/89449/confirmed_yes_check_ok_accept_positiv_green.png" alt="Accept"></a></center></td>';
//echo '<td><center><a method="post" href="deluser.php?e='.$row['username'].'"><img src="http://icongal.com/gallery/image/220226/rubber_eraser_erase_empty.png" alt="Delete"></a></center></td>';
echo "</tr>"; ?>

<?php
}
echo "</table>";
echo "</div>";
echo "</center>";

mysqli_close($conn);

?>

</center>
</div>

<footer class="container-fluid text-center">
  <p>LeatherHive Copyright</p>  
</footer>

</body>
</html>

