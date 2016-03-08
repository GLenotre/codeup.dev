<?php
$name = 'guest';
$password = 'password';

$correctName = isset($_POST['User']) ? $_POST['User'] : '';
$correctPassword = isset($_POST['Password'])? $_POST['Password'] :'';

if (isset($_SESSION['LOGGED_IN_USER'])) && $_SESSION['LOGGED_IN_USER'] != '') {
	header('Location: /authorized.php');
	die();
}

else if ($correctName == $name && $correctPassword == $password) {
	$_SESSION['LOGGED_IN_USER'] = $username;
	header('Location: /authorized.php');
	die;
} else if ($correctName != $name && $correctPassword != $password) {
	echo ("Password was incorrect");
}

//Add some PHP code to the top of the login page that checks the POST'ed username and password. 
//If the username is equal to "guest" and the password is equal to "password" 
//then redirect to the authorized.php. If the username and password do not match those values, 
//show a login failed message on the login page.
//header location
?>


<!DOCTYPE html>
<html>
<head>
    <title>Password</title>
</head>
<body>
    <form method="POST" action="/login.php">
        <label>User Name</label>
        <input type="text" name="User"><br>
        <label>Password</label>
        <input type="text" name="Password"><br>
        <input type="submit">
    </form>
</body>
</html>