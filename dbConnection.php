<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "euniel";

// Create connection using MySQLi OOP
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}
?>