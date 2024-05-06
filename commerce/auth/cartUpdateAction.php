<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_SESSION['email'];
    $quantities = $_POST['quantity'];

    $toString = implode(", ", $quantities);


    $update = "UPDATE `cart` SET `quantity`='$toString' WHERE `name` = '$username'";

    if (mysqli_query($conn, $update)) {
        echo "<script>location.href = 'order.php'</script>";
    } else {
        echo "<script>Something went wrong. Try Again.</script>";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
} else {
}
