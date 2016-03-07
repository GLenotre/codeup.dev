
<?php

$adjective = [
	'hideous',
	'apocryphal',
	'sentient',
	'peculiar',
	'cosmic',
	'pathological',
	'flensing',
	'beardless',
	'floppy',
	'horrid',
];

$noun = [
	'flensing',
	'eruption',
	'gryphon',
	'trireme',
	'legend',
	'chimera',
	'fiction',
	'presbyter',
	'mullion',
	'quirk',
];


// will return a random element from an array
function grabRandomWord($array) {
	$randomIndex = array_rand($array);
	return $array[$randomIndex];
}

function generateServerName ($adjective, $noun) {
	return grabRandomWord($adjective) . "-" . grabRandomWord($noun);
}

$serverName = generateServerName($adjective, $noun);

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
