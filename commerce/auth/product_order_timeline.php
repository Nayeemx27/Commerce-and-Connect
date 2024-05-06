<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }


        .product-details {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 30px;
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 1000px;
        }

        .timeline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .timeline-item {
    text-align: center;
    margin-bottom: 20px;
    border-radius: 4px;
    padding: 8px;
}

.dotted-line {
    border-top: 2px dotted #555;
    width: 100%;
    margin: 30px 0; 
}


        .active-icon {
            color: green;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .p-top{
            padding-top: 10px;
        }
    </style>
</head>

<body>


<?php
include 'config.php';

$product_id = $_GET['id'];

$sql = "SELECT * FROM `order` WHERE id = '$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-details">';
        echo '<div class="timeline">';

        // Placed
        echo '<div class="timeline-item ' . (($row["status"] === 'Placed' || $row["status"] === 'Accepted' || $row["status"] === 'In Transit' || $row["status"] === 'Out for Delivery') ? 'active-icon' : '') . '">';
        echo '<i class="fas fa-shopping-bag"></i>';
        echo '<p>Placed<br>' . $row["date"] . '</p>'; // Displaying the date
        echo '</div>';

        echo '<div class="dotted-line"></div>';

        // Accepted 
        echo '<div class="timeline-item ' . (($row["status"] === 'Accepted' || $row["status"] === 'In Transit' || $row["status"] === 'Out for Delivery') ? 'active-icon' : '') . '">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<p>Accepted<br>' . $row["accepted_time_date"] . '</p>'; // Displaying the accepted_time_date
        echo '</div>';

        echo '<div class="dotted-line"></div>';

        // In Transit
        echo '<div class="timeline-item ' . (($row["status"] === 'In Transit' || $row["status"] === 'Out for Delivery') ? 'active-icon' : '') . '">';
        echo '<i class="fas fa-shipping-fast"></i>';
        echo '<p>In Transit<br>' . $row["in_transit_time_date"] . '</p>'; // Displaying the in_transit_time_date
        echo '</div>';

        echo '<div class="dotted-line"></div>';

        // Out for Delivery 
        echo '<div class="timeline-item ' . (($row["status"] === 'Out for Delivery') ? 'active-icon' : '') . '">';
        echo '<i class="fas fa-box "></i>';
        echo '<p>Out for Delivery<br>' . $row["out_for_delivery_time_date"] . '</p>'; // Displaying the out_for_delivery_time_date
        echo '</div>';

        echo '<div class="dotted-line"></div>';

        // Delivered
        echo '<div class="timeline-item ' . (($row["status"] === 'Delivered') ? 'active-icon' : '') . '">';
        echo '<i class="fas fa-check"></i>';
        echo '<p>Delivered<br>' . $row["delivered_time_date"] . '</p>'; // Displaying the delivered_time_date
        echo '</div>';

        echo '</div>';

        echo '<div class="product-title">' . $row["products"] . '</div>';
        echo '<div class="product-status">' . $row["status"] . '</div>';
        echo '<div class="product-status">' . $row["address"] . '</div>';

        $order_date = date_create($row["date"]);
        $probable_delivery_date = date_add($order_date, date_interval_create_from_date_string('7 days'));

        echo '<div class="product-body product-status">Probable Delivery Date: ' . date_format($probable_delivery_date, 'd-m-y') . '</div>';
        echo '<div></div>';
        echo '<div class="product-body product-status">The product delivery can take 3 to 5 days</div>';
        echo '</div>';
    }
} else {
    echo "Product not found.";
}
$conn->close();
?>


    <footer>
        <p>&copy; 2024 Commerce and Connect. All rights reserved.</p>
    </footer>

</body>

</html>
