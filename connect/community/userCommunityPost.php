<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/gshares.png">
    <title>Insert Data</title>
    
    <!-- BS CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Insert Data</h2>
        <form action="insertUserPost.php" method="POST">
            <div class="form-group">
                <label for="post_title">Post Title:</label>
                <input type="text" class="form-control" name="post_title" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" name="link">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

