<?php
include 'config.php';

$name = $_POST['pname'];
$category = $_POST['category'];
$rating = $_POST['rating'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$image = $_FILES['image'];
$uploader = $_POST['uploader'];
$description = $_POST['description'];
$ref = $_POST['ref'];

$imageLocation = $_FILES['image']['tmp_name'];
$imageName = $_FILES['image']['name'];
$img_des = "proimg/" . $imageName;

if (move_uploaded_file($imageLocation, $img_des)) {

    $insert_query = "INSERT INTO `products`(`prod_name`, `ref`, `catagory`, `rating`, `stock`, `price`, `img`, `description`, `uploader`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $ref, $category, $rating, $stock, $price, $img_des, $description, $uploader);

    if (mysqli_stmt_execute($stmt)) {

        $productId = mysqli_insert_id($conn);
        $year = date("Y");
        $newRef = 'Y' . $year . '_P' . sprintf("%04d", $productId);

        $templateFile = "product/product_temp.php";
        $new_name = "product/" . strtolower(str_replace(" ", "-", $name)) . ".php";
        $content = file_get_contents($templateFile);
        $content = str_replace('%PRODUCT_NAME%', $name, $content);
        file_put_contents($new_name, $content);

        $update_query = "UPDATE `products` SET `ref` = ? WHERE `id` = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "si", $newRef, $productId);
        mysqli_stmt_execute($update_stmt);

        // echo "<script>alert('Product has been Uploaded.')</script>";
        $message = "New product has been added";
        session_start();
        $_SESSION['uploadMessage'] = $message;

        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    } else {
        echo "Error inserting into database: " . mysqli_error($conn);
    }
} else {
    echo "Error uploading file.";
}
