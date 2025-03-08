<?php
session_start();
require_once 'Repositories/Task.php';
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>

<body>
    <h1>Lets create a task</h1>
</body>

</html>

<form action="" method="POST">  
    <!-- create a form with POST method -->
    <label for="name">Task name</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="description">Task description</label>
    <input type="text" name="description" id="description" required>
    <br>
    <label for="deadline">Task deadline</label>
    <input type="date" name="deadline" id="deadline" required>
    <br>
    <label for="status">Task status</label>
    <select name="status" id="status">
        <option value="0">Not started</option>
        <option value="1">In progress</option>
        <option value="2">Completed</option>
    </select>
    <br>
    <button type="submit">Create task</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // check if the form was submitted to the server using POST method
    $name = $_POST['name'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $task = [
        'name' => $name,
        'description' => $description,
        'deadline' => $deadline,
        'status' => $status
    ];

    $taskObject = new Task($conn);
    $taskObject->name = $task['name'];
    $taskObject->description = $task['description'];
    $taskObject->deadline = $task['deadline'];
    $taskObject->status = intval($task['status']);

    $result = $taskObject->create();

    echo "<h1>Task created  $result </h1>";
}
?>
<hr>
<a href="index.php">Back to tasks</a>

<style>
    h1 {
        text-align: center;
    }

    a {
        text-decoration: none;
        color: blue;
    }

    a:hover {
        color: red;
        text-decoration: underline;
        font-weight: bold;
    }

    * {
        font-family: Arial, sans-serif;
        font-size: large;
    }
</style>