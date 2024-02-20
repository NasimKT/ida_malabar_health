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
    <link rel="icon" href="img/WhatsApp Image 2023-11-20 at 6.26.56 AM.jpeg">
    <title>Modify Registration</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <h2 class="m-0 text-primary">Admin Panel</h2>
                <div class="navbar-nav ms-auto py-0">
                    <a id="dash" href="admin.php" class="nav-item nav-link active" onclick="hide()">Dashboard</a>
                    <a id="ver" href="admin.php#verify" class="nav-item nav-link" onclick="show()">Verify Registrations</a>
                    <a href="modify_content.php" class="nav-item nav-link">Modify Registrations</a>
                </div>
            </div>
        </nav>
    <div class="container">
        <h2 class="my-4">Modify Registration</h2>

        <?php
        include("db_helper.php");
// Display Approved Registrations
$selectApprovedSql = "SELECT * FROM approved_registrations";
$resultApproved = $conn->query($selectApprovedSql);

if ($resultApproved->num_rows > 0) {
    echo "<h2>Registration Data:</h2>";
    echo "<table style='border-collapse: collapse; width: 100%; margin-top: 20px; border: 1px solid #dddddd;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='border: 1px solid #dddddd; padding: 8px;'>ID</th><th style='border: 1px solid #dddddd; padding: 8px;'>Name</th><th style='border: 1px solid #dddddd; padding: 8px;'>Location</th><th style='border: 1px solid #dddddd; padding: 8px;'>Website</th><th style='border: 1px solid #dddddd; padding: 8px;'>About</th><th style='border: 1px solid #dddddd; padding: 8px;'>Ground Floor</th><th style='border: 1px solid #dddddd; padding: 8px;'>Ramp Access</th><th style='border: 1px solid #dddddd; padding: 8px;'>Lift Access</th><th style='border: 1px solid #dddddd; padding: 8px;'>Image</th><th style='border: 1px solid #dddddd; padding: 8px;'>Action</th>";
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
        echo "<td style='border: 1px solid #dddddd; padding: 8px;'><button onclick='showModifyForm(" . $row['id'] . ")'>Modify Registration</button></td>";
        echo "</tr>";

        // Add a hidden form for each row with input fields to modify values
        echo "<tr id='modifyFormRow" . $row['id'] . "' style='display:none; background-color: #f2f2f2;'>";
        echo "<td colspan='9' style='padding: 10px;'>";
        echo "<form method='post' action='modify_registration.php' style='margin-top: 20px; padding: 10px; border: 1px solid #ddd;'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";

        echo "<label for='name' style='display: block; margin-top: 10px;'>Name:</label>";
        echo "<input type='text' name='name' value='" . $row['name'] . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";

        echo "<label for='location' style='display: block; margin-top: 10px;'>Location:</label>";
        echo "<input type='text' name='location' value='" . $row['location'] . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";

        echo "<label for='socialLinks' style='display: block; margin-top: 10px;'>Website:</label>";
        echo "<input type='text' name='socialLinks' value='" . $row['socialLinks'] . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";

        echo "<label for='knowmorelink' style='display: block; margin-top: 10px;'>About:</label>";
        echo "<input type='text' name='knowmorelink' value='" . $row['knowmorelink'] . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";

        echo "<label style='display: block; margin-top: 10px;'>Ground Floor:</label>";
        echo "<label style='margin-right: 10px;'><input type='radio' name='hasWheelchairAccess' value='1' " . ($row['hasWheelchairAccess'] ? 'checked' : '') . "> Yes</label>";
        echo "<label><input type='radio' name='hasWheelchairAccess' value='0' " . (!$row['hasWheelchairAccess'] ? 'checked' : '') . "> No</label>";

        echo "<label style='display: block; margin-top: 10px;'>Ramp Access:</label>";
        echo "<label style='margin-right: 10px;'><input type='radio' name='hasRampAccess' value='1' " . ($row['hasRampAccess'] ? 'checked' : '') . "> Yes</label>";
        echo "<label><input type='radio' name='hasRampAccess' value='0' " . (!$row['hasRampAccess'] ? 'checked' : '') . "> No</label>";

        echo "<label style='display: block; margin-top: 10px;'>Lift Access:</label>";
        echo "<label style='margin-right: 10px;'><input type='radio' name='hasLiftAccess' value='1' " . ($row['hasLiftAccess'] ? 'checked' : '') . "> Yes</label>";
        echo "<label><input type='radio' name='hasLiftAccess' value='0' " . (!$row['hasLiftAccess'] ? 'checked' : '') . "> No</label>";


        echo "<label for='imageSrc' style='display: block; margin-top: 10px;'>Image:</label>";
        echo "<input type='text' name='imageSrc' value='" . $row['imageSrc'] . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";

        echo "<input type='submit' value='Update' style='background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer;'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>

<script>
function showModifyForm(rowId) {
    // Hide all modify form rows
    var formRows = document.querySelectorAll('[id^=modifyFormRow]');
    formRows.forEach(function(row) {
        row.style.display = 'none';
    });

    // Show the modify form for the selected row
    var selectedRow = document.getElementById('modifyFormRow' + rowId);
    selectedRow.style.display = 'table-row';
}
</script>


    </div>
</body>

</html>