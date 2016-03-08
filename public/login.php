<?php

	// starts a session or finds a session
    // allows us to use a $_SESSION superglobal
	session_start();

	//variables for login check
	$name = 'guest';
	$password = 'password';

	// checking $_POST superglobal for user input to check for login
	$correctName = isset($_POST['User']) ? $_POST['User'] : '';
	$correctPassword = isset($_POST['Password'])? $_POST['Password'] :'';

	// checking if 'LOGGED_IN_USER' key isset
	//and if it has a value
	//tells me that they are logged in and don't need to be here
	if (isset($_SESSION['LOGGED_IN_USER']) && $_SESSION['LOGGED_IN_USER'] != '') {
		//redirects to another page
		header('Location: /authorized.php');
		//stop all other code from running
		die();
	}
	// checking to see if both values match the correct login information
	//	doing this to login user if they entered correct information
	else if ($correctName == $name && $correctPassword == $password) {
		// create a session key
		// save value as the username
		$_SESSION['LOGGED_IN_USER'] = $username;
		header('Location: /authorized.php');
		die;

	// checking to see if they entered the wrong information
	// prevents meesage from showing when user submitted nothing or first time loading
	} else if ($correctName != '' || $correctPassword != '') {
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