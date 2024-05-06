<?php
   include '../config/config.php';
   include '../session/sessionfile.php';
   
   
   if(isset( $_SESSION['l_uname'])){
    $username = $_SESSION['l_uname'];
    // $sql = "SELECT * FROM files WHERE uploader = $username";
    $sql = "SELECT * FROM community_forum_general ORDER BY `id`  DESC";
    $result = $conn->query($sql);   
 
     }
      else{
      echo "<script>alert('can't access from URL login First')</script>";
      echo "<script>location.href='../Home/LandingPage.html'</script>";
       }
 
  
       if(isset( $_SESSION['l_uname'])){
        $username = $_SESSION['l_uname'];
        // $sql = "SELECT * FROM files WHERE uploader = $username";
        $sql1 = "SELECT * FROM community_forum_tech ORDER BY `id`  DESC ";
        $result1 = $conn->query($sql1);   
        
         }
          else{
          echo "<script>alert('can't access from URL login First')</script>";
          echo "<script>location.href='../Home/LandingPage.html'</script>";
           }
       

           if(isset( $_SESSION['l_uname'])){
            $username = $_SESSION['l_uname'];
            // $sql = "SELECT * FROM files WHERE uploader = $username";
            $sql2 = "SELECT * FROM community_forum_programming ORDER BY `id`  DESC ";
            $result2 = $conn->query($sql2);   
            
             }
              else{
              echo "<script>alert('can't access from URL login First')</script>";
              echo "<script>location.href='../Home/LandingPage.html'</script>";
               }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="icon" type="image/x-icon" href="../img/c.png">
   <style>
    body {
    background-color:#f5f5f5; 
}


/* .card {
    background-color: rgba(17,17,17,0.8); 
    color: white;
}  */
   </style>
</head>
<body>
    <header class="bg-primary text-white p-3">
        <div class="container">
            <h1>Community Forum</h1>
        </div>
    </header>

    <div class="container mt-4">
        <!-- Forum Categories -->
        <div class="row">
            <div class="col-md-4">
                <h2>Categories</h2>
                <ul class="list-group" id="category-list">
                    <li class="list-group-item" data-category="category1">General</li>
                    <li class="list-group-item" data-category="category2">Tech</li>
                    <li class="list-group-item" data-category="category3">Programming Language</li>
                </ul>
            </div>
            
            <!-- Forum Posts -->
            <div class="col-md-8">
                <h2>Latest Posts</h2>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $uploader = $row["uploader"];
                    $postTitle = $row["post_title"];
                    $description = $row["description"];
                    $link = $row["link"];
                ?>
                <div class="card category1 mt-2">
                    <div class="card-body">
                        <h4 class="card-title "><?php echo $postTitle; ?></h4>
                        <p class="card-text"><?php echo $description; ?><strong class="text-primary"> by-<?php echo $uploader;?></strong></p>
                        <a href="<?php echo $link; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <?php
                }
                ?>


              <?php
                while ($row = $result1->fetch_assoc()) {
                    $uploader = $row["uploader"];
                    $postTitle = $row["post_title"];
                    $description = $row["description"];
                    $link = $row["link"];
                ?>
                
                <div class="card category2 mt-2">
                <div class="card-body">
                        <h4 class="card-title "><?php echo $postTitle; ?></h4>
                        <p class="card-text"><?php echo $description; ?><strong class="text-primary"> by-<?php echo $uploader;?></strong></p>
                        <a href="<?php echo $link; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <?php
                }
                ?>


<?php
                while ($row = $result2->fetch_assoc()) {
                    $uploader = $row["uploader"];
                    $postTitle = $row["post_title"];
                    $description = $row["description"];
                    $link = $row["link"];
                ?>
                
                <div class="card category3 mt-2">
                <div class="card-body">
                        <h4 class="card-title "><?php echo $postTitle; ?></h4>
                        <p class="card-text"><?php echo $description; ?><strong class="text-primary"> by-<?php echo $uploader;?></strong></p>
                        <a href="<?php echo $link; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <?php
                }
                ?>
                
            </div>
        </div>
    </div>

    <!-- JS FILE -->
   <script src="../js/bootstrap.min.js"></script>
   <script>
       document.addEventListener("DOMContentLoaded", function() {
           const categoryList = document.getElementById("category-list");
           const posts = document.querySelectorAll(".card");
           
           const selectedCategory = localStorage.getItem("selectedCategory") || "category1";
           
          
           categoryList.querySelectorAll("li").forEach(li => {
               if (li.dataset.category === selectedCategory) {
                   li.classList.add("active");
               } else {
                   li.classList.remove("active");
               }
           });
           
           posts.forEach(post => {
               if (post.classList.contains(selectedCategory)) {
                   post.style.display = "block";
               } else {
                   post.style.display = "none";
               }
           });
           
           categoryList.addEventListener("click", function(event) {
               if (event.target.dataset.category) {
                   const category = event.target.dataset.category;
                   
                  
                   localStorage.setItem("selectedCategory", category);
                   
                   categoryList.querySelectorAll("li").forEach(li => {
                       if (li.dataset.category === category) {
                           li.classList.add("active");
                       } else {
                           li.classList.remove("active");
                       }
                   });
                   
                   posts.forEach(post => {
                       if (post.classList.contains(category)) {
                           post.style.display = "block";
                       } else {
                           post.style.display = "none";
                       }
                   });
               }
           });
       });
   </script>
</body>
</html
