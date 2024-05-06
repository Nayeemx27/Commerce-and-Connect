<?php
      include '../config/config.php';
      include 'adminsession.php';
   
    $post_title = $_POST["post_title"];
    $description = $_POST["description"];
    $link = $_POST["link"];
    $uploader =$_SESSION["adminl_uname"];
    

    $insert_query = "INSERT INTO `community_forum_general`(`post_title`, `description`, `link`,`uploader`) VALUES ('$post_title','$description','$link','$uploader')";


    

    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Data stored')</script>";
        echo "<script>location.href='../Admin/admin.php'</script>";
        exit;

    } else {
        die("Not inserted");
    }

?>
