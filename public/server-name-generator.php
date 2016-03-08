
<?php


// returns a random element from an array
function grabRandomWord($array) {
	$randomIndex = array_rand($array);
	return $array[$randomIndex];
}

// returns the combination name of adjective and noun 
function generateServerName ($adjective, $noun) {
	return grabRandomWord($adjective) . "-" . grabRandomWord($noun);
}


function pageController()
{
   $adjective = [ 'hideous', 'apocryphal', 'sentient', 'peculiar', 'cosmic', 'pathological', 'flensing', 'beardless',
 'floppy', 'horrid'];

	$noun = [ 'flensing', 'eruption', 'gryphon', 'trireme', 'legend', 'chimera', 'fiction', 'presbyter', 'mullion', 'quirk'];

    // Initialize an empty data array.
    $data = [];

    // Add data to be used in the html view.
    $data['title'] = 'Server Name Generator';
    $data['serverName'] = generateServerName($adjective, $noun);

    // Return the completed data array.
    return $data;
}

extract(pageController());


?>

<!DOCTYPE html>
<html>
<head>
    <title>Server Name Generator</title>
	    <style>
	    	body {

	    	}
	    </style>
</head>
<body>
	<h3>Generate a server name</h3>
	<p>Click <button>GO</button> for a new name</p>
	<p>Your new server name: <?= $serverName; ?></p>
</body>
</html>
