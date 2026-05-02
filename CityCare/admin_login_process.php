<?php
session_start();
include("config/db.php");

if(isset($_POST['email']) && isset($_POST['password'])){

$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password' AND role='admin'");

if(mysqli_num_rows($result) == 1){

$_SESSION['user'] = $email;
$_SESSION['role'] = 'admin';

header("Location: admin/dashboard.php");
exit();

}else{
echo "Invalid Admin Login";
}

}else{
echo "Form Error!";
}
?>