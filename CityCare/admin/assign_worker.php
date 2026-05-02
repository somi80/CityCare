<?php
include("../config/db.php");

$id = $_POST['id'];        
$worker = $_POST['worker']; 

mysqli_query($conn, 
"UPDATE complaints SET worker_email='$worker' WHERE id='$id'");

header("Location: complaints.php");
?>