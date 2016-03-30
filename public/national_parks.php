<?php
// var_dump($_POST);
require_once '../db_connect.php';

// Calling file of functions for Input through $_GET
require_once '../Input.php';


// require_once '../php/parks_login.php';
$errors = [];
if (!empty($_POST)) {
    try {
        $name = Input::has('name') ? Input::getString('name') : '';
    }   catch (Exception $e) {
        array_push($errors, $e->getMessage());
    }

    try {
        $location = Input::has('location') ? Input::getString('location') : '';
    }   catch (Exception $e) {
        array_push($errors, $e->getMessage());
    }

    try {
        $date_established = Input::has('date_established') ? Input::getString('date_established') : '';
    }   catch (Exception $e) {
        array_push($errors, $e->getMessage());
    }

    try {
        $area_in_acres = Input::has('area_in_acres') ? Input::getNumber('area_in_acres') : '';
    }   catch (Exception $e) {
        array_push($errors, $e->getMessage());
    }

    try {
        $description = Input::has('description') ? Input::getString('description') : '';
    }   catch (Exception $e) {
        array_push($errors, $e->getMessage());
    }

    if (empty($errors)) {
        $stmt = $dbc->prepare("INSERT INTO parks (name, area_in_acres, date_established, location, description) VALUES (:name, :area_in_acres, :date_established, :location, :description)");

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':area_in_acres', $location, PDO::PARAM_STR);
                $stmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
                $stmt->bindValue(':location', $area_in_acres, PDO::PARAM_STR);
                $stmt->bindValue(':description', $description, PDO::PARAM_STR);

                $stmt->execute();
                }
}

if(Input::has('page')) 
{
    $page = Input::getNumber('page');
} else {
    $page=1;
}

if(Input::has('page')) {
$page = Input::getNumber('page');
} else {
    $page=1;
}

$offset = ($page-1) * 4;
$limit = 4;
$stmt = $dbc->prepare("SELECT * FROM parks LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();


//returns an array indexed by column name as returned in your result set
$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($parks);
?>

<html lang="en">
<head>
    <title>National Parks</title>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/national_parks.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/js/lib/bootstrap.min.js"></script>
</head>
<body>
	<table class="table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Location</td>
                <td>Date Established</td>
                <td>Area in Acres</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parks as $park) :?>
                <tr>
                    <td><?= $park['name'] ?></td>
                    <td><?= $park['location'] ?></td>
                    <td><?= $park['date_established'] ?></td>
                    <td><?= $park['area_in_acres'] ?></td>
                    <td><?= $park['description'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
            <form method="POST" action="national_parks.php">
                <label>Name</label>
                <input type="text" name="name"><br>
                <label>Location</label>
                <input type="text" name="location"><br>
                <label>Date Established</label>
                <input type="text" name="date_established"><br>
                <label>Area in Acres</label>
                <input type="text" name="area_in_acres"><br>
                <label>Description</label>
                <input type="text" name="description"><br>

                <button type="submit">Add Park</button>
            </form>

            <?php if (!empty($errors)) { ?>
                <?php foreach ($errors as $error) :?>
                    <tr>
                        <td><?= $error ?></td>
                    </tr>
                <?php endforeach ?>
            <?php } ?>

<a href="national_parks.php?page=<?= $page - 1 ?>">Previous</a>
<a href="national_parks.php?page=<?= $page + 1 ?>">Next</a>

</body>
</html>


