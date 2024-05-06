<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['order_id']) && isset($_POST['new_status'])) {
        $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
        $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);

        $sql = "UPDATE `order` SET status='$new_status'";

        switch ($new_status) {
            case 'Accepted':
                $sql .= ", accepted_time_date=NOW()";
                break;
            case 'In Transit':
                $sql .= ", in_transit_time_date=NOW()";
                break;
            case 'Out for Delivery':
                $sql .= ", out_for_delivery_time_date=NOW()";
                break;
            case 'Delivered':
                $sql .= ", delivered_time_date=NOW()";
                break;
            default:
                break;
        }

        $sql .= " WHERE id='$order_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.ph");
            exit();
        } else {
            echo "Error updating status: " . $conn->error;
        }
    } else {
        echo "Order ID and new status are required.";
    }
} else {
    header("Location: dashboard.php");
    exit();
}
