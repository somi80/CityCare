<?php
include("config/db.php");

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['role'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if($name == "" || $email == "" || $role == ""){
        echo "All fields required!";
        exit();
    }

    mysqli_query($conn, "INSERT INTO applications(name,email,role_applied)
    VALUES('$name','$email','$role')");

    header("Location: apply.php?role=$role&success=1");
    exit();

}else{
    echo "Invalid Request!";
}
?>