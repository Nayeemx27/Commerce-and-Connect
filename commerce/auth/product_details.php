<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Born to Code</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link href="style.css" rel="stylesheet" type="text/css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

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

    nav {
      max-height: 10vh;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><img src="images/logo.png" style="height: 50px; width: 50pox" alt="" /></a>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/tshirt.jpg" alt="Born 2 code" class="product-img img-fluid" />
            </div>
            <div class="carousel-item">
              <img src="images/tshirt2.jpg" alt="Born 2 code" class="product-img img" />
            </div>
            <div class="carousel-item">
              <img src="images/tshirt3.jpg" alt="Born 2 code" class="product-img img" />
            </div>
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
              <h3 class="mt-4">৳ 8.03</h3>
              <p class="last-price">
                Old Price:
                <span class="text-danger text-decoration-line-through">৳ 10.30</span>
              </p>
            </div>

            <div class="col">
              <div class="product-rating mt-4">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <p class="fw-bold text-dark p-2">4 reviews</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 px-5">
        <h2>Born To Code Tshirt Forced To Work Tee Science Humor Shirt</h2>
        <p class="text-muted">Category: T-shirt</p>

        <p>Reference: M9280UZWS_M900</p>

        <p class="text-break" style="text-align: justify">
          Introducing our hilarious and witty "Born To Code Tshirt, Forced To
          Work Tee"! If you're a proud coding enthusiast or a computer science
          lover, this is the perfect shirt to showcase your passion with a
          touch of humor.
        </p>

        <div class="mb-3 d-flex flex-row justify-content-between align-items-center">
          <span>Quantity:</span>
          <input type="number" id="quantity" class="form-control" value="1" min="1" style="width: 150px; text-align: center; font-weight: bold" />
        </div>

        <div class="text-center w-100">
          <a href="#" class="btn btn-primary mt-4 mb-5 p-3 w-50 d-inline-block">Add to Cart</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Review Section -->
  <div class="container mt-5 reviews">
    <div class="details">
      <h2 class="mb-4 text-center">Reviews</h2>
      <div class="row">
        <div class="col-lg-1 me-3">
          <img src="images/log-pfp.png" alt="" style="
                height: 80px;
                width: 80px;
                border-radius: 50%;
                border: 1px solid black;
              " />
        </div>

        <div class="col-lg-10">
          <p class="mb-0">Tamin Ahmed</p>
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <p class="fw-light text-dark p-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
              ipsam, quae voluptatibus reprehenderit ullam nobis quod saepe
              esse magni architecto asperiores qui laboriosam eveniet rerum
              laudantium nihil. Repellendus harum unde aspernatur fugit
              blanditiis reiciendis?
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-1 me-3">
          <img src="images/log-pfp.png" alt="" style="
                height: 80px;
                width: 80px;
                border-radius: 50%;
                border: 1px solid black;
              " />
        </div>

        <div class="col-lg-10">
          <p class="mb-0">Tamin Ahmed</p>
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt checked"></i>
            <p class="fw-light text-dark p-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
              ipsam, quae voluptatibus reprehenderit ullam nobis quod saepe
              esse magni architecto asperiores qui laboriosam eveniet rerum
              laudantium nihil. Repellendus harum unde aspernatur fugit
              blanditiis reiciendis?
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-1 me-3">
          <img src="images/log-pfp.png" alt="" style="
                height: 80px;
                width: 80px;
                border-radius: 50%;
                border: 1px solid black;
              " />
        </div>

        <div class="col-lg-10">
          <p class="mb-0">Tamin Ahmed</p>
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <p class="fw-light text-dark p-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
              ipsam, quae voluptatibus reprehenderit ullam nobis quod saepe
              esse magni architecto asperiores qui laboriosam eveniet rerum
              laudantium nihil. Repellendus harum unde aspernatur fugit
              blanditiis reiciendis?
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-1 me-3">
          <img src="images/log-pfp.png" alt="" style="
                height: 80px;
                width: 80px;
                border-radius: 50%;
                border: 1px solid black;
              " />
        </div>

        <div class="col-lg-10">
          <p class="mb-0">Tamin Ahmed</p>
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <p class="fw-light text-dark p-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
              ipsam, quae voluptatibus reprehenderit ullam nobis quod saepe
              esse magni architecto asperiores qui laboriosam eveniet rerum
              laudantium nihil. Repellendus harum unde aspernatur fugit
              blanditiis reiciendis?
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <h2 class="text-center">Related Products</h2>
    <div class="row related-products-section">
      <div class="col-md-4">
        <div class="product-card">
          <h2>Product 1</h2>
          <p>Description of Product 1</p>
          <a href="#" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-card">
          <h2>Product 2</h2>
          <p>Description of Product 2</p>
          <a href="#" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-card">
          <h2>Product 3</h2>
          <p>Description of Product 3</p>
          <a href="#" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-light text-center p-3 mt-5">
    <p>&copy; 2023 Floral Wish. All rights reserved.</p>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

  <script src="script.js"></script>
</body>

</html>