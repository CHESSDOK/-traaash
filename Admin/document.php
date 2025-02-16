<?php
include "auth.php";
include 'adminPHP/db_connection.php';
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Select the database
if (!$conn->select_db($database)) {
  die("Database selection failed: " . $conn->error);
}

$sql = "SELECT * FROM files";
$result = $conn->query($sql);
if (!$result) {
  die("Invalid query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
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
    <link rel="stylesheet" href="../css/upload.css" />
    <title>Upload Files</title>
  </head>
  <body>
    <header>
        <div class="logo">
            <img src="../icons/lslogo.png" alt="Logo">
        </div>
        <div class="burger-menu">
            <button id="burger-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    <div id="side-menu" class="side-menu">
        <button id="close-btn">&times;</button>
        <ul>
            <li><a href="#">Profile</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="../index.html" id="logout">Logout</a></li>
        </ul>
    </div>
    <div class="section-container">
        <div class="form-row">
            <div class="form-group">
                <div class="search">
                    <label for="search">Search</label>
                    <input type="text" id="search" name="search" placeholder="Enter search term...">
                </div>
            </div>
            <div class="form-group">
                <div class="category">
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option value="">Select category</option>
                        <option value="English">English</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="Humanities">Humanities</option>
                        <option value="Communication">Communication</option>
                        <option value="ICT">ICT</option>
                    </select>
                </div>
            </div></div>
                <div class="form-group">
                <div class="button-container">
                    <button id="redirectButton">Upload</button>
                </div>   
                </div>
            </div>
    </div>
    <table>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Size</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="fileTableBody">
            <?php
            while ($row = $result->fetch_assoc()) {
                $FilesID = $row['FilesID'];
                echo "
                    <tr>
                        <td data-label='Name'>" . $row['name'] . "</td>
                        <td data-label='Category'>" . $row['categ'] . "</td>
                        <td data-label='Size'>" . $row['size'] . "</td>
                        <td>
                            <a href='../php/upload.php?delete=$FilesID' class='delete-link'>Delete</a>
                            <a href='../php/upload.php?read=$FilesID' target='_blank' class='read-link'>Read</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    <script src="js/upload.js"></script>
    <script src="../js/filter.js"></script>
</body>
</html>
