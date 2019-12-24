<?php

$URL = "www.w3school.com";

$URL = filter_var($URL, FILTER_SANITIZE_URL);

if(!filter_var($URL, FILTER_VALIDATE_URL) === false){
	echo "URL is valid!";
}else {
	echo "URL is InValid!";
}


?>