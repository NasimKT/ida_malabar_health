<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital registration form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="icon" href="img/WhatsApp Image 2023-11-20 at 6.26.56 AM.jpeg">
    <style>
    html,
    body {
        min-height: 100%;
        margin: 0;
        padding: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 16px;
        color: #eee;
    }

    body {
        background-size: cover;
        margin: 0;
    }

    h1,
    h2 {
        text-transform: uppercase;
        font-weight: 400;
    }

    .main-block {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        padding: 25px;
        background: rgba(0, 0, 0, 0.5);
    }

    .left-part,
    form {
        padding: 25px;
    }

    .left-part {
        text-align: center;
    }

    .fa-graduation-cap {
        font-size: 72px;
    }

    form {
        background: rgba(0, 0, 0, 0.7);
        width: 100%;
        max-width: 400px;
    }

    .title {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .info {
        display: flex;
        flex-direction: column;
        padding: 20px;
    }

    input,
    select {
        padding: 10px;
        margin-bottom: 20px;
        background: transparent;
        border: none;
        border-bottom: 1px solid #eee;
        width: 100%;
    }

    input::placeholder {
        color: #eee;
    }

    input.fname {
        color: white;
    }

    option:focus {
        border: none;
    }

    option {
        background: black;
        border: none;
    }

    .checkbox input {
        margin: 0 10px 0 0;
        vertical-align: middle;
    }

    .checkbox a {
        color: #26a9e0;
    }

    .checkbox a:hover {
        color: #85d6de;
    }

    .btn-item,
    button {
        padding: 10px 5px;
        margin-top: 20px;
        border-radius: 5px;
        border: none;
        background: #26a9e0;
        text-decoration: none;
        font-size: 15px;
        font-weight: 400;
        color: #fff;
        cursor: pointer;
    }

    .btn-item {
        display: inline-block;
        margin: 20px 5px 0;
    }

    button {
        width: 100%;
    }

    button:hover,
    .btn-item:hover {
        background: #85d6de;
    }

    @media (min-width: 568px) {
        .main-block {
            flex-direction: row;
        }

        .left-part,
        form {
            flex: 1;
            height: auto;
        }
    }
    </style>
</head>

<body>
    <div class="main-block">
        <div class="left-part">
            <!--<i class="fas fa-graduation-cap"></i>-->
            <h1>Registration</h1>
        </div>
        <form action="registrations.php" method="post" enctype="multipart/form-data">
            <div class="title">
                <i class="fas fa-pencil-alt"></i>
                <h2>Register here</h2>
            </div>
            <div class="info">
                <input class="fname" type="text" name="name" placeholder="Name of the clinic" id="name">
                <input type="file" name="image" id="myFile">
                <input type="text" name="socialLinks" placeholder="Google Map Link" class="fname" id="socialLinks">
                <input type="text" name="location" placeholder="Location" class="fname" id="location">
                <input type="url" name="web" placeholder="Clinic's website address" class="fname" id="web">
                <label for="ramp">Ramp available?</label>
                <p>
                    <input type="radio" id="rampYes" name="hasRampAccess" value="1" checked>Yes
                </p>
                <p>
                    <input type="radio" id="rampNo" name="hasRampAccess" value="0">No
                </p>
                <label for="ground">Ground Floor?</label>
                <p>
                    <input type="radio" id="groundYes" name="hasWheelchairAccess" value="1" checked>Yes
                </p>
                <p>
                    <input type="radio" id="groundNo" name="hasWheelchairAccess" value="0">No
                </p>
                <label for="lift">Lift available?</label>
                <p>
                    <input type="radio" id="liftYes" name="hasLiftAccess" value="1" checked>Yes
                </p>
                <p>
                    <input type="radio" id="liftNo" name="hasLiftAccess" value="0">No
                </p>

            </div>
            <button type="submit">Submit</button>
        </form>

    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to validate the form
        function validateForm() {
            var name = document.getElementById('name').value;
            var socialLinks = document.getElementById('socialLinks').value;
            var location = document.getElementById('location').value;
            var web = document.getElementById('web').value;
            var image = document.getElementById('myFile').value;

            // Check if name, socialLinks, location, web, and image fields are not empty
            if (name.trim() === '' || socialLinks.trim() === '' || location.trim() === '' || web.trim() === '' || image.trim() === '') {
                alert('Please fill in all required fields.');
                return false;
            }

            // Check if the socialLinks field contains a valid URL
            var urlRegex = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/i;
            if (!urlRegex.test(socialLinks)) {
                alert('Please enter a valid URL for the Google Map Link.');
                return false;
            }

            // Check if the web field contains a valid URL
            if (web.trim() !== '' && !urlRegex.test(web)) {
                alert('Please enter a valid Clinic\'s website address.');
                return false;
            }

            // Check if the image file has a valid extension (you can customize this check further)
            var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            var extension = image.split('.').pop().toLowerCase();
            if (allowedExtensions.indexOf(extension) === -1) {
                alert('Please upload a valid image file (jpg, jpeg, png, or gif).');
                return false;
            }

            // Check if at least one radio button is selected for each group
            var hasRampAccess = document.querySelector('input[name="hasRampAccess"]:checked');
            var hasWheelchairAccess = document.querySelector('input[name="hasWheelchairAccess"]:checked');
            var hasLiftAccess = document.querySelector('input[name="hasLiftAccess"]:checked');

            if (!hasRampAccess || !hasWheelchairAccess || !hasLiftAccess) {
                alert('Please select an option for all accessibility features.');
                return false;
            }

            return true;
        }

        // Add form submission event listener
        document.querySelector('form').addEventListener('submit', function (event) {
            // Prevent form submission if validation fails
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    });
</script>

</body>

</html>