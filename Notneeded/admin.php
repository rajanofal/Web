<?php include 'session.php' ?>

<!DOCTYPE html>
<html>
<head>
<style>

#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}

#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:560px;
    width:180px;
    float:left;
    padding:5px;	      
}

#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}

.div1 {
    width: 100%;
    height: 100%;
    border: 1px solid blue;
    background-color: lightgrey;	
}

.div {
	width: 1350px;
    height: 660px;
	background-color: lightgrey;
}

a {
    color: red;
	margin-right: 50px;
	margin-left: 50px;
	font-size: 100%;
}

p.align {
	text-align: right;
}

p.edit {
	text-align: center;
}

h1 {
	font-size: 200%;
	text-align: center;
	text-decoration: underline;
}

table, th, td {
	border-colapse: colapse;
    border: 1px solid black;
	margin-top: 100px;
}
</style>
</head>



<body>

<div class="div">

<div id="header">
<h1>ADMIN</h1>
</div>

<div id="nav">
<b><a method="post" href="newrecord.php">NewProduct</a></b><br>
<b><a method="post" href="details.php">UserDetails</a></b><br>
<b><a method="post" href="logout.php">Logout</a></b><br>
</div>



<center>

<align="middle">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "SELECT * from product";
$result = mysqli_query($conn, $sql);

echo "<div>";
echo "<table>
<tr>
<th>Product-ID</th>
<th>Product-Type</th>
<th>Color</th>
<th>Date</th>
<th>Update</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)){

echo "<tr>";
echo "<td><center>" . $row['id'] . "</center></td>";
echo "<td><center>" . $row['type'] . "</center></td>";
echo "<td><center>" . $row['color'] . "</center></td>";
echo "<td><center>" . $row['date'] . "</center></td>";
echo '<td><a method="post" href="updaterecord.php?e='.$row['id'].'"><img src="http://icongal.com/gallery/image/93434/pen_pencil_write_edit.png" alt="Edit"></a></td>';
echo '<td><a method="post" href="deleterecord.php?e='.$row['id'].'"><img src="http://icongal.com/gallery/image/220226/rubber_eraser_erase_empty.png" alt="Delete"></a></td>';
echo "</tr>"; ?>

<?php
}
echo "</table>";
echo "</div>";

mysqli_close($conn);

?>

</center>
</div>

<div id="footer">
Copyright © raja.m.nofal@gmail.com
</div>

</body>

</html>
