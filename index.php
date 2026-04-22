<?php
require __DIR__ . '/db.php';
// Run a query to get all tasks from the database (newest first)
$task_result_set = mysqli_query(
    $conn,
    "SELECT id,title,is_done FROM tasks ORDER BY id DESC "
);
// Convert Data To Asso Array
$task_rows = [];
while ($task_row = mysqli_fetch_assoc(($task_result_set))) {
    $task_row['is_done'] = (int)$task_row['is_done'];
    $task_rows[] = $task_row;
}
// Count The Task
$total_task_count = count($task_rows);
$completed_task_count = 0;
foreach ($task_rows as $task) {
    if ($task['is_done'] === 1) {
        $completed_task_count++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>To Do App</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <main>
        <div class="container">
            <div class="todo-traker">
                <div class="task-traker-text">
                    <h2>Task Completed</h2>
                    <p class="completed-subheading">Keep it up</p>
                </div>
                <div class="task-counter">
                    <?php echo $completed_task_count; ?><span class="spacer">/</span><?php echo $total_task_count; ?>
                </div>
            </div>
            <form action="add.php" method="POST" class="task-form">
                <input type="text" name="task_title" class="task-input" placeholder="Your next task is ..." required>
                <button class="submit-btn" type="submit"><i class="fa-solid fa-plus fa-2xl"></i></button>
            </form>
            <!-- List -->
            <ul class="task-list">
                <?php foreach ($task_rows as $task): ?>
                    <!-- To-Do -->
                    <li class="task-item">
                        <div class="li-text">
                            <?php echo htmlspecialchars($task['title']) ?>
                        </div>
                        <!-- Button -->
                        <div class="task-icon">
                            <!-- Mark as done -->
                            <form action="toggle.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                <button class="icon-btn">
                                    <i class="fa-solid fa-circle-check fa-2xl"></i>
                                </button>
                            </form>
                            <!-- Delete -->
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                <button class="icon-btn">
                                    <i class="fa-solid fa-trash fa-2xl"></i>
                                </button>
                            </form>
                        </div>
                    </li>

                <?php endforeach ?>

            </ul>
            <form action="clear.php" method="post">
                <button class="clear-btn" type="submit">Clear All Task</button>
            </form>

        </div>
    </main>
    <script src="app.js"></script>


</body>

</html>