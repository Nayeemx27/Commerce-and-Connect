<?php

include 'backend/config.php';

$name = $_POST['prod_name'];
$category = $_POST['category'];
$stock = $_POST['stock'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$old_price = $_POST['old_price'];
$img = $_FILES['img'];

// var_dump($img);
// echo "<br>";

$imgArray = implode(", ", $img["name"]);

for ($i = 0; $i < count($img['name']); $i++) {
    $imageLocation = $_FILES['img']['tmp_name'][$i];
    $imageName = $_FILES['img']['name'][$i];
    $img_des = "assets/prod_img/" . $imageName;
    move_uploaded_file($imageLocation, $img_des);
}

$insert_query = "INSERT INTO `products`(`prod_name`, `category`, rating, `stock`, `price`, `old_price`, `img`,`description`) VALUES ('$name','$category','','$stock','$price','$old_price','$imgArray','$desc')";

if (mysqli_query($conn, $insert_query)) {

    $templateFile = "product_template.php";
    $new_name = "products/" . strtolower(str_replace(" ", "", $name)) . ".php";
    $content = file_get_contents($templateFile);
    $content = str_replace('%PRODUCT_NAME%', $name, $content);
    $content = str_replace('%CATEGORY_NAME%', $category, $content);
    file_put_contents($new_name, $content);

    $message = "Product has been added";
    // echo "<script>alert('Inserted')</script>";
    header("Location: /project/admin.php");
}
