<?php
$host = "sqlXXX.epizy.com";        // Replace with your host
$username = "epiz_XXXXXXX";        // Replace with your username
$password = "your_password";       // Replace with your password
$dbname = "epiz_XXXXXXX_tasksdb";  // Replace with your db name

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
