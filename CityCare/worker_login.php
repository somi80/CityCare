<!DOCTYPE html>
<html>
<head>
<title>Worker Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h2>Worker Login</h2>

<form action="worker_login_process.php" method="post">

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button type="submit" class="btn btn-primary">Login</button>

</form>

</body>
</html>