<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "commerce and connect";

// $servername = "sql201.infinityfree.com";
// $username = "if0_34617943";
// $password = "q4ns3Kyx7iVc4f";
// $dbName = "if0_34617943_connect";

$conn = mysqli_connect($servername, $username, $password, $dbName);
if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
} else {
}
