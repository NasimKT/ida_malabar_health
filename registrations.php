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

    // Check if image file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not a valid image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
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
        $stmt->execute();
        $stmt->close();

        // Registration successful, now fetch and display the data
        $selectSql = "SELECT * FROM registrations";
        $result = $conn->query($selectSql);

        if ($result->num_rows > 0) {
            echo "<h2>Registration Data:</h2>";
            echo "<table style='border-collapse: collapse; width: 100%; margin-top: 20px;'>";
            echo "<tr style='background-color: #f2f2f2;'>";
            echo "<th>ID</th><th>Name</th><th>Location</th><th>Website</th><th>About</th><th>Ground Floor</th><th>Ramp Access</th><th>Lift Access</th><th>Image</th>";
            echo "</tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['location'] . "</td>";
                echo "<td><a href='". $row["socialLinks"] . "' style='text-decoration: none; color: #0066cc;'>Google Map</a></td>";
                echo "<td><a href='" . $row['web'] . "' style='text-decoration: none; color: #0066cc;'>About</a></td>";
                echo "<td>" . ($row['hasWheelChairAccess'] ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row['hasRampAccess'] ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row['hasLiftAccess'] ? 'Yes' : 'No') . "</td>";
                echo "<td><img src='uploads/" . $row['imageSrc'] . "' alt='Image' style='max-width: 100px;'></td>";
                echo "</tr>";
            }
        
            echo "</table>";
        } else {
            echo "No records found.";
        }
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
