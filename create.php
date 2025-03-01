<?php
session_start();
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
        <option value="Not started">Not started</option>
        <option value="In progress">In progress</option>
        <option value="Completed">Completed</option>
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

    $tasks = [];
    if (isset($_SESSION['tasks'])) { // if there are tasks in the session
        $tasks_in_text = $_SESSION['tasks']; // get the tasks in text format
        $tasks = json_decode($tasks_in_text, true); // convert the tasks from text to array
    }

    $tasks[] = $task; // add the new task to the $tasks array // is the same as array_push($tasks, $task);
    $_SESSION['tasks'] = json_encode($tasks); // save the tasks in the session
    echo "<h1>Task created successfully</h1>";
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