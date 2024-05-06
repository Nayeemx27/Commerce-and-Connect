<?php
include 'config.php';

$name = $_POST['name'];
$mob = $_POST['mobile'];
$image = $_FILES['image'];

$imageTmpName = $image['tmp_name'];
$img_des = "rent_prod/" . $image['name'];

move_uploaded_file($imageTmpName, $img_des);

$sql = "INSERT INTO `rent`(`prod_name`, `mobile`, `image`) VALUES ('$name','$mob','$img_des')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Product has been added.')</script>";
    // echo "<script>location.href='rentpage.php'</script>";
} else {
    echo "Error Occurred: " . mysqli_error($conn);
}
