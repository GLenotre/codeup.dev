
<?php
require_once "../Input.php";
require_once "../db_connect.php";

var_dump($_POST);

if(Input::has('name') && Input::get('name') != ''
	&& Input::has('area_in_acres') && Input::get('area_in_acres') != ''
	&& Input::has('date_established') && Input::get('date_established') != ''
	&& Input::has('location') && Input::get('location') != ''
	&& Input::has('description') && Input::get('description') != ''
	){
        $parkName = Input::get('name');
        $parkArea = Input::get('area_in_acres');
        $parkDate = Input::get('date_established');
        $parkLocation = Input::get('location');
        $parkDescription = Input::get('description');

        $stmt = $dbc->prepare("INSERT INTO parks (name, area_in_acres, date_established, location, description) VALUES (:name, :area_in_acres, :date_established, :location, :description)");

        $stmt->bindValue(':name', $parkName, PDO::PARAM_STR);
        $stmt->bindValue(':area_in_acres', $parkArea, PDO::PARAM_STR);
        $stmt->bindValue(':date_established', $parkDate, PDO::PARAM_STR);
        $stmt->bindValue(':location', $parkLocation, PDO::PARAM_STR);
        $stmt->bindValue(':description', $parkDescription, PDO::PARAM_STR);

        $stmt->execute();
    }




?>
<!DOCTYPE html>
<html>
<head>
    <title>New Park</title>
</head>
<body>
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


</body>
</html>