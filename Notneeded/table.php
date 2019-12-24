<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("Connection Failed: " .mysqli_connect_error());
}


$sql = "SELECT * from books";
$result = mysqli_query($conn, $sql);

echo "<table>
<tr>
<th>Book-ID</th>
<th>Book-Name</th>
<th>Author-Name</th>
<th>Date</th>
</tr>";

while($row = mysqli_fetch_array($result)){

echo "<tr>";
echo "<td>" . $row['Bookid'] . "</td>";
echo "<td>" . $row['Bookname'] . "</td>";
echo "<td>" . $row['Authorname'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);

?>