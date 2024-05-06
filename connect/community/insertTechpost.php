<?php
    include '../config/config.php';
    include '../session/sessionfile.php';
    
    // Get data from the form
    $post_title = mysqli_real_escape_string($conn, $_POST["post_title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $link = mysqli_real_escape_string($conn, $_POST["link"]);
    $uploader = $_SESSION["l_uname"];

   
    
    $insert_query = "INSERT INTO `community_forum_tech` (`post_title`, `description`, `link`, `uploader`) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $insert_query)) {
        
        mysqli_stmt_bind_param($stmt, "ssss", $post_title, $description, $link, $uploader);

        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Data stored')</script>";
            echo "<script>location.href='../Home/LandingPage.php'</script>";
            exit;
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

       
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
