<?php
session_start();
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
                // Insert the verified data into the approved_registrations table
                $insertSql = "INSERT INTO approved_registrations (name, imageSrc, socialLinks, location, knowmorelink, hasWheelchairAccess, hasRampAccess, hasLiftAccess) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
                $stmt = $conn->prepare($insertSql);
            
                // Assuming your data types are: string, string, string, string, string, int, int, int
                $stmt->bind_param('sssssiib', $row['name'], $row['imageSrc'], $row['socialLinks'], $row['location'], $row['knowmorelink'], $row['hasWheelchairAccess'], $row['hasRampAccess'], $row['hasLiftAccess']);
            
                if ($stmt->execute()) {
                    $response = "Registration verified and moved to approved_registrations successfully.";
                } else {
                    $response = "Error moving registration to approved_registrations: " . $stmt->error;
                }
            
                $stmt->close();
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    // Check if the action is to discard a registration
    if ($action == "discard_registration") {
        $registrationId = $_POST['id'];

        // Perform the discard logic here (delete the record from the table)
        $deleteSql = "DELETE FROM registrations WHERE id = $registrationId";

        if ($conn->query($deleteSql) === TRUE) {
            $response = "Registration discarded successfully.";
        } else {
            $response = "Error discarding registration: " . $conn->error;
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