<?php
include 'config.php';

$reg_fullname = $_POST['reg_fullname'];
$reg_user = $_POST['reg_user'];
$reg_email = $_POST['reg_email'];
$reg_mob = $_POST['reg_mob'];
$reg_pass = $_POST['reg_pass'];
$reg_con_pass = $_POST['reg_con_pass'];

$fullname_pattern = "/^[A-Za-z ]{2,35}$/";
$username_pattern = "/[A-Za-z.]{5,20}/";
$email_pattern = "/[^\s@]+@[^\s@]+\.[^\s@]+/";
$phone_pattern = "/(\+88)?-?01[3-9]\d{8}/";
$password_pattern = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&*_+]).{6,20}/";

$duplicate_email = mysqli_query($conn, "SELECT * FROM `register` WHERE db_email='$reg_email'");
$duplicate_username = mysqli_query($conn, "SELECT * FROM `register` WHERE db_username='$reg_user'");


if (mysqli_num_rows($duplicate_email) > 0) {
    echo '<script>alert("Email is already used.");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} elseif (mysqli_num_rows($duplicate_username) > 0) {
    echo '<script>alert("Username is already used.");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} elseif (!preg_match($fullname_pattern, $reg_fullname)) {
    echo '<script>alert("Your name can contain only words and space");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} elseif (!preg_match($username_pattern, $reg_user)) {
    echo '<script>alert("Invalid Username. Username should be between 5 and 20 characters long and can contain letters, numbers, and underscores.");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} elseif (!preg_match($email_pattern, $reg_email)) {
    echo '<script>alert("Invalid Email. Please enter a valid email address.");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} elseif (!preg_match($password_pattern, $reg_pass)) {
    echo '<script>alert("Invalid Password. Password should be between 6 and 20 characters long and must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} elseif ($reg_pass != $reg_con_pass) {
    echo '<script>alert("Password does not match. Please re-enter the password.");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} elseif (!preg_match($phone_pattern, $reg_mob)) {
    echo '<script>alert("Invalid Phone Number. Please enter a valid phone number.");</script>';
    echo '<script>window.location.href="sign_up.html";</script>';
} else {

    $insert_query = "INSERT INTO `register`(`db_fullname`,`db_username`, `db_email`, `db_phone`, `db_pass`) VALUES ('$reg_fullname','$reg_user','$reg_email','$reg_mob','$reg_pass')";

    if (!mysqli_query($conn, $insert_query)) {
        die("Something gone South.");
    } else {
        echo '<script>alert("Congratulations! You have become a member");</script>';
        echo '<script>window.location.href="login.html";</script>';
    }
}
