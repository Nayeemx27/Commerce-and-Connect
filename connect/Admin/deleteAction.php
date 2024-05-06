<?php
include '../config/config.php';

$id= $_GET['id'];

$delete_query = "DELETE FROM `files` WHERE id='$id'";

mysqli_query($conn,$delete_query);
header("location:admin.php");