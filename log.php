<?php
include 'db_helper.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = true;
        header("Location: index.php");
        exit();
    } else {
        $response = "Login failed. Invalid username or password.";
        header("Location: invalid@0.html");
        exit();
    }
} else {
    $response = "Invalid request.";
}

$conn->close();

?>
