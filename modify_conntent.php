<?php
// Fetch content from the text file (you might want to use a database in a real application)
$contentData = file_get_contents('content_database.txt');
$contentArray = explode("\n", trim($contentData));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Modify Content</title>
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
            <h1>Modify Content</h1>
            <?php foreach ($contentArray as $content) : ?>
                <?php if (!empty($content)) : ?>
                    <?php list($title, $text) = explode('|', $content); ?>
                    <div class="content-item">
                        <h2><?= $title ?></h2>
                        <p><?= $text ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
