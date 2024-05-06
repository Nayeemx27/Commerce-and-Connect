<?php
include '../config/config.php';
include 'adminsession.php';

$sql = "SELECT * FROM files ORDER BY id DESC";

$sql1 = "SELECT * FROM userinfo  WHERE `Ban` = '0'";
$result1 = $conn->query($sql1);


$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"];
    $name = $_POST["username"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    $sql = "UPDATE userinfo SET username='$name', email='$email', mobile='$mobile' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Updated, Please login again')</script>";
        echo "<script>location.href='logout.php'</script>";
    } else {
        echo "Error updating data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/c68b4388d9.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../img/c.png">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5 text-dark">Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link bottom-dashboard active" id="account-tab" data-toggle="pill" href="#account"
                        role="tab" aria-controls="account" aria-selected="true">
                        <i class="fas fa-bars mr-1 dashboard"></i> Dashboard
                    </a>

                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle bottom1" href="#" role="button" id="other-tab"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-list-check   "></i> Community Post
                        </a>
                        <div class="dropdown-menu" aria-labelledby="other-tab">
                            <a class="dropdown-item" href="../Admin/gPost.php">General Post</a>
                            <a class="dropdown-item" href="../Admin/tPost.php">Tech Post</a>
                            <a class="dropdown-item" href="../Admin/pPost.php">Programming Post</a>
                            <a class="dropdown-item" href="../news/news_upload.php">Notice</a>
                        </div>
                    </div>
                    <a class="nav-link bottom1 " id="other-tab" data-toggle="pill" href="#other" role="tab"
                        aria-controls="other" aria-selected="false">
                        <i class="fa-solid fa-list-check"></i> Manage Users
                    </a>

                    <a class="nav-link bottom1" href="../../engage/clubs/member.php">
                        <i class="fa-solid fa-plus"></i> Add Clubs Members
                    </a>

                    <a class="nav-link bottom1" href="../../engage/clubs/list.php">
                        <i class="fa-solid fa-user"></i> Manage Clubs Members
                    </a>

                    <a class="nav-link bottom" href="../../engage/clubs/productAdmin.php">
                        <i class="fa-solid fa-plus"></i> Add Hire Products
                    </a>

                    <a class="btn bottom-log btn-danger btn-block bottom1" href="adminlogout.php"><i
                            class="fa-solid fa-right-from-bracket"></i>Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h2 class="mb-4 text-dark">Files</h2>
                        <div class="table-responsive table-container">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>File</th>
                                        <th>Course Name</th>
                                        <th>View</th>
                                        <th>Approve</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['Filename'] . "</td>";
                                            echo "<td>" . $row['file'] . "</td>";
                                            echo "<td>" . $row['CourseName'] . "</td>";
                                            echo '<td><a href="../materials/' . $row['file'] . '" class="btn btn-success btn-lg rounded hover-btn">View</a></td>';
                                            echo '<td><a class="btn ' . ($row['isApprove'] ? 'btn-success' : 'btn-outline-success') . ' btn-lg" href="approve.php?id=' . $row['id'] . '"><i class="fas fa-check"></i></a></td>';
                                            echo "<td><a class='btn btn-outline-danger btn-lg' href='deleteAction.php?id={$row['id']}'><i class='fas fa-trash'></i></a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No Records Found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                        <h2 class="mb-4 text-dark">Members</h2>
                        <div class="table-responsive table-container">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Actions</th>
                                        <th>Ban User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result1->num_rows > 0) {
                                        while ($row = $result1->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>{$row['username']}</td>";
                                            echo "<td>{$row['email']}</td>";
                                            echo "<td>{$row['mobile']}</td>";
                                            echo "<td><button class='btn btn-danger delete-btn' data-id='{$row['id']}'>Delete</button></td>";
                                            echo "<td><button class='btn btn-warning Ban-btn' data-id='{$row['id']}'>Ban</button></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No Members Found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ban Confirmation Modal -->
    <div class="modal fade" id="banConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="banConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banConfirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to ban this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="confirmBanBtn">Ban</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var userIdToDelete;

            $('.delete-btn').click(function () {
                userIdToDelete = $(this).data('id');
                $('#deleteConfirmationModal').modal('show');
            });

            $('#confirmDeleteBtn').click(function () {
                if (userIdToDelete) {
                    $.ajax({
                        url: 'delete_user.php',
                        type: 'POST',
                        data: { id: userIdToDelete },
                        success: function (response) {
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred while deleting the user.');
                        }
                    });
                }
            });

            var userIdToBan;

            $('.Ban-btn').click(function () {
                userIdToBan = $(this).data('id');
                $('#banConfirmationModal').modal('show');
            });

            $('#confirmBanBtn').click(function () {
                if (userIdToBan) {
                    $.ajax({
                        url: 'ban.php',
                        type: 'POST',
                        data: { id: userIdToBan },
                        success: function (response) {
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred while banning the user.');
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>