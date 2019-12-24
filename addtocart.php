<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "SELECT * from product where id = ".$_REQUEST['e'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row ($result);

$id = $row[0];
$type = $row[1];
$color = $row[2];
$price = $row[5];

$sql1 = "INSERT INTO cart (id, type, color, price)
VALUES ('$id', '$type', '$color', '$price');";


if(mysqli_query($conn, $sql1)){
	header("Location: http://localhost/pro.php");
    die();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>