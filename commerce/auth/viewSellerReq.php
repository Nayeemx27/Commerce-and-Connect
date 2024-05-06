<?php
session_start();

include 'config.php';

$isLoggedIn = isset($_SESSION['username']);

$userName = $_SESSION['username'];

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../commonDesign.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .seller_req-div {
            background-color: #181414;
            min-height: 100vh;
            color: white;
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

    <div class="seller_req-div p-4">

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

        <div class="mt-3">
            <a href="dashboard.php">Back to Dashboard</a>

        </div>
    </div>

    <script>
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