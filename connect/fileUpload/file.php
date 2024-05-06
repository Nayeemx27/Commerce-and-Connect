<?php
include '../config/config.php';
include '../session/sessionfile.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/c68b4388d9.js" crossorigin="anonymous"></script>
  <!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM Plex Mono">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/file.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="icon" type="image/x-icon" href="../img/c.png">
  <title>File Upload</title>
</head>

<body>

  <div class="container"></div>
  <div class="container-fluid bg-youtube text-light py-3">
    <header class="text-center">
      <h1 class="font-IBM">FILE SHARE</h1>
    </header>
  </div>
  <!-- card -->
  <div class="container px-5">
    <div class="row mt-4">
      <div class="col-sm-6 col-lg-6">
        <div class="card card-border">
          <div class="card-body">
            <h5 class="card-title ms-4 padding-text">Share Your Files here</h5>
            <p class="card-text ms-4 padding-text">Please upload only your course related files, otherwise your files
              not approved.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-6">
        <div class="card card-border">
          <div class="card-body">
            <img class="img-fluid img-size" src="../img/fileupload.jpg" alt="img">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- card end -->
  <section class="container col-lg-6  bg-clr w-70 text-light p-5 rounded-3">
    <form class="row g-3 mx-3" action="../fileUpload/uploadfile.php" method="post" enctype="multipart/form-data">
      <!-- course name -->
      <div class="col-md-4">
        <label class="form-label">Course name</label>
        <input type="text" name="CourseName" class="form-control" id="CourseName" required>
      </div>
      <!-- course Teacher -->
      <div class="col-md-4 ">
        <label class="form-label">Course Teacher</label>
        <select id="CourseTeacher" name="CourseTeacher" class="form-select">
          <option selected>Choose...</option>
          <option>RMS</option>
          <option>SKB</option>
          <option>SAB</option>
          <option>EBH</option>
          <option>RLP</option>
          <option>KJH</option>
          <option>AHQ</option>
          <option>SRK</option>
          <option>STA</option>
          <option>PRB</option>
          <option>JIM</option>
          <option>MSR</option>
          <option>MJR</option>
          <option>AFZ</option>
          <option>SAZ</option>
          <option>SMD</option>
        </select>
      </div>

      <!-- course title -->
      <div class="col-md-4 ">
        <label class="form-label">Course Code</label>
        <select id="CourseTitle" name="CourseTitle" class="form-select">
          <option selected>Choose...</option>
          <option>CSE-1101</option>
          <option>CSE-1102</option>
          <option>CSE-1151</option>
          <option>CSE-1211</option>
          <option>CSE-1212</option>
          <option>CSE-2111</option>
          <option>CSE-2112</option>
          <option>CSE-2211</option>
          <option>CSE-2212</option>
          <option>CSE-2201</option>
          <option>CSE-2231</option>
          <option>CSE-2221</option>
          <option>CSE-2222</option>
          <option>CSE-2213</option>
          <option>CSE-2319</option>
          <option>CSE-2320</option>
          <option>CSE-3111</option>
          <option>CSE-3112</option>
          <option>CSE-3211</option>
          <option>CSE-3117</option>
          <option>CSE-3227</option>
          <option>CSE-1102</option>
          <option>CSE-3319</option>
          <option>CSE-3320</option>
          <option>CSE-4111</option>
          <option>CSE-4113</option>
          <option>CSE-4114</option>
          <option>CSE-4211</option>
          <option>CSE-4212</option>
          <option>CSE-4315</option>
          <option>CSE-3315</option>
          <option>CSE-3316</option>
          <option>CSE-3213</option>
          <option>CSE-3214</option>
        </select>
      </div>
      <!-- File name -->
      <div class="col-md-4 ">
        <label for="inputAddress" class="form-label">File Title</label>
        <input type="text" name="title" class="form-control" id="FileTitle" required>
      </div>

      <!-- File -->
      <div class="col-md-4  ">
        <label for="inputCity" class="form-label">File</label>
        <input type="file" name="File" class="form-control" id="File" required>
      </div>

      <!-- upload btn -->
      <div class="col-12">
        <button type="submit" name="submit" class="btn btn-primary mt-2 ">Upload</button>
      </div>
    </form>
  </section>


  <div class="margin-bottom"></div>

  <footer class="text-center text-lg-start bg-dark text-muted">

    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
   
      <div class="me-5 d-none d-lg-block text-white">
        <span>Get connected with us on social networks:</span>
      </div>

      <div>
        <a href="#" class="me-4 text-reset">
          <i class="fab fa-facebook  text-primary"></i>
        </a>

        <a href="#" class="me-4 text-reset">
          <i class="fab fa-linkedin text-primary"></i>
        </a>
        <!-- <a href="#" class="me-4 text-reset">
              <i class="fab fa-github"></i>
            </a> -->
      </div>

    </section>



    <section class="">
      <div class="container text-center text-md-start mt-5">

        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <img class="img-fluid  ms-2" src="../img/c.png" alt="" width="70" height="50">
            <p class="text-white">
              Connect with us
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-3 ">

            <h6 id="contact" class="text-uppercase  text-white fw-bold ">Contact</h6>
            <hr>
            <p class="text-white"><i class="fas fa-map-marked me-3"></i>Sylhet,Bangladesh</p>
            <p class=" text-white">
              <i class="fas fa-envelope me-3  text-white"></i>
              gshare@gshare.com
            </p>
            <p class=" text-white"><i class="fas fa-phone me-3  text-white"></i> +880178901233</p>
          </div>

        </div>

      </div>
    </section>
    <!-- Copyright -->
    <div class="text-center py-4 copyright text-white">
      © 2023 Copyright:
      <a class="text-reset fw-bold text-decoration-none" href="../Home/Landingpage.php">Commerce and Connect</a>
    </div>
    <!-- Copyright -->
  </footer>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>