<?php

include 'config.php';
$id = $_GET['id'];
$deleteQuery = "DELETE FROM `register` WHERE id = '$id'";
mysqli_query($conn, $deleteQuery);

header("Location:dashboard.php");
