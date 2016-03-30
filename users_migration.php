
<?php

require_once 'codeup_test_db_login.php';
require_once 'db_connect.php';


// Create the query and assign to var

$dbc->exec('DROP TABLE IF EXISTS users');

$query = 'CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,

    first_name VARCHAR (240) NOT NULL,
    last_name VARCHAR (240) NOT NULL,
    email_address VARCHAR (240) NOT NULL,
    PRIMARY KEY (id)
)';

$dbc->exec($query);
?>