<?php

session_start();

$isLoggedIn = isset($_SESSION['email']);

$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="icon" type="image/x-icon" href="images/fav.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../commonDesign.css">

    <style>
        * {
            background-color: rgb(0, 20, 20);
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            margin-left: 5px;
        }

        label,
        h2 {
            color: aliceblue;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="cotainer">

        <h2 class="text-center mt-5">Admin Panel - Upload Product</h2>
        <div class="hr">
        </div>
        <form action="uploadAction.php" method="post" enctype="multipart/form-data">

            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product-name">Product Name:</label>
                        <input type="text" class="form-control" name="pname" id="product-name" required />
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">Select a category</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Instruments">Instruments</option>
                            <option value="Electronics">Electronics</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <input type="text" class="form-control" name="rating" id="rating" required />
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <select class="form-control" name="stock" id="stock" required>
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price" id="price" required />
                    </div>
                    <div class="form-group">
                        <label for="old-price">Old Price:</label>
                        <input type="text" class="form-control" name="oprice" id="old-price" required />
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" name="image" id="image" required />
                    </div>

                    <input type="hidden" name="uploader" value="<?php echo $username ?>">

                    <div class="text-center mt-5 mx-5 ">
                        <button type="submit" class="btn btn-primary w-100 d-block">Upload Product</button>
                    </div>


                </div>
            </div>
        </form>
        <p><br></p>
    </div>
</body>

</html>