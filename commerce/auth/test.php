<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <title>Admin</title>

    <style>
        .container {
            background-color: antiquewhite;
            border-radius: 20px;
            width: 800px;
        }

        h2 {
            color: rgb(112, 74, 25);
            font-family: Georgia, 'Times New Roman', Times, serif
        }

        button {
            margin-left: 240px;
            margin-top: 30px;
        }

        .btn-secondary {
            color: rgb(112, 74, 25);
            font-size: 20px;
            background-color: white;
            border-color: white;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        input[type=file] {
            width: 350px;
            max-width: 100%;
            color: #444;
            padding: 5px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #555;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="container mt-5">
            <div>
                <h2 class="text-center mb-2 p-5 fw-20px mt-2">Add the Details</h2>
            </div>

            <!-- <div class="row "> -->

            <div class="col-lg-12 col-12 p-5">

                <form action="testAction.php" method="post" enctype="multipart/form-data">

                    <div class="mb-3 mx-5 center">
                        <label for="form-label">Product Name</label>
                        <input type="text" class="form-control" placeholder="name" name="name">
                    </div>

                    <div class="mb-3 mx-5 center">
                        <label for="form-label" style="margin-bottom: 10px">Mobile </label>
                        <input type="text" class="form-control" placeholder="mobile" name="mobile">
                    </div>

                    <div class="mb-3 mx-5 center">
                        <label for="form-label" style="margin-bottom: 10px">Upload The Image </label>
                        <input type="file" class="form-control" name="image" id="image" required />
                    </div>


                    <div class="mb-3 mx-5 center">
                        <button type="submit" class="btn btn-secondary" name="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            <!-- modal codes -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">We got this!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Your response has been saved.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-dark">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    </div>
    </div>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>