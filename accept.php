<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "SELECT * from newuser where userid = ".$_REQUEST['e'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row ($result);


$username = $row[1];
$mail = $row[2];
$pass = $row[3];


$sql = "INSERT INTO user (username, email, password)
VALUES ('$username', '$mail', '$pass');";


if(mysqli_query($conn, $sql)){
	header("Location: http://localhost/userdet.php");
    die();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>