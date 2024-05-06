<?php
include '../config/config.php';
include '../session/sessionfile.php';


      $id = $_POST["id"];
      $image = $_FILES['image'];
   
       $Imgloc =$_FILES['image']['tmp_name'];
   
       $imgname = $_FILES['image']['name'];
   
       $img_des = "../image/".$imgname;
   
       move_uploaded_file($Imgloc,$img_des);
       $imgUP = "UPDATE userinfo SET `image` ='$img_des' WHERE id=$id";
       
       if ($conn->query($imgUP) === TRUE) {
   		echo "<script>alert('Your profile image has been changed')</script>";
   		echo "<script>location.href='../Home/landingpage.php'</script>";
       } else {
           echo "Error updating data: " . $conn->error;
       }

    