<?php
    include '../session/sessionfile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/c.png">
    <title>Community</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
            background-color: #f8f9fa;
            color: #495057;
        }

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #007bff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }

        .navbar-nav .nav-link {
            color: #495057;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        .hero {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 100px 0;
        }

        .features {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            text-align: center;
        }

        .btn {
            border-radius: 0;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #ffffff;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            margin-top: 40px;
            padding: `0px 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Community</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../home/Landingpage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../chat/chat.php">Community Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../community/community.php">Members</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero bg-primary text-white text-center">
    <div class="container">
        <h1 class="display-4">Welcome to Community</h1>
        <p class="lead">Connect, Share, and Learn Together</p>
    </div>
</section>

<!-- Community Features Section -->
<section class="features ">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Community Forum</h5>
                        <p class="card-text">Engage in meaningful discussions with fellow community members.</p>
                        <a class="btn btn-primary rounded-3 btn-lg" href="../community/communityForum.php">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Updates</h5>
                        <p class="card-text">Stay updated on community news and connected with the Community.</p>
                        <a class="btn btn-primary rounded-3 btn-lg" href="../news/news.php">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Resources</h5>
                        <p class="card-text">Access valuable resources shared by community members.</p>
                        <a class="btn btn-primary  rounded-3 btn-lg" href="../fileUpload/material.php">View</a>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <p>&copy; 2023 Commerce and Connect. All Rights Reserved.</p>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
