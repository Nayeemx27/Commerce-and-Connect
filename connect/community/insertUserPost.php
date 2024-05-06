<?php
   include '../config/config.php';
   include '../session/sessionfile.php';


    if(isset( $_SESSION['l_uname'])){
        $username = $_SESSION['l_uname'];
    // Get data from the form
       $post_title = $_POST["post_title"];
       $description = $_POST["description"];
       $link = $_POST["link"];
       $uploader =$_SESSION["l_uname"];

       $insert_query = "INSERT INTO `community_forum_general`(`post_title`, `description`, `link`,`uploader`) VALUES ('$post_title','$description','$link','$username')";
       if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Data stored')</script>";
        echo "<script>location.href='../Home/LandingPage.php'</script>";
        exit;
    } else {
        die("Not inserted");
    }
    
    }

    
   

?>
