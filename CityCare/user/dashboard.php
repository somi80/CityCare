<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
    header("Location: ../login.php");
    exit();
}

$user = $_SESSION['user'];

$noti = mysqli_query($conn, 
"SELECT * FROM notifications WHERE user_email='$user' ORDER BY id DESC LIMIT 1");

$n = mysqli_fetch_assoc($noti);

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM users WHERE email='$user'"));
$name = $data['name'];

// notifications (latest 3)
$notify = mysqli_query($conn, "SELECT * FROM notifications ORDER BY id DESC LIMIT 3");
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:Arial;
    background:#f4f6f9;
}

/* SIDEBAR */
.sidebar{
    width:220px;
    height:100vh;
    background:#2e7d32;
    color:white;
    position:fixed;
    padding-top:20px;
}

.sidebar h4{
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    padding:12px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#1b5e20;
}

/* CONTENT */
.content{
    margin-left:220px;
}

/* HERO */
.hero{
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                url('../assets/images/bg.jpg') center/cover;
    color:white;
    padding:60px 30px;
}
.hero h2{
    font-weight:bold;
}

/* CARDS */
.card{
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

/* NOTIFICATION */
.notify{
    background:#fff3cd;
    padding:10px;
    margin:10px;
    border-left:5px solid orange;
}
</style>

</head>

<?php if($n){ ?>

<div style="background:#d4edda; padding:10px; margin:10px; border-radius:8px;">
    <?= $n['message'] ?>
</div>

<?php } ?>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
<h4>CityCare</h4>

<a href="dashboard.php">Dashboard</a>
<a href="report.php">Report Complaint</a>
<a href="complaints.php">My Complaints</a>
<a href="profile.php">Profile</a>
<a href="../logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<!-- HERO SECTION -->
<div class="hero">
<h2>Welcome, <?= $name ?> 👋</h2>
<p>Together we build a cleaner and better city 🌱</p>
</div>

<!-- NOTIFICATIONS -->
<div class="container">
<h5 class="mt-3">Notifications</h5>

<?php while($row = mysqli_fetch_assoc($notify)){ ?>
<div class="notify">
<?= $row['message'] ?>
</div>
<?php } ?>

</div>

<!-- CARDS -->
<div class="container mt-4">
<div class="row">

<div class="col-md-4">
<div class="card p-3 text-center">
<h5>Report Complaint</h5>
<a href="report.php" class="btn btn-success">Go</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 text-center">
<h5>My Complaints</h5>
<a href="complaints.php" class="btn btn-primary">View</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 text-center">
<h5>Profile</h5>
<a href="profile.php" class="btn btn-dark">Open</a>
</div>
</div>

</div>
</div>

</div>

</body>
</html>