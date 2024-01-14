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

        #verify {
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
                    <a id="dash" href="#" class="nav-item nav-link active" onclick="hide()">Dashboard</a>
                    <a id="ver" href="#verify" class="nav-item nav-link" onclick="show()">Verify Registrations</a>
                    <a href="modify_content.php" class="nav-item nav-link">Modify Registrations</a>
                </div>
            </div>
        </nav>
        <div class="verify" id="verify">
            <?php
            include 'db_helper.php';

            // Display Pending Registrations
            $selectPendingSql = "SELECT * FROM registrations";
            $resultPending = $conn->query($selectPendingSql);

            if ($resultPending->num_rows > 0) {
                echo "<h2>Pending Registration Data:</h2>";
                echo "<table style='border-collapse: collapse; width: 100%; margin-top: 20px;'>";
                echo "<tr style='background-color: #f2f2f2;'>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>ID</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Name</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Location</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Website</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>About</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Ground Floor</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Ramp Access</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Lift Access</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Image</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Verified</th>";
                echo "<th style='border: 1px solid #dddddd; padding: 12px;'>Actions</th>";
                echo "</tr>";
            
                while ($row = $resultPending->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #dddddd; text-align: left; padding: 12px;'>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td><a href='". $row["socialLinks"] . "' style='text-decoration: none; color: #0066cc;'>Google Map</a></td>";
                    echo "<td><a href='" . $row['web'] . "' style='text-decoration: none; color: #0066cc;'>About</a></td>";
                    echo "<td>" . ($row['hasWheelChairAccess'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . ($row['hasRampAccess'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . ($row['hasLiftAccess'] ? 'Yes' : 'No') . "</td>";
                    echo "<td><img src='uploads/" . $row['imageSrc'] . "' alt='Image' style='max-width: 100px;'></td>";
                    echo "<td style='color: " . ($row['verified'] ? '#4CAF50' : 'red') . ";'>" . ($row['verified'] ? 'Yes' : 'No') . "</td>";
            
                    // Conditionally display buttons based on verification status
                    if (!$row['verified']) {
                        echo "<td>";
                        echo "<button onclick='verifyRegistration(" . $row['id'] . ")' style='background-color: #4CAF50; color: white; padding: 8px 16px; border: none; cursor: pointer;'>Verify</button>";
                        echo "<button onclick='discardRegistration(" . $row['id'] . ")' style='background-color: #f44336; color: white; padding: 8px 16px; border: none; cursor: pointer; margin-left: 5px;'>Discard</button>";
                        echo "</td>";
                    } else {
                        echo "<td>";
                        echo "<button onclick='deleteRegistration(" . $row['id'] . ")' style='background-color: #f44336; color: white; padding: 8px 16px; border: none; cursor: pointer;'>Delete</button>";
                        echo "</td>";
                    }
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
            // Display Approved Registrations
            $selectApprovedSql = "SELECT * FROM approved_registrations";
            $resultApproved = $conn->query($selectApprovedSql);

            if ($resultApproved->num_rows > 0) {
                echo "<h2>Registration Data:</h2>";
                echo "<table style='border-collapse: collapse; width: 100%; margin-top: 20px; border: 1px solid #dddddd;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='border: 1px solid #dddddd; padding: 8px;'>ID</th><th style='border: 1px solid #dddddd; padding: 8px;'>Name</th><th style='border: 1px solid #dddddd; padding: 8px;'>Location</th><th style='border: 1px solid #dddddd; padding: 8px;'>Website</th><th style='border: 1px solid #dddddd; padding: 8px;'>About</th><th style='border: 1px solid #dddddd; padding: 8px;'>Ground Floor</th><th style='border: 1px solid #dddddd; padding: 8px;'>Ramp Access</th><th style='border: 1px solid #dddddd; padding: 8px;'>Lift Access</th><th style='border: 1px solid #dddddd; padding: 8px;'>Image</th>";
    echo "</tr>";

    while ($row = $resultApproved->fetch_assoc()) {
        echo "<tr style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'>" . $row['name'] . "</td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'>" . $row['location'] . "</td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'><a href='". $row["socialLinks"] . "' style='text-decoration: none; color: #0066cc;'>Google Map</a></td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'><a href='" . $row['knowmorelink'] . "' style='text-decoration: none; color: #0066cc;'>About</a></td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'>" . ($row['hasWheelchairAccess'] ? 'Yes' : 'No') . "</td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'>" . ($row['hasRampAccess'] ? 'Yes' : 'No') . "</td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'>" . ($row['hasLiftAccess'] ? 'Yes' : 'No') . "</td>";
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'><img src='uploads/" . $row['imageSrc'] . "' alt='Image' style='max-width: 100px;'></td>";
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
            function deleteRegistration(registrationId) {
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

            function show() {
                let win = document.getElementById('verify');
                let win1 = document.getElementById('content');
                win.style.display = "block";
                win1.style.display = "none";

                let verify = document.getElementById('ver');
                let dash = document.getElementById('dash');
                verify.classList.remove('nav-item nav-link');
                verify.classList.add('nav-item nav-link active');
                dash.classList.remove('nav-item nav-link active');
                dash.classList.add('nav-item nav-link');
            }
            function hide() {
                let win = document.getElementById('verify');
                let win1 = document.getElementById('content');
                win.style.display = "none";
                win1.style.display = "block";

                let verify = document.getElementById('ver');
                let dash = document.getElementById('dash');
                dash.classList.remove('nav-item nav-link');
                dash.classList.add('nav-item nav-link active');
                verify.classList.remove('nav-item nav-link active');
                verify.classList.add('nav-item nav-link');
            }
        </script>
    </div>
</body>

</html>