<?php

session_start();

$isLoggedIn = isset($_SESSION['email']);

//   if(isset($_SESSION['email'])){
//   }
//   else{
//     echo "<script>location.href='../project/login.html'</script>";
// }

if ($isLoggedIn) {
  include 'auth/config.php';
  $email = $_SESSION['email'];
  $query = mysqli_query($conn, "SELECT * FROM cart WHERE name='$email'");

  if (mysqli_num_rows($query)) {
    $cartData = mysqli_fetch_array($query);
    $prodArr = explode(", ", $cartData['prod_name']);

    $numberOfProducts = count($prodArr);
  } else {
    $numberOfProducts = 0;
  }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home</title>

  <link rel="icon" type="image/x-icon" href="auth/images/fav.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="commonDesign.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="auth/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ABCDE12345..." crossorigin="anonymous" />
  <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="script.js" />
  <style>
    .log {
      width: 85px;
    }

    .navbar {
      height: 100px;
    }

    .freature {

      justify-content: center;
    }

    .feature .card {
      max-height: 160px;
      max-width: 140px;
      min-height: 160px;
      min-width: 140px;
    }

    .feature img {
      max-height: 110px;
      min-height: 110px;

      /* max-width: 100px; */
      padding: 10px 10px;

    }



    .feature .card-text {
      font-weight: 700;
      color: grey;
    }

    .parent img {
      max-height: 220px;
    }

    .parent .card {
      margin: 0 10px;
      min-height: 300px;
      min-width: 210px;


    }

    .parent .card img {
      min-height: 220px;
      min-width: 130px;
      max-height: auto;
      max-width: auto;

    }

    .parent {
      justify-content: center;
    }

    .shop-cart {
      z-index: 69;
    }

    .shop-cart:hover {
      background-color: #def5f3;
      color: #088178;
      z-index: 99;
    }

    .features-details {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
    }
  </style>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand mx-4" href="#">
        <img src="images/logo-color.png" alt="" class="circular" style="width: 180px; height: 60px" />
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
            <a class="nav-link text-white" href="../connect/Home/LandingPage.php">
              <!-- <i class="fas fa-users fa-lg text-white"></i> -->
              Community
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="../engage/Clubs/Landing.php">
              <!-- <i class="fas fa-briefcase fa-lg text-white"></i> -->
              Hire
            </a>
          </li>

          <?php

          if (isset($_SESSION['admin'])) {
            echo '
                  <li class="nav-item">
                      <div class="dropdown">
                          <a href="auth/dashboard.php" class="nav-link text-danger d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                      </div>
                  </li>';
          } elseif (isset($_SESSION['seller'])) {
            echo '
                  <li class="nav-item">
                      <a href="auth/dashboard.php" class="nav-link text-primary d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                  </li>';
          } elseif (isset($_SESSION['manager'])) {
            echo '
                  <li class="nav-item">
                      <a href="auth/dashboard.php" class="nav-link text-info d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                  </li>';
          } elseif (isset($_SESSION['buyer'])) {
            echo '
                  <li class="nav-item">
                      <a href="auth/dashboard.php" class="nav-link text-white d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                  </li>';
          } else {
            echo '
                  <li class="nav-item">
                      <a
                          type="button"
                          class="nav-link text-white log-btn d-flex "
                          href="#"
                          data-bs-toggle="modal"
                          data-bs-target="#loginModal"
                      >
                          <i class="fas fa-user fa-lg me-2"></i> Login
                      </a>
                  </li>';
          }
          ?>




          <li class="nav-item">
            <a class="nav-link" href="auth/cart.php" style="position: relative; display: inline-block;">
              <i class="fa-solid fa-bag-shopping fa-lg text-white"></i>
              <span style="position: absolute; top: -1px; right: -5px; background-color: red; color: white; border-radius: 50%; width: 20px; height: 20px; text-align: center; line-height: 20px; font-size: 12px;">
                <?php
                if ($isLoggedIn) {
                  echo $numberOfProducts;
                } else {
                  echo "0";
                }
                ?>
              </span>
            </a>
          </li>

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
          <form action="auth/loginAction.php" method="post" class="text-center">
            <div class="log-hero">
              <div class="log-logo text-center">
                <img src=" images/log-img.png" alt="" style="height: 120px; width: 120px" />
              </div>
              <div class="inp-box text-center my-4 px-4">
                <input type="text" id="name" name="name" required placeholder="username" />
                <i class="fa fa-user icon1"></i>
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

  <section class="text-left bg-light" id="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 greet">
          <h1 class="mb-3">
            Welcome to <br />
            <span class="mt-4" style="color: rgb(248, 206, 17)">Commerce and Connect</span>
          </h1>
          <p class="lead mb-4">
            Browse our wide selection of products and find the best deals!
          </p>
          <a href="#" class="greet-btn fw-bold">Shop Now</a>
        </div>
        <div class="col-lg-6">
          <img src="images/greet.jpg" class="mt-5 pt-3 img-fluid" alt="avatar" />
        </div>
      </div>
    </div>
  </section>

  <section class="feature p-4 ">
    <div class="mb-3">
      <hr />
      <h5 class="fw-bold text-center d-block">Our Features</h5>
      <hr />
    </div>
    <div class="features-details mt-3">
      <div class="mb-3">
        <div class="card">
          <img src="images/discount.png" class="card-img-top img-fluid" alt="Product Image" />
          <div class="card-body">
            <div class="card-text text-center">Discount</div>
          </div>
        </div>
      </div>
      <div class=" mb-3">
        <div class="card">
          <img src="images/ship.png" class="card-img-top img-fluid" alt="Product Image" />
          <div class="card-body">
            <div class="card-text text-center">Free Shipping</div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <div class="card">
          <img src="images/review.png" class="card-img-top img-fluid" alt="Product Image" />
          <div class="card-body">
            <div class="card-text text-center">Reviews</div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <div class="card">
          <img src="images/support.png" class="card-img-top img-fluid" alt="Product Image" />
          <div class="card-body">
            <div class="card-text text-center">Support</div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <div class="card">
          <img src="images/cod.png" class="card-img-top img-fluid" alt="Product Image" />
          <div class="card-body">
            <div class="card-text text-center">COD</div>
          </div>
        </div>
      </div>
      <div class=" mb-3">
        <div class="card">
          <img src="images/gift.png" class="card-img-top img-fluid" alt="Product Image" />
          <div class="card-body">
            <div class="card-text text-center">Gift Cards</div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="fproducts mt-4">
    <hr />
    <h3 class="text-center">Feature Products</h3>
    <p class="text-center">New Arrival</p>
    <hr />


    <div class=" pro-container p-4">
      <?php
      include '../commerce/auth/config.php';

      $select_query = "SELECT * FROM `products` order by id desc";
      $result = mysqli_query($conn, $select_query);






      echo '<div class="d-flex flex-wrap parent px-3">';







      while ($row = mysqli_fetch_assoc($result)) {
        $imgData = explode("/", $row['img']);
        $imageName = end($imgData);
        $rating = round($row['rating']);

        echo "
        <div class='card d-flex flex-column text-dark bg-light mb-4 shadow' style='max-width: 15rem;min-width: 15rem; '>
            <img src='auth/proimg/" . $imageName . "' class='card-img-top img-fluid' alt='" . $row['prod_name'] . "';'>

            <div class='card-body '>
                <h5 class=card-title'>" . $row['prod_name'] . "</h5>
                <h4 class='card-text '>
                " . str_repeat('<span class="fa fa-star checked"></span>', $rating) . "
                " . str_repeat('<span class="fa fa-star unchecked"></span>', 5 - $rating) . "

                
                  
                    <br />
                    <p class='price mt-2 '> " . $row['price'] . ' BDT
                    ' . "</p>
                    <div class='card-details'>

                                    
                    <a class='stretched-link' href='auth/product/" . strtolower(str_replace(' ', '-', $row['prod_name'])) . ".php'></a>
                
                    <form action='auth/addCartAction.php' method='post'>
                      <input type='hidden' name='cart' value='" . $row['prod_name'] . "'>
                      <input type='hidden' name='quantity' value='1'>
                      <input type='hidden' name='uploader' value='" . $row['uploader'] . "'>
                      <button type='submit' class='btn  shop-cart text-center' id='add-to-cart-btn' style='position: absolute;
                      bottom: 40px;
                      right: 30px;'>
                        <i class='fal fa-shopping-cart'></i>
                      </button>
                    </form>
                    
                
                </h4>

            </div>
        </div>

        ";
      }

      echo '</div>';
      ?>




    </div>
  </section>

  <section class="footer" style="overflow-x: hidden;">
    <footer class="bg-dark">
      <div class="container" style="color: white;">
        <div class="row">
          <div class="col-lg-4 col-md-6 banner mt-4">
            <img src="auth\images\banner.svg" alt="banner">
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
                    <a href="auth/contact.php">Contact us</a>
                  </li>
                  <li>
                    <a href="auth/about.html">About Us</a>
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
      </div>
      </div>
    </footer>
  </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="script.js"></script>



</body>

</html>