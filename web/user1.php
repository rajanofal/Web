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


$sql1 = "SELECT max(userid) as id from newuser";
$result = mysqli_query($conn, $sql1);

$row = mysqli_fetch_row ($result);
$id = $row[0]+1;


$sql = "INSERT INTO newuser (userid, username, email, password)
VALUES ($id, $name, $mail, $pass);";

if(!mysqli_query($conn, $sql)){
echo "Error: Invalid Entry";
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
<h2>New Users Register Here</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Username: <input type="input" name="username">
   <br><br>
E-mail Add: <input type="input" name="email">
   <br><br>
Password: <input type="password" name="password">
   <br><br>
   
<input type="submit" value="Register" onclick="reg()">

</form>

<a href="beehive.php" class = "btn btn-info" role = "button">Back</a>

</div></center>
</div>

<script>
function reg(){
alert("Your Request has been sent, wait for approval");
}
</script>
</body>
</html>