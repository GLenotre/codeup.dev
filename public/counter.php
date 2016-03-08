<?php

    // $_GET is an array, which is filled after form/query string use.
    function pageController()
    {
    	$counterFile = 'txt/counter.txt';
    	$handle = fopen($counterFile, 'r');

    	$counter = fread($handle, filesize($counterFile));
    	fclose($handle);

    	if (isset($_GET["Down"])) {
    		$counter--;
    	}

    	if (isset($_GET["Up"])) {
    		$counter++;
    	}

    	$handle = fopen($counterFile, 'w');
    	fwrite($handle, $counter);
    	fclose($handle);

        $values = array( // several values
            'counter' => $counter,  // asssociation key/value
        );   

     return $values;

    }
    //var_dump($result);
    extract(pageController());
    //var_dump($number);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Counter PHP</title>
    </head>

    <body>
        <div class="main">
            <h3><?= $counter ?></h3>
            <form><button name="Up">Up</button><button name="Down">Down</button></form>
        </div>
    </body>
</html>