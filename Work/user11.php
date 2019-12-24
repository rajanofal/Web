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
$pass = "'".$_POST["password"]."'";
$mail = "'".$_POST["email"]."'";

$sql = "INSERT INTO user (username, email, password)
VALUES ($name, $mail, $pass);";

if(mysqli_query($conn, $sql)){
  echo "New User Record added Successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>