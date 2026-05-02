<?php
include("../config/db.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM vacancies WHERE id='$id'");

header("Location: vacancies.php");
?>