<?php
 include '../config/config.php';
include '../session/sessionfile.php';
$course = $_POST['course'];
$topic = $_POST['topic'];

$username =$_SESSION["l_uname"];




$duplicate_req= mysqli_query($conn, "SELECT * FROM `material_request` WHERE `topic`='$topic'");

if (mysqli_num_rows($duplicate_req) > 0) {
    echo "<script>alert('Topic request already submitted, wait for upload it ')</script>";
    echo "<script>location.href='../community/community.php'</script>";
    exit;
}

$insert_query ="INSERT INTO `material_request`(`name`, `topic`,`username`) VALUES ('$course','$topic','$username')";
     
if(!mysqli_query($conn,$insert_query)){
 die("not inserted"); 
}
else{
 echo "<script>alert('Your Request has submitted')</script>";
 echo "<script>location.href='../community/community.php'</script>";
}