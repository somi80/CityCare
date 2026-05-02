<?php
session_start();
include("../config/db.php");

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// add vacancy
if(isset($_POST['add'])){
    $role = $_POST['role'];

    mysqli_query($conn, 
    "INSERT INTO vacancies(role,status) VALUES('$role','open')");
}

$result = mysqli_query($conn, "SELECT * FROM vacancies");
?>

<!DOCTYPE html>
<html>
<head>
<title>Vacancies</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h3>Manage Vacancies 🧑‍💼</h3>

<!-- ADD FORM -->
<form method="post" class="mb-3">

<select name="role" class="form-control mb-2" required>
<option value="">Select Role</option>
<option value="worker">Worker</option>
<option value="admin">Admin</option>
</select>

<button name="add" class="btn btn-success">Add Vacancy</button>

</form>

<!-- LIST -->
<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Role</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['role'] ?></td>
<td><?= $row['status'] ?></td>

<td>

<a href="update_vacancy.php?id=<?= $row['id'] ?>&status=open" class="btn btn-success btn-sm">Open</a>

<a href="update_vacancy.php?id=<?= $row['id'] ?>&status=closed" class="btn btn-warning btn-sm">Close</a>

<a href="delete_vacancy.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>