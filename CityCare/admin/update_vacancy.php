<?php
include("../config/db.php");

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($conn, "UPDATE vacancies SET status='$status' WHERE id='$id'");

header("Location: vacancies.php");
?>