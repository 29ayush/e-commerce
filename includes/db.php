<?php

$databaseServer = 'localhost';
$username = 'root';
$password = '';
$database = 'e-commerce';

$connection = mysqli_connect($databaseServer, $username, $password, $database);

if (!$connection)
    die("Database Connection Failed!");

//date_default_timezone_set('Asia/kolkata');

?>
