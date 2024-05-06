<link rel="stylesheet" href="index.css"/>
<?php 
  include("../config.php");
  
   $name = $_POST['Filename'];
  
   $sql = "SELECT `Filename`, `file` ,`CourseName` FROM `files` WHERE  Filename LIKE '$name%'";  
   $query = mysqli_query($conn,$sql);
   $result =$conn->query($sql);
   $count =1;
   ?>   
   
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" href="img/GMAN.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="font.css">
    <title>Materials</title>
  </head>
<body>
   
 <table class="table table-striped table-black border">
  <thead>
    <tr>
      <th>Title</th>
      <th>File</th>
      <th>Course Name</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody >
    
   <?php
   if($result->num_rows>0){
   while($row =$result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['Filename']."</td>";
    echo "<td>".$row['file']."</td>";
    echo "<td>".$row['CourseTeacher']."</td>";
    echo "<td>".$row['CourseName']."</td>";
    echo '<td><a href="../materials/'.$row['file'].'" class ="btn  btns btn-danger" >View</a></td>';
   echo "</tr>";
   }
   "</tbody>";
  }
  else{
    echo"<tr><td colspan='3'>No Records Found.</td></tr>";
  }
   ?> 
    </script>
</html>