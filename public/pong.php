<?php
require_once '../Input.php';
function pageController() {

        $counter = Input::has('counter') ? Input::get('counter') : 0;
        $hit = $counter + 1;
        $miss = "You lost";

        return ['counter' => $counter, 'hit' => $hit, 'miss' => $miss];

    }
   
    extract(pageController());

?>



<!doctype html>
<html>
<head>
    <title>pong.php</title>
</head>
<body>

    <h2>Counter Value: <?= $counter; ?></h2>

<!-- key hit, value hit/miss -->

<a href="ping.php?counter=<?= $hit; ?>">HIT</a>
<a href="ping.php?counter=<?= $miss; ?>">MISS</a>
</body>
</html>