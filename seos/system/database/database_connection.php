<?php 

$serverName = 'localhost';
$userName = 'root';
$password = '';
$database_name = 'seos_db';


try {
    $connection = new PDO("mysql:host=$serverName;dbname=$database_name", $userName, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Error!:" . $e->getMessage() . "<br>";
    die();
}