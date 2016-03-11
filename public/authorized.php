<?php
    require_once "../Auth.php";
    session_start();

    if (!Auth::check()) {
        header('Location: ../login.php');
        die();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Authorized</title>
</head>
<body>
    <p>Authorized</p>
    <a href="/logout.php">Logout</a>
</body>
</html>