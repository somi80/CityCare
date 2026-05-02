<?php
session_start();
include("../config/db.php");

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM applications ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Applications</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h3>Applications </h3>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['role_applied'] ?></td>
<td><?= $row['status'] ?></td>

<td>

<?php if($row['status'] == 'Pending'){ ?>

<a href="update_application.php?id=<?= $row['id'] ?>&status=Approved" class="btn btn-success btn-sm">Approve</a>

<a href="update_application.php?id=<?= $row['id'] ?>&status=Rejected" class="btn btn-danger btn-sm">Reject</a>

<?php } else { ?>
<b><?= $row['status'] ?></b>
<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>