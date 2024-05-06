<?php
include 'config.php';

$id = $_POST['id'];
$selectedRole = $_POST['role'];


$updateSQL = "UPDATE `register` SET `role`='$selectedRole' WHERE id='$id'";


if (mysqli_query($conn, $updateSQL)) {
    echo "<script>location.href='dashboard.php'</script>";
} else {
    echo "Error Occured: " . mysqli_error($conn);
}
