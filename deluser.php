
<?php include 'session.php' ?>


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
    height: 300px;
    //padding: 10%;
    border: 1px solid red;
	background-color: white;
	margin-top: 150px;
	box-shadow: 10px 10px 5px grey;
}

p {
	font-size: 160%;
	color: black;
	font-style: italic;
}

a {
    color: red;
	margin-right: 50px;
	margin-left: 50px;
	font-size: 100%;
}

.error {color: #FF0000;}

</style>
</head>

	
<body>


<div class="div1">
<center><div class="div2">

<form>
<center><b><p>Accept/Remove New User</p></b>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "SELECT * from newuser WHERE userid = ".$_REQUEST['e'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<b>User ID:</b> <input type="input" name="userid" value="<?php echo $row['userid'] ?>"><br><br>

<b>Username:</b> <input type="input" name="username" value="<?php echo $row['username'] ?>"><br><br>

<b>Email:</b> <input type="input" name="email" value="<?php echo $row['email'] ?>"><br><br>

<b>Password:</b> <input type="input" name="password" value="******"><br><br>
   

<?php

mysqli_close($conn);

?>
   
<a method="post" href="accept.php?e=<?php echo $row['userid']; ?>"><img src="http://icongal.com/gallery/image/141094/yes_ok_check_mark_checkmark_tick_green.png" alt="Yes"></a>
<a method="post" href="details.php"><img src="http://icongal.com/gallery/image/89465/reject_exit_no_close_delete.png" alt="No"></a>
   
</form>
</div></center>
</div>

</body>
</html>