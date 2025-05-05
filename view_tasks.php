<?php
// Step 1: Connect to the database
$host = "sql113.infinityfree.com";       // Replace with your actual host
$username = "if0_38902911";       // Replace with your username
$password = "Sumanth2000";   // Replace with your password
$dbname = "if0_38902911_task_db";  // Replace with your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Step 2: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Fetch all tasks
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!-- Step 4: Display tasks in an HTML table -->
<div class="filter-bar">
    <input type="text" id="taskSearch" placeholder="Search..." onkeyup="filterTasks()">
    <select id="priorityFilter" onchange="filterByPriority()">
        <option value="all">All Priorities</option>
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
    </select>
</div>


<h2>Task List</h2>
<link rel="stylesheet" href="style.css">
<table border="1" cellpadding="20">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Actions</th>
        <th>Priority</th>
    </tr>
<script>
function filterTasks() {
    var input = document.getElementById("taskSearch");
    var filter = input.value.toLowerCase();
    var table = document.querySelector("table");
    var tr = table.getElementsByTagName("tr");

    // Loop through all rows (skip the first one which is the header)
    for (var i = 1; i < tr.length; i++) {
        var rowText = tr[i].textContent.toLowerCase();
        if (rowText.indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
function filterByPriority() {
    var filter = document.getElementById("priorityFilter").value;
    var table = document.querySelector("table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) {
        var priorityCell = rows[i].querySelector(".priority");
        if (!priorityCell) continue;

        var priority = priorityCell.textContent.toLowerCase();
        if (filter === "all" || priority === filter) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
</script>


<?php
if ($result->num_rows > 0) {
    // Step 5: Loop through each row and display it
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        //echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "<td>";
        echo "<a href='edit_task.php?id=" . $row["id"] . "'>Edit</a>";
        echo " | ";
        echo "<a href='delete_task.php?id=" . $row["id"] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>";
        echo "</td>";
        $priorityClass = strtolower($row["priority"]);
        echo "<td class='priority $priorityClass'>" . ucfirst($row["priority"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No tasks found.</td></tr>";
}
$conn->close();
?>
</table>
