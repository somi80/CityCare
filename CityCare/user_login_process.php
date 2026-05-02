<?php
session_start();
include("config/db.php");

if(isset($_POST['email']) && isset($_POST['password'])){

$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password' AND role='user'");

if(mysqli_num_rows($result) == 1){

$_SESSION['user'] = $email;
$_SESSION['role'] = 'user';

header("Location: user/dashboard.php");
exit();

}else{
echo "Invalid User Login";
}

}else{
echo "Form Error!";
}
?>