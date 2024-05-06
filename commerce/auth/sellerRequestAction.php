<?php

include 'config.php';

$student_id = $_POST['student_id'];
$username = $_POST['username'];
$status = $_POST['status'];

$id_img = $_FILES['student_id_img']['name'];
$id_img_temp = $_FILES['student_id_img']['tmp_name'];
$store_id_img = "seller_request/student_id_images/" . $id_img;


$nid_img = $_FILES['nid_img']['name'];
$nid_img_temp = $_FILES['nid_img']['tmp_name'];
$store_nid_img = "seller_request/nid_images/" . $nid_img;

move_uploaded_file($id_img_temp, $store_id_img);
move_uploaded_file($nid_img_temp, $store_nid_img);

$insert = "INSERT INTO `requests`(`username`, `student_id`, `stu_id_img`, `nid_img`, `status`) VALUES (?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $insert);
mysqli_stmt_bind_param($stmt, "sssss", $username, $student_id, $store_id_img, $store_nid_img, $status);


if (mysqli_stmt_execute($stmt)) {
    echo "<script>Your request is now pending review by our admin. We will notify you once it's been processed. Your patience is appreciated.</script>";
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
