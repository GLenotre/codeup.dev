
<?php
function pageController(){
	$data = [];
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
	$data['favoriteThings'] = $favoriteThings;  // favoritethings is the new variable
	return $data;
	}

extract(pageController());

?>



<!DOCTYPE html>
<html>
<head>
    <title>My Fav Things</title>
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