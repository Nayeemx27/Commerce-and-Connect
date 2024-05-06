<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css"/>
      <link rel="stylesheet" href="updatepass.css">
      <title>G SHARE | Update password </title>
   </head>
   <body>
      <?php
         include 'config.php';
         if(isset($_GET['email'])&&isset($_GET['reset_token']))
         {
            date_default_timezone_set('Asia/Dhaka');
            $date=date("Y-m-d");
            $query ="SELECT * FROM `userinfo` WHERE `email`='$_GET[email]' AND `reset_token`='$_GET[reset_token]' AND `token_expired`='$date'";
            $result = mysqli_query($conn,$query);
            if($result)
            {
                if(mysqli_num_rows($result)==1)
                {
                    echo"
                    <div class='container w-25  c-margin'>
                    <form  class= mt-5 method='post' action=''>
         
         <div class='form-outline '>
         <label class='form-label' for='form1Example1'>Enter New Password</label>
         <input  type='password' id='password' name='password' class='form-control'>
         <input  type='hidden' id='password' name='email' value='$_GET[email]' class='form-control'>

         </div>
          
         <div class='row mb-4'>
         
         <button type='submit' name='update-btn' class='btn btn-primary btn-block w-25 mt-4 mx-auto'>Update</button>
         </form>
         </div>
         ";
                }
                else
                {
                    echo "<script>alert('Link is expire');</script>";
                }
            }
           else
           {
            echo "<script>alert('server down');</script>";
         }
           }
         ?> 
          
          <?php

               if(isset($_POST['update-btn']))
            {
              $password= $_POST['password'];

              $password_pattern = "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{6,20}/";
              
              if (!preg_match($password_pattern, $password)) {
               echo "<script>alert('Password must contain 1 uppercase letter, 1 lowercase letter, 1 digit, 1 special character, and have a length up to 10 characters.')</script>";
               echo "<script>location.href='forgetpass.php'</script>";
               exit;
           }
           else {

              $updae ="UPDATE `userinfo` SET `pass`='$password',`reset_token`=NULL, `token_expired`=NULL WHERE `email`='$_POST[email]' ";
              if(mysqli_query($conn,$updae))
              {
                echo "<script>alert('Password updated successfully');
                window.location.href='landingpage.php'</script>";
              }
              else
              {
                echo "<script>alert('Server Down! try again later');
                window.location.href='landingpage.php'</script>";
              }
            }
            }
          ?>


      <script src="js/validation.js"></script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>