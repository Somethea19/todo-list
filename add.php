<?php
// Connect To Database 
require __DIR__ . '/db.php';
// Get the text from the form input
$new_task_title = trim($_POST['task_title'] ?? '');
// Only Insert The Task When The Feild Not Empty
if ($new_task_title !== "") {
    // Escape the tect to make it safe fro SQL
    $escaped_title = mysqli_real_escape_string($conn, $new_task_title);
    // Insert the new into the database
    mysqli_query($conn, "INSERT INTO tasks (title)
    VALUES ('$escaped_title')");
}
// Redirect back to index.php so the new tasks show
header('Location: index.php');
exit;