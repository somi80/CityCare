<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
    header("Location: ../login.php");
    exit();
}

$msg = "";

if(isset($_POST['submit'])){

    $user = $_SESSION['user'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    // image upload
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    if($image != ""){
        move_uploaded_file($tmp, "../assets/images/".$image);
    }

    mysqli_query($conn, "INSERT INTO complaints(user_email, category, description, location, image, status)
    VALUES('$user','$category','$description','$location','$image','Pending')");

    $msg = "Complaint Submitted Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Report Complaint</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
    font-family:Arial;
}

.header{
    background:#2e7d32;
    color:white;
    padding:15px;
    text-align:center;
    font-size:22px;
}

.card{
    margin-top:30px;
    padding:20px;
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}
</style>

</head>

<body>

<div class="header">
Report Complaint 
</div>

<div class="container">

<div class="card">

<?php if($msg != ""){ ?>
<div class="alert alert-success"><?= $msg ?></div>
<?php } ?>

<form method="post" enctype="multipart/form-data">

<div class="mb-3">
<label>Category</label>
<select name="category" class="form-control" required>
<option value="">Select</option>
<option>Garbage</option>
<option>Drainage</option>
<option>Street Light</option>
<option>Road Damage</option>
<option>Water issue</option>
<option>Street Cleaning</option>
<option>Public Toilet Issue</option>
</select>
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control" required></textarea>
</div>

<div class="mb-3">
<label>Location</label>
<input type="text" name="location" class="form-control" required>
</div>

<div class="mb-3">
<label>Upload Image (optional)</label>
<input type="file" name="image" class="form-control">
</div>

<button type="submit" name="submit" class="btn btn-success">
Submit Complaint
</button>

</form>

</div>

</div>

</body>
</html>