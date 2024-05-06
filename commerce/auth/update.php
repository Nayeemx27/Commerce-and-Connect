<?php
include 'config.php';
$id = $_GET['id'];
$fetcheQuery = "SELECT `id`, `prod_name`, `catagory`, `rating`, `stock`, `price`, `old_price`, `img` FROM `products` WHERE id='$id'";

$allData = mysqli_query($conn, $fetcheQuery);
$arrayData = mysqli_fetch_array($allData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        .form-group {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center bg-dark p-3 text-light mt-3">Update Product</h2>
        <form action="updateAction.php" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product-name">Product Name:</label>
                        <input required type="text" class="form-control" name="pname" id="product-name" value="<?php echo $arrayData['prod_name'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" name="category" id="category" value="<?php echo $arrayData['catagory'] ?>">
                            <option value="">Select a category</option>
                            <option value="Men Fashion">Men's & Boys' Fashion</option>
                            <option value="Women Fashion">Women's & Girls' Fashion</option>
                            <option value="Health & Beauty">Health & Beauty</option>
                            <option value="Watches Bags Jewellery">Watches, Bags, Jewellery</option>
                            <option value="Mother & Baby">Mother & Baby</option>
                            <option value="Electronics Device">Electronics Device</option>
                            <option value="TV & Home Appliances">TV & Home Appliances</option>
                            <option value="Electronic Accessories">Electronic Accessories</option>
                            <option value="Home & Lifestyle">Home & Lifestyle</option>
                            <option value="Sports & Outdoors">Sports & Outdoors</option>
                            <option value="Automotive & Motorbike">Automotive & Motorbike</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="rating" id="rating" value="<?php echo $arrayData['rating'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <select class="form-control" name="stock" id="stock" value="<?php echo $arrayData['stock'] ?>">
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price" id="price" value="<?php echo $arrayData['price'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="old-price">Old Price:</label>
                        <input type="text" class="form-control" name="oprice" id="old-price" value="<?php echo $arrayData['old_price'] ?>" />
                    </div>


                    <div class="form-group">
                        <label for="img">Image:</label>
                        <input type="file" class="form-control" id="img" name="img" required accept="image/*" multiple>
                    </div>
                    <div class="text-center">
                        <!-- <img id="container" width="150px" src="assets/prod_img/<?php echo $imgData[0] ?>" alt="<?php echo $arrayData['prod_name'] ?>"> -->
                        <img id="container" width="150px" src="<?php echo $arrayData['img'] ?>" alt="<?php echo $arrayData['prod_name'] ?>">

                    </div>

                    <div class="text-center mt-2 ">
                        <button type="submit" class="btn btn-primary w-100 d-block">Update Product</button>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $arrayData['id'] ?>">


                </div>
            </div>
        </form>
        <p><br></p>

        <script>
            document.getElementById('img').addEventListener('change', function(e) {
                var image = document.getElementById('container');
                var file = e.target.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        image.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                }
            });
        </script>

    </div>
</body>

</html>