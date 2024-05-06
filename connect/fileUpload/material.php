<?php
   include '../config/config.php';
   include '../session/sessionfile.php';
   
   $sql = "SELECT * FROM files WHERE isApprove = 1";
   $result = $conn->query($sql);   
   $conn-> close();
   ?>
  
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/c68b4388d9.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="icon" type="image/x-icon" href="../img/c.png">
      <link rel="stylesheet" href="../css/index.css">
      <link rel="stylesheet" href="../css/font.css">
      <title>Materials</title>
   </head>
   <body class="b-g">
      <div class="container">
         <div class="row">
            <div class="col">
               <nav class="navbar  navbar-expand-lg mt-2 ">
                  <div class="container-fluid ">
                     <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                        <h4></h4>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0  ">
                           <li class="nav-item ">
                              <a class="nav-link hv" aria-current="page" href="../Home/Landingpage.php">Home</a>
                           </li>
                           <!-- <li class="nav-item">
                              <a class="nav-link hv active" href="../fileUpload/material.php">Files</a>
                           </li> -->
                           <li class="nav-item">
                              <a class="nav-link hv " href="../fileUpload/file.php">Contribute</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link hv " href="../community/communityPost.php">Community</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </div>
      <h1 class="d-flex mt-5 justify-content-center">MATERIALS</h1>
      <hr class ="w-75 mx-auto">
      <div class="container ">
         <!-- <h6 class="ms-5">Search Here</h6> -->
         <!-- <div class="form-outline ms-5"> -->
            <!-- <input class="border border-none rounded rounded-5 ms-4" type="text" name="getName" id="getName" placeholder="খোঁজ দ্যা সার্চ">
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>   -->
            <div class="InputContainer">
             <input  type="text" name="getName" class="input "id="getName" placeholder="Search Here..">
            </div>
         
         <!-- </div> -->
      </div>
      <div class="">
         <!-- <hr class=" mx-auto w-75"> -->
         <table class="table table-striped table-white mx-auto mt-3 w-75 border border-dark  " id ="table-data">
            <thead>
               <tr>
                  <th>
                     <h6>Serial NO</h6>
                  </th>
                  <th scope="col">
                     <h6>Title</h6>
                  </th>
                  <th scope="col">
                     <h6>File</h6>
                  </th>
                  <th scope="col">
                     <h6>Course Teacher</h6>
                  </th>
                  <th scope="col">
                     <h6>Course Name</h6>
                  </th>
                  <th scope="col">
                     <h6>Course Code</h6>
                  </th>
                  <th scope="col">
                     <h6>Uploader</h6>
                  </th>
                  <th scope ="col">
                     <h6>View</h6>
                  </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $count =1;
                  if($result->num_rows>0){
                  while($row =$result->fetch_assoc()){
                   echo "<tr>";
                   echo "<td>".$count."</td>";
                   echo "<td>".$row['Filename']."</td>";
                   echo "<td>".$row['file']."</td>";
                   echo "<td>".$row['CourseTeacher']."</td>";
                   echo "<td>".$row['CourseName']."</td>";
                   echo "<td>".$row['CourseTitle']."</td>";
                   echo "<td>".$row['uploader']."</td>";
                   echo '<td><a href="../materials/'.$row['file'].'" class ="btn  btn-success rounded rounded-3 hover-btn" >View</a></td>';
                  echo "</tr>";
                  $count++;
                  }
                  }
                  else{
                   echo"<tr><td colspan='3'>No Records Found.</td></tr>";
                  }
                  ?> 
            </tbody>
         </table>
      </div>
      <script>
         $(document).ready(function(){
          $('#getName').keyup(
           function(){
            var getName = $(this).val();
            $.ajax({
              method:'POST',
              url:'search.php',
              data:{Filename:getName},
              success:function(response)
              {
                   $("#table-data").html(response);
              } 
            });
          });
         }); 
      </script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
   </body>
</html>