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

$sql = "SELECT count(*) from admin where username = $name && adminid = $id && email = $mail && password = $pass";

if(mysqli_query($conn, $sql)){
	if($sql > 0){
		echo "Login Successful!";
	} else {
		echo "Login Not Successful!";
	}
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>