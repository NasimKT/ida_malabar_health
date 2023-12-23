<?php
include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    // Check if the action is to verify a registration
    if ($action == "verify_registration") {
        $registrationId = $_POST['id'];

        // Get the registration details
        $selectSql = "SELECT * FROM registrations WHERE id = $registrationId";
        $result = $conn->query($selectSql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Perform the verification logic here (update the database, set a flag, etc.)
            $updateSql = "UPDATE registrations SET verified = 1 WHERE id = $registrationId";

            if ($conn->query($updateSql) === TRUE) {
                $response = "Registration verified successfully.";
            } else {
                $response = "Error verifying registration: " . $conn->error;
            }
        } else {
            $response = "Registration not found.";
        }
    } else {
        $response = "Invalid action.";
    }
} else {
    $response = "Invalid request.";
}

$conn->close();
echo $response;


?>
