<?php
// Step 1: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 2: Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    // Step 3: Connect to database
    $host = "sql113.infinityfree.com";       // Replace with your actual host
    $username = "if0_38902911";       // Replace with your username
    $password = "Sumanth2000";   // Replace with your password
    $dbname = "if0_38902911_task_db"; // Replace with your db name

    $conn = new mysqli($host, $username, $password, $dbname);

    // Step 4: Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 5: Insert task into database
    $sql = "INSERT INTO tasks (title, description, status, priority)
        VALUES ('$title', '$description', '$status', '$priority')";

    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- HTML Form to collect task info -->
<h2>Add Task</h2>
<link rel="stylesheet" href="style.css">
<form method="POST" action="">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="readytostart" selected>Ready to Start</option>
        <option value="pending">Pending</option>
        <option value="in progress">In Progress</option>
        <option value="done">Done</option>
    </select><br><br>
    <label>Priority:</label><br>
    <select name="priority">
        <option value="low" selected>Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
    </select><br><br>
    <input type="submit" value="Add Task">
</form>
