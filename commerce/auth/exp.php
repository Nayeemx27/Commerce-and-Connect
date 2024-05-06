<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cart</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />

</head>

<body>
  <?php
    include 'config.php';

    $select_query = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $select_query);

    while ($row = mysqli_fetch_assoc($result)) {
      $imgData = explode("/", $row['img']);
      $imageName = end($imgData);
      echo "
      <div class='card text-dark bg-light mb-4 shadow' style='max-width: 18rem'>
        <img src='proimg/" . $imageName . "' class='card-img-top img-fluid' alt='" . $row['prod_name'] . "' />
        <div class='card-body'>
          <h5 class='card-title'>" . $row['prod_name'] . "</h5>
          <small class='text-muted'>Category: " . $row['catagory'] . "</small>
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
            <button onclick='addCart(\"" . $row['prod_name'] . "\")' id='addToCart-btn' class='customized-btn-one p-2'>add to cart</button>
            <button onclick='gotoDetails(\"" . $row['prod_name'] . "\")' id='details-btn' class='customized-btn-two p-2'>Details</button>
          </div>
        </div>
      </div>
      ";
    }
  ?>


<?php
    include 'config.php';

    $select_query = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $select_query);

    echo '<div class="d-flex flex-wrap parent">';

    while ($row = mysqli_fetch_assoc($result)) {
        $imgData = explode("/", $row['img']);
        $imageName = end($imgData);
        echo '
        <div class="card text-dark bg-light mb-4 shadow" style="max-width: 18rem; width: 100%;">
            <img src="proimg/' . $imageName . '" class="card-img-top img-fluid" alt="' . $row['prod_name'] . '" style="height: 100%; object-fit: cover;">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">' . $row['prod_name'] . '</h5>
                <h4 class="card-text">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star unchecked"></span><br />
                    <p class="price mt-2">৳ ' . $row['price'] . '</p>
                    <div class="card-details">
                        <a class="stretched-link" href="../project/product/' . $row['prod_name'] . '.php"></a>
                        <a class="shop-cart text-center" href="../project/cart.php"><i class="fal fa-shopping-cart"></i></a>
                    </div>
                </h4>
            </div>
        </div>
        ';
    }

    echo '</div>';
?>



</body>

</html>
