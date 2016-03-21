<?php

require_once 'db_connect.php';

// Create the query and assign to var
$query = 'DROP TABLE IF EXISTS parks';
$dbc->exec($query);

$query = 'CREATE TABLE parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(240) NOT NULL,
    description TEXT,

    location VARCHAR (240) NOT NULL,
    date_established VARCHAR (240) NOT NULL,
    area_in_acres DOUBLE NOT NULL,
    PRIMARY KEY (id)
)';

$dbc->exec($query);