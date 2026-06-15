
<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">John Doe (Manager)</h1>
        <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-warning">
        Cannot upload file
    </div>
<?php endif ?>

<?php if(file_exists('action/photos/profile.jpg')): ?>
    <img class="img-thumbnail mb-3" src="action/photos/profile.jpg" alt="Profile Photo" width="200">
<?php else: ?>
    <div class="bg-secondary text-white text-center rounded mb-3 d-flex align-items-center justify-content-center" style="width: 200px; height: 200px;">
        <span>No Photo</span>
    </div>
<?php endif ?>

<form action="action/upload.php" method="POST" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <input type="file" name="photo" class="form-control">
        <button class="btn btn-secondary">Upload</button>
    </div>
</form>

        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b> john.doe@gmail.com
            </li>
            <li class="list-group-item">
                <b>Phone:</b> (09) 243 867 645
            </li>
            <li class="list-group-item">
                <b>Address:</b> No. 321, Main Street, West City
            </li>
        </ul>
        <br>
        <a href="action/logout.php">Logout</a>
    </div>
</body>
</html>