<?php

session_start();

$isLoggedIn = isset($_SESSION['username']);

if (isset($_SESSION['email'])) {
} else {
    echo "<script>location.href='login.html'</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="images/fav.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../commonDesign.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../commonDesign.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            min-height: 100vh;
            padding: 30px 0;
            background-color: black;
            color: white;
            width: 200px;
            overflow-y: auto;

        }

        .sidebar a {
            padding: 10px 20px;
            color: #fff;
            display: block;
            text-decoration: none;
            border-radius: 10px;
        }

        .sidebar a:hover {
            background-color: rgba(24, 20, 20, 0.7);
            color: #fff;
            text-decoration: none;
        }

        .sidebar .active {
            background-color: #212529;
            color: #fff;
        }

        .user-image {
            height: 44px;
            width: 44px;
            margin: 0;
            padding: 0;
            border-radius: 50%;
            border: 1px;
            border-color: white;
        }


        .user-icon {
            font-size: 40px;
            border-color: white;

        }

        .username {
            font-weight: 700;
            font-size: 17px;
        }

        .user-email {
            font-size: 12px;
        }



        .user-info-sidebar {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            column-gap: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;

        }

        .dropdown-menu {
            background-color: #181414;
        }

        .content-div {
            background-color: #181414;
            color: white;
            min-height: 100vh;
            padding: 0 20px;
            margin-left: 200px;
            width: calc(100% - 200px);
        }





        .content {
            padding: 20px;

        }

        .logout-btn {
            position: absolute;
            bottom: 20px;
            left: 20px;
            padding: 10px 20px;
            border: none;
            background-color: #dc3545;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }


        /* .profile-div {
            display: flex;
            flex-direction: column;

        } */

        .profile-text {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            letter-spacing: 15px;
            font-size: 16px;
        }

        .change-pass .button i {
            margin-right: 5px;
        }

        h2 {
            color: white;
            font-weight: 700;
        }

        .profile-img {
            position: relative;
            display: inline-block;
            padding: 10px;
            overflow: hidden;
        }

        .profile-img img {
            border-radius: 50%;
            max-width: 324px;
            max-height: 260px;
            padding: 5px;
            border: 1px solid white;
            margin-right: 20px;

        }

        .change-photo {
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            width: 170px;
            margin-bottom: 10px;
            text-decoration: none;

        }

        .change-photo-overlay {
            position: absolute;
            bottom: 15px;
            width: 100%;
            background-color: rgba(24, 20, 20, 0.7);
            color: #fff;
            padding: 16px 0;
            display: none;
            text-align: center;
            padding-right: 30px;

        }

        .profile-img:hover .change-photo-overlay {
            display: block;
        }

        .username p {
            font-weight: lighter;
            text-align: center;
        }

        .ach-text {
            font-weight: 700;
            text-align: left;
        }

        label {
            font-weight: bold;
        }

        .edit-profile {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            /* width: 170px; */
            margin-bottom: 10px;
            text-decoration: none;
            transition: opacity 0.3s ease;
            text-align: left;
            display: inline;

        }

        .edit-profile:hover {
            background-color: #333;
            text-decoration: none;
        }

        #file-upload {
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-align: center;
            background-color: #333;
            margin-top: 20px;

        }

        .submit-btn {
            margin-top: 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 6px;
            width: 30%;
        }

        .update {
            color: #eda826;
            text-decoration: none;
            background-color: transparent;
            border: none;
        }

        .update:hover {
            background-color: #eda826;
            color: white;
            border-radius: 10px;
        }

        .del {
            color: tomato;
            text-decoration: none;
        }

        .del:hover {
            background-color: tomato;
            color: white;
            border-radius: 10px;
        }



        .productList-div td img {
            width: 80px;
            height: 80px;
        }

        .productList-div {
            justify-content: center;
        }

        .productList-div td input {
            width: 50px;
            height: 30px;
            padding: 5px;
        }

        .sub-total {
            font-weight: 700;
        }

        td a {
            text-decoration: none;
            font-size: 17px;
        }

        .form-group {
            margin: 10px 0;
        }

        .seller-img {
            padding: 10px;
            border: none;
            border-radius: 10px;
            text-align: center;
            background-color: #333;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: auto;
            max-width: 90%;
            max-height: 90vh;
        }

        .close {
            position: absolute;
            right: 15px;
            top: 15px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
        }

        .view-request-div td img {
            width: 80px;
            height: 80px;
        }

        .data-div {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .data-item {
            padding: 20px;
            background-color: black;
            margin: 0 20px;
            border-radius: 30px;
            min-width: 240px;
            max-width: 240px;

            margin: 20px;


        }

        .data-item p {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <?php
        include 'config.php';
        $userName = $_SESSION['username'];
        $fetchReg = "SELECT * FROM `register` WHERE db_username='$userName'";
        $result = mysqli_query($conn, $fetchReg);
        $row = mysqli_fetch_array($result);

        $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] == true;

        $isSeller = isset($_SESSION['seller']) && $_SESSION['seller'] == true;

        $isBuyer = isset($_SESSION['buyer']) && $_SESSION['buyer'] == true;
        ?>

        <a href="#" class="sidebar-link active" data-link="profile" onclick="setActive(this); showProfile();" style="padding: 10px 20px; margin-bottom: 30px; display: flex; align-items: center;">
            <?php if (!empty($row['image'])) : ?>
                <img src="<?php echo $row['image'] ?>" alt="" class="user-image">
            <?php else : ?>
                <i class="fas fa-user-circle user-icon"></i>
            <?php endif; ?>
            <div class="user-info-sidebar ms-2">
                <div class="username"><?php echo $userName ?></div>
                <div class="user-email"><?php echo $row['db_email'] ?></div>
            </div>
        </a>

        <a href="../index.php" class="sidebar-link" data-link="home" onclick="setActive(this);"><i class="fas fa-home"></i> Home</a>

        <a href="#" class="sidebar-link" data-link="dashboard" onclick="setActive(this); showDashboard();"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#" class="sidebar-link" data-link="history" onclick="setActive(this); showHistory();"><i class="fas fa-shopping-cart"></i> Purchase History</a>
        <a href="#" class="sidebar-link" data-link="settings" onclick="setActive(this); showSettings();"><i class="fas fa-cog"></i> Settings</a>

        <?php if ($isAdmin) : ?>

            <!-- Admin Panel  -->
            <div class="dropdown">
                <a href="#" class="sidebar-link dropdown-toggle" id="adminPanelDropdown" data-bs-toggle="dropdown" aria-expanded="true" data-link="adminPanel" onclick="setActive(this);">
                    <i class="fas fa-user-cog"></i> Admin Panel
                </a>
                <ul class="dropdown-menu " aria-labelledby="adminPanelDropdown">
                    <li><a class="dropdown-item" href="#" data-link="userList" onclick="setActive(this); userList();">User List</a></li>
                    <li><a class=" dropdown-item" href="#" data-link="productList" onclick="setActive(this); productList();">Product List</a></li>
                    <li><a class="dropdown-item" href="#" data-link="addProduct" onclick="setActive(this); addProduct();">Add Product</a></li>
                    <li><a class="dropdown-item" href="#" data-link="viewOrders" onclick="setActive(this); viewOrders();">View Orders</a></li>
                    <li><a class="dropdown-item" href="#" data-link="showRequest" onclick="setActive(this); showRequest();">View Request</a></li>
                    <li><a class="dropdown-item" href="#" data-link="viewReports" onclick="setActive(this); viewReports();">View Reports</a></li>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($isSeller) : ?>

            <!-- Seller Panel  -->
            <div class="dropdown">
                <a href="#" class="sidebar-link dropdown-toggle" id="sellerPanelDropdown" data-bs-toggle="dropdown" aria-expanded="true" data-link="sellerPanel" onclick="setActive(this);">
                    <i class="fas fa-store-alt"></i> Seller Panel
                </a>
                <ul class="dropdown-menu " aria-labelledby="sellerPanelDropdown">
                    <li><a class="dropdown-item" href="#" data-link="productListSeller" onclick="setActive(this); productListSeller();">Product List</a></li>
                    <li><a class="dropdown-item" href="#" data-link="addProduct" onclick="setActive(this); addProduct();">Add Product</a></li>
                    <li><a class="dropdown-item" href="#" data-link="viewOrders" onclick="setActive(this); viewOrders();">View Orders</a></li>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($isBuyer) : ?>
            <a href="#" class="sidebar-link" data-link="sellerRequest" onclick="setActive(this); sellerRequest();"><i class="fas fa-user-plus"></i> Be a Seller</a>
        <?php endif; ?>

        <a href="logout.php" class="sidebar-link logout-btn" data-link="logout" onclick="setActive(this); return confirm('Are you sure you want to logout?')"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>







    <div class="content-div">
        <div class="content" id="mainContent">




            <div class="profile-div ">
                <p class="profile-text">MY&nbsp;PROFILE</p>
                <div class="wrapper">
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-5 row1">
                            <div class="profile-info text-center">
                                <div class="profile-img">
                                    <?php if (!empty($row['image'])) : ?>
                                        <img src="<?php echo $row['image'] ?>" alt="User Image" class="img-fluid">

                                    <?php else : ?>
                                        <div class="profile-img"> <img src="images/user.png" alt="User Image" class="img-fluid bg-white">

                                        </div>

                                    <?php endif; ?>

                                    <div class="change-photo-overlay">
                                        <a type="button" href="#" class="change-photo" data-bs-toggle="modal" data-bs-target="#updatePhotoModal">Update Photo</a>


                                    </div>

                                    <!-- Update photo modal  -->

                                    <div class="modal fade" id="updatePhotoModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body bg-dark">

                                                    <h2 class="my-3">Upload Your Picture</h2>
                                                    <form id="upload-form" action="updatePhotoAction.php" method="POST" enctype="multipart/form-data">

                                                        <input type="file" id="file-upload" name="image" accept="image/*">

                                                        <input type="hidden" name="username" value="<?php echo $row['db_username'] ?>">

                                                        <div class="text-center mt-3"> <button type="submit" class="submit-btn">Upload</button></div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="full-name">
                                    <h2 class="mt-2 font-weight-bold"><?php echo $row['db_fullname'] ?></h2>
                                </div>
                                <div class="username">
                                    <p class=""><?php echo 'Username: ' . $row['db_username'] ?></p>
                                </div>
                                <hr>
                                <p class="ach-text">Achievements:</p>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6 row2 ms-4">
                            <div class="user-info">
                                <h2 class="section-title my-3">Information</h2>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" class="form-control mt-2" value="<?php echo $row['db_email'] ?>" disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" id="phone" class="form-control mt-2" value="<?php echo $row['db_phone'] ?>" disabled>
                                </div>

                                <button type="button" class="edit-profile mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </button>

                                <!--Edit Profile Modal -->
                                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content bg-dark">

                                            <div class="modal-body">

                                                <form action="editProfileAction.php" method="post">

                                                    <h2 class="mt-2 mb-3">Edit Profile</h2>

                                                    <div class="mb-3">
                                                        <label for="editFullName" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" id="editFullName" name="fullName" value="<?php echo $row['db_fullname'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editUsername" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="editUsername" name="username" value="<?php echo $row['db_username'] ?>" disabled>
                                                        <input type="hidden" name="username" value="<?php echo $row['db_username'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editEmail" class="form-label">Email</label>
                                                        <input type="text" class="form-control" id="editEmail" name="email" value="<?php echo $row['db_email'] ?>" disabled>
                                                        <input type="hidden" name="email" value="<?php echo $row['db_email'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPhoneNumber" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" id="editPhoneNumber" name="phoneNumber" value="<?php echo $row['db_phone'] ?>">
                                                    </div>

                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-secondary">Save changes</button>
                                                    </div>

                                                </form>


                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <button type="button" class="edit-profile mt-3" data-bs-toggle="modal" data-bs-target="#editPassModal">
                                    <i class="fas fa-key"></i> Change Password
                                </button>

                                <!--Edit Password Modal -->
                                <div class="modal fade" id="editPassModal" tabindex="-1" aria-labelledby="editPassModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content bg-dark ">

                                            <div class="modal-body">

                                                <form action="editPassAction.php" method="post">
                                                    <h2 class="mt-2 mb-3">Change Password</h2>

                                                    <div class="mb-3">
                                                        <label for="currentPass" class="form-label">Current Password</label>
                                                        <input type="password" class="form-control" id="currentPass" name="currentPass" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="newPass" class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="newPass" name="newPass" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="confirmPass" class="form-label">Confirm New Password</label>
                                                        <input type="password" class="form-control" id="confirmPass" name="confirmPass" required>
                                                    </div>

                                                    <input type="hidden" name="username" value="<?php echo $userName ?>">

                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-secondary">Save changes</button>
                                                    </div>
                                                </form>



                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>





            </div>




        </div>








    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var activeLink = localStorage.getItem("activeLink");
            if (activeLink) {
                var activeElement = document.querySelector(`.sidebar a[data-link='${activeLink}']`);
                if (activeElement) {
                    setActive(activeElement);
                    var storedContent = localStorage.getItem(activeLink + "_content");
                    if (storedContent) {
                        document.getElementById('mainContent').innerHTML = storedContent;
                    }
                }
            }
        });

        function setActive(element) {
           
            document.querySelectorAll(".sidebar a.sidebar-link").forEach(function(link) {
                link.classList.remove("active");
            });
          
            element.classList.add("active");
    
            localStorage.setItem("activeLink", element.getAttribute("data-link"));
        }

        function showProfile() {
            var content = `
            
            <div class="profile-div ">
                <p class="profile-text">MY&nbsp;PROFILE</p>
                <div class="wrapper">
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-5 row1">
                            <div class="profile-info text-center">
                                <div class="profile-img">
                                    <?php if (!empty($row['image'])) : ?>
                                        <img src="<?php echo $row['image'] ?>" alt="User Image" class="img-fluid">

                                    <?php else : ?>
                                        <div class="profile-img"> <img src="images/user.png" alt="User Image" class="img-fluid bg-white">

                                        </div>

                                    <?php endif; ?>

                                    <div class="change-photo-overlay">
                                        <a type="button" href="#" class="change-photo" data-bs-toggle="modal" data-bs-target="#updatePhotoModal">Update Photo</a>


                                    </div>

                                    <!-- Update photo modal  -->

                                    <div class="modal fade" id="updatePhotoModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body bg-dark">

                                                    <h2 class="my-3">Upload Your Picture</h2>
                                                    <form id="upload-form" action="updatePhotoAction.php" method="POST" enctype="multipart/form-data">

                                                        <input type="file" id="file-upload" name="image" accept="image/*">

                                                        <input type="hidden" name="username" value="<?php echo $row['db_username'] ?>">

                                                        <div class="text-center mt-3"> <button type="submit" class="submit-btn">Upload</button></div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="full-name">
                                    <h2 class="mt-2 font-weight-bold"><?php echo $row['db_fullname'] ?></h2>
                                </div>
                                <div class="username">
                                    <p class=""><?php echo 'Username: ' . $row['db_username'] ?></p>
                                </div>
                                <hr>
                                <p class="ach-text">Achievements:</p>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6 row2 ms-4">
                            <div class="user-info">
                                <h2 class="section-title my-3">Information</h2>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" class="form-control mt-2" value="<?php echo $row['db_email'] ?>" disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" id="phone" class="form-control mt-2" value="<?php echo $row['db_phone'] ?>" disabled>
                                </div>

                                <button type="button" class="edit-profile mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </button>

                                <!--Edit Profile Modal -->
                                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content bg-dark">

                                            <div class="modal-body">

                                                <form action="editProfileAction.php" method="post">

                                                    <h2 class="mt-2 mb-3">Edit Profile</h2>

                                                    <div class="mb-3">
                                                        <label for="editFullName" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" id="editFullName" name="fullName" value="<?php echo $row['db_fullname'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editUsername" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="editUsername" name="username" value="<?php echo $row['db_username'] ?>" disabled>
                                                        <input type="hidden" name="username" value="<?php echo $row['db_username'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editEmail" class="form-label">Email</label>
                                                        <input type="text" class="form-control" id="editEmail" name="email" value="<?php echo $row['db_email'] ?>" disabled>
                                                        <input type="hidden" name="email" value="<?php echo $row['db_email'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPhoneNumber" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" id="editPhoneNumber" name="phoneNumber" value="<?php echo $row['db_phone'] ?>">
                                                    </div>

                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-secondary">Save changes</button>
                                                    </div>

                                                </form>


                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <button type="button" class="edit-profile mt-3" data-bs-toggle="modal" data-bs-target="#editPassModal">
                                    <i class="fas fa-key"></i> Change Password
                                </button>

                                <!--Edit Password Modal -->
                                <div class="modal fade" id="editPassModal" tabindex="-1" aria-labelledby="editPassModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content bg-dark ">

                                            <div class="modal-body">

                                                <form action="editPassAction.php" method="post">
                                                    <h2 class="mt-2 mb-3">Change Password</h2>

                                                    <div class="mb-3">
                                                        <label for="currentPass" class="form-label">Current Password</label>
                                                        <input type="password" class="form-control" id="currentPass" name="currentPass" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="newPass" class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="newPass" name="newPass" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="confirmPass" class="form-label">Confirm New Password</label>
                                                        <input type="password" class="form-control" id="confirmPass" name="confirmPass" required>
                                                    </div>

                                                    <input type="hidden" name="username" value="<?php echo $userName ?>">

                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-secondary">Save changes</button>
                                                    </div>
                                                </form>



                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>





            </div>
            
            `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("profile_content", content);
        }

        function showDashboard() {
            var content = `
                
            <div class="dashboard-div">

            <p class="profile-text text-uppercase">Dashboard</p>

            <div class="data-div mt-5">
                <?php
                $fetchAll = "SELECT * FROM `order` WHERE `order_by` = '$userName'";
                $allOrder = mysqli_query($conn, $fetchAll);
                $total_orders = mysqli_num_rows($allOrder);

                $fetchOrders = "SELECT SUM(total) AS total_spending FROM `order` WHERE `order_by` = '$userName'";

                $orderResult = mysqli_query($conn, $fetchOrders);
                $orderRow = mysqli_fetch_assoc($orderResult);
                $total_spending = $orderRow['total_spending'];

                $total_coupons = 0;
                $total_complaints = 0;
                ?>

                <div class="data-item">
                    <h3>Total Purchases</h3>
                    <h1><p class="mt-3"><?php echo $total_orders; ?></p></h1>
                </div>

                <div class="data-item">
                    <h3>Total Spending
                    <p class="mt-4"><?php echo $total_spending; ?></p></h3>
                </div>

                <div class="data-item">
                    <h3>Coupons</h3>
                    <h1><p class="mt-4"><?php echo $total_coupons; ?></p></h1>
                </div>

                <div class="data-item">
                    <h3>Total Complaints</h3>
                    <h1><p class="mt-4"><?php echo $total_complaints; ?></p></h1>
                </div>
            </div>


            </div>
            `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("dashboard_content", content);
        }


        function showHistory() {
            var content = `
                <div class="history-div">
                    <p class="profile-text text-uppercase">Purchase&nbsp;History</p>

                    <table class="table text-white" style="background-color: black;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Bill ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Products</th>
                                <th scope="col">Total</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Details</th>
                               

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $allData = mysqli_query($conn, "SELECT * FROM `order` WHERE email='$row[db_email]'");
                            $count = 1;

                            while ($order = mysqli_fetch_array($allData)) {

                                $products = explode(",", $order['products']);

                                echo "  <tr>
                                        <th scope='row'>$count</th>
                                        <td>$order[bill_id]</td>
                                        <td>$order[time] <br> $order[date]</td>
                                        <td>";

                                for ($i = 0; $i < count($products); $i++) {
                                    echo $products[$i];
                                    if ($i != count($products) - 1) {
                                        echo "<br>";
                                    }
                                }

                                echo "</td>
                                <td>$order[total]</td>
                                <td>$order[payment]</td>
                                <td>$order[status]</td>
                                <td><a class=\"btn bg-light\" href=\"order_details.php\">Details</a></td>
                                </tr>";


                                $count++;
                            }
                            ?>

                        </tbody>
                    </table>
                    

                </div>
        
                `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("history_content", content);
        }

        function showRequest() {
            var content = `
                
                <div class="seller_req-div">

                    <div class="productList-div view-request-div">
                        <p class="profile-text text-uppercase">View&nbsp;Requests</p>

                        <?php include 'config.php';
                        $allRequestData = mysqli_query($conn, "SELECT * FROM `requests`");

                        ?>
                        <div id="imageModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="fullScreenImage">
                        </div>
                        <?php if (mysqli_num_rows($allRequestData) > 0) { ?>
                            <table class="table-responsive text-white w-100" style="background-color: black;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">ID Card</th>
                                        <th scope="col">NID Card</th>
                                        <th scope="col">Approve</th>
                                        <th scope="col">Reject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($rowData = mysqli_fetch_array($allRequestData)) {
                                        echo "
                                    <tr>                               
                                        <td>$counter</td>
                                        <td>{$rowData['username']}</td>
                                        <td>{$rowData['student_id']}</td>
                                        <td> 
                                            <div class='cart-details'>
                                                <img src='{$rowData['stu_id_img']}' class='full-screen-img' onclick=\"openModal('{$rowData['stu_id_img']}')\" />
                                            </div>
                                        </td>
                                        <td> 
                                            <div class='cart-details'>
                                                <img src='{$rowData['nid_img']}' class='full-screen-img' onclick=\"openModal('{$rowData['nid_img']}')\" />
                                            </div>
                                        </td> 
                                        <td>
                                            <a class='p-2 text-capitalize text-success bold' href='sellerApprove.php?username={$rowData['username']}'>Approve</a>
                                        </td>
                                        <td>
                                            <a class='p-2 text-capitalize text-danger' href='sellerReject.php?id={$rowData['id']}'>Reject</a>
                                        </td>
                                    </tr>
                                    ";
                                        $counter++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No new requests";
                        }
                        ?>
                    </div>

                    
                </div>

                
                
                
                `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("request_content", content);
        }


        function viewReports() {
            var content = `
                <div class="report-div">
                    <p class="profile-text text-uppercase">View&nbsp;Reports</p>

                    <table class="table text-white" style="background-color: black;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $allData = mysqli_query($conn, "SELECT * FROM `contact`");

                            $count = 1;

                            while ($contact = mysqli_fetch_array($allData)) {



                                echo "  <tr>
                                        <th scope='row'>$count</th>
                                        <td>$contact[username]</td>
                                        <td>$contact[subject] <br> $contact[messages]</td>

                                        <td> $contact[messages]</td>

                                    
                                        </tr>";

                                $count++;
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
        
                `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("reports", content);
        }

        function showSettings() {
            var content = `
                <p class="profile-text text-uppercase">Settings</p>        <h1>Comming Soon</h1>`;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("settings_content", content);
        }


        function viewOrders() {
    var content = `
        <div class="productList-div">
            <p class="profile-text text-uppercase">View order</p>
            <div id="imageModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="fullScreenImage">
            </div>
            <table class="table text-white w-100" style="background-color: black;">
                <thead>
                    <tr>
                        <th scope="col">Bill ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Products</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $username = $_SESSION['username'];
                    if ($username == 'admin') {
                        $sql = "SELECT * FROM `order` ORDER BY id DESC";
                    } else {
                        $sql = "SELECT * FROM `order` WHERE FIND_IN_SET('$username', uploader) ORDER BY id DESC";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) :
                        while ($row = $result->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?= $row["bill_id"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["email"] ?></td>
                                <td><?= $row["address"] ?></td>
                                <td><?= $row["mob"] ?></td>
                                <td><?= $row["payment"] ?></td>
                                <td><?= $row["products"] ?></td>
                                <td><?= $row["total"] ?></td>
                                <td><?= $row["status"] ?></td>
                                <td>
                                    <form method='post' action='../auth/update_status.php'>
                                        <input type='hidden' name='order_id' value='<?= $row["id"] ?>'>
                                        <select name='new_status' class='form-control'>
                                            <option value='Placed' <?= ($row["status"] == "Placed" ? " selected" : "") ?>>Placed</option>
                                            <option value='Accepted' <?= ($row["status"] == "Accepted" ? " selected" : "") ?>>Accepted</option>
                                            <option value='In Transit' <?= ($row["status"] == "In Transit" ? " selected" : "") ?>>In Transit</option>
                                            <option value='Out for Delivery' <?= ($row["status"] == "Out for Delivery" ? " selected" : "") ?>>Out for Delivery</option>
                                            <option value='Delivered' <?= ($row["status"] == "Delivered" ? " selected" : "") ?>>Delivered</option>
                                        </select>
                                        <button type='submit' class='btn btn-primary mt-2 w-100'>Update</button>
                                    </form>
                                </td>
                            </tr>
                    <?php endwhile;
                    else : ?>
                        <tr>
                            <td colspan='10'>No orders found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    `;
    document.getElementById('mainContent').innerHTML = content;
    localStorage.setItem("settings_content", content);
}


        function userList() {
            var content = `
                    <div class="userList-div">
                        <p class="profile-text text-uppercase">User&nbsp;List</p>

                        <table class="table text-white w-100" style="background-color: black;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>


                                    <?php
                                    include 'config.php';

                                    $allData = mysqli_query($conn, "SELECT * FROM `register`");

                                    while ($row = mysqli_fetch_array($allData)) {
                                        echo "
                                    <tr>                               
                                        <td>$row[id]</td>
                                        <td>$row[db_username]</td>
                                        <td>$row[db_email]</td>                           
                                        <td>$row[db_phone]</td>

                                        <form action='userListUpdateAction.php' method='post'>
                                        <td>
                                            <select name='role' id='role' onchange='updateSelectOptions()' class='form-select' style='width: 150px''>
                                                <option value='$row[role]'>$row[role]</option>
                                                <option value='buyer'>Buyer</option>
                                                <option value='seller'>Seller</option>
                                                <option value='club manager'>Club Manager</option>
                                                <option value='admin'>Admin</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type='hidden' name='id' value='$row[id]'>

                                            <button type='submit' class='update bold text-capitalize' style='display: inline-block; padding: 6px'>Update</button>

                                        </td>

                                    </form>

                                    <td>
                                        <a href='userListDeleteAction.php?id=$row[id]' class='del bold text-capitalize' style='display: inline-block; margin-left: 15px; padding: 6px'>Delete</a>
                                    </td>

                                    
                                    </tr>
                                ";
                                    }
                                    ?>

                                </tr>
                            </tbody>
                        </table>

                    </div>

                    `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("users", content);
        }

        function productList() {
            var content = `
                <div class="productList-div">
                    <p class="profile-text text-uppercase">Product List</p>
                    <div id="imageModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="fullScreenImage">
                    </div>
                    <table class="table text-white w-100" style="background-color: black;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'config.php';

                            $allData = mysqli_query($conn, "SELECT * FROM `products`");

                            while ($row = mysqli_fetch_array($allData)) {
                                echo "
                                    <tr>                               
                                        <td>$row[id]</td>
                                        <td>$row[prod_name]</td>
                                        <td class='sub-total'>৳$row[price]</td>
                                        <td> 
                                            <div class='cart-details'>
                                                <img src='$row[img]' class='full-screen-img' onclick='openModal(\"$row[img]\")' />
                                            </div>
                                        </td>
                                        <td>$row[catagory]</td>
                                        <td>$row[stock]</td>
                                        <td><a class='update  p-2 text-capitalize' href='update.php?id=$row[id]'>Update</a></td>
                                        <td><a class='del  p-2 text-capitalize'  href='deleteAction.php? id=$row[id]'>Delete</a></td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            `;

            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("prodList", content);
        }








        function productListSeller() {
            var content = `
                <div class="productList-div">
                    <p class="profile-text text-uppercase">Product&nbsp;List</p>

                    <div id="imageModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="fullScreenImage">
                    </div>

                    <table class="table text-white w-100" style="background-color: black;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Catagory</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>


                                <?php
                                include 'config.php';

                                $allData = mysqli_query($conn, "SELECT * FROM `products` WHERE `uploader` = '$userName'");

                                $count = 1;

                                while ($row = mysqli_fetch_array($allData)) {
                                    echo "
                                <tr>                               
                                    <td>$count</td>
                                    <td>$row[prod_name]</td>
                                    <td class='sub-total'>৳$row[price]</td>
                                    
                                    
                                
                                    <td> <div class='cart-details'>
                                            <img src='$row[img]' class='full-screen-img' />
                                    </div>
                                
                                    </td>

                                    <td>$row[catagory]</td>
                                    <td>$row[stock]</td>
        

                                    <td><a class='update  p-2 text-capitalize' href='update.php?id=$row[id]'>Update</a></td>
                                    <td><a class='del  p-2 text-capitalize'  href='deleteAction.php? id=$row[id]'>Delete</a></td>
                                </tr>
                            ";
                                    $count++;
                                }
                                ?>

                            </tr>
                        </tbody>
                    </table>

                </div>

                `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("sellerProd", content);

            var modal = document.getElementById("imageModal");
            var img = document.getElementsByClassName("full-screen-img");
            var modalImg = document.getElementById("fullScreenImage");

            for (var i = 0; i < img.length; i++) {
                img[i].onclick = function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                };
            }

            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            };
        }


        function addProduct() {
            var content = `

                                            
                            <div class="addProduct-div">
                                <p class="profile-text text-uppercase">Add&nbsp;Product</p>

                                <form action="uploadAction.php" method="post" enctype="multipart/form-data">
                                    <div class="row justify-content-center mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product-name">Product Name:</label>
                                                <input type="text" class="form-control" name="pname" id="product-name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category:</label>
                                                <select class="form-control" name="category" id="category" required>
                                                    <option value="">Select a category</option>
                                                    <option value="Men Fashion">Men's & Boys' Fashion</option>
                                                    <option value="Women Fashion">Women's & Girls' Fashion</option>
                                                    <option value="Health & Beauty">Health & Beauty</option>
                                                    <option value="Watches Bags Jewellery">Watches, Bags, Jewellery</option>
                                                    <option value="Mother & Baby">Mother & Baby</option>
                                                    <option value="Electronics Device">Electronics Device</option>
                                                    <option value="TV & Home Appliances">TV & Home Appliances</option>
                                                    <option value="Electronic Accessories">Electronic Accessories</option>
                                                    <option value="Home & Lifestyle">Home & Lifestyle</option>
                                                    <option value="Sports & Outdoors">Sports & Outdoors</option>
                                                    <option value="Automotive & Motorbike">Automotive & Motorbike</option>
                                                </select>
                                            </div>

                                            <input type="hidden" class="form-control" name="rating" id="rating" value="0" />

                                            <input type="hidden" class="form-control" name="ref" id="ref" value="Y2024" />

                                            <input type="hidden" class="form-control" name="stock" id="stock" value="In Stock" />

                                            <div class="form-group">
                                                <label for="price">Price:</label>
                                                <input type="text" class="form-control" name="price" id="price" required />
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Image:</label>
                                                <input type="file" class="form-control" name="image" id="image" required />
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description:</label>
                                                <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                                            </div>

                                            <input type="hidden" name="uploader" value="<?php echo $userName ?>">

                                            <div class="text-center mt-5 mx-5 ">
                                                <button type="submit" class="btn btn-primary w-100 d-block">Upload Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p><br></p>
                            </div>
                                

                            `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("addProd", content);
        }



        function sellerRequest() {
            var content = `

                            <div class="seller_req-div">

                                <p class="profile-text text-uppercase ">Be&nbsp;A&nbsp;seller</p>

                                <?php

                                $sql = "SELECT * FROM `requests` WHERE `username`='$userName'";

                                $result = mysqli_query($conn, $sql);

                                if (!mysqli_num_rows($result)) {
                                ?>
                                    <div class="not-requested ms-3">
                                        <p class="instructions mt-4">Please follow these steps to complete your registration:</p>
                                        <ul style="list-style-type: none;">
                                            <li>Step 1: Enter your Student ID number.</li>
                                            <li>Step 2: Upload a clear photo of your Student ID card.</li>
                                            <li>Step 3: Upload a clear photo of your National ID card or Birth Certificate.</li>
                                        </ul>
                                        <form id="upload-form" action="sellerRequestAction.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group mt-4">
                                                <label for="student_id">Student ID Number:</label>
                                                <input type="text" class="form-control mt-1" id="student_id" name="student_id" style="width: 45%;" required>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mt-3">
                                                    <label for="student_id_img">Student ID Image:</label>
                                                    <input type="file" class="seller-img mt-1" id="student_id_img" name="student_id_img" accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mt-3">
                                                    <label for="nid_img">National ID Image:</label>
                                                    <input type="file" class="seller-img mt-1" id="nid_img" name="nid_img" accept="image/*" required>
                                                    <input type="hidden" name="username" value="<?php echo $userName ?>">
                                                    <input type="hidden" name="status" value="pending">
                                                </div>
                                            </div>
                                            <div class="text-start mt-4"> <button type="submit" class="btn btn-secondary" style="width: 15%;">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                    


                                <?php
                                } else {
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row["status"] == "pending") {
                                        echo "Your request is pending review. Please wait for approval. ";
                                    } elseif ($row["status"] == "approve") {
                                        echo "Congratulations! You are now a seller.";
                                    } else {
                                        echo "Sorry.. Your request has been rejected.";
                                    }
                                }
                                ?>





                            </div>


                            `;
            document.getElementById('mainContent').innerHTML = content;
            localStorage.setItem("sellerReq", content);
        }


        function openModal(imageUrl) {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("fullScreenImage");

            modal.style.display = "block";
            modalImg.src = imageUrl;

            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            };
        }
    </script>






</body>

</html>