<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';

var_dump($_POST);



?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <h2>Name</h2>
    <p><?php echo $name; ?></p>
    <h2>Number</h2>
    <p><?php echo $number; ?></p>
    <a href="form-example.php">Back</a>
</body>
</html>