<?php

require_once '../db_connect.php';


If (Input::has('park_id')) {
	$id = Input::get('park_id');
	$stmt = $dbc->query("SELECT * FROM parks where id = $id");
}

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
	</table>
</body>
</html>


