<?php
include 'config.php';

$token = $_POST['token'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$mob = $_POST['mob'];
$pay = $_POST['payment-method'];
$time = $_POST['time'];
$date = $_POST['date'];
$total = $_POST['total'];
$details = $_POST['order-details'];
$username = $_POST['username'];
$uploader = $_POST['uploader'];

$status ='placed';

$insert_query = "INSERT INTO `order`(`bill_id`, `name`, `order_by`, `email`, `address`, `mob`, `payment`, `time`, `date`, `products`, `total`,`status`,`uploader`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";

$stmt = mysqli_prepare($conn, $insert_query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssssssssss", $token, $name, $username, $email, $address, $mob, $pay, $time, $date, $details, $total,$status,$uploader);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>window.location.href="confirmation.php";</script>';
    } else {
        die("Something went wrong. Please try again.");
    }

    mysqli_stmt_close($stmt);
} else {
    die("Prepared statement error: " . mysqli_error($conn));
}
