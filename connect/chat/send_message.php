<?php
include '../config/config.php';

session_start();
if(isset( $_SESSION['l_uname'])){
  echo"";
}
else{
    echo "<script>alert('No user record found, Please Login First')</script>";
    echo "<script>location.href='LandingPage.html'</script>";
}

$message = $_POST["message"];
$username =$_SESSION["l_uname"];


$sql = "INSERT INTO `chat_messages`(`message`, `username`) VALUES ('$message','$username')";
$conn->query($sql);
$conn->close();


header("Location:../chat/chat.php");
exit();
?>
