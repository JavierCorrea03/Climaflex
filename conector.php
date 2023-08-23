<?php

// Config
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'climaflex';


$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$db) {
    die("Fallo de conexión: " . mysqli_connect_error());
}