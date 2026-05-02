<?php
include("../config/db.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM complaints WHERE id='$id'");

header("Location: complaints.php");
?>