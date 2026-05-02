<?php
include("../config/db.php");

session_start();
$email = $_SESSION['user'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>

<title>User Profile</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

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
My Profile
</div>

<div class="container">

<div class="card">

<h4>User Information</h4>

<p><b>Name:</b> <?= $user['name'] ?></p>
<p><b>Email:</b> <?= $user['email'] ?></p>
<p><b>City:</b> Your City</p>

</div>

</div>

</body>
</html>