<?php
include '../config/config.php';

$id= $_GET['id'];

$update_query= "UPDATE `files` SET `isApprove`='1' WHERE  id='$id'";

mysqli_query($conn,$update_query);
header("location:admin.php");
?>
