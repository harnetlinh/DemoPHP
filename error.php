<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <h1>There was an error</h1>
    <p>There was an error while processing your request. Please try again later.</p>
    <?php
    if (isset($_GET['message'])) {
        echo "<p class='message'>Message: " . $_GET['message'] . "</p>";
    }
    ?>
</body>
</html>

<style>
    .message {
        color: red;
    }
</style>