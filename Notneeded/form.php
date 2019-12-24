<html>

<head>

<title>Validation Form</title>

</head>

<body>

<form id="contact_form" method="post" action="."> <br />

Label <input type="text" name="name" class="textfield" value="" /> <br />

Email <input type="text" name="email" class="textfield" value="" /> <br />

Phone Number <input type="text" name="number" class="textfield" value="" /> <br />

<p><input type="submit" name="submit" class="button" value="Submit" /></p>

<?php

if(isset($_POST['submit'])) {

//include validation class

//assign post data to variables

$name = trim($_POST['name']); // Storing username

$email = trim($_POST['email']); // Storing email address

$number= trim($_POST['number']); // storing the phone number

}

?>

<?php

if(empty($name) && empty($number) && empty($email))

{

echo "All fields are compulsory";

}

if(strlen($name) >=5 && strlen($name)<=10)

if (preg_match("/^[a-z0-9_]+$/i", $name) )

{

return true;

}

else

{

echo "Enter valid username";

}

$reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if (preg_match($reg, $email)) {

echo $email."Email ID is accepted" ;

} 

else {

echo $email."Not Accepted";

}

if((preg_match("/[^0-9]/", '', $str)) && strlen($str) == 10)

{

echo "Invalid phone number";

}

?>

</form>

</body>

</html>