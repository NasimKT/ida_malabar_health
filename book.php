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
                <div class="flex flex-wrap formbold--mx-3" style="padding-top: 20px;">
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5 w-full">
                            <label for="date" class="formbold-form-label">Date</label>
                            <input type="date" name="date" id="date" class="formbold-form-input" required>
                        </div>
                    </div>
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5">
                            <label for="time" class="formbold-form-label">Time</label>
                            <input type="time" name="time" id="time" class="formbold-form-input" required>
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