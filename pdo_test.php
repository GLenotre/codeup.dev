<?php

REQUIRE 'db_connect.php';

echo $dbc ->getAttribute(PDO::ATTR_CONNECTION_STATUS);

// $sql = <<<QUERY
// 	CREATE TABLE teams (
// 		team_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
// 		name VARCHAR(100) NOT NULL,
// 		PRIMARY KEY(team_id)
// 		)
// 	Query;
// 	$connection->exec($sql);
// 	

$insert = 'INSERT INTO teams '