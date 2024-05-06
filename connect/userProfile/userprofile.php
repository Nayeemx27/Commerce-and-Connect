<?php

 session_start();
 include '../config/config.php';
 
 $id = $_GET['id']; 
 
 $FetchQuery = "SELECT * FROM `userinfo` WHERE  `id` ='$id'";
 $alldata = mysqli_query($conn,$FetchQuery);
 $arraydata = mysqli_fetch_array($alldata);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="icon" type="image/x-icon" href="<?php echo $arraydata['image']?>">
    <script src="https://kit.fontawesome.com/c68b4388d9.js" crossorigin="anonymous"></script>
    <link rel="icon" href="/img/GMAN.png">
    <title><?php echo $arraydata['username']?>'s profile</title>
</head> 
<body style="background-color: #eee;">

<section style="background-color: #eee;">
  <div class="container py-5">
   
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <img width ="100px" id="selectedImage" src="<?php echo $arraydata['image']?>"  alt="">
            <h3 class="my-3 p-3"><?php echo $arraydata['username']?></h3>
            <!-- <p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">Sylhet,Bangladesh</p> -->
            
          </div>
        </div>
        <div class="card mb-4 col-sm-12 col-md-12 col-lg-12">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0"><a href="<?php echo $arraydata['git']?>" class="text-decoration-none">Visit </a></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-linkedin fa-lg " style="color: #1974D2;"></i>
                <p class="mb-0"><a href="<?php echo $arraydata['linkedn']?>" class="text-decoration-none">Visit </a></p>
              </li>
              
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0"><a href="<?php echo $arraydata['fb']?>" class="text-decoration-none">Visit </a></p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Name</p>
              </div>
              <div class="col-sm-9">
              <input  name="name" type="text" class="border-none form-control"value ="<?php echo $arraydata['username']?>" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
              <input  name="name" type="text" class="border-none form-control"value ="<?php echo $arraydata['email']?>" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
              <input  name="name" type="text" class="border-none form-control"value ="<?php echo $arraydata['mobile']?>" disabled>
              </div>
            </div>
            <hr>
            
           
            <!-- <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">We dont need your address :-</p>
              </div>
            </div> -->
          </div>
        </div>
      </dvi> 
      
  </div>
</section>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
