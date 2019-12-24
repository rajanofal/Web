<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection Error: " .mysqli_connect_error());
}

$sql = "SELECT * from myguests limit 5, 10";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
	echo "0 results!";
}

mysqli_close($conn);


?>