<?php
include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['sig_email'];
    $password = $_POST['sig_pass'];

    $sql = "INSERT INTO users (email, password) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $password);

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
                        window.location.href = 'register.php'; 
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

$conn->close();

?>