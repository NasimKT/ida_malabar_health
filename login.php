<?php
session_start();

include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["admin"] = true;

        // Redirect to admin.php
        header("Location: access.php");
        exit();
    } else {
        $response = "Login failed. Invalid username or password.";
    }
} else {
    $response = "Invalid request.";
}

$conn->close();
echo $response;
?>
