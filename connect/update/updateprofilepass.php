<?php
include 'config.php';
include 'sessionfile.php';
if(isset( $_SESSION['l_uname'])){
$username = $_SESSION['l_uname'];
$password =$_POST['password'];
$Cpassword =$_POST['Cpassword'];

$password_pattern = "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{6,20}/";

if (!preg_match($password_pattern, $password)) {
   echo "<script>alert('Password Contains 1 Char, 1 Digit, 1 Special Char and lenght uptp 8 !')</script>";
   echo "<script>location.href='profilepage.php'</script>";
   exit;
} elseif ($password != $Cpassword) {
   echo "<script>alert('Passwords do not match!')</script>";
   echo "<script>location.href='profilepage.php'</script>";
   exit;
} 
else{
         $updae ="UPDATE `userinfo` SET `pass`='$password' WHERE username = '$username' ";
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