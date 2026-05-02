<?php

include("config/db.php");

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO users
(name,email,password,role)
VALUES('$name','$email','$password','user')";

mysqli_query($conn,$sql);

header("Location:user_login.php");

?>