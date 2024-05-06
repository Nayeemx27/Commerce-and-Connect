<?php
session_start();

$isLoggedIn = isset($_SESSION['username']);
$userName = '';

include '../config.php';
$fetchQuery = "SELECT * FROM `products` WHERE  `prod_name` = 'Women Premium Tee - Scarlet'";
$allData = mysqli_query($conn, $fetchQuery);
$row = mysqli_fetch_assoc($allData);
$imageName = $row['img'];
$prod_name = $row['prod_name'];
$category = $row['catagory'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $row['prod_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../commonDesign.css">

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
        img {
            width: 100%;
            display: block;
        }

        .product-img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .carousel-item {
            position: relative;
            height: 450px;
        }

        .product-rating {
            color: gold;
        }

        .related-products-section {
            margin-top: 50px;
        }


        .stars label {
            font-size: 36px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .stars label:hover,
        .stars label.selected {
            color: #ffc107;
        }

        .user-image {
            height: 44px;
            width: 44px;
            font-size: 44px;
            border-radius: 50%;
            border: 1px;
        }

        .shop-cart {
            z-index: 69;
        }

        .log {
            width: 85px;
        }

        .navbar {
            height: 100px;
        }

        .freature {

            justify-content: center;
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

        .size-btn {
            margin-right: 10px;
            border-radius: 0;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand mx-4" href="../../index.php">
                <img src="../../images/logo-color.png" alt="" class="circular" style="width: 180px; height: 60px" />
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
                            <a href="../dashboard.php" class="nav-link text-danger d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                        </div>
                    </li>';
                    } elseif (isset($_SESSION['seller'])) {
                        echo '
                    <li class="nav-item">
                        <a href="../dashboard.php" class="nav-link text-primary d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                    </li>';
                    } elseif (isset($_SESSION['manager'])) {
                        echo '
                    <li class="nav-item">
                        <a href="../dashboard.php" class="nav-link text-info d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
                    </li>';
                    } elseif (isset($_SESSION['buyer'])) {
                        echo '
                    <li class="nav-item">
                        <a href="../dashboard.php" class="nav-link text-white d-flex"> <i class="fas fa-user fa-lg me-2"></i> ' . $_SESSION['username'] . '</a>
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
                        <a class="nav-link" href="../cart.php">
                            <i class="fa-solid fa-bag-shopping fa-lg text-white"></i>
                        </a>
                    </li>

                </ul>


            </div>
        </nav>
    </header>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../<?php echo "$imageName" ?>" alt="<?php echo "$imageName" ?>" class="product-img img img-thumbnail">
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="../images/product-img/tshirt5.jpg" alt="Born 2 code" class="product-img img" />
                        </div>
                        <div class="carousel-item">
                            <img src="../images/product-img/tshirt6.jpg" alt="Born 2 code" class="product-img img" />
                        </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                    <div class="row">
                        <div class="col">
                            <h3 class="mt-4">৳ <?php echo $row['price'] ?></h3>
                            <p class="last-price">
                                Old Price:
                                <span class="text-danger text-decoration-line-through">৳ <?php echo $row['old_price'] ?></span>
                            </p>
                        </div>

                        <!-- <div class="col d-block">

                            <div class="text-center">
                                <h2 class="fw-bold text-dark p-4">4 reviews</h2>
                            </div>

                        </div> -->

                    </div>
                </div>
            </div>

            <div class="col-md-6 px-5">
                <h2><?php echo $row['prod_name'] ?>
                </h2>

                <div class="product-rating mt-2">

                    <?php
                    $fetchProd = "SELECT * FROM `products` WHERE `prod_name` = 'Women Premium Tee - Scarlet'";
                    $result = $conn->query($fetchProd);


                    $query = "SELECT rating FROM review WHERE `prod_name` = 'Women Premium Tee - Scarlet'";
                    $resultRate = $conn->query($query);

                    $total_ratings = 0;
                    $total_reviews = 0;

                    while ($rowRate = $resultRate->fetch_assoc()) {
                        $total_ratings += $rowRate['rating'];
                        $total_reviews++;
                    }

                    if ($total_reviews > 0) {
                        $average_rating = $total_ratings / $total_reviews;
                    } else {
                        $average_rating = 0;
                    }

                    if ($result->num_rows > 0) {
                        while ($rowRate = $result->fetch_assoc()) {
                            echo '<div class="product-rating">';
                            $rating = round($average_rating);
                            echo str_repeat('<i class="fas fa-star"></i>', $rating);
                            echo str_repeat('<span class="fa fa-star unchecked"></span>', 5 - $rating);
                            echo ' <span class="text-muted" style="color: black;">(' . number_format($average_rating, 2) . ')</span>';
                            echo '</div>';
                        }
                    }
                    ?>



                </div>



                <p class="text-muted mt-2">Category: <?php echo $category ?></p>

                <p>Reference: <?php echo $row['ref'] ?>
                </p>

                <p class="text-break" style="text-align: justify">
                    <?php echo $row['description'] ?>
                </p>

                <div class="mb-3">
                    <p class="text-muted">Size:</p>
                    <div class="btn-group" role="group" aria-label="Size">
                        <button type="button" class="btn btn-outline-secondary size-btn">M</button>
                        <button type="button" class="btn btn-outline-secondary size-btn">L</button>
                        <button type="button" class="btn btn-outline-secondary size-btn">XL</button>
                        <button type="button" class="btn btn-outline-secondary size-btn">XXL</button>
                    </div>
                </div>

                <div class="mb-3 d-flex flex-row justify-content-between align-items-center">
                    <span>Quantity:</span>
                    <input type="number" id="quantity" class="form-control" value="1" min="1" style="width: 150px; text-align: center; font-weight: bold" />
                </div>

                <div class="text-center w-100 d-block">

                    <form id="addToCartForm" action="../addCartAction.php" method="post">
                        <input type="hidden" id="cartProduct" name="cart" value="<?php echo $row['prod_name']; ?>">
                        <input type="hidden" id="cartUploader" name="uploader" value="<?php echo $row['uploader']; ?>">
                        <input type="hidden" id="cartQuantity" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary mt-4 mb-5 p-3 w-50 d-inline-block" id="buyNowButton">Buy it now</button>
                    </form>
                </div>

                <script>
                    document.getElementById('buyNowButton').addEventListener('click', function(event) {
                        event.preventDefault();
                        var quantity = document.getElementById('quantity').value;
                        document.getElementById('cartQuantity').value = quantity;
                        document.getElementById('addToCartForm').submit();
                    });
                </script>

                <script>
                    document.querySelectorAll('.size-btn').forEach(function(button) {
                        button.addEventListener('click', function() {
                            document.querySelectorAll('.size-btn').forEach(function(btn) {
                                btn.classList.remove('active');
                            });
                            button.classList.add('active');
                        });
                    });
                </script>

            </div>
        </div>
    </div>

    <!-- Review Section -->

    <div class="container mt-5 reviews">
        <div class="details">
            <h2 class="mb-4 text-center">Ratings & Reviews</h2>

            <?php

            $sql = "SELECT * FROM review WHERE `prod_name` = 'Women Premium Tee - Scarlet'";
            $result = mysqli_query($conn, $sql);


            if ($isLoggedIn) {
                $userName = $_SESSION['username'];
            }

            $fetchReg = "SELECT * FROM `register` WHERE db_username='$userName'";
            $allUser = mysqli_query($conn, $fetchReg);
            $userRow = mysqli_fetch_array($allUser);

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="row d-flex">
                        <div class="col-md-auto">
                            <div class="user-img">
                                <?php if (!empty($userRow['image'])) : ?>
                                    <img src="<?php echo '../' . $userRow['image'] ?>" alt="" class="user-image">
                                <?php else : ?>
                                    <i class="fas fa-user-circle user-image"></i>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col">
                            <div class="comment">
                                <p class="mb-0"><?php echo $row["db_username"]; ?></p>
                                <div class="product-rating">
                                    <?php
                                    $rating = round($row["rating"]);
                                    echo str_repeat('<i class="fas fa-star"></i>', $rating);
                                    ?>
                                    <p class="fw-light text-dark mt-2"><?php echo $row["r_desc"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

            <div class="review-submit-div">

                <?php if ($isLoggedIn) : ?>
                    <form action="../submit_review.php" method="post">

                        <input type="hidden" name="prod_name" value='<?php echo $prod_name; ?>'>

                        <input type="hidden" name="db_username" value='<?php echo $_SESSION['username']; ?>'>

                        <div class="px-5">
                            <div class="row py-5 mt-5 px-3 " style="background-color: #f5f6f7;">
                                <div class="row ">
                                    <div class="col-md-auto">
                                        <?php
                                        $userImage = '';
                                        ?>

                                        <?php if (!empty($userRow['image'])) : ?>
                                            <img src="<?php echo '../' . $userRow['image'] ?>" alt="" class="user-image">
                                        <?php else : ?>
                                            <i class="fas fa-user-circle user-image"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <div class="user-info">
                                            <p class="mb-0 fw-bold fs-5"><?php echo $_SESSION['username']; ?></p>
                                        </div>


                                        <div class="rating-section d-flex align-items-center">
                                            <div class="product-rating" onclick="handleRating(event)">
                                                <input type="number" name="rating" id="starRating" class="d-none" required>
                                                <div class="stars">
                                                    <label for="star1" title="1 star" data-value="1">&#9733;</label>
                                                    <label for="star2" title="2 stars" data-value="2">&#9733;</label>
                                                    <label for="star3" title="3 stars" data-value="3">&#9733;</label>
                                                    <label for="star4" title="4 stars" data-value="4">&#9733;</label>
                                                    <label for="star5" title="5 stars" data-value="5">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-section mt-3 d-flex align-items-center">
                                            <textarea name="r_desc" rows="4" class="form-control" placeholder="Write your review here..." required></textarea>
                                        </div>
                                        <div class="submit-button mt-3">
                                            <button type="submit" class="btn btn-primary">Submit Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    </div>





    <?php

    $prodName = $row['prod_name'];

    $relatedProductsQuery = "SELECT * FROM `products` WHERE `catagory` = '$category' AND `prod_name` != '$prodName' ORDER BY RAND() LIMIT 3";

    $relatedProductsResult = mysqli_query($conn, $relatedProductsQuery);


    ?>

    <div class="container mt-5">
        <hr>
        <h2 class="text-center">Similar Products</h2>
        <hr>
        <div class="row related-products-section">
            <?php
            if (mysqli_num_rows($relatedProductsResult) > 0) {
                while ($relatedRow = mysqli_fetch_assoc($relatedProductsResult)) {
            ?>
                    <div class="col-md-4">
                        <div class="card d-flex flex-column text-dark bg-light mb-4 shadow" style="max-width: 15rem; min-width: 15rem;">
                            <img src="../<?php echo $relatedRow['img']; ?>" class="card-img-top img-fluid" alt="<?php echo $relatedRow['prod_name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $relatedRow['prod_name']; ?></h5>
                                <h4 class="card-text">
                                    <?php
                                    $rating = $relatedRow['rating'];
                                    echo str_repeat('<span class="fa fa-star checked"></span>', $rating);
                                    echo str_repeat('<span class="fa fa-star unchecked"></span>', 5 - $rating);
                                    ?>
                                </h4>
                                <p class="price mt-2"><?php echo '৳ ' . $relatedRow['price']; ?> </p>
                                <div class="card-details">
                                    <a class="stretched-link" href="<?php echo strtolower(str_replace(' ', '-', $relatedRow['prod_name'])); ?>.php"></a>
                                    <form action="../addCartAction.php" method="post">
                                        <input type="hidden" name="cart" value="<?php echo $relatedRow['prod_name']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn shop-cart text-center" id="add-to-cart-btn" style="position: absolute; bottom: 40px; right: 30px;">
                                            <i class="fal fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='col text-center'>
                        <p>No Similar product</p>
                    </div>";
            }
            ?>
        </div>
    </div>


    <!-- Footer -->
    <section class="footer mt-5" style=" width: 100%; overflow-x: hidden;">
        <footer class="bg-dark">
            <div class="container" style="color: white;">
                <div class="row">
                    <div class="col-lg-4 col-md-6 banner mt-4">
                        <img src="..\images\banner.svg" alt="banner">
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
                                        <a href="../contact.php">Contact us</a>
                                    </li>
                                    <li>
                                        <a href="../about.html">About Us</a>
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



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <script src="script.js"></script>
    <script>
        function handleRating(event) {
            const stars = document.querySelectorAll('.stars label');
            const ratingInput = document.getElementById('starRating');
            const clickedStar = event.target;

            stars.forEach((star, index) => {
                star.classList.remove('selected');
                if (star === clickedStar || index < clickedStar.dataset.value - 1) {
                    star.classList.add('selected');
                }
            });

            ratingInput.value = clickedStar.dataset.value;
            console.log("Selected Rating: " + clickedStar.dataset.value);
        }
    </script>
</body>

</html>