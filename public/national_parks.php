<?php
var_dump($_POST);
require_once '../db_connect.php';

// Calling file of functions for Input through $_GET
require_once '../Input.php';

// require_once '../php/parks_login.php';

if(Input::has('page')) {
$page = $_GET['page'];
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
            <form method="POST" action="parks_index.php">
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

<a href="national_parks.php?page=<?= $page - 1 ?>">Previous</a>
<a href="national_parks.php?page=<?= $page + 1 ?>">Next</a>

</body>
</html>


