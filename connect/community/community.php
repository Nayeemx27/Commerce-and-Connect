<?php
include '../config/config.php';
include '../session/sessionfile.php';


$sql = "SELECT userinfo.id, userinfo.username, userinfo.email, COUNT(files.uploader) AS upload_count
   FROM userinfo
   LEFT JOIN files ON userinfo.username = files.uploader
   WHERE userinfo.Ban = 0
   GROUP BY userinfo.id, userinfo.username, userinfo.email";
$result = $conn->query($sql);







$data = "SELECT * FROM material_request";
$rs = $conn->query($data);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMMUNITY</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/c.png">
    <script src="https://kit.fontawesome.com/c68b4388d9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>

<body class="b-g-c">
    <header>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="../Home/Landingpage.php"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../Home/Landingpage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../fileUpload/material.php">Files</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../fileUpload/file.php">Contribute</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="container mt-5">
            <h1 class="text-center">Community</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <!-- Member list -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Member List
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th> Uploads</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //  $count =1;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            //   echo "<td>".$count."</td>";
                                            echo "<td><strong><a href='../userProfile/userprofile.php? id=$row[id]' class='text-decoration-none text-black'>" . $row['username'] . "</a></strong></td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['upload_count'] . "</td>";
                                            echo "</tr>";
                                            //  $count++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No Records Found.</td></tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Material Request list -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Material Request List
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Topic</th>
                                        <th>Requested by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($rs->num_rows > 0) {
                                        while ($row = $rs->fetch_assoc()) {
                                            echo "<tr>";
                                            //  echo "<td>".$row['id']."</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['topic'] . "</td>";
                                            echo "<td>" . $row['username'] . "</a></td>";

                                            //  echo "<td><a class='' href='update.php? id=$row[id]' >Update</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No Records Found.</td></tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Material Request Form -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Material Request Form
                        </div>
                        <div class="card-body">
                            <form class="bg-form w-75 p-2 mt-3 ms-5 rounded rounded-3" action="../fileUpload/ReqMat.php"
                                method="post">
                                <div class="mt-3 p-2 overflow-auto ">
                                    <!-- <h4 class="">Material Request</h4> -->
                                    <select id="course" name="course" class="form-select bg-input">
                                        <option selected>Choose...</option>
                                        <option>C programming</option>
                                        <option>Data structure</option>
                                        <option>Algorithm and complexity</option>
                                        <option>DBMS</option>
                                        <option>OOP</option>
                                        <option>JAVA</option>
                                        <option>TOC</option>
                                        <option>CN</option>
                                        <option>Numerical Method</option>
                                        <option>WEB technologies</option>
                                        <option>Operating system</option>
                                        <option>Machine Learning</option>
                                        <option>CDC</option>
                                        <option>DSP</option>
                                        <option>DLD</option>
                                        <option>DBMS</option>
                                        <option>CAD</option>
                                        <option>MP</option>
                                        <option>VLSI</option>

                                    </select>
                                </div>
                                <div class="mt-3 p-2">
                                    <label for="">Topic</label>
                                    <input type="text" id="topic" name="topic" class="form-control mt-2  bg-input">
                                </div>
                                <div class=" ms-2 mt-3">
                                    <button type="submit" class="btn btn-primary">Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>