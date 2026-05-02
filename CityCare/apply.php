<?php
$role = isset($_GET['role']) ? $_GET['role'] : "";
?>

<!DOCTYPE html>
<html>
<head>
<title>Apply - CityCare</title>

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
    margin-top:40px;
    padding:20px;
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}
</style>

</head>

<body>

<div class="header">
Apply for <?= $role != "" ? ucfirst($role) : "Role" ?>
</div>

<div class="container">

<div class="card">

<?php if(isset($_GET['success'])){ ?>
<div class="alert alert-success">
Application Submitted Successfully!
</div>
<?php } ?>

<form action="apply_process.php" method="post">

<input type="hidden" name="role" value="<?= $role ?>">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<button type="submit" class="btn btn-success">
Apply
</button>

</form>

</div>

</div>

</body>
</html>