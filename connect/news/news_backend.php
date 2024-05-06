<?php
include '../config/config.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $rawBody = $_POST["body"];

   
    $body = substr($rawBody, 0, 3000);

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    // sql inj
    $stmt = $conn->prepare("INSERT INTO news (title, body, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $body, $targetFile);

    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile) && $stmt->execute()) {
        echo "<script>alert('News Submitted Successfully')</script>";
        echo "<script>location.href='../news/news_upload.php'</script>";
    } else {
        echo "Sorry, there was an error uploading your file or submitting the news.";
    }

    $stmt->close();
}

$conn->close();
?>
