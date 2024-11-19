<?php
require '../vendor/autoload.php'; 

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$database =$_ENV['DB_NAME'];

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    echo "connection failed";
    die("Connection failed: " . $conn->connect_error);
}
