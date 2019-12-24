<?php
// define variables and set to empty values
$nameErr = $emailErr = $idErr = $passErr = "";
$name = $email = $id = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["username"])) {
     $nameErr = "Userame is required";
   } else if (!preg_match("/^[a-zA-Z]*$/",$name=$_POST["username"])) {
     $nameErr = "Only letters are allowed"; 
   } else {
     $name = "'".test_input($_POST["username"])."'";
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else if (!filter_var($email=$_POST["email"], FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
   } else {
	   $email="'".$_POST["email"]."'";
   }
   
      if (empty($_POST["password"])) {
     $passErr = "Password is required";
   }
   
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


if($name == "" && $pass == "" && $mail == "" || $name == "" || $pass == "" || $mail == ""){
	echo "Invalid format";
}
else{
$sql = "INSERT INTO user (username, email, password)
VALUES ($name, $mail, $pass);";

if(mysqli_query($conn, $sql)){
  echo "New User Record added Successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>
