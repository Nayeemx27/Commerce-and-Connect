<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../img/gshares.png">
  <title>News Submission</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    h1 {
      color: black;
    }
    label {
      font-weight: bold;
    }
    .form-group {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center mb-4">Submit News</h1>

  <form method="post" action="news_backend.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="form-group">
      <label for="body">Body:</label>
      <textarea class="form-control" id="body" name="body" rows="6" required></textarea>
    </div>

    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
