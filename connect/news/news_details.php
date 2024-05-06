<?php
include '../config/config.php';


if (isset($_GET['id'])) {
    $news_id = $_GET['id'];

    $sql = "SELECT * FROM news WHERE id = $news_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="../css/news_details.css">
                <link rel="icon" type="image/x-icon" href="../img/gshares.png">
                <title>Updates Details</title>
            </head>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <body>';

        // Bootstrap navigation bar
        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">GSHARE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/LandingPage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../community/communityPost.php">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../fileUpload/material.php">Files</a>
                        </li>
                    </ul>
                </div>
            </nav>';

        echo '<div class="container mt-5">';
        echo '<h1 class="text-center mb-4">' . $row["title"] . '</h1>';


        echo '<div class="image-container">';
        echo '<img src="' . $row["image"] . '" class="img-fluid" alt="News Image">';
        echo '</div>';

        echo '<div class="content">';
        echo '<p>' . $row["body"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</body></html>';
    } else {
        echo '<p>News not found.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}


$conn->close();
?>
