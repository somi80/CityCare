<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user']) || $_SESSION['role'] != 'worker'){
    header("Location: ../worker_login.php");
    exit();
}

$worker = $_SESSION['user'];

// only assigned complaints
$result = mysqli_query($conn, "SELECT * FROM complaints WHERE worker_email='$worker'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Worker Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{ background:#f4f6f9; font-family:Arial; }

.header{
    background:#1565c0;
    color:white;
    padding:15px;
    text-align:center;
}

.card{
    background:white;
    padding:15px;
    margin:15px 0;
    border-radius:10px;
    box-shadow:0 0 5px gray;
}

.badge{
    padding:5px 10px;
    border-radius:6px;
    color:white;
}

.pending{ background:orange; }
.progress{ background:blue; }
.resolved{ background:green; }

img{ width:120px; border-radius:8px; }
</style>

</head>

<body>

<div class="header">
Worker Dashboard 
</div>

<div class="container mt-4">

<?php if(mysqli_num_rows($result) == 0){ ?>
<div class="alert alert-info">No assigned work yet</div>
<?php } ?>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="card">

<p><b>Category:</b> <?= $row['category'] ?></p>
<p><b>Location:</b> <?= $row['location'] ?></p>
<p><b>Description:</b> <?= $row['description'] ?></p>

<p><b>Status:</b> 
<?php
if($row['status']=="Pending"){
echo "<span class='badge pending'>Pending</span>";
}
elseif($row['status']=="In Progress"){
echo "<span class='badge progress'>In Progress</span>";
}
else{
echo "<span class='badge resolved'>Resolved</span>";
}
?>
</p>

<?php if($row['image'] != ""){ ?>
<p><b>Complaint Image:</b><br>
<img src="../assets/images/<?= $row['image'] ?>"></p>
<?php } ?>

<?php if($row['proof_image'] != ""){ ?>
<p><b>Proof:</b><br>
<img src="../assets/images/<?= $row['proof_image'] ?>"></p>
<?php } ?>

<!-- ACTIONS -->
<?php if($row['status'] != "Resolved"){ ?>

<!-- START -->
<a href="update_process.php?id=<?= $row['id'] ?>&status=In Progress" class="btn btn-primary btn-sm">
Start Work
</a>

<!-- COMPLETE + PROOF -->
<form action="update_process.php" method="post" enctype="multipart/form-data" class="mt-2">
<input type="hidden" name="id" value="<?= $row['id'] ?>">
<input type="hidden" name="status" value="Resolved">

<input type="file" name="proof" required class="form-control mb-2">

<button class="btn btn-success btn-sm">
Complete + Upload Proof
</button>
</form>

<?php } ?>

</div>

<?php } ?>

<a href="../logout.php" class="btn btn-danger">Logout</a>

</div>

</body>
</html>