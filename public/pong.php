<?php
function pageController() {
    $counter = (isset($_GET['counter'])) ?  ($_GET['counter']) : 0;
    $hit = $counter++;
    // $miss = die("Game over");

return array(
    'hit' => $hit,
    'miss' => $miss,
    // 'click' => $counter
    );
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
<a href="ping.php">HIT</a>
<a href="ping.php">MISS</a>

</body>
</html>