<?php

session_start();

$isLoggedIn = isset($_SESSION['email']);

if (isset($_SESSION['email'])) {
} else {
    echo "<script>location.href='login.html'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
        /* cart section  */

        .cart-body {
            margin: 20px 80px;
            border-bottom: 8px solid #dc3545;
        }

        .cart-body td img {
            width: 80px;
            height: 80px;
        }

        td {
            padding: 8px 5px;
        }

        td input {
            width: 50px;
            height: 30px;
            padding: 5px;
        }

        .sub-total {
            font-weight: 700;
        }

        td a {
            text-decoration: none;
            font-size: 17px;
        }

        .update:hover {
            background-color: #eda826;
            color: white;
            border-radius: 10px;
        }

        .del:hover {
            text-decoration: underline;
            color: blue;
            border-radius: 10px;
        }


        td:last-child {
            text-align: right;
        }

        th:last-child {
            text-align: right;
            padding: 0 10px;
        }

        .update {
            color: #eda826;
        }

        .bold {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="cart-body">

        <h1 class="text-center p-3">Product List</h1>
        <table class="w-100">
            <thead>
                <tr class="bg-danger text-white">
                    <th class="p-1 px-2">ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Catagory</th>
                    <th>Availability</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>


                    <?php
                    include 'config.php';

                    $allData = mysqli_query($conn, "SELECT * FROM `products`");

                    while ($row = mysqli_fetch_array($allData)) {
                        echo "
                            <tr>                               
                                <td>$row[id]</td>
                                <td>$row[prod_name]</td>
                                <td class='sub-total'>৳$row[price]</td>
                                
                                
                            
                                <td> <div class='cart-details d-flex mt-3'>
                                          <img src='$row[img]'  />
                                     </div>
                             
                                </td>

                                <td>$row[catagory]</td>
                                <td>$row[stock]</td>
    

                                <td><a class='nav-link update bold text-capitalize' href='update.php?id=$row[id]'>Update</a></td>
                                <td><a class='del text-danger bold text-capitalize'  href='deleteAction.php? id=$row[id]'>Delete</a></td>
                            </tr>
                        ";
                    }
                    ?>

                </tr>
            </tbody>
        </table>







    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>