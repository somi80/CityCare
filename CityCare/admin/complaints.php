<?php
session_start();
include("../config/db.php");

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$workers = mysqli_query($conn, "SELECT * FROM users WHERE role='worker'");
$result = mysqli_query($conn,"SELECT * FROM complaints ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Complaints</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#f4f6f9;font-family:Arial;}

.header{
    background:#2e7d32;
    color:white;
    padding:15px;
    text-align:center;
}

.card{
    border-radius:12px;
    margin-bottom:15px;
    padding:15px;
}

.card{
    max-width:500px;
    margin:auto;
}
img{
    width:200px;     
    height:auto;
    border-radius:10px;
    display:block;
    margin-top:10px;
}

.badge{
    padding:6px 10px;
    border-radius:8px;
}

.pending{background:orange;color:white;}
.progress{background:blue;color:white;}
.resolved{background:green;color:white;}
</style>

</head>

<body>

<div class="header">
Manage Complaints 📋
</div>

<div class="container mt-3">

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="card shadow-sm">

<h6>ID: <?= $row['id'] ?></h6>
<p><b><?= $row['category'] ?></b></p>

<p><?= $row['description'] ?></p>

<?php if($row['image']){ ?>
<img src="../assets/images/<?= $row['image'] ?>">
<?php } ?>

<br><br>

<!-- STATUS -->
<p>
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

<!-- ASSIGN WORKER -->
<?php if($row['worker_email'] == ""){ ?>

<!-- assign form -->
<form action="assign_worker.php" method="post">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<select name="worker" class="form-control mb-2" required>
<option value="">Assign Worker</option>

<?php
mysqli_data_seek($workers, 0);
while($w = mysqli_fetch_assoc($workers)){
?>
<option value="<?= $w['email'] ?>"><?= $w['email'] ?></option>
<?php } ?>

</select>

<button class="btn btn-primary w-100">Assign Worker</button>

</form>

<?php } else { ?>

<p style="color:green;"><b>✔ Assigned to <?= $row['worker_email'] ?></b></p>

<?php } ?>

<p><b>Assigned To:</b> 
<?= $row['worker_email'] ? $row['worker_email'] : "Not Assigned" ?>
</p>

<!-- UPDATE FORM -->
<form action="update_status.php" method="post">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<select name="status" class="form-control mb-2">
<option>Pending</option>
<option>In Progress</option>
<option>Resolved</option>
</select>

<textarea name="remark" class="form-control mb-2" placeholder="Admin Remarks"></textarea>

<button class="btn btn-success w-100">Update</button>

</form>

</div>

<?php } ?>

</div>

</body>
</html>