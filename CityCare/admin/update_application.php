<?php
include("../config/db.php");

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($conn, "UPDATE applications SET status='$status' WHERE id='$id'");

header("Location: applications.php");
?>