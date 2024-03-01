<?php

include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $place = $_POST['place'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $id_number = isset($_POST['id']) ? $_POST['id'] : null;

    

    $stmt = $conn->prepare("INSERT INTO bookings (name, phone, place, date, time, disabled_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $name, $phone, $place, $date, $time, $id_number);

    if ($stmt->execute()) {
        echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
        echo "<h2 style='color: green;'>Booking Successful!<br><br>You will get a confirmation mail once it has been verified</h2>";

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
                        window.location.href = 'team.php'; 
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

?>