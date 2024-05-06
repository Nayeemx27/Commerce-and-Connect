<?php

session_start();

$isLoggedIn = isset($_SESSION['username']);

if (!$isLoggedIn) {
    echo "<script>location.href='login.html'</script>";
    exit;
}

include 'config.php';

$username = $_POST['username'];
$currentPass = $_POST['currentPass'];
$newPass = $_POST['newPass'];
$confirmPass = $_POST['confirmPass'];


$fetchReg = "SELECT * FROM `register` WHERE db_username='$username'";
$result = mysqli_query($conn, $fetchReg);
$row = mysqli_fetch_array($result);


$updatePass = "UPDATE `register` SET `db_pass`='$newPass' WHERE db_username='$username'";

$dbpass = $row['db_pass'];


if ($currentPass == $dbpass) {
    if ($newPass == $confirmPass) {
        if (mysqli_query($conn, $updatePass)) {
            echo "<script>alert('Password has been updated')</script>";
            echo "<script>location.href='dashboard.php'</script>";
            exit;
        } else {
            echo "<script>alert('Something went wrong. Please try again')</script>";
            echo "<script>location.href='dashboard.php'</script>";
            exit;
        }
    } else {
        echo "<script>alert('Password and Confirm password must be same.')</script>";
        echo "<script>location.href='dashboard.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Current password does not match.')</script>";
    echo "<script>location.href='dashboard.php'</script>";
    exit;
}
