<?php
include 'config.php';

$username = $_POST['username'];
$image = $_FILES['image'];

$imageName = $_FILES['image']['name'];
$imageTmpName = $_FILES['image']['tmp_name'];
$img_des = "userImages/" . $imageName;

move_uploaded_file($imageTmpName, $img_des);

$updateSQL = "UPDATE `register` SET `image`='$img_des' WHERE db_username='$username'";

if (mysqli_query($conn, $updateSQL)) {
    echo "<script>location.href='dashboard.php'</script>";
} else {
    echo "Error Occured: " . mysqli_error($conn);
}
