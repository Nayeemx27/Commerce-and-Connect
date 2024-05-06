<?php
   include '../config/config.php';
   include '../session/sessionfile.php';
   
   
   if(isset( $_SESSION['l_uname'])){
   	$username = $_SESSION['l_uname'];
   	$FetchQuery = ("SELECT  * FROM `userinfo` where username ='$username'");
   	$alldata = mysqli_query($conn,$FetchQuery);
   	$arraydata = mysqli_fetch_array($alldata);
   		
   	 }
   	 else{
   		echo "<script>alert('can't ascess from URL login First')</script>";
   		// echo "<script>location.href='../Home/LandingPage.html'</script>";
   	   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Hire</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <link rel="stylesheet" href="hire.css">
      <style>
         body {
         margin: 0;
         padding: 0;
         height: 1000px;
         overflow-x: hidden;
         }
         nav {
         background-color: transparent;
         }
         nav ul {
         text-align: center;
         padding: 0 100px;
         }
         nav ul a {
         text-decoration: none;
         margin: 0 18px;
         }
         .banner-section {
         background: url('images/default.jpg') no-repeat;
         background-color: rgba(0, 0, 0, 0.9);
         background-size: cover;
         background-position: center;
         text-align: center;
         height: 90vh;
         position: relative;
         }
         .overlay {
         background-color: rgba(0, 0, 0, 0.5);
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         position: relative;
         z-index: 1;
         padding: 25px 17px;
         }
         .textBox{
         border-radius: 10px;
         border: 2px;
         height: 55px;
         width: 75%;
         box-shadow: 10px 20px 80px 15px rgb(0, 0, 0);
         /* overflow: hidden;  */
         background-color: #e9e9e9;
         color: rgb(237, 232, 232);
         }
         button {
         border-radius: 10px;
         overflow: hidden;
         height: 50px;
         width: 100px;
         font-size: large;
         font-weight: 100px;
         color: white;
         font-size: 20px;
         font-weight: 60px;
         border: none;
         transition-duration: 0.4s;
         display: inline-block;
         }
         button:hover {
         background-color: #e9e9e9;
         color: #e9e9e9;
         }
         .btn {
         border: 2px solid rgb(238, 238, 44);
         color: rgb(238, 238, 44);
         }
         .card {
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
         transition: 0.3s;
         width: 20%;
         margin: auto;
         border: 2px solid white;
         }
         .card:hover {
         box-shadow: 0 8px 16px 5px rgba(0, 0, 0, 0.5);
         }
         img {
         position: relative;
         }
         .card-subtitle {
         position: absolute;
         color: white;
         bottom: 20px;
         z-index: 1;
         padding: 4%;
         margin-left: 31%;
         }
         .categories-section {
         width: 85%;
         margin: auto;
         }
         nav {
         position: sticky;
         }
         .choose{
         display: flex;
         flex-direction: row;
         justify-content: center;
         align-items: center;
         }
         @media screen and (min-width: 200px) {
         .image-class{
         height: 40px;
         width: 40px;
         }
         }
         @media screen and (max-width: 1100px) {
         .media-btn{
         margin-top: 20px;
         width: 40%;
         }
         }
      </style>
   </head>
   <body>
    
      <div class="banner-section">
         <div class="overlay">
            <nav class="navbar navbar-inverse fixed-top navbar-expand-lg navbar-light py-3">
               <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                     aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="#"
                              style="color: rgb(179, 179, 63);">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#" style="color: rgb(179, 179, 63);">Profile</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#" style="color: rgb(179, 179, 63);">More</a>
                        </li>
                     </ul>
                     <div class="d-flex">
                        <img  class="rounded-circle ms-2"  id="selectedImage" src="<?php echo $arraydata['image']?>"  alt="" style="height: 2rem; width: 2rem; display: block; margin: 0 auto; text-align: center;">
                     </div>
                  </div>
               </div>
            </nav>
            <h1 style="margin-bottom: 40px; margin-top: 150px; font-weight: 100px; color: azure;">Hire Almost
               Anything
            </h1>
            <p style="color: azure;   margin-top: 30px;
               margin-bottom: 50px;"> Take or get hired from any club activities...</p>
            <div class="container-fluid col-md-6">
               <form action="">
                  <!-- <input type="text" class="search-bar" placeholder=" &#128269 Guitarist,vocalist.." >
                     <button class="btn-outline-success bg-success mt-3">Search</button> -->
                  <div class="form">
                     <!-- <form id="searchbar"  method="GET" action="downloadBlob2" enctype="multipart/form-data" > -->
                     <input type="search" class="form-control"  name="objectToSearch" placeholder=" &#128269 Search" method="GET" action="downloadBlob2" enctype="multipart/form-data" />
                     <button type="submit" class="media-btn my-2 btn btn_primary btn-outline-success">Search</button>
                  </div>
               </form>
            </div>
            </form>
         </div>
      </div>
      </div>
      <div class="text-center py-5 " style="background-color: white;">
         <p style="font-size: x-large; font-style: oblique; font-family: Georgia, 'Times New Roman', Times, serif;"> Find
            out <br> Most popular
            categories
         </p>
         <!-- Cards -->
         <div class="row row-cols-1 row-cols-md-3 g-5 categories-section">
            <div class="col">
               <div class="card" style="width: 300px; height: 200px; ">
                  <img src="images/debate-club.jpg" alt=""
                     style="width:50%; z-index: 1; border-radius: 5px; margin-left: 60px;">
                  <h6 class="card-subtitle py-0" style="color: black;font-size: 20px; font-family: Georgia, 'Times New Roman', Times, serif; z-index: 1;">  Debate club</h6>
               </div>
            </div>
            <div class="col">
               <div class="card" style="width: 300px; height: 200px; ">
                  <img src="images/jazz-band-600w-2154913241.jpg" alt=""
                     style="width:90%; z-index: 1; border-radius: 5px; margin-left: 10px;">
                  <h6 class="card-subtitle p-0" style="color: black;font-size: 20px; font-family: Georgia, 'Times New Roman', Times, serif; z-index: 1;">  Music club</h6>
               </div>
            </div>
            <div class="col">
               <div class="card" style="width: 300px; height: 200px; ">
                  <img src="images/baseball-team.jpg" alt="" style="width:70%; z-index: 1;
                     border-radius: 5px;  margin-left: 40px; ">
                  <h6 class="card-subtitle py-0" style="color: black; font-size: 20px; font-family: Georgia, 'Times New Roman', Times, serif; z-index: 1;">  Sports club</h6>
               </div>
            </div>
         </div>
         <div class="container mt-5 col-xl-6">
            <p style="text-align: center; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px;"> Why
               <br> Choose us
            </p>
            <div class="choose">
               <div class="card" style="width: 70px; height: 70px; ">
                  <img src="images/time-icon.jpg" alt="" style="margin-left: 3px; height: 50px; width: 60px;">
                  <h6 class="Saves time" style="font-size: 10px; margin-top: 25px; "> Save your time </h6>
               </div>
               <div class="card" style="width: 70px; height: 70px; ">
                  <img src="images/brand-engage.jpg" alt="" style="margin-left: 3px; height: 50px; width: 60px;" >
                  <h6 class="Saves time" style="font-size: 10px; margin-top: 25px; "> Engage with people </h6>
               </div>
               <div class="card" style="width: 70px; height: 70px; ">
                  <img src="images/help.jpg" alt="" style="margin-left: 3px;margin-top: 3px; height: 50px; width: 60px;">
                  <h6 class="Saves time" style="font-size: 10px; margin-top: 25px; "> Get or take help </h6>
               </div>
            </div>
            <!-- <div class="d-flex flex-wrap">
               <div class="col mt-3 p-3 mx-4">
                   <img class="image-class col-lg-6" src="images/time-icon.jpg" alt="">
               
                   <p class="col-lg-6 mx-5 mt-2">Save Time</p>
               </div>
               <div class="col mt-3 p-3 mx-4">
                   <img class="image-class col-lg-6"  src="images/brand-engage.jpg" alt="">
               
                   <p class="col-lg-6 mx-5 mt-2 px-0">c</p>
               </div>
               <div class="col mt-3 p-3 mx-4">
                   <img class="image-class col-lg-6"  src="images/help.jpg" alt="">
               
                   <p class="col-lg-6 mx-5 mt-2">help your mates</p>
               </div>
               </div> -->
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
         crossorigin="anonymous"></script>
   </body>
</html>