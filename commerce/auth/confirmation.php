<?php
session_start();

$user_email = $_SESSION['email'];
$isLoggedIn = isset($_SESSION['email']);

if (!$isLoggedIn) {
    echo "<script>location.href='login.html'</script>";
    exit();
}

if (!isset($_SESSION['order_token'])) {
    generateOrderToken();
} else {
    $token = $_SESSION['order_token'];
}

function generateOrderToken()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $token = substr(str_shuffle($characters), 0, 12);
    $_SESSION['order_token'] = $token;
}


include 'config.php';


$fetch = "SELECT * FROM `order` WHERE `bill_id` = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $fetch);
mysqli_stmt_bind_param($stmt, 's', $token);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" type="image/x-icon" href="images/fav.png">

    <link rel="stylesheet" href="../commonDesign.css">

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .confirmation-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }

        .confirmation-image {
            width: 170px;
            height: 60px;
            /* border-radius: 50%; */
            margin: 0 auto 20px;
            display: block;
        }

        .header {
            font-size: 28px;
            font-weight: bold;
            color: #dc4c64;
        }

        .message {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .order-details {
            text-align: left;
            margin-top: 20px;
        }

        .detail-label {
            font-size: 16px;
            color: #777;
        }

        .detail-value {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .note {
            font-size: 14px;
            color: #777;
            margin-top: 20px;
        }

        .continue-shopping {
            display: inline-block;
            background-color: #dc4c64;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 30px;
            transition: background-color 0.3s ease;
        }

        .continue-shopping:hover {
            background-color: #ff6b7d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="confirmation-card">
            <img src="../images/logo-color.png" alt="Order Confirmed" class="confirmation-image" />
            <h1 class="header">Order Confirmed!</h1>
            <p class="message">Thank you for your purchase.</p>

            <?php


            $fetch = "SELECT * FROM `order` WHERE `bill_id` = '$token' LIMIT 1";
            $result = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($result);
            ?>

            <p class="message">Your order has been successfully processed.</p>

            <div class="order-details">
                <p class="detail-label">Order ID:</p>
                <p class="detail-value"><?php echo $row["bill_id"]; ?></p>
                <p class="detail-label">Delivery Address:</p>
                <p class="detail-value"><?php echo $row["address"]; ?></p>
                <p class="detail-label">Total Amount:</p>
                <p class="detail-value"><?php echo $row["total"]; ?></p>
            </div>

            <p class="note">A confirmation email has been sent to your email address.</p>

            <button onclick="endSession()" class="continue-shopping">Continue Shopping</button>

            <script>
                function endSession() {
                    <?php

                    unset($_SESSION['order_token']);

                    $delCart = "DELETE FROM `cart` WHERE `name`= '$user_email'";
                    mysqli_query($conn, $delCart);



                    ?>
                    location.href = '../index.php';
                }
            </script>
            <script>
                window.history.pushState(null, null, window.location.href);

                window.onpopstate = function() {
                    window.history.go(1);
                };
            </script>
        </div>
    </div>
</body>

</html>