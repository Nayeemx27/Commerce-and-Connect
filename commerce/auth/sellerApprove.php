<?php

include 'config.php';

$username = $_GET['username'];
$role = "seller";

$sql = "SELECT * FROM `requests` WHERE `username`='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$nid_img = $row['nid_img'];
$stu_id_img = $row['stu_id_img'];


$update_query = "UPDATE `register` SET `role`='$role', `nid_img`='$nid_img', `student_id_img`='$stu_id_img' WHERE `db_username` = '$username'";

if (mysqli_query($conn, $update_query)) {

    $del = "DELETE FROM `requests` WHERE `username`='$username'";
    mysqli_query($conn, $del);

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
