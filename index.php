<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO List Index</title>
</head>

<body>
    <h1>TO-DO List</h1>
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
        <tr>
            <td>1</td>
            <td>Task 1</td>
            <td>Task 1 description</td>
            <td>2021-12-31</td>
            <td>Done</td>
            <td>
                <a href="edit.php">Edit</a>
                <a href="delete.php">Delete</a>
            </td>
        </tr>
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