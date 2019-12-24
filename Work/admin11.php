<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}

$name = "'".$_POST["username"]."'";
$id = "'".$_POST["adminid"]."'";
$pass = "'".$_POST["password"]."'";
$mail = "'".$_POST["email"]."'";

$sql = "INSERT INTO admin (username, adminid, email, password)
VALUES ($name, $id, $mail, $pass);";

if(mysqli_query($conn, $sql)){
  echo "New Admin Record added Successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>