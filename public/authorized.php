<?php
    $items = array('Item One', 'Item Two', 'Item Three');
    $allItems = array_merge($items, $_POST);

    session_start();

    $username = ( isset($_SESSION['LOGGED_IN_USER'])) ? $_SESSION['LOGGED_IN_USER'] : "";

if (isset($_SESSION['LOGGED_IN_USER'])) || $_SESSION['LOGGED_IN_USER'] == '') {
    header('Location: /login.php');
    die();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Authorized</title>
</head>
<body>
    <p>Authorized</p>
</body>
</html>