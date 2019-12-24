<?php session_start(); ?>
<html>
<head>
<style>
.div2 {
    width: 500px;
    height: 400px;
    //padding: 10%;
    border: 1px solid #000080;
	background-color: #BDC3C7;
	margin-top: 150px;
	box-shadow: 10px 10px 5px grey;
}

p {
	font-size: 160%;
	color: #800000;
	font-style: italic;
	text-shadow: 1px 1px #800000;
}

.error {color: #FF0000;}


</style>
</head>
<body style="background-color:#F2F3F4">

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
			$_SESSION["type"] = "admin";
			header("Location: http://localhost/beehive.php");
            die();
		} else {
			$_SESSION["type"] = "user";
			header("Location: http://localhost/beehive.php");
			die();
        }
	}
else
    echo "User Not Found!";
	
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



<center><div class="div2">
<p>&nbsp;</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<center><b><p>LOGIN</p></b>

<b>Username:</b> <input type="input" name="username">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
<b>Password:</b> <input type="password" name="password">
   <span class="error">* <?php echo $passErr;?></span>
    <br><br>
   
 <input type = "submit" value = "Login"></center>
</form>

<a href = "beehive.php">Back</a>

</div></center>
</div>

</body>
</html>
