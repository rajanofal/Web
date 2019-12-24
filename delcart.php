<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "DELETE from cart where id = ".$_REQUEST['e'];

if(mysqli_query($conn, $sql)){
	header("Location: http://localhost/cart.php");
    die();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>