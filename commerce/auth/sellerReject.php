<?php

include 'config.php';

$id = $_GET['id'];
$role = "seller";


$del = "DELETE FROM requests WHERE id='$id'";


if (mysqli_query($conn, $del)) {


    header("Location: " . $_SERVER["HTTP_REFERER"]);
}