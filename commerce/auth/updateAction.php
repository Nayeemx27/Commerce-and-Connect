<?php
session_start();
include 'config.php';

$id = $_POST['id'];
$name = $_POST['pname'];
$category = $_POST['category'];
$rating = $_POST['rating'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$oprice = $_POST['oprice'];

$imageName = $_FILES['img']['name'];
$imageTmpName = $_FILES['img']['tmp_name'];
$img_des = "proimg/" . $imageName;

move_uploaded_file($imageTmpName, $img_des);

// Fetch old file name and product name
$fetchQuery = "SELECT prod_name, img FROM products WHERE id='$id'";
$result = mysqli_query($conn, $fetchQuery);
$row = mysqli_fetch_assoc($result);
$oldName = $row['prod_name'];
$oldImg = $row['img'];

$updateSQL = "UPDATE products SET prod_name='$name', catagory='$category', rating='$rating', stock='$stock', price='$price', old_price='$oprice', img='$img_des' WHERE id='$id'";

if (mysqli_query($conn, $updateSQL)) {

    if ($oldName !== $name && file_exists("product/" . strtolower(str_replace(" ", "-", $oldName)) . ".php")) {
        unlink("product/" . strtolower(str_replace(" ", "-", $oldName)) . ".php");
    }

    $templateFile = "product/product_temp.php";
    $newFileName = "product/" . strtolower(str_replace(" ", "-", $name)) . ".php";

    $content = file_get_contents($templateFile);
    $content = str_replace('%PRODUCT_NAME%', $name, $content);

    file_put_contents($newFileName, $content);

    echo "<script>alert('Product has been updated.')</script>";
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
} else {
    echo "Error Occurred: " . mysqli_error($conn);
}