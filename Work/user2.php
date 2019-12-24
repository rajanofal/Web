<head>
<style>
.error {color: #FF0000;}
</style>
</head>

<?php
// define variables and set to empty values
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
	if ($rowcount > 0){
		echo "Login Successful!";
	} else {
		echo "Login Not Successful!";
	}
} else {
  echo "Error: Invalid or No Entry!";
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


<h2>USER Login Here</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Username: <input type="input" name="username">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
Password: <input type="password" name="password">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
   
<input type="submit" value="Login">
</form>

<form action="user.php" method="post">
<input type="submit" value="Back">
</form>

<form action="login.php" method="post">
<input type="submit" value="Home">
</form>