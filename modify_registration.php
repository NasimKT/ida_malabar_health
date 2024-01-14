<?php
// modify_registration.php

// Include your database connection file
include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $socialLinks = $_POST['socialLinks'];
    $knowmorelink = $_POST['knowmorelink'];
    $hasWheelchairAccess = isset($_POST['hasWheelchairAccess']) ? 1 : 0;
    $hasRampAccess = isset($_POST['hasRampAccess']) ? 1 : 0;
    $hasLiftAccess = isset($_POST['hasLiftAccess']) ? 1 : 0;
    $imageSrc = $_POST['imageSrc'];

    $updateSql = "UPDATE approved_registrations SET 
                  name = '$name', 
                  location = '$location',
                  socialLinks = '$socialLinks',
                  knowmorelink = '$knowmorelink',
                  hasWheelchairAccess = $hasWheelchairAccess,
                  hasRampAccess = $hasRampAccess,
                  hasLiftAccess = $hasLiftAccess,
                  imageSrc = '$imageSrc'
                  WHERE id = $id";

    // Execute the update query
    if ($conn->query($updateSql) === TRUE) {
        echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; margin-top: 20px;'>";
        echo "<h2 style='color: green;'>Modification Successful!</h2>";
        
        echo "<div id='countdown' style='font-size: 24px; color: #333; margin-top: 20px;'></div>";
    
        echo "</div>";
    
        echo "<script>
                var countdown = 5; // Countdown time in seconds
    
                function updateCountdown() {
                    document.getElementById('countdown').innerHTML = 'Redirecting in ' + countdown + ' seconds';
                    if (countdown > 0) {
                        countdown--;
                        setTimeout(updateCountdown, 1000);
                    } else {
                        window.location.href = 'admin.php'; 
                    }
                }
    
                updateCountdown();
            </script>";
    } else {
        echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; margin-top: 20px;'>";
        echo "<h2 style='color: red;'>Error: " . $updateSql . "<br>" . $conn->error . "</h2>";
        echo "</div>";
    }
    }

// Close the database connection
$conn->close();
?>
