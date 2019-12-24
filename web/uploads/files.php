<?php
$myfile = fopen("testfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, "Mickey Mouse\n");
fwrite($myfile, "Minnie Mouse\n");
fclose($myfile);
?>