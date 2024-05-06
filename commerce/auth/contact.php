<?php
session_start();

include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = $_POST['username'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $query = "INSERT INTO `contact`(`username`, `subject`, `messages`) VALUES ('$username','$subject','$message')";

  if (mysqli_query($conn, $query)) {

    echo "<script><alert>Meassge sent. Thank ou for contacting us.</alert></script>";
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  exit();
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Contact Us</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('images/bg.jpg');
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .contact-container {
      width: 600px;
      height: auto;
      background-color: white;
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .contact-container img {
      max-width: 100%;
      border-radius: 10px;
      display: block;
      margin: 0 auto 10px;
    }

    .contact-container .form-group {
      margin-bottom: 15px;
    }

    .contact-container label {
      font-weight: bold;
    }


    .contact-container textarea {
      width: 100%;
      padding: 10px;
      min-height: 100px;
      border-radius: 20px;
      background-color: #e8f5d7;
      border: 1px solid #ccc;
    }

    .contact-container input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 30px;
      border: 1px solid #ccc;
      background-color: #e8f5d7;
    }

    .contact-container .btn-submit {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #3dc408;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      border-radius: 30px;
    }

    .contact-container .btn-submit:hover {
      background-color: black;
      color: #4cd117;
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="images/fav.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../commonDesign.css">

</head>

<body>
  <div class="contact-container">
    <div class="row my-4 mx-2">
      <div class="col-md-6">

        <img src="images/contact-girl.png" alt="">
      </div>
      <div class="col-md-6">

        <form method="post" action="">
          <div class="form-group">

            <input type="text" id="username" name="username" placeholder="Username*" class="inp" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly required>
          </div>
          <div class="form-group">
            <input type="text" id="subject" name="subject" placeholder="Subject*" class="inp" required>
          </div>
          <div class="form-group">
            <textarea id="message" name="message" placeholder="Enter your message" class="inp" required></textarea>
          </div>
          <button type="submit" class="btn btn-submit">Submit &#8594;</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>