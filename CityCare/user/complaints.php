<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
    header("Location: ../login.php");
    exit();
}

$user = $_SESSION['user'];

$result = mysqli_query($conn, "SELECT * FROM complaints WHERE user_email='$user'");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Complaints</title>

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
}

.badge{
    padding:6px 10px;
    border-radius:8px;
    color:white;
}

.pending{
    background:orange;
}

.progress{
    background:blue;
}

.resolved{
    background:green;
}

img{
    width:80px;
    border-radius:8px;
}
</style>

</head>

<body>

<div class="header">
My Complaints 📋
</div>

<div class="container mt-4">

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Category</th>
<th>Description</th>
<th>Location</th>
<th>Image</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['category'] ?></td>
<td><?= $row['description'] ?></td>
<td><?= $row['location'] ?></td>

<td>
<?php if($row['image'] != ""){ ?>
<img src="../assets/images/<?= $row['image'] ?>">
<?php } ?>
</td>

<td>
<?php
$status = $row['status'];

if($status == "Pending"){
    echo "<span class='badge pending'>Pending</span>";
}
elseif($status == "In Progress"){
    echo "<span class='badge progress'>In Progress</span>";
}
else{
    echo "<span class='badge resolved'>Resolved</span>";
}
?>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>