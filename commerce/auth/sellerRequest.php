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

            <a href='dashboard.php' style="text-decoration:none;">Back to Dashboard</a>


        <?php
        } else {
            $row = mysqli_fetch_assoc($result);
            if ($row["status"] == "pending") {
                echo "Your request is pending review. Please wait for approval. ";
                echo "<a href='dashboard.php'> Back to Dashboard</a>
                ";
            } elseif ($row["status"] == "approve") {
                echo "Congratulations! You are now a seller.";
            } else {
                echo "Sorry.. Your request has been rejected.";
            }
        }
        ?>





    </div>

</body>

</html>