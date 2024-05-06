<?php
session_start();
if(isset( $_SESSION['adminl_uname'])){
  echo"";
}
else{
    echo "<script>alert('No user record found, Please Login First')</script>";
    echo "<script>location.href='../Admin/adminlog.php'</script>";
}
?>