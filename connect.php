<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'dbm';
$connect = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);
if (!$connect) {
    die('Connection failed: ' . mysqli_connect_error());
}
