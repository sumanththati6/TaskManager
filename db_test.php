<?php
$host = "sqlXXX.epizy.com";        // Replace with your host
$username = "epiz_XXXXXXX";        // Replace with your username
$password = "your_password";       // Replace with your password
$dbname = "epiz_XXXXXXX_tasksdb";// Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to the database!";
?>
