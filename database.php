<?php
function loadEnv($path) // load environment variables from .env file
{
    if (!file_exists($path)) return;

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            putenv(trim($key) . '=' . trim($value));
        }
    }
}

loadEnv(__DIR__ . '/.env');

$server_name = getenv("DATABASE_HOST");
$username = getenv("DATABASE_USERNAME");
$password = getenv("DATABASE_PASSWORD");
$db_name = getenv("DATABASE_NAME");

try {
    $conn = mysqli_connect($server_name, $username, $password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Database is Connected successfully";
    }
} catch (\Throwable $th) {
    $message = $th->getMessage();
    header("Location: /error.php?message=$message");
    exit();
}
