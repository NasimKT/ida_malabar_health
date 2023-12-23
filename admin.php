<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <title>Admin Panel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .admin-panel {
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        #verify{
            display: none;
        }
    </style>
</head>

<body>
    <div class="admin-panel">
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <h2 class="m-0 text-primary">Admin Panel</h2>
                <div class="navbar-nav ms-auto py-0">
                    <a href="#" class="nav-item nav-link active" onclick="hide()">Dashboard</a>
                    <a href="#verify" class="nav-item nav-link" onclick="show()">Verify Registrations</a>
                    <a href="modify_content.php" class="nav-item nav-link">Modify Registrations</a>
                </div>
            </div>
        </nav>
        <div class="verify" id="verify">
            <?php
            include 'db_helper.php';
            $selectSql = "SELECT * FROM registrations WHERE verified = 0";
            $result = $conn->query($selectSql);

            if ($result->num_rows > 0) {
                echo "<h2>Registration Data:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Floor Number</th><th>Website</th><th>Ramp</th><th>Lift</th><th>Image</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['fl_no'] . "</td>";
                    echo "<td>" . $row['web'] . "</td>";
                    echo "<td>" . $row['ramp'] . "</td>";
                    echo "<td>" . $row['lift'] . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' style='max-width: 100px;'></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No unverified registrations found.";
            }
            ?>
        </div>
        <div class="content" id="content">
            <!-- Displaying Registrations -->
            <?php
            $selectSql = "SELECT * FROM registrations";
            $result = $conn->query($selectSql);

            if ($result->num_rows > 0) {
                echo "<h2>Registration Data:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Floor Number</th><th>Website</th><th>Ramp</th><th>Lift</th><th>Image</th><th>Verified</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['fl_no'] . "</td>";
                    echo "<td>" . $row['web'] . "</td>";
                    echo "<td>" . $row['ramp'] . "</td>";
                    echo "<td>" . $row['lift'] . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' style='max-width: 100px;'></td>";
                    echo "<td>" . ($row['verified'] ? 'Yes' : 'No') . "</td>";

                    // Conditionally display buttons based on verification status
                    if (!$row['verified']) {
                        echo "<td><button onclick='verifyRegistration(" . $row['id'] . ")'>Verify</button></td>";
                        echo "<td><button onclick='discardRegistration(" . $row['id'] . ")'>Discard</button></td>";
                    } else {
                        echo "<td colspan='2'>Verified</td>";
                    }

                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No records found.";
            }
            ?>
        </div>
        <script>
        function verifyRegistration(registrationId) {
            // Perform an AJAX request to the server to verify the registration
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "admin_panel.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response, you can update the UI or take other actions
                    alert(xhr.responseText);
                    window.location.reload();
                    // You may also choose to reload the page or update the table dynamically
                }
            };
            xhr.send("action=verify_registration&id=" + registrationId);
        }
        function discardRegistration(registrationId) {
        // Perform an AJAX request to the server to discard the registration
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "admin_panel.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response, you can update the UI or take other actions
                alert(xhr.responseText);
                window.location.reload();
                // You may also choose to reload the page or update the table dynamically
            }
        };
        xhr.send("action=discard_registration&id=" + registrationId);
        }  
        function show(){
            let win = document.getElementById('verify');
            let win1 =document.getElementById('content');
            win.style.display = "block";
            win1.style.display = "none";
        } 
        function hide(){
            let win = document.getElementById('verify');
            let win1 =document.getElementById('content');
            win.style.display = "none";
            win1.style.display = "block";
        }
    </script>


</body>

</html>