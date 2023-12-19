<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Save data to a text file (you might want to use a database in a real application)
    $data = "$title|$content\n";
    file_put_contents('content_database.txt', $data, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add Content</title>
</head>
<body>
    <div class="admin-panel">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="add_content.php">Add Content</a></li>
                <li><a href="modify_content.php">Modify Content</a></li>
            </ul>
        </aside>
        <div class="content">
            <h1>Add Content</h1>
            <form method="post" action="add_content.php">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea>

                <button type="submit">Add Content</button>
            </form>
        </div>
    </div>
</body>
</html>
