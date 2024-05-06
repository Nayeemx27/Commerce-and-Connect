<?php

session_start();


$isLoggedIn = isset($_SESSION['email']);

$username = $_SESSION['email'];


include 'config.php';
$email = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT * FROM cart WHERE name='$email'");

if (mysqli_num_rows($query)) {
  $cartData = mysqli_fetch_array($query);
  $prodArr = explode(", ", $cartData['prod_name']);

  $numberOfProducts = count($prodArr);
} else {
  $numberOfProducts = 0;
}


if (isset($_SESSION['email'])) {
} else {
  echo "<script>location.href='login.html'</script>";
}




if (!isset($_SESSION['order_token'])) {
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $token = substr(str_shuffle($characters), 0, 12);
  $_SESSION['order_token'] = $token;
} else {
  $token = $_SESSION['order_token'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../auth/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="images/fav.png">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link href="style.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="../commonDesign.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../commonDesign.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ABCDE12345..." crossorigin="anonymous" />
  <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="script.js" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style>
    .checkout-page {
      background-color: #f0faf9;
      min-height: 100vh;
    }

    .checkout-page {
      padding: 20px;
    }

    .card-summary {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 10px;
    }

    .card-header {
      font-weight: bold;
    }

    .card-header span {
      font-weight: normal;
    }

    .place-order-btn {
      color: #fff;
    }



    .row input {
      margin-bottom: 15px;
    }

    .col-lg-5 {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .cart-details {
      width: 100%;
      max-width: 350px;
    }

    .title {
      font-weight: 600;
    }


    td:last-child {
      text-align: right;
    }


    .card-footer .title table {
      width: 100%;
    }

    .card-footer .title td {
      padding: 5px 0;
    }

    .card-footer .title td:first-child {
      font-weight: 600;
      padding-right: 10px;
    }

    .card-footer .title td.text-right {
      text-align: right;
    }

    .place-order-btn {
      display: block;
      width: 80%;
    }

    #email-address {
      color: #403E3E;
      font-weight: 500;
    }
  </style>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand mx-4" href="../index.php">
        <img src="../images/logo-color.png" alt="" class="circular" style="width: 180px; height: 60px" />
      </a>

      <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="mx-auto my-2 px-5 d-inline w-100">
          <div class="input-group searchbar ">
            <input type="search" class="form-control " style="height: 45px;" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>

        <ul class="navbar-nav ms-auto p-4">

          <li class="nav-item">
            <a class="nav-link text-white" href="../connect/Home/LandingPage.html">
              <!-- <i class="fas fa-users fa-lg text-white"></i> -->
              Community
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="../hire.html">
              <!-- <i class="fas fa-briefcase fa-lg text-white"></i> -->
              Hire
            </a>
          </li>

          <?php

          if (isset($_SESSION['admin'])) {
            echo '
                            <a href="dashboard.php" class="nav-link text-danger d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                    ';
          } elseif (isset($_SESSION['seller'])) {
            echo '
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link text-primary d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                    </li>';
          } elseif (isset($_SESSION['manager'])) {
            echo '
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link text-info d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                    </li>';
          } elseif (isset($_SESSION['buyer'])) {
            echo '
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link text-white d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                    </li>';
          } else {
            echo '
                    <li class="nav-item">
                        <a
                            class="nav-link text-white log-btn d-flex "
                            href="../login.html"
                        
                        >
                            <i class="fas fa-user fa-lg me-2"></i> Login
                        </a>
                    </li>';
          }
          ?>


          <li class="nav-item">
            <a class="nav-link" href="auth/cart.php" style="position: relative; display: inline-block;">
              <i class="fa-solid fa-bag-shopping fa-lg text-white"></i>
              <span style="position: absolute; top: -1px; right: -5px; background-color: red; color: white; border-radius: 50%; width: 20px; height: 20px; text-align: center; line-height: 20px; font-size: 12px;"><?php echo $numberOfProducts ?></span>
            </a>
          </li>

        </ul>


      </div>
    </nav>
  </header>

  <div class="checkout-page  mx-2 rounded">
    <h1 class="text-center mb-2">Checkout</h1>
    <div class="mb-5 text-center ">
      <hr>
    </div>

    <form action="orderAction.php" method="post">

      <div class="row">
        <div class="col-lg-7 mx-3">


          <div class="row">
            <div class="col-lg-6">
              <div class="form-group" style="width: 80%;">
                <label for="token" class="font-weight-bold">Token</label>

                <?php echo "<p class='title'>$token</p>"; ?>


                <input type="hidden" name="token" value="<?php echo $token; ?>">


              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group" style="width: 80%;">

                <?php
                date_default_timezone_set('Asia/Dhaka');

                $current_time = date("H:i");
                $date = date("d-m-Y");

                echo "<p>Time: $current_time <br> Date: $date</p>";
                ?>

                <input type="hidden" name="time" value="<?php echo $current_time; ?>">

                <input type="hidden" name="date" value="<?php echo $date; ?>">

              </div>
            </div>
          </div>




          <div class="form-group" style="width: 80%;">
            <label for="recipient-name" class="font-weight-bold">Recipient's Name</label>
            <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Enter recipient's name" required>
          </div>


          <div class="form-group" style="width: 80%;">




            <?php
            include 'config.php';
            $userName = $_SESSION['username'];
            $fetchReg = "SELECT * FROM register WHERE db_username='$userName'";
            $result = mysqli_query($conn, $fetchReg);
            $row = mysqli_fetch_array($result);
            ?>

            <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $userName; ?>">


            <label for="email-address" class="font-weight-bold">Email Address</label>
            <input type="email" class="form-control" id="email-address" value="<?php echo $row['db_email'] ?>" disabled>

            <input type="hidden" name="email" value="<?php echo $row['db_email'] ?>">


          </div>


          <div class="form-group" style="width: 80%;">
            <label for="delivery-address" class="font-weight-bold">Address</label>
            <textarea class="form-control" id="delivery-address" name="address" placeholder="Enter delivery address" required></textarea>
          </div>


          <div class="form-group" style="width: 80%;">
            <label for="mob" class="font-weight-bold">Mobile Number</label>
            <input type="number" name="mob" class="form-control" id="mob" placeholder="Enter mobile number" required>
          </div>

          <div class="form-group">
            <label class="font-weight-bold">Payment Method</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment-method" id="cash-on-delivery" value="COD" required>
              <label class="form-check-label" for="cash-on-delivery">Cash on Delivery</label>
            </div>
          </div>

          <div class="form-group  my-2">
            <label class="fs-small">
              <small> By Clicking the button, you agree to the <a href="">Terms and Conditions</a>.</small>
            </label>
          </div>
          <button class="btn btn-danger place-order-btn" type="submit">Place Order</button>
        </div>


        <div class="col-lg-5 cart-details">
          <div class="card-summary">
            <div class="card-header" style="background-color: white;">
              <i class="fa-solid fa-cart-shopping"></i> Cart Summary <span>[<a href="cart.php">edit</a>]</span>
            </div>
            <div class="card-body">
              <table>

                <?php

                include 'config.php';
                $totalMoney = 0;
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT * FROM cart WHERE name='$email'");
                if ($query->num_rows) {
                  $cartData = mysqli_fetch_array($query);
                  $prodArr = explode(", ", $cartData['prod_name']);
                  $quanArr = explode(", ", $cartData['quantity']);
                  $uploader = explode(", ", $cartData['uploader']);

                  $i = 0;
                  while ($i < count($prodArr)) {

                    $productData = mysqli_query($conn, "SELECT price,img FROM products WHERE prod_name='$prodArr[$i]'");
                    $product = mysqli_fetch_array($productData);
                    $img = explode(", ", $product['img']);
                    $subTotal =  (float)$product['price'] * (float)$quanArr[$i];
                    $totalMoney += $subTotal;
                    echo "<tr>
            <td >
            <p class = 'title mt-2'>$quanArr[$i] x $prodArr[$i]</p>
            </td>

            

            <td>
            <p class = 'title mt-2 ms-3'>$subTotal</p>
            </td>";

                    $orderDetails[] = "$prodArr[$i] - $quanArr[$i] ";

                    $i++;
                  }
                }
                ?>

                <input type="hidden" name="order-details" value="<?php echo implode(', ', $orderDetails); ?>">
                <input type="hidden" name="uploader" value="<?php echo implode(', ', $uploader); ?>">


                <script>
                  function updateSubTotal(input) {
                    const index = parseInt(input.getAttribute('data-index'));
                    let quantity = parseInt(input.value);
                    inputValue = quantity; // Store the input value in the global variable

                    const price = parseFloat(input.getAttribute('data-price'));
                    const subTotal = quantity * price;
                    const subTotalCell = input.parentElement.nextElementSibling;
                    subTotalCell.textContent = "" + subTotal.toFixed(2);

                    calculateTotal();
                  }

                  function calculateTotal() {
                    const subTotalCells = document.getElementsByClassName('sub-total');
                    let totalMoney = 0;
                    for (let i = 0; i < subTotalCells.length; i++) {
                      const subTotalValue = parseFloat(subTotalCells[i].textContent.replace('৳', ''));
                      if (!isNaN(subTotalValue)) {
                        totalMoney += subTotalValue;
                      }
                    }
                    const vat = totalMoney * 0.1;
                    const total = totalMoney + vat;

                    const totalLabel = document.getElementsByClassName('total');
                    document.getElementById('subtotal').textContent = "" + totalMoney.toFixed(2);
                    document.getElementById('vat').textContent = "" + vat.toFixed(2);
                    totalLabel[0].textContent = "" + total.toFixed(2);
                    totalLabel[1].value = total.toFixed(2);
                  }
                </script>

              </table>
            </div>

            <div class="card-footer bg-white">
              <div class="title">


                <table>
                  <tr>
                    <td>Sub Total </td>
                    <td><?php echo $totalMoney; ?></td>
                  </tr>

                  <tr>
                    <td>VAT </td>
                    <td><?php echo round($totalMoney * 0.02, 2); ?></td>
                  </tr>

                  <tr>
                    <td>Total </td>
                    <td> <?php echo $totalMoney + $totalMoney * 0.02; ?></td>
                  </tr>




                  <input type="hidden" name="total" value="<?php echo $totalMoney + $totalMoney * 0.02; ?>">


                </table>

              </div>

            </div>
          </div>
        </div>
      </div>

    </form>




  </div>

  <section class="footer mt-5" style=" width: 100%; overflow-x: hidden;">
    <footer class="bg-dark">
      <div class="container" style="color: white;">
        <div class="row">
          <div class="col-lg-4 col-md-6 banner mt-4">
            <img src="images\banner.svg" alt="banner">
          </div>

          <div class="col-lg-3 mt-4">
            <h5>Contact Us</h5>

            <div class="divide">
              <div class="icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>

              <div class="info">
                <p style="color: white;">
                  Leading University, Ragibnagar, South Surma, Sylhet-3112
                </p>
              </div>
            </div>

            <div class="divide">
              <div class="icon">
                <i class="fa-solid fa-mobile"></i>
              </div>

              <div class="info">
                <p style="color: white;">
                  +880 1601361105
                </p>
              </div>
            </div>

            <div class="divide">
              <div class="icon">
                <i class="fa-solid fa-envelope"></i>
              </div>

              <div class="info">
                <p style="color: white;">
                  teamcommerce@gmail.com
                </p>

              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 ">
            <div class="contact mt-4">
              <h5>Follow Us</h5>

              <a href=""><i class=" fab fa-facebook fa-2x" style="background-color: #442bab;"></i></a>
              <a href=""><i class="fab fa-facebook-messenger fa-2x" style="background-color: #242ee3;"></i></a>
              <a href=""><i class="fab fa-youtube fa-2x" style="background-color: #d60909;"></i></a>
              <a href=""><i class="fab fa-instagram fa-2x" style="background-color: #ad0391;"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 ">
            <div class="links mt-4">
              <h5>Useful Links</h5>

              <div class=" items">
                <ul>
                  <li>
                    <a href="contact.php">Contact us</a>
                  </li>
                  <li>
                    <a href="about.html">About Us</a>
                  </li>
                  <li>
                    <a href="">Terms and Condition</a>
                  </li>
                  <li>
                    <a href="">Privacy and Policy</a>
                  </li>
                </ul>
              </div>





            </div>
          </div>

        </div>




      </div>
      <hr class="bg-light" />
      <div class="row">
        <div class="text-center">
          <p class="text-white">&copy; 2023 Commerce and Connect. All Rights Reserved.</p>
        </div>

      </div>

    </footer>
  </section>

</body>

</html>