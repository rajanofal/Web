<?php

$cars = array(
array("Volvo", 22, 18),
array("BWM", 15, 13),
array("GMC", 5, 2),
array("Land Rover", 17, 15)
);

Echo "Cars       In Stock       Sold<br>";

for($i=0; $i < 4; $i++){
   for($j=0; $j < 3; $j++){
   echo $cars[$i][$j];
   echo " ";
   }
   echo "<br>";
}
?>
