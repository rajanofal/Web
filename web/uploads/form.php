<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>



<?php

$nameErr = $genderErr = $emailErr = $commentErr = $websiteErr = "";
$name = $gender = $email = $comment = $website = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
if(empty($_POST["name"])){
	$nameErr = "Name Is Required!";
} else {
	$name = test_input($_POST["name"]);
	if(!preg_match("/^[a-zA-Z]*$/", $name)){
		$nameErr = "Only Letters and white Spaces are allowed!";
	}
}

if(empty($_POST["gender"])){
	$genderErr = "Gender Is Required!";
} else {
	$gender = test_input($_POST["gender"]);
}

if(empty($_POST["email"])){
	$emailErr = "Email Is Required!";
} else {
	$email = test_input($_POST["email"]);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$emailErr = "Invalid Email Format!";
	}
}

if(empty($_POST["comment"])){
	$comment = "";
} else {
	$comment = test_input($_POST["comment"]);
}

if(empty($_POST["website"])){
	$website = "";
} else {
	$website = test_input($_POST["website"]);
		if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
			$websiteErr = "Invalid URL";
		}
}
}


function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type = "text" name = "name" value = "<?php echo $name;?>">
<span class = "error">* <?php echo $nameErr;?></span><p></p>
Email: <input type = "text" name = "email" value = "<?php echo $email;?>">
<span class = "error">* <?php echo $emailErr;?></span><p></p>
Website: <input type = "text" name = "website" value = "<?php echo $website;?>">
<span class="error"><?php echo $websiteErr;?></span><p></p>
Comment: <textarea name = "comment" rows = "5" cols = "40"><?php echo $comment;?></textarea><p></p>
Gender:
<input type = "radio" name = "gender" <?php if(isset($gender) && $gender == "female") echo "checked";?> value = "female">Female
<input type = "radio" name = "gender" <?php if(isset($gender) && $gender == "male") echo "checked";?> value = "male">Male
<span class = "error">* <?php echo $genderErr;?></span><p></p>
<input type = "submit" name = "submit" value = "submit">
</form>


<?php
echo "<h2>Your Input:</h2>";

echo "Name: $name<br>";
echo "Email: $email<br>";
echo "Website: $website<br>";
echo "Comment: <br>$comment<br>";
echo "Gender: $gender<br>";
?>

</body>
</html>