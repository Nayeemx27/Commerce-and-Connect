<?php 
include '../config/config.php';
include '../session/sessionfile.php';



if (isset($_POST['submit']))
{
$CourseName =$_POST['CourseName'];
$CourseTeacher =$_POST['CourseTeacher'];
$CourseTitle =$_POST['CourseTitle'];
$title = $_POST['title'];
$File = $_FILES['File']['name'];
$file_type = $_FILES['File']['type'];
$file_size =$_FILES['File']['size'];
$temp = $_FILES['File']['tmp_name'];
$file_store ="../materials/".$File;

$username =$_SESSION["l_uname"];

move_uploaded_file($temp,$file_store);


$sql = "INSERT INTO `files`(`Filename`, `file`,`CourseTeacher`, `CourseName`,`CourseTitle`,`uploader`) VALUES ('$title','$File','$CourseTeacher','$CourseName','$CourseTitle','$username')";

if(!mysqli_query($conn,$sql)){
    die("not uploded"); 
   }
   else{
    echo "<script>alert('Your file is uploded')</script>";
    echo "<script>location.href='../fileUpload/file.php'</script>";
   }

}

?>