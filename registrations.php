<?php
include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $socialLinks = $_POST['socialLinks'];
    $web = $_POST['web'];
    $hasRampAccess = isset($_POST['hasRampAccess']) ? $_POST['hasRampAccess'] : 0;
    $hasLiftAccess = isset($_POST['hasLiftAccess']) ? $_POST['hasLiftAccess'] : 0;
    $hasWheelchairAccess = isset($_POST['hasWheelchairAccess']) ? $_POST['hasWheelchairAccess'] : 0;

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        $uploadOk = 0;
        echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
            echo "<h2 style='color: green;'>Sorry, your file is too large!</h2>";
            
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
                            window.location.href = 'index.php'; 
                        }
                    }
        
                    updateCountdown();
                </script>";
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
        echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
            echo "<h2 style='color: green;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed!</h2>";
            
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
                            window.location.href = 'index.php'; 
                        }
                    }
        
                    updateCountdown();
                </script>";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {

        echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
            echo "<h2 style='color: green;'>Sorry, your file was not uploaded!</h2>";
            
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
                            window.location.href = 'index.php'; 
                        }
                    }
        
                    updateCountdown();
                </script>";
    } else {
        // Read the image file as binary data
        $imageData = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageData);

        // Insert into the database only if the file was successfully uploaded
        $sql = "INSERT INTO registrations (name, imageSrc, socialLinks, location, web, hasWheelChairAccess, hasRampAccess, hasLiftAccess) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Use prepared statement to avoid SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssiis', $name, $imageData, $socialLinks, $location, $web, $hasWheelchairAccess, $hasRampAccess, $hasLiftAccess);
        
        if ($stmt->execute()) {
            echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
            echo "<h2 style='color: green;'>Registration Successful!</h2>";
            
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
                            window.location.href = 'index.php'; 
                        }
                    }
        
                    updateCountdown();
                </script>";
        } else {
            echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; margin-top: 20px;'>";
            echo "<h2 style='color: red;'>Error: " . $stmt->error . "</h2>";
            echo "</div>";
        }

        $stmt->close();
    }
}

$conn->close();
?>