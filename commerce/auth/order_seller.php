<?php
include 'config.php';

session_start();

$username = $_SESSION['username'];

$sql = "SELECT * FROM `order` WHERE FIND_IN_SET('$username', uploader) ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #191919; 
        
        }

        .container {
            padding-top: 50px;
        }

        h2 {
            margin-bottom: 30px;
            color: white; 
        }

        table {
            background-color:  #191919;
            color: white; 
        }

        th, td {
            vertical-align: middle;
            text-align: center;
            color: white; 
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Orders</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Bill ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Payment</th>
                <th>Products</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["bill_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["mob"] . "</td>";
        echo "<td>" . $row["payment"] . "</td>";
        echo "<td>" . $row["products"] . "</td>";
        echo "<td>" . $row["total"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='../auth/update_status.php'>";
        echo "<input type='hidden' name='order_id' value='" . $row["id"] . "'>";
        echo "<select name='new_status' class='form-control'>";
        echo "<option value='Placed'" . ($row["status"] == "Placed" ? " selected" : "") . ">Placed</option>";
        echo "<option value='Accepted'" . ($row["status"] == "Accepted" ? " selected" : "") . ">Accepted</option>";
        echo "<option value='In Transit'" . ($row["status"] == "In Transit" ? " selected" : "") . ">In Transit</option>";
        echo "<option value='Out for Delivery'" . ($row["status"] == "Out for Delivery" ? " selected" : "") . ">Out for Delivery</option>";
        echo "<option value='Delivered'" . ($row["status"] == "Delivered" ? " selected" : "") . ">Delivered</option>";
        echo "</select>";
        echo "<button type='submit' class='btn btn-primary mt-2'>Update</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No orders found</td></tr>";
}
$conn->close();
?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
