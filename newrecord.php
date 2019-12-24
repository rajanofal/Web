<?php include 'session.php' ?>


<html>
<head>
<style>

.error {color: #FF0000;}

.div1 {
    width: 100%;
    height: 100%;
    border: 1px solid blue;
    background-color: lightgrey;	
}

.div2 {
    width: 500px;
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
$typeErr = $colorErr = $dateErr = "";
$type = $color = $date = $quantity = $price = $image = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["type"])) {
     $typeErr = "Product Type Required here.";
   } else {
     $type = "'".test_input($_POST["type"])."'";
	 $quantity = "'".test_input($_POST["quantity"])."'";
	 $price = "'".test_input($_POST["price"])."'";
	 $image = "'".test_input($_POST["image"])."'";
   }
   
   if (empty($_POST["color"])) {
     $colorErr = "Product Color is required";
   } else {
     $color = "'".test_input($_POST["color"])."'";
   }
   
   if (empty($_POST["date"])) {
     $dateErr = "Date is required";
   } else {
     $date = "'".test_input($_POST["date"])."'";
   }
	
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}

$sql1 = "SELECT max(id) as id from product";
$result = mysqli_query($conn, $sql1);

$row = mysqli_fetch_row ($result);
$id = $row[0]+1;




$sql = "INSERT INTO product (id, type, color, date, quantity, price, image)
VALUES ($id, $type, $color, $date, $quantity, $price, $image);";

if(mysqli_query($conn, $sql)){
	header("Location: http://localhost/viewprod.php");
    die();
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
<center><b><p>ENTER NEW PRODUCT</p></b>

<b>Image:</b> <input type="input" name="image">
   <span class="error">* <?php echo $typeErr;?></span>
   <br><br>

<b>Product-Type:</b> <input type="input" name="type">
   <span class="error">* <?php echo $typeErr;?></span>
   <br><br>

<b>Product-Color:</b> <input type="input" name="color">
   <span class="error">* <?php echo $colorErr;?></span>
   <br><br>

<b>Date:</b> <input type="Date" name="date">
   <span class="error">* <?php echo $dateErr;?></span>
   <br><br>
   
   <b>Product-Quantity:</b> <input type="input" name="quantity">
   <span class="error">* <?php echo $typeErr;?></span>
   <br><br>
   
   <b>Product-Price:</b> <input type="input" name="price">
   <span class="error">* <?php echo $typeErr;?></span>
   <br><br>
   
<input type="submit" value="Submit"></center>
</form>
<a href="viewprod.php">Back</a>
</div></center>
</div>

</body>
</html>