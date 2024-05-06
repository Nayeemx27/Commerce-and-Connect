<?php

session_start();

$isLoggedIn = isset($_SESSION['email']);

if (isset($_SESSION['email'])) {
} else {
  echo "<script>location.href='login.html'</script>";
  exit;
}

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cart</title>
  <link rel="icon" type="image/x-icon" href="images/fav.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />

  <link rel="stylesheet" href="../auth/css/bootstrap.min.css">

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
    .cart-body {
      margin: 80px;
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

    .bold {
      font-weight: 700;
    }

    td a {
      text-decoration: none;
      font-size: 13px;
    }

    td a:hover {
      text-decoration: underline;
      font-size: 13px;
    }

    .cal-total {
      display: flex;
      justify-content: flex-end;
    }

    .cal-total table {
      border-top: 2px solid #dc4c64;
      max-width: 310px;
    }

    td:last-child {
      text-align: right;
    }

    th:last-child {
      text-align: right;
      padding: 0 10px;
    }

    .return {
      display: inline-block;
      background-color: #ca133f;
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 5px;
      margin-top: 30px;
      transition: background-color 0.3s ease;
    }

    .return:hover {
      color: aliceblue;
      background-color: #ca122f;
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
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="dashboard.php" class="nav-link text-danger d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                        </div>
                    </li>';
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

  <div class="cart-body">

    <!-- <table class="w-100">
      <tr class="bg-danger text-white">
        <th class="p-1 px-2">Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr> -->
    <?php

    include 'config.php';
    $totalMoney = 0;
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM cart WHERE name='$email'");
    if ($query->num_rows) {
      $cartData = mysqli_fetch_array($query);
      $prodArr = explode(", ", $cartData['prod_name']);
      $quanArr = explode(", ", $cartData['quantity']);


      echo "<table class='w-100'>
      <tr class='bg-danger text-white'>
        <th class='p-1 px-2'>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>";
      $fixedSizeArray = array_fill(0, count($prodArr), null);
      $i = 0;
      while ($i < count($prodArr)) {
        $fixedSizeArray[$i] = $quanArr[$i];
        $productData = mysqli_query($conn, "SELECT `price`,`img` FROM `products` WHERE `prod_name`='$prodArr[$i]'");
        $product = mysqli_fetch_array($productData);
        $img = explode(", ", $product['img']);
        $subTotal =  (float)$product['price'] * (float)$quanArr[$i];
        $totalMoney += $subTotal;

        echo "<tr>
              <td>
                  <div class='cart-details d-flex mt-3'>
                      <img src='$img[0]' alt='" . $prodArr[$i] . "' class='' />
                      <div class='info px-3'>
                          <p class='p-0 my-1'>$prodArr[$i]</p>
                          <span>Price: " . (float)$product['price'] . "</span><br />
                          <a href='' class='text-danger'>Remove</a>
                      </div>
                  </div>
              </td>
              <td>

              <input type='number' value='$quanArr[$i]' class='quantityList' onchange='updateSubTotal(this)' data-price='" . $product['price'] . "' data-index='$i' min='1'/>
                  
              </td>
              <td class='sub-total'> $subTotal</td>
          </tr>";



        $i++;
      }
    } else {

      echo "<div class='empty d-flex flex-column align-items-center justify-content-center align-content-center my-5'>
      <img src='images/emptyCart.png' alt='Empty Cart' style='width: 20%; height: 20%;'>
        <h3 class='mt-4'>Your Cart is <span style='color: #ca133f
        '>Empty</span></h3>

        <p>Add products to your cart before checking out.</p>
        <a class='return' href='../index.php'>RETURN TO SHOP</a>
      </div>";
    }
    ?>

    <script>
      let inputValue;

      function updateSubTotal(input) {
        const index = parseInt(input.getAttribute('data-index'));
        let quantity = parseInt(input.value);
        inputValue = quantity;

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

      function getInputValue() {
        return inputValue;
      }
    </script>



    </table>

    <form id="totalForm" action="cartUpdateAction.php" method="post">
      <input type="hidden" name="subtotal" value="">
    </form>


    <?php
    $vat = round($totalMoney * 0.02, 2);
    $total = $totalMoney + $vat;

    if ($query->num_rows) {
      echo "<div class='cal-total'>

      <table class='w-100'>
        <tr>
          <td>Subtotal</td>
          <td id='subtotal' class='bold'> $totalMoney</td>
        </tr>
        <tr>
          <td>VAT</td>
          <td id='vat' class='bold'>$vat</td>
        </tr>
        <tr>
          <td>Total</td>
          <td class='total bold'>$total </td>
        </tr>
        <tr>
          <td>
          </td>
        </tr>
      </table>"
    ?>


  </div>


  <div class="action-div">
    <form id="cartForm" action="cartUpdateAction.php" method="post">
      <?php
      $username = $_SESSION['email'];
      for ($i = 0; $i < count($quanArr); $i++) {
        echo "<input type='hidden' id='hidden_quantity_$i' name='quantity[]' value='" . $quanArr[$i] . "' />";
      }
      ?>
      <input type="hidden" name="username" value="<?php echo $username ?>">
      <div class='pos'>
        <button type='submit' class='mt-3 w-100 btn btn-danger'>Place your order</button>
      </div>
    </form>
  </div>


  <script>
    function updateHiddenInputs(input) {
      const index = parseInt(input.getAttribute('data-index'));
      const hiddenInput = document.getElementById('hidden_quantity_' + index);
      if (hiddenInput) {
        hiddenInput.value = input.value;
      }
    }

    const quantityInputs = document.querySelectorAll('.quantityList');
    quantityInputs.forEach(input => {
      input.addEventListener('change', function() {
        updateHiddenInputs(input);
      });
    });
  </script>





  </div> ;

<?php

    }

?>


<!-- Footer -->
<?php

if (mysqli_num_rows($query) > 0) :

?>
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

<?php endif; ?>
</body>

</html>