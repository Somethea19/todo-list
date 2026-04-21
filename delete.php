<?php
require __DIR__ . '/db.php';

$id = (int)($_POST['id'] ?? 0);

if ($id > 0) {
    mysqli_query($conn, "DELETE FROM tasks WHERE id = $id");
}

header('Location: index.php');
exit;
