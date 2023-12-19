<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.admin-panel {
    display: flex;
}

.sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
    padding: 20px;
}

.sidebar h2 {
    margin-bottom: 20px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar li {
    margin-bottom: 10px;
}

.sidebar a {
    text-decoration: none;
    color: #fff;
}

.content {
    flex: 1;
    padding: 20px;
}

    </style>
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
            <!-- Your content goes here -->
            <h1>Welcome to the Admin Panel</h1>
        </div>
    </div>
</body>
</html>
