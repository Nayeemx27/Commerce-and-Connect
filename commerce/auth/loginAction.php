<?php

include 'config.php';

session_start();


$inp_email = $_POST['name'];
$inp_pass = $_POST['pass'];


$stmt = $conn->prepare("SELECT * FROM `register` WHERE db_username=? AND db_pass=?");

$stmt->bind_param("ss", $inp_email, $inp_pass);

$stmt->execute();

$result = $stmt->get_result();



if ($result->num_rows) {
    $row = $result->fetch_assoc();

    $_SESSION['email'] = $inp_email;
    $_SESSION['username'] = $inp_email;

    if ($row['role'] == 'Admin' || $row['role'] == 'admin') {
        $_SESSION['admin'] = true;
    } elseif ($row['role'] == 'Seller' || $row['role'] == 'seller') {
        $_SESSION['seller'] = true;
    } elseif ($row['role'] == 'Club Manager' || $row['role'] == 'club manager') {
        $_SESSION['manager'] = true;
    } else {
        $_SESSION['buyer'] = true;
    }


    echo "<script>location.href='../index.php'</script>";
} else {
    echo "<script>alert('Username and Password do not match!')</script>";
    echo "<script>location.href='login.html'</script>";
}
