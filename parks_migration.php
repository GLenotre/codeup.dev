<?php

$dbc = new PDO('mysql:host=127.0.0.1;dbname=parks_db', 'vagrant', 'vagrant');

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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