<?php
include('../config/db.php');

// GET (for Start button)
if(isset($_GET['id']) && isset($_GET['status'])){
    $id = $_GET['id'];
    $status = $_GET['status'];

    mysqli_query($conn, "UPDATE complaints SET status='$status' WHERE id='$id'");
}

// POST (for proof upload)
if(isset($_POST['id']) && isset($_POST['status'])){
    $id = $_POST['id'];
    $status = $_POST['status'];

    $image = $_FILES['proof']['name'];
    $tmp = $_FILES['proof']['tmp_name'];

    if($image != ""){
    move_uploaded_file($tmp, "../assets/images/".$image);

    // update complaint
    mysqli_query($conn, 
    "UPDATE complaints SET status='$status', proof_image='$image' WHERE id='$id'");

    // GET USER EMAIL
    $res = mysqli_query($conn, "SELECT user_email FROM complaints WHERE id='$id'");
    $data = mysqli_fetch_assoc($res);
    $user_email = $data['user_email'];

    // INSERT NOTIFICATION
    $msg = "Your complaint (ID: $id) has been resolved ✅";

    mysqli_query($conn, 
    "INSERT INTO notifications(message, user_email) 
    VALUES('$msg', '$user_email')");
}
}

header("Location: dashboard.php");
?>