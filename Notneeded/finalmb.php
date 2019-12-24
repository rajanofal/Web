<?php
$nameErr = $passErr = "";
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["username"])) {
     $nameErr = "Userame is required";
   } else if (!preg_match("/^[a-zA-Z]*$/",$name=$_POST["username"])) {
     $nameErr = "Only letters are allowed"; 
   } else {
     $name = "'".test_input($_POST["username"])."'";
   }
   
   
   if (empty($_POST["password"])) {
     $passErr = "Password is required";	 
   } else {
     $pass = "'".test_input($_POST["password"])."'";
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

$sql = "SELECT * from user where username = $name && password = $pass";
$result = mysqli_query($conn, $sql);

if(mysqli_query($conn, $sql)){
	$rowcount = mysqli_num_rows($result);
	if($rowcount > 0){
		if($name== "'admin'" && $pass == "'admin'"){
			$_SESSION["username"] = "admin";
            $_SESSION["password"] = "admin";
			header("Location: http://localhost/admin.php");
            die();
		} else {
			header("Location: http://localhost/user.php");
			die();
        }
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