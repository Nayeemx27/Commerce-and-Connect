<?php

include '../config/config.php';

$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/news.css">
    <link rel="icon" type="image/x-icon" href="../img/c.png">
    <title>Updates</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Arial', sans-serif;
        }

        nav {
            background-color: #007bff;
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            border: none;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }

        .card-title {
            color: #007bff;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <h1 class=" container text-white">Notice</h1>
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="../Home/landingpage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../community/communityForum.php">Community</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../fileupload/material.php">Files</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<a href="news_details.php?id=' . $row["id"] . '" class="card-link">';
                echo '<img src="' . $row["image"] . '" class="card-img-top" alt="News Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["title"] . '</h5>';
                echo '<p class="card-text">' . substr($row["body"], 0, 150) . '...</p>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-md-12">';
            echo '<p class="text-center">No news available.</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

