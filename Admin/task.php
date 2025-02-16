<?php
include "auth.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "adminPHP/db_connection.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "Task posted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="adminCSS/task.css">
    <title>Admin - Post Task</title>
    
</head>
<body>

    <header class="header">
        <div class="logo">
        <img src="../icons/lslogo.png" alt="Logo" />
        </div>
        <nav class="nav-links">
            <a href = "home.php">home</a>
            <a href = "logout.php">Log out</a>
        </nav>
    </header>
    
    <form action="task.php" method="post">
    <h1>Post a New Task</h1>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <button type="submit">Post Task</button>
    </form>

    <script>
        // menu
        document.addEventListener("DOMContentLoaded", function () {
        const burgerBtn = document.getElementById("burger-btn");
        const sideMenu = document.getElementById("side-menu");
        const closeBtn = document.getElementById("close-btn");
        const logoutBtn = document.getElementById("logout");

        burgerBtn.addEventListener("click", function () {
            sideMenu.style.right = "0";
        });

        closeBtn.addEventListener("click", function () {
            sideMenu.style.right = "-250px";
        });

        logoutBtn.addEventListener("click", function () {
            // Add your logout functionality here
            console.log("Logout clicked");
        });
        });
    </script>
</body>
</html>
