<?php
include("../config/db.php");

$id = $_POST['id'];
$status = $_POST['status'];
$remark = $_POST['remark'];

mysqli_query($conn,"UPDATE complaints SET status='$status' WHERE id='$id'");

header("Location: complaints.php");
?>