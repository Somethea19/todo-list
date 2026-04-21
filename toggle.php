<?php
require __DIR__ . '/db.php';

$id = (int)($_POST['id'] ?? 0);

if ($id > 0) {
    mysqli_query($conn, "
        UPDATE tasks 
        SET is_done = NOT is_done 
        WHERE id = $id
    ");
}

header('Location: index.php');
exit;