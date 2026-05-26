<?php

$host = 'localhost';
$dbname = 'italikasiete';
$username = 'dev_user';
$password = 'botas17';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
