<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["db_username"];
    $rating = round($_POST["rating"]);
    $review = $_POST["r_desc"];
    $prod_name = $_POST["prod_name"];

    $stmt = $conn->prepare("INSERT INTO `review`(`db_username`, `prod_name`, `r_desc`, `rating`) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("sssi", $user_name, $prod_name, $review, $rating);

    if ($stmt->execute()) {
        $update_query = "UPDATE `products` p
                        JOIN (
                            SELECT `prod_name`, AVG(`rating`) AS `avg_rating`
                            FROM `review`
                            GROUP BY `prod_name`
                        ) r ON p.`prod_name` = r.`prod_name`
                        SET p.`rating` = r.`avg_rating`
                        WHERE p.`prod_name` = '" . $prod_name . "'";

        $conn->query($update_query);

        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    } else {
        echo "<script>alert('Review submission UNSUCCESSFUL!!!')</script>";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    $stmt->close();
}
