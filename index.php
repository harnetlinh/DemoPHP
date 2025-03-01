<?php
session_start();
$_SESSION['user'] = 'admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO List Index</title>
</head>

<body>
    <h1>TO-DO List</h1>
    <?php
    if (!isset($_SESSION['user'])) {
        echo "<h1>THERE IS NO SESSION</h1>";
    } else {
        echo "<h1>WELCOME " . $_SESSION['user'] . "</h1>";
    }
    ?>
    <a href="create.php">Create new task</a>
    <table>
        <tr>
            <th>STT</th>
            <th>Task name</th>
            <th>Task description</th>
            <th>Task deadline</th>
            <th>Task status</th>
            <th>Action</th>
        </tr>
        <?php
        $tasks = [];

        
        $decoded_tasks = [];
        if (isset($_SESSION['tasks'])) {
            $tasks = $_SESSION['tasks'];
            $decoded_tasks = json_decode($tasks, true);
        }

        for ($i=0; $i < count($decoded_tasks); $i++) { 
            echo "
            <tr>
                <td>".($i+1)."</td>
                <td>".$decoded_tasks[$i]['name']."</td>
                <td>".$decoded_tasks[$i]['description']."</td>
                <td>".$decoded_tasks[$i]['deadline']."</td>
                <td>".$decoded_tasks[$i]['status']."</td>
                <td>
                    <a href='edit.php'>Edit</a>
                    <a href='delete.php'>Delete</a>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
</body>

</html>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

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