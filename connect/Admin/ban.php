<?php
include '../config/config.php';

if(isset($_POST['id'])) {
  
    $userId = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "UPDATE  userinfo SET BAN  = '1' where id ='$userId'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User Banned')</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "User ID not provided.";
}

$conn->close();
?>
