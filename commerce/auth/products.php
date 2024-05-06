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
    <title>Product List</title>
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

        .update:hover {
            background-color: #eda826;
            color: white;
            padding: 6px;
            border-radius: 10px;
        }

        .del:hover {
            text-decoration: underline;
            color: blue;
            padding: 6px;
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
    <header>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="../index.php">
                <img src="images/logo.png" alt="" class="circular" style="width: 90px; height: 90px" />
            </a>

            <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto p-4">
                    <li class="nav-item">
                        <a class="nav-link " href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="hire.html">Engage</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link me-3" href="contact.html">Contact</a>
                    </li>

                    <?php

                    ?>

                    <?php
                    if (isset($_SESSION['admin'])) {

                        echo '<a
            type="button"
            class="nav-link btn bg-danger me-2 text-white circular log-btn"
            href="adminHome.php"
          >Admin</a>';
                    } elseif ($isLoggedIn) {
                        echo '<a
              type="button"
              class="nav-link btn bg-secondary text-white circular log-btn"
              href="auth/logout.php"
              onclick="return confirm(\'Are you sure you want to logout?\')"
            >Logout</a>';
                    } else {
                        echo '<a
                type="button"
                class="nav-link btn bg-secondary text-white circular log-btn"
                href="#"
                data-bs-toggle="modal"
                data-bs-target="#loginModal"
              >Login</a>';
                    }
                    ?>

                    <!-- <li class="nav-item log">


              <a
                type="button"
                class="nav-link btn bg-secondary text-white circular log-btn"
                href="#"
                data-bs-toggle="modal"
                data-bs-target="#loginModal"
                >Login</a
              >
            </li> -->
                </ul>
            </div>
        </nav>
    </header>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- form  -->
                    <form action="loginAction.php" method="post" class="text-center">
                        <div class="log-hero">
                            <div class="log-logo text-center">
                                <img src=" images/log-img.png" alt="" style="height: 120px; width: 120px" />
                            </div>
                            <div class="inp-box text-center my-4 px-4">
                                <input type="text" id="email" name="email" required placeholder="Email" />
                                <i class="fa fa-envelope icon1"></i>
                            </div>
                            <div class="inp-box text-center mb-3 px-4">
                                <input type="password" id="password" name="pass" placeholder="Password" required />
                                <i class="fa fa-lock icon2" aria-hidden="true"></i>
                            </div>

                            <div class="forget text-center">
                                <a href="forget_pass.html">Forget Password?</a>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary logx p">Login</button>
                            </div>
                            <div class="register mt-3 text-center">
                                <p class="text-white">
                                    Don't have an account? <a href="auth/sign_up.html">Register</a>
                                </p>
                            </div>

                            <div class="social-links mt-3">
                                <!-- <p class="text-uppercase p-2">Social Links</p> -->
                                <div class="separator text-center">
                                    <div class="row">
                                        <div class="col">
                                            <hr class="left-hr" />
                                        </div>
                                        <div class="col-auto text-white">
                                            <span class="or">OR</span>
                                        </div>
                                        <div class="col text-center">
                                            <hr class="right-hr" />
                                        </div>
                                    </div>
                                </div>

                                <div class="px-2">
                                    <div class="container">
                                        <div class="row social-links text-center">
                                            <div class="col">
                                                <a href="#" target="_blank" class="social-link">
                                                    <i class="fab fa-google"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="#" target="_blank" class="social-link">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="#" target="_blank" class="social-link">
                                                    <i class="fab fa-github"></i>
                                                </a>
                                            </div>
                                            <!-- <div class="col">
                    <a
                      href="https://www.linkedin.com/your-profile"
                      target="_blank"
                      class="social-link">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </div> -->
                                            <p><br /></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                                <td class='sub-total'>$row[price] BDT</td>
                                
                                
                            
                                <td> <div class='cart-details d-flex mt-3'>
                                          <img src='$row[img]'  />
                                     </div>
                             
                                </td>

                                <td>$row[catagory]</td>
                                <td>$row[stock]</td>
    
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