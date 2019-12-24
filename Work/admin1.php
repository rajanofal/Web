<head>
<style>
.error {color: #FF0000;}
</style>
</head>

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
     
   if (empty($_POST["adminid"])) {
     $idErr = "AdminID is required";
   } else if (!preg_match("/^[0-9]*$/",$id=$_POST["adminid"])) {
     $idErr = "Only numbers are allowed";
   } else {
     $id = "'".test_input($_POST["adminid"])."'";
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


$sql = "INSERT INTO admin (username, adminid, email, password)
VALUES ($name, $id, $email, $pass);";

if(mysqli_query($conn, $sql)){
  echo "New Admin Record added Successfully";
} else {
  echo "Error: Invalid or no Entry!";
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


<h2>ADMIN Register Here</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Username: <input type="input" name="username">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
Admin ID: <input type="input" name="adminid">
   <span class="error">* <?php echo $idErr;?></span>
   <br><br>
E-mail: <input type="input" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
Password: <input type="password" name="password">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
   
<input type="submit" value="Register">
</form>

<form action="admin.php" method="post">
<input type="submit" value="Back">
</form>

<form action="login.php" method="post">
<input type="submit" value="Home">
</form>

