<?php
include 'db_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $fl_no = $_POST['fl_no'];
    $web = $_POST['web'];
    $ramp = $_POST['ramp'];
    $lift = $_POST['lift'];
    $response = "Everything running fine.";

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $response = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        $response = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $response = "Sorry, your file was not uploaded.";
    } else {
        // Read the image file as binary data
        $imageData = file_get_contents($_FILES["file"]["tmp_name"]);

        // Insert into the database only if the file was successfully uploaded
        $sql = "INSERT INTO registrations (name, email, phone, address, fl_no, web, ramp, lift, image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Use prepared statement to avoid SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssss', $name, $email, $phone, $address, $fl_no, $web, $ramp, $lift, $imageData);
        $stmt->execute();
        $stmt->close();

        // Registration successful, now fetch and display the data
        $selectSql = "SELECT * FROM registrations";
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
            echo "No records found.";
        }
    }
} else {
    $response = "Invalid request.";
}

$conn->close();
echo $response;
?>

