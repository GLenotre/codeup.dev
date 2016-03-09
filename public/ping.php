<?php
    require_once 'functions.php';

    function pageController() {

        $counter = inputHas('counter') ? inputGet('counter') : 0;
        $hit = $counter + 1;
        $miss = "You lost";

        return ['counter' => $counter, 'hit' => $hit, 'miss' => $miss];

    }
    var_dump(pageController());
    extract(pageController());
?>

<!doctype html>
<html>
<head>
    <title>ping.php</title>
</head>
<body>

    <h2>Counter Value: <?= $counter; ?></h2>

<a href="pong.php?counter=<?= $hit; ?>">HIT</a>
<a href="pong.php?counter=<?= $miss; ?>">MISS</a>


</body>
</html>