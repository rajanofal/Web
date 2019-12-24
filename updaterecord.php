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
    height: 375px;
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

.error {color: #FF0000;}

</style>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}

$id = "'".$_POST["id"]."'";
$type = "'".$_POST["type"]."'";
$color = "'".$_POST["color"]."'";
$date = "'".$_POST["date"]."'";
$quantity = "'".$_POST["quantity"]."'";
$price = "'".$_POST["price"]."'";

$sql = "UPDATE product SET type = $type where id = $id";
$sql1 = "UPDATE product SET color = $color where id = $id";
$sql2 = "UPDATE product SET date = $date where id = $id";
$sql2 = "UPDATE product SET quantity = $quantity where id = $id";
$sql2 = "UPDATE product SET price = $price where id = $id";

if(mysqli_query($conn, $sql)){
	if(mysqli_query($conn, $sql1)){
		if(mysqli_query($conn, $sql2)){
	        header("Location: http://localhost/viewprod.php");
            die();
		}
	}
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
	
<body>


<div class="div1">
<center><div class="div2">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<center><b><p>UPDATE EXISTING RECORD</p></b>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


//if(isset($_REQUEST['e']))
	//echo $_REQUEST['e'];
//else
	//echo "NOT SET";

$sql = "SELECT * from product WHERE id = ".$_REQUEST['e'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<b>Product-ID:</b> <input type="input" name="id" value="<?php echo $row['id'] ?>"><br><br>

<b>Product-Type:</b> <input type="input" name="type" value="<?php echo $row['type'] ?>"><br><br>

<b>Product-Color:</b> <input type="input" name="color" value="<?php echo $row['color'] ?>"><br><br>

<b>Product-Quantity:</b> <input type="input" name="quantity" value="<?php echo $row['quantity'] ?>"><br><br>

<b>Product-Price:</b> <input type="input" name="price" value="<?php echo $row['price'] ?>"><br><br>

<b>Date:</b> <input type="Date" name="date" value="<?php echo $row['date'] ?>"><br><br>
   
<input type="submit" value="Submit"></center>

<?php

mysqli_close($conn);

?>

</form>

<a href = "viewprod.php">Back</a>
</div></center>
</div>

</body>
</html>