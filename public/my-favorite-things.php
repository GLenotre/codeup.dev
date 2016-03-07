
<?php

$favoriteThings = [
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
	<h3>My Fav Things</h3>
	
	 <ol>
    <?php foreach ($favoriteThings as $favoriteThing) { ?>
        <li><?= $favoriteThing; ?></li>
    <?php } ?>
    </ol>

</body>
</html>