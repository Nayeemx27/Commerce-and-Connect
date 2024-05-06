<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .navbar {
            background-color: #3498db;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar img {
            max-width: 100px;
        }

        /* Style the card */
        .card {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex; 
        }

        .card-header {
            background-color: #f2f2f2;
            flex: 1; 
            padding: 10px;
        }

        .card-body {
            flex: 2; 
            padding: 10px;
        }

        .tracking-link {
            color: #3498db;
            text-decoration: underline;
            cursor: pointer;
        }

        .product-image {
            max-width: 200px; 
            float: right;
            border:2px bold black;
            border-radius: 10px;
            margin-right: 20px;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand mx-4" href="#">
        <img src="../images/logo-color.png" alt="" class="circular" style="width: 180px; height: 60px" />
      </a>

      <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto p-4">
        </ul>
      </div>
</nav>

<div class="container">
<?php
include 'config.php';

session_start();

$user_email = $_SESSION['email'];
$user_name = $_SESSION['username'];

$filter_product_names_sql = "SELECT DISTINCT prod_name FROM `products`";
$filter_product_names_result = $conn->query($filter_product_names_sql);

if ($filter_product_names_result->num_rows > 0) {
    $filter_product_names = array();

    while ($filter_row = $filter_product_names_result->fetch_assoc()) {
        $filter_product_names[] = $filter_row["prod_name"];
    }


    $sql = "SELECT * FROM `order` WHERE name = '$user_name' ORDER BY id DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<div class="card-header bg-dark text-white"><strong></strong> ' . $row["products"] . '</div>';
            echo '<div class="card-body">';
        
            // Splitting product names by comma
            $ordered_products = explode(',', $row["products"]);
            foreach ($ordered_products as $ordered_product) {
                foreach ($filter_product_names as $prod_name_products) {
                    if (strpos($ordered_product, $prod_name_products) !== false) {
                        $image_sql = "SELECT * FROM `products` WHERE prod_name = '$prod_name_products'";
                        $image_result = $conn->query($image_sql);
            
                        if ($image_result->num_rows > 0) {
                            $image_row = $image_result->fetch_assoc();
                            $image_url = $image_row["img"];
            
                            echo '<img src="' . $image_url . '" alt="Product Image" class="product-image">';
                        }
                        break;
                    }
                }
            }
        
            echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
            echo '<p><strong>Address:</strong> ' . $row["address"] . '</p>';
            echo '<p><strong>Payment:</strong> ' . $row["payment"] . '</p>';
            echo '<p><strong>Order Placed Date:</strong> ' . $row["date"] . '</p>';
            echo '<p><strong>Status:</strong> ' . $row["status"] . '</p>';
        
            if ($row["status"] != "Delivered") {
               
                echo '<p><a href="product_order_timeline.php?id=' . $row["id"] . '" class="text-danger">Track</a></p>';
            }
        
            echo '</div>';
            echo '</div>';
        }
        
    } else {
        echo "No orders found.";
    }
} else {
    echo "No  product names found in the products table.";
}

$conn->close();
?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
