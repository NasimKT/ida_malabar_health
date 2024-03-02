<!doctype html>
<html lang="en">

<head>
    <title>Appointment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="book.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form action="schedule.php" method="POST">
                <div class="formbold-mb-5">
                    <label for="name" class="formbold-form-label">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Full Name" class="formbold-form-input"
                        required>
                </div>
                <div class="formbold-mb-5">
                    <label for="phone" class="formbold-form-label">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your phone number"
                        class="formbold-form-input" required>
                </div>
                <div class="formbold-mb-5">
                    <label for="email" class="formbold-form-label">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email"
                        class="formbold-form-input" required>
                </div>
                <div class="formbold-mb-5">
                    <label for="place" class="formbold-form-label">Place</label>
                    <input type="text" name="place" id="place" placeholder="Place" class="formbold-form-input" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Please check this if you are a disabled
                        person.</label>
                </div>
                <div class="formbold-mb-5" id="idnumber" style="display: none; padding-top: 20px;">
                    <label for="id" class="formbold-form-label">ID Number</label>
                    <input type="text" name="id" id="id" placeholder="ID Number" class="formbold-form-input">
                </div>
                <?php
                    include 'db_helper.php';

                    $query = "SELECT id, name FROM approved_registrations";
                    $result = mysqli_query($conn, $query);

                    // Check if query was successful
                    if ($result) {
                        // Start generating the dropdown menu
                        echo '<div style="padding-top: 20px;"></div>';
                        echo '<select name="options" id="options" class="formbold-form-input">';
                        echo '<option value="">Select the hospital</option>';

                        // Loop through the results and generate options
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }

                        // Close the select tag
                        echo '</select>';
                    } else {
                        // Query failed
                        echo 'Failed to fetch options from the database.';
                    }
                    ?>
                <div class="flex flex-wrap formbold--mx-3" style="padding-top: 20px;">
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5 w-full">
                            <label for="date" class="formbold-form-label">Date</label>
                            <input type="date" name="date" id="date" class="formbold-form-input" required>
                        </div>
                    </div>
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5">
                            <label for="time" id="head" class="formbold-form-label">Time</label>
                            <label for="time" id="timing" class="formbold-form-label"
                                style="font-size:7pt; color:blue; display:none;">Working hours: 9 to
                                17(9 AM to 5
                                PM). Please note that available minutes are 00, 20 or 40.</label>
                            <input type="time" name="time" id="time" placeholder="Time" class="formbold-form-input"
                                required>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="formbold-btn" type="submit">Book Appointment</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let checkbox = document.querySelector('input[type="checkbox"]');
        checkbox.addEventListener('change', function () {
            var check = document.getElementById('flexCheckDefault');
            var id_window = document.getElementById('idnumber');
            if (check.checked) {
                id_window.style.display = 'block';
            } else {
                id_window.style.display = 'none';
            }
        });
        let time = document.querySelector('input[type="time"]');
        time.addEventListener('mouseover', function () {
            document.getElementById('timing').style.display = 'block';
            document.getElementById('head').style.display = 'none';
        });
        time.addEventListener('mouseout', function () {
            document.getElementById('timing').style.display = 'none';
            document.getElementById('head').style.display = 'block';
        });

        document.getElementById('time').addEventListener('change', function (e) {
            var hour = new Date(e.target.value).getHours();
            if ((hour >= 0 && hour < 8) || hour == 13 || (hour > 17 && hour <= 23)) {
                alert('Time is not allowed');
                e.target.value = '';
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            var dateInput = document.getElementById('date');
            var timeInput = document.getElementById('time');

            // Disable Sundays
            dateInput.addEventListener('input', function () {
                var selectedDate = new Date(dateInput.value);
                if (selectedDate.getDay() === 0) { // 0 is Sunday
                    alert('Sundays are not allowed.');
                    dateInput.value = ''; // Clear the input
                }
            });

            // Limit time input to 9 AM to 5 PM with minutes 00, 20, 40
            timeInput.addEventListener('input', function () {
                var selectedTime = new Date('1970-01-01T' + timeInput.value);
                var hour = selectedTime.getHours();
                var minute = selectedTime.getMinutes();
                if (hour < 9 || hour > 17 || (minute !== 0 && minute !== 20 && minute !== 40)) {
                    alert('Please select a time between 9 AM and 5 PM with minutes 00, 20, or 40.');
                    timeInput.value = ''; // Clear the input
                }
            });
        });

    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>

</html>