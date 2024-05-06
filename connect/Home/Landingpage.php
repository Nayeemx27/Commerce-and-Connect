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
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script src="https://kit.fontawesome.com/c68b4388d9.js" crossorigin="anonymous"></script>
      <link rel="icon" type="image/x-icon" href="../img/c.png">
      <link rel="stylesheet" href="../css/bootstrap.min.css"/>
      <link rel="stylesheet" href="../css/index.css"/>
      <title>Commerce and Connect</title>
   </head>
   <body>
      <div class="container">
      <!-- new header -->
      <header>
         <!-- nav bar and modal with login form -->
         <div class="row">
            <div class="col">
               <nav class="navbar  navbar-expand-lg">
                  <div class="container-fluid ">
                     <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                     <img class="img-fluid  me-auto" src="../img/c.png" alt="" width="70" height="50">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0  ">
                           <!-- <li class="nav-item ">
                              <a class="nav-link active hv" aria-current="page" href="#">Home</a>
                           </li> -->
                           <li class="nav-item">
                              <a class="nav-link hv " href="../fileUpload/material.php">Files</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link hv " href="../community/communityPost.php">Community</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link hv " href="../../engage/clubs/landing.php">Engage</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link hv " href="../../commerce/index.php">Commerce</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link hv" href="#contact">Contact</a>
                           </li>
                           <li>
                              <div class="dropdown">
                                 <button class="btn btn-default " type="button" id="menu1" data-toggle="dropdown">
                                 <img  class="rounded-circle ms-2"  id="selectedImage" src="<?php echo $arraydata['image']?>"  alt="" style="height: 2rem; width: 2rem; display: block; margin: 0 auto; text-align: center;">
                                
                                 </button>
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li id="bg"><span class="ms-3 pb-3"><i class="fa-regular fa-user pb-3"></i></span><a role="menuitem"  class="text-decoration-none text-black ps-3 mb-2" href="../userProfile/profilepage.php">Profile</a></li>
                                    <li id="bg"><span class="ms-3 pb-3"><i class="fa fa-dice-six pb-3"></i></span><a role="menuitem" class="text-decoration-none text-black ps-3 mb-2" href="../userProfile/userDashboard.php">Dashboard</a></li>
                                    <li id="bg"><span class="ms-3 pb-3"><i class="fa-solid fa-arrow-right-from-bracket"></i></span><a role="menuitem"  class="text-decoration-none text-black ps-3" href="logout.php">logout</a></li>
                                 
                                 </ul>
                              </div>
                           </li>
                        </ul>
                        <!-- modal with login form pop up -->
                        <!-- modal login form end -->
                     </div>
                  </div>
               </nav>
            </div>
            <div class="row mb-4">
               <div class="col ">
                  <h3 class="ms-5 text-black pt-5">SHARE </h3>
                  <p class="ms-5 text-black">A sharing website wheres you can find all of your stuff.<br>To contribute just click on the button</p>
                  <a href="../fileUpload/file.php" class="btn btn-outline-dark ms-5" id="shareBtn">Get Started</a>
               </div>
               <div class="col pe-1">
                  <img class="w-100" src="../img/students.png" alt="">
               </div>
            </div>
         </div>
      </header>
      <!-- slider -->
      <div
         id="carouselExample"
         class="carousel slide  p-5">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row mt-5">
                  <div
                     class="col-12 col-md-6 d-flex justify-content-center align-items-center"
                     >
                     <div>
                        <h1>Share Course Materials</h1>
                        <p>
                        You will find a wide range of resources to support your learning journey. 
                          Whether you are a student, educator, or lifelong learner, we have something for everyone. 
                          Our platform aims to facilitate the exchange of knowledge and foster collaborative learning.
                        </p>
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <img
                        src="../img/coursemat.jpg"
                        class="d-block w-100 rounded-3"
                        alt="..."
                        />
                  </div>
               </div>
            </div>
            <div class="carousel-item"  data-mdb-interval="2000">
               <div class="row mt-5">
                  <div
                     class="col-12 col-md-6 d-flex justify-content-center align-items-center"
                     >
                     <div>
                        <h1>Share All type of Docs</h1>
                        <p>
                        Sharing documents, PDFs, and presentations in various formats has become increasingly convenient in today's digital age.
                            Whether you need to collaborate on a project, share information with colleagues, or distribute materials to a wider audience.
                        </p>
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <img
                        src="../img/pdf.jpg"
                        class="d-block w-100 rounded-3"
                        alt="..."
                        />
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row mt-5">
                  <div
                     class="col-12 col-md-6 d-flex justify-content-center align-items-center"
                     >
                     <div>
                        <h1>Join the community</h1>
                        <p>
                        Welcome to our vibrant and inclusive community! Joining our website is the first step towards connecting with like-minded individuals who share
                            your passions and interests. Here, you'll discover a wealth of opportunities to engage, learn, and grow.
                        </p>
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <img
                        src="../img/community.jpg"
                        class="d-block w-100 rounded-3"
                        alt="..."
                        />
                  </div>
               </div>
            </div>
         </div>
         <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="prev"
            >
         <span
            class="carousel-control-prev-icon bg-color-icon"
            aria-hidden="true"
            ></span>
         <span class="visually-hidden">Previous</span>
         </button>
         <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="next"
            >
         <span
            class="carousel-control-next-icon bg-color-icon"
            aria-hidden="true"
            ></span>
         <span class="visually-hidden">Next</span>
         </button>
      </div>
      <!-- </header>  -->
      <!-- mian -->
      <main class="mt-5 col-12">
         <section class="text-start text-md-center">
            <h1 class="fw-bold mt-5">The Ultimate Solution</h1>
            <p class="text-danger">o</p>
            <hr class="w-25 mx-auto border-danger" />
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1">
               <div class="col">
                  <img class="imgsize" src="../img/fileupload.jpg" alt="" />
               </div>
            </div>
         </section>
         <!-- ask q -->
         <section class="py-5 mt-5 py-5 px-5">
            <h1 class="text-center my-5">Frequently asked <span class="text-warning">question</span></h1>
            <div class="row row-cols-1 row-cols-md-2">
               <div class="col">
                  <img class="img-fluid h-50 ms-5" src="../img/question.png" alt="">
               </div>
               <div class="col">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                     <div class="accordion-item">
                        <h2 class="accordion-header">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                              data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                           Why we need this website?
                           </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">Access to a Wide Range of Course Materials: Our website serves as a hub where educators can upload and share their
                                course materials, including lecture notes, presentations, study guides, and practice exercises. Students can easily access these resources,
                                 supplementing their learning and gaining a deeper understanding of the subject matter.
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                              data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Is the platform Connect us with community?
                           </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">By connecting the community of learners and educators, our website facilitates collaboration and knowledge exchange. 
                               Students can engage in discussions, ask questions, and seek clarification from both their peers and instructors. 
                               This interactive learning environment enhances comprehension and fosters critical thinking skills.
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </div>
         </section>
      </main>
      </div>
      <!-- Footer -->
      <footer class="text-center text-lg-start bg-dark text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        
          <div class="me-5 d-none d-lg-block text-white">
            <span>Get connected with us on social networks:</span>
          </div>
      
          <div>
            <a href="#" class="in text-reset">
             <img class="in" src="../img/in.png"  alt="">
            </a>
           
            <a href="#" class=" text-reset">
            <img class="in" src="../img/fb.png"  alt="">
            </a>
            <!-- <a href="#" class="me-4 text-reset">
              <i class="fab fa-github"></i>
            </a> -->
          </div>
          <!-- Right -->
        </section>
        
        <section class="">
          <div class="container text-center text-md-start mt-5">
          
            <div class="row mt-3">
          
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <img class="img-fluid  ms-3" src="../img/c.png" alt="" width="70" height="50">
                <p class="text-white">
                 Connect with Us
                </p>
              </div>
      
              
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-3 ">
               
                <h6 id="contact" class="text-uppercase  text-white fw-bold ">Contact</h6>
                <hr>
                <p class="text-white"><i class="fas fa-map-marked me-3"></i>Sylhet,Bangladesh</p>
                <p class=" text-white">
                  <i class="fas fa-envelope me-3  text-white"></i>
                  gshare@gmail..com
                </p>
                <p class=" text-white"><i class="fas fa-phone me-3  text-white"></i> +880178901233</p>
              </div>
             
            </div>
          </div>
        </section>
        <div class="text-center py-4 copyright text-white" >
          © 2023 Copyright:
          <a class="text-reset fw-bold text-decoration-none" href="../Home/Landingpage.php">Commerce and Connect</a>
        </div>
      </footer>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="../js/bootstrap.min.js"></script>
   </body>
</html>
