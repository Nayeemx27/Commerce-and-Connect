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
   		echo "<script>location.href='../Home/LandingPage.html'</script>";
   	   }
   	 
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Retrieve form data
       $id = $_POST["id"];
       $name = $_POST["username"];
       $mobile = $_POST["mobile"];
       $fb = $_POST['facebook'];
   	 $linkedn = $_POST['linkedin'];
   	 $git = $_POST['github'];
   
   	  $sql = "UPDATE userinfo SET username='$name', mobile ='$mobile', fb ='$fb', linkedn ='$linkedn',git='$git' WHERE id=$id";
   
       if ($conn->query($sql) === TRUE) {
   		echo "<script>alert('Your Information has been updated')</script>";
   		// echo "<script>location.href='landingpage.php'</script>";
       } else {
           echo "Error updating data: " . $conn->error;
       }
    }
   
   
    
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title><?php echo $_SESSION['l_uname'] ?> | Profile</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <script src="https://kit.fontawesome.com/c68b4388d9.js" crossorigin="anonymous"></script>
      <link rel="icon" type="image/x-icon" href="../img/c.png">
      <link rel="stylesheet" href="../userProfile/profilepage.css">
   </head>
   <body class="bg">
      <section class="pt-5">
         <div class="m-5">
            <!-- <h4 class="mt-5">Profile Page</h4> -->
            <div class="c-bg shadow-lg rounded-lg d-block d-sm-flex mt-5">
               <div class="profile-tab-nav border-right">
                  <div class="p-4">
                     <div class="img-circle text-center mb-3">
                        <img class="mb-2 border border-white rounded-circle" width ="100px" id="selectedImage" src="<?php echo $arraydata['image']?>"  alt="">
                        <h5>
                         <?php
                           echo '<span style="color: white;">'.$_SESSION['l_uname'].'</span>';
                         ?>
                         
                        </h5>
                     </div>
                     <h4 class="text-center"></h4>
                  </div>
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                     <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                     <i class="fa fa-home text-center mr-1"></i> 
                     Account
                     </a>
                     <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                     <i class="fa fa-key text-center mr-1"></i> 
                     Password
                     </a>
                  </div>
               </div>
               <div class="tab-content p-4 p-md-5" id="tabContent">
                  <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                     <h3 class="mb-4 text-white">Account Settings</h3>
                     <!-- form -->
                     <?php echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";  ?>
                     <div class="row">
                        <div class="col-md-6 col-lg-4">
                           <div class="form-group">
                              <label class="ms-3 text-white">Name</label>
                              <input type="text" id="name" name="username"  class="form-control ms-3" value="<?php echo $arraydata['username']?> " readonly>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                           <div class="form-group">
                              <label class="ms-3 text-white">Phone number</label>
                              <input type="text" id="mobile" name="mobile"  class="form-control ms-3" value="<?php echo $arraydata['mobile']  ?>"><br>
                           </div>
                        </div>
                        <h4 class="col-12 ms-3 text-white">Social Media Handle</h4>
                        <div class="col-md-6 col-lg-3">
                           <div class="form-group">
                              <label class="h-i ms-3"><i class="fa fa-facebook text-primary" style="font-size:20px"></i></label>
                              <input type="text" id="facebook" name="facebook"  class="form-control ms-3 " value="<?php echo $arraydata['fb']  ?>">
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="form-group">
                              <label class="ms-3"><i class="fa fa-linkedin text-primary" style="font-size:20px"></i> </label>
                              <input type="text" id="linkedin" name="linkedin"  class="form-control ms-3 " value="<?php echo $arraydata['linkedn']  ?>">
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="form-group">
                              <label class="ms-3"> <i class="fa fa-github text-white " style="font-size:20px"></i></span></label>
                              <input type="text" id="github" name="github"  class="form-control ms-3 " value="<?php echo $arraydata['git']  ?>">
                           </div>
                        </div>
                        <div>
                           <button type="submit" class="btn btn-primary ms-3">Update</button>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <!-- <label>ID</label> -->
                              <input type="hidden" id="name"name="id" class="form-control"  value="<?php echo $arraydata['id']?>" readonly>
                           </div>
                        </div>
                     </div>
                     </form>



                      <!-- for image upload -->
                           <!--  -->
                           <form action="UserimgUpload.php" method="post" enctype="multipart/form-data" class="form-inline">
                             <h3 class="col-12 text-white">Profile Image</h3>
                             <div class="form-group mx-sm-3 mb-2">
                              <input class="form-control" onchange="changeImage(this)" name="image" id="image" type="file" id="formFile" required>
                              </div>
                              <div class="form-group mb-2">
                              <input type="hidden" id="name" name="id" class="form-control" value="<?php echo $arraydata['id'] ?>" readonly>
                              </div>
                              <button type="submit" class="btn btn-primary mb-2">Change</button>
                           </form>
                        </div>



                  <!-- For password section -->
                        <!--  -->
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                     <h3 class="mb-4 text-white">Change Password</h3>
                     <form action="updateprofilepass.php" method="POST">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="text-white">New password</label>
                                 <input type="password" id="password" name="password" required class="form-control " >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="text-white">Confirm new password</label>
                                 <input type="password" id="Cpassword" name="Cpassword"class="form-control">
                              </div>
                           </div>
                           <div class="input-group">
                              <input type="checkbox" onclick="togglePassword()"> <span class="ms-2 text-white">Show Password</span>
                           </div>
                        </div>
                        <div>
                           <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script>
         function changeImage(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function (e) {
                   $('#selectedImage').attr('src', e.target.result);
               };
               reader.readAsDataURL(input.files[0]);
           }
         }
      </script>
      <script src="js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script>
         function togglePassword() {
          var passwordInput = document.querySelector("input[name='password']");
          var confirmPasswordInput = document.querySelector("input[name='Cpassword']");
         
             if (passwordInput.type === "password" && confirmPasswordInput.type === "password") {
                 passwordInput.type = "text";
                 confirmPasswordInput.type = "text";
             } else {
                 passwordInput.type = "password";
                 confirmPasswordInput.type = "password";
             }
         }
      </script>
   </body>
</html>