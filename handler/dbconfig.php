<?php
$host = 'localhost';
$db_name = 'zantech';
$username = 'root';
$password = 'admin1234';

try {
    // Set the DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";

    // Create a new PDO instance
    $conn = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
