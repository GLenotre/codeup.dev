<?php
function pageController() {
    $counter = (isset($_GET['counter'])) ?  ($_GET['counter']) : 0;
    $hit = $counter++;
    $miss = die("Game over");
return array(
    'hit' => $hit,
    'miss' => $miss,
    'click' => $counter
    );
}
extract(pageController());
?>

<!doctype html>
<html>
<head>
    <title>ping.php</title>
</head>
<body>

    <h2>Counter Value: <?= $counter; ?></h2>

<a href="pong.php?click=<?= $hit; ?>">HIT</a>
<a href="ping.php?click=<?= $miss; ?>">MISS</a>


</body>
</html>