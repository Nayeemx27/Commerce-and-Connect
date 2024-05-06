<?php

session_start();

$isLoggedIn = isset($_SESSION['username']);

if (isset($_SESSION['email'])) {
} else {
    echo "<script>location.href='login.html'</script>";
    exit;
}

include 'config.php';

$userName = $_SESSION['username'];


$fullname = $_POST['fullName'];
$username = $_POST['username'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];



$updateReg = "UPDATE `register` SET `db_fullname`='$fullname',`db_username`='$username',`db_email`='$email',`db_phone`='$phoneNumber ' WHERE db_username='$username'";

if (mysqli_query($conn, $updateReg)) {
    echo "<script>alert('Profile has been updated')</script>";
    echo "<script>location.href='dashboard.php'</script>";
} else {
    echo "<script>alert('Something went wrong. Please try again')</script>";
    echo "<script>location.href='dashboard.php'</script>";
}
