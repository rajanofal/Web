<?php

$x = strtotime("tomorrow");
echo date("Y.m.d:i:sa", $x) . "<br>";

$x = strtotime("+2 days");
echo date("Y.m.d:i:sa", $x) . "<br>";

$x = strtotime("Next Saturday");
echo date("Y.m.d:i:sa", $x) . "<br>";

$x = strtotime("+3 Months");
echo date("Y.m.d:i:sa", $x) . "<br>";

?>