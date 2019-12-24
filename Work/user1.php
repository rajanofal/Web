<?php session_start(); ?>
<html>
<head>
<style>
.div1 {
    width: 100%;
    height: 100%;
    border: 1px solid blue;
    background-color: lightgrey;	
}

.div2 {
    width: 450px;
    height: 200px;
    //padding: 10%;
    border: 1px solid red;
	background-color: white;
	margin-top: 150px;
	box-shadow: 10px 10px 5px grey;
}

p {
	font-size: 160%;
	color: blue;
	font-style: italic;
	text-shadow: 2px 2px green;
}

.error {color: #FF0000;}
</style>
</head>
<body>

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
   } else if (preg_match("/^[a-z]*$/",$pass=$_POST["password"])) {
     echo  "Your password is weak<br>";
     $pass = "'".test_input($_POST["password"])."'";	 
   } else if (preg_match("/^[a-zA-Z]*$/",$pass=$_POST["password"])) {
     echo  "Your password is medium<br>";
     $pass = "'".test_input($_POST["password"])."'";	 
   } else if (preg_match("/^[a-z1-9]*$/",$pass=$_POST["password"])) {
     echo  "Your password is medium<br>";
     $pass = "'".test_input($_POST["password"])."'";	 
   } else if (preg_match("/^[a-zA-Z0-9]*$/",$pass=$_POST["password"])) {
     echo  "Your password is strong!<br>";
     $pass = "'".test_input($_POST["password"])."'";	 
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
$mail = "'".$_POST["email"]."'";

$sql = "INSERT INTO user (username, email, password)
VALUES ($name, $mail, $pass);";

if(mysqli_query($conn, $sql)){
  echo "New User Record added Successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

<div class="div1">
<center><div class="div2">

<h2>User Register Here</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Username: <input type="input" name="username">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
E-mail: <input type="input" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
Password: <input type="password" name="password">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
   
<input type="submit" value="Register">
</form>

<form action="user.php" method="post">
<input type="submit" value="Back">
</form>

<form action="login.php" method="post">
<input type="submit" value="Home">
</form>

</div></center>
</div>
</body>
</html>