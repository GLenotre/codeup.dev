<?php

require_once '../db_connect.php';
require_once '../Input.php';
// require_once '../php/parks_login.php';

if(Input::has('page')) {
$page = $_GET['page'];
} else {
    $page=1;
}

$offset = ($page-1) * 4;
$limit = 4;
$statement = $dbc->query("SELECT * FROM parks
    LIMIT $limit
    OFFSET $offset
    ");

//returns an array indexed by column name as returned in your result set
$parks = $statement->fetchAll(PDO::FETCH_ASSOC);
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

<a href="national_parks.php?page=<?= $page - 1 ?>">Previous</a>
<a href="national_parks.php?page=<?= $page + 1 ?>">Next</a>

</body>
</html>


