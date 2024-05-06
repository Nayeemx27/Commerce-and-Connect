<?php
   include '../config/config.php';
   include '../session/sessionfile.php';
   
   
   if(isset( $_SESSION['l_uname'])){
    $username = $_SESSION['l_uname'];
    // $sql = "SELECT * FROM files WHERE uploader = $username";
    $sql = "SELECT * FROM files WHERE uploader = '$username'";
    $result = $conn->query($sql);   
    $conn-> close();   
     }
      else{
      echo "<script>alert('can't access from URL login First')</script>";
      echo "<script>location.href='../Home/LandingPage.html'</script>";
       }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/c.png">
    <title>
    <?php echo $_SESSION['l_uname'];?> | Dashboard
    </title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
   
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
        }

        .navbar {
            background-color: #007bff;
            color: #fff;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .list-group-item {
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #007bff;
            color: #fff;
        }

        .active {
            background-color: #007bff !important;
            color: #fff !important;
        }
   
        .active {
            background-color: #007bff !important;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
               Hello, <?php echo $_SESSION['l_uname']; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../Home/LandingPage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../userProfile/profilepage.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../community/communityPost.php">Community</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Home/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active"
                        onclick="showContent('yourUpload')">Your Uploads</a>
                    <a href="#" class="list-group-item list-group-item-action"
                        onclick="showContent('communityPost')">Community Posts</a>
                </div>
            </div>
            <div class="col-md-9">
                <div id="yourUploadContent" style="display: none;">
                    <h1>Your Uploads</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>File Name</th>
                                <th>File</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$count."</td>";
                                    echo "<td>".$row['Filename']."</td>";
                                    echo "<td>".$row['file']."</td>";
                                    echo '<td><a href="../materials/'.$row['file'].'" class="btn btn-success"
                                            target="_blank">Open</a></td>';
                                    echo "</tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td colspan='4'>No Records Found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="communityPostContent" style="display: none;">
                    <h1>Community Posts</h1>
                    <a href="../Community/generalpost.php" class="btn btn-primary">+ Add General Post</a>
                    <a href="../Community/techpost.php" class="btn btn-primary">+ Add Tech Post</a>
                    <a href="../Community/programmingpost.php" class="btn btn-primary">+ Add Programming Post</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const storedContentId = localStorage.getItem('activeContentId');
        if (storedContentId) {
            showContent(storedContentId);
        }

        function showContent(contentId) {
            document.getElementById('yourUploadContent').style.display = 'none';
            document.getElementById('communityPostContent').style.display = 'none';

            document.getElementById(contentId + 'Content').style.display = 'block';

            var listItems = document.querySelectorAll('.list-group-item');
            listItems.forEach(function (item) {
                item.classList.remove('active');
            });

            document.querySelector('[onclick="showContent(\'' + contentId + '\')"]').classList.add('active');

            localStorage.setItem('activeContentId', contentId);
        }
    </script>
</body>

</html>
