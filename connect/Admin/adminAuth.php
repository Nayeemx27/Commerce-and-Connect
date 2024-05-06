<?php 
include '../config/config.php';

  $adminl_uname = $_POST['adminl_uname'];
  $adminl_pass = $_POST['adminl_pass'];
  
  $result =mysqli_query($conn,"SELECT * FROM `admin` WHERE username ='$adminl_uname' and pass='$adminl_pass'");

  if(mysqli_num_rows($result))
  {
    session_start();
   $_SESSION['adminl_uname']= $adminl_uname;
   echo "<script>location.href='../Admin/admin.php'</script>";
  }
  else{
    echo "<script>alert('username and password not matching')</script>";
    echo "<script>location.href='../Home/landingpage.php'</script>";
  }