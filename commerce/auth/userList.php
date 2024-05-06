<?php

session_start();

$isLoggedIn = isset($_SESSION['email']);

//   if(isset($_SESSION['email'])){
//   }
//   else{
//     echo "<script>location.href='../project/login.html'</script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../auth/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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

        .update {
            color: #eda826;
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



        .bold {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="cart-body">

        <h1 class="text-center p-3">User List</h1>
        <table class="w-100">
            <thead>
                <tr class="bg-danger text-white">
                    <th class="p-1 px-2">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Roles</th>
                    <th>Update</th>
                    <th>Delete</th>


                </tr>
            </thead>


            <tbody>
                <tr>


                    <?php
                    include 'config.php';

                    $allData = mysqli_query($conn, "SELECT * FROM `register`");

                    while ($row = mysqli_fetch_array($allData)) {
                        echo "
                            <tr>                               
                                <td>$row[id]</td>
                                <td>$row[db_username]</td>
                                <td>$row[db_email]</td>                           
                                <td>$row[db_phone]</td>

                                <form action='userListUpdateAction.php' method='post'>
                                <td>
                                    <select name='role' id='role' onchange='updateSelectOptions()' class='form-select' style='width: 150px''>
                                        <option value='$row[role]' disabled>$row[role]</option>
                                        <option value='buyer'>Buyer</option>
                                        <option value='seller'>Seller</option>
                                        <option value='club manager'>Club Manager</option>
                                        <option value='admin'>Admin</option>
                                    </select>
                                </td>
                                <td>
                                    <input type='hidden' name='id' value='$row[id]'>
                                    <button type='submit' class='nav-link update bold text-capitalize' style='display: inline-block; padding: 6px'>Update</button>

                                 </td>

                            </form>

                            <td>
                                <a href='userListDeleteAction.php?id=$row[id]' class='nav-link del text-danger bold text-capitalize' style='display: inline-block; margin-left: 15px; padding: 6px'>Delete</a>
                            </td>

                              
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