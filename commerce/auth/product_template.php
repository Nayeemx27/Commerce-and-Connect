<?php
include '../backend/config.php';
$fetchQuery = "SELECT * FROM `products` WHERE `prod_name` = '%PRODUCT_NAME%'";

$randomQuery = "SELECT * FROM products WHERE category = '%CATEGORY_NAME%' ORDER BY RAND() LIMIT 3";

$allData = mysqli_query($conn, $fetchQuery);
$arrData = mysqli_fetch_array($allData);
$imgData = explode(", ", $arrData['img']);

$randomFetch = mysqli_query($conn, $randomQuery);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $arrData['prod_name']; ?> | Floral Wish</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../css/prod_details.css" rel="stylesheet" type="text/css" />
    <link href="../css/navbar.css" rel="stylesheet" type="text/css" />
    <link href="../css/cart.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
        <div class="container">
            <a href="#" data-text="Awesome" class="button navbar-brand">
                <span class="actual-text">&nbsp;FloralWish&nbsp;</span>
                <span class="hover-text" aria-hidden="true">&nbsp;FloralWish&nbsp;</span>
            </a>
        </div>
    </nav> -->

    <?php require '../components/navbar.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner p-auto">

                        <div class="carousel-item active">
                            <img src="../assets/prod_img/<?php echo "$imgData[0]" ?>" alt="<?php echo "$imgData[0]" ?>" class="product-img img img-thumbnail">
                        </div>

                        <?php

                        for ($i = 1; $i < count($imgData); $i++) {
                            echo "<div class='carousel-item'>
              <img src='../assets/prod_img/$imgData[$i]' alt='" . $arrData['prod_name'] . "' class='product-img img img-thumbnail'>
            </div>";
                        }
                        ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6 px-5">
                <h1><?php echo $arrData['prod_name']; ?></h1>
                <p class="text-muted">Category: <?php echo $arrData['category']; ?></p>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="fw-bold text-dark">&nbsp;&nbsp;<?php echo $arrData['rating']; ?></span>
                </div>
                <ul class="my-3">
                    <li>Available: <span class="fw-bold"><?php echo $arrData['stock']; ?></span></li>
                    <li>Shipping Fee: <span class="fw-bold">Free</span></li>
                </ul>
                <p class="text-break" style="text-align: justify;"><?php echo $arrData['description']; ?></p>

                <h3>৳ <?php echo $arrData['price']; ?></h3>
                <p class="last-price">Old Price: <span class="text-danger text-decoration-line-through">৳ <?php echo $arrData['old_price']; ?></span></p>
                <form action="../addCartAction.php" method="post">
                    <input type="hidden" name="cartid" value="<?php echo $arrData['prod_name']; ?>">
                    <div class="mb-3 d-flex flex-row justify-content-between align-items-center">
                        <span>Quantity:</span>
                        <input type="number" name="quantity" class="form-control" value="1" min="1" style="width:150px;text-align: center;font-weight: bold;">
                    </div>

                    <div class="text-center w-100 d-flex">
                        <!-- <a href="#" class="btn btn-primary mt-4 mb-5 p-3 w-50 d-inline-block">Add to Cart</a> -->
                        <button type="submit" class="cssbuttons-io-button mx-auto"> Add to Cart<div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Review Section -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Customer Reviews</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3 text-bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Sabrina</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a lorem at purus rutrum
                            finibus id id ante. Integer feugiat scelerisque erat nec commodo.</p>
                        <p class="card-text"><small class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <!-- <i class="fas fa-star-half-alt"></i> -->
                                <span class="fw-bold text-light">&nbsp;&nbsp;4 Stars</span>
                            </small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 text-dark" style="background-color: #f6fd9b;">
                    <div class="card-body">
                        <h5 class="card-title">Quddus</h5>
                        <p class="card-text">Sed eleifend metus et nulla dignissim, ac fermentum lectus mollis. Vestibulum ante
                            ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
                        <p class="card-text"><small class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="fw-bold text-dark">&nbsp;&nbsp;5 Stars</span>
                            </small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3 border-dark">
                    <div class="card-body p-3">
                        <h5 class="card-title">Joshim</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a lorem at purus rutrum
                            finibus id id ante. Integer feugiat scelerisque erat nec commodo.</p>
                        <p class="card-text"><small class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="fw-bold text-dark">&nbsp;&nbsp;5 Stars</span>
                            </small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 border-dark" style="background-color: #dfe6e9;">
                    <div class="card-body p-3">
                        <h5 class="card-title">Selim</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a lorem at purus rutrum
                            finibus id id ante. Integer feugiat scelerisque erat nec commodo.</p>
                        <p class="card-text"><small class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="fw-bold text-dark">&nbsp;&nbsp;5 Stars</span>
                            </small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Related Products</h2>
        <div class="row related-products-section">
            <?php

            while ($row = mysqli_fetch_array($randomFetch)) {
                $imgData = explode(", ", $row['img']);
                echo "<div class='col-md-4'>
        <div class='card text-dark bg-light mb-4 shadow' style='max-width: 18rem'>
          <img src='../assets/prod_img/$imgData[0]' class='card-img-top img-fluid' alt='" . $row['prod_name'] . "' />
          <div class='card-body'>
            <h5 class='card-title'>" . $row['prod_name'] . "</h5>
            <small class='text-muted'>Category: " . $row['category'] . "</small>
            <div style='color: gold;font-size: 12px;'>
              <i class='fas fa-star'></i>
              <i class='fas fa-star'></i>
              <i class='fas fa-star'></i>
              <i class='fas fa-star'></i>
              <i class='fas fa-star-half-alt'></i>
              <span class='fw-bold text-dark'>&nbsp;&nbsp;" . $row['rating'] . "</span>
            </div>
            <p class='price pt-3'>৳ " . $row['price'] . "</p>
            <div class='card-footer d-flex justify-content-between'>
              <form method='post' action='../addCartAction.php'>
              <input type='hidden' name='quantity' value='1'>
              <input type='hidden' name='cartid' value='" . $row['prod_name'] . "'>
              <button id='addToCart-btn' class='customized-btn-one p-2' type='submit'>add to
              cart</button></form>
                <button onclick='gotoDetails(\"" . $row['prod_name'] . "\")' id='details-btn' class='customized-btn-two p-2'>Details</button>
            </div>
          </div>
        </div>
      </div>";
            }

            // gotoDetails('" . $row['prod_name'] . "')

            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5 bg-dark text-light" id="footer">
        <div class="container py-5">
            <div class="row mt-3">
                <div class="col-lg-5 col-md-6">
                    <h5 class="mb-3">About Us</h5>
                    <p class="text-break text-light" style="text-align: justify;">
                        Your premier destination for enchanting flower and fruit plants, catering to sellers who seek nature's
                        beauty to enhance their offerings. Explore our diverse collection and let your customers' wishes bloom.
                    </p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="mb-3">Download</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" style="text-decoration: none;"><i class="fab fa-apple"></i> Get it on App Store</a>
                        </li>
                        <li>
                            <a href="#" style="text-decoration: none;"><i class="fab fa-google-play"></i> Get it on Google Play</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="mb-3">Customer Care</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="text-decoration: none;">FAQs</a></li>
                        <li><a href="#" style="text-decoration: none;">Refund Policy</a></li>
                        <li><a href="#" style="text-decoration: none;">Track Your Order</a></li>
                        <li><a href="#" style="text-decoration: none;">Teams & Conditions</a></li>
                        <li><a href="#" style="text-decoration: none;">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h5 class="mb-3">Contact</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone mb-3"></i>&nbsp;&nbsp;+8801887359066</li>
                        <li><i class="fas fa-envelope mb-3"></i>&nbsp;&nbsp;floralwish@gmail.com</li>
                        <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Pirmoholla, Sylhet, Bangladesh
                        </li>

                    </ul>
                </div>
            </div>
            <br />

            <p class="text-center">&copy;&nbsp;Floral Wish. All Rights Reserved. 2023.</p>

        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


    <script src="../js/prod_details.js"></script>

</body>

</html>