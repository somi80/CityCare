<!DOCTYPE html>
<html>

<head>

<title>Register</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body style="background:#fff3e0;">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-4">

<div class="card shadow p-4">

<h3 class="text-center">User Registration</h3>

<form action="register_process.php"
method="POST">

<input type="text" name="name"
class="form-control mb-3"
placeholder="Name">

<input type="email" name="email"
class="form-control mb-3"
placeholder="Email">

<input type="password" name="password"
class="form-control mb-3"
placeholder="Password">

<button class="btn btn-success w-100">
Register
</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>