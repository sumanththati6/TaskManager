<?php
$host = "sql113.infinityfree.com";       // Replace with your actual host
$username = "if0_38902911";       // Replace with your username
$password = "Sumanth2000";   // Replace with your password
$dbname = "if0_38902911_task_db"; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to the database!";
?>
