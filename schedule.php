<?php

include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $place = $_POST['place'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $id_number = isset($_POST['id']) ? $_POST['id'] : null;

    $check = "select * from disabled where id='$id_number'";
    $response = $conn->query($check);

    if ($id_number != null) {
        if ($response->num_rows == 0) {

            echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
            echo "<h2 style='color: red;'>Entered ID is invalid!</h2>";

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
                            window.location.href = 'book.php'; 
                        }
                    }
        
                    updateCountdown();
                </script>";

        }

    } else {

        $check = "select * from bookings where time='$time'";
        $response = $conn->query($check);

        if ($response->num_rows != 0) {

            echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
            echo "<h2 style='color: red;'>Booking Failed!<br>Time slot already booked!</h2>";

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
                            window.location.href = 'book.php'; 
                        }
                    }
        
                    updateCountdown();
                </script>";

        } else {
            $stmt = $conn->prepare("INSERT INTO bookings (name, phone, place, date, time) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $phone, $place, $date, $time);

            if ($stmt->execute()) {
                echo "<div style='text-align: center; padding: 20px; background-color: #f0f0f0; border: radius 20px; margin-top: 20px;'>";
                echo "<h2 style='color: green;'>Booking Successful!<br></h2>";

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

    }






}

?>