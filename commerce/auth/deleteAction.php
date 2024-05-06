<?php
include 'config.php';

$id = $_GET['id'];

$selectQuery = "SELECT * FROM `products` WHERE id = '$id'";
$result = mysqli_query($conn, $selectQuery);
$row = mysqli_fetch_assoc($result);
$productName = $row['prod_name'];

$deleteQuery = "DELETE FROM `products` WHERE id = '$id'";

if (mysqli_query($conn, $deleteQuery)) {

    $fileName = "product/" . strtolower(str_replace(" ", "-", $productName)) . ".php";
    if (file_exists($fileName)) {
        unlink($fileName);
    }

    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
