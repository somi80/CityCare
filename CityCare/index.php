<?php
include("config/db.php");

// vacancy check
$result = mysqli_query($conn, "SELECT * FROM vacancies WHERE status='open'");
$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>CityCare</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#e8f5e9;
    font-family:Arial;
}

.navbar{
    background:#2e7d32;
}

.navbar a{
    color:white !important;
    font-weight:bold;
}

.hero{
    text-align:center;
    padding:50px 20px;
}

.btn-main{
    background:#2e7d32;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:8px;
}

.card{
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}
</style>

</head>

<body>

<?php
include("config/db.php");

// vacancy data
$result = mysqli_query($conn, "SELECT * FROM vacancies WHERE status='open'");
$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>CityCare</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#e8f5e9;
    font-family:Arial;
}

/* NAVBAR */
.navbar{
    background:#2e7d32;
}

.navbar a{
    color:white !important;
    font-weight:bold;
    margin-left:15px;
}

.nav-right{
    display:flex;
    align-items:center;
    margin-left:auto;
}

/* HERO */
.hero{
    text-align:center;
    padding:60px 20px;
}

.btn-main{
    background:#2e7d32;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:8px;
    margin:5px;
}

/* CARDS */
.card{
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
    transition:0.3s;
}
.card:hover{
    transform:scale(1.05);
}

/* IMAGE SECTION */
.feature-img{
    width:100%;
    border-radius:15px;
}

/* VACANCY */
.alert{
    margin:10px;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
<div class="container">

<a class="navbar-brand text-white" href="#">CityCare 🧹</a>

<div class="nav-right">

    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Login</a>
    <a href="register.php">Sign Up</a>

    <!--  Notification -->
    <div style="margin-left:20px; color:white;">
        🔔 <?php if($count>0){ ?> <b>(<?= $count ?>)</b> <?php } ?>
    </div>

</div>

</div>
</nav>

<!-- Vacancy Alert -->
<?php while($row = mysqli_fetch_assoc($result)){ ?>
<div class="alert alert-warning text-center">
🚨 <?= ucfirst($row['role']) ?> Vacancy Open!
<a href="apply.php?role=<?= $row['role'] ?>">Apply Now</a>
</div>
<?php } ?>

<!-- HERO -->
<div class="hero">
<h1>Welcome to CityCare 🧹</h1>
<p>Together for a Cleaner India</p>

<a href="login.php"><button class="btn-main">Login</button></a>
<a href="register.php"><button class="btn-main">Register</button></a>
</div>

<!-- FEATURES -->
<div class="container mt-4">
<div class="row">

<div class="col-md-4">
<div class="card p-3 text-center">
<h5>Report Complaint</h5>
<p>Submit issues easily</p>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 text-center">
<h5>Track Status</h5>
<p>Check progress anytime</p>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 text-center">
<h5>Clean City</h5>
<p>Be part of change</p>
</div>
</div>

</div>
</div>

</body>
</html>