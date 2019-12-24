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

$sql = "SELECT COUNT(*) from admin where username = $name && password = $pass";

if(mysqli_query($conn, $sql)){
	
	if($sql > 0){
		echo "Login Successful!";
	} else {
		echo "Login not Successful!";
	}
} else {
  echo "Login not Successful!";
}

mysqli_close($conn);

?>