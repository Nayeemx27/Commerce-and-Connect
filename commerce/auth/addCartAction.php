<?php
session_start();
include 'config.php';

if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
    echo "<script>alert('Please login to continue');</script>";
    echo "<script>location.href = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
    exit;
}

$name = $_SESSION['username'];
$product = $_POST['cart'];
$quantity = $_POST['quantity'];
$uploader = $_POST['uploader'];

$checkQuery = "SELECT `name`, `prod_name`, `uploader`,quantity FROM `cart` WHERE name = '$name'";
$checkAction = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkAction)) {
    $fetchArray = mysqli_fetch_array($checkAction);
    $sameProdCheck = strstr($fetchArray['prod_name'], $product);
    $str = $fetchArray['prod_name'];
    $quan = $fetchArray['quantity'];
    $existingUploader = $fetchArray['uploader'];
    if ($sameProdCheck == true) {
        $prod_arr = explode(", ", $str);
        $quan_arr = explode(", ", $quan);
        $index = array_search($product, $prod_arr);
        $increase = (int)$quan_arr[$index] + (int)$quantity;
        $inc_str = (string)$increase;
        $quan_arr[$index] = $inc_str;
        $quan = implode(", ", $quan_arr);
    } else {
        $str = $str . ", " . $product;
        $quan = $quan . ", " . $quantity;
    }

    if ($existingUploader != $uploader) {
        $uploader = $existingUploader . ", " . $uploader;
    }

    $update = mysqli_query($conn, "UPDATE `cart` SET `prod_name`='$str',`quantity`='$quan', `uploader`='$uploader' WHERE `name` = '$name'");

    echo "<script>alert('" . $product . " is added !!!')</script>";
    echo "<script>location.href = '" . $_SERVER["HTTP_REFERER"] . "'</script>";

    exit;
} else {

    $insertCartQuery = "INSERT INTO `cart`(`name`, `prod_name`,quantity, `uploader`) VALUES ('$name','$product','$quantity','$uploader')";

    $insertion = mysqli_query($conn, $insertCartQuery);

    echo "<script>alert('" . $product . " is added !!!')</script>";
    echo "<script>location.href = '../index.php'</script>";
    exit;
}
