<?php
$host = "sqlXXX.epizy.com";        // Replace with your host
$username = "epiz_XXXXXXX";        // Replace with your username
$password = "your_password";       // Replace with your password
$dbname = "epiz_XXXXXXX_tasksdb"; // Replace with your db name

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 1: Get task by ID
$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$task = $result->fetch_assoc();

// Step 2: If form submitted, update task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    $updateSql = "UPDATE tasks SET title='$title', description='$description', status='$status', priority='$priority' WHERE id=$id";
    if ($conn->query($updateSql) === TRUE) {
        echo "Task updated successfully. <a href='view_tasks.php'>Go back</a>";
        exit;
    } else {
        echo "Error updating task: " . $conn->error;
    }
}
?>

<h2>Edit Task</h2>
<link rel="stylesheet" href="style.css">
<form method="POST" action="">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="readytostart" <?php if($task['status']=='readytostart') echo "selected"; ?>>Ready to Start</option>
        <option value="pending" <?php if($task['status']=='pending') echo "selected"; ?>>Pending</option>
        <option value="in progress" <?php if($task['status']=='in progress') echo "selected"; ?>>In Progress</option>
        <option value="done" <?php if($task['status']=='done') echo "selected"; ?>>Done</option>
    </select><br><br>
    <label>Priority:</label><br>
    <select name="priority">
        <option value="low" <?php if($task['priority']=='low') echo "selected"; ?>>Low</option>
        <option value="medium" <?php if($task['priority']=='medium') echo "selected"; ?>>Medium</option>
        <option value="high" <?php if($task['priority']=='high') echo "selected"; ?>>High</option>
    </select><br><br>


    <input type="submit" value="Update Task">
</form>
