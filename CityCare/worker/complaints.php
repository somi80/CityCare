<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user']) || $_SESSION['role'] != 'worker'){
    header("Location: ../worker_login.php");
    exit();
}

$worker = $_SESSION['user'];
$result = mysqli_query($conn, "SELECT * FROM complaints WHERE worker_email='$worker'");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Assigned Complaints</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h3>My Assigned Complaints</h3>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Category</th>
<th>Status</th>
<th>Proof</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['category'] ?></td>
<td><?= $row['status'] ?></td>

<td>
<?php if($row['proof_image'] != ""){ ?>
<img src="../assets/images/<?= $row['proof_image'] ?>" width="80">
<?php } ?>
</td>
</tr>

<?php } ?>

</table>

</body>
</html>