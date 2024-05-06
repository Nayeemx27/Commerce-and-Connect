<?php
session_start();

if(isset($_SESSION['l_uname'])){
  
} else {
  
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Alert</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <style>
         .centered-alert {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .p{
                padding: 70px;
            }
    </style>
    <body>

    <div class=" container mt-5">
        <div class="centered-alert">
        <div class="alert alert-danger alert-dismissible fade show p" role="alert" id="loginAlert">
            <strong >No user record found!</strong> Please login first.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    
        setTimeout(function(){
            document.getElementById('loginAlert').style.display = 'none';
            window.location.href = '../../connect/Home/LandingPage.html';
        }, 2000); 
    </script>

    </body>
    </html>

    <?php
  
    exit(); 
}
?>





