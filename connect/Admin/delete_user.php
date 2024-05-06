<?php

include '../config/config.php';

if(isset($_POST['id'])) {
   
    $userId = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "DELETE FROM userinfo WHERE id = '$userId'";

    if ($conn->query($sql) === TRUE) {
       
        echo "User deleted successfully.";
    } else {
       
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "User ID not provided.";
}

$conn->close();
?>
