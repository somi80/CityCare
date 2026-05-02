<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// counts
$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM complaints"))['t'];
$pending = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM complaints WHERE status='Pending'"))['t'];
$progress = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM complaints WHERE status='In Progress'"))['t'];
$resolved = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM complaints WHERE status='Resolved'"))['t'];

// recent
$recent = mysqli_query($conn,"SELECT * FROM complaints ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#f5f5f5;font-family:Arial;}

.header{
    background:#2e7d32;
    color:white;
    padding:15px;
    font-size:20px;
    text-align:center;
}

.card-box{
    border-radius:12px;
    padding:20px;
    color:white;
    text-align:center;
    
    min-height:120px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.total{background:#546e7a;}
.pending{background:#ffb300;}
.progress{background:#42a5f5;}
.resolved{background:#66bb6a;}

.list-box{
    background:white;
    padding:15px;
    border-radius:10px;
    margin-top:20px;
}
</style>

</head>

<body>

<div class="header">
Admin Dashboard 👑
</div>

<div class="container mt-3">

<div class="row g-3">

<div class="col-6">
<div class="card-box total">
<h5>Total</h5>
<h3><?= $total ?></h3>
</div>
</div>

<div class="col-6">
<div class="card-box pending">
<h5>Pending</h5>
<h3><?= $pending ?></h3>
</div>
</div>

<div class="col-6">
<div class="card-box progress">
<h5>In Progress</h5>
<h3><?= $progress ?></h3>
</div>
</div>

<div class="col-6">
<div class="card-box resolved">
<h5>Resolved</h5>
<h3><?= $resolved ?></h3>
</div>
</div>

</div>

<!-- Recent -->
<div class="list-box">

<div class="d-flex justify-content-between">
<h5>Recent Complaints</h5>
<a href="complaints.php">View All</a>
</div>

<table class="table mt-2">

<tr>
<th>ID</th>
<th>Title</th>
<th>Status</th>
</tr>

<?php while($r = mysqli_fetch_assoc($recent)){ ?>
<tr>
<td><?= $r['id'] ?></td>
<td><?= $r['category'] ?></td>
<td><?= $r['status'] ?></td>
</tr>
<?php } ?>

</table>

</div>

<br>

<a href="applications.php" class="btn btn-dark mt-2">View Applications</a>

<a href="vacancies.php" class="btn btn-dark mt-2">Manage Vacancies</a>

<a href="../logout.php" class="btn btn-danger">Logout</a>

</div>

</body>
</html>