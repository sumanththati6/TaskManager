<?php
$host = "sql113.infinityfree.com";       // Replace with your actual host
$username = "if0_38902911";       // Replace with your username
$password = "Sumanth2000";   // Replace with your password
$dbname = "if0_38902911_task_db";  // Replace with your db name

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get task ID from the URL
$id = $_GET['id'];

// Delete the task
$sql = "DELETE FROM tasks WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    // Redirect to task list
    header("Location: view_tasks.php");
    exit;
} else {
    echo "Error deleting task: " . $conn->error;
}

$conn->close();
?>
