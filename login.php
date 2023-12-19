<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Perform authentication logic (replace with your actual logic)
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = "Login successful. Welcome, " . $user;
    } else {
        $response = "Login failed. Invalid username or password.";
    }
} else {
    $response = "Invalid request.";
}

$conn->close();
echo $response;
?>
