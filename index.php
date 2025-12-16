<?php
// Start the session
session_start();

// Initialize the task list if not set
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Handle adding a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = trim($_POST['task']);
    if ($task !== '') {
        $_SESSION['tasks'][] = [
            'text' => htmlspecialchars($task),
            'completed' => false
        ];
    }
}

// Handle toggling task completion
if (isset($_POST['toggle'])) {
    $index = (int) $_POST['toggle'];
    if (isset($_SESSION['tasks'][$index])) {
        $_SESSION['tasks'][$index]['completed'] =
            !$_SESSION['tasks'][$index]['completed'];
    }
}

// Handle deleting a task
if (isset($_GET['delete'])) {
    $deleteIndex = (int) $_GET['delete'];
    if (isset($_SESSION['tasks'][$deleteIndex])) {
        unset($_SESSION['tasks'][$deleteIndex]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']); // reindex array
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
</head>

<body>
 <h1>Welcome to the To Do App</h1>
<form method="POST">
 <input type="text" id="taskInput" placeholder="Enter a new task" name="task">
 <button type="submit">Add Task</button>
</form>


<ul>
    <?php if (empty($_SESSION['tasks'])): ?>
        <li>No tasks added yet.</li>
    <?php else: ?>
        <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
            <li>
                <!-- Checkbox toggle form -->
                <form method="POST" style="display:inline">
                    <input type="hidden" name="toggle" value="<?= $index ?>">
                    <input
                        type="checkbox"
                        onchange="this.form.submit()"
                        <?= $task['completed'] ? 'checked' : '' ?>
                    >
                </form>

                <!-- Task text -->
                <span style="<?= $task['completed'] ? 'text-decoration: line-through;' : '' ?>">
                    <?= $task['text'] ?>
                </span>

                <!-- Delete -->
                <a href="?delete=<?= $index ?>">
                    <button type="button">Delete</button>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>


</body>
</html>