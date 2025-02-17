<?php # Script 9.2 - mysqli_connect.php

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the database access information as constants:
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'book_store');

// Make the connection:
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($dbc->connect_error) {
    echo "Connection Failed:".$dbc->connect_error;
}

// Set the encoding...
$dbc->set_charset('utf8');