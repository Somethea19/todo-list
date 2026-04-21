<?php
require __DIR__ . '/db.php';

// delete all rows
mysqli_query($conn, "DELETE FROM tasks");

header('Location: index.php');
exit;